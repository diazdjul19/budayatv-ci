<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('user_model');

    }
    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_lokasi', $id);
            return $this->db->get('lokasi')->row();
        }

        $this->db->order_by('tipe_lokasi DESC', 'nama_lokasi ASC');
        return $this->db->get('lokasi')->result();
    }

    public function add($data)
    {
        $this->db->insert('lokasi', $data);
        logActivity('Lokasi baru [ Nama: ' . $data['nama_lokasi'] . ']');

    }

    public function add_return($data)
    {
        $this->db->insert('lokasi', $data);
        $id = $this->db->insert_id();
        logActivity('Lokasi baru [ Nama: ' . $data['nama_lokasi'] . ']');

        return $id;

    }

    public function update($data, $id)
    {

        $this->db->where('id_lokasi', $id);
        $this->db->update('lokasi', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Lokasi Update [ID: ' . $id . '. Nama: ' . $data['nama_lokasi'] . ']');
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->where('id_lokasi', $id);
        $this->db->delete('lokasi');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Lokasi dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

    public function get_datatables_query()
    {
        $table          = 'lokasi';
        $column_order   = array('nama_lokasi');
        $column_search  = array('nama_lokasi');
        $order          = array('nama_lokasi' => 'asc');

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
        $this->db->from('lokasi');
        return $this->db->count_all_results();
    }

    public function cek_nama($nama, $id){
        if (!$id) {
            return $this->db->where('nama_lokasi', $nama)
                ->get('lokasi')->num_rows();
        }else{

            $cek = $this->db->where(array('id_lokasi' => $id,'nama_lokasi' => $nama))
                ->get('lokasi')->num_rows();

            if($cek == 1){
                return 0;
            }else{
                return $this->db->where('nama_lokasi', $nama)
                    ->get('lokasi')->num_rows();
            }
        }
    }

    public function increase_total($id){
        $t                      = $this->get($id);
        $data['user_lokasi']    = $t->user_lokasi + 1;

        $this->db->where('id_lokasi', $id);
        $this->db->update('lokasi', $data);
    }


    public function decrease_total($id){
        $t                      = $this->get($id);
        $data['user_lokasi']    = $t->user_lokasi - 1;

        $this->db->where('id_lokasi', $id);
        $this->db->update('lokasi', $data);
    }

    public function set_new_group($val, $id = ''){
        if($val != '' || $val != 0){
            $this->increase_total($val);

            if($id) {
                $d = $this->user_model->get($id);
                if ($d->lokasi_id_user != 0) {
                    $this->decrease_total($d->lokasi_id_user);
                }
            }
        }else{
            if($id) {
                $d = $this->user_model->get($id);
                if ($d->lokasi_id_user != 0) {
                    $this->decrease_total($d->lokasi_id_user);
                }
            }
        }

    }

    public function delete_group($id){
        $d = $this->user_model->get($id);
        if ($d->lokasi_id_user != 0) {
            $this->decrease_total($d->lokasi_id_user);
        }
    }

}
