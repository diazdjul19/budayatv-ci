<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek1 extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('proyek_model');
        $this->load->model('tender_model');
        $this->load->model('tender_menang_model');
        $this->load->model('lokasi_model');
        $this->load->model('group_bisnis_model');
        $this->load->model('klien_model');
        $this->load->model('penagihan_model');
        $this->load->model('uang_muka_model');
        $this->load->model('bq_model');
        $this->load->model('bq_file_model');
        $this->load->model('proyek_status_model');
        $this->load->model('realisasi_model');


    }

    public function index()
    {
        $has_permission = has_permission('Proyek1', 'view');
        if (!$has_permission) {
            access_denied('Proyek1', 'view');
        }

        $data['page'] = 'proyek/table';
        $data['js'] = 'proyek/table_js';
        $data['css'] = 'css_table';
        $data['menu'] = 'Proyek1';

        $data['title'] = "Proyek Berjalan";

        $data['list_cabang'] = $this->lokasi_model->get();
        $data['list_klien'] = $this->klien_model->get();

        $this->load->view('layout', $data);
    }

    public function tambah($id = '')
    {
        $has_permission = has_permission('Proyek1', 'add');
        if (!$has_permission) {
            access_denied('Proyek1', 'add');
        }

        $data['page'] = 'proyek/layout_stlp';
        $data['hal'] = 'proyek/form';
        $data['js'] = 'proyek/form_js';
        $data['css'] = 'css_table';
        $data['menu'] = 'Proyek1';
        $data['submenu'] = 'stlp1';

        $data['list_klien'] = $this->klien_model->get();

        if ($id) {
            $t = $this->tender_model->get($id);
            $data['data'] = $t;

            $data['title'] = $t->nama_tender;

            $tender = $this->proyek_model->get_tender($id);
            if ($tender) {
                $data['Proyek1'] = $this->proyek_model->get_tender($id);
            }
        }

        if ($this->input->post()) {
            $simpan = $this->input->post();

            if ($id == '') {
                $has_permission = has_permission('Proyek1', 'add');
                if (!$has_permission) {
                    access_denied('Proyek1', 'add');
                }

                $nid = $this->proyek_model->add_stlp1($simpan);

                set_alert('success', 'Data berhasil ditambah');

            } else {
                $has_permission = has_permission('Proyek1', 'edit');
                if (!$has_permission) {
                    access_denied('tender', 'edit');
                }

                $success = $this->proyek_model->update_stlp1($simpan, $id);
                if ($success) {
                    set_alert('success', 'Data berhasil di update');
                }

                $nid = $id;
            }

            redirect("proyek/stlp2/$nid");
        }

        $this->load->view('layout', $data);
    }

    public function tender_menang()
    {
        $has_permission = has_permission('Proyek1', 'view');
        if (!$has_permission) {
            access_denied('Proyek1', 'view');
        }

        $data['page'] = 'proyek/tender_menang';
        $data['js'] = 'proyek/tender_menang_js';
        $data['css'] = 'css_table';
        $data['menu'] = 'Proyek1';

        $this->load->view('layout', $data);
    }

    public function table_tender_menang()
    {
        $list = $this->tender_menang_model->get_datatables();
        $data = array();
        foreach ($list as $ls) {
            $row = array();

            $option = "<a href='proyek/stlp1/$ls->id_tender' class='bold'>$ls->nama_tender</a>";
            $option .= "<br>$ls->nama_lokasi";

            $tgl = "";

            if ($ls->tgl_tender != '1970-01-01') {
                $tgl .= tgl_indo($ls->tgl_tender, 'x', 1);
            }

            if ($ls->nominal_tender != 0) {
                $nilai = "<span class='bold text-info m-r-10' rel='tooltip' data-original-title='Nilai Tender'>N</span> Rp " . number_format($ls->nominal_tender, '0', ',', '.');
            } else {
                $nilai = "<span class='bold text-info m-r-10' rel='tooltip' data-original-title='Nilai Tender'>N</span> -";
            }

            if ($ls->penawaran_tender != 0) {
                $nilai .= "<br> <span class='bold text-danger m-r-10' rel='tooltip' data-original-title='Nilai Penawaran'>P</span> Rp " . number_format($ls->penawaran_tender, '0', ',', '.');
            } else {
                $nilai .= "<br><span class='bold text-danger m-r-10' rel='tooltip' data-original-title='Nilai Penawaran'>P</span> -";
            }

            if ($ls->menang_tender != 0) {
                $nilai .= "<br> <span class='bold text-success m-r-10' rel='tooltip' data-original-title='Nilai Pemenang'>M</span>Rp " . number_format($ls->menang_tender, '0', ',', '.');
            } else {
                $nilai .= "<br><span class='bold text-success m-r-10'  rel='tooltip' data-original-title='Nilai Pemenang'>M</span>-";
            }

            $row[] = $option;
            $row[] = "<a href='klien/detail/" . $ls->id_klien . "'>" . $ls->nama_klien . "</a>";
            $row[] = $nilai;
            $row[] = $tgl;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->tender_menang_model->count_all(),
            "recordsFiltered" => $this->tender_menang_model->count_filtered(),
            "data" => $data,
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function table()
    {
        $list = $this->proyek_model->get_datatables();
        $data = array();
        foreach ($list as $ls) {
            $row = array();

            $option = "<a href='proyek/detail/$ls->id_proyek' class='bold'>$ls->nama_proyek</a>";
            $option .= "<br>$ls->nama_lokasi / $ls->nama_group_bisnis";
            $option .= "<br>$ls->nama_klien";

            $option .= "<div class='tahap'>";
            if ($ls->approval_proyek == 0) {
                $option .= "<div class='tahap--box'>Proses Melengkapi STLP</div>";
            } elseif ($ls->approval_proyek == 1 || $ls->approval_proyek == 3) {
                $has_permission = has_permission('konfirmasi_proyek', 'view');
                if ($has_permission) {
                    $option .= "<a href='proyek/konfirmasi/$ls->id_proyek' class='tahap--box bg-primary text-white'>Menunggu Konfirmasi</a>";
                } else {
                    $option .= "<div class='tahap--box bg-primary text-white'>Menunggu Konfirmasi</div>";
                }
            } elseif ($ls->approval_proyek == 2) {
                $option .= "<div class='tahap--box'>Revisi</div>";
            } else {
                $option .= "<div class='tahap--box bg-success text-white'>Sudah Disetujui</div>";
            }

            if($ls->st_selesai_proyek == 1){
                $option .= "<div class='tahap--box bg-danger text-white' rel='tooltip' data-original-title='Proyek Belum Selesai'>BS</div>";
            }


            $option .= "</div>";

            $nomor = "<span class='bold text-info m-r-10' rel='tooltip' data-original-title='No Dokumen'>D</span> $ls->no_dokumen_proyek <br>";
            $nomor .= "<span class='bold text-primary m-r-10' rel='tooltip' data-original-title='No Proyek'>P</span> $ls->no_proyek <br>";
            $nomor .= "<span class='bold text-danger m-r-10' rel='tooltip' data-original-title='No SPK'>S</span> $ls->no_spk_proyek ";

            $nilai = "<span class='bold text-info m-r-10' rel='tooltip' data-original-title='Nilai Proyek'>NP</span> Rp." . number_format($ls->nilai_proyek, 0, '.', '.') . "<br>";
            $nilai .= "<span class='bold text-info m-r-10' rel='tooltip' data-original-title='Nilai BQ'>BQ</span> Rp." . number_format($ls->bq_proyek, 0, '.', '.') . "<br>";


            $row[] = $option;
            $row[] = $nilai;
            $row[] = $nomor;

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

    public function detail($id)
    {
        $has_permission = has_permission('Proyek1', 'view');
        if (!$has_permission) {
            access_denied('Proyek1', 'view');
        }

        $data['page'] = 'proyek/layout';
        $data['subpage'] = 'proyek/stlp/layout_stlp';
        $data['hal'] = 'proyek/stlp/detail';
        $data['js'] = 'proyek/stlp/detail_js';
        $data['css'] = 'css_table';
        $data['menu'] = 'Proyek1';
        $data['headmenu'] = 'stlp';
        $data['submenu'] = 'detail';

        $t = $this->proyek_model->get($id);
        $data['data'] = $t;

        $data['bq_list'] = $this->bq_model->get_list($id);

        $data['title'] = "STLP | $t->nama_proyek";

        $this->load->view('layout', $data);
    }

    public function stlp1($id = '')
    {
        $has_permission = has_permission('Proyek1', 'add');
        if (!$has_permission) {
            access_denied('Proyek1', 'add');
        }

        $data['page'] = 'proyek/layout';
        $data['subpage'] = 'proyek/stlp/layout_stlp';
        $data['hal'] = 'proyek/stlp/form';
        $data['js'] = 'proyek/stlp/form_js';
        $data['css'] = 'css_table';
        $data['menu'] = 'Proyek1';
        $data['headmenu'] = 'stlp';
        $data['submenu'] = 'stlp1';

        $data['list_klien'] = $this->klien_model->get();
        $data['list_gb'] = $this->group_bisnis_model->get();
        $data['list_lokasi'] = $this->lokasi_model->get();


        if ($id) {
            if (!cek_status_approval_proyek($id)) {
                redirect('proyek/detail/' . $id);
            }

            $t = $this->proyek_model->get($id);
            $data['data'] = $t;

            $data['title'] = "SPK | " . $t->nama_proyek;
        }


        if ($this->input->post()) {
            $simpan = $this->input->post();

            if ($id == '') {
                $has_permission = has_permission('Proyek1', 'add');
                if (!$has_permission) {
                    access_denied('Proyek1', 'add');
                }

                $nid = $this->proyek_model->add_stlp1($simpan);

                set_alert('success', 'Data berhasil ditambah');

            } else {
                $has_permission = has_permission('Proyek1', 'edit');
                if (!$has_permission) {
                    access_denied('Proyek1', 'edit');
                }

                $success = $this->proyek_model->update_stlp1($simpan, $id);
                if ($success) {
                    set_alert('success', 'Data berhasil di update');
                }

                $nid = $id;
            }

            redirect("proyek/stlp2/$nid");
        }

        $this->load->view('layout', $data);
    }

    public function stlp1_tgl_retensi()
    {
        $kirim = tgl_indo($this->proyek_model->get_tgl_retensi($this->input->post('tgl1'), $this->input->post('tgl2')), 'x', 9);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($kirim));
    }

    public function stlp2($id)
    {
        $has_permission = has_permission('Proyek1', 'add');
        if (!$has_permission) {
            access_denied('Proyek1', 'add');
        }

        if (!cek_status_approval_proyek($id)) {
            redirect('proyek/detail/' . $id);
        }

        $t = $this->proyek_model->get($id);

        $data['page'] = 'proyek/layout';
        $data['subpage'] = 'proyek/stlp/layout_stlp';
        $data['hal'] = 'proyek/stlp/stlp2';
        $data['js'] = 'proyek/stlp/stlp2_js';
        $data['css'] = 'css_table';
        $data['menu'] = 'Proyek1';
        $data['headmenu'] = 'stlp';
        $data['submenu'] = 'stlp2';

        $data['bq_list'] = $this->proyek_model->get_bq($id);
        $data['bq_file_list'] = $this->bq_file_model->get_list($id);

        $data['title'] = "BQ | " . $t->nama_proyek;
        $data['data'] = $t;

        if ($this->input->post()) {
            $simpan = $this->input->post();

            $has_permission = has_permission('Proyek1', 'add');
            if (!$has_permission) {
                access_denied('Proyek1', 'add');
            }

            $success = $this->proyek_model->update_stlp2($simpan, $id);
            if ($success) {
                set_alert('success', 'Data berhasil di update');
            }


            redirect("proyek/stlp2/$id");
        }

        $this->load->view('layout', $data);
    }

    public function stlp2_upload()
    {
        $id = $this->input->post('id');
        if (!empty($_FILES['file']['name'])) {
            $config['upload_path']          = './upload/bq';
            $config['allowed_types']        = 'pdf|doc|docx|xlsx|xls|pptx|ppt';
            $config['max_size']             = 100000;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file'))
            {
                $file = $this->upload->data();

                $data['proyek_id_bq_file'] = $this->input->post('id');
                $data['tipe_bq_file'] = $this->input->post('tipe');
                $data['nama_bq_file'] = $file['file_name'];
                $data['user_bq_file'] = get_staff_user_id();

                $this->bq_file_model->add($data);

            }
        }

        redirect('proyek/stlp2/'. $id);

    }

    public function stlp2_revisi()
    {
        $this->bq_model->update_nominal($this->input->post());
    }

    public function hapus_bq($s, $id, $tipe)
    {
        $has_permission = has_permission('Proyek1', 'del');
        if (!$has_permission) {
            access_denied('Proyek1', 'del');
        }

        $this->proyek_model->delete_bq($id, $tipe);

        redirect("proyek/stlp2/$s");
    }

    public function stlp3($id)
    {
        $has_permission = has_permission('Proyek1', 'add');
        if (!$has_permission) {
            access_denied('Proyek1', 'add');
        }

        if (!cek_status_approval_proyek($id)) {
            redirect('proyek/detail/' . $id);
        }

        $data['page'] = 'proyek/layout';
        $data['subpage'] = 'proyek/stlp/layout_stlp';
        $data['hal'] = 'proyek/stlp/stlp3';
        $data['js'] = 'proyek/stlp/stlp3_js';
        $data['css'] = 'css_table';
        $data['menu'] = 'Proyek1';
        $data['headmenu'] = 'stlp';
        $data['submenu'] = 'stlp3';


        $t = $this->proyek_model->get($id);
        $data['data'] = $t;

        $data['um_list'] = $this->uang_muka_model->get_list($id);

        $data['title'] = "Uang Muka | " . $t->nama_proyek;

        if ($this->input->post()) {
            $simpan = $this->input->post();

            $has_permission = has_permission('Proyek1', 'edit');
            if (!$has_permission) {
                access_denied('Proyek1', 'edit');
            }

            $success = $this->proyek_model->update_stlp3($simpan, $id);
            if ($success) {
                set_alert('success', 'Data berhasil di update');
            }

            redirect("proyek/stlp3/$id");
        }

        $this->load->view('layout', $data);
    }

    public function stlp3_revisi()
    {
        $this->uang_muka_model->update($this->input->post());
    }

    public function stlp3_hapus($proyek, $id)
    {
        $this->uang_muka_model->delete($id);

        redirect('proyek/stlp3/' . $proyek);
    }

    public function stlp4($id)
    {
        $has_permission = has_permission('Proyek1', 'add');
        if (!$has_permission) {
            access_denied('Proyek1', 'add');
        }

        if (!cek_status_approval_proyek($id)) {
            redirect('proyek/detail/' . $id);
        }

        $data['page'] = 'proyek/layout';
        $data['subpage'] = 'proyek/stlp/layout_stlp';
        $data['hal'] = 'proyek/stlp/stlp4';
        $data['js'] = 'proyek/stlp/stlp4_js';
        $data['css'] = 'css_table';
        $data['menu'] = 'Proyek1';
        $data['headmenu'] = 'stlp';
        $data['submenu'] = 'stlp4';


        $t = $this->proyek_model->get($id);
        $data['data'] = $t;


        $data['tg_list'] = $this->proyek_model->get_penagihan($id);

        $data['title'] = "Penagihan | " . $t->nama_proyek;

        if ($this->input->post()) {
            $simpan = $this->input->post();

            $has_permission = has_permission('Proyek1', 'edit');
            if (!$has_permission) {
                access_denied('Proyek1', 'edit');
            }

            $success = $this->proyek_model->update_stlp4($simpan, $id);
            if ($success) {
                set_alert('success', 'Data berhasil di update');
            }

            redirect("proyek/stlp4/$id");
        }

        $this->load->view('layout', $data);
    }

    public function stlp4_revisi()
    {
        $this->penagihan_model->update($this->input->post());
    }

    public function stlp4_hapus($proyek, $id)
    {
        $this->penagihan_model->delete($id);

        redirect('proyek/stlp4/' . $proyek);
    }

    public function konfirmasi($id){
        $has_permission = has_permission('konfrimasi_proyek', 'view');
        if (!$has_permission) {
            access_denied('konfrimasi_proyek', 'view');
        }

        if (cek_status_approval_proyek($id)) {
            redirect('proyek/detail/' . $id);
        }

        $data['page'] = 'proyek/layout';
        $data['subpage'] = 'proyek/stlp/layout_stlp';
        $data['hal'] = 'proyek/stlp/konfirmasi';
        $data['js'] = 'proyek/stlp/konfirmasi_js';
        $data['css'] = 'css_table';
        $data['menu'] = 'Proyek1';
        $data['headmenu'] = 'stlp';
        $data['submenu'] = 'konfirmasi';

        $t = $this->proyek_model->get($id);
        $data['data'] = $t;
        $data['list'] = $this->proyek_status_model->get_by_proyek($id);

        $data['title'] = "Konfirmasi | $t->nama_proyek";

        $this->load->view('layout', $data);
    }

    public function set_menunggu_konfirmasi($id)
    {
        $this->proyek_model->set_menunggu_konfirmasi($id);

        redirect('Proyek1');
    }

    public function set_menunggu_konfirmasi_revisi($id)
    {
        $this->proyek_model->set_menunggu_konfirmasi_revisi($id);

        redirect('Proyek1');
    }

    public function set_revisi($id){
        $this->proyek_model->set_revisi($id);

        redirect('Proyek1');
    }

    public function set_setuju($id){
        $this->proyek_model->set_setuju($id);

        redirect('Proyek1');
    }

    public function hapus($id)
    {
        $has_permission = has_permission('Proyek1', 'del');
        if (!$has_permission) {
            access_denied('Proyek1', 'del');
        }

        if (!$id) {
            redirect('Proyek1');
        }

        $this->proyek_model->delete($id);

        redirect('Proyek1');

    }

    public function pdf_viewer()
    {
        $data['page'] = 'proyek/pdf';
        $data['js'] = 'proyek/pdf_js';
        $data['css'] = 'css_table';
        $data['menu'] = 'Proyek1';

        $this->load->view('proyek/pdf');
        $this->load->view('layout', $data);

    }

    public function pdf($id)
    {
        $f = $this->bq_file_model->get($id);
        $d = "upload/bq/".$f->nama_bq_file;

        $this->output
            ->set_content_type('application/pdf')
            ->set_output(file_get_contents($d));
    }

    public function pdf_hapus($id){
        $d = $this->bq_file_model->get($id);
        $this->bq_file_model->delete($id, $d->nama_bq_file);

        redirect('proyek/stlp2/'. $d->proyek_id_bq_file);
    }

    public function rugi_laba($id)
    {
        $has_permission = has_permission('rugi_laba', 'view');
        if (!$has_permission) {
            access_denied('rugi_laba', 'view');
        }

        $data['page'] = 'proyek/layout';
        $data['subpage'] = 'proyek/rugi_laba/table';
        $data['js'] = 'proyek/rugi_laba/table_js';
        $data['css'] = 'css_table';
        $data['menu'] = 'Proyek1';
        $data['headmenu'] = 'rugi_laba';


        $t = $this->proyek_model->get($id);
        $data['data'] = $t;

        $data['title'] = "Laba Rugi | $t->nama_proyek";

//        $data['list'] = $this->bq_model->get_list($id);
        $data['pendapatan_proyek'] = $this->proyek_model->get_pendapatan_proyek($id);
        $data['ppn_bq'] = $this->bq_model->get_ppn($id);

        $this->load->view('layout', $data);

    }

    public function selesai($id){

        $this->proyek_model->update_proyek($id, ['st_selesai_proyek' => 2]);
        redirect('proyek/rugi_laba/'.$id);
    }

    public function belum_selesai($id){

        $this->proyek_model->update_proyek($id, ['st_selesai_proyek' => 1]);
        redirect('proyek/rugi_laba/'.$id);
    }

    public function cek_no()
    {
        if ($this->input->post('no')) {
            $total_rows = $this->proyek_model->cek_no($this->input->post('no'), $this->input->post('id'));
            if ($total_rows == 0) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
            die();
        }
    }

    public function cek_no_dok()
    {
        if ($this->input->post('no')) {
            $total_rows = $this->proyek_model->cek_no_dok($this->input->post('no'), $this->input->post('id'));
            if ($total_rows == 0) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
            die();
        }
    }

    public function cek_no_spk()
    {
        if ($this->input->post('no')) {
            $total_rows = $this->proyek_model->cek_no_spk($this->input->post('no'), $this->input->post('id'));
            if ($total_rows == 0) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
            die();
        }
    }
}