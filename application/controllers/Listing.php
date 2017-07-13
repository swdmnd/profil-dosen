<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Listing extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pencarian_model','users');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $users = $this->users->get_list_users();
		
		$data['users'] = $users;		
		$this->load->view('list_dosen', $data);
    }
 
}