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
				$this->data['identitas'] = $this->Akun_model->getIdentitas();
        $this->data['uid'] = $this->session->userdata('login')->uid;
        $this->data['content'] = 'admin_view';
        $this->set_tab_index("1");
        $this->set_page_header("Akun", "");
		$this->load->view('templateadmin', $this->data);
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

    public function delete($uid){
      $this->load->model('Akun_model');
      $identitas = $this->Akun_model->getIdentitas($uid);

      if(file_exists(APPPATH.'../files/'.$identitas->uid.$identitas->no_induk)){
        rrmdir(APPPATH.'../files/'.$identitas->uid.$identitas->no_induk);
      }

      $this->Akun_model->deleteUser($uid);

      redirect('/admin');
    }

    public function update($uid)
	{
        $this->load->model('Akun_model');

        $identitas = $this->Akun_model->getIdentitas($uid);

        header('Content-Type: application/json');

        $post_data = $this->input->post();
        $post_data['no_induk'] = $post_data['nik'];
        unset($post_data['nik']);
        if($this->input->post('password')){
          if($post_data["password"]!=$post_data["password_retype"]){
            echo json_encode(array("status"=>"error", "msg"=>"Password yang diulangi tidak sama. Seluruh perubahan dibatalkan."));
            return;
          } else {
            unset($post_data["password_retype"]);
            $post_data["password"] = md5($post_data['password']);
          }
        } else {
          unset($post_data["password_retype"]);
          unset($post_data["password"]);
        }
        if($this->Akun_model->setIdentitasuid($post_data, $uid)){
          if(file_exists(APPPATH.'../files/'.$identitas->uid.$identitas->no_induk)){
            rename(APPPATH.'../files/'.$identitas->uid.$identitas->no_induk,APPPATH.'../files/'.$uid.$post_data['no_induk']);
          }
          echo json_encode(array("status"=>"success", "msg"=>"Perubahan berhasil dilakukan."));
        }
        else
				{
          echo json_encode(array("status"=>"error", "msg"=>"NIK sudah terdaftar. Seluruh perubahan dibatalkan."));
				}
	}
}
