<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
    }
    public function index()
    {

        if (is_staff_logged_in()) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->input->post()) {
            if ($this->form_validation->run() !== false) {
                $success = $this->Auth_model->login($this->input->post('email'), $this->input->post('password'), $this->input->post('remember'));

                if (is_array($success) && isset($success['userinactive'])) {
                    set_alert('danger', 'Akun anda tidak aktif');
                    redirect('/');
                } else if ($success == false) {
                    set_alert('danger', 'Email atau password anda salah');
                    redirect('/');
                }
                redirect(site_url('dashboard'));
            }
        }
        $data['title'] = _l('admin_auth_login_heading');
        $this->load->view('login/page', $data);
    }



    public function logout()
    {
        $this->Auth_model->logout();
        redirect('/');
    }

    
    public function email_exists($email)
    {
        $total_rows = total_rows('tblstaff', array(
            'email' => $email
        ));
        if ($total_rows == 0) {
            $this->form_validation->set_message('email_exists', _l('auth_reset_pass_email_not_found'));
            return false;
        }
        return true;
    }

    public function cek_session(){
        if (is_staff_logged_in()) {
            return 1;
        }

        return 0;
    }
}
