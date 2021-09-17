<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Revisi_jawab_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('revisi_model');
    }

    public function get($id = '')
    {
        return $this->db->where('revisi_id', $id)
            ->join('user', 'user.id_user = revisi_jawab.user_revisi_jawab','left')
            ->order_by('id_revisi_jawab', 'asc')
            ->get('revisi_jawab')
            ->result();
    }


    public function add($data)
    {
        unset($data['status_revisi'], $data['files']);

        $data['user_revisi_jawab'] = get_staff_user_id();
        $this->db->insert('revisi_jawab', $data);

        $u = $this->revisi_model->get($data['revisi_id']);

        if(get_staff_user_id() == '6bmgy'){
            $user = $u->user_revisi;
        }else{
            $user = '6bmgy';
        }

        $pesan = [
            'pesan_notifikasi' => "Laporan anda dibalas",
            'link_notifikasi' => "revisi/detail/$data[revisi_id]",
            'dari_notifikasi' => get_staff_user_id(),
            'user_notifikasi' => $user
        ];

        add_notification($pesan);

        logActivity('Jawab Revisi baru [ Modul: ' . $data['revisi_id'] . ']');
    }

}
