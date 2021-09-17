<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('group_bisnis_model');
        $this->load->model('lokasi_model');
    }

    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_user', $id);
            return $this->db->get('user')->row();
        }
        return $this->db->get('user')->result();
    }

    function get_user_group($id)
    {

        $this->db->join('group_bisnis', 'user.bisnis_id_user = group_bisnis.id_group_bisnis', 'left');
        $this->db->where('bisnis_id_user', $id);
        return $this->db->get('user')->result();

    }

    public function add($data)
    {
        $this->load->helper('phpass');
        $hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
        $data['id_user'] = mego_rand();
        $data['nama_user'] = mego_text_capital($data['nama_user']);
        $data['pass_user'] = $hasher->HashPassword($data['pass_user']);
        $data['aktif_user'] = 1;
        $data['create_user'] = date('Y-m-d H:i:s');

        if (isset($data['permission'])) {
            $permission = $data['permission'];
            unset($data['permission']);

            foreach ($permission as $p) {
                $this->db->insert('user_permission', array(
                    'user_id' => $data['id_user'],
                    'permission_id' => $p
                ));
            }
        }

        unset($data['pass1_user']);
        $this->db->insert('user', $data);

        $this->group_bisnis_model->set_new_group($data['bisnis_id_user']);
        $this->lokasi_model->set_new_group($data['lokasi_id_user']);

        logActivity('User baru [ Nama: ' . $data['nama_user'] . ']');
    }


    public function update($data, $id)
    {
        $this->group_bisnis_model->set_new_group($data['bisnis_id_user'], $id);
        $this->lokasi_model->set_new_group($data['lokasi_id_user'], $id);

        unset($data['pass_user'], $data['pass1_user']);

        if ($data['role_user'] != '') {
            $data['admin_user'] = 0;
        }

        if ($data['admin_user'] != 0) {
            $data['role_user'] = '';
        }

        $data['nama_user'] = mego_text_capital($data['nama_user']);

        $this->db->where('id_user', $id);
        $this->db->update('user', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Permission Update [ID: ' . $id . '. Nama: ' . $data['nama_user'] . ']');
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');

        $this->db->where('user_id', $id);
        $this->db->delete('user_permission');



        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('user dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

    public function get_datatables_query()
    {
        $table = 'user';
        $column_order = array('nama_user', 'last_activity');
        $column_search = array('nama_user', 'nama_role');

        $this->db->from($table);
        $this->db->join('role', 'user.role_user = role.id_role', 'left');

        $i = 0;
        foreach ($column_search as $item) {
            if ($_POST['search']['value']) {

                if ($i == 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if ($this->input->post('group_bisnis') && $this->input->post('group_bisnis') != '') {
            $this->db->where('bisnis_id_user', $this->input->post('group_bisnis'));
        }

        if ($this->input->post('lokasi') && $this->input->post('lokasi') != '') {
            $this->db->where('lokasi_id_user', $this->input->post('lokasi'));
        }

        if ($this->input->post('role') && $this->input->post('role') != '') {

            if($this->input->post('role') == 1){
                $this->db->where('admin_user', 1);
            }else{
                $this->db->where('role_user', $this->input->post('role'));
            }
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('user.nama_user', 'asc');
        }
    }

    function get_datatables()
    {
        $this->get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from('user');
        return $this->db->count_all_results();
    }

    public function cek_email($email, $id)
    {
        if (!$id) {
            return $this->db->where('email_user', $email)
                ->get('user')->num_rows();
        } else {

            $cek = $this->db->where(array('id_user' => $id, 'email_user' => $email))
                ->get('user')->num_rows();

            if ($cek == 1) {
                return 0;
            } else {
                return $this->db->where('email_user', $email)
                    ->get('user')->num_rows();
            }
        }
    }

    public function get_user_permission($id)
    {
        return $this->db->where('user_id', $id)->get('user_permission')->result();
    }
}
