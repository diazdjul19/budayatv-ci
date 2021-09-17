<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userreq_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_userreq', $id);
            return $this->db->get('userreq')->row();
        }
        return $this->db->get('userreq')->result();
    }

    public function add($data)
    {
        $this->db->insert('userreq', $data);

        logActivity('userreq baru [ Nama: ' . $data['nama_userreq'] . ']');
    }

    public function update($data, $id)
    {

        $this->db->where('userreq_id', $id);
        $this->db->delete('userreq_permission');

        if(isset($data['permission'])){
            $permission  = $data['permission'];
            unset($data['permission']);

            foreach ($permission as $p) {
                $this->db->insert('userreq_permission', array(
                    'userreq_id' => $id,
                    'permission_id' => $p
                ));
            }
        }

        unset($data['pass_userreq'], $data['pass1_userreq']);

        if($data['role_userreq'] != ''){
            $data['admin_userreq'] = 0;
        }

        $data['nama_userreq']      = mego_text_capital($data['nama_userreq']);

        $this->db->where('id_userreq', $id);
        $this->db->update('userreq', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Permission Update [ID: ' . $id . '. Nama: ' . $data['nama_userreq'] . ']');
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->where('id_userreq', $id);
        $this->db->delete('userreq');

        $this->db->where('userreq_id', $id);
        $this->db->delete('userreq_permission');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('userreq dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

    public function get_datatables_query()
    {
        $table          = 'userreq';
        $column_order   = array('nama_userreq','uploadby_userreq', 'uploaddate_userreq');
        $column_search  = array('uploaddate_userreq', 'uploadby_userreq', 'nama_userreq');
        $order          = array('nama_userreq' => 'asc');

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
        $this->db->from('userreq');
        return $this->db->count_all_results();
    }

}
