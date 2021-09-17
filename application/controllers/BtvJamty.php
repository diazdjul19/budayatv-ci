<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtvJamty extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BtvJamty_model');
    }


    public function index()
    {
        $has_permission = has_permission('BtvJamty', 'view');
        if (!$has_permission) {
            access_denied('BtvJamty', 'view');
        }

        $data['page']   = 'folews_jamty/table';
        $data['js']     = 'folews_jamty/table_js';
        $data['css']    = 'css_table';
        $data['menu']   = 'BtvJamty';
        $data['nomer_urut'] = 1;


        $data['data'] = $this->BtvJamty_model->get();


        $this->load->view('layout', $data);
    }

    public function form($id = '')
    {
        $data['page'] = 'folews_jamty/form';
        $data['js'] = 'folews_jamty/form_js';
        $data['css'] = 'css_form';
        $data['menu'] = 'BtvJamty';


        if ($id) {
            $has_permission = has_permission('BtvJamty', 'edit');
            if (!$has_permission) {
                access_denied('BtvJamty', 'edit');
            }

            $data['judul']  = 'Jam Tayang Chanel';

            $data['data']   = $this->BtvJamty_model->get($id);

        } else {
            $has_permission = has_permission('BtvJamty', 'add');
            if (!$has_permission) {
                access_denied('BtvJamty', 'add');
            }

            $data['judul']  = 'Jam Tayang Baru';
        }


        if ($this->input->post()) {
            $simpan = $this->input->post();

            if ($id == '') {
                $has_permission = has_permission('BtvJamty', 'add');
                if (!$has_permission) {
                    access_denied('BtvJamty', 'add');
                }

                $this->BtvJamty_model->add($simpan);
            } else {
                $has_permission = has_permission('BtvJamty', 'edit');
                if (!$has_permission) {
                    access_denied('BtvJamty', 'edit');
                }

                $this->BtvJamty_model->update($simpan, $id);
            }
            redirect('BtvJamty');
        }

        $this->load->view('layout', $data);
    }

    public function hapus($id)
    {
        $has_permission = has_permission('BtvJamty', 'del');
        if (!$has_permission) {
            access_denied('BtvJamty', 'del');
        }

        if (!$id) {
            redirect('BtvJamty');
        }

        $this->BtvJamty_model->delete($id);
        redirect('BtvJamty');


    }

    public function cek_nama()
    {
        if ($this->input->post('nama')) {
            $total_rows = $this->BtvJamty_model->cek_nama($this->input->post('nama'), $this->input->post('id'));
            if ($total_rows == 0) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
            die();
        }
    }


}