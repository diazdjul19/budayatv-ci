<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get($id = '')
    {
        $this->db->order_by('mulai_event', 'desc');
        $this->db->join('kategori_event', 'kategori_event.id_ke = event.kategori_event', 'left');

        if ($id) {
            $this->db->where('id_event', $id);
            return $this->db->get('event')->row();
        }
        return $this->db->get('event')->result();
    }

    public function get_calendar($start, $end)
    {
        $this->db->where('mulai_event >=', $start);
        $this->db->where('mulai_event <=', $end);
        $this->db->order_by('mulai_event', 'desc');
        $this->db->join('kategori_event', 'kategori_event.id_ke = event.kategori_event', 'left');

        return $this->db->get('event')->result();
    }

    public function add($data)
    {
        $data['mulai_event'] = tgl_dt($data['mulai_event']);
        $this->db->insert('event', $data);
    }

    public function update($data, $id)
    {
        $data['mulai_event'] = tgl_dt($data['mulai_event']);

        $this->db->where('id_event', $id);
        $this->db->update('event', $data);

    }

    public function delete($id)
    {
        $this->db->where('id_event', $id);
        $this->db->delete('event');
    }

    public function get_datatables_query()
    {

        $this->db->from('event');
        $this->db->join('kategori_event', 'kategori_event.id_ke = event.kategori_event', 'left');

        if ($_POST['search']['value']) {
            $this->db->like('nama_event', $_POST['search']['value']);
        }

        if ($this->input->post('kategori') && $this->input->post('kategori') != '') {
            $this->db->where('kategori_event', $this->input->post('kategori'));
        }
        $this->db->order_by('mulai_event', 'asc');
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
        $this->db->from('event');
        return $this->db->count_all_results();
    }

}
