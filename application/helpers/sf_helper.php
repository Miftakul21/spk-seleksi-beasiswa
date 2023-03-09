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