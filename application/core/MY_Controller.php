<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    protected $data;
    public function __construct(){
        parent::__construct();
        $this->data['user'] = $this->session->userdata('login');
        $this->data['page_header'] = (object) array("title"=>"", "description"=>"");
        $this->data['path'] = array();
        $this->data['title'] = "Universitas Diponegoro";
        $this->data['tab'] = "";
    }
    
    public function cek_session_in(){
		if($this->session->userdata('login')==null){
			redirect(site_url('login/index'));
		}
	}

	public function cek_session_out(){
		if($this->session->userdata('login')!=null){
			redirect(site_url('home/index'));
		}
	}
    
    public function set_tab_index($i){
        $this->data['tab'] = $i;
    }
    
    public function set_page_header($title, $desc){
        $this->data['page_header']->title = $title;
        $this->data['page_header']->description = $desc;
    }
    
    public function define_path($text, $href=null, $mode="append"){
        if($mode == "overwrite") $this->data['path'] = array();
        if(is_array($text)){
            foreach($text as $p){
                $this->data['path'][]=(object) array("href"=>$p['href'], "text"=>$p['text']);
            }
        } else {
            $this->data['path'][]=(object) array("href"=>$href, "text"=>$text);
        }
    }
    
    public function set_title($title, $mode="prepend"){
        if($mode == "overwrite") $this->data['title'] = "Angka Kredit Mahasiswa";
        else $this->data['title'] = $title.' | '.$this->data['title'];
    }
}
