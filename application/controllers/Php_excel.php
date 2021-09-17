<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Php_excel extends MY_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jurnal_model');
        $this->load->model('coa_model');
        $this->load->model('transaksi_model');

        $this->load->library('PHPExcel');
    }


    public function index()
    {


    }

    public function set_bulan($dari, $hingga)
    {
        $bln1 = tgl_indo($dari, 'x', 1);
        $bln2 = tgl_indo($hingga, 'x', 1);

        return 'Per ' . $bln1 . ' - ' . $bln2;
    }

    public function export_neraca_saldo($dari, $hingga)
    {
        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getActiveSheet()
            ->mergeCells('A2:D2')
            ->mergeCells('A3:D3')
            ->mergeCells('A4:D4')
            ->mergeCells('A7:A8')
            ->mergeCells('B7:B8')
            ->mergeCells('C7:D7');

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(60);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);

        $objPHPExcel->getActiveSheet()
            ->setCellValue('A2', 'AKPER BINA INSAN JAKARTA UTARA')
            ->setCellValue('A3', 'NERACA SALDO')
            ->setCellValue('A4', $this->set_bulan($dari, $hingga))
            ->setCellValue('A7', 'NO AKUN')
            ->setCellValue('B7', 'AKUN')
            ->setCellValue('C7', 'NERACA SALDO')
            ->setCellValue('C8', 'DEBIT')
            ->setCellValue('D8', 'KREDIT');

        $styleJudul = [
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'bold' => true,
                'color' => ['rgb' => '000000'],
                'size' => 22,
            ],
        ];

        $objPHPExcel->getActiveSheet()
            ->getStyle('A2:A4')
            ->applyFromArray($styleJudul);


        $styleHeader = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'borders' => [
                'allborders' => [
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => ['rgb' => 'DDDDDD']
                ]
            ],
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ],
            'fill' => [
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => ['rgb' => '0A7C71']
            ],
        ];

        $objPHPExcel->getActiveSheet()
            ->getStyle('A7:D8')
            ->applyFromArray($styleHeader);

        $dari = tgl_dt($dari);
        $hingga = tgl_dt($hingga);

        $data = $this->jurnal_model->get_akun_neraca_saldo($dari, $hingga);

        $no = 9;
        foreach ($data as $d) {
            $nominal = get_saldo_neraca_saldo($dari, $hingga, $d->kode_coa);

            $objPHPExcel->getActiveSheet()
                ->setCellValue('A' . $no, strval($d->kode_coa))
                ->setCellValue('B' . $no, $d->nama_coa);

            if ($nominal['status'] == 1) {
                $objPHPExcel->getActiveSheet()
                    ->setCellValue('C' . $no, $nominal['saldo']);
            } else {
                $objPHPExcel->getActiveSheet()
                    ->setCellValue('D' . $no, $nominal['saldo']);
            }

            $no++;
        }

        $objPHPExcel->getActiveSheet()
            ->getStyle('A9:A' . $no)
            ->getNumberFormat()
            ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
