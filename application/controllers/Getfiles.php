<?php
 defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
 class Getfiles extends CI_Controller {
  public function __construct() {
   parent::__construct ();
   $this->load->helper('download');
  }

  public function index() {
    show_404();
  }

  public function download($fileName) {

    //echo $fileName;
    $decoded = base64_decode($fileName);

    $file = base_url().$decoded;
    //echo $file;
    $link_array = explode('/',$file);
    $filename = end($link_array);
    //echo $filename;
    // check file exists
    //if (file_exists ($file)) {
     // get file content
     //echo $file;
     $data = file_get_contents ( $file );
     //force download
     force_download ( $filename, $data );

   //}
  }
 }
