<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('proyek_model');
        $this->load->model('proyek_tipe_model');
    }

    public function index()
    {
        $has_permission = has_permission('proyek', 'view');
        if (!$has_permission) {
            access_denied('proyek', 'view');
        }

        $data['page'] = 'proyek/table';
        $data['js'] = 'proyek/table_js';
        $data['menu'] = 'proyek';


        $data['title'] = "Proyek";
        $data['data'] = $this->proyek_model->get_progress();
        $data['tipe_proyek'] = $this->proyek_tipe_model->get();


        $this->load->view('layout', $data);
    }

    public function table()
    {
        $list = $this->proyek_model->get_datatables();
        $data = array();
        foreach ($list as $ls) {
            $row = array();

            $row[] = "<a href='perancangan/timeline/$ls->id_proyek'>$ls->nama_proyek</a>";
            $row[] = $ls->thn_anggaran_proyek;
            $row[] = $ls->nama_proyek_t;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->proyek_model->count_all(),
            "recordsFiltered" => $this->proyek_model->count_filtered(),
            "data" => $data,
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function form($id = '')
    {
        $has_permission = has_permission('proyek', 'add');
        if (!$has_permission) {
            access_denied('proyek', 'add');
        }

        $data['page'] = 'proyek/form';
        $data['js'] = 'proyek/form_js';
        $data['menu'] = 'proyek';
        $data['tipe_proyek'] = $this->proyek_tipe_model->get();


        if ($id) {
            $data['title'] = "Update Proyek";
            $data['data'] = $this->proyek_model->get($id);

        }else{
            $data['title'] = "Proyek Baru";
        }

        if ($this->input->post()) {
            $simpan = $this->input->post();

            if ($id == '') {
                $has_permission = has_permission('proyek', 'add');
                if (!$has_permission) {
                    access_denied('proyek', 'add');
                }

                $this->proyek_model->add($simpan);
            } else {
                $has_permission = has_permission('proyek', 'edit');
                if (!$has_permission) {
                    access_denied('proyek', 'edit');
                }

                $this->proyek_model->update($simpan, $id);
            }

            redirect("proyek");
        }

        $this->load->view('layout', $data);
    }

    public function detail($id)
    {
        $has_permission = has_permission('proyek', 'view');
        if (!$has_permission) {
            access_denied('proyek', 'view');
        }

        if(!$id){
            redirect("proyek");
        }


        $data['page'] = 'proyek/layout';
        $data['subpage'] = 'proyek/perencanaan/timeline';
        $data['js'] = 'proyek/perencanaan/timeline_js';
        $data['menu'] = 'proyek';
        $data['submenu'] = 'perancangan';
        $data['ssubmenu'] = 'timeline';


        $data['title'] = "proyek";
        $data['data'] = $this->proyek_model->get($id);

        $this->load->view('layout', $data);
    }

    public function perancangan(){
        $has_permission = has_permission('proyek', 'view');
        if (!$has_permission) {
            access_denied('proyek', 'view');
        }

        $data['page'] = 'proyek/perancangan';
        $data['js'] = 'proyek/perancangan_js';
        $data['menu'] = 'proyek';
        $data['submenu'] = 'perancangan';


        $data['title'] = "Proyek | Perancangan";

        $this->load->view('layout', $data);
    }

    public function hapus($id){
        $this->proyek_model->delete($id);

        redirect("proyek");
    }
}