//            ->getNumberFormat()->setFormatCode('##0.00');

        $objPHPExcel->getActiveSheet()
            ->getStyle('C9:D' . $no)
            ->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_CURRENCY_RP);


        $styleBody = [
            'borders' => [
                'allborders' => [
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => ['rgb' => '000000']
                ]
            ]
        ];

        $objPHPExcel->getActiveSheet()
            ->getStyle('A9:D' . $no)
            ->applyFromArray($styleBody);


        $objPHPExcel->getActiveSheet()
            ->mergeCells('A' . $no . ':B' . $no)
            ->setCellValue('A' . $no, 'Total ');

        $styleFooter = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => '000000'],
            ],
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
            ],
            'fill' => [
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => ['rgb' => 'DDDDDD']
            ],
        ];

        $objPHPExcel->getActiveSheet()
            ->getStyle('A' . $no . ':D' . $no)
            ->applyFromArray($styleFooter);

        $no_t = $no - 1;

        $objPHPExcel->getActiveSheet()
            ->setCellValue(
                'C' . $no,
                '=SUM(C9:C' . $no_t . ')'
            )
            ->setCellValue(
                'D' . $no,
                '=SUM(D9:D' . $no_t . ')'
            );


        $judul = "Neraca Saldo";

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle($judul);

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        header('Content-Disposition: attachment;filename="neraca_saldo.xlsx"');

        $objWriter->save("php://output");

    }


    public function export_buku_besar($kode, $bulan, $tahun)
    {

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getActiveSheet()
            ->mergeCells('A2:F2')
            ->mergeCells('A3:F3')
            ->mergeCells('A4:F4')
            ->mergeCells('A9:C9')
            ->mergeCells('D9:F9')
            ->mergeCells('A10:A11')
            ->mergeCells('B10:B11')
            ->mergeCells('C10:C11')
            ->mergeCells('D10:E10')
            ->mergeCells('F10:F11');

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(60);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);

        $akun = $this->coa_model->get_kode($kode);

        $objPHPExcel->getActiveSheet()
            ->setCellValue('A2', 'AKPER BINA INSAN JAKARTA UTARA')
            ->setCellValue('A3', 'BUKU BESAR')
            ->setCellValue('A4', $akun->nama_coa)
            ->setCellValue('A9', tgl_bulan_indo($bulan, $tahun))
            ->setCellValue('D9', "Kode Akun: $akun->kode_coa")
            ->setCellValue('A10', 'TGL')
            ->setCellValue('B10', 'NO BUKTI')
            ->setCellValue('C10', 'URAIAN')
            ->setCellValue('D10', 'JUMLAH')
            ->setCellValue('D11', 'DEBIT')
            ->setCellValue('E11', 'KREDIT')
            ->setCellValue('F10', 'SALDO');

        $styleJudul = [
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'bold' => true,
                'color' => ['rgb' => '000000'],
                'size' => 22,
            ],
        ];

        $objPHPExcel->getActiveSheet()
            ->getStyle('A2:F4')
            ->applyFromArray($styleJudul);


        $styleSubJudul1 = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => '333333'],
                'size' => 14,
            ],
            'alignment' => [
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ],
        ];

        $objPHPExcel->getActiveSheet()
            ->getStyle('A9:C9')
            ->applyFromArray($styleSubJudul1);

        $styleSubJudul2 = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => '333333'],
                'size' => 14,
            ],
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ],
        ];

        $objPHPExcel->getActiveSheet()
            ->getStyle('D9:F9')
            ->applyFromArray($styleSubJudul2);


        $styleHeader = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'borders' => [
                'allborders' => [
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => ['rgb' => 'DDDDDD']
                ]
            ],
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ],
            'fill' => [
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => ['rgb' => '0A7C71']
            ],
        ];

        $objPHPExcel->getActiveSheet()
            ->getStyle('A10:F11')
            ->applyFromArray($styleHeader);


        $data = $this->transaksi_model->get_all_kas_besar($kode, $bulan, $tahun);

        $no = 12;
        $saldo = 0;
        foreach ($data as $d) {

            if ($d->saldo_awal_transaksi == 1) {
                $objPHPExcel->getActiveSheet()
                    ->setCellValue('C' . $no, 'Saldo Awal');
            } else {
                $objPHPExcel->getActiveSheet()
                    ->setCellValue('C' . $no, $d->untuk_jurnal);

            }

            $objPHPExcel->getActiveSheet()
                ->setCellValue('A' . $no, tgl_indo($d->tgl_transaksi))
                ->setCellValue('B' . $no, $d->no_jurnal);

            if ($d->jenis_transaksi == 1) {
                $objPHPExcel->getActiveSheet()
                    ->setCellValue('D' . $no, $d->nominal_transaksi);
            } else {
                $objPHPExcel->getActiveSheet()
                    ->setCellValue('E' . $no, $d->nominal_transaksi);
            }

            if ($d->jenis_transaksi == 1) {
                $saldo += $d->nominal_transaksi;
            } else {
                $saldo -= $d->nominal_transaksi;
            }

            $objPHPExcel->getActiveSheet()
                ->setCellValue('F' . $no, $saldo);

            $no++;
        }

        $objPHPExcel->getActiveSheet()
            ->getStyle('A11:A' . $no)
            ->getNumberFormat()
            ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
