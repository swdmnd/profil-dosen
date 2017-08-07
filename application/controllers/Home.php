<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct(){
        parent::__construct();
        $this->cek_session_in('dosen');
    }
    
	public function index()
	{
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Akun_model');        
        
        $this->data['identitas'] = $this->Akun_model->getIdentitas();
        $this->data['pendidikan'] = $this->Akun_model->getPendidikan();
        $this->data['pekerjaan'] = $this->Akun_model->getPekerjaan();
        $this->data['penelitian'] = $this->Akun_model->getPenelitian();
        $this->data['penelitian_extra'] = $this->Akun_model->getPenelitianExtra();
        $this->data['pengabdian'] = $this->Akun_model->getPengabdian();
        $this->data['pengabdian_extra'] = $this->Akun_model->getPengabdianExtra();
        $this->data['publikasi'] = $this->Akun_model->getPublikasi();
        $this->data['publikasi_extra'] = $this->Akun_model->getPublikasiExtra();
        $this->data['seminar'] = $this->Akun_model->getSeminar();
        
        $this->data['content'] = 'cv';
        $this->set_tab_index("1");
        $this->set_page_header("Curriculum Vitae", "CV <a href=\"".site_url()."/home/printpdf\"><i class=\"glyphicon glyphicon-print\"></i></a>");
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
        if($target == "identitas") {
            $post_data['mk_diampu'] = serialize(array_map('trim', $post_data['mk_diampu']));
            $post_data['tanggal_lahir'] = strtodate($post_data['tanggal_lahir']);
            $this->Akun_model->setIdentitas($post_data);
        } else if($target == "pendidikan") {
            $post_data['pembimbing'] = implode(', ', array_map('trim', $post_data['pembimbing']));
            $this->Akun_model->setPendidikan($post_data);
        } else if($target == "penelitian") {
            $post_data['tags'] = implode(',', array_map('trim', $post_data['tags']));
            $this->Akun_model->setPenelitian($post_data);
        } else if($target == "publikasi") {
            $post_data['tags'] = implode(',', array_map('trim', $post_data['tags']));
            $this->Akun_model->setPublikasi($post_data);
        } else if($target == "seminar") {
            $post_data['tags'] = implode(',', array_map('trim', $post_data['tags']));
            $post_data['waktu'] = strtodate($post_data['waktu']);
            $this->Akun_model->setSeminar($post_data);
        } else if($target == "pekerjaan") {
            $this->Akun_model->setPekerjaan($post_data);
        }
        
        redirect('/home');
	}
    
    public function printpdf(){
        $this->load->model('Akun_model');        
        
        $identitas = $this->Akun_model->getIdentitas();
        $pendidikan = $this->Akun_model->getPendidikan();
        $pekerjaan = $this->Akun_model->getPekerjaan();
        $penelitian = $this->Akun_model->getPenelitian();
        $penelitian_extra = $this->Akun_model->getPenelitianExtra();
        $pengabdian = $this->Akun_model->getPengabdian();
        $pengabdian_extra = $this->Akun_model->getPengabdianExtra();
        $publikasi = $this->Akun_model->getPublikasi();
        $publikasi_extra = $this->Akun_model->getPublikasiExtra();
        $seminar = $this->Akun_model->getSeminar();
      
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0, 14, $identitas->nama_lengkap, 0, 1, 'C');
        $pdf->Output();
    }
    
    public function mydocuments($action=NULL)
	{
        if($this->input->get("sd")){
            $this->load->helper('form');
            $this->load->model('Akun_model');
            if($this->input->get("update")){
                $post_data = $this->input->post();
                unset($post_data['save']);
                switch($this->input->get("sd")){
                    case 'pekerjaan':
                        $this->Akun_model->updatePekerjaan($post_data, $this->input->get("id"));
                        break;
                    case 'penelitian':
                        $post_data['tags'] = implode(',', array_map('trim', $post_data['tags']));
                        $this->Akun_model->updatePenelitian($post_data, $this->input->get("id"));
                        break;
                    case 'pengabdian':
                        $post_data['tags'] = implode(',', array_map('trim', $post_data['tags']));
                        $this->Akun_model->updatePenelitian($post_data, $this->input->get("id"));
                        break;
                    case 'publikasi':
                        $post_data['tags'] = implode(',', array_map('trim', $post_data['tags']));
                        $this->Akun_model->updatePublikasi($post_data, $this->input->get("id"));
                        break;
                    case 'seminar':
                        $this->Akun_model->updateSeminar($post_data, $this->input->get("id"));
                        break;
                }
                $this->session->set_flashdata('update_success', 'Data sudah diperbaharui.');
                redirect(site_url()."/home/mydocuments/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""));
            }
            $q=null;
            switch($this->input->get("sd")){
                case 'pekerjaan':
                    $this->data['research_data'] = $this->Akun_model->getPekerjaan($this->input->get("id"));
                    break;
                case 'penelitian':
                    $this->data['research_data'] = $this->Akun_model->getPenelitian($this->input->get("id"));
                    $this->data['research_members'] = $this->Akun_model->getDetailPenelitian($this->input->get("id"));
                    $q = $this->db->query("SELECT penelitian.* FROM penelitian, bersama WHERE penelitian.id = bersama.id_penelitian AND bersama.id_anggota = {$this->session->userdata('login')->uid} AND bersama.ref='penelitian' AND penelitian.id = ".$this->input->get("id"))->row();
                    break;
                case 'pengabdian':
                    $this->data['research_data'] = $this->Akun_model->getPengabdian($this->input->get("id"));
                    $this->data['research_members'] = $this->Akun_model->getDetailPenelitian($this->input->get("id"));
                    $q = $this->db->query("SELECT penelitian.* FROM penelitian, bersama WHERE penelitian.id = bersama.id_penelitian AND bersama.id_anggota = {$this->session->userdata('login')->uid} AND bersama.ref='penelitian' AND penelitian.id = ".$this->input->get("id"))->row();
                    break;
                case 'publikasi':
                    $this->data['research_data'] = $this->Akun_model->getPublikasi($this->input->get("id"));
                    $this->data['research_members'] = $this->Akun_model->getDetailPublikasi($this->input->get("id"));
                    $q = $this->db->query("SELECT publikasi.* FROM publikasi, bersama WHERE publikasi.id = bersama.id_penelitian AND bersama.id_anggota = {$this->session->userdata('login')->uid} AND bersama.ref='publikasi' AND publikasi.id = ".$this->input->get("id"))->row();
                    break;
                case 'seminar':
                    $this->data['research_data'] = $this->Akun_model->getSeminar($this->input->get("id"));
                    break;
                
            }
            if($q){
              if($q->uid == $this->session->userdata('login')->uid){
                $work_dir = sanitize_path($this->session->userdata('work_dir')."/.profile/".$this->input->get("sd").$this->input->get("id"));
                if(!file_exists($work_dir)){
                    mkdir($work_dir);
                }
              } else {
                $result = $this->db->query("SELECT * FROM users WHERE uid = ".$q->uid)->row();
                $work_dir = sanitize_path($GLOBALS['WORK_DIR'].$result->uid.$result->no_induk."/.profile/".$this->input->get("sd").$this->input->get("id"));
              }
            } else {
              $work_dir = sanitize_path($this->session->userdata('work_dir')."/.profile/".$this->input->get("sd").$this->input->get("id"));
              if(!file_exists($work_dir)){
                  mkdir($work_dir);
              }
            }
        } else {
            $work_dir = $this->session->userdata('work_dir');
        }
        if($action == "multiple-action"){
            $action = $this->input->post("intent");
        }
        if($action == "makedir"){
            $this->load->helper('form');
            $dir_path = implode('/',array_filter(explode('/', $work_dir.$this->input->get('d'))));
            $this->load->library('form_validation');
            if($this->input->post('makedir')){
                $this->form_validation->set_rules('dir_name', 'Directory name', 'trim|required', array('required'=>'Nama folder tidak boleh kosong'));

                if($this->form_validation->run()===FALSE){

                } else {
                    if(mkdir($dir_path.'/'.$this->input->post('dir_name'), 0750)){
                        $this->session->set_flashdata('success', 'Folder \'<b>'.$this->input->post('dir_name').'</b>\' telah berhasil dibuat');
                        redirect(site_url()."/home/mydocuments/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""));
                    } else {
                        $this->session->set_flashdata('failure', 'Folder \'<b>'.$this->input->post('dir_name').'</b>\' gagal dibuat. Mungkin terdapat karakter yang tidak boleh digunakan atau folder sudah ada.');
                        redirect(site_url()."/home/mydocuments/makedir/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""));
                    }
                }
            }
        } else if($action == "remove"){
            if($this->input->post('data')){
                parse_str($this->input->post('data'), $post_data);
                if(isset($post_data['remove_directory'])){
                    $dir_list =  array_filter(explode('/', urldecode($post_data['remove_directory'])));
                    foreach($dir_list as $d){
                        rrmdir($work_dir.$this->input->get('d').'/'.$d);
                    }
                }
                if(isset($post_data['remove_file'])){
                    $file_list =  array_filter(explode('/', urldecode($post_data['remove_file'])));
                    foreach($file_list as $f){
                        unlink($work_dir.$this->input->get('d').'/'.$f);
                    }
                }
                redirect(site_url()."/home/mydocuments/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""));
            }
        } else if($action == "rename"){
            $this->load->helper('form');
            $dir_path = implode('/',array_filter(explode('/', $work_dir.$this->input->get('d'))));
            $this->load->library('form_validation');
            if($this->input->post('rename')){
                $this->form_validation->set_rules('new_name', 'New name', 'trim|required', array('required'=>'Nama baru tidak boleh kosong'));
                $this->form_validation->set_rules('old_name', 'Old name', 'trim|required', array('required'=>'Nama lama tidak boleh kosong'));

                if($this->form_validation->run()===FALSE){

                } else {
                    if(!file_exists($dir_path.'/'.$this->input->post('new_name'))){
                        if(rename($dir_path.'/'.$this->input->post('old_name'),$dir_path.'/'.$this->input->post('new_name'))){
                            $this->session->set_flashdata('success', 'Nama '.$this->input->post('type').' berhasil diubah menjadi \'<b>'.$this->input->post('new_name').'</b>\'.');
                            redirect(site_url()."/home/mydocuments/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""));
                        } else {
                            $this->session->set_flashdata('failure', 'Gagal mengubah nama '.$this->input->post('type').' menjadi \'<b>'.$this->input->post('new_name').'</b>\'. Mungkin terdapat karakter yang tidak boleh digunakan sebagai nama '.$this->input->post('type').'.');
                            redirect(site_url()."/home/mydocuments/rename/?d=".$this->input->get('d')."&old_name=".$this->input->post('old_name')."&type=".$this->input->post('type').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""));
                        }
                    } else {
                        $this->session->set_flashdata('failure', 'Gagal mengubah nama '.$this->input->post('type').' menjadi \'<b>'.$this->input->post('new_name').'</b>\'. Nama sudah ada pada folder ini.');
                        redirect(site_url()."/home/mydocuments/rename/?d=".$this->input->get('d')."&old_name=".$this->input->post('old_name')."&type=".$this->input->post('type').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""));
                    }
                }
            } else {
                if($this->input->post("intent")){
                    $old_name = "";
                    $type = "";
                    if($this->input->post("selected_directory")){
                        $old_name = $this->input->post("selected_directory")[0];
                        $type = "folder";
                    } else if ($this->input->post("selected_file")){
                        $old_name = $this->input->post("selected_file")[0];
                        $type = "file";
                    }
                    redirect(site_url()."/home/mydocuments/rename/?d=".$this->input->get('d')."&old_name=".$old_name."&type=".$type.($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""));
                }
            }
        } else if($action == "upload"){
            $this->load->library('upload');
            $this->load->helper('form');
            $dir_path = $work_dir.$this->input->get('d');
            
            if($this->input->post('upload')){
                $config['upload_path']          = $dir_path;
                $config['allowed_types']        = 'jpg|png|jpeg|pdf|docx|doc|xlsx|xls|pptx|ppt|zip|rar';
                $config['max_size']             = 2000;
                $config['overwrite']            = FALSE;

                if($this->input->post('file_name')){
                    $config['file_name']        = $this->input->post('file_name');
                }
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('file'))
                {
                        
                }
                else
                {
                        $this->session->set_flashdata('success', 'File \'<b>'.$this->upload->data('file_name').'</b>\' telah berhasil diupload.');
                        redirect(site_url()."/home/mydocuments/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""));
                    
                }
            }
        }
        $this->data['action'] = $action;
        
        if($file_path=$this->input->get('f')){
            $this->load->helper(array('download'));
            force_download($work_dir.$file_path, NULL);
        }
        
        $this->load->helper('directory');
        $dir_path = $work_dir.$this->input->get('d');
        $this->data['ls'] = array();
        $dir_map = directory_map($dir_path,2);
        if($dir_map){
            $this->data['ls_dir'] = array();
            $this->data['ls_file'] = array();
            foreach($dir_map as $key=>$value){
                $is_dir = ((is_array($value)) ? TRUE : FALSE);
                if($is_dir){
                    $this->data['ls_dir'][] = (object) array("is_dir"=>$is_dir, "name"=>substr($key, 0, -1));
                } else {
                    $this->data['ls_file'][] = (object) array("is_dir"=>$is_dir, "name"=>$value);
                }
            }
            $this->data['ls'] = array_merge($this->data['ls_dir'], $this->data['ls_file']);
            unset($this->data['ls_dir']);
            unset($this->data['ls_file']);
        }
        $this->data['dir_path'] = $dir_path;
        $this->data['dir_path'] = array_filter(explode('/', $this->data['dir_path']));
        $this->data['dir_path'] = array_splice($this->data['dir_path'], 2);
        $this->data['dir_path'][0] = "root";
        $this->data['work_dir'] = $work_dir;
        
        $this->set_tab_index("2");
        $this->set_page_header("My Documents", "");
        $this->data['content'] = 'mydocuments';
		$this->load->view('template', $this->data);
	}
    
    public function get_user_list(){
        $term = $this->input->get("query");
        $query = $this->db->query("SELECT * FROM users WHERE nama_lengkap LIKE '%$term%' OR no_induk LIKE '%$term%'")->result();
        $result = array();
        foreach($query as $q){
          array_push($result, array("id"=>$q->uid, "text"=>"(".$q->no_induk.") ".$q->nama_lengkap));
        }
        echo json_encode($result);
    }
}
