<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtvSetDaerah extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BtvSetDaerah_model');
    }


    public function index()
    {
        $has_permission = has_permission('BtvSetDaerah', 'view');
        if (!$has_permission) {
            access_denied('BtvSetDaerah', 'view');
        }

        $data['page']   = 'folews_setdaerah/table';
        $data['js']     = 'folews_setdaerah/table_js';
        $data['css']    = 'css_table';
        $data['menu']   = 'BtvSetDaerah';
        $data['nomer_urut'] = 1;



        $data['data'] = $this->BtvSetDaerah_model->get();

        $this->load->view('layout', $data);
    }

    public function form($id = '')
    {
        $data['page'] = 'folews_setdaerah/form';
        $data['js'] = 'folews_setdaerah/form_js';
        $data['css'] = 'css_form';
        $data['menu'] = 'BtvSetDaerah';


        if ($id) {
            $has_permission = has_permission('BtvSetDaerah', 'edit');
            if (!$has_permission) {
                access_denied('BtvSetDaerah', 'edit');
            }

            $data['judul']  = 'Edit Daerah';

            $data['data']   = $this->BtvSetDaerah_model->get($id);

        } else {
            $has_permission = has_permission('BtvSetDaerah', 'add');
            if (!$has_permission) {
                access_denied('BtvSetDaerah', 'add');
            }

            $data['judul']  = 'Tambah Daerah';
        }


        if ($this->input->post()) {
            $simpan = $this->input->post();

            if ($id == '') {
                $has_permission = has_permission('BtvSetDaerah', 'add');
                if (!$has_permission) {
                    access_denied('BtvSetDaerah', 'add');
                }

                $this->BtvSetDaerah_model->add($simpan);
            } else {
                $has_permission = has_permission('BtvSetDaerah', 'edit');
                if (!$has_permission) {
                    access_denied('BtvSetDaerah', 'edit');
                }

                $this->BtvSetDaerah_model->update($simpan, $id);
            }
            redirect('BtvSetDaerah');
        }

        $this->load->view('layout', $data);
    }

    public function hapus($id)
    {
        $has_permission = has_permission('BtvSetDaerah', 'del');
        if (!$has_permission) {
            access_denied('BtvSetDaerah', 'del');
        }

        if (!$id) {
            redirect('BtvSetDaerah');
        }

        $this->BtvSetDaerah_model->delete($id);
        redirect('BtvSetDaerah');


    }

    public function cek_nama()
    {
        if ($this->input->post('nama')) {
            $total_rows = $this->BtvSetDaerah_model->cek_nama($this->input->post('nama'), $this->input->post('id'));
            if ($total_rows == 0) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
            die();
        }
    }


}