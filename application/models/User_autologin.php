<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Autologin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Check if autologin found
     * @param  mixed $user_id clientid/staffid
     * @param  string $key key from cookie to retrieve from database
     * @return mixed
     */
    function get($user_id, $key)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('key_id', $key);
        $user = $this->db->get('userautologin')->row();
        if (!$user) {
            return NULL;
        }

        $staff = true;

        $this->db->from("user");
        $this->db->join('userautologin', 'userautologin.user_id = user.id_user');
        $this->db->where('userautologin.user_id', $user_id);
        $this->db->where('userautologin.key_id', $key);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $user = $query->row();
            return $user;
        }
        return NULL;
    }

    /**
     * Set new autologin if user have clicked remember me
     * @param mixed $user_id clientid/userid
     * @param string $key cookie key
     * @param integer $staff is staff or client
     */
    function set($user_id, $key)
    {
        return $this->db->insert('userautologin', array(
            'user_id' => $user_id,
            'key_id' => $key,
            'user_agent' => substr($this->input->user_agent(), 0, 149),
            'last_ip' => $this->input->ip_address()
        ));
    }

    /**
     * Delete user autologin
     * @param  mixed $user_id clientid/userid
     * @param  string $key cookie key
     * @param integer $staff is staff or client
     */
    function delete($user_id, $key)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('key_id', $key);
        $this->db->delete('userautologin');
    }
}
