<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_contact', $id);
            return $this->db->get('contact')->row();
        }
        return $this->db->get('contact')->result();
    }

    public function add($data)
    {
        if($data['password_contact']){
            $this->load->helper('phpass');
            $hasher                     = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
            $data['pass_contact']       = $hasher->HashPassword($data['password_contact']);

            $data['login_contact']      = 1;
        }
        $data['nama_contact']           = mego_text_capital($data['nama_contact']);
        $data['created_contact']        = date('Y-m-d H:i:s');

        unset($data['password_contact']);

        $this->db->insert('contact', $data);

        logActivity('contact baru [ Nama: ' . $data['nama_contact'] . ']');
    }

    public function update($data, $id)
    {

        $data['nama_contact']      = mego_text_capital($data['nama_contact']);

        $this->db->where('id_contact', $id);
        $this->db->update('contact', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Permission Update [ID: ' . $id . '. Nama: ' . $data['nama_contact'] . ']');
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->where('id_contact', $id);
        $this->db->delete('contact');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('contact dihapus [ID: ' . $id . ']');
            return true;
        }
        return false;
    }

    public function get_datatables_query()
    {
        $table          = 'contact';
        $column_order   = array('nama_contact','email_contact', 'email_contact', 'jabatan_contact');
        $column_search  = array('nama_contact','email_contact', 'email_contact', 'jabatan_contact');
        $order          = array('nama_contact' => 'asc');

        $this->db->from($table);

        $i = 0;
        foreach ($column_search as $item){
            if($_POST['search']['value']){

                if($i == 0){
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }else{
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($order))
        {
            $order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->get_datatables_query();
        if($_POST['length'] != -1)
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
        $this->db->from('contact');
        return $this->db->count_all_results();
    }

    public function cek_email($email, $id){
        if (!$id) {
            return $this->db->where('email_contact', $email)
                ->get('contact')->num_rows();
        }else{

            $cek = $this->db->where(array('id_contact' => $id,'email_contact' => $email))
                ->get('contact')->num_rows();

            if($cek == 1){
                return 0;
            }else{
                return $this->db->where('email_contact', $email)
                    ->get('contact')->num_rows();
            }
        }
    }


}
