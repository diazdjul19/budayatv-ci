<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klien_group_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_group_klien', $id);
            return $this->db->get('group_klien')->row();
        }

        $this->db->order_by('nama_group_klien', 'asc');
        return $this->db->get('group_klien')->result();
    }

    public function get_total_klien($id)
    {
        $this->db->where('group_klien_id', $id);
        return $this->db->get('klien')->result();
    }

    public function add($data)
    {
        $this->db->insert('group_klien', $data);
        logActivity('Klien baru [ Nama: ' . $data['nama_group_klien'] . ']');

    }

    public function update($data, $id)
    {

        $this->db->where('id_group_klien', $id);
        $this->db->update('group_klien', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Klien Update [ID: ' . $id . '. Nama: ' . $data['nama_group_klien'] . ']');
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->where('id_group_klien', $id);
        $this->db->delete('group_klien');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Klien Group dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

    public function get_datatables_query()
    {
        $this->db->from('group_klien');

        if ($_POST['search']['value']) {

            $this->db->like('nama_group_klien', $_POST['search']['value']);
        }

        $this->db->order_by('nama_group_klien', 'asc');

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
        $this->db->from('group_klien');
        return $this->db->count_all_results();
    }

    public function cek_nama($nama, $id)
    {
        if (!$id) {
            return $this->db->where('nama_group_klien', $nama)
                ->get('group_klien')->num_rows();
        } else {

            $cek = $this->db->where(array('id_group_klien' => $id, 'nama_group_klien' => $nama))
                ->get('group_klien')->num_rows();

            if ($cek == 1) {
                return 0;
            } else {
                return $this->db->where('nama_group_klien', $nama)
                    ->get('group_klien')->num_rows();
            }
        }
    }

}
