<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtvProgramacara_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_program_acara', $id);
            return $this->db->get('btv_program_acara')->row();
        }
        return $this->db->get('btv_program_acara')->result();
    }

    public function add($data)
    {
        $this->db->insert('btv_program_acara', $data);
    }

    public function update($data, $id)
    {

        $this->db->where('id_program_acara', $id);
        $this->db->update('btv_program_acara', $data);

    }

    public function delete($id)
    {
        $this->db->where('id_program_acara', $id);
        $this->db->delete('btv_program_acara');
    }

}
