<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Standarisasi extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('standarisasi_model');
    }


    public function index()
    {
        $has_permission = has_permission('standarisasi', 'view');
        if (!$has_permission) {
            access_denied('standarisasi', 'view');
        }

        $data['page'] = 'standarisasi/table';
        $data['js'] = 'standarisasi/table_js';
        $data['css'] = 'css_table';
        $data['menu'] = 'standarisasi';

        $this->load->view('layout', $data);
    }

    public function upload_file()
    {
        if (!empty($_FILES['file']['name'])) {
            $config['upload_path']          = './upload/standarisasi';
            $config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx|xlsx|xls|pptx|ppt';
            $config['max_size']             = 100000;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file'))
            {
                $foto = $this->upload->data();
                $img = $foto['file_name'];

                $data['nama_standarisasi'] = $img;
                $data['uploadby_standarisasi'] = get_staff_user_id();
                $data['uploaddate_standarisasi'] =  date('Y-m-d H:i:s');

                $this->standarisasi_model->add($data);

            }
        }

    }

    public function table()
    {

        $list = $this->standarisasi_model->get_datatables();
        $data = array();
        foreach ($list as $ls) {
            $row = array();
            $button = "";

            $has_permission = has_permission('standarisasi', 'edit');
            if ($has_permission) {
                $button .= "<a href='standarisasi/download/" . $ls->id_standarisasi . "'  class='text-primary'>Download</a>";
            }

            $has_permission = has_permission('standarisasi', 'del');
            if ($has_permission) {
                $button .= " <a href='' class='text-danger but-del' data-id='" . $ls->id_standarisasi . "' > | Delete</a>";
            }

            $option = $ls->nama_standarisasi. " <div class='row-option'>".$button."</div>";


            $row[] = $option;
            $row[] = $ls->uploadby_standarisasi;
            $row[] = time_ago($ls->uploaddate_standarisasi);

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->standarisasi_model->count_all(),
            "recordsFiltered" => $this->standarisasi_model->count_filtered(),
            "data" => $data,
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function download($id){
        $this->load->helper('download');

        $n = $this->standarisasi_model->get($id);
        force_download('upload/standarisasi/'.$n->nama_standarisasi, NULL);
    }


    public function hapus()
    {
        $has_permission = has_permission('standarisasi', 'del');
        if (!$has_permission) {
            access_denied('standarisasi', 'del');
        }


        $this->standarisasi_model->delete($this->input->post('id'));

    }


}