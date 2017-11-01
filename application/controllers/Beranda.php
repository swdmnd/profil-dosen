<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct(){
      parent::__construct();
      $this->load->model("Akun_model");
    }
    
	public function index()
	{
      $data['dosen_list'] = $this->Akun_model->getAllUsers();
      $q = $this->input->get("q") ? urldecode($this->input->get("q")) : "";
      if($this->input->get("cat")){
        $cat = $this->input->get("cat");

        if($cat == "dosen_nama"){
          $data['table_data'] = $this->Akun_model->queryUser('nama_lengkap like \'%?%\'', $q);
        } else if($cat == "dosen_nik"){
          $data['table_data'] = $this->Akun_model->queryUser('no_induk like \'%?%\'', $q);
        } else if($cat == "penelitian_judul"){
          $data['table_data'] = $this->Akun_model->queryPenelitian('penelitian.judul like \'%?%\'', $q);
        } else if($cat == "penelitian_tag"){
          $data['table_data'] = $this->Akun_model->queryPenelitian('penelitian.tags like \'%?%\'', $q);
        } else if($cat == "penelitian_tahun"){
          $data['table_data'] = $this->Akun_model->queryPenelitian('? >= penelitian.tahun_mulai AND ? <= penelitian.tahun_selesai', $q);
        } else if($cat == "pengabdian_judul"){
          $data['table_data'] = $this->Akun_model->queryPengabdian('penelitian.judul like \'%?%\'', $q);
        } else if($cat == "pengabdian_tag"){
          $data['table_data'] = $this->Akun_model->queryPengabdian('penelitian.tags like \'%?%\'', $q);
        } else if($cat == "pengabdian_tahun"){
          $data['table_data'] = $this->Akun_model->queryPengabdian('? >= penelitian.tahun_mulai AND ? <= penelitian.tahun_selesai', $q);
        } else if($cat == "publikasi_judul"){
          $data['table_data'] = $this->Akun_model->queryPublikasi('publikasi.judul like \'%?%\'', $q);
        } else if($cat == "publikasi_tahun"){
          $data['table_data'] = $this->Akun_model->queryPublikasi('publikasi.tahun = ?', $q);
        } else if($cat == "publikasi_nomor"){
          $data['table_data'] = $this->Akun_model->queryPublikasi('publikasi.nomor_jurnal like \'%?%\'', $q);
        } else if($cat == "publikasi_jurnal"){
          $data['table_data'] = $this->Akun_model->queryPublikasi('publikasi.nama_jurnal like \'%?%\'', $q);
        } else if($cat == "publikasi_tag"){
          $data['table_data'] = $this->Akun_model->queryPublikasi('publikasi.tags like \'%?%\'', $q);
        }
      }

      if($this->input->get("t") == "dosen" && $this->input->get("nik")){
        $this->load->model("Akun_model");
        $uid = $this->db->query("SELECT uid FROM users WHERE level='dosen' AND no_induk='".$this->input->get("nik")."'")->row_array();
        if(!empty($uid)){
          $this->session->set_userdata('login', (object) array("uid"=> $uid['uid']));
          $data['identitas'] = $this->Akun_model->getIdentitas();
          $data['pendidikan'] = $this->Akun_model->getPendidikan();
          $data['pekerjaan'] = $this->Akun_model->getPekerjaan();
          $data['penelitian'] = $this->Akun_model->getPenelitian();
          $data['penelitian_extra'] = $this->Akun_model->getPenelitianExtra();
          $data['pengabdian'] = $this->Akun_model->getPengabdian();
          $data['pengabdian_extra'] = $this->Akun_model->getPengabdianExtra();
          $data['publikasi'] = $this->Akun_model->getPublikasi();
          $data['publikasi_extra'] = $this->Akun_model->getPublikasiExtra();
          $data['seminar'] = $this->Akun_model->getSeminar();
          $this->session->unset_userdata('login');
          $data['show_dosen'] = true;
        }
      }

      if($this->input->get("t") == "penelitian" && $this->input->get("id")){
        $this->load->model("Akun_model");
        $uid = $this->db->query("SELECT users.uid FROM users, penelitian WHERE penelitian.uid = users.uid AND penelitian.id = {$this->input->get('id')} AND users.level='dosen'")->row_array();
        if(!empty($uid)){
          $this->session->set_userdata('login', (object) array("uid"=> $uid['uid']));
          $data['research_data'] = $this->Akun_model->getPenelitian($this->input->get("id"));
          $data['research_members'] = $this->Akun_model->getDetailPenelitian($this->input->get("id"));
          $q = $this->db->query("SELECT penelitian.* FROM penelitian, bersama WHERE penelitian.id = bersama.id_penelitian AND bersama.id_anggota = {$this->session->userdata('login')->uid} AND bersama.ref='penelitian' AND penelitian.id = ".$this->input->get("id"))->row();
          $this->session->unset_userdata('login');
          $data['show_research'] = true;
          $data['judul'] = 'Penelitian';
        }
      }
      if($this->input->get("t") == "pengabdian" && $this->input->get("id")){
        $this->load->model("Akun_model");
        $uid = $this->db->query("SELECT users.uid FROM users, penelitian WHERE penelitian.uid = users.uid AND penelitian.id = {$this->input->get('id')} AND users.level='dosen'")->row_array();
        if(!empty($uid)){
          $this->session->set_userdata('login', (object) array("uid"=> $uid['uid']));
          $data['research_data'] = $this->Akun_model->getPengabdian($this->input->get("id"));
          $data['research_members'] = $this->Akun_model->getDetailPenelitian($this->input->get("id"));
          $q = $this->db->query("SELECT penelitian.* FROM penelitian, bersama WHERE penelitian.id = bersama.id_penelitian AND bersama.id_anggota = {$this->session->userdata('login')->uid} AND bersama.ref='penelitian' AND penelitian.id = ".$this->input->get("id"))->row();
          $this->session->unset_userdata('login');
          $data['show_research'] = true;
          $data['judul'] = 'Penelitian';
        }
      }
      if($this->input->get("t") == "publikasi" && $this->input->get("id")){
        $this->load->model("Akun_model");
        $uid = $this->db->query("SELECT users.uid FROM users, penelitian WHERE penelitian.uid = users.uid AND penelitian.id = {$this->input->get('id')} AND users.level='dosen'")->row_array();
        if(!empty($uid)){
          $this->session->set_userdata('login', (object) array("uid"=> $uid['uid']));
          $data['research_data'] = $this->Akun_model->getPublikasi($this->input->get("id"));
          $data['research_members'] = $this->Akun_model->getDetailPublikasi($this->input->get("id"));
          $q = $this->db->query("SELECT publikasi.* FROM publikasi, bersama WHERE publikasi.id = bersama.id_penelitian AND bersama.id_anggota = {$this->session->userdata('login')->uid} AND bersama.ref='publikasi' AND publikasi.id = ".$this->input->get("id"))->row();
          $this->session->unset_userdata('login');
          $data['show_research'] = true;
          $data['judul'] = 'Penelitian';
        }
      }
      $data['content'] = 'beranda_utama';
      $this->load->view('template_beranda', $data);
	}
  
    function view($no_induk){
      $data['dosen']=$this->Akun_model->getUserByUsername($no_induk);
      $data['identitas'] = $this->Akun_model->getIdentitas($data['dosen']->uid);
      $data['pendidikan'] = $this->Akun_model->getPendidikan($data['dosen']->uid);
      $data['pekerjaan'] = $this->Akun_model->getPekerjaan(null, $data['dosen']->uid);
      $data['penelitian'] = $this->Akun_model->getPenelitian(null, $data['dosen']->uid);
      $data['penelitian_extra'] = $this->Akun_model->getPenelitianExtra(null, $data['dosen']->uid);
      $data['pengabdian'] = $this->Akun_model->getPengabdian(null, $data['dosen']->uid);
      $data['pengabdian_extra'] = $this->Akun_model->getPengabdianExtra(null, $data['dosen']->uid);
      $data['publikasi'] = $this->Akun_model->getPublikasi(null, $data['dosen']->uid);
      $data['publikasi_extra'] = $this->Akun_model->getPublikasiExtra(null, $data['dosen']->uid);
      $data['seminar'] = $this->Akun_model->getSeminar(null, $data['dosen']->uid);
      $data['content'] = 'view_user';
      $this->load->view('template_beranda', $data);
    }
}
