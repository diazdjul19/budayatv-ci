<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembaruan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get($id = '')
    {
        if ($id) {
            return $this->db
                ->where('id_pembaruan', $id)
                ->join('menu', 'menu.id_menu = pembaruan.menu_id', 'left')
                ->order_by('create_pembaruan', 'desc')
                ->get('pembaruan')
                ->row();
        }
        return $this->db
            ->join('menu', 'menu.id_menu = pembaruan.menu_id', 'left')
            ->order_by('create_pembaruan', 'desc')
            ->get('pembaruan')
            ->result();
    }

    public function add($data)
    {
        $this->db->insert('pembaruan', $data);
        $id = $this->db->insert_id();

        $pesan = [
            'pesan_notifikasi' => "Pembaruan aplikasi",
            'link_notifikasi' => "pembaruan",
            'dari_notifikasi' => get_staff_user_id(),
            'user_notifikasi' => 'all'
        ];

        add_notification($pesan);

        logActivity("Pembaruan baru [ ID: $id]");
    }

    public function delete($id)
    {
        $this->db->where('id_pembaruan', $id);
        $this->db->delete('pembaruan');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Pembaruan dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

}
