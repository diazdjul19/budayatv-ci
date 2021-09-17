<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Realisasi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('uang_muka_model');
        $this->load->model('proyek_model');
    }

    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_realisasi', $id);
            return $this->db->get('realiasi')->row();
        }

        return $this->db->get('realiasi')->result();
    }

    public function get_list($proyek, $id){
        $this->db->where('proyek_id_realisasi', $proyek);
        $this->db->where('uang_muka_id_realisasi', $id);

        return $this->db->get('realiasi')->result();
    }

    public function add_total($id, $nom){
        $d = $this->uang_muka_model->get($id);

        $total = $d->realiasi_total_uang_muka + $nom;

        $this->add_total_bq_real($d->proyek_id_uang_muka, $nom);

        $this->db->where('id_uang_muka', $id);
        $this->db->update('uang_muka', ['realiasi_total_uang_muka' => $total]);
    }

    public function add_total_bq_real($id, $nom){
        $d = $this->proyek_model->get($id);
        $total = $d->bq_real_proyek + $nom;

        $this->db->where('id_proyek', $id);
        $this->db->update('Proyek1', ['bq_real_proyek' => $total]);
    }

    public function add($data){
        $data['tgl_realisasi'] = tgl_dt($data['tgl_realisasi']);
        $data['nominal_realisasi'] = mego_number($data['nominal_realisasi']);

        $this->add_total($data['uang_muka_id_realisasi'], $data['nominal_realisasi']);

        $this->db->insert('realiasi', $data);
    }

    public function update_total($id, $val)
    {
        $d = $this->get($id);
        $p = $this->uang_muka_model->get($d->uang_muka_id_realisasi);

        $tot = $p->realiasi_total_uang_muka - $d->nominal_realisasi;
        $total = $tot + mego_number($val);

        $this->update_total_bq_real($d->proyek_id_realisasi, $d->nominal_realisasi, $val);

        $this->db->where('id_uang_muka', $d->uang_muka_id_realisasi);
        $this->db->update('uang_muka', ['realiasi_total_uang_muka' => $total]);
    }

    public function update_total_bq_real($id, $nom, $val){
        $p = $this->proyek_model->get($id);

        $tot = $p->bq_real_proyek - $nom;
        $total = $tot + mego_number($val);

        $this->db->where('id_proyek', $id);
        $this->db->update('Proyek1', ['bq_real_proyek' => $total]);
    }

    public function update($data)
    {
        if($data['jenis'] == 1){
            $simpan['tgl_realisasi'] = tgl_dt($data['val']);
        }elseif($data['jenis'] == 2){
            $simpan['ket_realisasi'] = $data['val'];
        }else{
            $this->update_total($data['id'], $data['val']);
            $simpan['nominal_realisasi'] = mego_number($data['val']);
        }

        $this->db->where('id_realisasi', $data['id']);
        $this->db->update('realiasi', $simpan);
    }

    public function hapus_total($id)
    {
        $d = $this->get($id);
        $p = $this->uang_muka_model->get($d->uang_muka_id_realisasi);

        $total = $p->realiasi_total_uang_muka - $d->nominal_realisasi;
        $this->hapus_total_bq_real($d->proyek_id_realisasi, $d->nominal_realisasi);

        $this->db->where('id_uang_muka', $d->uang_muka_id_realisasi);
        $this->db->update('uang_muka', ['realiasi_total_uang_muka' => $total]);
    }

    public function hapus_total_bq_real($id, $nom){
        $p = $this->proyek_model->get($id);

        $total = $p->bq_real_proyek - $nom;

        $this->db->where('id_proyek', $id);
        $this->db->update('Proyek1', ['bq_real_proyek' => $total]);
    }

    public function delete($id){
        $this->hapus_total($id);
        $this->db->where('id_realisasi', $id);
        $this->db->delete('realiasi');
    }
}