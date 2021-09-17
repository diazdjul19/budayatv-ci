<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('revisi_model');
        $this->load->model('revisi_jawab_model');
        $this->load->model('notifikasi_model');
    }


    public function index()
    {

        $data['page'] = 'notifikasi/table';
        $data['js'] = 'notifikasi/table_js';
        $data['css'] = 'css_table';
        $data['menu'] = '';

        $this->load->view('layout', $data);
    }

    public function table()
    {

        $list = $this->notifikasi_model->get_datatables();
        $data = array();
        foreach ($list as $ls) {
            $row = array();

            $row[] = "<a href='$ls->link_notifikasi'>$ls->pesan_notifikasi</a>";
            $row[] = time_ago($ls->create_notifikasi);

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->notifikasi_model->count_all(),
            "recordsFiltered" => $this->notifikasi_model->count_filtered(),
            "data" => $data,
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }
}