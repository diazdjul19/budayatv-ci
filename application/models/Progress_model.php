<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progress_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('proyek_model');

    }

    public function get($id = '')
    {
        $this->db->join('spk', 'spk.id_spk = progress.spk_id_progress', 'left');
        if ($id) {
            $this->db->where('id_progress', $id);
            return $this->db->get('progress')->row();
        }

        return $this->db->get('progress')->result();
    }

    public function get_spk($id)
    {
        $this->db->where('spk_id_progress', $id);
        $this->db->order_by('tgl_progress', 'asc');
        return $this->db->get('progress')->result();
    }

    public function get_data($proyek, $id)
    {
        $this->db->where('proyek_id_progress', $proyek);
        $this->db->where('penagihan_id_progress', $id);

        return $this->db->get('progress')->row();
    }


    public function get_proyek($proyek, $spk)
    {
        $this->db->where('proyek_id_progress', $proyek);
        $this->db->where('spk_id_progress', $spk);
        $this->db->order_by('tgl_progress', 'asc');

        return $this->db->get('progress')->result();
    }


    public function get_progress($id)
    {
        $this->db->where('proyek_id_progress', $id);
        $this->db->order_by('persen_progress', 'desc');
        $d = $this->db->get('progress')->row();

        return $d->persen_progress;
    }

    public function add($data)
    {
        $data['tgl_progress'] = tgl_dt($data['tgl_progress']);
        $this->db->insert('progress', $data);
    }

    public function update_bayar($data, $id)
    {
        $this->db->where('id_progress', $id);
        $this->db->update('progress', $data);
    }

    public function update($data, $id)
    {
        $data['tgl_progress'] = tgl_dt($data['tgl_progress']);

        $this->db->where('id_progress', $id);
        $this->db->update('progress', $data);
    }

    public function update_progress($data, $deviasi, $id)
    {

        $this->db->where('id_progress', $id);
        $this->db->update('progress', [
            'real_progress' => $data,
            'deviasi_progress' => $deviasi
        ]);

        $this->create_spk_deviasi($id);
    }

    public function create_spk_deviasi($id)
    {
        $spk = $this->get($id);
        $d = $this->get_deviasi($spk->spk_id_progress);

        $this->db->where('id_spk', $spk->spk_id_progress);
        $this->db->update('spk', ['deviasi_spk' => $d]);
    }

    public function get_deviasi($spk)
    {
        $this->db->where('deviasi_progress !=', 0.0000);
        $this->db->where('spk_id_progress', $spk);
        $this->db->order_by('tgl_progress', 'desc');
        $d = $this->db->get('progress')->row();

        return $d->deviasi_progress;
    }

    public function delete($id)
    {
        $this->db->where('id_progress', $id);
        $this->db->delete('progress');

    }
}