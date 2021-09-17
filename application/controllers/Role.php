<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('role_model');

    }

    public function index()
    {
        $has_permission = has_permission('role', 'view');
        if (!$has_permission) {
            access_denied('role', 'view');
        }

        $data['page']   = 'role/table';
        $data['js']     = 'role/js_table';
        $data['css']    = 'css_table';
        $data['menu']   = 'role';

        $data['title'] = 'SimonPro | Role';

        $this->load->view('layout', $data);
    }

    public function table()
    {

        $list = $this->role_model->get_datatables();
        $data = array();
        foreach ($list as $ls) {
            $row = array();
            $button = '';
            $has_permission = has_permission('role', 'edit');
            if ($has_permission) {
                $button .= "<a href='role/form/" . $ls->id_role . "' class='text-primary'>Ubah</a>";
            }

            $has_permission = has_permission('role', 'del');
            if ($has_permission) {
                $button .= " | <a href='' class='text-danger but-del' data-id='" . $ls->id_role . "'>Hapus</a>";
            }

            $option = mego_unlink($ls->nama_role) . "<div class='row-option'>$button</div>";
            $row[] = $option;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->role_model->count_all(),
            "recordsFiltered" => $this->role_model->count_filtered(),
            "data" => $data,
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function form($id = '')
    {
        $data['page'] = 'role/form';
        $data['js'] = 'role/js_form';
        $data['css'] = 'css_form';
        $data['menu'] = 'role';


        if ($id) {
            $has_permission = has_permission('role', 'edit');
            if (!$has_permission) {
                access_denied('role', 'edit');
            }

            $data['judul'] = 'Edit Role';
            $data['title'] = 'SimonPro | Edit Role';
            $data['data'] = $this->role_model->get($id);
            $data['edit'] = 1;
            $data['role_permission'] = $this->role_model->get_role_permission($id);

        } else {
            $has_permission = has_permission('role', 'add');
            if (!$has_permission) {
                access_denied('role', 'add');
            }

            $data['judul'] = 'Role Baru';
            $data['title'] = 'SimonPro | Role Baru';

            $data['edit'] = 0;
        }

        if ($this->input->post()) {
            $simpan = $this->input->post();

            if ($id == '') {
                $has_permission = has_permission('role', 'add');
                if (!$has_permission) {
                    access_denied('role', 'add');
                }

                $this->role_model->add($simpan);
                set_alert('success', 'Data berhasil ditambah');
            } else {
                $has_permission = has_permission('role', 'edit');
                if (!$has_permission) {
                    access_denied('role', 'edit');
                }

                $success = $this->role_model->update($simpan, $id);
                if ($success) {
                    set_alert('success', 'Data berhasil di update');
                }

            }
            redirect('role');
        }

        $this->load->view('layout', $data);
    }

    public function hapus()
    {
        $has_permission = has_permission('role', 'del');
        if (!$has_permission) {
            access_denied('role', 'del');
        }

        if (!$this->input->post('id')) {
            redirect('role');
        }

        $this->role_model->delete($this->input->post('id'));

    }

    public function cek_text()
    {
        if ($this->input->post('nama')) {
            $nama = mego_link($this->input->post('nama'));
            $total_rows = $this->role_model->cek_nama($nama, $this->input->post('id'));
            if ($total_rows == 0) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
            die();
        }
    }

}