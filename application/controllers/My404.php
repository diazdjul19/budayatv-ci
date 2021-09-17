<?php
class my404 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->output->set_status_header('404');
        $data['content'] = 'error_404';
        $this->load->view('errors/error404',$data);//loading in my template
    }
}