<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pihak_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_tpihak', $id);
            return $this->db->get('tipe_pihak')->row();
        }
        return $this->db->get('tipe_pihak')->result();
    }

    public function add($data)
    {
        $this->db->insert('tipe_pihak', $data);
        logActivity('Tipe Pihak baru [ Nama: ' . $data['nama_tpihak'] . ']');

    }

    public function update($data, $id)
    {

        $this->db->where('id_tpihak', $id);
        $this->db->update('tipe_pihak', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Tipe Pihak Update [ID: ' . $id . '. Nama: ' . $data['nama_tpihak'] . ']');
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->where('id_tpihak', $id);
        $this->db->delete('tipe_pihak');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Tipe Pihak dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

    public function get_datatables_query()
    {
        $table          = 'tipe_pihak';
        $column_order   = array('nama_tpihak');
        $column_search  = array('nama_tpihak');
        $order          = array('nama_tpihak' => 'asc');

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
        $this->db->from('tipe_pihak');
        return $this->db->count_all_results();
    }

    public function cek_nama($nama, $id){
        if (!$id) {
            return $this->db->where('nama_tpihak', $nama)
                ->get('tipe_pihak')->num_rows();
        }else{

            $cek = $this->db->where(array('id_tpihak' => $id,'nama_tpihak' => $nama))
                ->get('tipe_pihak')->num_rows();

            if($cek == 1){
                return 0;
            }else{
                return $this->db->where('nama_tpihak', $nama)
                    ->get('tipe_pihak')->num_rows();
            }
        }
    }

}
