<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spk_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_spk', $id);
            return $this->db->get('spk')->row();
        }
        return $this->db->get('spk')->result();
    }

    public function get_deviasi($tipe)
    {
        $this->db->join('proyek', 'proyek.id_proyek = spk.proyek_id_spk', 'left');
        $this->db->where('tipe_proyek', $tipe);
        $this->db->where('tipe_spk', 3);
        $this->db->order_by('deviasi_spk', 'asc');
        $this->db->limit(5, 0);
        return $this->db->get('spk')->result();

    }

    public function get_deviasi_lain()
    {
        $this->db->join('proyek', 'proyek.id_proyek = spk.proyek_id_spk', 'left');
        $this->db->where('tipe_proyek', 4);
        $this->db->or_where('tipe_proyek', 5);
        $this->db->where('tipe_spk', 3);
        $this->db->order_by('deviasi_spk', 'asc');
        $this->db->limit(5, 0);
        return $this->db->get('spk')->result();

    }

    public function get_spk($id, $tipe, $single = '')
    {
        $this->db->where('proyek_id_spk', $id);
        $this->db->where('tipe_spk', $tipe);
        $this->db->order_by('tgl_spk', 'asc');

        if ($single) {
            return $this->db->get('spk')->row();
        }
        return $this->db->get('spk')->result();
    }

    public function add($data)
    {
        if ($data['tgl_spk'] != '') $data['tgl_spk'] = tgl_dt($data['tgl_spk']);
        if ($data['mulai_spk'] != '') $data['mulai_spk'] = tgl_dt($data['mulai_spk']);
        if ($data['selesai_spk'] != '') $data['selesai_spk'] = tgl_dt($data['selesai_spk']);
        if ($data['bg_jwaktu_spk'] != '') $data['bg_jwaktu_spk'] = tgl_dt($data['bg_jwaktu_spk']);
        if ($data['bg_jwaktu_p_spk'] != '') $data['bg_jwaktu_p_spk'] = tgl_dt($data['bg_jwaktu_p_spk']);

        $data['nilai_spk'] = mego_number($data['nilai_spk']);
        $data['bg_uang_spk'] = mego_number($data['bg_uang_spk']);
        $data['bg_pelaksanaan_spk'] = mego_number($data['bg_pelaksanaan_spk']);

        if ($data['id_spk'] == '') {
            $this->db->insert('spk', $data);
        } else {
            $id = $data['id_spk'];
            unset($data['id_spk']);

            $this->db->where('id_spk', $id);
            $this->db->update('spk', $data);
        }

        logActivity('SPK baru [ Nama: ' . $data['nama_spk'] . ']', 'spk', 1);
    }

    public function update($data, $id)
    {
        $this->db->where('id_project', $id);
        $this->db->update('project', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('project Update [ID: ' . $id . '. Nama: ' . $data['nama_project'] . ']');
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->where('id_spk', $id);
        $this->db->delete('spk');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('SPK dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

    public function get_datatables_query()
    {
        $table = 'project';
        $column_order = array('nama_project', 'telp_project', 'web_project');
        $column_search = array('nama_project', 'telp_project', 'web_project');
        $order = array('nama_project' => 'asc');

        $this->db->from($table);
        $this->db->join('pihak', 'pihak.id_pihak = project.pelaksana_project', 'left');
        $this->db->join('pekerjaan', 'pekerjaan.id_pek = project.pekerjaan_id', 'left');

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
        $this->db->from('project');
        return $this->db->count_all_results();
    }


}
