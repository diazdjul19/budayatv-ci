<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bantuan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_bantuan', $id);
            return $this->db->get('bantuan')->row();
        }
        return $this->db->get('bantuan')->result();
    }

    public function add($data)
    {
        unset($data['files']);
        $data['nama_bantuan'] = mego_text_capital($data['nama_bantuan']);
        $this->db->insert('bantuan', $data);

        logActivity('Bantuan baru [ Nama: ' . $data['nama_bantuan'] . ']');
    }

    public function update($data, $id)
    {
        unset($data['files']);
        $data['nama_bantuan'] = mego_text_capital($data['nama_bantuan']);

        $this->db->where('id_bantuan', $id);
        $this->db->update('bantuan', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Bantuan Update [ID: ' . $id . '. Nama: ' . $data['nama_bantuan'] . ']');
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->where('id_bantuan', $id);
        $this->db->delete('bantuan');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('bantuan dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

    public function get_datatables_query()
    {
        $table = 'bantuan';
        $column_order = array('id_bantuan', 'nama_bantuan', 'menu_id');
        $column_search = array('id_bantuan', 'nama_bantuan');
        $order = array('menu_id' => 'asc');

        $this->db->from($table);

        $i = 0;
        foreach ($column_search as $item) {
            if ($_POST['search']['value']) {

                if ($i == 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($order)) {
            $order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->get_datatables_query();
        if ($_POST['length'] != -1)
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
        $this->db->from('bantuan');
        return $this->db->count_all_results();
    }


}
