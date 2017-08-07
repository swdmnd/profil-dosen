<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct(){
        parent::__construct();
        $this->cek_session_in('admin');
    }
    
	public function index()
	{
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Akun_model');        
        
        $this->data['users'] = $this->Akun_model->getAllUsers();
        
        $this->data['content'] = 'admin_view';
        $this->set_tab_index("1");
        $this->set_page_header("Akun", "");
		$this->load->view('template', $this->data);
	}
  
    public function save($target)
	{
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Akun_model');
        
        $post_data = $this->input->post();
        unset($post_data['save']);
        $post_data['level'] = "dosen";
        if($target == "account") {
            if($post_data["password"]!=$post_data["password_retype"]){
              $this->session->set_flashdata("failure","Password yang diatur dengan yang diulangi tidak cocok.");
            } else {
              unset($post_data["password_retype"]);
              $post_data["password"] = md5($post_data['password']);
              if($this->Akun_model->addUser($post_data)) $this->session->set_flashdata("success","Akun telah ditambahkan.");
              else $this->session->set_flashdata("failure","NIK telah terdaftar.");
            }
        }
        
        redirect('/admin');
	}
}
