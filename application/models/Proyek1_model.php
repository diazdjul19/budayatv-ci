<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek1_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('proyek_status_model');
        $this->load->model('penagihan_model');
        $this->load->model('bq_model');
        $this->load->model('bq_file_model');
        $this->load->model('progress_model');
        $this->load->model('proyek_status_model');
        $this->load->model('tagih_model');
        $this->load->model('uang_muka_model');
        $this->load->model('uang_muka_tarik_model');
        $this->load->model('uf_model');

    }

    public function get($id = '')
    {
        $this->db->join('klien', 'proyek.klien_id_proyek = klien.id_klien', 'left');
        $this->db->join('group_bisnis', 'proyek.group_bisnis_proyek = group_bisnis.id_group_bisnis', 'left');
        $this->db->join('lokasi', 'proyek.cabang_bisnis_proyek = lokasi.id_lokasi', 'left');

        if ($id) {
            $this->db->where('id_proyek', $id);
            return $this->db->get('Proyek1')->row();
        }

        return $this->db->get('Proyek1')->result();
    }

    public function get_tender($id)
    {
        $this->db->where('tender_id_proyek', $id);
        return $this->db->get('Proyek1')->row();
    }

    public function add_stlp1($data)
    {
        $data['tgl_proyek'] = tgl_dt($data['tgl_proyek']);
        $data['tgl_spk_proyek'] = tgl_dt($data['tgl_spk_proyek']);
        $data['mulai_proyek'] = tgl_dt($data['tgl_proyek']);
        $data['selesai_proyek'] = tgl_dt($data['selesai_proyek']);
        $data['tahap_proyek'] = 1;
        $data['nilai_proyek'] = mego_number($data['nilai_proyek']);
        $data['ppn_proyek'] = mego_number($data['ppn_proyek']);
        $data['in_ppn_proyek'] = mego_number($data['in_ppn_proyek']);
        $data['pph_proyek'] = mego_number($data['pph_proyek']);
        $data['net_proyek'] = mego_number($data['net_proyek']);
        $data['tgl_retensi_proyek'] = $this->get_tgl_retensi($data['selesai_proyek'], $data['retensi_proyek']);
        $data['jum_hari_proyek'] = tgl_selisih(tgl_dt($data['tgl_proyek']), tgl_dt($data['selesai_proyek']));

        unset($data['u_tgl_retensi_proyek']);

        $this->db->insert('Proyek1', $data);

        $idn = $this->db->insert_id();

        $this->proyek_status_model->update($idn, 0);

        logActivity('Proyek baru [ Nama: ' . $data['nama_proyek'] . ']');

        return $idn;
    }

    public function update_stlp1($data, $id)
    {
        $data['tgl_proyek'] = tgl_dt($data['tgl_proyek']);
        $data['mulai_proyek'] = tgl_dt($data['tgl_proyek']);
        $data['selesai_proyek'] = tgl_dt($data['selesai_proyek']);
        $data['nilai_proyek'] = mego_number($data['nilai_proyek']);
        $data['ppn_proyek'] = mego_number($data['ppn_proyek']);
        $data['in_ppn_proyek'] = mego_number($data['in_ppn_proyek']);
        $data['pph_proyek'] = mego_number($data['pph_proyek']);
        $data['net_proyek'] = mego_number($data['net_proyek']);
        $data['tgl_retensi_proyek'] = $this->get_tgl_retensi($data['selesai_proyek'], $data['retensi_proyek']);
        $data['jum_hari_proyek'] = tgl_selisih(tgl_dt($data['tgl_proyek']), tgl_dt($data['selesai_proyek']));

        unset($data['u_tgl_retensi_proyek']);

        $this->db->where('id_proyek', $id);
        $this->db->update('Proyek1', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Proyek Update [ID: ' . $id . '. Nama: ' . $data['nama_proyek'] . ']');
            return true;
        }
        return false;
    }

    public function get_tgl_retensi($t1, $t2){
        $tgl1 = tgl_dt($t1);
        $tgl2 = $t2;

        return tgl_tambah($tgl1, $tgl2);
    }

    public function update_stlp2($data, $id)
    {
        $simpan['tipe_bq'] = $this->get_tipe_bq($data);
        $simpan['proyek_id_bq'] = $id;
        $simpan['bq_list_id'] = $this->id_bq_list($data);
        $simpan['nominal_bq'] = mego_number($data['harga']);
        if(isset($data['head'])){
            $simpan['head_bq'] = $data['head'];
        }

        $this->db->insert('bq', $simpan);

        $p = $this->get($id);

        if ($this->get_tipe_bq($data) != 1) {
            $total['bq_proyek'] = $p->bq_proyek + mego_number($data['harga']);
        } else {
            $total['bq_proyek'] = $p->bq_proyek;
        }

        $this->db->where('id_proyek', $id);
        $this->db->update('Proyek1', $total);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('BQ Update');
            return true;
        }
        return false;
    }

    public function get_bq($id)
    {
        $this->db->where('proyek_id_bq', $id);
        $this->db->where('tipe_bq !=', 2);
        $this->db->join('bq_list', 'bq.bq_list_id = bq_list.id_bq_list', 'left');

        return $this->db->get('bq')->result();
    }

    public function get_tipe_bq($data)
    {
        if (isset($data['head'])) {
            return 2;
        } else {
            if ($data['harga'] != '' || $data['harga'] != 0) {
                return 0;
            } else {
                return 1;
            }
        }
    }

    public function id_bq_list($data)
    {
        $t = $this->cari_bq_list($data);
        if ($t) {
            $nm = $this->get_bq_list($data);
            return $nm->id_bq_list;
        } else {
            return $this->tambah_bq_list($data);
        }
    }

    public function get_bq_list($data)
    {
        if (isset($data['head'])) {
            $this->db->where('head_bq_list', $data['head']);
            $this->db->where('tipe_bq_list', 2);
        } else {
            if ($data['harga'] != '' || $data['harga'] != 0) {
                $this->db->where('head_bq_list', 0);
                $this->db->where('tipe_bq_list', 0);
            } else {
                $this->db->where('head_bq_list', 0);
                $this->db->where('tipe_bq_list', 1);
            }
        }
        $this->db->where('nama_bq_list', $data['nama']);
        return $this->db->get('bq_list')->row();
    }

    public function cari_bq_list($data)
    {
        if (isset($data['head'])) {
            $this->db->where('head_bq_list', $data['head']);
            $this->db->where('tipe_bq_list', 2);
        } else {
            if ($data['harga'] != '' || $data['harga'] != 0) {
                $this->db->where('head_bq_list', 0);
                $this->db->where('tipe_bq_list', 0);
            } else {
                $this->db->where('head_bq_list', 0);
                $this->db->where('tipe_bq_list', 1);
            }
        }
        $this->db->where('nama_bq_list', $data['nama']);
        return $this->db->get('bq_list')->num_rows();
    }

    public function tambah_bq_list($data)
    {
        if (isset($data['head'])) {
            $simpan['head_bq_list'] = $data['head'];
            $simpan['tipe_bq_list'] = 2;
        } else {
            if ($data['harga'] != '' || $data['harga'] != 0) {
                $simpan['head_bq_list'] = 0;
                $simpan['tipe_bq_list'] = 0;
            } else {
                $simpan['head_bq_list'] = 0;
                $simpan['tipe_bq_list'] = 1;
            }
        }

        $simpan['nama_bq_list'] = $data['nama'];
        $this->db->insert('bq_list', $simpan);

        return $this->db->insert_id();
    }

    public function update_stlp3($data, $id)
    {
        $data['proyek_id_uang_muka'] = $id;
        $data['nominal_uang_muka'] = mego_number($data['nominal_uang_muka']);
        $data['tgl_uang_muka'] = tgl_dt($data['tgl_uang_muka']);
        $data['jawab_uang_muka'] = tgl_dt($data['jawab_uang_muka']);

        $this->db->insert('uang_muka', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('BQ Update');
            return true;
        }
        return false;
    }

    public function get_um($id)
    {
        $this->db->where('proyek_id_uang_muka', $id);
        $this->db->order_by('tgl_uang_muka', 'asc');

        return $this->db->get('uang_muka')->result();
    }

    public function update_stlp4($data, $id)
    {
        $data['proyek_id_penagihan'] = $id;
        $data['nominal_penagihan'] = mego_number($data['nominal_penagihan']);
        $data['tgl_penagihan'] = tgl_dt($data['tgl_penagihan']);

        $this->db->insert('penagihan', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Penagihan Update');
            return true;
        }
        return false;
    }

    public function get_penagihan($id)
    {
        $this->db->where('proyek_id_penagihan', $id);
        $this->db->order_by('tipe_penagihan', 'asc');
        $this->db->order_by('tgl_penagihan', 'asc');

        return $this->db->get('penagihan')->result();
    }

    public function set_menunggu_konfirmasi($id){
        $this->db->where('id_proyek', $id);
        $this->db->update('Proyek1', ['approval_proyek' => 1]);

        $this->proyek_status_model->update($id, 1);

    }

    public function set_revisi($id){
        $this->db->where('id_proyek', $id);
        $this->db->update('Proyek1', ['approval_proyek' => 2]);

        $this->proyek_status_model->update($id, 2);
    }

    public function set_menunggu_konfirmasi_revisi($id){
        $this->db->where('id_proyek', $id);
        $this->db->update('Proyek1', ['approval_proyek' => 3]);

        $this->proyek_status_model->update($id, 3);
    }

    public function set_setuju($id){
        $this->db->where('id_proyek', $id);
        $this->db->update('Proyek1', ['approval_proyek' => 9]);

        $this->proyek_status_model->update($id, 9);
    }

    public function delete($id)
    {
        $this->penagihan_model->delete_proyek($id);
        $this->bq_model->delete_proyek($id);
        $this->bq_file_model->delete_proyek($id);
        $this->progress_model->delete_proyek($id);
        $this->proyek_status_model->delete_proyek($id);
        $this->tagih_model->delete_proyek($id);
        $this->uang_muka_model->delete_proyek($id);
        $this->uang_muka_tarik_model->delete_proyek($id);
        $this->uf_model->delete_proyek($id);

        $this->db->where('id_proyek', $id);
        $this->db->delete('Proyek1');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Proyek dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

    public function delete_bq($id, $tipe)
    {
        $this->load->model('bq_model');
        $d = $this->bq_model->get($id);
        $total = $this->get($d->proyek_id_bq);

        if($tipe == 0){
            $now = $total->bq_proyek - $d->nominal_bq;
            $kirim['bq_proyek'] = $now;

            $this->db->where('id_bq', $id);
            $this->db->delete('bq');


        }elseif($tipe == 1){
            $sub = $this->bq_model->get_total_head($id);
            $now = $total->bq_proyek - $sub;
            $kirim['bq_proyek'] = $now;


            $this->db->where('id_bq', $id);
            $this->db->delete('bq');

            $this->db->where('head_bq', $id);
            $this->db->delete('bq');
        }else{
            $now = $total->bq_proyek - $d->nominal_bq;
            $kirim['bq_proyek'] = $now;


            $this->db->where('id_bq', $id);
            $this->db->delete('bq');

        }

        $this->update_proyek($d->proyek_id_bq, $kirim);
    }

    public function update_proyek($id, $data){
        $this->db->where('id_proyek', $id);
        $this->db->update('Proyek1', $data);
    }

    public function get_progress($id){
        $this->db->where('id_proyek', $id);
        $pr = $this->db->get('Proyek1')->row();
        return $pr->progres_proyek;
    }

    public function get_pendapatan_proyek($id){
        $this->db->where('proyek_id_penagihan',$id);
        $pendapatan = $this->db->get('penagihan')->result();

        $kirim = 0;

        if(count($pendapatan)){
            foreach ($pendapatan as $p){
                $kirim = $kirim + ($p->invoice_nominal_penagihan * 97 / 100);
            }
        }

        return round($kirim,0);

    }

    public function get_datatables_query()
    {
        $table = 'Proyek1';
        $column_order = array('nama_proyek');
        $column_search = array('nama_proyek', 'nama_klien');
        $order = array('nama_proyek' => 'asc');

        $this->db->from($table);
        $this->db->join('klien', 'proyek.klien_id_proyek = klien.id_klien', 'left');
        $this->db->join('group_bisnis', 'proyek.group_bisnis_proyek = group_bisnis.id_group_bisnis', 'left');
        $this->db->join('lokasi', 'proyek.cabang_bisnis_proyek = lokasi.id_lokasi', 'left');

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
        $this->db->from('Proyek1');
        return $this->db->count_all_results();
    }

    public function cek_no($no, $id)
    {
        if (!$id) {
            return $this->db->where('no_proyek', $no)
                ->get('Proyek1')->num_rows();
        } else {

            $cek = $this->db->where(array('id_proyek' => $id, 'no_proyek' => $no))
                ->get('Proyek1')->num_rows();

            if ($cek == 1) {
                return 0;
            } else {
                return $this->db->where('no_proyek', $no)
                    ->get('Proyek1')->num_rows();
            }
        }
    }

    public function cek_no_dok($no, $id)
    {
        if (!$id) {
            return $this->db->where('no_dokumen_proyek', $no)
                ->get('Proyek1')->num_rows();
        } else {

            $cek = $this->db->where(array('id_proyek' => $id, 'no_dokumen_proyek' => $no))
                ->get('Proyek1')->num_rows();

            if ($cek == 1) {
                return 0;
            } else {
                return $this->db->where('no_dokumen_proyek', $no)
                    ->get('Proyek1')->num_rows();
            }
        }
    }

    public function cek_no_spk($no, $id)
    {
        if (!$id) {
            return $this->db->where('no_spk_proyek', $no)
                ->get('Proyek1')->num_rows();
        } else {

            $cek = $this->db->where(array('id_proyek' => $id, 'no_spk_proyek' => $no))
                ->get('Proyek1')->num_rows();

            if ($cek == 1) {
                return 0;
            } else {
                return $this->db->where('no_spk_proyek', $no)
                    ->get('Proyek1')->num_rows();
            }
        }
    }


}
