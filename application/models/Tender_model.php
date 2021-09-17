<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tender_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get($id = '')
    {
        $this->db->join('klien', 'tender.klien_id_tender = klien.id_klien', 'left');
        $this->db->join('lokasi', 'tender.perolehan_tender = lokasi.id_lokasi', 'left');

        if ($id) {
            $this->db->where('id_tender', $id);
            return $this->db->get('tender')->row();
        }
        return $this->db->get('tender')->result();
    }

    public function get_klien($id)
    {
        $this->db->join('klien', 'tender.klien_id_tender = klien.id_klien', 'left');
        $this->db->join('lokasi', 'tender.perolehan_tender = lokasi.id_lokasi', 'left');

        $this->db->where('klien_id_tender', $id);
        return $this->db->get('tender')->result();
    }

    public function get_history($id = '')
    {
        $this->db->join('klien', 'tender.klien_id_tender = klien.id_klien', 'left');
        $this->db->join('lokasi', 'tender.perolehan_tender = lokasi.id_lokasi', 'left');
        $this->db->join('tender_pemenang', 'tender.pemenang_tender = tender_pemenang.id_pemenang', 'left');

        $this->db->where('klien_id_tender', $id);
        $this->db->order_by('tgl_tender', 'desc');
        return $this->db->get('tender')->result();
    }

    public function menang_klien($id = '')
    {
        $this->db->join('klien', 'tender.klien_id_tender = klien.id_klien', 'left');
        $this->db->join('lokasi', 'tender.perolehan_tender = lokasi.id_lokasi', 'left');

        $this->db->where('klien_id_tender', $id);
        $this->db->where('status_tender', 1);
        $this->db->order_by('tgl_tender', 'desc');

        return $this->db->get('tender')->result();
    }

    public function kalah_klien($id = '')
    {
        $this->db->join('klien', 'tender.klien_id_tender = klien.id_klien', 'left');
        $this->db->join('lokasi', 'tender.perolehan_tender = lokasi.id_lokasi', 'left');

        $this->db->where('klien_id_tender', $id);
        $this->db->where('status_tender', 2);
        $this->db->order_by('tgl_tender', 'desc');

        return $this->db->get('tender')->result();
    }

    public function onprogress_klien($id = '')
    {
        $this->db->join('klien', 'tender.klien_id_tender = klien.id_klien', 'left');
        $this->db->join('lokasi', 'tender.perolehan_tender = lokasi.id_lokasi', 'left');

        $this->db->where('klien_id_tender', $id);
        $this->db->where('status_tender', 0);
        $this->db->order_by('tgl_tender', 'desc');

        return $this->db->get('tender')->result();
    }

    public function add($data)
    {

        $data['nominal_tender'] = mego_number($data['nominal_tender']);
        $data['aw_tgl_tender'] = tgl_dt($data['aw_tgl_tender']);

        $this->db->insert('tender', $data);
        $id = $this->db->insert_id();
        logActivity('Tender Tahap 1 [ Nama: ' . $data['nama_tender'] . ']');

        return $id;

    }

    public function add_all($data)
    {

        $data['nominal_tender']     = mego_number($data['nominal_tender']);

        if(isset($data['aw_tgl_tender'])){
            $data['aw_tgl_tender']  = tgl_dt($data['aw_tgl_tender']);
            $data['tahap_tender']       = 0;
        }

        if(isset($data['pb_tgl_tender'])){
            $data['pb_tgl_tender']  = tgl_dt($data['pb_tgl_tender']);
            $data['tahap_tender']       = 1;
        }

        if(isset($data['tgl_tender'])){
            $data['tgl_tender']     = tgl_dt($data['tgl_tender']);
            $data['tahap_tender']       = 2;
        }

        $data['dibuat_oleh_tender'] = get_staff_user_id();


        $this->db->insert('tender', $data);
        $id = $this->db->insert_id();
        logActivity('Tender all in one [ Nama: ' . $data['nama_tender'] . '] dibuat');

        return $id;

    }

    public function update($data, $id)
    {
        $data['nominal_tender'] = mego_number($data['nominal_tender']);
        $data['aw_tgl_tender'] = tgl_dt($data['aw_tgl_tender']);

        $this->db->where('id_tender', $id);
        $this->db->update('tender', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('tender Update [ID: ' . $id . '. Nama: ' . $data['nama_tender'] . ']');
            return true;
        }
        return false;
    }

    public function update_tahap2($data, $id)
    {
        $d = $this->get($id);
        if ($d->tahap_tender == 0) {
            $data['tahap_tender'] = 1;
        }

        $data['pb_tgl_tender'] = tgl_dt($data['pb_tgl_tender']);

        $this->db->where('id_tender', $id);
        $this->db->update('tender', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('tender Update [ID: ' . $id . '. Nama: ' . $data['nama_tender'] . ']');
            return true;
        }
        return false;
    }

    public function update_tahap3($data, $id)
    {
        $data['tahap_tender'] = 2;
        $data['tgl_tender'] = tgl_dt($data['tgl_tender']);
        $data['penawaran_tender'] = mego_number($data['penawaran_tender']);


        $this->db->where('id_tender', $id);
        $this->db->update('tender', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Tender Update [ID: ' . $id . '. Nama: ' . $data['nama_tender'] . ']');
            return true;
        }
        return false;
    }

    public function update_tahap4($data, $id)
    {
        $data['tahap_tender'] = 3;
        $data['status_tender'] = 2;
        $data['pemenang_tender'] = $data['pemenang_tender'];
        $data['menang_tender'] = mego_number($data['menang_tender']);

        $this->db->where('id_tender', $id);
        $this->db->update('tender', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Tender Kalah [ID: ' . $id . '. Nama: ' . $data['nama_tender'] . ']');
            return true;
        }
        return false;
    }

    public function pemenang($id)
    {
        $d = $this->get($id);
        $data['tahap_tender'] = 3;
        $data['status_tender'] = 1;
        $data['pemenang_tender'] = 0;
        $data['menang_tender'] = $d->penawaran_tender;

        $this->db->where('id_tender', $id);
        $this->db->update('tender', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Tender Menang [ID: ' . $id . '. Nama: ' . $data['nama_tender'] . ']');
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->where('id_tender', $id);
        $this->db->delete('tender');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('tender dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

    public function get_datatables_query()
    {
        $table = 'tender';
        $column_search = array('nama_tender', 'nama_klien', 'aw_tgl_tender', 'tgl_tender', 'status_tender');

        $this->db->from($table);
        $this->db->join('klien', 'tender.klien_id_tender = klien.id_klien', 'left');
        $this->db->join('lokasi', 'tender.perolehan_tender = lokasi.id_lokasi', 'left');

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

        if ($this->input->post('tahap') && $this->input->post('tahap') != '') {
            $nama = explode("-", $this->input->post('tahap'));

            if($nama[0] == 'th'){
                $this->db->where('tahap_tender', $nama[1]);
            }else{
                $this->db->where('status_tender', $nama[1]);
            }
        }

        if ($this->input->post('urutan') && $this->input->post('urutan') != '') {
            $nama = explode("-", $this->input->post('urutan'));

            if($nama[1] == 'a'){
                $this->db->order_by($nama[0], 'asc');
            }else{
                $this->db->order_by($nama[0], 'desc');
            }
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
        $this->db->from('tender');
        return $this->db->count_all_results();
    }

    public function cek_nama($nama, $id)
    {
        if (!$id) {
            return $this->db->where('nama_tender', $nama)
                ->get('tender')->num_rows();
        } else {

            $cek = $this->db->where(array('id_tender' => $id, 'nama_tender' => $nama))
                ->get('tender')->num_rows();

            if ($cek == 1) {
                return 0;
            } else {
                return $this->db->where('nama_tender', $nama)
                    ->get('tender')->num_rows();
            }
        }
    }

}
