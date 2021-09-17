<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtvKategori_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_kategori', $id);
            return $this->db->get('btv_kategori')->row();
        }
        return $this->db->get('btv_kategori')->result();
    }

    public function add($data)
    {
        $this->db->insert('btv_kategori', $data);
    }

    public function update($data, $id)
    {

        $this->db->where('id_kategori', $id);
        $this->db->update('btv_kategori', $data);

    }

    public function delete($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('btv_kategori');
    }

}
