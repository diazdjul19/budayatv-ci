<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_event extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_event_model');
    }


    public function index()
    {
        $has_permission = has_permission('kategori_event', 'view');
        if (!$has_permission) {
            access_denied('kategori_event', 'view');
        }

        $data['page']   = 'kategori_event/page';
        $data['js']     = 'kategori_event/page_js';
        $data['menu']   = 'kategori_event';

        $data['data'] = $this->kategori_event_model->get();


        $this->load->view('layout', $data);
    }

    public function form($id = '')
    {
        $data['page'] = 'kategori_event/form';
        $data['js'] = 'kategori_event/form_js';
        $data['css'] = 'css_form';
        $data['menu'] = 'kategori_event';


        if ($id) {
            $has_permission = has_permission('kategori_event', 'edit');
            if (!$has_permission) {
                access_denied('kategori_event', 'edit');
            }

            $data['judul']  = 'Edit Kategori Event';

            $data['data']   = $this->kategori_event_model->get($id);

        } else {
            $has_permission = has_permission('kategori_event', 'add');
            if (!$has_permission) {
                access_denied('kategori_event', 'add');
            }

            $data['judul']  = 'Kategori Event Baru';
        }


        if ($this->input->post()) {
            $simpan = $this->input->post();

            if ($id == '') {
                $has_permission = has_permission('kategori_event', 'add');
                if (!$has_permission) {
                    access_denied('kategori_event', 'add');
                }

                $this->kategori_event_model->add($simpan);
            } else {
                $has_permission = has_permission('kategori_event', 'edit');
                if (!$has_permission) {
                    access_denied('kategori_event', 'edit');
                }

                $this->kategori_event_model->update($simpan, $id);
            }
            redirect('kategori_event');
        }

        $this->load->view('layout', $data);
    }

    public function hapus($id)
    {
        $has_permission = has_permission('kategori_event', 'del');
        if (!$has_permission) {
            access_denied('kategori_event', 'del');
        }

        if (!$id) {
            redirect('kategori_event');
        }

        $this->kategori_event_model->delete($id);
        redirect('kategori_event');


    }

    public function cek_nama()
    {
        if ($this->input->post('nama')) {
            $total_rows = $this->kategori_event_model->cek_nama($this->input->post('nama'), $this->input->post('id'));
            if ($total_rows == 0) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
            die();
        }
    }


}