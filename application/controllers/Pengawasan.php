<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengawasan extends MY_Admin
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
        $data['subpage'] = 'proyek/pengawasan/detail';
        $data['js'] = 'proyek/pengawasan/detail_js';
        $data['menu'] = 'proyek';
        $data['submenu'] = 'pengawasan';
        $data['ssubmenu'] = 'detail';


        $data['title'] = "Proyek | pengawasan Detail";
        $data['data'] = $this->proyek_model->get($id);

        $hitung = $this->spk_model->get_spk($id, 2);
        $data['spk'] = $hitung;
        if(count($hitung) == 1 ){
            $data['s'] = $this->spk_model->get_spk($id, 2, 1);
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
        $data['subpage'] = 'proyek/pengawasan/timeline';
        $data['js'] = 'proyek/pengawasan/timeline_js';
        $data['menu'] = 'proyek';
        $data['submenu'] = 'pengawasan';
        $data['ssubmenu'] = 'timeline';


        $data['title'] = "Proyek | Pelaksanaan Timeline";
        $data['data'] = $this->proyek_model->get($id);



        $this->load->view('layout', $data);
    }

    public function timeline_update(){
        $this->proyek_model->update_tl_pl($this->input->post('val'), $this->input->post('tipe'), $this->input->post('id'));
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
        $data['subpage'] = 'proyek/pengawasan/spk';
        $data['js'] = 'proyek/pengawasan/spk_js';
        $data['menu'] = 'proyek';
        $data['submenu'] = 'pengawasan';
        $data['ssubmenu'] = 'spk';

        $data['title'] = "proyek | pengawasan SPK";
        $data['data'] = $this->proyek_model->get($id);
        $data['spk'] = $this->spk_model->get_spk($id, 2);
        $data['tambah_spk'] = 0;


        if(count($data['spk'])) {
            if($spk){
                $data['s'] = $this->spk_model->get($spk);
            }else{
                $data['s'] = $this->spk_model->get_spk($id, 2, 1);
            }
        }


        if($this->input->post()){
            $kirim = $this->input->post();

            $kirim['proyek_id_spk'] = $id;
            $kirim['tipe_spk'] = 2;
            $this->spk_model->add($kirim);

            redirect("pengawasan/progress/$id");
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
        $data['subpage'] = 'proyek/pengawasan/spk';
        $data['js'] = 'proyek/pengawasan/spk_js';
        $data['menu'] = 'proyek';
        $data['submenu'] = 'pengawasan';
        $data['ssubmenu'] = 'spk';

        $data['title'] = "proyek | pengawasan SPK";
        $data['data'] = $this->proyek_model->get($id);
        $data['spk'] = $this->spk_model->get_spk($id, 2);
        $data['tambah_spk'] = 1;

        if($this->input->post()){
            $kirim = $this->input->post();

            $kirim['proyek_id_spk'] = $id;
            $kirim['tipe_spk'] = 2;
            $this->spk_model->add($kirim);

            redirect("pengawasan/progress/$id");
        }

        $this->load->view('layout', $data);
    }

    public function spk_hapus($proyek, $id){
        $this->spk_model->delete($id);

        redirect('pengawasan/spk/'.$proyek);
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
        $data['subpage'] = 'proyek/pengawasan/progress';
        $data['js'] = 'proyek/pengawasan/progress_js';
        $data['menu'] = 'proyek';
        $data['submenu'] = 'pengawasan';
        $data['ssubmenu'] = 'progress';

        $data['title'] = "proyek | pengawasan SPK";
        $data['data'] = $this->proyek_model->get($id);

        $data['spk'] = $this->spk_model->get_spk($id, 2);

        if(count($data['spk'])) {
            $data['s'] = $this->spk_model->get_spk($id, 2, 1);
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

            redirect("pengawasan/progress/$id");
        }

        $this->load->view('layout', $data);
    }

    public function progress_del($id, $proyek){
        $this->progress_model->delete($id);
        redirect("pengawasan/progress/$proyek");
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
        $data['subpage'] = 'proyek/pengawasan/progress_realisasi';
        $data['js'] = 'proyek/pengawasan/progress_realisasi_js';
        $data['menu'] = 'proyek';
        $data['submenu'] = 'pengawasan';
        $data['ssubmenu'] = 'realisasi_progress';

        $data['title'] = "proyek | pengawasan Realilasi Progress";
        $data['data'] = $this->proyek_model->get($id);

        $data['spk'] = $this->spk_model->get_spk($id, 2);

        if(count($data['spk'])) {
            $data['s'] = $this->spk_model->get_spk($id, 2, 1);
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
        $data['subpage'] = 'proyek/pengawasan/pembayaran';
        $data['js'] = 'proyek/pengawasan/pembayaran_js';
        $data['menu'] = 'proyek';
        $data['submenu'] = 'pengawasan';
        $data['ssubmenu'] = 'pembayaran';

        $data['title'] = "proyek | Pembayaran";
        $data['data'] = $this->proyek_model->get($id);

        $data['spk'] = $this->spk_model->get_spk($id, 2);

        if(count($data['spk'])) {
            $data['s'] = $this->spk_model->get_spk($id, 2, 1);
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

        redirect('pengawasan/pembayaran/'.$output['id_proyek']);
    }
}