<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('events_model');
        $this->load->model('kategori_event_model');

    }

    public function index()
    {
        $has_permission = has_permission('event', 'view');
        if (!$has_permission) {
            access_denied('event', 'view');
        }

        $data['page'] = 'events/page';
        $data['js'] = 'events/page_js';
        $data['menu'] = 'event';

        $data['title'] = "Events";

        $data['list_kategori'] = $this->kategori_event_model->get();
        $this->load->view('layout', $data);
    }

    public function detail($id){
        if(!$id){
            redirect('events');
        }

        $data['page'] = 'events/detail';
        $data['js'] = 'events/detail_js';
        $data['menu'] = 'events';

        $ev = $this->events_model->get($id);
        $data['title'] = "Detail Events - $ev->nama_event";
        $data['judul'] = 'Detail Event';


        $data['data'] = $ev;

        $this->load->view('layout', $data);


    }

    public function form($id = '')
    {
        $data['page'] = 'events/form';
        $data['js'] = 'events/form_js';
        $data['menu'] = 'events';
        $data['title'] = "Events";

        $data['list_kategori'] = $this->kategori_event_model->get();


        if ($id) {
            $has_permission = has_permission('events', 'edit');
            if (!$has_permission) {
                access_denied('events', 'edit');
            }

            $data['judul'] = 'Edit Event';

            $data['data'] = $this->events_model->get($id);

        } else {
            $has_permission = has_permission('events', 'add');
            if (!$has_permission) {
                access_denied('events', 'add');
            }

            $data['judul'] = 'Event Baru';
        }


        if ($this->input->post()) {
            $simpan = $this->input->post();

            if ($id == '') {
                $has_permission = has_permission('events', 'add');
                if (!$has_permission) {
                    access_denied('events', 'add');
                }

                $this->events_model->add($simpan);
            } else {
                $has_permission = has_permission('events', 'edit');
                if (!$has_permission) {
                    access_denied('events', 'edit');
                }

                $this->events_model->update($simpan, $id);
            }
            redirect('events');
        }

        $this->load->view('layout', $data);
    }

    public function table()
    {
        $list = $this->events_model->get_datatables();
        $data = array();
        foreach ($list as $ls) {
            $row = array();

            $option = "<a href='events/form/$ls->id_event' class='btn btn-xs btn-primary mr-2' rel='tooltip' data-original-title='Edit'><i class='fa fa-pencil'></i></a> ";
            $option .= "<a href='' class='btn btn-xs btn-danger but-del' data-id='" . $ls->id_event . "' rel='tooltip' data-original-title='Hapus'><i class='fa fa-times'></i> </a>";

            $nama = "<span class='pull-left mr-2' style='width: 20px;height: 20px; background: $ls->warna_ke'></span> $ls->nama_event";

            $row[] = "<a href='events/detail/$ls->id_event'>$nama</a>";
            $row[] = $ls->nama_ke;
            $row[] = tgl_indo($ls->mulai_event, 'x', 9);
            $row[] = $option;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->events_model->count_all(),
            "recordsFiltered" => $this->events_model->count_filtered(),
            "data" => $data,
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function hapus (){
        $has_permission = has_permission('events', 'del');
        if (!$has_permission) {
            access_denied('events', 'del');
        }

        if (!$this->input->post('id')) {
            redirect('events');
        }

        $this->events_model->delete($this->input->post('id'));
    }
}