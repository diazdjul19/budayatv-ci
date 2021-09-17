<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    public function get($id = '')
    {

        $this->db->join('proyek_tipe', 'proyek_tipe.id_proyek_t = proyek.tipe_proyek', 'left');
        if ($id) {
            $this->db->where('id_proyek', $id);
            return $this->db->get('proyek')->row();
        }

        $this->db->order_by('thn_anggaran_proyek', 'desc');

        return $this->db->get('proyek')->result();
    }

    public function get_progress($id = '')
    {
        $this->db->join('proyek_tipe', 'proyek_tipe.id_proyek_t = proyek.tipe_proyek', 'left');
        $this->db->where('selesai_proyek', 0);

        if ($id) {
            $this->db->where('id_proyek', $id);
            return $this->db->get('proyek')->row();
        }

        $this->db->order_by('thn_anggaran_proyek desc', 'nama_proyek asc');

        return $this->db->get('proyek')->result();
    }

    public function total($thn){
        $this->db->where('thn_anggaran_proyek', $thn);
        $data = $this->db->get('proyek')->result();

        $tot = 0;
        foreach($data as $d){
            $tot += $tot + $d->nilai_pr_proyek;
//            $tot += $d->nilai_pg_proyek;
//            $tot += $d->nilai_pl_proyek;
        }

        return $tot;
    }

    public function add($data)
    {
        $this->db->insert('proyek', $data);
        logActivity('proyek baru', 'proyek', 1);

    }

    public function update($data, $id)
    {
        $this->db->where('id_proyek', $id);
        $this->db->update('proyek', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('proyek Update [ID: ' . $id . ']', 'proyek', 2);
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->where('id_proyek', $id);
        $this->db->delete('proyek');

        $this->db->where('proyek_id_spk', $id);
        $this->db->delete('spk');

        $this->db->where('proyek_id_progress', $id);
        $this->db->delete('progress');

    }

    public function update_tl($data, $tipe, $id)
    {
        if($tipe == 1){
            $kirim['ud_proyek'] =  tgl_dt($data);
        }elseif($tipe == 2){
            $kirim['ui_proyek'] =  tgl_dt($data);
        }elseif($tipe == 3){
            $kirim['kd_proyek'] =  tgl_dt($data);
        }else{
            $kirim['ki_proyek'] =  tgl_dt($data);
        }
        $this->db->where('id_proyek', $id);
        $this->db->update('proyek', $kirim);

        $this->cek_update_tl($id, $tipe, $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity("Update User Req Deadline $data", 'proyek', 2);
            return true;
        }
        return false;
    }

    public function update_tl_pg($data, $tipe, $id)
    {
        if($tipe == 1){
            $kirim['ud_pg_proyek'] =  tgl_dt($data);
        }elseif($tipe == 2){
            $kirim['ui_pg_proyek'] =  tgl_dt($data);
        }elseif($tipe == 3){
            $kirim['kd_pg_proyek'] =  tgl_dt($data);
        }else{
            $kirim['ki_pg_proyek'] =  tgl_dt($data);
        }
        $this->db->where('id_proyek', $id);
        $this->db->update('proyek', $kirim);

        $this->cek_update_tl($id, $tipe, $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity("Update User Req Deadline $data", 'proyek', 2);
            return true;
        }
        return false;
    }


    public function update_tl_pl($data, $tipe, $id)
    {
        if($tipe == 1){
            $kirim['ud_pl_proyek'] =  tgl_dt($data);
        }elseif($tipe == 2){
            $kirim['ui_pl_proyek'] =  tgl_dt($data);
        }elseif($tipe == 3){
            $kirim['kd_pl_proyek'] =  tgl_dt($data);
        }else{
            $kirim['ki_pl_proyek'] =  tgl_dt($data);
        }
        $this->db->where('id_proyek', $id);
        $this->db->update('proyek', $kirim);

        $this->cek_update_tl($id, $tipe, $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity("Update User Req Deadline $data", 'proyek', 2);
            return true;
        }
        return false;
    }


    public function cek_update_tl($idp, $tipe, $tgl){
        $this->db->where('proyek_id_pl', $idp);
        $this->db->where('tipe_pl', $tipe);
        $cek = $this->db->get('proyek_log')->result();

        if(!count($cek)){
            $this->db->insert('proyek_log', [
                'proyek_id_pl' => $idp,
                'tgl_pl' => tgl_dt($tgl),
                'tipe_pl' => $tipe
            ]);
        }else{
            $this->db->where('proyek_id_pl', $idp);
            $this->db->where('tipe_pl', $tipe);
            $this->db->update('proyek_log', ['tgl_pl' => tgl_dt($tgl)]);
        }
    }

    public function get_datatables_query()
    {

        $this->db->from('proyek');
        $this->db->join('proyek_tipe', 'proyek_tipe.id_proyek_t = proyek.tipe_proyek', 'left');

        if ($_POST['search']['value']) {
            $this->db->like('nama_proyek', $_POST['search']['value']);
        }

        if ($this->input->post('tipe') && $this->input->post('tipe') != '') {
            $this->db->where('tipe_proyek', $this->input->post('tipe'));
        }

        if ($this->input->post('tahun') && $this->input->post('tahun') != '') {
            $this->db->where('thn_anggaran_proyek', $this->input->post('tahun'));
        }

        $this->db->order_by('nama_proyek asc', 'thn_anggaran_proyek desc' );
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
        $this->db->from('proyek');
        return $this->db->count_all_results();
    }
}