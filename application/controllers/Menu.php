<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');
    }

    public function index()
    {
        $has_permission = has_permission('menu', 'view');
        if (!$has_permission) {
            access_denied('menu', 'view');
        }
        
        $data['page'] = 'menu/page';
        $data['js'] = 'menu/js_page';
        $data['css'] = 'css_table';
        $data['menu'] = 'menu';

        $this->load->view('layout', $data);
    }

    public function get_menu(){
        $output = $this->menu_model->get_menu();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function edit($id = ''){
        if ($id) {
            $output = $this->menu_model->get($id);

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output));
        }
    }

    public function save()
    {
        $id = $this->input->post('id_menu');
        $simpan = $this->input->post();

        if ($id == '') {
            $has_permission = has_permission('menu', 'add');
            if (!$has_permission) {
                access_denied('menu', 'add');
            }

            $this->menu_model->add($simpan);
            set_alert('success', 'Data Menu berhasil ditambah');
        } else {
            $has_permission = has_permission('menu', 'edit');
            if (!$has_permission) {
                access_denied('menu', 'edit');
            }

            $success = $this->menu_model->update($simpan, $id);
            if ($success) {
                set_alert('success', 'Data Menu berhasil di update');
            }

        }
    }

    public function hapus()
    {
        $has_permission = has_permission('menu', 'del');
        if (!$has_permission) {
            access_denied('menu', 'del');
        }

        if (!$this->input->post('id')) {
            redirect('menu');
        }

        $this->menu_model->delete($this->input->post('id'));

    }

    public function order_up($id){
        $this->menu_model->order_up($id);
    }

    public function order_down($id){
        $this->menu_model->order_down($id);
    }

    public function cek_text()
    {
        if ($this->input->post('nama')) {
            $nama = mego_link($this->input->post('nama'));
            $total_rows = $this->menu_model->cek_nama($nama, $this->input->post('id'));
            if ($total_rows == 0) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
            die();
        }
    }

}