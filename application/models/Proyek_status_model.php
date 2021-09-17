<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek_status_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    public function get_by_proyek($id)
    {
        $this->db->where('proyek_id_status', $id);
        $this->db->order_by('ts_proyek_status', 'desc');
        return $this->db->get('proyek_status')->result();
    }

    public function update($id, $val)
    {
        $data['proyek_id_status'] = $id;
        $data['nilai_proyek_status'] = $val;
        $this->db->insert('proyek_status', $data);
    }

    public function delete_proyek($id){
        $this->db->where('proyek_id_status', $id);
        $this->db->delete('proyek_status');
    }
}