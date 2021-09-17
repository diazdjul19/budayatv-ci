<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livetv extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        // $this->load->view('livetv/livetv');
    }

    public function get_value()
    {
        $data['my_data'] = 'Some chunk of text';
        $this->load->view('livetv/livetv', $data);

    }


}