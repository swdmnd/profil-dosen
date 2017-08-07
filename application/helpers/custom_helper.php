<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function human_filesize($bytes, $decimals = 2) {
  $sz = 'BKMGTP';
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . " " . @$sz[$factor] . "B";
}

function rrmdir($dir) {
    $slash="/";
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        $dir = str_replace("/", "\\", $dir);
        $slash = "\\";
    }
    if (is_dir($dir)) { 
        $objects = scandir($dir); 
        foreach ($objects as $object) { 
            if ($object != "." && $object != "..") { 
                if (is_dir($dir.$slash.$object))
                    rrmdir($dir.$slash.$object);
                else
                    unlink($dir.$slash.$object); 
            } 
        }
        rmdir($dir); 
    } 
}

function sanitize_path($path){
  if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
      $path = str_replace("/", "\\", $path);
  }
  return $path;
}

function datetostr($date){
    if($date=="0000-00-00") return $date;
    $list = 
        array(
            'JANUARI',
            'FEBRUARI',
            'MARET',
            'APRIL',
            'MEI',
            'JUNI',
            'JULI',
            'AGUSTUS',
            'SEPTEMBER',
            'OKTOBER',
            'NOVEMBER',
            'DESEMBER'
             );
    $tokens = explode('-', $date);
    $tokens[1] = ucfirst(strtolower($list[intval($tokens[1])-1]));
    return $tokens[2].' '.$tokens[1].' '.$tokens[0];
}

function strtodate($str){
    if(!$str) return null;
    $list = 
        array(
            'JANUARI'=>'1',
            'FEBRUARI'=>'2',
            'MARET'=>'3',
            'APRIL'=>'4',
            'MEI'=>'5',
            'JUNI'=>'6',
            'JULI'=>'7',
            'AGUSTUS'=>'8',
            'SEPTEMBER'=>'9',
            'OKTOBER'=>'10',
            'NOVEMBER'=>'11',
            'DESEMBER'=>'12'
             );
    $tokens = explode(' ', $str);
    $tokens[1] = $list[strtoupper($tokens[1])];
    return $tokens[2].'-'.$tokens[1].'-'.$tokens[0];
}

$fpdf = '../assets/plugins/fpdf/fpdf.php';
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    $fpdf = str_replace("/", "\\", $fpdf);
}
require_once(APPPATH.$fpdf);