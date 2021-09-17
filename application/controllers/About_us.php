<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_us extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->model('anggaran_model');
        $this->load->model('proyek_model');
        $this->load->model('spk_model');
    }


    public function index()
    {
        $data['page'] = 'about_us/page';
        $data['js'] = 'about_us/page_js';
        $data['menu'] = 'about_us';
        $data['title'] = 'About Us - SimonPro';

        $data['data'] = $this->db->where('id_about_us', 1)->get('about_us')->row();


        $this->load->view('layout', $data);
    }

    public function form()
    {
        $data['page'] = 'about_us/form';
        $data['js'] = 'about_us/form_js';
        $data['menu'] = 'about_us';
        $data['title'] = 'About Us - SimonPro';

        $data['data'] = $this->db->where('id_about_us', 1)->get('about_us')->row();

        if ($this->input->post()) {

            $this->db->where('id_about_us', 1);
            $this->db->update('about_us', ['text_about_us' => $this->input->post('text_about_us')]);

            redirect('about_us');
        }

        $this->load->view('layout', $data);
    }

    public function upload(){
        if (!empty($_FILES['file']['name'])) {
            $config['upload_path']          = './upload/about_us';
            $config['allowed_types']        = 'jpg|jpeg|gif|png';
            $config['max_size']             = 100000;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file'))
            {
                $file = $this->upload->data();

                echo "upload/about_us/".$file['file_name'];
            }
        }
    }
}