<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtvProvinsi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_provinsi', $id);
            return $this->db->get('btv_provinsi')->row();
        }
        return $this->db->get('btv_provinsi')->result();
    }

    public function add($data)
    {
        $this->db->insert('btv_provinsi', $data);
    }

    public function update($data, $id)
    {

        $this->db->where('id_provinsi', $id);
        $this->db->update('btv_provinsi', $data);

    }

    public function delete($id)
    {
        $this->db->where('id_provinsi', $id);
        $this->db->delete('btv_provinsi');
    }

}
