<?php
date_default_timezone_set('Asia/Jakarta');

function activate_menu($menu)
{
    $CI =& get_instance();
    $classname = $CI->router->fetch_class();
    return $classname == $menu ? 'active' : '';
}

function tgl_indo($tgl) 
{
    $date = date_create($tgl);
    $date2 = date_format($date, 'd-m-Y');
    return $date2;
}

function split_string($str,$posisi)
{
    $value = $str;
    $pisah = explode('|',$value)[$posisi];

    return $pisah;
}

function split_date($str,$posisi)
{
    $value = $str;
    $pisah = explode('-',$value)[$posisi];
    return $pisah;
}

function nama_bulan($bulan)
{
    switch($bulan){
        case '1':
            return 'Januari';
            break;
        case '2':
            return 'Februari';
            break;
        case '03':
            return 'Maret';
            break;
        case '04':
            return 'April';
            break;
        case '05':
            return 'Mei';
            break;
        case '06':
            return 'Juni';
            break;
        case '07':
            return 'Juli';
            break;
        case '8':
            return 'Agustus';
            break;
        case '9':
            return 'September';
            break;
        case '10':
            return 'Oktober';
            break;
        case '11':
            return 'November';
            break;
        case '12':
            return 'Desember';
            break;
        default:
            return 'Tidak ada';
            break;
    }
}