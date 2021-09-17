<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Auth_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_autologin');
        $this->autologin();
    }

    function login($email, $password, $remember)
    {
        if ((!empty($email)) AND (!empty($password))) {
            $_id   = 'id_user';

            $this->db->where('email_user', $email);
            $user = $this->db->get('user')->row();

            if ($user) {
                $this->load->helper('phpass');
                $hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
                if (!$hasher->CheckPassword($password, $user->pass_user)) {
                    return false;
                }
            } else {
                logActivity('Failed Login Attempt [Email:' . $email . ', IP:' . $this->input->ip_address() . ']');
                return false;
            }

            if ($user->aktif_user == 0) {
                logActivity('Inactive User Tried to Login [Email:' . $email . ',  IP:' . $this->input->ip_address() . ']');
                return array(
                    'userinactive' => true
                );
            }

            $user_data = array(
                'staff_user_id' => $user->$_id,
                'staff_logged_in' => true
            );

            $this->session->set_userdata($user_data);
            
            if ($remember) {
                $this->create_autologin($user->$_id,1);
            }

            $this->update_login_info($user->$_id);
            if ($this->session->has_userdata('red_url')) {
                $red_url = $this->session->userdata('red_url');
                $this->session->unset_userdata('red_url');
                redirect($red_url);
            }
            return true;
        }
        return false;
    }

    function logout()
    {
        $this->delete_autologin();

        $this->session->unset_userdata(array(
            'staff_user_id' => '',
            'staff_logged_in' => ''
        ));
        $this->session->sess_destroy();
    }

    private function create_autologin($user_id, $staff)
    {
        $this->load->helper('cookie');
        $key = substr(md5(uniqid(rand() . get_cookie($this->config->item('sess_cookie_name')))), 0, 16);
        $this->user_autologin->delete($user_id, $key);
        if ($this->user_autologin->set($user_id, md5($key), $staff)) {
            set_cookie(array(
                'name' => 'autologin',
                'value' => serialize(array(
                    'user_id' => $user_id,
                    'key' => $key
                )),
                'expire' => 60 * 60 * 24 * 7  // 1 Minggu
            ));
            return true;
        }
        return false;
    }

    private function delete_autologin()
    {
        $this->load->helper('cookie');
        if ($cookie = get_cookie('autologin', true)) {
            $data = unserialize($cookie);
            $this->user_autologin->delete($data['user_id'], md5($data['key']));
            delete_cookie('autologin', 'aal');
        }
    }

    public function autologin()
    {
        if (!is_logged_in()) {
            $this->load->helper('cookie');
            if ($cookie = get_cookie('autologin', true)) {
                $data = unserialize($cookie);
                if (isset($data['key']) AND isset($data['user_id'])) {
                    if (!is_null($user = $this->user_autologin->get($data['user_id'], md5($data['key'])))) {
                        $user_data = array(
                            'staff_user_id' => $user->id_user,
                            'staff_logged_in' => true
                        );

                        $this->session->set_userdata($user_data);
                        set_cookie(array(
                            'name' => 'autologin',
                            'value' => $cookie,
                            'expire' => 60 * 60 * 24 * 7 // 1 Minggu
                        ));
                        $this->update_login_info($user->id_user);
                        return true;
                    }
                }
            }
        }
        return false;
    }

    private function update_login_info($user_id)
    {
        $table = 'user';
        $_id   = 'id_user';

        $this->db->set('last_ip_user', $this->input->ip_address());
        $this->db->set('last_login_user', date('Y-m-d H:i:s'));
        $this->db->where($_id, $user_id);
        $this->db->update($table);
    }

    public function update_info(){
        $this->update_login_info(get_staff_user_id());
    }

    public function set_password_email($email, $staff)
    {
        $table = 'tblclients';
        $_id   = 'userid';
        if ($staff == true) {
            $table = 'tblstaff';
            $_id   = 'staffid';
        }
        $this->db->where('email', $email);
        $user = $this->db->get($table)->row();
        if ($user) {
            if ($user->active == 0) {
                return array(
                    'memberinactive' => true
                );
            }
            $new_pass_key = md5(rand() . microtime());
            $this->db->where($_id, $user->$_id);
            $this->db->update($table, array(
                'new_pass_key' => $new_pass_key,
                'new_pass_key_requested' => date('Y-m-d H:i:s')
            ));
            if ($this->db->affected_rows() > 0) {
                $this->load->model('emails_model');
                $data['new_pass_key'] = $new_pass_key;
                $data['staff']        = $staff;
                $data['userid']       = $user->$_id;
                $data['email']        = $email;
                $send                 = $this->emails_model->send_email($user->email, _l('password_set_email_subject', get_option('companyname')), 'set-password', $data);
                if ($send) {
                    return true;
                }
                return false;
            }
            return false;
        }
        return false;
    }

    public function forgot_password($email, $staff = false)
    {
        $table = 'tblclients';
        $_id   = 'userid';
        if ($staff == true) {
            $table = 'tblstaff';
            $_id   = 'staffid';
        }
        $this->db->where('email', $email);
        $user = $this->db->get($table)->row();
        if ($user) {
            if ($user->active == 0) {
                return array(
                    'memberinactive' => true
                );
            }
            $new_pass_key = md5(rand() . microtime());
            $this->db->where($_id, $user->$_id);
            $this->db->update($table, array(
                'new_pass_key' => $new_pass_key,
                'new_pass_key_requested' => date('Y-m-d H:i:s')
            ));
            if ($this->db->affected_rows() > 0) {
                $this->load->model('emails_model');
                $data['new_pass_key'] = $new_pass_key;
                $data['staff']        = $staff;
                $data['userid']       = $user->$_id;
                $send                 = $this->emails_model->send_email($user->email, _l('password_reset_email_subject', get_option('companyname')), 'forgot-password', $data);
                if ($send) {
                    return true;
                }
                return false;
            }
            return false;
        }
        return false;
    }

    public function set_password($staff, $userid, $new_pass_key, $password)
    {
        if (!$this->can_set_password($staff, $userid, $new_pass_key)) {
            return array(
                'expired' => true
            );
        }
        $this->load->helper('phpass');
        $hasher   = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
        $password = $hasher->HashPassword($password);
        $table    = 'tblclients';
        $_id      = 'userid';
        if ($staff == true) {
            $table = 'tblstaff';
            $_id   = 'staffid';
        }
        $this->db->where($_id, $userid);
        $this->db->where('new_pass_key', $new_pass_key);
        $this->db->update($table, array(
            'password' => $password
        ));
        if ($this->db->affected_rows() > 0) {
            logActivity('User Set Password [User ID:' . $userid . ', Staff:' . $staff . ', IP:' . $this->input->ip_address() . ']');
            $this->db->set('new_pass_key', NULL);
            $this->db->set('new_pass_key_requested', NULL);
            $this->db->set('last_password_change', date('Y-m-d H:i:s'));
            $this->db->where($_id, $userid);
            $this->db->where('new_pass_key', $new_pass_key);
            $this->db->update($table);
            return true;
        }
        return null;
    }

    public function reset_password($staff, $userid, $new_pass_key, $password)
    {
        if (!$this->can_reset_password($staff, $userid, $new_pass_key)) {
            return array(
                'expired' => true
            );
        }
        $this->load->helper('phpass');
        $hasher   = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
        $password = $hasher->HashPassword($password);
        $table    = 'tblclients';
        $_id      = 'userid';
        if ($staff == true) {
            $table = 'tblstaff';
            $_id   = 'staffid';
        }
        $this->db->where($_id, $userid);
        $this->db->where('new_pass_key', $new_pass_key);
        $this->db->update($table, array(
            'password' => $password
        ));
        if ($this->db->affected_rows() > 0) {
            logActivity('User Reseted Password [User ID:' . $userid . ', Staff:' . $staff . ', IP:' . $this->input->ip_address() . ']');
            $this->db->set('new_pass_key', NULL);
            $this->db->set('new_pass_key_requested', NULL);
            $this->db->set('last_password_change', date('Y-m-d H:i:s'));
            $this->db->where($_id, $userid);
            $this->db->where('new_pass_key', $new_pass_key);
            $this->db->update($table);
            $this->load->model('emails_model');
            $this->db->where($_id, $userid);
            $user          = $this->db->get($table)->row();
            $data['email'] = $user->email;
            $this->emails_model->send_email($user->email, _l('password_changed_email_subject'), 'reset-password', $data);
            return true;
        }
        return null;
    }

    public function can_reset_password($staff, $userid, $new_pass_key)
    {
        $table = 'tblclients';
        $_id   = 'userid';
        if ($staff == true) {
            $table = 'tblstaff';
            $_id   = 'staffid';
        }
        $this->db->where($_id, $userid);
        $this->db->where('new_pass_key', $new_pass_key);
        $user = $this->db->get($table)->row();
        if ($user) {
            $timestamp_now_minus_1_hour = time() - (60 * 60);
            $new_pass_key_requested     = strtotime($user->new_pass_key_requested);
            if ($timestamp_now_minus_1_hour > $new_pass_key_requested) {
                return false;
            }
            return true;
        }
        return false;
    }

    public function can_set_password($staff, $userid, $new_pass_key)
    {
        $table = 'tblclients';
        $_id   = 'userid';
        if ($staff == true) {
            $table = 'tblstaff';
            $_id   = 'staffid';
        }
        $this->db->where($_id, $userid);
        $this->db->where('new_pass_key', $new_pass_key);
        $user = $this->db->get($table)->row();
        if ($user) {
            $timestamp_now_minus_48_hour = time() - (3600 * 48);
            $new_pass_key_requested      = strtotime($user->new_pass_key_requested);
            if ($timestamp_now_minus_48_hour > $new_pass_key_requested) {
                return false;
            }
            return true;
        }
        return false;
    }
}
