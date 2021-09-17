<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get($id = '')
    {
        if ($id) {
            return $this->db->where('id_notifikasi', $id)
                ->get('notifikasi')
                ->row();
        }

        return $this->db
            ->where(['user_notifikasi' => get_staff_user_id()])
            ->get('notifikasi')
            ->result();

    }

    public function get_list($limit = '')
    {
        if ($limit) {
            return $this->db
                ->where(['user_notifikasi' => get_staff_user_id()])
                ->or_where(['user_notifikasi' => 'all'])
                ->order_by('id_notifikasi', 'desc')
                ->limit($limit)
                ->get('notifikasi')
                ->result();
        }

        return $this->db
            ->where(['user_notifikasi' => get_staff_user_id()])
            ->or_where(['user_notifikasi' => 'all'])
            ->order_by('id_notifikasi', 'desc')
            ->get('notifikasi')
            ->result();

    }

    public function unread()
    {
        return $this->db
            ->where(['user_notifikasi' => get_staff_user_id(), 'baca_notifikasi' => 0])
            ->or_where(['user_notifikasi' => 'all'])
            ->order_by('id_notifikasi', 'desc')
            ->get('notifikasi')
            ->result();
    }

    public function read()
    {
        $this->db
            ->where(['id_user' => get_staff_user_id()])
            ->update('user', ['notifikasi_user' => 0]);

        logActivity("Notifikasi Read [User: " . get_staff_user_id() . "]");
    }


    public function get_datatables_query()
    {
        $table = 'notifikasi';
        $column_order = array('pesan_notifikasi');
        $column_search = array('pesan_notifikasi');
        $order = array('create_notifikasi' => 'desc');

        $this->db->from($table)
            ->where('user_notifikasi', get_staff_user_id())
            ->or_where('user_notifikasi', 'all');

        $i = 0;
        foreach ($column_search as $item) {
            if ($_POST['search']['value']) {

                if ($i == 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($order)) {
            $order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from('notifikasi')
            ->where('user_notifikasi', get_staff_user_id());
        return $this->db->count_all_results();
    }
}