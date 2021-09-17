<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bq_file_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_bq_file', $id);
            return $this->db->get('bq_file')->row();
        }

        return $this->db->get('bq_file')->result();
    }

    public function get_list($id)
    {
        $this->db->where('proyek_id_bq_file', $id);

        return $this->db->get('bq_file')->result();
    }

    public function add($data)
    {
        $this->db->insert('bq_file', $data);

    }

    public function delete_proyek($id){
        $bq = $this->get_list($id);

        foreach($bq as $b){
            unlink('./upload/bq/'. $b->nama_bq_file);
        }
        $this->db->where('proyek_id_bq_file', $id);
        $this->db->delete('bq_file');
    }

    public function delete($id, $nama){
        unlink('./upload/bq/'. $nama);
        $this->db->where('id_bq_file', $id);
        $this->db->delete('bq_file');
    }
}