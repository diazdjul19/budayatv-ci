<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggaran_detail_model extends CI_Model
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
        foreach ($data['detail'] as $key => $val) {
            echo $key;
            $field = explode('-', $key);

            $cek = $this->db
                ->where([
                    'anggaran_id_detail' => $data['anggaran_id_detail'],
                    'bulan_anggaran_detail' => $field[1],
                    'tipe_anggaran_detail' => $data['tipe_anggaran'],
                ])
                ->get('anggaran_detail')->result();

            $in['anggaran_id_detail'] = $data['anggaran_id_detail'];
            $in['bulan_anggaran_detail'] = $field[1];
            $in['pkat_anggaran_detail'] =  mego_number($val);
            $in['tipe_anggaran_detail'] =  $data['tipe_anggaran'];

            if (count($cek)) {
                $this->db->where([
                    'anggaran_id_detail' => $data['anggaran_id_detail'],
                    'bulan_anggaran_detail' => $field[1],
                    'tipe_anggaran_detail' => $data['tipe_anggaran'],
                ])->update('anggaran_detail', $in);
            } else {
                $this->db->insert('anggaran_detail', $in);
            }
            unset($in);
        }


        foreach ($data['real'] as $key => $val) {
            echo $key;
            $field = explode('-', $key);

            $cek = $this->db
                ->where([
                    'anggaran_id_detail' => $data['anggaran_id_detail'],
                    'bulan_anggaran_detail' => $field[1],
                    'tipe_anggaran_detail' => $data['tipe_anggaran'],
                ])
                ->get('anggaran_detail')->result();

            $in['anggaran_id_detail'] = $data['anggaran_id_detail'];
            $in['bulan_anggaran_detail'] = $field[1];
            $in['real_anggaran_detail'] =  mego_number($val);
            $in['tipe_anggaran_detail'] =  $data['tipe_anggaran'];

            if (count($cek)) {
                $this->db->where([
                    'anggaran_id_detail' => $data['anggaran_id_detail'],
                    'bulan_anggaran_detail' => $field[1],
                    'tipe_anggaran_detail' => $data['tipe_anggaran'],
                ])->update('anggaran_detail', $in);
            } else {
                $this->db->insert('anggaran_detail', $in);
            }
            unset($in);
        }
    }

    public function update($data, $id)
    {
        $data['nominal_anggaran'] = mego_number($data['nominal_anggaran']);
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