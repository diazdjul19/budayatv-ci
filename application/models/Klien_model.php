<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klien_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_klien', $id);
            return $this->db->get('klien')->row();
        }
        return $this->db->get('klien')->result();
    }

    public function get_total($id){
        $this->db->where('klien_id_tender', $id);
        return $this->db->get('tender')->result();
    }

    public function get_proses($id){
        $this->db->where('klien_id_tender', $id);
        $this->db->where('status_tender', 0);
        return $this->db->get('tender')->result();
    }

    public function get_menang($id){
        $this->db->where('klien_id_tender', $id);
        $this->db->where('status_tender', 1);
        return $this->db->get('tender')->result();
    }

    public function get_kalah($id){
        $this->db->where('klien_id_tender', $id);
        $this->db->where('status_tender', 2);
        return $this->db->get('tender')->result();
    }

    public function add($data)
    {
        $this->db->insert('klien', $data);
        logActivity('Klien baru [ Nama: ' . $data['nama_klien'] . ']');

    }

    public function add_return($data)
    {
        $this->db->insert('klien', $data);
        $id = $this->db->insert_id();
        logActivity('Klien baru [ Nama: ' . $data['nama_klien'] . ']');

        return $id;

    }

    public function update($data, $id)
    {

        $this->db->where('id_klien', $id);
        $this->db->update('klien', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Klien Update [ID: ' . $id . '. Nama: ' . $data['nama_klien'] . ']');
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->where('id_klien', $id);
        $this->db->delete('klien');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Klien dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

    public function get_datatables_query()
    {
        $table          = 'klien';
        $column_order   = array('nama_klien');
        $column_search  = array('nama_klien');
        $order          = array('nama_klien' => 'asc');

        $this->db->from($table);

        $i = 0;
        foreach ($column_search as $item){
            if($_POST['search']['value']){

                if($i == 0){
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }else{
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($order))
        {
            $order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->get_datatables_query();
        if($_POST['length'] != -1)
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
        $this->db->from('klien');
        return $this->db->count_all_results();
    }

    public function cek_nama($nama, $id){
        if (!$id) {
            return $this->db->where('nama_klien', $nama)
                ->get('klien')->num_rows();
        }else{

            $cek = $this->db->where(array('id_klien' => $id,'nama_klien' => $nama))
                ->get('klien')->num_rows();

            if($cek == 1){
                return 0;
            }else{
                return $this->db->where('nama_klien', $nama)
                    ->get('klien')->num_rows();
            }
        }
    }

}
