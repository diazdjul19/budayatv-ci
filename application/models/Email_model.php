<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function konfirmasi($data){
        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "mail.megonesia.com";
        $config['smtp_port'] = "587";
        $config['smtp_user'] = "info@megonesia.com";
        $config['smtp_pass'] = "@loamxspot123";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";

        $ci->email->initialize($config);

        $ci->email->from('info@megonesia.com', 'Megonesia Academy');
        $ci->email->to($data['email_siswa']);
        $ci->email->subject('Hi '.mego_text_capital($data['nama_siswa']).', Silahkan konfirmasi dulu pendaftaran kamu');

        $body = $this->load->view('admin/email/register_konfirmasi',$data,TRUE);
        $ci->email->message($body);
        $ci->email->send();

        logActivity('Kirim Email Konfirmasi [ Nama: ' . $data['nama_siswa'] . ']');
    }

}