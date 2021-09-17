<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_menu(){
        $dt = $this->db->where('head_menu', 0)->order_by('urut_menu', 'asc')->get('menu')->result();

        $kirim = "<ul>";
        foreach ($dt as $d){
            $sub = $this->db->where('head_menu', $d->id_menu)->order_by('urut_menu', 'asc')->get('menu')->result();

            $kirim .= "<li>";

            $kirim .= "<span class='menu-connector' data-id='$d->id_menu'>";
            if(count($sub) > 0) {
                $kirim .= "<i class='fa fa-caret-right'></i>";
            }
            $kirim .= "</span> ";
            $kirim .= "<span class='menu-icon'>";
            if(count($sub) > 0) {
                $kirim .= "<a href='' class='has-submenu' data-id='$d->id_menu'><i class='fa fa-plus-square-o'></i></a>";
            }else{
                $kirim .= "<i class='fa fa-square-o'></i>";
            }
            $kirim .= "</span> ";
            $kirim .= "<span class='btn btn-xst btn-primary m-r-10'>$d->sk_menu</span>";
            $kirim .= "<span class='menu-text'>$d->judul_menu</span> ";
            $kirim .= "<div class='btn-group m-l-10'>";

            $has_permission = has_permission('menu', 'add');
            if ($has_permission) {
                $kirim .= "<a href='' class='btn btn-xst btn-default but-tambah' data-id='$d->id_menu'><i class='fa fa-plus'></i> </a>";
            }

            $has_permission = has_permission('menu', 'edit');
            if ($has_permission) {
                $kirim .= "<a href='' class='btn btn-xst btn-default but-edit' data-id='$d->id_menu'><i class='fa fa-pencil'></i> </a>";
            }

            $has_permission = has_permission('menu', 'del');
            if ($has_permission) {
                $kirim .= "<a href='' class='btn btn-xst btn-default but-del' data-id='$d->id_menu'><i class='fa fa-times'></i> </a>";
            }

            $kirim .= "</div>";

            $kirim .= "<div class='btn-group m-l-10'>";
            $kirim .= "<a href='' class='btn btn-xst btn-default but-up' data-id='$d->id_menu'><i class='fa fa-angle-up'></i> </a>";
            $kirim .= "<a href='' class='btn btn-xst btn-default but-down' data-id='$d->id_menu'><i class='fa fa-angle-down'></i> </a>";
            $kirim .= "</div>";

            if(count($sub) > 0){
                $kirim .= "<ul class='submenu' data-id='$d->id_menu'>";
                foreach($sub as $s){
                    $kirim .= "<li>";
                    $kirim .= "<span class='menu-connector'></span> ";
                    $kirim .= "<span class='menu-icon'><i class='fa fa-square-o'></i></span> ";
                    $kirim .= "<span class='btn btn-xst btn-primary m-r-10'>";
                    if($s->icon_menu){
                        $kirim .= "<i class='fa $s->icon_menu'></i>";
                    }else{
                        $kirim .= "$s->sk_menu";
                    }
                    $kirim .= "</span>";
                    $kirim .= "<span class='menu-text'>$s->judul_menu</span> ";
                    $kirim .= "<div class='btn-group m-l-10'>";

                    $has_permission = has_permission('menu', 'edit');
                    if ($has_permission) {
                        $kirim .= "<a href='' class='btn btn-xst btn-default but-edit' data-id='$s->id_menu'><i class='fa fa-pencil'></i> </a>";
                    }

                    $has_permission = has_permission('menu', 'del');
                    if ($has_permission) {
                        $kirim .= "<a href='' class='btn btn-xst btn-default but-del' data-id='$s->id_menu'><i class='fa fa-times'></i> </a>";
                    }

                    $kirim .= "</div>";

                    $kirim .= "<div class='btn-group m-l-10'>";
                    $kirim .= "<a href='' class='btn btn-xst btn-default but-up' data-id='$s->id_menu'><i class='fa fa-angle-up'></i> </a>";
                    $kirim .= "<a href='' class='btn btn-xst btn-default but-down' data-id='$s->id_menu'><i class='fa fa-angle-down'></i> </a>";
                    $kirim .= "</div>";
                    $kirim .= "</li>";
                }

                $kirim .= "</ul>";
            }


            $kirim .= "</li>";
        }
        $kirim .= "</ul>";

        return $kirim;
    }

    public function get($id = '')
    {
        if ($id) {
            $this->db->where('id_menu', $id);
            return $this->db->get('menu')->row();
        }
        return $this->db->get('menu')->result();
    }

    public function get_aktif_menu(){
        return $this->db->where('link_menu !=', '')
            ->get('menu')
            ->result();
    }

    public function add($data)
    {
        if($data['judul_menu'] == ''){
            $urut = $this->db->where('head_menu', 0)->order_by('urut_menu', 'desc')->get('menu')->row();
        }else{
            $urut = $this->db->where('head_menu', $data['head_menu'])->order_by('urut_menu', 'desc')->get('menu')->row();
        }

        if(!$urut){
            $n_urut = 1;
        }else{
            $n_urut = $urut->urut_menu + 1;
        }

        $data['judul_menu'] = ucwords($data['judul_menu']);
        $data['sk_menu']    = strtoupper($data['sk_menu']);
        $data['urut_menu']  = $n_urut;
        $this->db->insert('menu', $data);

        logActivity('Menu Baru [ Nama: ' . $data['nama'] . ',  IP: '.$this->input->ip_address().']');
    }

    public function update($data, $id)
    {
        $data['judul_menu'] = ucwords($data['judul_menu']);
        $data['sk_menu']    = strtoupper($data['sk_menu']);

        $this->db->where('id_menu', $id);
        $this->db->update('menu', $data);

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Menu Update [ID: '.$id.', Menu: ' . $data['judul_menu'].']');
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $a = $this->db->where("id_menu", $id)->get('menu')->row();
        $urut = $this->db->where(["head_menu" => $a->head_menu, 'urut_menu >' => $a->urut_menu])->get('menu')->result();

        if(count($urut) > 0){
            foreach($urut as $u){
                $baru = $u->urut_menu - 1;

                $this->db->where('id_menu', $u->id_menu);
                $this->db->update('menu', ['urut_menu' => $baru]);
            }
        }
        
        $this->db->where('id_menu', $id);
        $this->db->delete('menu');

        $affectedRows = $this->db->affected_rows();

        if ($affectedRows > 0) {
            logActivity('Menu Delete [ID: '.$id.']');

            return true;
        }
        return false;
    }

    public function order_up($id){
        $d = $this->db->where('id_menu', $id)->get('menu')->row();

        if($d->urut_menu != 1){
            if($d->head_menu != 0){
                $atas = $d->urut_menu - 1;

                $a = $this->db->where(['urut_menu' => $atas, 'head_menu' => $d->head_menu])->get('menu')->row();

                $this->db->where('id_menu' , $a->id_menu)->update('menu', array('urut_menu' => $d->urut_menu));
                $this->db->where('id_menu', $id)->update('menu', array('urut_menu' => $atas));
            }else{
                $atas = $d->urut_menu - 1;
                $a = $this->db->where(['urut_menu' => $atas, 'head_menu' => 0])->get('menu')->row();

                $this->db->where('id_menu', $a->id_menu)->update('menu', array('urut_menu' => $d->urut_menu));
                $this->db->where('id_menu', $id)->update('menu', array('urut_menu' => $atas));
            }

        }
    }

    public function order_down($id){
        $d = $this->db->where('id_menu', $id)->get('menu')->row();

        if($d->head_menu != 0){
            $h = $this->db->where('head_menu', $d->head_menu)->order_by('urut_menu', 'desc')->get('menu')->row();

            if($d->urut_menu != $h->urut_menu){
                $atas = $d->urut_menu + 1;

                $a = $this->db->where(['head_menu' => $d->head_menu, 'urut_menu' => $atas])->get('menu')->row();

                $this->db->where('id_menu', $a->id_menu)->update('menu', array('urut_menu' => $d->urut_menu));
                $this->db->where('id_menu', $id)->update('menu', array('urut_menu' => $atas));
            }
        }else{
            $h = $this->db->where('head_menu', 0)->order_by('urut_menu', 'desc')->get('menu')->row();

            if($d->urut_menu != $h->urut_menu){
                $atas = $d->urut_menu + 1;

                $a = $this->db->where(['head_menu' => 0,  'urut_menu' => $atas])->get('menu')->row();

                $this->db->where('id_menu', $a->id_menu)->update('menu', array('urut_menu' => $d->urut_menu));
                $this->db->where('id_menu', $id)->update('menu', array('urut_menu' => $atas));
            }
        }
    }

    public function cek_nama($nama, $id){
        if (!$id) {
            return $this->db->where('judul_menu', $nama)->get('menu')->num_rows();
        }else{

            $cek = $this->db->where(array('id_menu' => $id,'judul_menu' => $nama))->get('menu')->num_rows();

            if($cek == 1){
                return 0;
            }else{
                return $this->db->where('judul_menu', $nama)->get('menu')->num_rows();
            }
        }
    }
}
