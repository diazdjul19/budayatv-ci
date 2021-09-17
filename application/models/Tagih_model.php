<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagih_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }


    public function delete_proyek($id){
        $this->db->where('proyek_id_tagih', $id);
        $this->db->delete('tagih');
    }
}