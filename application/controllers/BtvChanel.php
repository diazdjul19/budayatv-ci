<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtvChanel extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BtvChanel_model');
    }


    public function index()
    {
        $has_permission = has_permission('BtvChanel', 'view');
        if (!$has_permission) {
            access_denied('BtvChanel', 'view');
        }

        $data['page']   = 'btv_chanel/table';
        $data['js']     = 'btv_chanel/table_js';
        $data['css']    = 'css_table';
        $data['menu']   = 'BtvChanel';
        $data['nomer_urut'] = 1;


        $data['data'] = $this->BtvChanel_model->get();


        $this->load->view('layout', $data);
    }

    public function form($id = '')
    {
        $data['page'] = 'btv_chanel/form';
        $data['js'] = 'btv_chanel/form_js';
        $data['css'] = 'css_form';
        $data['menu'] = 'BtvChanel';


        if ($id) {
            $has_permission = has_permission('BtvChanel', 'edit');
            if (!$has_permission) {
                access_denied('BtvChanel', 'edit');
            }

            $data['judul']  = 'Edit Chanel';

            $data['data']   = $this->BtvChanel_model->get($id);

        } else {
            $has_permission = has_permission('BtvChanel', 'add');
            if (!$has_permission) {
                access_denied('BtvChanel', 'add');
            }

            $data['judul']  = 'Chanel Baru';
        }


        if ($this->input->post()) {
            $simpan = $this->input->post();

            if ($id == '') {
                $has_permission = has_permission('BtvChanel', 'add');
                if (!$has_permission) {
                    access_denied('BtvChanel', 'add');
                }

                $this->BtvChanel_model->add($simpan);
            } else {
                $has_permission = has_permission('BtvChanel', 'edit');
                if (!$has_permission) {
                    access_denied('BtvChanel', 'edit');
                }

                $this->BtvChanel_model->update($simpan, $id);
            }
            redirect('BtvChanel');
        }

        $this->load->view('layout', $data);
    }

    public function hapus($id)
    {
        $has_permission = has_permission('BtvChanel', 'del');
        if (!$has_permission) {
            access_denied('BtvChanel', 'del');
        }

        if (!$id) {
            redirect('BtvChanel');
        }

        $this->BtvChanel_model->delete($id);
        redirect('BtvChanel');


    }

    public function cek_nama()
    {
        if ($this->input->post('nama')) {
            $total_rows = $this->BtvChanel_model->cek_nama($this->input->post('nama'), $this->input->post('id'));
            if ($total_rows == 0) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
            die();
        }
    }


}