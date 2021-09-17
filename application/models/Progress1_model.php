<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progress1_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('proyek_model');
        $this->load->model('penagihan_model');
        $this->load->model('uf_model');

    }

    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_progress', $id);
            return $this->db->get('progress')->row();
        }

        return $this->db->get('progress')->result();
    }

    public function get_data($proyek, $id){
        $this->db->where('proyek_id_progress', $proyek);
        $this->db->where('penagihan_id_progress', $id);

        return $this->db->get('progress')->row();
    }

    public function get_list($proyek, $id)
    {
        $this->db->where('proyek_id_progress', $proyek);
        $this->db->where('penagihan_id_progress', $id);

        return $this->db->get('progress')->result();
    }

    public function get_proyek($proyek)
    {
        $this->db->where('proyek_id_progress', $proyek);

        return $this->db->get('progress')->result();
    }


    public function get_progress($id){
        $this->db->where('proyek_id_progress', $id);
        $this->db->order_by('persen_progress', 'desc');
        $d = $this->db->get('progress')->row();

        return $d->persen_progress;
    }

    public function add($data){
        unset($data['file']);
        $data['tgl_progress'] = tgl_dt($data['tgl_progress']);
        $this->db->insert('progress', $data);

        $this->proyek_model->update_proyek($data['proyek_id_progress'], ['progres_proyek' => $data['persen_progress']]);
        $this->penagihan_model->update_proyek($data['penagihan_id_progress'], ['status_penagihan' => 1]);
    }

    public function delete_proyek($id){
        $this->db->where('proyek_id_progress', $id);
        $this->db->delete('progress');
    }

    public function delete($id){
        $ck = $this->get($id);

        if($ck->bast_progress == 1){
            $this->uf_model->delete_progress($ck->penagihan_id_progress);
        }

        $this->db->where('id_progress', $id);
        $this->db->delete('progress');

        $p = $this->get_progress($ck->proyek_id_progress);
        $this->proyek_model->update_proyek($ck->proyek_id_progress, ['progres_proyek' => $p]);
        $this->penagihan_model->update_proyek($ck->penagihan_id_progress, ['status_penagihan' => 0]);

    }
}