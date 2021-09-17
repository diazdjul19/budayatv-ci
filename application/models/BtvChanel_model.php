<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtvChanel_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_chanel', $id);
            return $this->db->get('btv_chanel')->row();
        }
        return $this->db->get('btv_chanel')->result();
    }

    public function add($data)
    {
        $this->db->insert('btv_chanel', $data);
    }

    public function update($data, $id)
    {

        $this->db->where('id_chanel', $id);
        $this->db->update('btv_chanel', $data);

    }

    public function delete($id)
    {
        $this->db->where('id_chanel', $id);
        $this->db->delete('btv_chanel');
    }

}
