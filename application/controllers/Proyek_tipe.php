<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek_tipe extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('proyek_tipe_model');
    }


    public function index()
    {
        $has_permission = has_permission('proyek_tipe', 'view');
        if (!$has_permission) {
            access_denied('proyek_tipe', 'view');
        }

        $data['page']   = 'proyek_tipe/table';
        $data['js']     = 'proyek_tipe/table_js';
        $data['css']    = 'css_table';
        $data['menu']   = 'tipe_proyek';

        $data['data'] = $this->proyek_tipe_model->get();


        $this->load->view('layout', $data);
    }

    public function form($id = '')
    {
        $data['page'] = 'proyek_tipe/form';
        $data['js'] = 'proyek_tipe/form_js';
        $data['css'] = 'css_form';
        $data['menu'] = 'tipe_proyek';


        if ($id) {
            $has_permission = has_permission('proyek_tipe', 'edit');
            if (!$has_permission) {
                access_denied('proyek_tipe', 'edit');
            }

            $data['judul']  = 'Edit Tipe Proyek';

            $data['data']   = $this->proyek_tipe_model->get($id);

        } else {
            $has_permission = has_permission('proyek_tipe', 'add');
            if (!$has_permission) {
                access_denied('proyek_tipe', 'add');
            }

            $data['judul']  = 'Tipe Proyek Baru';
        }


        if ($this->input->post()) {
            $simpan = $this->input->post();

            if ($id == '') {
                $has_permission = has_permission('proyek_tipe', 'add');
                if (!$has_permission) {
                    access_denied('proyek_tipe', 'add');
                }

                $this->proyek_tipe_model->add($simpan);
            } else {
                $has_permission = has_permission('proyek_tipe', 'edit');
                if (!$has_permission) {
                    access_denied('proyek_tipe', 'edit');
                }

                $this->proyek_tipe_model->update($simpan, $id);
            }
            redirect('proyek_tipe');
        }

        $this->load->view('layout', $data);
    }

    public function hapus($id)
    {
        $has_permission = has_permission('proyek_tipe', 'del');
        if (!$has_permission) {
            access_denied('proyek_tipe', 'del');
        }

        if (!$id) {
            redirect('proyek_tipe');
        }

        $this->proyek_tipe_model->delete($id);
        redirect('proyek_tipe');


    }

    public function cek_nama()
    {
        if ($this->input->post('nama')) {
            $total_rows = $this->proyek_tipe_model->cek_nama($this->input->post('nama'), $this->input->post('id'));
            if ($total_rows == 0) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
            die();
        }
    }


}