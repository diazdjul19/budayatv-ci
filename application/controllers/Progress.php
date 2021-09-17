<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progress extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('proyek_model');
        $this->load->model('penagihan_model');
        $this->load->model('progress_model');
        $this->load->model('uf_model');

    }

    public function proyek($id)
    {
        $has_permission = has_permission('progress', 'view');
        if (!$has_permission) {
            access_denied('progress', 'view');
        }

        $data['page'] = 'proyek/layout';
        $data['subpage'] = 'proyek/progress/table';
        $data['js'] = 'proyek/progress/table_js';
        $data['css'] = 'css_table';
        $data['menu'] = 'Proyek1';
        $data['headmenu'] = 'progress';


        $t = $this->proyek_model->get($id);
        $data['data'] = $t;

        $data['title'] = "Progress | $t->nama_proyek";

        $data['list'] = $this->penagihan_model->get_list($id);
        $data['progress_model'] = $this->progress_model;
        $data['uf_model'] = $this->uf_model;

        $this->load->view('layout', $data);
    }

    public function save()
    {
        $has_permission = has_permission('progress', 'add');
        if (!$has_permission) {
            access_denied('progress', 'add');
        }

        $kirim = $this->input->post();
        if ($this->input->post()) {
            if (!empty($_FILES['file']['name'])) {
                $config['upload_path'] = './upload/bast';
                $config['allowed_types'] = 'pdf|doc|docx|xlsx|xls|pptx|ppt';
                $config['max_size'] = 100000;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {
                    $file = $this->upload->data();

                    $data['proyek_id_uf'] = $this->input->post('proyek_id_progress');
                    $data['relasi_uf'] = $this->input->post('penagihan_id_progress');
                    $data['asal_uf'] = 'bast';
                    $data['nama_uf'] = $file['file_name'];
                    $data['user_uf'] = get_staff_user_id();

                    $this->uf_model->add($data);
                }

                $bast = 1;
            }else{
                $bast = 0;

            }

            $kirim['bast_progress'] = $bast;

            $this->progress_model->add($kirim);

        }

        redirect('progress/proyek/' . $this->input->post('proyek_id_progress'));

    }

    public function pdf($id)
    {
        $f = $this->uf_model->get($id);
        $d = "upload/bast/".$f->nama_uf;

        $this->output
            ->set_content_type('application/pdf')
            ->set_output(file_get_contents($d));
    }

    public function hapus($id, $proyek){
        $has_permission = has_permission('progress', 'del');
        if (!$has_permission) {
            access_denied('progress', 'del');
        }

        $this->progress_model->delete($id);

        redirect('progress/proyek/' . $proyek);

    }
}