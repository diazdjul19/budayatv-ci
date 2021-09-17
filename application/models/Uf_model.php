<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uf_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_uf', $id);
            return $this->db->get('upload_file')->row();
        }

        return $this->db->get('upload_file')->result();
    }

    public function get_relasi($id)
    {
            $this->db->where('relasi_uf', $id);
            return $this->db->get('upload_file')->row();
    }

    public function get_file($asal, $proyek = '', $relasi = '')
    {
        $this->db->where('asal_uf', $asal);

        if ($proyek) {
            $this->db->where('proyek_id_uf', $proyek);
        }

        if ($relasi) {
            $this->db->where('relasi_uf', $relasi);
        }

        return $this->db->get('upload_file')->row();
    }

    public function get_list($asal, $proyek = '', $relasi)
    {
        $this->db->where('asal_uf', $asal);

        if ($proyek) {
            $this->db->where('proyek_id_uf', $proyek);
        }

        if ($relasi) {
            $this->db->where('relasi_uf', $relasi);
        }

        return $this->db->get('upload_file')->result();
    }

    public function get_list_proyek($id)
    {
        $this->db->where('proyek_id_uf', $id);

        return $this->db->get('upload_file')->result();
    }

    public function add($data)
    {
        $this->db->insert('upload_file', $data);

    }

    public function delete($id)
    {
        $ck = $this->get($id);

        unlink("./upload/$ck->asal_uf/$ck->nama_uf");
        $this->db->where('id_uf', $id);
        $this->db->delete('upload_file');
    }

    public function delete_progress($id)
    {
        $ck = $this->get_relasi($id);

        unlink("./upload/$ck->asal_uf/$ck->nama_uf");
        $this->db->where('relasi_uf', $id);
        $this->db->delete('upload_file');
    }

    public function delete_proyek($id)
    {
        $bq = $this->get_list_proyek($id);

        foreach ($bq as $b) {
            unlink("./upload/$b->asal_uf/$b->nama_uf");
        }
        $this->db->where('proyek_id_uf', $id);
        $this->db->delete('upload_file');
    }
}