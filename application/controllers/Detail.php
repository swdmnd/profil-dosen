<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends MY_Controller {

	public function __construct(){
        parent::__construct();
    }
    
	public function index($uid='')
	{
		if ($uid=='')
		{
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Akun_model');        
        
        $this->data['identitas'] = $this->Akun_model->getIdentitas();
        $this->data['prodi'] = $this->Akun_model->getProdi();
        $this->data['pendidikan'] = $this->Akun_model->getPendidikan();
        $this->data['pekerjaan'] = $this->Akun_model->getPekerjaan();
        $this->data['penelitian'] = $this->Akun_model->getPenelitian();
        $this->data['pengabdian'] = $this->Akun_model->getPengabdian();
        $this->data['publikasi'] = $this->Akun_model->getPublikasi();
        $this->data['seminar'] = $this->Akun_model->getSeminar();
        $this->data['content'] = 'cv';
        $this->set_tab_index("1");
        $this->set_page_header("Curriculum Vitae", "CV <a href=\"".site_url()."/home/printpdf\"><i class=\"glyphicon glyphicon-print\"></i></a>");
		$this->load->view('template-detail', $this->data);			
		}
		else
		{
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Akun_model');        
        
        $this->data['identitas'] = $this->Akun_model->getIdentitas($uid);
        $this->data['prodi'] = $this->Akun_model->getProdi();
        $this->data['pendidikan'] = $this->Akun_model->getPendidikan($uid);
        $this->data['pekerjaan'] = $this->Akun_model->getPekerjaan(null,$uid);
        $this->data['penelitian'] = $this->Akun_model->getPenelitian(null,$uid);
        $this->data['pengabdian'] = $this->Akun_model->getPengabdian(null,$uid);
        $this->data['publikasi'] = $this->Akun_model->getPublikasi(null,$uid);
        $this->data['seminar'] = $this->Akun_model->getSeminar(null,$uid);
        $this->data['content'] = 'cv-detail';
        $this->set_tab_index("1");
        $this->set_page_header("Curriculum Vitae", "CV <a href=\"".site_url()."/home/printpdf\"><i class=\"glyphicon glyphicon-print\"></i></a>");
		$this->load->view('template-detail', $this->data);		
		}
		
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
			unset($post_data['D3']);
			unset($post_data['S1']);
			unset($post_data['Pr']);
			unset($post_data['S2']);
			unset($post_data['S3']);
            $post_data['tanggal_lahir'] = strtodate($post_data['tanggal_lahir']);
            //$this->Akun_model->setIdentitas($post_data);
			$work_dir = $this->session->userdata('work_dir');
			if(!empty($_FILES['foto']['name'])){			
			$config =  array(
                  'upload_path'     => $work_dir."/foto/",
                  'file_name'      	=> $_FILES["foto"]["name"],
                  'allowed_types'   => "gif|jpg|png|jpeg",
                  'overwrite'       => TRUE,
                  'max_size'        => "2000" 
                );
            $this->load->library('upload',$config);
			$this->upload->initialize($config);
            if ($this->upload->do_upload('foto'))
                {
					$post_data['foto'] = $work_dir."/foto/".$_FILES['foto']['name'];
					$this->Akun_model->setIdentitas($post_data);
				}
            else
                {
					$this->Akun_model->setIdentitas($post_data);
                }
			}
			else
			{
				$this->Akun_model->setIdentitas($post_data);
			}
        } else if($target == "pendidikan") {
            $this->Akun_model->setPendidikan($post_data);
        } else if($target == "penelitian") {
            $this->Akun_model->setPenelitian($post_data);
        } else if($target == "publikasi") {
            $this->Akun_model->setPublikasi($post_data);
        } else if($target == "seminar") {
            $this->Akun_model->setSeminar($post_data);
        } else if($target == "pekerjaan") {
            $this->Akun_model->setPekerjaan($post_data);
        }
        
        redirect('/home');
	}
    
    public function printpdf(){
        tcpdf_init();
        $this->load->model('Akun_model');        
        
        $this->data['identitas'] = $this->Akun_model->getIdentitas();
        $this->data['pendidikan'] = $this->Akun_model->getPendidikan();
        $this->data['penelitian'] = $this->Akun_model->getPenelitian();
        $this->data['pengabdian'] = $this->Akun_model->getPengabdian();
        $this->data['publikasi'] = $this->Akun_model->getPublikasi();
        $this->data['seminar'] = $this->Akun_model->getSeminar();
        
        $this->data['content'] = 'cv';
        $this->set_tab_index("1");
        $this->set_page_header("Curriculum Vitae", "CV");
		$content = $this->load->view('printcv2.php', $this->data, TRUE);
        
        $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $obj_pdf->SetCreator(PDF_CREATOR);
        // remove default header/footer
        $obj_pdf->setPrintHeader(false);
        $obj_pdf->setPrintFooter(false);
        //$title = "PDF Report";
        //$obj_pdf->SetTitle($title);
        //$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
        //$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        //$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $obj_pdf->SetDefaultMonospacedFont('helvetica');
        $obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $obj_pdf->SetFont('helvetica', '', 9);
        $obj_pdf->setFontSubsetting(false);
        $obj_pdf->AddPage();
        ob_start();
            // we can have any view part here like HTML, PHP etc
            // $content = ob_get_contents();
        ob_end_clean();
        $obj_pdf->writeHTML($content, true, false, true, false, '');
        $obj_pdf->Output('cv.pdf', 'I');
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
                        $this->Akun_model->updatePenelitian($post_data, $this->input->get("id"));
                        break;
                    case 'pengabdian':
                        $this->Akun_model->updatePenelitian($post_data, $this->input->get("id"));
                        break;
                    case 'publikasi':
                        $this->Akun_model->updatePublikasi($post_data, $this->input->get("id"));
                        break;
                    case 'seminar':
                        $this->Akun_model->updateSeminar($post_data, $this->input->get("id"));
                        break;

                }
                $this->session->set_flashdata('update_success', 'Data sudah diperbaharui.');
                redirect(site_url()."/home/mydocuments/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""));
            }
            switch($this->input->get("sd")){
                case 'pekerjaan':
                    $this->data['research_data'] = $this->Akun_model->getPekerjaan($this->input->get("id"));
                    break;
                case 'penelitian':
                    $this->data['research_data'] = $this->Akun_model->getPenelitian($this->input->get("id"));
                    break;
                case 'pengabdian':
                    $this->data['research_data'] = $this->Akun_model->getPengabdian($this->input->get("id"));
                    break;
                case 'publikasi':
                    $this->data['research_data'] = $this->Akun_model->getPublikasi($this->input->get("id"));
                    break;
                case 'seminar':
                    $this->data['research_data'] = $this->Akun_model->getSeminar($this->input->get("id"));
                    break;
                
            }
            $work_dir = $this->session->userdata('work_dir')."\\.profile\\".$this->input->get("sd").$this->input->get("id");
            if(!file_exists($work_dir)){
                mkdir($work_dir);
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
        
        $this->set_tab_index("2");
        $this->set_page_header("My Documents", "");
        $this->data['content'] = 'mydocuments';
		$this->load->view('template', $this->data);
	}
    
    public function upload(){
        
    }
    
    public function makedir(){
        
    }
}
