<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penagihan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    public function notifi_telat(){
        $tgl = date('Y-m-d');

        $this->db->join('Proyek1', 'proyek.id_proyek = penagihan.proyek_id_penagihan', 'left');
        $this->db->where('status_penagihan', 0);
        $this->db->where('tgl_penagihan <=', $tgl);
        $this->db->order_by('tgl_penagihan', 'desc');
        return $this->db->get('penagihan')->result();
    }

    public function get_list($proyek)
    {
        $this->db->where('proyek_id_penagihan', $proyek);
        return $this->db->order_by('tipe_penagihan','asc')->order_by('persen_penagihan','asc')->get('penagihan')->result();
    }

    public function belum_ditagih($proyek)
    {
        //atas progress yang sudah tercapai
        //ini trikey. banyak parameter yang perlu dibenahiseperti ada retensi, berari ada jangka waktunya
        $this->db->from('penagihan');
        $this->db->join('progress','progress.penagihan_id_progress = penagihan.id_penagihan');
        $this->db->where('proyek_id_penagihan', $proyek);
        $this->db->where('persen_progress >=','persen_penagihan');
        $this->db->where('invoice_penagihan', '');
        return $this->db->order_by('tipe_penagihan','asc')->get()->result();
    }

    public function retensi_blm_tagih($proyek){
        $progress = $this->db->where('proyek_id_penagihan', $proyek)
                             ->where('persen_progress', 100)
                             ->get('progress')->result();

        if(count($progress)){
            $this->db->where('proyek_id_penagihan', $proyek);
            $this->db->where('tipe_penagihan', 4);
            return $this->db->get('penagihan')->row();
        }

        return 0;

    }

    public function belum_dibayar($proyek)
    {
        $this->db->where('proyek_id_penagihan', $proyek);
        $this->db->where('bayar_no_penagihan', '');
        $this->db->where('invoice_penagihan !=', '');
        return $this->db->order_by('tipe_penagihan','asc')->get('penagihan')->result();
    }

    public function sudah_dibayar($proyek)
    {
        $this->db->where('proyek_id_penagihan', $proyek);
        $this->db->where('tahap_penagihan', 3);
        return $this->db->order_by('tipe_penagihan','asc')->get('penagihan')->result();
    }

    public function get_list_penagihan($proyek){
        $this->db->where('status_penagihan', 1);
        $this->db->where('proyek_id_penagihan', $proyek);
        return $this->db->get('penagihan')->result();
    }

    public function update($data)
    {
        if ($data['jenis'] == 1) {
            $simpan['persen_penagihan'] = mego_number($data['val']);
        } elseif ($data['jenis'] == 2) {
            $simpan['nominal_penagihan'] = mego_number($data['val']);
        } else {
            $simpan['tgl_penagihan'] = tgl_dt($data['val']);
        }

        $this->db->where('id_penagihan', $data['id']);
        $this->db->update('penagihan', $simpan);
    }

    public function update_proyek($id, $data){
        $this->db->where('id_penagihan', $id);
        $this->db->update('penagihan', $data);
    }

    public function delete_proyek($id){
        $this->db->where('proyek_id_penagihan', $id);
        $this->db->delete('penagihan');
    }

    public function delete($id)
    {
        $this->db->where('id_penagihan', $id);
        $this->db->delete('penagihan');
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

        if ($this->input->post('tahap_penagihan') && $this->input->post('tahap_penagihan') != '') {
            $this->db->where('tahap_penagihan', $this->input->post('tahap_penagihan'));
        }

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

        $this->db->order_by('bayar_tgl_penagihan','desc');

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