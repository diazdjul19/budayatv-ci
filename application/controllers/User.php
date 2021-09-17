<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('notifikasi_model');
        $this->load->model('role_model');
    }


    public function index()
    {
        $has_permission = has_permission('user', 'view');
        if (!$has_permission) {
            access_denied('user', 'view');
        }

        $data['page']   = 'user/table';
        $data['js']     = 'user/js_table';
        $data['css']    = 'css_table';
        $data['menu']   = 'user';

        $data['r_list']     = $this->role_model->get();


        $this->load->view('layout', $data);
    }

    public function table()
    {

        $list = $this->user_model->get_datatables();
        $data = array();
        foreach ($list as $ls) {
            $row = array();
            $button = "";

            $has_permission = has_permission('user', 'edit');
            if ($has_permission) {
                $button .= "<a href='user/form/" . $ls->id_user . "' rel='tooltip' class='btn btn-xs btn-primary' data-original-title='Edit'><i class='fa fa-pencil'></i></a>";
            }

            $has_permission = has_permission('user', 'del');
            if ($has_permission) {
                $button .= " <a href='' rel='tooltip' class='btn btn-xs btn-danger but-del' data-id='" . $ls->id_user . "' data-original-title='Hapus'><i class='fa fa-trash'></i></a>";
            }

            $nama = "<span class='bold'>$ls->nama_user</span>";
            if($ls->admin_user == 1){
                $nama .= "<br><span class='font-italic text-primary'>Administrator</span>";
            }else{
                $nama .= "<br><span class='text-black-50'>$ls->nama_role</span>";

            }

            $row[] = $nama;
            $row[] = time_ago($ls->last_activity);
            $row[] = $button;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->user_model->count_all(),
            "recordsFiltered" => $this->user_model->count_filtered(),
            "data" => $data,
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function form($id = '')
    {
        $data['page']   = 'user/form';
        $data['js']     = 'user/js_form';
        $data['css']    = 'css_form';
        $data['menu']   = 'user';




        $data['role_list'] = $this->role_model->get();

        if ($id) {
            $has_permission = has_permission('user', 'edit');
            if (!$has_permission) {
                access_denied('user', 'edit');
            }

            $data['judul']  = 'User Edit';
            $data['edit']   = 1;

            $data['data']   = $this->user_model->get($id);
            $data['user_permission'] = $this->user_model->get_user_permission($id);

        } else {
            $has_permission = has_permission('user', 'add');
            if (!$has_permission) {
                access_denied('user', 'add');
            }

            $data['judul']  = 'User baru';
            $data['edit']   = 0;
        }

        if ($this->input->post()) {
            $simpan = $this->input->post();

            if ($id == '') {
                $has_permission = has_permission('user', 'add');
                if (!$has_permission) {
                    access_denied('user', 'add');
                }

                $this->user_model->add($simpan);
                set_alert('success', 'Data berhasil ditambah');
            } else {
                $has_permission = has_permission('user', 'edit');
                if (!$has_permission) {
                    access_denied('user', 'edit');
                }

                $success = $this->user_model->update($simpan, $id);
                if ($success) {
                    set_alert('success', 'Data berhasil di update');
                }

            }
            redirect('user');
        }

//        print_r($simpan);

        $this->load->view('layout', $data);
    }

    public function hapus()
    {
        $has_permission = has_permission('user', 'del');
        if (!$has_permission) {
            access_denied('user', 'del');
        }

        if (!$this->input->post('id')) {
            redirect('user');
        }

        $this->user_model->delete($this->input->post('id'));

    }

    public function cek_email()
    {
        if ($this->input->post('email')) {
            $total_rows = $this->user_model->cek_email($this->input->post('email'), $this->input->post('id'));
            if ($total_rows == 0) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
            die();
        }
    }

    public function read(){
        $this->notifikasi_model->read();
    }

    public function profile(){
        $data['page']   = 'profil/form';
        $data['js']     = 'profil/form_js';
        $data['css']    = 'css_table';
        $data['menu']   = '';

        $this->load->view('layout',$data);
    }

}