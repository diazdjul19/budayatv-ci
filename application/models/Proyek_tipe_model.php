<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek_tipe_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_proyek_t', $id);
            return $this->db->get('proyek_tipe')->row();
        }
        return $this->db->get('proyek_tipe')->result();
    }

    public function add($data)
    {
        $this->db->insert('proyek_tipe', $data);
    }

    public function update($data, $id)
    {

        $this->db->where('id_proyek_t', $id);
        $this->db->update('proyek_tipe', $data);

    }

    public function delete($id)
    {
        $this->db->where('id_proyek_t', $id);
        $this->db->delete('proyek_tipe');
    }

}
