<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_datatables_query($table, $column_search, $column_order, $order, $where = '')
    {

        $this->db->from($table);
        $i = 0;

        if($where != ''){
            $this->db->where($where);
        }

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

    function get_datatables($table, $column_search, $column_order, $order, $where = '')
    {
        $this->get_datatables_query($table, $column_search, $column_order, $order, $where);
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($table, $column_search, $column_order, $order, $where = '')
    {
        $this->get_datatables_query($table, $column_search, $column_order, $order, $where);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($table, $where ='')
    {
        $this->db->from($table);
        if($where != ''){
            $this->db->where($where);
        }
        return $this->db->count_all_results();
    }

}