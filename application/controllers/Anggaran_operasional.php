<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggaran_operasional extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('anggaran_model');
        $this->load->model('anggaran_detail_model');

    }

    public function index()
    {
        $has_permission = has_permission('anggaran', 'view');
        if (!$has_permission) {
            access_denied('anggaran', 'view');
        }

        $data['page'] = 'anggaran/table';
        $data['js'] = 'anggaran/table_js';
        $data['css'] = 'css_table';
        $data['menu'] = 'anggaran';
        $data['submenu'] = 'anggaran_operasional';



        $data['title'] = "Anggaran";
        $data['button'] = "Anggaran Operasional Baru";
        $data['link'] = "anggaran_operasional";
        $data['data'] = $this->anggaran_model->get(2);

        $this->load->view('layout', $data);
    }

    public function form($id = '')
    {
        $has_permission = has_permission('anggaran', 'add');
        if (!$has_permission) {
            access_denied('anggaran', 'add');
        }

        $data['page'] = 'anggaran/form';
        $data['js'] = 'anggaran/form_js';
        $data['css'] = 'css_table';
        $data['menu'] = 'anggaran';
        $data['submenu'] = 'anggaran_operasional';
        $data['tipe'] = 2;
        $data['bln'] = [
            1 => 'Januari',
            2 => 'Febuari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];


        if ($id) {
            $data['title'] = "Update Anggaran Operasional";
            $data['data'] = $this->anggaran_model->get(2, $id);


        }else{
            $data['title'] = "Anggaran Operasional Baru";
        }

        if ($this->input->post()) {
            $simpan = $this->input->post();

            if ($id == '') {
                $has_permission = has_permission('anggaran', 'add');
                if (!$has_permission) {
                    access_denied('anggaran', 'add');
                }

                $kirim['thn_anggaran'] = $simpan['thn_anggaran'];
                $kirim['nominal_anggaran'] = $simpan['nominal_anggaran'];
                $kirim['real_anggaran'] = $simpan['real_anggaran'];
                $kirim['tipe_anggaran'] = $simpan['tipe_anggaran'];

                $aid = $this->anggaran_model->add($kirim);

                $simpan['anggaran_id_detail'] =  $aid;
                $this->anggaran_detail_model->add($simpan);
            } else {
                $has_permission = has_permission('anggaran', 'edit');
                if (!$has_permission) {
                    access_denied('anggaran', 'edit');
                }

                $kirim['thn_anggaran'] = $simpan['thn_anggaran'];
                $kirim['nominal_anggaran'] = $simpan['nominal_anggaran'];
                $kirim['real_anggaran'] = $simpan['real_anggaran'];
                $kirim['tipe_anggaran'] = $simpan['tipe_anggaran'];

                $this->anggaran_model->update($kirim, $id);

                $simpan['anggaran_id_detail'] =  $id;
                $this->anggaran_detail_model->add($simpan);
            }

            redirect("anggaran_operasional");
        }

        $this->load->view('layout', $data);
    }

    public function detail($id)
    {
        $has_permission = has_permission('anggaran', 'view');
        if (!$has_permission) {
            access_denied('anggaran', 'view');
        }

        if(!$id){
            redirect("anggaran");
        }

        $data['page'] = 'anggaran/view';
        $data['js'] = 'anggaran/view_js';
        $data['menu'] = 'anggaran';
        $data['submenu'] = 'anggaran_operasional';
        $data['tipe'] = 2;
        $data['bln'] = [
            1 => 'Januari',
            2 => 'Febuari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        $data['title'] = "Anggaran Operasional";
        $data['button'] = "Anggaran Operasional";
        $data['link'] = "anggaran_operasional";
        $data['data'] = $this->anggaran_model->get(2, $id);


        $this->load->view('layout', $data);
    }

    public function hapus($id){
        $this->anggaran_model->delete($id);
        redirect("anggaran_operasional");
    }

}