<?php

function cek_status_approval_proyek($id){
    $CI =&get_instance();
    $CI->db->where('id_proyek', $id);
    $c =  $CI->db->get('Proyek1')->row();

    if($c->approval_proyek == 1 || $c->approval_proyek == 3 || $c->approval_proyek == 9 ){
        return false;
    }else{
        return true;
    }
}

function string_potong($in, $pj = '20'){
    return strlen($in) > $pj ? substr($in,0,$pj)."..." : $in;
}

function angka_jutaan($angka, $dec = 0){
    if($angka < 0)
        return "<span class='text-danger'> (".number_format(substr($angka, $dec, -6), 0, '.','.').")</span>";
    else
        return number_format(substr($angka, 0, -6), $dec, '.','.');
}

function angka_akun($angka, $dec = 0){
    if($angka < 0){
        $angka = substr($angka, 1);
        return "<span class='text-danger'> (".number_format($angka, $dec, '.','.').")</span>";
    }
    else
        return number_format($angka, $dec, '.','.');
}

function angka_akun_banding($angka, $dec = 0, $param1 = 0, $param2 = 0){

    if($param1 > $param2 || $angka < 0){
        if($angka < 0){
            $angka = substr($angka, 1);
        }
        return "<span class='text-danger'> (".number_format($angka, $dec, '.','.').")</span>";
    }
    else
        return number_format($angka, $dec, '.','.');
}

function angka_akun_lama($angka, $dec = 0){
    if($angka < 0)
        return "<span class='text-danger'> (".number_format($angka, $dec, '.','.').")</span>";
    else
        return number_format($angka, $dec, '.','.');
}

function mego_select_data($data, $pid, $pnama)
{
    $options = array();
    foreach ($data->result() as $d) {
        $options[$d->$pid] = $d->$pnama;
    }

    return $options;
}

function mego_link($link)
{

    $link = strtolower(str_replace(' ', '_', $link));
    return preg_replace('/[^A-Za-z0-9\_]/', '', $link);
}

function mego_unlink($link)
{
    return ucwords(str_replace('_', ' ', $link));

}

function mego_text_capital($text)
{
    return ucwords(strtolower($text));
}

function mego_rand($long = 5, $sm = 0)
{
    if ($sm == 0) {
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    } else {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    }


    $string = '';
    $max = strlen($characters) - 1;
    for ($i = 0; $i < $long; $i++) {
        $string .= $characters[mt_rand(0, $max)];
    }

    return $string;
}

function mego_bulan($gt, $pj = 0)
{
    if ($pj == 0) {
        $bln = array(
            '01' => 'Jan',
            '02' => 'Feb',
            '03' => 'Mar',
            '04' => 'Apr',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Ags',
            '09' => 'Sept',
            '10' => 'Okt',
            '11' => 'Nov',
            '12' => 'Des'
        );
    } else {
        $bln = array(
            '01' => 'Januari',
            '02' => 'Febuari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        );
    }


    return $bln[$gt];
}

function tgl_selisih($t1, $t2){
    $earlier = new DateTime($t1);
    $later = new DateTime($t2);

    return $later->diff($earlier)->format("%a");
}

function tgl_tambah($tgl, $hari){
    return date('Y-m-d', strtotime($tgl. ' + '.$hari.' days'));
}

function tgl_dt($tgl)
{
    return date("Y-m-d", strtotime($tgl));
}

function tgl_indo($tgl, $bln = 'angka', $pj = 0)
{
    if ($bln == 'angka') {
        $kirim = date("d-m-Y", strtotime($tgl));
    } else {
        $kirim = date("d ", strtotime($tgl));
        $kirim .= mego_bulan(date("m", strtotime($tgl)), $pj);
        $kirim .= date(" Y", strtotime($tgl));
    }
    return $kirim;
}

function tgl_bulan_indo($bulan, $tahun){
    return mego_bulan($bulan, 1)." ".$tahun;
}

function tgl_hari($tgl)
{
    $hr = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');

    return $hr[$tgl];
}

function mego_tgl_js($tgl)
{
    $hr = date("d", strtotime($tgl));
    $bl = date("m", strtotime($tgl));
    $yr = date("Y", strtotime($tgl));

    $h = date("H", strtotime($tgl));
    $i = date("i", strtotime($tgl));

    return $bl . '/' . $hr . '/' . $yr . ' ' . $h . ':' . $i;

}

function tgl_diff($interval, $datefrom, $dateto, $using_timestamps = false)
{
    /*
    $interval can be:
    yyyy - Number of full years
    q - Number of full quarters
    m - Number of full months
    y - Difference between day numbers
        (eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)
    d - Number of full days
    w - Number of full weekdays
    ww - Number of full weeks
    h - Number of full hours
    n - Number of full minutes
    s - Number of full seconds (default)
    */

    if (!$using_timestamps) {
        $datefrom = strtotime($datefrom, 0);
        $dateto = strtotime($dateto, 0);
    }
    $difference = $dateto - $datefrom; // Difference in seconds

    switch ($interval) {

        case 'yyyy': // Number of full years
            $years_difference = floor($difference / 31536000);
            if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom) + $years_difference) > $dateto) {
                $years_difference--;
            }
            if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto) - ($years_difference + 1)) > $datefrom) {
                $years_difference++;
            }
            $datediff = $years_difference;
            break;
        case "q": // Number of full quarters
            $quarters_difference = floor($difference / 8035200);
            while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom) + ($quarters_difference * 3), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
                $months_difference++;
            }
            $quarters_difference--;
            $datediff = $quarters_difference;
            break;
        case "m": // Number of full months
            $months_difference = floor($difference / 2678400);
            while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom) + ($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
                $months_difference++;
            }
            $months_difference--;
            $datediff = $months_difference;
            break;
        case 'y': // Difference between day numbers
            $datediff = date("z", $dateto) - date("z", $datefrom);
            break;
        case "d": // Number of full days
            $datediff = floor($difference / 86400);
            break;
        case "w": // Number of full weekdays
            $days_difference = floor($difference / 86400);
            $weeks_difference = floor($days_difference / 7); // Complete weeks
            $first_day = date("w", $datefrom);
            $days_remainder = floor($days_difference % 7);
            $odd_days = $first_day + $days_remainder; // Do we have a Saturday or Sunday in the remainder?
            if ($odd_days > 7) { // Sunday
                $days_remainder--;
            }
            if ($odd_days > 6) { // Saturday
                $days_remainder--;
            }
            $datediff = ($weeks_difference * 5) + $days_remainder;
            break;
        case "ww": // Number of full weeks
            $datediff = floor($difference / 604800);
            break;
        case "h": // Number of full hours
            $datediff = floor($difference / 3600);
            break;
        case "n": // Number of full minutes
            $datediff = floor($difference / 60);
            break;
        default: // Number of full seconds (default)
            $datediff = $difference;
            break;
    }
    return $datediff;
}

