<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggaran_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    public function get($tipe ,$id = '')
    {
        $this->db->where('tipe_anggaran', $tipe);

        if ($id) {
            $this->db->where('id_anggaran', $id);
            return $this->db->get('anggaran')->row();
        }

        $this->db->order_by('thn_anggaran', 'desc');
        return $this->db->get('anggaran')->result();
    }

    public function get_tahun($tipe ,$tahun)
    {
        $this->db->where('tipe_anggaran', $tipe);
        $this->db->where('thn_anggaran', $tahun);

        return $this->db->get('anggaran')->row();
    }


    public function add($data)
    {
        $data['nominal_anggaran'] = mego_number($data['nominal_anggaran']);
        $data['real_anggaran'] = mego_number($data['real_anggaran']);
        $data['ts_anggaran'] = date('Y-m-d H:i:s');
        $this->db->insert('anggaran', $data);
        return $this->db->insert_id();

    }

    public function update($data, $id)
    {
        $data['nominal_anggaran'] = mego_number($data['nominal_anggaran']);
        $data['real_anggaran'] = mego_number($data['real_anggaran']);

        $data['ts_anggaran'] = date('Y-m-d H:i:s');

        $this->db->where('id_anggaran', $id);
        $this->db->update('anggaran', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Anggaran Update [ID: ' . $id . ']', 'anggaran_investasi', 2);
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->where('id_anggaran', $id);
        $this->db->delete('anggaran');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Anggaran dihapus [ID: ' . $id . ']', 'anggaran_investasi', 3);
            return true;
        }
        return false;
    }

}