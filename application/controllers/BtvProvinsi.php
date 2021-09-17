<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtvProvinsi extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BtvProvinsi_model');
    }


    public function index()
    {
        $has_permission = has_permission('BtvProvinsi', 'view');
        if (!$has_permission) {
            access_denied('BtvProvinsi', 'view');
        }

        $data['page']   = 'folews_provinsi/table';
        $data['js']     = 'folews_provinsi/table_js';
        $data['css']    = 'css_table';
        $data['menu']   = 'BtvProvinsi';
        $data['nomer_urut'] = 1;


        $data['data'] = $this->BtvProvinsi_model->get();


        $this->load->view('layout', $data);
    }

    public function form($id = '')
    {
        $data['page'] = 'folews_provinsi/form';
        $data['js'] = 'folews_provinsi/form_js';
        $data['css'] = 'css_form';
        $data['menu'] = 'BtvProvinsi';


        if ($id) {
            $has_permission = has_permission('BtvProvinsi', 'edit');
            if (!$has_permission) {
                access_denied('BtvProvinsi', 'edit');
            }

            $data['judul']  = 'Edit Provinsi';

            $data['data']   = $this->BtvProvinsi_model->get($id);

        } else {
            $has_permission = has_permission('BtvProvinsi', 'add');
            if (!$has_permission) {
                access_denied('BtvProvinsi', 'add');
            }

            $data['judul']  = 'Provinsi Baru';
        }


        if ($this->input->post()) {
            $simpan = $this->input->post();

            if ($id == '') {
                $has_permission = has_permission('BtvProvinsi', 'add');
                if (!$has_permission) {
                    access_denied('BtvProvinsi', 'add');
                }

                $this->BtvProvinsi_model->add($simpan);
            } else {
                $has_permission = has_permission('BtvProvinsi', 'edit');
                if (!$has_permission) {
                    access_denied('BtvProvinsi', 'edit');
                }

                $this->BtvProvinsi_model->update($simpan, $id);
            }
            redirect('BtvProvinsi');
        }

        $this->load->view('layout', $data);
    }

    public function hapus($id)
    {
        $has_permission = has_permission('BtvProvinsi', 'del');
        if (!$has_permission) {
            access_denied('BtvProvinsi', 'del');
        }

        if (!$id) {
            redirect('BtvProvinsi');
        }

        $this->BtvProvinsi_model->delete($id);
        redirect('BtvProvinsi');


    }

    public function cek_nama()
    {
        if ($this->input->post('nama')) {
            $total_rows = $this->BtvProvinsi_model->cek_nama($this->input->post('nama'), $this->input->post('id'));
            if ($total_rows == 0) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
            die();
        }
    }


}