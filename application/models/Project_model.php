<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_project', $id);
            $this->db->join('pihak', 'pihak.id_pihak = project.pelaksana_project', 'left');
            $this->db->join('pekerjaan', 'pekerjaan.id_pek = project.pekerjaan_id', 'left');
            return $this->db->get('project')->row();
        }
        return $this->db
            ->join('pihak', 'pihak.id_pihak = project.pelaksana_project', 'left')
            ->join('pekerjaan', 'pekerjaan.id_pek = project.pekerjaan_id', 'left')
            ->get('project')->result();
    }

    public function add($data)
    {
        $data['waktu_project']          = tgl_dt($data['waktu_project']);
        $data['createdate_project']     = date('Y-m-d H:i:s');
        $data['createby_project']       = get_staff_user_id();

        logActivity('project baru [ Nama: ' . $data['nama_project'] . ']');
        $this->db->insert('project', $data);

        $id = $this->db->insert_id();
        return $id;
    }

    public function update($data, $id)
    {


        $this->db->where('id_project', $id);
        $this->db->update('project', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('project Update [ID: ' . $id . '. Nama: ' . $data['nama_project'] . ']');
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->where('id_project', $id);
        $this->db->delete('project');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('project dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

    public function get_datatables_query()
    {
        $table          = 'project';
        $column_order   = array('nama_project','telp_project', 'web_project');
        $column_search  = array('nama_project','telp_project', 'web_project');
        $order          = array('nama_project' => 'asc');

        $this->db->from($table);
        $this->db->join('pihak', 'pihak.id_pihak = project.pelaksana_project', 'left');
        $this->db->join('pekerjaan', 'pekerjaan.id_pek = project.pekerjaan_id', 'left');

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
        $this->db->from('project');
        return $this->db->count_all_results();
    }

    public function cek_nama($nama, $id){
        if (!$id) {
            return $this->db->where('nama_project', $nama)
                ->get('project')->num_rows();
        }else{

            $cek = $this->db->where(array('id_project' => $id,'nama_project' => $nama))
                ->get('project')->num_rows();

            if($cek == 1){
                return 0;
            }else{
                return $this->db->where('nama_project', $nama)
                    ->get('project')->num_rows();
            }
        }
    }


}
