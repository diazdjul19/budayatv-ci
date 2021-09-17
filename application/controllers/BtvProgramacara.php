<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtvProgramacara extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BtvProgramacara_model');
    }


    public function index()
    {
        $has_permission = has_permission('BtvProgramacara', 'view');
        if (!$has_permission) {
            access_denied('BtvProgramacara', 'view');
        }

        $data['page']   = 'folews_programacara/table';
        $data['js']     = 'folews_programacara/table_js';
        $data['css']    = 'css_table';
        $data['menu']   = 'BtvProgramacara';
        $data['nomer_urut'] = 1;


        $data['data'] = $this->BtvProgramacara_model->get();


        $this->load->view('layout', $data);
    }

    public function form($id = '')
    {
        $data['page'] = 'folews_programacara/form';
        $data['js'] = 'folews_programacara/form_js';
        $data['css'] = 'css_form';
        $data['menu'] = 'BtvProgramacara';


        if ($id) {
            $has_permission = has_permission('BtvProgramacara', 'edit');
            if (!$has_permission) {
                access_denied('BtvProgramacara', 'edit');
            }

            $data['judul']  = 'Program Acara Edit';

            $data['data']   = $this->BtvProgramacara_model->get($id);

        } else {
            $has_permission = has_permission('BtvProgramacara', 'add');
            if (!$has_permission) {
                access_denied('BtvProgramacara', 'add');
            }

            $data['judul']  = 'Program Acara Baru';
        }


        if ($this->input->post()) {
            $simpan = $this->input->post();

            if ($id == '') {
                $has_permission = has_permission('BtvProgramacara', 'add');
                if (!$has_permission) {
                    access_denied('BtvProgramacara', 'add');
                }

                $this->BtvProgramacara_model->add($simpan);
            } else {
                $has_permission = has_permission('BtvProgramacara', 'edit');
                if (!$has_permission) {
                    access_denied('BtvProgramacara', 'edit');
                }

                $this->BtvProgramacara_model->update($simpan, $id);
            }
            redirect('BtvProgramacara');
        }

        $this->load->view('layout', $data);
    }

    public function hapus($id)
    {
        $has_permission = has_permission('BtvProgramacara', 'del');
        if (!$has_permission) {
            access_denied('BtvProgramacara', 'del');
        }

        if (!$id) {
            redirect('BtvProgramacara');
        }

        $this->BtvProgramacara_model->delete($id);
        redirect('BtvProgramacara');


    }

    public function cek_nama()
    {
        if ($this->input->post('nama')) {
            $total_rows = $this->BtvProgramacara_model->cek_nama($this->input->post('nama'), $this->input->post('id'));
            if ($total_rows == 0) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
            die();
        }
    }


}