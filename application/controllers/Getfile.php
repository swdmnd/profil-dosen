<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getfile extends MY_Controller {

	public function __construct(){
        parent::__construct();
        //$this->cek_session_in();
    }
    
	public function index()
	{
        show_404();
	}
  
    public function profileImage($rect=false, $uname=null){
      $this->load->model('Akun_model');        
      
      if($uname) $identitas=$this->Akun_model->getUserByUsername($uname);
      else $identitas=$this->Akun_model->getIdentitas();
      if($identitas->foto!=''){
        $imageName = $identitas->foto;
        $type=explode('.', $imageName)[1];
        $imagePath=sanitize_path($this->session->userdata('work_dir').'/.profile/'.$imageName);
      } else{
        $imagePath = base_url()."assets/img/blank.png";
        $type="png";
      }
      
      $imageInfo=getimagesize($imagePath);
      if($imageInfo[0] < $imageInfo[1]){
        $size=$imageInfo[0];
      } else {
        $size=$imageInfo[1];
      }
      if(strtolower($type) == 'jpg' || strtolower($type) == 'jpeg'){
        $image = imagecreatefromjpeg($imagePath);
        if($rect){
          $image = imagecrop($image, array('x'=>0,'y'=>0,'width'=>$size,'height'=>$size));
        }
        header('Content-Type: image/jpeg');
        imagejpeg($image);
      } else if(strtolower($type) == 'png'){
        $image = imagecreatefrompng($imagePath);
        imageAlphaBlending($image, true);
        imageSaveAlpha($image, true);
        if($rect){
          $image = imagecrop($image, array('x'=>0,'y'=>0,'width'=>$size,'height'=>$size));
        }
        header('Content-Type: image/png');
        imagepng($image);
      }
    }
}
