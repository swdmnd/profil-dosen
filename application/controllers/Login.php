<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct(){
        parent::__construct();
    }

	public function index()
	{
        $this->cek_session_out();
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->model('Login_model');
        if($this->input->post('login') && !isset($data['username'])){
            $this->form_validation->set_rules('username', 'Username', 'required', array('required'=>''));
            $this->form_validation->set_rules('password', 'Password', 'required', array('required'=>''));

            if($this->form_validation->run()===FALSE){
                $data['error_msg'] = "Username atau password salah.";
            } else {
                if(!empty($result=$this->Login_model->login())) {
                    $this->session->set_userdata('login', $result);
										if($result->level=="dosen"){
                    $WORK_DIR = $GLOBALS['WORK_DIR'].$result->uid.(string)$result->no_induk;
                    if(!file_exists($WORK_DIR)){
                        mkdir(sanitize_path($WORK_DIR));
                        mkdir(sanitize_path($WORK_DIR.'/profile'));
												mkdir(sanitize_path($WORK_DIR.'/foto'));
                    }
                    $this->session->set_userdata('work_dir', $WORK_DIR);
                    redirect('home/index', 'location');
									} else if($result->level=="admin"){
										redirect('admin', 'location');
                }
							}
								 else {
                    $data['error_msg'] = "Username atau password salah.";
                }
            }
        }
		$this->load->view('login');
	}

    public function logout()
	{
        $this->session->sess_destroy();
        redirect('login/index', 'location');
	}
}
