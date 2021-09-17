<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->model('anggaran_model');
        $this->load->model('proyek_model');
        $this->load->model('events_model');
        $this->load->model('spk_model');
    }


    public function index()
    {
        $data['page']   = 'dashboard/page';
        $data['js']     = 'dashboard/js_page';
        $data['menu']   = 'Dashboard';
        $data['title']  = 'Dashboard - SimonPro';

        $thn = date('Y');

        $data['kantor'] = $this->spk_model->get_deviasi(1);
        $data['rumah'] = $this->spk_model->get_deviasi(2);
        $data['blain'] = $this->spk_model->get_deviasi_lain();

        $data['investasi'] = $this->anggaran_model->get_tahun(1, date('Y'));
        $data['operasional'] = $this->anggaran_model->get_tahun(2, date('Y'));

        $data['warna'] = [
            '1' => 'orange',
            '2' => 'merah',
            '3' => 'ungu',
            '4' => 'hijau',
            '5' => 'biru'
        ];


        $this->load->view('layout', $data);
    }

    public function get_tanggal(){
        $start = $this->input->get('start');
        $end = $this->input->get('end');

        $spk = $this->db->get('spk')->result();

        foreach($spk as $s){
            if($s->selesai_spk >= $start){
                if($s->selesai_spk <= $end){
                    $output[] = [
                        'title' => 'Selesai SPK',
                        'description' => $s->nama_spk,
                        'start' => $s->selesai_spk,
                        'url' => "pelaksanaan/detail/$s->proyek_id_spk",
                        'backgroundColor' => '#2BA6D6',
                        'borderColor' => '#2BA6D6',
                        'textColor' => '#fff',
                        'icons' => 'flag'
                    ];
                }
            }

            if($s->bg_jwaktu_spk >= $start){
                if($s->bg_jwaktu_spk <= $end){
                    $output[] = [
                        'title' => 'BG Uang Muka',
                        'description' => $s->nama_spk,
                        'start' => $s->bg_jwaktu_spk,
                        'url' => "pelaksanaan/detail/$s->proyek_id_spk",
                        'backgroundColor' => '#FF6600',
                        'borderColor' => '#FF6600',
                        'textColor' => '#fff',
                        'icons' => 'flag'
                    ];
                }
            }


            if($s->bg_jwaktu_p_spk >= $start){
                if($s->bg_jwaktu_p_spk <= $end){
                    $output[] = [
                        'title' => 'BG Pelaksanaan',
                        'description' => $s->nama_spk,
                        'start' => $s->bg_jwaktu_p_spk,
                        'url' => "pelaksanaan/detail/$s->proyek_id_spk",
                        'backgroundColor' => '#660066',
                        'borderColor' => '#660066',
                        'textColor' => '#fff',
                        'icons' => 'flag'
                    ];
                }
            }
        }

        $event = $this->events_model->get_calendar($start, $end);
        foreach($event as $e){
            $output[] = [
                'title' => $e->nama_event,
                'description' => $e->ket_event,
                'start' => tgl_dt($e->mulai_event),
                'url' => "events/detail/$e->id_event",
                'backgroundColor' => $e->warna_ke,
                'borderColor' => $e->warna_ke,
                'textColor' => '#fff',
                'icons' => 'calendar'
            ];
        }

        $proyek = $this->proyek_model->get();
        foreach($proyek as $p){
            if($p->ud_proyek != '0000-00-00' && $p->ui_proyek == '0000-00-00'){
                $output[] = [
                    'title' => 'Deadline Pengiriman UseReq Perancangan',
                    'description' => $p->nama_proyek,
                    'start' =>$p->ud_proyek,
                    'url' => "perancangan/timeline/$p->id_proyek",
                    'backgroundColor' => '#f00',
                    'borderColor' => '#f00',
                    'textColor' => '#fff',
                    'icons' => 'tasks'
                ];
            }


            if($p->kd_proyek != '0000-00-00' && $p->ki_proyek == '0000-00-00'){
                $output[] = [
                    'title' => 'Deadline Kontrak Perancangan',
                    'description' => $p->nama_proyek,
                    'start' =>$p->kd_proyek,
                    'url' => "perancangan/timeline/$p->id_proyek",
                    'backgroundColor' => '#f00',
                    'borderColor' => '#f00',
                    'textColor' => '#fff',
                    'icons' => 'tasks'

                ];
            }

            if($p->ud_pg_proyek != '0000-00-00' && $p->ui_pg_proyek == '0000-00-00'){
                $output[] = [
                    'title' =>'Deadline Pengiriman UseReq Pengawasan',
                    'description' =>  $p->nama_proyek,
                    'start' =>$p->ud_pg_proyek,
                    'url' => "pengawasan/timeline/$p->id_proyek",
                    'backgroundColor' => '#f00',
                    'borderColor' => '#f00',
                    'textColor' => '#fff',
                    'icons' => 'tasks'

                ];
            }

            if($p->kd_pg_proyek != '0000-00-00' && $p->ki_pg_proyek == '0000-00-00'){
                $output[] = [
                    'title' => 'Deadline Kontrak Pengawasan',
                    'description' => $p->nama_proyek,
                    'start' =>$p->kd_pg_proyek,
                    'url' => "pengawasan/timeline/$p->id_proyek",
                    'backgroundColor' => '#f00',
                    'borderColor' => '#f00',
                    'textColor' => '#fff',
                    'icons' => 'tasks'

                ];
            }

            if($p->ud_pl_proyek != '0000-00-00' && $p->ui_pl_proyek == '0000-00-00'){
                $output[] = [
                    'title' => 'Deadline Pengiriman Usereq Pelaksanaan',
                    'description' =>  $p->nama_proyek,
                    'start' =>$p->ud_pl_proyek,
                    'url' => "pelaksanaan/timeline/$p->id_proyek",
                    'backgroundColor' => '#f00',
                    'borderColor' => '#f00',
                    'textColor' => '#fff',
                    'icons' => 'tasks'
                ];
            }

            if($p->kd_pl_proyek != '0000-00-00' && $p->ki_pl_proyek == '0000-00-00'){
                $output[] = [
                    'title' => 'Deadline Pengiriman Usereq Pelaksanaan',
                    'description' =>  $p->nama_proyek,
                    'start' =>$p->kd_pl_proyek,
                    'url' => "pelaksanaan/timeline/$p->id_proyek",
                    'backgroundColor' => '#f00',
                    'borderColor' => '#f00',
                    'textColor' => '#fff',
                    'icons' => 'tasks'
                ];
            }
        }



        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }



}