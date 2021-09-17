<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uang_muka_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_uang_muka', $id);
            return $this->db->get('uang_muka')->row();
        }

        return $this->db->get('uang_muka')->result();
    }

    public function get_list($id){
        $this->db->where('proyek_id_uang_muka', $id);
        $this->db->order_by('tgl_uang_muka', 'asc');

        return $this->db->get('uang_muka')->result();
    }

    public function update($data)
    {
        if($data['jenis'] == 1){
            $simpan['nominal_uang_muka'] = mego_number($data['val']);
        }elseif($data['jenis'] == 2){
            $simpan['tgl_uang_muka'] = tgl_dt($data['val']);
        }else{
            $simpan['jawab_uang_muka'] = tgl_dt($data['val']);
        }

        $this->db->where('id_uang_muka', $data['id']);
        $this->db->update('uang_muka', $simpan);
    }

    public function delete($id){
        $this->db->where('id_uang_muka', $id);
        $this->db->delete('uang_muka');
    }

    public function delete_proyek($id){
        $this->db->where('proyek_id_uang_muka', $id);
        $this->db->delete('uang_muka');
    }
}