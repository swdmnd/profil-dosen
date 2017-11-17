<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct(){
        parent::__construct();
        $this->cek_session_in();
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
				$this->data['buku_teks'] = $this->Akun_model->getBukuTeks();
				$this->data['penghargaan'] = $this->Akun_model->getPenghargaan();
				$this->data['kuliah'] = $this->Akun_model->getKuliah();

        $this->data['content'] = 'cv';
        $this->set_tab_index("1");
        $this->set_page_header("Curriculum Vitae", "CV <a href=\"".site_url()."/home/printpdf\"><i class=\"glyphicon glyphicon-print\"></i></a>");
		$this->load->view('template', $this->data);
		}
		else
		{
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Akun_model');

        $this->data['identitas'] = $this->Akun_model->getIdentitas($uid);
				$identitas = $this->Akun_model->getIdentitas($uid);
				//$WORK_DIR = $GLOBALS['WORK_DIR'].$uid.$identitas->no_induk;
				$WORK_DIR = $GLOBALS['WORK_DIR'].$uid.(string)$identitas->no_induk;

				if(!file_exists($WORK_DIR)){
						mkdir(sanitize_path($WORK_DIR));
						mkdir(sanitize_path($WORK_DIR.'/profile'));
						mkdir(sanitize_path($WORK_DIR.'/foto'));
				}
				$this->session->set_userdata('work_dir', $WORK_DIR);
        $this->data['prodi'] = $this->Akun_model->getProdi();
				/*
        $this->data['pendidikan'] = $this->Akun_model->getPendidikan($uid);
        $this->data['pekerjaan'] = $this->Akun_model->getPekerjaan($uid);
        $this->data['penelitian'] = $this->Akun_model->getPenelitian($uid);
        $this->data['pengabdian'] = $this->Akun_model->getPengabdian($uid);
        $this->data['publikasi'] = $this->Akun_model->getPublikasi($uid);
        $this->data['seminar'] = $this->Akun_model->getSeminar($uid);
        $this->data['buku_teks'] = $this->Akun_model->getBukuTeks($uid);
        $this->data['penghargaan'] = $this->Akun_model->getPenghargaan($uid);
				*/
				$this->data['pendidikan'] = $this->Akun_model->getPendidikan($uid);
				$this->data['pekerjaan'] = $this->Akun_model->getPekerjaan(null,$uid);
				$this->data['penelitian'] = $this->Akun_model->getPenelitian(null,$uid);
				$this->data['pengabdian'] = $this->Akun_model->getPengabdian(null,$uid);
				$this->data['publikasi'] = $this->Akun_model->getPublikasi(null,$uid);
				$this->data['seminar'] = $this->Akun_model->getSeminar(null,$uid);
				$this->data['buku_teks'] = $this->Akun_model->getBukuTeks(null,$uid);
				$this->data['penghargaan'] = $this->Akun_model->getPenghargaan(null,$uid);
				$this->data['kuliah'] = $this->Akun_model->getKuliah(null,$uid);

        $this->data['content'] = 'cv-admin';
        $this->set_tab_index("1");
        $this->set_page_header("Curriculum Vitae", "CV <a href=\"".site_url()."/home/printpdf/".$identitas->uid."\"><i class=\"glyphicon glyphicon-print\"></i></a>&nbsp;&nbsp;<a href=\"". site_url('/admin') . "\" class=\"btn btn-danger\" role=\"button\">Back</a>");
		$this->load->view('template-admin', $this->data);
		}

	}

	public function deletependidikan($id,$uid)
	{
        $this->load->model('Akun_model');
        $this->Akun_model->deletePendidikan($id,$uid);
				if ($post_data['uid']!=$this->session->userdata('login')->uid)
				{
					redirect('/home/index/'.$uid);
				}
				else {
					redirect('/home');
				}
	}

	public function deletepenelitian($id,$uid)
	{
        $this->load->model('Akun_model');
        $this->Akun_model->deletePenelitian($id,$uid);
				if ($post_data['uid']!=$this->session->userdata('login')->uid)
				{
					redirect('/home/index/'.$uid);
				}
				else {
					redirect('/home');
				}
	}

	public function deletepekerjaan($id,$uid)
	{
        $this->load->model('Akun_model');
        $this->Akun_model->deletePekerjaan($id,$uid);
				if ($post_data['uid']!=$this->session->userdata('login')->uid)
				{
					redirect('/home/index/'.$uid);
				}
				else {
					redirect('/home');
				}
	}

	public function deletepublikasi($id,$uid)
	{
        $this->load->model('Akun_model');
        $this->Akun_model->deletePublikasi($id,$uid);
				if ($post_data['uid']!=$this->session->userdata('login')->uid)
				{
					redirect('/home/index/'.$uid);
				}
				else {
					redirect('/home');
				}
	}

	public function deleteseminar($id,$uid)
	{
        $this->load->model('Akun_model');
        $this->Akun_model->deleteSeminar($id,$uid);
				if ($post_data['uid']!=$this->session->userdata('login')->uid)
				{
					redirect('/home/index/'.$uid);
				}
				else {
					redirect('/home');
				}
	}

	public function deletebukuteks($id,$uid)
	{
        $this->load->model('Akun_model');
        $this->Akun_model->deleteBukuTeks($id,$uid);
				if ($post_data['uid']!=$this->session->userdata('login')->uid)
				{
					redirect('/home/index/'.$uid);
				}
				else {
					redirect('/home');
				}
	}

	public function deletepenghargaan($id,$uid)
	{
        $this->load->model('Akun_model');
        $this->Akun_model->deletePenghargaan($id,$uid);
				if ($post_data['uid']!=$this->session->userdata('login')->uid)
				{
					redirect('/home/index/'.$uid);
				}
				else {
					redirect('/home');
				}
	}

	public function deletekuliah($id,$uid,$no_induk)
	{
        $this->load->model('Akun_model');
        $this->Akun_model->deleteKuliah($id,$uid);
				if(file_exists(APPPATH.'../files/'.$uid.$no_induk.'/profile/kuliah'.$id)){
					rrmdir(APPPATH.'../files/'.$uid.$no_induk.'/profile/kuliah'.$id);
				}
				if ($post_data['uid']!=$this->session->userdata('login')->uid)
				{
					redirect('/home/index/'.$uid);
				}
				else {
					redirect('/home');
				}
	}

	public function updatependidikanlive()
	{
				$idpendidikan = $this->input->post("idpendidikan");
				$valuependidikan = $this->input->post("valuependidikan");
				$modulpendidikan = $this->input->post("modulpendidikan");
        $this->load->model('Akun_model');
        $this->Akun_model->updatePendidikanlive($idpendidikan,$valuependidikan,$modulpendidikan);
				//redirect('/home');
	}

	public function updatepenelitianlive()
	{
				$idpenelitian = $this->input->post("idpenelitian");
				$valuepenelitian = $this->input->post("valuepenelitian");
				$modulpenelitian = $this->input->post("modulpenelitian");
        $this->load->model('Akun_model');
        $this->Akun_model->updatePenelitianlive($idpenelitian,$valuepenelitian,$modulpenelitian);
				//redirect('/home');
	}

	public function updatepengabdianlive()
	{
				$idpengabdian = $this->input->post("idpengabdian");
				$valuepengabdian = $this->input->post("valuepengabdian");
				$modulpengabdian = $this->input->post("modulpengabdian");
        $this->load->model('Akun_model');
        $this->Akun_model->updatePengabdianlive($idpengabdian,$valuepengabdian,$modulpengabdian);
				//redirect('/home');
	}

	public function updatepekerjaanlive()
	{
				$idpekerjaan = $this->input->post("idpekerjaan");
				$valuepekerjaan = $this->input->post("valuepekerjaan");
				$modulpekerjaan = $this->input->post("modulpekerjaan");
        $this->load->model('Akun_model');
        $this->Akun_model->updatePekerjaanlive($idpekerjaan,$valuepekerjaan,$modulpekerjaan);
				//redirect('/home');
	}

	public function updatepublikasilive()
	{
				$idpublikasi = $this->input->post("idpublikasi");
				$valuepublikasi = $this->input->post("valuepublikasi");
				$modulpublikasi = $this->input->post("modulpublikasi");
        $this->load->model('Akun_model');
        $this->Akun_model->updatePublikasilive($idpublikasi,$valuepublikasi,$modulpublikasi);
				//redirect('/home');
	}

	public function updateseminarlive()
	{
				$idseminar = $this->input->post("idseminar");
				$valueseminar = $this->input->post("valueseminar");
				$modulseminar = $this->input->post("modulseminar");
				$this->load->model('Akun_model');
				$this->Akun_model->updateSeminarlive($idseminar,$valueseminar,$modulseminar);
				//redirect('/home');
	}

	public function updatebukutekslive()
	{
				$idbukuteks = $this->input->post("idbukuteks");
				$valuebukuteks = $this->input->post("valuebukuteks");
				$modulbukuteks = $this->input->post("modulbukuteks");
				$this->load->model('Akun_model');
				$this->Akun_model->updateBukuTekslive($idbukuteks,$valuebukuteks,$modulbukuteks);
				//redirect('/home');
	}

	public function updatepenghargaanlive()
	{
				$idpenghargaan = $this->input->post("idpenghargaan");
				$valuepenghargaan = $this->input->post("valuepenghargaan");
				$modulpenghargaan = $this->input->post("modulpenghargaan");
				$this->load->model('Akun_model');
				$this->Akun_model->updatePenghargaanlive($idpenghargaan,$valuepenghargaan,$modulpenghargaan);
				//redirect('/home');
	}

	public function updatekuliahlive()
	{
				$idkuliah = $this->input->post("idkuliah");
				$valuekuliah = $this->input->post("valuekuliah");
				$modulkuliah = $this->input->post("modulkuliah");
				$this->load->model('Akun_model');
				$this->Akun_model->updateKuliahlive($idkuliah,$valuekuliah,$modulkuliah);
				//redirect('/home');
	}

    public function save($target)
	{
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Akun_model');
        $post_data = $this->input->post();
        unset($post_data['save']);
				if ($post_data['uid'])
				{
					$post_data['uid'] = $post_data['uid'];
					$uid = $post_data['uid'];
				}
				else {
					$post_data['uid'] = $this->session->userdata('login')->uid;
					$uid = $this->session->userdata('login')->uid;
				}
        if($target == "identitas") {
					unset($post_data['D3']);
					unset($post_data['S1']);
					unset($post_data['Pr']);
					unset($post_data['S2']);
					unset($post_data['S3']);
            $post_data['tanggal_lahir'] = strtodate($post_data['tanggal_lahir']);
            //$this->Akun_model->setIdentitas($post_data);
			$work_dir = $this->session->userdata('work_dir');
			/*
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
			*/
			if (!empty($_FILES['foto']['name'])) {
				$this->load->library('upload');

				$config['upload_path']          = sanitize_path($this->session->userdata('work_dir').'/foto/');
				$config['allowed_types']        = 'jpg|png|jpeg';
				$config['max_size']             = 2000;
				$config['overwrite']            = TRUE;

				$config['file_name']            = md5($post_data['uid'].'_foto'.date(DATE_RFC2822));
				$this->upload->initialize($config);

				$uploaded = array();

				if ( !$this->upload->do_upload('foto') )
				{
						$this->session->set_flashdata('failure', $this->upload->display_errors());
						$this->Akun_model->setIdentitas($post_data);
				}
				else
				{
//                if(file_exists($data_jamaah['foto'])){
//                    unlink($data_jamaah['foto']);
//                }
						//$post_data['foto']=$config['file_name'].$this->upload->data('file_ext');
						$post_data['foto_path'] = $work_dir."/foto/";
						$post_data['foto'] = $config['file_name'].$this->upload->data('file_ext');
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
					$post_data['waktu'] = strtodate($post_data['waktu']);
            $this->Akun_model->setSeminar($post_data);
        } else if($target == "pekerjaan") {
					//$post_data['tahun_mulai'] = date('Y',strtotime($post_data['tahun_mulai']));
					//$post_data['tahun_selesai'] = date('Y',strtotime($post_data['tahun_selesai']));
          $this->Akun_model->setPekerjaan($post_data);
        } else if($target == "buku_teks") {
            $this->Akun_model->setBukuTeks($post_data);
        } else if($target == "penghargaan") {
            $this->Akun_model->setPenghargaan($post_data);
				} else if($target == "kuliah") {
					$id = $this->Akun_model->getLastKuliahId();
					$work_dir = sanitize_path($this->session->userdata('work_dir')."/profile/kuliah".$id);
					if(!file_exists($work_dir)){
							mkdir($work_dir);
					}
					$work_dir = sanitize_path($this->session->userdata('work_dir')."/profile/kuliah".$id."/rps/");
					if(!file_exists($work_dir)){
							mkdir($work_dir);
					}
					$work_dir = sanitize_path($this->session->userdata('work_dir')."/profile/kuliah".$id."/kontrak/");
					if(!file_exists($work_dir)){
							mkdir($work_dir);
					}
					$work_dir = sanitize_path($this->session->userdata('work_dir')."/profile/kuliah".$id."/silabus/");
					if(!file_exists($work_dir)){
							mkdir($work_dir);
					}
					//$post_data['rps_mk'] = '';
					//$post_data['kontrak_mk'] = '';
					//$post_data['silabus_mk'] = '';
					//$post_data['rps_mk_path'] = $_FILES['rps_mk']['name'];
					if (!empty($_FILES['rps_mk']['name'])) {
						$work_dir = sanitize_path($this->session->userdata('work_dir')."/profile/kuliah".$id."/rps/");

						$this->load->library('upload');

						$config['upload_path']          = $work_dir;
						$config['allowed_types']        = 'jpg|png|jpeg|pdf|docx|doc|xlsx|xls|pptx|ppt|zip|rar';
						$config['max_size']             = 10000;
						$config['overwrite']            = TRUE;

						$config['file_name']            = $_FILES['rps_mk']['name'];
						$this->upload->initialize($config);

						$uploaded = array();
						$this->upload->do_upload('rps_mk');
						if ( !$this->upload->do_upload('rps_mk') )
						{
								$this->session->set_flashdata('failure', $this->upload->display_errors());
						}
						else
						{
								$post_data['rps_mk'] = $work_dir . $this->upload->data('file_name');

						}
					}
					if (!empty($_FILES['kontrak_mk']['name'])) {
							$this->load->library('upload');
							$work_dir = sanitize_path($this->session->userdata('work_dir')."/profile/kuliah".$id."/kontrak/");

							$config['upload_path']          = $work_dir;
							$config['allowed_types']        = 'jpg|png|jpeg|pdf|docx|doc|xlsx|xls|pptx|ppt|zip|rar';
							$config['max_size']             = 10000;
							$config['overwrite']            = TRUE;

							$config['file_name']            = $_FILES['kontrak_mk']['name'];
							$this->upload->initialize($config);

							$uploaded = array();

							if ( !$this->upload->do_upload('kontrak_mk') )
							{
									$this->session->set_flashdata('failure', $this->upload->display_errors());

							}
							else
							{
									$post_data['kontrak_mk'] = $work_dir . $this->upload->data('file_name');
							}

					}
					if (!empty($_FILES['silabus_mk']['name'])) {
						$this->load->library('upload');
						$work_dir = sanitize_path($this->session->userdata('work_dir')."/profile/kuliah".$id."/silabus/");

						$config['upload_path']          = $work_dir;
						$config['allowed_types']        = 'jpg|png|jpeg|pdf|docx|doc|xlsx|xls|pptx|ppt|zip|rar';
						$config['max_size']             = 10000;
						$config['overwrite']            = TRUE;

						$config['file_name']            = $_FILES['silabus_mk']['name'];
						$this->upload->initialize($config);

						$uploaded = array();

						if ( !$this->upload->do_upload('silabus_mk') )
						{
								$this->session->set_flashdata('failure', $this->upload->display_errors());

						}
						else
						{
								$post_data['silabus_mk'] = $work_dir . $this->upload->data('file_name');
						}
				}

						//else
						//{
						//	$this->Akun_model->setKuliah($post_data);
						//}



					//else
					//{
					//	$this->Akun_model->setKuliah($post_data);
					//}


				//else
				//{
				//	$this->Akun_model->setKuliah($post_data);
				//}
				$this->Akun_model->setKuliah($post_data);
}
				if ($post_data['uid']!=$this->session->userdata('login')->uid)
				{
					redirect('/home/index/'.$uid.'#'.$target);
				}
				else {
					redirect('/home#'.$target);
				}
	}


    public function printpdf($uid=''){
        //tcpdf_init();
        $this->load->model('Akun_model');
				if ($uid=='')
				{
				$identitas = $this->Akun_model->getIdentitas();
				$pendidikan = $this->Akun_model->getPendidikanLine();
				$pekerjaan = $this->Akun_model->getPekerjaan();
				$penelitian = $this->Akun_model->getPenelitian();
				$pengabdian = $this->Akun_model->getPengabdian();
				$publikasi = $this->Akun_model->getPublikasi();
				$seminar = $this->Akun_model->getSeminar();
				$buku_teks = $this->Akun_model->getBukuTeks();
				$penghargaan = $this->Akun_model->getPenghargaan();
				$kuliah = $this->Akun_model->getKuliah();

				}
				else {

				$identitas = $this->Akun_model->getIdentitas($uid);
				$pendidikan = $this->Akun_model->getPendidikanLine($uid);
				$pekerjaan = $this->Akun_model->getPekerjaan(null,$uid);
				$penelitian = $this->Akun_model->getPenelitian(null,$uid);
				$pengabdian = $this->Akun_model->getPengabdian(null,$uid);
				$publikasi = $this->Akun_model->getPublikasi(null,$uid);
				$seminar = $this->Akun_model->getSeminar(null,$uid);
				$buku_teks = $this->Akun_model->getBukuTeks(null,$uid);
				$penghargaan = $this->Akun_model->getPenghargaan(null,$uid);
				$kuliah = $this->Akun_model->getKuliah(null,$uid);

				}
				/*
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
				*/
				$pdf=new PDF_HTML_Table('P','mm','A4');
				//$pdf = new PDF('P','mm','A4');
				$pdf->AddPage();
				$pdf->SetFont('Arial','',12);
				//$pdf->Cell(0, 14, $identitas->nama_lengkap, 0, 1, 'C');
				//$pdf->MultiCell(0,5,$identitas->deskripsi_singkat,1,'L',false);
				$work_dir = sanitize_path($identitas->foto_path . $identitas->foto);
				$pdf->Image($work_dir,150,10,-300);
				$html = '
				<p style="text-transform: capitalize;"><b>'. $identitas->nama_lengkap .'</b></p>
        <p style="text-transform: capitalize;"><b>Dosen ' . $identitas->prodi . ' UNDIP</b></p>
				<p><b>Deskripsi</b></p>
			  <p>' . $identitas->deskripsi_singkat . '</p>
				<p><b>Riwayat Pendidikan</b></p>';
				if(empty($pendidikan))
				{
				$html .= '<h4>-</h4>';
				}
				else
				{
				foreach($pendidikan as $item)
				{
				$html .= '<h4>' . $item->tingkat . ' - ' . $item->bidang_ilmu . ' - ' . $item->nama_pt . '(' . $item->tahun_masuk . ' - ' . $item->tahun_lulus .')<br>';
			  }
			  }
				$html .= '<p><b>Riwayat Pekerjaan</b></p>';

				if(empty($pekerjaan))
				{
				$html .= '<h4>-</h4>';
				}
				else
				{
				$a = 0;
				foreach($pekerjaan as $item)
				{
						if ($a != $item->tahun_mulai) {
							if ($a!=0)
							{
						  }
							$a = $item->tahun_mulai;
				$html .= '<h4>' . $item->tahun_mulai . ' - ' . $item->tahun_selesai . '</h4>';
			$html .= '<p>' . $item->jabatan . '</p>';
		} else {
		$a = $item->tahun_mulai;
		$html	.= '<p>' . $item->jabatan . '</p>';
		}
			  }
			  }
				$html .= '<p><b>Riwayat Penelitian</b></p>';

				if(empty($penelitian))
				{
				$html .= '<h4>-</h4>';
				}
				else
				{
				$a = 0;
				foreach($penelitian as $item)
				{
						if ($a != $item->tahun_mulai) {
							if ($a!=0)
							{
						  }
							$a = $item->tahun_mulai;
				$html .= '<h4>' . $item->tahun_mulai . '</h4><br>';
				$html .= '<h4>' . $item->judul . ' Sumber Dana : ' . $item->sumber_dana . '</h4>';
		} else {
		$a = $item->tahun_mulai;
		$html .= '<h4>' . $item->tahun_mulai . '</h4>';
		$html .= '<h4>' . $item->judul . ' Sumber Dana : ' . $item->sumber_dana . '</h4>';
		}
			  }
			  }
				$html .= '<p><b>Riwayat Pengabdian</b></p>';

				if(empty($pengabdian))
				{
				$html .= '<h4>-</h4>';
				}
				else
				{
				$a = 0;
				foreach($pengabdian as $item)
				{
						if ($a != $item->tahun_mulai) {
							if ($a!=0)
							{
							}
							$a = $item->tahun_mulai;
				$html .= '<h4>' . $item->tahun_mulai . '</h4><br>';
				$html .= '<h4>' . $item->judul . ' Sumber Dana : ' . $item->sumber_dana . '</h4>';
		} else {
		$a = $item->tahun_mulai;
		$html .= '<h4>' . $item->tahun_mulai . '</h4><br>';
		$html .= '<h4>' . $item->judul . ' Sumber Dana : ' . $item->sumber_dana . '</h4>';
		}
				}
				}
				$html .= '<p><b>Riwayat Publikasi</b></p>';
				if(empty($publikasi))
				{
					$html .= '<h4>-</h4>';
				}
				$a = 0;
				$publikasilengkap = '';
				foreach($publikasi as $item)
				{
						$penulisarray = explode(",",$item->penulis);
						$jml = count($penulisarray);
						$penulis = '';
						for ($x = 0; $x < $jml; $x++) {
						if ($x!=$jml-1)
						{
							$penulis .= implode(' ',array_reverse(explode(' ',$penulisarray[$x]))) . ", ";
						}
						else
						{
							$penulis .= implode(' ',array_reverse(explode(' ',$penulisarray[$x])));
						}
						}
						$tahun = "(" . $item->tahun . ")";
						$judul = $item->judul;
						$nama_jurnal = "In " . $item->nama_jurnal;
						$nomor_jurnal = " (" . $item->nomor_jurnal . ")";
						$publikasilengkap = $penulis . " . " . $tahun . " . " . $judul . " . " . $nama_jurnal . $nomor_jurnal . ".";
					if ($a != $item->tahun) {
						if ($a!=0)
						{
						}
						$a = $item->tahun;

			$html .= '<h4>' . $item->tahun . '</h4><br>';
		$html .= $publikasilengkap . '<br>';
	} else {
		$a = $item->tahun;
		$html .= $publikasilengkap . '<br>';
}
}

$html .= '<p><b>Buku Teks</b></p>';
if(empty($buku_teks))
{
	$html .= '<h4>-</h4>';
}
$a = 0;
$bukutekslengkap = '';
foreach($buku_teks as $item)
{
		$penulisarray = explode(",",$item->penulis);
		$jml = count($penulisarray);
		$penulis = '';
		for ($x = 0; $x < $jml; $x++) {
		if ($x!=$jml-1)
		{
			$penulis .= implode(' ',array_reverse(explode(' ',$penulisarray[$x]))) . ", ";
		}
		else
		{
			$penulis .= implode(' ',array_reverse(explode(' ',$penulisarray[$x])));
		}
		}
		$tahun_terbit = "(" . $item->tahun_terbit . ")";
		$judul_buku = $item->judul_buku;
		$penerbit = $item->penerbit;
		$bukutekslengkap = $penulis . " . " . $tahun_terbit . " . " . $judul_buku . " . " . $penerbit . ".";
	if ($a != $item->tahun_terbit) {
		if ($a!=0)
		{
		}
		$a = $item->tahun_terbit;

$html .= '<h4>' . $item->tahun_terbit . '</h4><br>';
$html .= $bukutekslengkap;
} else {
$a = $item->tahun_terbit;
$html .= $bukutekslengkap;
}
}

$html .= '<p><b>Penghargaan</b></p>';

if(empty($penghargaan))
{
$html .= '<h4>-</h4>';
}
else
{
$a = 0;
foreach($penghargaan as $item)
{
		if ($a != $item->tahun_penghargaan) {
			if ($a!=0)
			{
			}
			$a = $item->tahun_penghargaan;
$html .= '<h4>' . $item->tahun_penghargaan . '</h4><br>';
//$html .= '<h4>' . $item->judul . ' Sumber Dana : ' . $item->sumber_dana . '</h4>';
$html .= 'Pada tahun ' . $item->tahun_penghargaan . ' sebagai ' . $item->sebagai . ' pada ' . $item->nama_penghargaan . ' dari ' . $item->pemberi_penghargaan;

} else {
$a = $item->tahun_penghargaan;
$html .= '<h4>' . $item->tahun_penghargaan . '</h4><br>';
//$html .= '<h4>' . $item->judul . ' Sumber Dana : ' . $item->sumber_dana . '</h4>';
$html .= 'Pada tahun ' . $item->tahun_penghargaan . ' sebagai ' . $item->sebagai . ' pada ' . $item->nama_penghargaan . ' dari ' . $item->pemberi_penghargaan;

}
}
}
$html .= '<p><b>Narasumber</b></p>';

if(empty($seminar))
{
$html .= '<h4>-</h4>';
}
else
{
$a = 0;

foreach($seminar as $item){
	$date = DateTime::createFromFormat("Y-m-d", $item->waktu);
	if ($a != $date->format("Y")) {
		if ($a!=0)
		{
		}
		$a = $date->format("Y");
$html .= '<h4>'. $date->format("Y") . '</h4><br>';
$html .= 'Pada tahun ' . $date->format("Y") . ' sebagai ' . $item->sebagai . ' pada ' . $item->nama_seminar . ', ' . $item->tema . ' bertempat di ' . $item->tempat;
} else {
$a = $date->format("Y");
$html .= 'Pada tahun ' . $date->format("Y") . ' sebagai ' . $item->sebagai . ' pada ' . $item->nama_seminar . ', ' . $item->tema . ' bertempat di ' . $item->tempat;
}
}
}
				$pdf->WriteHTML($html);
				$pdf->Output();
    }

    public function mydocuments($action=NULL)
	{
        if($this->input->get("sd")){
            $this->load->helper('form');
            $this->load->model('Akun_model');
		        $this->data['identitas'] = $this->Akun_model->getIdentitas();
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
										case 'buku_teks':
		                    $this->Akun_model->updateBukuTeks($post_data, $this->input->get("id"));
		                    break;
										case 'penghargaan':
				                $this->Akun_model->updatePenghargaan($post_data, $this->input->get("id"));
				                break;
										case 'kuliah':
						            $this->Akun_model->updateKuliah($post_data, $this->input->get("id"));
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
								case 'buku_teks':
		                $this->data['research_data'] = $this->Akun_model->getBukuTeks($this->input->get("id"));
		                break;
								case 'penghargaan':
				            $this->data['research_data'] = $this->Akun_model->getPenghargaan($this->input->get("id"));
				            break;
								case 'kuliah':
						        $this->data['research_data'] = $this->Akun_model->getKuliah($this->input->get("id"));
						        break;
            }
						/*
            $work_dir = sanitize_path($this->session->userdata('work_dir')."\\.profile\\".$this->input->get("sd").$this->input->get("id"));

            if(!file_exists($work_dir)){
                mkdir($work_dir);
            }
        } else {
            $work_dir = $this->session->userdata('work_dir');
						$this->load->model('Akun_model');
						$this->data['identitas'] = $this->Akun_model->getIdentitas();
        }
				*/
				if($q){
					if($q->uid == $this->session->userdata('login')->uid){
						$work_dir = sanitize_path($this->session->userdata('work_dir')."/profile/".$this->input->get("sd").$this->input->get("id"));
						if(!file_exists($work_dir)){
								mkdir($work_dir);
						}
					} else {
						$result = $this->db->query("SELECT * FROM users WHERE uid = ".$q->uid)->row();
						$work_dir = sanitize_path($GLOBALS['WORK_DIR'].$result->uid.$result->no_induk."/profile/".$this->input->get("sd").$this->input->get("id"));
					}
				} else {
					$work_dir = sanitize_path($this->session->userdata('work_dir')."/profile/".$this->input->get("sd").$this->input->get("id"));
					if(!file_exists($work_dir)){
							mkdir($work_dir);
					}
				}
		} else {
				$work_dir = $this->session->userdata('work_dir');
				$this->load->model('Akun_model');
				$this->data['identitas'] = $this->Akun_model->getIdentitas();

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
                $config['max_size']             = 10000;
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
        //$this->data['dir_path'] = array_splice($this->data['dir_path'], 2);
         if($this->input->get('sd')){
            $this->data['dir_path'] = array_merge(array_splice($this->data['dir_path'], 2, 1), array_splice($this->data['dir_path'], 4));
        } else {
            $this->data['dir_path'] = array_splice($this->data['dir_path'], 2);
        }
		$this->data['dir_path'][0] = "root";
				$this->data['work_dir'] = $work_dir;
        $this->set_tab_index("2");
        $this->set_page_header("My Documents", "");
        $this->data['content'] = 'mydocuments';
				//$this->data['content_admin'] = 'mydocuments_admin';

		$this->load->view('template', $this->data);
		//$this->load->view('templateadmin', $this->data);

	}

	public function mydocumentsadmin($action=NULL)
{
			if($this->input->get("sd")){
					$this->load->helper('form');
					$this->load->model('Akun_model');
					$this->data['identitas'] = $this->Akun_model->getIdentitas();
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
									case 'buku_teks':
											$this->Akun_model->updateBukuTeks($post_data, $this->input->get("id"));
											break;
									case 'penghargaan':
											$this->Akun_model->updatePenghargaan($post_data, $this->input->get("id"));
											break;
									case 'kuliah':
											$this->Akun_model->updateKuliah($post_data, $this->input->get("id"));
											break;

							}
							$this->session->set_flashdata('update_success', 'Data sudah diperbaharui.');
							redirect(site_url()."/home/mydocumentsadmin/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""));
					}
					$q=null;
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
							case 'buku_teks':
									$this->data['research_data'] = $this->Akun_model->getBukuTeks($this->input->get("id"));
									break;
							case 'penghargaan':
									$this->data['research_data'] = $this->Akun_model->getPenghargaan($this->input->get("id"));
									break;
							case 'kuliah':
									$this->data['research_data'] = $this->Akun_model->getKuliah($this->input->get("id"));
									break;
					}
					/*
					$work_dir = sanitize_path($this->session->userdata('work_dir')."\\.profile\\".$this->input->get("sd").$this->input->get("id"));

					if(!file_exists($work_dir)){
							mkdir($work_dir);
					}
			} else {
					$work_dir = $this->session->userdata('work_dir');
					$this->load->model('Akun_model');
					$this->data['identitas'] = $this->Akun_model->getIdentitas();
			}
			*/
			if($q){
				if($q->uid == $this->session->userdata('login')->uid){
					$work_dir = sanitize_path($this->session->userdata('work_dir')."/profile/".$this->input->get("sd").$this->input->get("id"));
					if(!file_exists($work_dir)){
							mkdir($work_dir);
					}
				} else {
					$result = $this->db->query("SELECT * FROM users WHERE uid = ".$q->uid)->row();
					$work_dir = sanitize_path($GLOBALS['WORK_DIR'].$result->uid.$result->no_induk."/profile/".$this->input->get("sd").$this->input->get("id"));
				}
			} else {
				$work_dir = sanitize_path($this->session->userdata('work_dir')."/profile/".$this->input->get("sd").$this->input->get("id"));
				if(!file_exists($work_dir)){
						mkdir($work_dir);
				}
			}
	} else {
			$work_dir = $this->session->userdata('work_dir');
			$this->load->model('Akun_model');
			$this->data['identitas'] = $this->Akun_model->getIdentitas();

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
											redirect(site_url()."/home/mydocumentsadmin/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""));
									} else {
											$this->session->set_flashdata('failure', 'Folder \'<b>'.$this->input->post('dir_name').'</b>\' gagal dibuat. Mungkin terdapat karakter yang tidak boleh digunakan atau folder sudah ada.');
											redirect(site_url()."/home/mydocumentsadmin/makedir/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""));
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
							redirect(site_url()."/home/mydocumentsadmin/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""));
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
													redirect(site_url()."/home/mydocumentsadmin/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""));
											} else {
													$this->session->set_flashdata('failure', 'Gagal mengubah nama '.$this->input->post('type').' menjadi \'<b>'.$this->input->post('new_name').'</b>\'. Mungkin terdapat karakter yang tidak boleh digunakan sebagai nama '.$this->input->post('type').'.');
													redirect(site_url()."/home/mydocumentsadmin/rename/?d=".$this->input->get('d')."&old_name=".$this->input->post('old_name')."&type=".$this->input->post('type').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""));
											}
									} else {
											$this->session->set_flashdata('failure', 'Gagal mengubah nama '.$this->input->post('type').' menjadi \'<b>'.$this->input->post('new_name').'</b>\'. Nama sudah ada pada folder ini.');
											redirect(site_url()."/home/mydocumentsadmin/rename/?d=".$this->input->get('d')."&old_name=".$this->input->post('old_name')."&type=".$this->input->post('type').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""));
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
									redirect(site_url()."/home/mydocumentsadmin/rename/?d=".$this->input->get('d')."&old_name=".$old_name."&type=".$type.($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""));
							}
					}
			} else if($action == "upload"){
					$this->load->library('upload');
					$this->load->helper('form');
					$dir_path = $work_dir.$this->input->get('d');

					if($this->input->post('upload')){
							$config['upload_path']          = $dir_path;
							$config['allowed_types']        = 'jpg|png|jpeg|pdf|docx|doc|xlsx|xls|pptx|ppt|zip|rar';
							$config['max_size']             = 10000;
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
											redirect(site_url()."/home/mydocumentsadmin/?d=".$this->input->get('d').($this->input->get("sd") ? "&sd=".$this->input->get("sd")."&id=".$this->input->get("id"):""));

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
			//$this->data['dir_path'] = array_splice($this->data['dir_path'], 2);
			 if($this->input->get('sd')){
					$this->data['dir_path'] = array_merge(array_splice($this->data['dir_path'], 2, 1), array_splice($this->data['dir_path'], 4));
			} else {
					$this->data['dir_path'] = array_splice($this->data['dir_path'], 2);
			}
	$this->data['dir_path'][0] = "root";
			$this->data['work_dir'] = $work_dir;
			$this->set_tab_index("2");
			$this->set_page_header("My Documents", "");
			$this->data['content'] = 'mydocuments_admin';
			//$this->data['content_admin'] = 'mydocuments_admin';

	$this->load->view('templateadmin', $this->data);
	//$this->load->view('templateadmin', $this->data);

}


    public function upload(){

    }

    public function makedir(){

    }
}
