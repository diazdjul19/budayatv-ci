<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pihak3_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_pihak', $id);
            return $this->db->get('pihak')->row();
        }
        return $this->db->get('pihak')->result();
    }

    public function add($data)
    {
        $data['created_pihak']    = date('Y-m-d H:i:s');

        logActivity('pihak baru [ Nama: ' . $data['nama_pihak'] . ']');
        $this->db->insert('pihak', $data);

        $id = $this->db->insert_id();
        return $id;
    }

    public function update($data, $id)
    {


        $this->db->where('id_pihak', $id);
        $this->db->update('pihak', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Pihak Update [ID: ' . $id . '. Nama: ' . $data['nama_pihak'] . ']');
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->where('id_pihak', $id);
        $this->db->delete('pihak');

               $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('pihak dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

    public function get_datatables_query()
    {
        $table          = 'pihak';
        $column_order   = array('nama_pihak','telp_pihak', 'web_pihak');
        $column_search  = array('nama_pihak','telp_pihak', 'web_pihak');
        $order          = array('nama_pihak' => 'asc');

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
        $this->db->from('pihak');
        return $this->db->count_all_results();
    }

    public function cek_nama($nama, $id){
        if (!$id) {
            return $this->db->where('nama_pihak', $nama)
                ->get('pihak')->num_rows();
        }else{

            $cek = $this->db->where(array('id_pihak' => $id,'nama_pihak' => $nama))
                ->get('pihak')->num_rows();

            if($cek == 1){
                return 0;
            }else{
                return $this->db->where('nama_pihak', $nama)
                    ->get('pihak')->num_rows();
            }
        }
    }

    public function get_pihak_permission($id){
        return $this->db->where('pihak_id', $id)->get('pihak_permission')->result();
    }
}
