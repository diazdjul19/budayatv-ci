<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tender_menang_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get($id = '')
    {
        $this->db->join('klien', 'tender.klien_id_tender = klien.id_klien', 'left');
        $this->db->join('lokasi', 'tender.perolehan_tender = lokasi.id_lokasi', 'left');

        if ($id) {
            $this->db->where('id_tender', $id);
            return $this->db->get('tender')->row();
        }
        $this->db->where('status_tender', 1);
        return $this->db->get('tender')->result();
    }


    public function get_datatables_query()
    {
        $table = 'tender';

        $this->db->from($table);
        $this->db->join('klien', 'tender.klien_id_tender = klien.id_klien', 'left');
        $this->db->join('lokasi', 'tender.perolehan_tender = lokasi.id_lokasi', 'left');
        $this->db->where('status_tender', 1);
        $this->db->where('project_tender', 0);

        if ($this->input->post('urutan') && $this->input->post('urutan') != '') {
            $nama = explode("-", $this->input->post('urutan'));

            if($nama[1] == 'a'){
                $this->db->order_by($nama[0], 'asc');
            }else{
                $this->db->order_by($nama[0], 'desc');
            }
        }

        $this->db->order_by('tgl_tender', 'desc');

    }

    function get_datatables()
    {
        $this->get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from('tender');
        $this->db->where('status_tender', 1);

        return $this->db->count_all_results();
    }

}
