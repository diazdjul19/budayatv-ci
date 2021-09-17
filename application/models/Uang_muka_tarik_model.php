<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uang_muka_tarik_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('uang_muka_model');
    }
    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_uang_muka_tarik', $id);
            return $this->db->get('uang_muka_tarik')->row();
        }
        return $this->db->get('uang_muka_tarik')->result();
    }

    public function get_list($id)
    {
        $this->db->where('uang_muka_id_tarik', $id);
        $this->db->order_by('tgl_uang_muka_tarik', 'asc');

        return $this->db->get('uang_muka_tarik')->result();
    }

    public function add($data)
    {
        $u = $this->uang_muka_model->get($data['uang_muka_id_tarik']);
        $simpan['tarik_uang_muka'] = $u->tarik_uang_muka + mego_number($data['nominal_uang_muka_tarik']);

        $this->db->where('id_uang_muka', $data['uang_muka_id_tarik']);
        $this->db->update('uang_muka', $simpan);

        $data['tgl_uang_muka_tarik'] = tgl_dt($data['tgl_uang_muka_tarik']);
        $data['nominal_uang_muka_tarik'] = mego_number($data['nominal_uang_muka_tarik']);

        $this->db->insert('uang_muka_tarik', $data);
        logActivity('Penarikan uang muka baru');

    }

    public function update($data, $id)
    {
        $u = $this->uang_muka_model->get($data['uang_muka_id_tarik']);
        $m = $this->get($id);

        $no = $u->tarik_uang_muka - $m->nominal_uang_muka_tarik;
        $simpan['tarik_uang_muka'] = $no + mego_number($data['nominal_uang_muka_tarik']);

        $this->db->where('id_uang_muka', $data['uang_muka_id_tarik']);
        $this->db->update('uang_muka', $simpan);

        $data['tgl_uang_muka_tarik'] = tgl_dt($data['tgl_uang_muka_tarik']);
        $data['nominal_uang_muka_tarik'] = mego_number($data['nominal_uang_muka_tarik']);

        $this->db->where('id_uang_muka_tarik', $id);
        $this->db->update('uang_muka_tarik', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Update penarikan uang muka');
            return true;
        }
        return false;
    }

    public function delete($um, $id)
    {
        $t = $this->get($id);

        $u = $this->uang_muka_model->get($um);
        $simpan['tarik_uang_muka'] = $u->tarik_uang_muka - mego_number($t->nominal_uang_muka_tarik);

        $this->db->where('id_uang_muka', $um);
        $this->db->update('uang_muka', $simpan);

        $this->db->where('id_uang_muka_tarik', $id);
        $this->db->delete('uang_muka_tarik');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Penarikan uang muka dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

    public function delete_proyek($id){
        $this->db->where('proyek_id_uang_muka_tarik', $id);
        $this->db->delete('uang_muka_tarik');
    }
}