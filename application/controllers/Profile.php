<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Admin{

    public function index(){

        $data['page']   = 'profile/form';
        $data['js']     = 'profile/js_form';
        $data['css']    = 'css_form';
        $data['menu']   = 'profil';

        $data['judul']  = 'Ubah Profie';

        $this->load->view('layout', $data);

    }

    public function ubah_gambar_n_pass(){

        $this->load->model('user_model');
        $this->load->helper('phpass');

        $data = $this->input->post();
        $id = $this->session->staff_user_id;

        $user = $this->user_model->get($id);

        if (!empty($_FILES['foto_user'])) {
            $config['upload_path']          = './assets/img/profiles';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 10000;
            $config['encrypt_name']         = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_user'))
            {
                $foto = $this->upload->data();
                $up['foto_user'] = $foto['file_name'];

                unlink(FCPATH . "/assets/img/profiles/$user->foto_user");

            }
        }

        if($data['ganti_pass'] != 0){

            $hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);

            if (!$hasher->CheckPassword($data['pass_lama'], $user->pass_user)) {
                set_alert('danger', 'Password lama Anda salah.');
                redirect('profile');
            }else{
                $up['pass_user'] = $hasher->HashPassword($data['pass_user']);
                logActivity('Password diperbarui [ Nama: ' . $user->nama_user . ']');

            }

        }

        $this->db->where('id_user',$id)->update('user',$up);

        set_alert('success', 'Data berhasil diperbarui.');
        redirect('profile');

    }

}