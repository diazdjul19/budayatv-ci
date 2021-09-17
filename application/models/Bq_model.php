<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bq_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('proyek_model');
    }

    public function get($id = '')
    {
        $this->db->join('bq_list', 'bq.bq_list_id = bq_list.id_bq_list', 'left');

        if ($id) {
            $this->db->where('id_bq', $id);
            return $this->db->get('bq')->row();
        }
        return $this->db->get('bq')->result();
    }

    public function get_list($id){
        $this->db->join('bq_list', 'bq.bq_list_id = bq_list.id_bq_list', 'left');
        $this->db->where('proyek_id_bq', $id);
        $this->db->where('tipe_bq !=', 2);
        return $this->db->get('bq')->result();
    }

    public function get_ppn($id){
        $this->db->join('bq_list', 'bq.bq_list_id = bq_list.id_bq_list', 'left');
        $this->db->where('proyek_id_bq', $id);
        $this->db->where('tipe_bq !=', 2);
        $this->db->where('ppn_bq_list', 1);
        $nominal = $this->db->get('bq')->row();

        if($nominal){
            return $nominal->nominal_bq;
        }
        return 0;
    }

    public function update_nominal($data)
    {
        $d = $this->get($data['id']);
        $p = $this->proyek_model->get($d->proyek_id_bq);

        $tot = $p->bq_proyek - $d->nominal_bq;
        $total = $tot + mego_number($data['val']);

        $kirim['bq_proyek'] = $total;
        $this->proyek_model->update_proyek($d->proyek_id_bq, $kirim);

        $simpan['nominal_bq'] = mego_number($data['val']);

        $this->db->where('id_bq', $data['id']);
        $this->db->update('bq', $simpan);
    }

    public function get_total_head($id)
    {
        $total = 0;
        $this->db->where('head_bq', $id);
        $data = $this->db->get('bq')->result();

        foreach ($data as $d) {
            $total += $d->nominal_bq;
        }

        return $total;
    }

    public function add($data)
    {
        $this->db->insert('bq', $data);
        logActivity('bq baru [ Nama: ' . $data['nama_bq'] . ']');

    }

    public function add_return($data)
    {
        $this->db->insert('bq', $data);
        $id = $this->db->insert_id();
        logActivity('bq baru [ Nama: ' . $data['nama_bq'] . ']');

        return $id;

    }

    public function update($data, $id)
    {

        $this->db->where('id_bq', $id);
        $this->db->update('bq', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('bq Update [ID: ' . $id . '. Nama: ' . $data['nama_bq'] . ']');
            return true;
        }
        return false;
    }

    public function delete_proyek($id){
        $this->db->where('proyek_id_bq', $id);
        $this->db->delete('bq');
    }

    public function delete($id)
    {
        $this->db->where('id_bq', $id);
        $this->db->delete('bq');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('bq dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

    public function get_datatables_query()
    {
        $table = 'bq';
        $column_order = array('nama_bq');
        $column_search = array('nama_bq');
        $order = array('nama_bq' => 'asc');

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
        $this->db->from('bq');
        return $this->db->count_all_results();
    }

    public function cek_nama($nama, $id)
    {
        if (!$id) {
            return $this->db->where('nama_bq', $nama)
                ->get('bq')->num_rows();
        } else {

            $cek = $this->db->where(array('id_bq' => $id, 'nama_bq' => $nama))
                ->get('bq')->num_rows();

            if ($cek == 1) {
                return 0;
            } else {
                return $this->db->where('nama_bq', $nama)
                    ->get('bq')->num_rows();
            }
        }
    }

}