//            ->getNumberFormat()->setFormatCode('##0.00');

        $objPHPExcel->getActiveSheet()
            ->getStyle('D11:F' . $no)
            ->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_CURRENCY_RP);


        $styleBody = [
            'borders' => [
                'allborders' => [
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => ['rgb' => '000000']
                ]
            ]
        ];

        $objPHPExcel->getActiveSheet()
            ->getStyle('A12:F' . $no)
            ->applyFromArray($styleBody);


        $objPHPExcel->getActiveSheet()
            ->mergeCells('A' . $no . ':E' . $no)
            ->setCellValue('A' . $no, 'Total ');

        $styleFooter = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => '000000'],
            ],
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
            ],
            'fill' => [
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => ['rgb' => 'DDDDDD']
            ],
        ];

        $objPHPExcel->getActiveSheet()
            ->getStyle('A' . $no . ':F' . $no)
            ->applyFromArray($styleFooter);

        $no_t = $no - 1;

        $objPHPExcel->getActiveSheet()
            ->setCellValue(
                'F' . $no,
                $saldo
            );


        $judul = "Buku Besar $kode (" . tgl_bulan_indo($bulan, $tahun) . ")";

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle($judul);

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        header('Content-Disposition: attachment;filename="' . $judul . '.xlsx"');

        $objWriter->save("php://output");

    }


    public function export_sub_buku_besar($kode, $bulan, $tahun)
    {

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getActiveSheet()
            ->mergeCells('A2:F2')
            ->mergeCells('A3:F3')
            ->mergeCells('A4:F4')
            ->mergeCells('A9:C9')
            ->mergeCells('D9:F9')
            ->mergeCells('A10:A11')
            ->mergeCells('B10:B11')
            ->mergeCells('C10:C11')
            ->mergeCells('D10:E10')
            ->mergeCells('F10:F11');

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(60);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);

        $akun = $this->coa_model->get_kode($kode);

        $objPHPExcel->getActiveSheet()
            ->setCellValue('A2', 'AKPER BINA INSAN JAKARTA UTARA')
            ->setCellValue('A3', 'SUB BUKU BESAR')
            ->setCellValue('A4', $akun->nama_coa)
            ->setCellValue('A9', tgl_bulan_indo($bulan, $tahun))
            ->setCellValue('D9', "Kode Akun: $akun->kode_coa")
            ->setCellValue('A10', 'TGL')
            ->setCellValue('B10', 'NO BUKTI')
            ->setCellValue('C10', 'URAIAN')
            ->setCellValue('D10', 'JUMLAH')
            ->setCellValue('D11', 'DEBIT')
            ->setCellValue('E11', 'KREDIT')
            ->setCellValue('F10', 'SALDO');

        $styleJudul = [
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'bold' => true,
                'color' => ['rgb' => '000000'],
                'size' => 22,
            ],
        ];

        $objPHPExcel->getActiveSheet()
            ->getStyle('A2:F4')
            ->applyFromArray($styleJudul);


        $styleSubJudul1 = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => '333333'],
                'size' => 14,
            ],
            'alignment' => [
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ],
        ];

        $objPHPExcel->getActiveSheet()
            ->getStyle('A9:C9')
            ->applyFromArray($styleSubJudul1);

        $styleSubJudul2 = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => '333333'],
                'size' => 14,
            ],
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ],
        ];

        $objPHPExcel->getActiveSheet()
            ->getStyle('D9:F9')
            ->applyFromArray($styleSubJudul2);


        $styleHeader = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'borders' => [
                'allborders' => [
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => ['rgb' => 'DDDDDD']
                ]
            ],
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ],
            'fill' => [
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => ['rgb' => '0A7C71']
            ],
        ];

        $objPHPExcel->getActiveSheet()
            ->getStyle('A10:F11')
            ->applyFromArray($styleHeader);


        $data = $this->transaksi_model->get_all_kas_besar($kode, $bulan, $tahun);

        $no = 12;
        $saldo = 0;
        foreach ($data as $d) {

            if ($d->saldo_awal_transaksi == 1) {
                $objPHPExcel->getActiveSheet()
                    ->setCellValue('C' . $no, 'Saldo Awal');
            } else {
                $objPHPExcel->getActiveSheet()
                    ->setCellValue('C' . $no, $d->untuk_jurnal);

            }

            $objPHPExcel->getActiveSheet()
                ->setCellValue('A' . $no, tgl_indo($d->tgl_transaksi))
                ->setCellValue('B' . $no, $d->no_jurnal);

            if ($d->jenis_transaksi == 1) {
                $objPHPExcel->getActiveSheet()
                    ->setCellValue('D' . $no, $d->nominal_transaksi);
            } else {
                $objPHPExcel->getActiveSheet()
                    ->setCellValue('E' . $no, $d->nominal_transaksi);
            }

            if ($d->jenis_transaksi == 1) {
                $saldo += $d->nominal_transaksi;
            } else {
                $saldo -= $d->nominal_transaksi;
            }

            $objPHPExcel->getActiveSheet()
                ->setCellValue('F' . $no, $saldo);

            $no++;
        }

        $objPHPExcel->getActiveSheet()
            ->getStyle('A11:A' . $no)
            ->getNumberFormat()
            ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
//            ->getNumberFormat()->setFormatCode('##0.00');

        $objPHPExcel->getActiveSheet()
            ->getStyle('D11:F' . $no)
            ->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_CURRENCY_RP);


        $styleBody = [
            'borders' => [
                'allborders' => [
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => ['rgb' => '000000']
                ]
            ]
        ];

        $objPHPExcel->getActiveSheet()
            ->getStyle('A12:F' . $no)
            ->applyFromArray($styleBody);


        $objPHPExcel->getActiveSheet()
            ->mergeCells('A' . $no . ':E' . $no)
            ->setCellValue('A' . $no, 'Total ');

        $styleFooter = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => '000000'],
            ],
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
            ],
            'fill' => [
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => ['rgb' => 'DDDDDD']
            ],
        ];

        $objPHPExcel->getActiveSheet()
            ->getStyle('A' . $no . ':F' . $no)
            ->applyFromArray($styleFooter);

        $no_t = $no - 1;

        $objPHPExcel->getActiveSheet()
            ->setCellValue(
                'F' . $no,
                $saldo
            );


        $judul = "Sub Buku Besar $kode ";

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle($judul);

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        header('Content-Disposition: attachment;filename="' . $judul . '.xlsx"');

        $objWriter->save("php://output");

    }
}