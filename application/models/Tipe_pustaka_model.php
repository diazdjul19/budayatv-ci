<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe_pustaka_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_tpustaka', $id);
            return $this->db->get('tipe_pustaka')->row();
        }
        return $this->db->get('tipe_pustaka')->result();
    }

    public function add($data)
    {
        $this->db->insert('tipe_pustaka', $data);
    }

    public function update($data, $id)
    {

        $this->db->where('id_tpustaka', $id);
        $this->db->update('tipe_pustaka', $data);

    }

    public function delete($id)
    {
        $this->db->where('id_tpustaka', $id);
        $this->db->delete('tipe_pustaka');
    }

}
