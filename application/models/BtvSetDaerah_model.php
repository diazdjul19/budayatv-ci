<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtvSetDaerah_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_set_daerah', $id);
            return $this->db->get('btv_set_daerah')->row();
        }
        return $this->db->get('btv_set_daerah')->result();
    }

    public function add($data)
    {
        $this->db->insert('btv_set_daerah', $data);
    }

    public function update($data, $id)
    {

        $this->db->where('id_set_daerah', $id);
        $this->db->update('btv_set_daerah', $data);

    }

    public function delete($id)
    {
        $this->db->where('id_set_daerah', $id);
        $this->db->delete('btv_set_daerah');
    }

}