function mego_number($str)
{
    return filter_var($str, FILTER_SANITIZE_NUMBER_INT);
}

function terbilang($x)
{
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
        "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x < 12) {
        $temp = " " . $angka[$x];
    } else if ($x < 20) {
        $temp = terbilang($x - 10) . " belas";
    } else if ($x < 100) {
        $temp = terbilang($x / 10) . " puluh" . terbilang($x % 10);
    } else if ($x < 200) {
        $temp = " seratus" . terbilang($x - 100);
    } else if ($x < 1000) {
        $temp = terbilang($x / 100) . " ratus" . terbilang($x % 100);
    } else if ($x < 2000) {
        $temp = " seribu" . terbilang($x - 1000);
    } else if ($x < 1000000) {
        $temp = terbilang($x / 1000) . " ribu" . terbilang($x % 1000);
    } else if ($x < 1000000000) {
        $temp = terbilang($x / 1000000) . " juta" . terbilang($x % 1000000);
    } else if ($x < 1000000000000) {
        $temp = terbilang($x / 1000000000) . " milyar" . terbilang(fmod($x, 1000000000));
    } else if ($x < 1000000000000000) {
        $temp = terbilang($x / 1000000000000) . " trilyun" . terbilang(fmod($x, 1000000000000));
    }
    return ucfirst($temp);
}

function mego_pagination($hal, $total_page, $link, $cari = '')
{

    $kirim = '';

    if ($hal == 1 || $hal == '') {
        $bef = 1;
    } else {
        $bef = $hal - 1;
    }

    if ($hal == $total_page) {
        $nex = $total_page;
    } elseif ($hal == '') {
        $nex = 2;
    } else {
        $nex = $hal + 1;
    }

    if ($total_page > 1) {

        $kirim .= "<ul class='mego-pagination'>";
        $kirim .= "<li><a href='".$link.'1'."'>First</a></li>";
        $kirim .= "<li><a href='$link$bef'><i class='fa fa-chevron-left'></i></a></li>";
        $kirim .= "<li> Hal ";
        $kirim .= "<select>";
        for ($x = 1; $x <= $total_page; $x++) {
            $kirim .= "<option value='" .base_url().$link.$x . "'";
            if ($hal == $x) {
                $kirim .= " selected";
            }
            $kirim .= ">$x</option>";
        }
        $kirim .= "</select>";
        $kirim .= "</li>";
        $kirim .= "<li><a href='$link$nex'><i class='fa fa-chevron-right'></i></a></li>";
        $kirim .= "<li><a href='$link$total_page'>Last</a></li>";
        $kirim .= "</ul>";
    }

    return $kirim;
}

