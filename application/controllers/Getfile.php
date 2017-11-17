<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getfile extends MY_Controller {

	public function __construct(){
        parent::__construct();
        $this->cek_session_in();
    }

	public function index()
	{
        show_404();
	}

    public function profileImage($rect=false){
      $this->load->model('Akun_model');

      $identitas=$this->Akun_model->getIdentitas();
      if($identitas->foto!=''){
        $imageName = $identitas->foto;
        $type=explode('.', $imageName)[1];
        $imagePath=sanitize_path($this->session->userdata('work_dir').'/foto/'.$imageName);
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
		public function profileImageEdit($rect=false,$uid=''){
      $this->load->model('Akun_model');

      $identitas=$this->Akun_model->getIdentitas($uid);
      if($identitas->foto!=''){
        $imageName = $identitas->foto;
        $type=explode('.', $imageName)[1];
        $imagePath=sanitize_path($this->session->userdata('work_dir').'/foto/'.$imageName);
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

		public function profileImageAdmin($rect=false,$uid=''){
			$this->load->model('Akun_model');

			$identitas=$this->Akun_model->getIdentitas($uid);
			if($identitas->foto!=''){
				$imagePath = $identitas->foto_path;
				$imageName = $identitas->foto;
				$type=explode('.', $imageName)[1];
				$imagePath=sanitize_path($imagePath.$imageName);
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
