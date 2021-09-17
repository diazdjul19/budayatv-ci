<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autorisasi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_auto', $id);
            return $this->db->get('autorisasi')->row();
        }
        return $this->db->get('autorisasi')->result();
    }

    public function add($data)
    {
        $data['nama_auto']      = mego_text_capital($data['nama_auto']);

        $this->db->insert('autorisasi', $data);

        logActivity('autorisasi baru [ Nama: ' . $data['nama_auto'] . ']');
    }

    public function update($data, $id)
    {

        $data['nama_auto']      = mego_text_capital($data['nama_auto']);

        $this->db->where('id_auto', $id);
        $this->db->update('autorisasi', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Autorisasi Update [ID: ' . $id . '. Nama: ' . $data['nama_auto'] . ']');
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->where('id_auto', $id);
        $this->db->delete('autorisasi');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('autorisasi dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

    public function get_datatables_query()
    {
        $table          = 'autorisasi';
        $column_order   = array('nama_auto', 'telp_auto');
        $column_search  = array('nama_auto', 'telp_auto');
        $order          = array('nama_auto' => 'asc');

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
        $this->db->from('autorisasi');
        return $this->db->count_all_results();
    }

    public function cek_nama($nama, $id){
        if (!$id) {
            return $this->db->where('nama_auto', $nama)
                ->get('autorisasi')->num_rows();
        }else{

            $cek = $this->db->where(array('id_auto' => $id,'nama_auto' => $nama))
                ->get('autorisasi')->num_rows();

            if($cek == 1){
                return 0;
            }else{
                return $this->db->where('nama_auto', $nama)
                    ->get('autorisasi')->num_rows();
            }
        }
    }

}
