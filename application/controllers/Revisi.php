<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Revisi extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('revisi_model');
        $this->load->model('revisi_jawab_model');
        $this->load->model('menu_model');
    }


    public function index()
    {

        $data['page'] = 'revisi/table';
        $data['js'] = 'revisi/table_js';
        $data['css'] = 'css_table';
        $data['menu'] = 'revisi';

        $this->load->view('layout', $data);
    }

    public function table()
    {
        $status = [
            1 => "<i class='fa fa-question-circle text-danger'></i>",
            2 => "<i class='fa fa-clock-o text-danger'></i>",
            3 => "<i class='fa fa-check text-success'></i>"
        ];

        $list = $this->revisi_model->get_datatables();
        $data = array();
        foreach ($list as $ls) {
            $row = array();

            $row[] = mego_text_capital($ls->modul_id);
            $row[] = "<a href='revisi/detail/$ls->id_revisi'>$ls->isi_revisi</a>";
            $row[] = "<span class='bold'>$ls->nama_user </span><br> ". tgl_indo($ls->create_revisi,'x','9');
            $row[] = $status[$ls->status_revisi];

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->revisi_model->count_all(),
            "recordsFiltered" => $this->revisi_model->count_filtered(),
            "data" => $data,
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function form()
    {
        $data['page'] = 'revisi/form';
        $data['js'] = 'revisi/form_js';
        $data['css'] = 'css_form';
        $data['menu'] = 'revisi';


        $data['judul'] = 'Revisi Baru';

        if ($this->input->post()) {
            $simpan = $this->input->post();

            $this->revisi_model->add($simpan);
            set_alert('success', 'Laporan revisi sudah ditambahkan');


            redirect('revisi');
        }

        $this->load->view('layout', $data);
    }

    public function detail($id = ''){
        if(!$id){
            redirect('revisi');
        }

        read_notification("revisi/detail/$id", get_staff_user_id());

        $data['page'] = 'revisi/detail';
        $data['js'] = 'revisi/detail_js';
        $data['css'] = 'css_form';
        $data['menu'] = 'revisi';

        $data['rev'] = $this->revisi_model->get($id);
        $data['jwb'] = $this->revisi_jawab_model->get($id);

        $this->load->view('layout', $data);
    }

    public function jawab(){
        if ($this->input->post()) {
            $simpan = $this->input->post();

            if($this->input->post('status_revisi')){
                $kirim['id_revisi'] = $this->input->post('revisi_id');
                $kirim['status_revisi'] = $this->input->post('status_revisi');

                $this->revisi_model->update($kirim);
            }

            $this->revisi_jawab_model->add($simpan);
        }

        redirect("revisi/detail/".$this->input->post('revisi_id'));
    }

    public function laporan(){
//        $this->load->library('pdf');
        $this->load->library('pdf_multi_table');

        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'Nama',1,0);
        $pdf->Cell(85,6,'Isi Revisi',1,1);
//        $pdf->Cell(27,6,'NO HP',1,0);
//        $pdf->Cell(25,6,'TANGGAL LHR',1,1);
        $pdf->SetFont('Arial','',10);
        $mahasiswa = $this->db->get('revisi')->result();
        foreach ($mahasiswa as $row){
            $pdf->MultiCell('20%',6,strip_tags($row->user_revisi),1,0);
            $pdf->MultiCell('80%',6,strip_tags($row->isi_revisi),1,1);
//            $pdf->Cell(27,6,$row->no_hp,1,0);
//            $pdf->Cell(25,6,$row->tanggal_lahir,1,1);
        }
        $pdf->Output();
    }


    public function laporan2(){

        $this->load->library('pdf_multi_table');

        $pdf = new pdf_mc_table('l','mm','A4');

        $pdf->AddPage();
        $pdf->SetFont('Arial','',14);
//Table with 20 rows and 4 columns
        $pdf->SetWidths(array(30,150));
        $data = $this->db->get('revisi')->result();
        foreach ($data as $d){
            $pdf->Row(array(strip_tags($d->user_revisi),strip_tags($d->isi_revisi)));
        }

        $pdf->Output();
    }

    public function laporan3()
    {
        $this->load->library('Pdf');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('TCPDF Example 002');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // add a page
        $pdf->AddPage();

        $html = '<h2>HTML TABLE:</h2>
                <table border="1" cellpadding="4">
                    <tr>
                        <th align="left">Penulis Revisi</th>
                        <th >Modul Revisi</th>
                        <th >Status</th>
                        <th >Isi Revisi</th>
                    </tr>';

        $rev = $this->db->get('revisi')->result();
        foreach ($rev as $r) {

            $status = [
                1 => "Belum ditanggapi",
                2 => "Sedang dikerjakan",
                3 => "Selesai"
            ];

            $html .= '<tr nobr="true">
                        <td>'.$r->user_revisi.'<br>'. tgl_indo($r->create_revisi,'x','9') .'</td>';
            $html .=    "<td>$r->modul_id</td>";
            $html .=    "<td>". $status[$r->status_revisi] ."</td>";
            $html .=    '<td>'. strip_tags($r->isi_revisi) ."</td>
                    </tr>";
        }

        $html .= "</table>";

// output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

// Print some HTML Cells

//Close and output PDF document
        $pdf->Output('example_002.pdf', 'I');

    }

}