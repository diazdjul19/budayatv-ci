<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtvJamty_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_jamty', $id);
            return $this->db->get('btv_jamty')->row();
        }
        return $this->db->get('btv_jamty')->result();
    }

    public function add($data)
    {
        $this->db->insert('btv_jamty', $data);
    }

    public function update($data, $id)
    {

        $this->db->where('id_jamty', $id);
        $this->db->update('btv_jamty', $data);

    }

    public function delete($id)
    {
        $this->db->where('id_jamty', $id);
        $this->db->delete('btv_jamty');
    }

}
