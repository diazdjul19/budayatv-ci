<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Add modul akses
     * @param  array $data role data
     * @return boolean
     */

    public function add($data)
    {
        $this->load->helper('phpass');
        $hasher              = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
        $data['pass_user']    = $hasher->HashPassword($data['pass_user']);

        $this->db->insert('user', $data);

        logActivity('User admin baru [ID: ' . $data['id_user'] . '. Nama: ' . $data['nama_user'] . ', Email: ' . $data['email_user'] . ']');
    }

    /**
     * Update modul akses
     * @param  array $data role data
     * @param  mixed $id role id
     * @return boolean
     */
    public function update($data, $id)
    {
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('User admin Update [ID: ' . $id . '. Nama: ' . $data['nama_user'] . ', Email: ' . $data['email_user'] . ']');
            return true;
        }
        return false;
    }

    /**
     * Get modul akses by id
     * @param  mixed $id Optional role id
     * @return mixed     array if not id passed else object
     */
    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_user', $id);
            return $this->db->get('user')->row();
        }
        return $this->db->get('user')->result();
    }

    /**
     * Delete module akses
     * @param  mixed $id modul akses
     * @return mixed
     */
    public function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('User admin dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

}
