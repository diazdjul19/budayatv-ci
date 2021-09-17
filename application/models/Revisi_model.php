<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Revisi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get($id = '')
    {
        if ($id) {
            return $this->db->where('id_revisi', $id)
                ->join('user', 'user.id_user = revisi.user_revisi','left')
                ->get('revisi')
                ->row();
        }
        return $this->db
            ->join('user', 'user.id_user = revisi.user_revisi','left')
            ->get('revisi')
            ->result();
    }

    public function get_limit(){
        return $this->db
//            ->join('menu', 'menu.id_menu = revisi.modul_id', 'left')
            ->limit(5)
            ->order_by('id_revisi', 'desc')
            ->get('revisi')
            ->result();
    }

    public function get_where($field = '',$id = '')
    {
        return $this->db->where($field, $id)
            ->get('revisi')->result();
    }

    public function add($data)
    {
        unset($data['files']);
        $data['status_revisi'] = 1;
        $data['user_revisi'] = get_staff_user_id();
        $this->db->insert('revisi', $data);

        $id = $this->db->insert_id();

        $pesan = [
            'pesan_notifikasi' => "Revisi laporan baru",
            'link_notifikasi' => "revisi/detail/$id",
            'dari_notifikasi' => get_staff_user_id(),
            'user_notifikasi' => 'duji9'
        ];

        add_notification($pesan);

        logActivity('Revisi baru [ Modul: ' . $data['modul_id'] . ']');
    }

    public function update($data)
    {
        unset($data['files']);
        $u = $this->get($data['id_revisi']);

        $tgl_selesai = null;
        if($data['status_revisi'] == 3){
            $tgl_selesai = date('Y-m-d H:i:s');
        }


        $this->db->where('id_revisi', $data['id_revisi']);
        $this->db->update('revisi', ['status_revisi' => $data['status_revisi'], 'tgl_diselesaikan_revisi' => $tgl_selesai]);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            $pesan = [
                'pesan_notifikasi' => "Status laporan terupdate",
                'link_notifikasi' => "revisi/detail/$data[id_revisi]",
                'dari_notifikasi' => get_staff_user_id(),
                'user_notifikasi' => $u->user_revisi
            ];

            add_notification($pesan);

            logActivity('Revisi Update [ID: ' .$data['id_revisi'] . '. Status: ' . $data['status_revisi'] . ']');
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->where('id_revisi', $id);
        $this->db->delete('revisi');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('revisi dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

    public function get_datatables_query()
    {
        $table = 'revisi';
        $column_order = array('modul_id', 'isi_revisi', 'nama_user');
        $column_search = array('modul_id', 'isi_revisi', 'nama_user');
        $order = array('create_revisi' => 'desc');

        $user = $this->db->where('id_user',get_staff_user_id())->get('user')->row();

        $this->db->from($table)
                 ->join('user', 'user.id_user = revisi.user_revisi','left');

        if(!$user->admin_user){
            $this->db->where('user_revisi', get_staff_user_id());
        }

        $i = 0;
        foreach ($column_search as $item) {
            if ($this->input->post('cari') && $this->input->post('cari') != '') {

                if ($i == 0) {
                    $this->db->group_start();
                    $this->db->like($item, $this->input->post('cari'));
                } else {
                    $this->db->or_like($item, $this->input->post('cari'));
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if ($this->input->post('status') && $this->input->post('status') != '') {
            $this->db->where('status_revisi', $this->input->post('status'));
        }

        $this->db->order_by('revisi.create_revisi','desc');

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
        $query = $this->db->order_by('create_revisi','DESC')->get();
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
        $this->db->from('revisi');
        return $this->db->count_all_results();
    }


}
