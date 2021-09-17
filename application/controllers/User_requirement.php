<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_requirement extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('userreq_model');
    }


    public function index()
    {
        $has_permission = has_permission('user_requirement', 'view');
        if (!$has_permission) {
            access_denied('user_requirement', 'view');
        }

        $data['page'] = 'user_req/table';
        $data['js'] = 'user_req/table_js';
        $data['css'] = 'css_table';
        $data['menu'] = 'user_requirement';

        $this->load->view('layout', $data);
    }

    public function upload_file()
    {
        if (!empty($_FILES['file']['name'])) {
            $config['upload_path']          = './upload/user_requirement';
            $config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx|xlsx|xls|pptx|ppt';
            $config['max_size']             = 100000;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file'))
            {
                $foto = $this->upload->data();
                $img = $foto['file_name'];

                $data['nama_userreq'] = $img;
                $data['uploadby_userreq'] = get_staff_user_id();
                $data['uploaddate_userreq'] =  date('Y-m-d H:i:s');

                $this->userreq_model->add($data);

            }
        }

    }

    public function table()
    {

        $list = $this->userreq_model->get_datatables();
        $data = array();
        foreach ($list as $ls) {
            $row = array();
            $button = "";

            $has_permission = has_permission('user_requirement', 'edit');
            if ($has_permission) {
                $button .= "<a href='user_requirement/download/" . $ls->id_userreq . "'  class='text-primary'>Download</a>";
            }

            $has_permission = has_permission('user_requirement', 'del');
            if ($has_permission) {
                $button .= " <a href='' class='text-danger but-del' data-id='" . $ls->id_userreq . "' > | Delete</a>";
            }

            $option = $ls->nama_userreq. " <div class='row-option'>".$button."</div>";


            $row[] = $option;
            $row[] = $ls->uploadby_userreq;
            $row[] = time_ago($ls->uploaddate_userreq);

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->userreq_model->count_all(),
            "recordsFiltered" => $this->userreq_model->count_filtered(),
            "data" => $data,
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function download($id){
        $this->load->helper('download');

        $n = $this->userreq_model->get($id);
        force_download('upload/user_requirement/'.$n->nama_userreq, NULL);
    }


    public function hapus()
    {
        $has_permission = has_permission('user_requirement', 'del');
        if (!$has_permission) {
            access_denied('user_requirement', 'del');
        }


        $this->userreq_model->delete($this->input->post('id'));

    }


}