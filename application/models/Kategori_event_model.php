<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_event_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get($id = '')
    {
        $this->db->order_by('nama_ke', 'asc');
        if ($id) {
            $this->db->where('id_ke', $id);
            return $this->db->get('kategori_event')->row();
        }
        return $this->db->get('kategori_event')->result();
    }

    public function add($data)
    {
        $this->db->insert('kategori_event', $data);
    }

    public function update($data, $id)
    {

        $this->db->where('id_ke', $id);
        $this->db->update('kategori_event', $data);

    }

    public function delete($id)
    {
        $this->db->where('id_ke', $id);
        $this->db->delete('kategori_event');
    }

}
