<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_lunas_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    public function get_datatables_query()
    {
        $table = 'penagihan';
        $column_search = ['nama_proyek','invoice_penagihan'];

        $this->db->from($table);
        $this->db->join('Proyek1',"proyek.id_proyek = $table.proyek_id_penagihan",'left');
        $this->db->join('klien', 'proyek.klien_id_proyek = klien.id_klien', 'left');
        $this->db->join('group_bisnis', 'proyek.group_bisnis_proyek = group_bisnis.id_group_bisnis', 'left');
        $this->db->join('lokasi', 'proyek.cabang_bisnis_proyek = lokasi.id_lokasi', 'left');
        $this->db->where('tahap_penagihan',3);

        if ($this->input->post('status_selesai') && $this->input->post('status_selesai') != '') {
            $this->db->where('st_selesai_proyek', $this->input->post('status_selesai'));
        }

        if ($this->input->post('klien') && $this->input->post('klien') != '') {
            $this->db->where('id_klien', $this->input->post('klien'));
        }

        if ($this->input->post('mulai') != '' && $this->input->post('selesai') != '' ) {
            $ml = tgl_dt($this->input->post('mulai'));
            $sl = tgl_dt($this->input->post('selesai'));

            $this->db->where('mulai_proyek >=', $ml);
            $this->db->where('mulai_proyek <=', $sl);
        }

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
        $this->db->from('Proyek1');
        return $this->db->count_all_results();
    }
}