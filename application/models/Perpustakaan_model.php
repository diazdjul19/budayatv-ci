<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpustakaan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    public function get($id = '')
    {
        $this->db->join('tipe_pustaka', 'tipe_pustaka.id_tpustaka = pustaka.tipe_pustaka', 'left');
        if ($id) {
            $this->db->where('id_pustaka', $id);
            return $this->db->get('pustaka')->row();
        }

        $this->db->order_by('nama_pustaka', 'desc');

        return $this->db->get('pustaka')->result();
    }


    public function add($data)
    {
        $this->db->insert('pustaka', $data);

    }

    public function update($data, $id)
    {
        $this->db->where('id_pustaka', $id);
        $this->db->update('pustaka', $data);
    }

    public function delete($id)
    {
        $d = $this->get($id);

        unlink("./upload/pustaka/$d->file_pustaka");

        $this->db->where('id_pustaka', $id);
        $this->db->delete('pustaka');

    }



    public function get_datatables_query()
    {

        $this->db->from('pustaka');
        $this->db->join('tipe_pustaka', 'tipe_pustaka.id_tpustaka = pustaka.tipe_pustaka', 'left');

        if ($_POST['search']['value']) {
            $this->db->like('nama_pustaka', $_POST['search']['value']);
        }

        if ($this->input->post('tipe') && $this->input->post('tipe') != '') {
            $this->db->where('tipe_pustaka', $this->input->post('tipe'));
        }


        $this->db->order_by('nama_pustaka asc', 'tipe_pustaka asc');
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
        $this->db->from('pustaka');
        return $this->db->count_all_results();
    }
}