<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bantuan extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bantuan_model');
        $this->load->model('menu_model');
    }


    public function index()
    {

        $data['page'] = 'bantuan/table';
        $data['js'] = 'bantuan/table_js';
        $data['css'] = 'css_table';
        $data['menu'] = 'bantuan';

        $this->load->view('layout', $data);
    }


    public function table()
    {

        $list = $this->bantuan_model->get_datatables();
        $data = array();
        foreach ($list as $ls) {
            $row = array();
            $button = "";

            if (get_staff_user_id() == '6bmgy' || get_staff_user_id() == 'duji9') {
                $button .= "<a href='bantuan/form/" . $ls->id_bantuan . "' rel='tooltip' class='btn btn-xs btn-primary' data-original-title='Edit'><i class='fa fa-pencil'></i></a>";
            }

            if (get_staff_user_id() == '6bmgy' || get_staff_user_id() == 'duji9') {
                $button .= " <a href='' rel='tooltip' class='btn btn-xs btn-danger but-del' data-id='" . $ls->id_bantuan . "' data-original-title='Hapus'><i class='fa fa-trash'></i></a>";
            }


            $row[] = "<a href='' class='detail' data-id='$ls->id_bantuan'>$ls->nama_bantuan</a>";

            if (get_staff_user_id() == '6bmgy' || get_staff_user_id() == 'duji9') {
                $row[] = $button;
            }

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->bantuan_model->count_all(),
            "recordsFiltered" => $this->bantuan_model->count_filtered(),
            "data" => $data,
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function form($id = '')
    {
        $data['page']   = 'bantuan/form';
        $data['js']     = 'bantuan/form_js';
        $data['css']    = 'css_form';
        $data['menu']   = 'bantuan';

        $data['menu_list'] = ['tender','klien','kontak','user','role','revisi'];

        if ($id) {
            if (get_staff_user_id() != '6bmgy' && get_staff_user_id() != 'duji9') {
                access_denied('bantuan', 'add');
            }

            $data['judul']  = 'Edit Bantuan';
            $data['edit']   = 1;

            $data['data']   = $this->bantuan_model->get($id);

        } else {
            if (get_staff_user_id() != '6bmgy' && get_staff_user_id() != 'duji9') {
                access_denied('bantuan', 'add');
            }

            $data['judul']  = 'Tambah Bantuan';
            $data['edit']   = 0;
        }

        if ($this->input->post()) {
            $simpan = $this->input->post();

            if ($id == '') {
                if (get_staff_user_id() != '6bmgy' && get_staff_user_id() != 'duji9') {
                    access_denied('bantuan', 'add');
                }

                $this->bantuan_model->add($simpan);
                set_alert('success', 'Data berhasil ditambah');
            } else {
                if (get_staff_user_id() != '6bmgy' && get_staff_user_id() != 'duji9') {
                    access_denied('bantuan', 'edit');
                }

                $success = $this->bantuan_model->update($simpan, $id);
                if ($success) {
                    set_alert('success', 'Data berhasil di update');
                }

            }
            redirect('bantuan');
        }

        $this->load->view('layout', $data);
    }

    public function detail($id){
        $data = $this->bantuan_model->get($id);

        $output = "<h1>$data->nama_bantuan</h1>";
        $output .= "<div id='jawab'>$data->isi_bantuan</div>";

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function hapus()
    {

        if (!$this->input->post('id')) {
            redirect('bantuan');
        }

        $this->bantuan_model->delete($this->input->post('id'));

    }

}