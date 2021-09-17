<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe_pustaka extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tipe_pustaka_model');
    }


    public function index()
    {
        $has_permission = has_permission('tipe_pustaka', 'view');
        if (!$has_permission) {
            access_denied('tipe_pustaka', 'view');
        }

        $data['page']   = 'tipe_pustaka/table';
        $data['js']     = 'tipe_pustaka/table_js';
        $data['css']    = 'css_table';
        $data['menu']   = 'tipe_pustaka';

        $data['data'] = $this->tipe_pustaka_model->get();


        $this->load->view('layout', $data);
    }

    public function form($id = '')
    {
        $data['page'] = 'tipe_pustaka/form';
        $data['js'] = 'tipe_pustaka/form_js';
        $data['css'] = 'css_form';
        $data['menu'] = 'tipe_pustaka';


        if ($id) {
            $has_permission = has_permission('tipe_pustaka', 'edit');
            if (!$has_permission) {
                access_denied('tipe_pustaka', 'edit');
            }

            $data['judul']  = 'Edit Tipe Pustaka';

            $data['data']   = $this->tipe_pustaka_model->get($id);

        } else {
            $has_permission = has_permission('tipe_pustaka', 'add');
            if (!$has_permission) {
                access_denied('tipe_pustaka', 'add');
            }

            $data['judul']  = 'Tipe Pustaka Baru';
        }


        if ($this->input->post()) {
            $simpan = $this->input->post();

            if ($id == '') {
                $has_permission = has_permission('tipe_pustaka', 'add');
                if (!$has_permission) {
                    access_denied('tipe_pustaka', 'add');
                }

                $this->tipe_pustaka_model->add($simpan);
            } else {
                $has_permission = has_permission('tipe_pustaka', 'edit');
                if (!$has_permission) {
                    access_denied('tipe_pustaka', 'edit');
                }

                $this->tipe_pustaka_model->update($simpan, $id);
            }
            redirect('tipe_pustaka');
        }

        $this->load->view('layout', $data);
    }

    public function hapus($id)
    {
        $has_permission = has_permission('tipe_pustaka', 'del');
        if (!$has_permission) {
            access_denied('tipe_pustaka', 'del');
        }

        if (!$id) {
            redirect('tipe_pustaka');
        }

        $this->tipe_pustaka_model->delete($id);
        redirect('tipe_pustaka');


    }

    public function cek_nama()
    {
        if ($this->input->post('nama')) {
            $total_rows = $this->tipe_pustaka_model->cek_nama($this->input->post('nama'), $this->input->post('id'));
            if ($total_rows == 0) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
            die();
        }
    }


}