<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_role', $id);
            return $this->db->get('role')->row();
        }
        return $this->db->get('role')->result();
    }

    public function get_role_permission($id)
    {
        return $this->db->where('role_id', $id)->get('role_permission')->result();
    }

    public function add($data)
    {
        $kirim['id_role'] = mego_rand();
        $kirim['nama_role'] = $data['nama_role'];

        foreach ($data['pmission'] as $key => $val) {
            echo $key;
            $field = explode('-', $key);

            $cek = $this->db
                ->where([
                    'role_id' => $kirim['id_role'],
                    'menu_rolep' => $field[0]
                ])
                ->get('role_permission')->result();

            $in['role_id'] = $kirim['id_role'];
            $in['menu_rolep'] = $field[0];
            $in[$field[1] . "_rolep"] = 1;

            if (count($cek)) {
                $this->db->where([
                    'role_id' => $kirim['id_role'],
                    'menu_rolep' => $field[0]
                ])->update('role_permission', $in);
            } else {
                $this->db->insert('role_permission', $in);
            }
            unset($in);

        }

        $this->db->insert('role', $kirim);

        logActivity('Role baru [ Nama: ' . $data['nama_role'] . ']');
    }

    public function update($data, $id)
    {
        $this->db->where('role_id', $id)
            ->delete('role_permission');

        foreach ($data['pmission'] as $key => $val) {
            $field = explode('-', $key);

            $cek = $this->db->where([
                'role_id' => $id,
                'menu_rolep' => $field[0]
            ])->get('role_permission')->result();

            $in['role_id'] = $id;
            $in['menu_rolep'] = $field[0];
            $in[$field[1] . "_rolep"] = 1;

            if (count($cek)) {
                $this->db->where([
                    'role_id' => $id,
                    'menu_rolep' => $field[0]
                ])->update('role_permission', $in);
            } else {
                $this->db->insert('role_permission', $in);
            }
            unset($in);

        }

        $kirim['nama_role'] = $data['nama_role'];

        $this->db->where('id_role', $id)
            ->update('role', $kirim);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Role Update [ID: ' . $id . '. Nama: ' . $data['nama_role'] . ']');
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->where('id_role', $id)
            ->delete('role');

        $this->db->where('role_id', $id)
            ->delete('role_permission');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Role dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

    function get_datatables()
    {
        $this->get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_datatables_query()
    {
        $table = 'role';
        $column_order = array('nama_role');
        $column_search = array('nama_role');
        $order = array('nama_role' => 'asc');

        $this->db->from($table);

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

    function count_filtered()
    {
        $this->get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from('role');
        return $this->db->count_all_results();
    }

    public function cek_nama($nama, $id)
    {
        if (!$id) {
            return $this->db->where('nama_role', $nama)
                ->get('role')->num_rows();
        } else {

            $cek = $this->db->where(array('id_role' => $id, 'nama_role' => $nama))
                ->get('role')->num_rows();

            if ($cek == 1) {
                return 0;
            } else {
                return $this->db->where('nama_role', $nama)
                    ->get('role')->num_rows();
            }
        }
    }
}
