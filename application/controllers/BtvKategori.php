<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtvKategori extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BtvKategori_model');
    }


    public function index()
    {
        $has_permission = has_permission('BtvKategori', 'view');
        if (!$has_permission) {
            access_denied('BtvKategori', 'view');
        }

        $data['page']   = 'folews_kategori/table';
        $data['js']     = 'folews_kategori/table_js';
        $data['css']    = 'css_table';
        $data['menu']   = 'BtvKategori';
        $data['nomer_urut'] = 1;


        $data['data'] = $this->BtvKategori_model->get();


        $this->load->view('layout', $data);
    }

    public function form($id = '')
    {
        $data['page'] = 'folews_kategori/form';
        $data['js'] = 'folews_kategori/form_js';
        $data['css'] = 'css_form';
        $data['menu'] = 'BtvKategori';

       


        if ($id) {
            $has_permission = has_permission('BtvKategori', 'edit');
            if (!$has_permission) {
                access_denied('BtvKategori', 'edit');
            }

            $data['judul']  = 'Kategori Edit';

            $data['data']   = $this->BtvKategori_model->get($id);

        } else {
            $has_permission = has_permission('BtvKategori', 'add');
            if (!$has_permission) {
                access_denied('BtvKategori', 'add');
            }

            $data['judul']  = 'Kategori Baru';
        }


        if ($this->input->post()) {
            $config['upload_path'] ='./upload/kategori_photo/'; //The path where the image will be save
            $config['allowed_types'] = 'gif|jpg|jpeg|png'; //Images extensions accepted
            $config['max_size']    = '5048'; 
            $config['overwrite'] = TRUE; 
            $this->load->library('upload', $config); //Load the upload CI library
            if (!$this->upload->do_upload('foto_kategori'))
            {
                $uploadError = array('upload_error' => $this->upload->display_errors()); 
                //$this->set_flashdata('msg_error', $uploadError, site_url().'/subscribers_c/actioncreate'); 
            }

            $file_info = $this->upload->data();

            $simpan = $this->input->post();
            $simpan['foto_kategori'] = $file_info['file_name'];

            if ($id == '') {
                $has_permission = has_permission('BtvKategori', 'add');
                if (!$has_permission) {
                    access_denied('BtvKategori', 'add');
                }

                $this->BtvKategori_model->add($simpan);
            } else {
                $has_permission = has_permission('BtvKategori', 'edit');
                if (!$has_permission) {
                    access_denied('BtvKategori', 'edit');
                }

                $this->BtvKategori_model->update($simpan, $id);
            }
            redirect('BtvKategori');
        }

        $this->load->view('layout', $data);
    }

    public function hapus($id)
    {
        $has_permission = has_permission('BtvKategori', 'del');
        if (!$has_permission) {
            access_denied('BtvKategori', 'del');
        }

        if (!$id) {
            redirect('BtvKategori');
        }

        $this->BtvKategori_model->delete($id);
        redirect('BtvKategori');


    }

    public function cek_nama()
    {
        if ($this->input->post('nama')) {
            $total_rows = $this->BtvKategori_model->cek_nama($this->input->post('nama'), $this->input->post('id'));
            if ($total_rows == 0) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
            die();
        }
    }


}