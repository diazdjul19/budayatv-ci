<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perancangan extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('proyek_model');
        $this->load->model('progress_model');
        $this->load->model('spk_model');
    }

    public function index()
    {
       redirect('proyek');
    }


    public function detail($id){
        $has_permission = has_permission('proyek', 'view');
        if (!$has_permission) {
            access_denied('proyek', 'view');
        }

        if(!$id){
            redirect("proyek");
        }

        $data['page'] = 'proyek/layout';
        $data['subpage'] = 'proyek/perancangan/detail';
        $data['js'] = 'proyek/perancangan/detail_js';
        $data['menu'] = 'proyek';
        $data['submenu'] = 'perancangan';
        $data['ssubmenu'] = 'detail';


        $data['title'] = "Proyek | Perancangan Detail";
        $data['data'] = $this->proyek_model->get($id);

        $hitung = $this->spk_model->get_spk($id, 1);
        $data['spk'] = $hitung;
        if(count($hitung) == 1 ){
            $data['s'] = $this->spk_model->get_spk($id, 1, 1);
            $data['progress'] = $this->progress_model->get_proyek($id, $data['s']->id_spk);

        }elseif(count($hitung) > 1 ){

        }



        $this->load->view('layout', $data);
    }

    public function timeline($id)
    {
        $has_permission = has_permission('proyek', 'add');
        if (!$has_permission) {
            access_denied('proyek', 'add');
        }

        if(!$id){
            redirect("proyek");
        }

        $data['page'] = 'proyek/layout';
        $data['subpage'] = 'proyek/perancangan/timeline';
        $data['js'] = 'proyek/perancangan/timeline_js';
        $data['menu'] = 'proyek';
        $data['submenu'] = 'perancangan';
        $data['ssubmenu'] = 'timeline';


        $data['title'] = "Proyek | Perancangan Timeline";
        $data['data'] = $this->proyek_model->get($id);



        $this->load->view('layout', $data);
    }

    public function timeline_update(){
        $this->proyek_model->update_tl($this->input->post('val'), $this->input->post('tipe'), $this->input->post('id'));
    }


    public function spk($id, $spk = '')
    {
        $has_permission = has_permission('proyek', 'add');
        if (!$has_permission) {
            access_denied('proyek', 'add');
        }

        if(!$id){
            redirect("proyek");
        }

        $data['page'] = 'proyek/layout';
        $data['subpage'] = 'proyek/pelaksanaan/spk';
        $data['js'] = 'proyek/pelaksanaan/spk_js';
        $data['menu'] = 'proyek';
        $data['submenu'] = 'pelaksanaan';
        $data['ssubmenu'] = 'spk';

        $data['title'] = "proyek | pelaksanaan SPK";
        $data['data'] = $this->proyek_model->get($id);
        $data['spk'] = $this->spk_model->get_spk($id, 1);
        $data['tambah_spk'] = 0;


        if(count($data['spk'])) {
            if($spk){
                $data['s'] = $this->spk_model->get($spk);
            }else{
                $data['s'] = $this->spk_model->get_spk($id, 1, 1);
            }
        }


        if($this->input->post()){
            $kirim = $this->input->post();

            $kirim['proyek_id_spk'] = $id;
            $kirim['tipe_spk'] = 1;
            $this->spk_model->add($kirim);

            redirect("perancangan/progress/$id");
        }

        $this->load->view('layout', $data);
    }

    public function spk_baru($id)
    {
        $has_permission = has_permission('proyek', 'add');
        if (!$has_permission) {
            access_denied('proyek', 'add');
        }

        if(!$id){
            redirect("proyek");
        }

        $data['page'] = 'proyek/layout';
        $data['subpage'] = 'proyek/perancangan/spk';
        $data['js'] = 'proyek/perancangan/spk_js';
        $data['menu'] = 'proyek';
        $data['submenu'] = 'perancangan';
        $data['ssubmenu'] = 'spk';

        $data['title'] = "proyek | perancangan SPK";
        $data['data'] = $this->proyek_model->get($id);
        $data['spk'] = $this->spk_model->get_spk($id, 1);
        $data['tambah_spk'] = 1;

        if($this->input->post()){
            $kirim = $this->input->post();

            $kirim['proyek_id_spk'] = $id;
            $kirim['tipe_spk'] = 1;
            $this->spk_model->add($kirim);

            redirect("perancangan/progress/$id");
        }

        $this->load->view('layout', $data);
    }

    public function spk_hapus($proyek, $id){
        $this->spk_model->delete($id);

        redirect('perancangan/spk/'.$proyek);
    }

    public function progress($id, $pg = ''){
        $has_permission = has_permission('proyek', 'add');
        if (!$has_permission) {
            access_denied('proyek', 'add');
        }

        if(!$id){
            redirect("proyek");
        }

        $data['page'] = 'proyek/layout';
        $data['subpage'] = 'proyek/perancangan/progress';
        $data['js'] = 'proyek/perancangan/progress_js';
        $data['menu'] = 'proyek';
        $data['submenu'] = 'perancangan';
        $data['ssubmenu'] = 'progress';

        $data['title'] = "proyek | perancangan SPK";
        $data['data'] = $this->proyek_model->get($id);

        $data['spk'] = $this->spk_model->get_spk($id, 1);

        if(count($data['spk'])) {
            $data['s'] = $this->spk_model->get_spk($id, 1, 1);
            $data['progress'] = $this->progress_model->get_proyek($id, $data['s']->id_spk);

        }


        if($pg){
            $data['edit'] = $this->progress_model->get($pg);
        }

        if($this->input->post()){
            $kirim = $this->input->post();
            $kirim['proyek_id_progress'] = $id;

            if($pg){
                $this->progress_model->update($kirim, $pg);
            }else{
                $this->progress_model->add($kirim);
            }

            redirect("perancangan/progress/$id");
        }

        $this->load->view('layout', $data);
    }

    public function progress_del($id, $proyek){
        $this->progress_model->delete($id);
        redirect("perancangan/progress/$proyek");
    }

    public function realisasi_progress($id, $pg = ''){
        $has_permission = has_permission('proyek', 'add');
        if (!$has_permission) {
            access_denied('proyek', 'add');
        }

        if(!$id){
            redirect("proyek");
        }

        $data['page'] = 'proyek/layout';
        $data['subpage'] = 'proyek/perancangan/progress_realisasi';
        $data['js'] = 'proyek/perancangan/progress_realisasi_js';
        $data['menu'] = 'proyek';
        $data['submenu'] = 'perancangan';
        $data['ssubmenu'] = 'realisasi_progress';

        $data['title'] = "proyek | perancangan Realilasi Progress";
        $data['data'] = $this->proyek_model->get($id);

        $data['spk'] = $this->spk_model->get_spk($id, 1);

        if(count($data['spk'])) {
            $data['s'] = $this->spk_model->get_spk($id, 1, 1);
            $data['progress'] = $this->progress_model->get_proyek($id, $data['s']->id_spk);
        }

        $this->load->view('layout', $data);
    }

    public function progress_update(){
        $this->progress_model->update_progress($this->input->post('val'), $this->input->post('deviasi'), $this->input->post('id'));
    }


    public function pembayaran($id){
        $has_permission = has_permission('proyek', 'add');
        if (!$has_permission) {
            access_denied('proyek', 'add');
        }

        if(!$id){
            redirect("proyek");
        }

        $data['page'] = 'proyek/layout';
        $data['subpage'] = 'proyek/perancangan/pembayaran';
        $data['js'] = 'proyek/perancangan/pembayaran_js';
        $data['menu'] = 'proyek';
        $data['submenu'] = 'perancangan';
        $data['ssubmenu'] = 'pembayaran';

        $data['title'] = "proyek | Pembayaran";
        $data['data'] = $this->proyek_model->get($id);

        $data['spk'] = $this->spk_model->get_spk($id, 1);

        if(count($data['spk'])) {
            $data['s'] = $this->spk_model->get_spk($id, 1, 1);
            $data['progress'] = $this->progress_model->get_proyek($id, $data['s']->id_spk);
        }

        $this->load->view('layout', $data);
    }

    public function get_progress($id){
        if(!$id){
            redirect('proyek');
        }

        $d = $this->progress_model->get($id);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($d));

    }

    public function pembayaran_save(){
        $output = $this->input->post();

        if (!empty($_FILES['file']['name'])) {
            $config['upload_path']          = './upload/pembayaran';
            $config['allowed_types']        = 'xls|xlsx|doc|docx|pdf|rar|zip|ppt|pptx';
            $config['max_size']             = 100000;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file'))
            {
                $file = $this->upload->data();

                $simpan['file_progress'] = $file['file_name'];
            }
        }

        $simpan['approval_progress'] = tgl_dt($output['approval_progress']);
        $simpan['bayar_progress'] = tgl_dt($output['bayar_progress']);
        $simpan['nominal_bayar_progress'] = mego_number($output['nominal_bayar_progress']);
        $simpan['rek_progress'] =  $output['rek_progress'];
        $simpan['status_progress'] = 1;

        $this->progress_model->update_bayar($simpan, $output['id_progress']);

        redirect('perancangan/pembayaran/'.$output['id_proyek']);
    }

}