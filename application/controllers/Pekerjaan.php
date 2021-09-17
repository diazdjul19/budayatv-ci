<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pekerjaan_model');
    }


    public function index()
    {
        $has_permission = has_permission('pekerjaan', 'view');
        if (!$has_permission) {
            access_denied('pekerjaan', 'view');
        }

        $data['page']   = 'pekerjaan/table';
        $data['js']     = 'pekerjaan/table_js';
        $data['css']    = 'css_table';
        $data['menu']   = 'pekerjaan';


        $this->load->view('layout', $data);
    }

    public function table()
    {

        $list = $this->pekerjaan_model->get_datatables();
        $data = array();
        foreach ($list as $ls) {
            $row = array();
            $button = "";

            $has_permission = has_permission('pekerjaan', 'edit');
            if ($has_permission) {
                $button .= "<a href='pekerjaan/form/" . $ls->id_pek . "' class='text-primary'>View</a>";
            }

            $has_permission = has_permission('pekerjaan', 'del');
            if ($has_permission) {
                $button .= " | <a href='' class='text-danger but-del' data-id='" . $ls->id_pek . "' >Delete</a>";
            }

            $option = $ls->nama_pek . "<div class='row-option'>$button</div>";

            $row[] = $option;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->pekerjaan_model->count_all(),
            "recordsFiltered" => $this->pekerjaan_model->count_filtered(),
            "data" => $data,
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function form($id = '')
    {
        $data['page'] = 'pekerjaan/form';
        $data['js'] = 'pekerjaan/form_js';
        $data['css'] = 'css_form';
        $data['menu'] = 'pekerjaan';

        if ($id) {
            $has_permission = has_permission('pekerjaan', 'edit');
            if (!$has_permission) {
                access_denied('pekerjaan', 'edit');
            }

            $data['judul']  = 'Data Edit';

            $data['data']   = $this->pekerjaan_model->get($id);

        } else {
            $has_permission = has_permission('pekerjaan', 'add');
            if (!$has_permission) {
                access_denied('pekerjaan', 'add');
            }

            $data['judul']  = 'Data Baru';
        }


        if ($this->input->post()) {
            $simpan = $this->input->post();

            if ($id == '') {
                $has_permission = has_permission('pekerjaan', 'add');
                if (!$has_permission) {
                    access_denied('pekerjaan', 'add');
                }

                $this->pekerjaan_model->add($simpan);
            } else {
                $has_permission = has_permission('pekerjaan', 'edit');
                if (!$has_permission) {
                    access_denied('pekerjaan', 'edit');
                }

                $this->pekerjaan_model->update($simpan, $id);
            }
            redirect('pekerjaan');
        }

        $this->load->view('layout', $data);
    }

    public function view($id)
    {
        $has_permission = has_permission('pekerjaan', 'view');
        if (!$has_permission) {
            access_denied('pekerjaan', 'view');
        }

        $data['page'] = 'pekerjaan/view';

        $data['sub'] = 'pekerjaan/sub/profile';
        $data['js'] = 'pekerjaan/sub/profile_js';
        $data['id'] = $id;

        $data['bread'] = "<li><span class='active'>Profile</span></li>";
        $data['menu'] = 'pekerjaan';
        $data['submenu'] = 'profile';

        $data['data'] = $this->pekerjaan_model->get($id);

        $this->load->view('layout', $data);
    }

    public function contact($id)
    {
        $has_permission = has_permission('pekerjaan', 'view');
        if (!$has_permission) {
            access_denied('pekerjaan', 'view');
        }

        $data['page'] = 'pekerjaan/view';

        $data['sub'] = 'pekerjaan/sub/contact';
        $data['js'] = 'pekerjaan/sub/contact_js';
        $data['id'] = $id;


        $data['menu'] = 'pekerjaan';
        $data['submenu'] = 'contact';

        $data['data'] = $this->pekerjaan_model->get($id);

        $this->load->view('layout', $data);
    }


    public function table_contact()
    {

        $list = $this->contact_model->get_datatables();
        $data = array();
        foreach ($list as $ls) {
            $row = array();
            $button = "";

            $has_permission = has_permission('pekerjaan', 'edit');
            if ($has_permission) {
                $button .= "<a href='pekerjaan/contact_form/" . $ls->id_contact . "' class='text-primary'>View</a>";
            }

            $has_permission = has_permission('pekerjaan', 'del');
            if ($has_permission) {
                $button .= " | <a href='' class='text-danger but-del' data-id='" . $ls->id_contact . "' >Delete</a>";
            }

            $option = $ls->nama_contact . "<div class='row-option'>$button</div>";

            $row[] = $option;
            $row[] = $ls->jabatan_contact;
            $row[] = $ls->email_contact;
            $row[] = $ls->telp_contact;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->contact_model->count_all(),
            "recordsFiltered" => $this->contact_model->count_filtered(),
            "data" => $data,
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function contact_hapus()
    {
        $has_permission = has_permission('pekerjaan', 'del');
        if (!$has_permission) {
            access_denied('pekerjaan', 'del');
        }

        if (!$this->input->post('id')) {
            redirect('permission');
        }

        $this->pekerjaan_model->delete($this->input->post('id'));

    }

    public function hapus()
    {
        $has_permission = has_permission('pekerjaan', 'del');
        if (!$has_permission) {
            access_denied('pekerjaan', 'del');
        }

        if (!$this->input->post('id')) {
            redirect('permission');
        }

        $this->pekerjaan_model->delete($this->input->post('id'));

    }

    public function cek_nama()
    {
        if ($this->input->post('nama')) {
            $total_rows = $this->pekerjaan_model->cek_nama($this->input->post('nama'), $this->input->post('id'));
            if ($total_rows == 0) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
            die();
        }
    }


}