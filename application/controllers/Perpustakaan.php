<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpustakaan extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('perpustakaan_model');
        $this->load->model('tipe_pustaka_model');
    }

    public function index()
    {
        $has_permission = has_permission('perpustakaan', 'view');
        if (!$has_permission) {
            access_denied('perpustakaan', 'view');
        }

        $data['page'] = 'perpustakaan/table';
        $data['js'] = 'perpustakaan/table_js';
        $data['menu'] = 'perpustakaan';


        $data['title'] = "Perpustakaan";
        $data['tipe_perpustakaan'] = $this->tipe_pustaka_model->get();


        $this->load->view('layout', $data);
    }

    public function table()
    {
        $list = $this->perpustakaan_model->get_datatables();
        $data = array();
        foreach ($list as $ls) {
            $row = array();

            $down = "";
            $down .= "<a href='perpustakaan/download/$ls->id_pustaka' class='text-success' rel='tooltip' data-original-title='Download'><i class='fa fa-arrow-down mr-3'></i></a>";
            $down .= $ls->nama_pustaka;

            $row[] = $down;
            $row[] = $ls->nama_tpustaka;

            $button = "";
            $button .= "<a href='perpustakaan/form/$ls->id_pustaka' class='btn btn-xs btn-primary'><i class='fa fa-pencil'></i></a>";
            $button .= "<a href='' class='ml-2 btn btn-xs btn-danger but-del' data-id='$ls->id_pustaka '><i class='fa fa-times'></i></a>";
            $row[] = $button;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->perpustakaan_model->count_all(),
            "recordsFiltered" => $this->perpustakaan_model->count_filtered(),
            "data" => $data,
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function form($id = '')
    {
        $has_permission = has_permission('perpustakaan', 'add');
        if (!$has_permission) {
            access_denied('perpustakaan', 'add');
        }

        $data['page'] = 'perpustakaan/form';
        $data['js'] = 'perpustakaan/form_js';
        $data['menu'] = 'perpustakaan';
        $data['tipe_perpustakaan'] = $this->tipe_pustaka_model->get();


        if ($id) {
            $data['title'] = "Update Pustaka";
            $data['data'] = $this->perpustakaan_model->get($id);

        } else {
            $data['title'] = "Pustaka Baru";
        }

        if ($this->input->post()) {
            $output = $this->input->post();

            if (!empty($_FILES['file']['name'])) {
                $config['upload_path']          = './upload/pustaka';
                $config['allowed_types']        = 'xls|xlsx|doc|docx|pdf|rar|zip|jpeg|jpg|png|gif|ppt|pptx';
                $config['max_size']             = 500000;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file'))
                {
                    $file = $this->upload->data();

                    $simpan['file_pustaka'] = $file['file_name'];
                }
            }

            $simpan['tipe_pustaka'] = $output['tipe_pustaka'];
            $simpan['nama_pustaka'] = $output['nama_pustaka'];
            $simpan['kategori_pustaka'] = 1;
            $simpan['ket_pustaka'] = $output['ket_pustaka'];

            if ($id == '') {
                $has_permission = has_permission('perpustakaan', 'add');
                if (!$has_permission) {
                    access_denied('perpustakaan', 'add');
                }

                $this->perpustakaan_model->add($simpan);
            } else {
                $has_permission = has_permission('perpustakaan', 'edit');
                if (!$has_permission) {
                    access_denied('perpustakaan', 'edit');
                }

                $this->perpustakaan_model->update($simpan, $id);
            }

            redirect("perpustakaan");
        }

        $this->load->view('layout', $data);
    }

    public function hapus(){
        $has_permission = has_permission('perpustakaan', 'del');
        if (!$has_permission) {
            access_denied('perpustakaan', 'del');
        }

        if (!$this->input->post('id')) {
            redirect('perpustakaan');
        }

        $this->perpustakaan_model->delete($this->input->post('id'));
    }

    public function download($id){
        if(!$id){
            redirect('perpustakaan');
        }

        $d = $this->perpustakaan_model->get($id);
        header('Content-Disposition: attachment; filename=' . $d->nama_pustaka);
        force_download("./upload/pustaka/$d->file_pustaka", null);
    }
}