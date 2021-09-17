<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemenang_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_pemenang', $id);
            return $this->db->get('tender_pemenang')->row();
        }
        return $this->db->get('tender_pemenang')->result();
    }

    public function add($data)
    {
        $this->db->insert('tender_pemenang', $data);
        logActivity('Pemenang Tender baru [ Nama: ' . $data['nama_pemenang'] . ']');

    }

    public function add_return($data)
    {
        $this->db->insert('tender_pemenang', $data);
        $id = $this->db->insert_id();
        logActivity('Pemenang Tender baru [ Nama: ' . $data['nama_pemenang'] . ']');

        return $id;

    }

    public function update($data, $id)
    {

        $this->db->where('id_pemenang', $id);
        $this->db->update('tender_pemenang', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Pemenang Tender Update [ID: ' . $id . '. Nama: ' . $data['nama_pemenang'] . ']');
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->where('id_pemenang', $id);
        $this->db->delete('tender_pemenang');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Pemenang Tender dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

    public function get_datatables_query()
    {
        $table          = 'tender_pemenang';
        $column_order   = array('nama_pemenang');
        $column_search  = array('nama_pemenang');
        $order          = array('nama_pemenang' => 'asc');

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
        $this->db->from('tender_pemenang');
        return $this->db->count_all_results();
    }

    public function cek_nama($nama, $id){
        if (!$id) {
            return $this->db->where('nama_pemenang', $nama)
                ->get('tender_pemenang')->num_rows();
        }else{

            $cek = $this->db->where(array('id_pemenang' => $id,'nama_pemenang' => $nama))
                ->get('tender_pemenang')->num_rows();

            if($cek == 1){
                return 0;
            }else{
                return $this->db->where('nama_pemenang', $nama)
                    ->get('tender_pemenang')->num_rows();
            }
        }
    }

}
