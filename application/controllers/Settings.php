<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller {

	public function __construct(){
        parent::__construct();
        $this->cek_session_in();
    }
    
	public function index()
	{
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Akun_model');        
        
        $this->data['identitas'] = $this->Akun_model->getIdentitas();
      //die(var_dump($this->data['identitas']));
        
        $this->data['content'] = 'settings';
        $this->set_page_header("Pengaturan", "");
		$this->load->view('template', $this->data);
	}
  
    public function save($target)
	{
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Akun_model');
        
        $post_data = $this->input->post();
        unset($post_data['save']);
        $post_data['uid'] = $this->session->userdata('login')->uid;
        if($target == "profile") {
            if($this->session->userdata('login')->level != 'admin'){
              if (!empty($_FILES['foto']['name'])) {
                $this->load->library('upload');

                $config['upload_path']          = sanitize_path($this->session->userdata('work_dir').'/.profile/');
                $config['allowed_types']        = 'jpg|png';
                $config['max_size']             = 2000;
                $config['overwrite']            = TRUE;

                $config['file_name']            = md5($this->session->userdata('login')->uid.'_foto'.date(DATE_RFC2822));
                $this->upload->initialize($config);

                $uploaded = array();

                if ( !$this->upload->do_upload('foto') )
                {
                    $this->session->set_flashdata('failure', $this->upload->display_errors());
                }
                else
                {
    //                if(file_exists($data_jamaah['foto'])){
    //                    unlink($data_jamaah['foto']);
    //                }
                    $post_data['foto']=$config['file_name'].$this->upload->data('file_ext');
                }
              }
            }
            $this->session->userdata('login')->nama = $post_data['nama'];
            $this->Akun_model->setIdentitas($post_data);
        } else if($target == "password") {
            $identitas = $this->Akun_model->getIdentitas();
            if(md5($post_data["old"]) != $identitas->password){
              $this->session->set_flashdata("failure_pass","Password lama salah.");
            } else if($post_data["password"]!=$post_data["password_retype"]){
              $this->session->set_flashdata("failure_pass","Password baru dengan yang diulangi tidak cocok.");
            } else {
              $this->Akun_model->setIdentitas(array("password"=>md5($post_data['password'])));
              $this->session->set_flashdata("success_pass","Password berhasil diganti.");
            }
        }
        
        redirect('/settings');
	}
}
