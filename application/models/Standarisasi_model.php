<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Standarisasi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_standarisasi', $id);
            return $this->db->get('standarisasi')->row();
        }
        return $this->db->get('standarisasi')->result();
    }

    public function add($data)
    {
        $this->db->insert('standarisasi', $data);

        logActivity('standarisasi baru [ Nama: ' . $data['nama_standarisasi'] . ']');
    }

    public function update($data, $id)
    {

        $this->db->where('standarisasi_id', $id);
        $this->db->delete('standarisasi_permission');

        if(isset($data['permission'])){
            $permission  = $data['permission'];
            unset($data['permission']);

            foreach ($permission as $p) {
                $this->db->insert('standarisasi_permission', array(
                    'standarisasi_id' => $id,
                    'permission_id' => $p
                ));
            }
        }

        unset($data['pass_standarisasi'], $data['pass1_standarisasi']);

        if($data['role_standarisasi'] != ''){
            $data['admin_standarisasi'] = 0;
        }

        $data['nama_standarisasi']      = mego_text_capital($data['nama_standarisasi']);

        $this->db->where('id_standarisasi', $id);
        $this->db->update('standarisasi', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Permission Update [ID: ' . $id . '. Nama: ' . $data['nama_standarisasi'] . ']');
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->where('id_standarisasi', $id);
        $this->db->delete('standarisasi');

        $this->db->where('standarisasi_id', $id);
        $this->db->delete('standarisasi_permission');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('standarisasi dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

    public function get_datatables_query()
    {
        $table          = 'standarisasi';
        $column_order   = array('nama_standarisasi','uploadby_standarisasi', 'uploaddate_standarisasi');
        $column_search  = array('uploaddate_standarisasi', 'uploadby_standarisasi', 'nama_standarisasi');
        $order          = array('nama_standarisasi' => 'asc');

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
        $this->db->from('standarisasi');
        return $this->db->count_all_results();
    }

}
