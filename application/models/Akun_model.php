<?php

class Akun_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }

    public function addUser($data){
        if($this->db->where("no_induk = {$data['no_induk']}")->get('users')->num_rows() > 0) return 0;
        $this->db->set($data)->insert('users');
        return 1;
    }

    public function getAllUsers(){
        return $this->db->where("level <> 'admin'")->get("users")->result();
    }

    public function getIdentitas($uid=''){
		if ($uid=='')
		{
        $this->db->where("uid", $this->session->userdata('login')->uid);
		}
		else
		{
        $this->db->where("uid", $uid);
		}
        return $this->db->get("users")->row();
    }


    public function getProdi(){
        $res = $this->db->get("prodi")->result();
        foreach($res as $item){
            $data['nm_prodi'][] = $item->nm_prodi;
        }
        $data = (object) $data;
        return $data;
    }

    public function getPendidikan($uid=''){
		if ($uid=='')
		{
        $this->db->where("uid", $this->session->userdata('login')->uid);
		}
		else
		{
        $this->db->where("uid", $uid);
		}
        $res = $this->db->get("pendidikan")->result();
		if ($res)
		{
        foreach($res as $item){
            $data['id'][] = $item->id;
            $data['tingkat'][] = array("tingkat"=>$item->tingkat,"id"=>$item->id);
            $data['nama_pt'][] =  array("nama_pt"=>$item->nama_pt,"id"=>$item->id);
            $data['bidang_ilmu'][] =  array("bidang_ilmu"=>$item->bidang_ilmu,"id"=>$item->id);
            $data['tahun_masuk'][] =  array("tahun_masuk"=>$item->tahun_masuk,"id"=>$item->id);
            $data['tahun_lulus'][] =  array("tahun_lulus"=>$item->tahun_lulus,"id"=>$item->id);
            $data['judul_ta'][] =  array("judul_ta"=>$item->judul_ta,"id"=>$item->id);
            $data['pembimbing'][] =  array("pembimbing"=>$item->pembimbing,"id"=>$item->id);
        }
        $data = (object) $data;
		}
		else
		{
		$data = '';
		}
        return $data;
    }

    public function getPendidikanLine($id=null,$uid=''){
        if($id) $this->db->where("id", $id);
		if ($uid=='')
		{
        $this->db->where("uid", $this->session->userdata('login')->uid);
		}
		else
		{
        $this->db->where("uid", $uid);
		}
        return $this->db->get("pendidikan")->result();
    }

    public function getPenelitian($id=null,$uid=''){
        if($id) $this->db->where("id", $id);
		if ($uid=='')
		{
        $this->db->where(array("uid"=>$this->session->userdata('login')->uid, "tipe"=>"penelitian"));
        $this->db->order_by("tahun_mulai", "desc");

		}
		else
		{
        $this->db->where(array("uid"=>$uid, "tipe"=>"penelitian"));
        $this->db->order_by("tahun_mulai", "desc");

		}
        return $this->db->get("penelitian")->result();
    }

    public function getPengabdian($id=null,$uid=''){
        if($id) $this->db->where("id", $id);
		if ($uid=='')
		{
        $this->db->where(array("uid"=>$this->session->userdata('login')->uid, "tipe"=>"pengabdian"));
        $this->db->order_by("tahun_mulai", "desc");
		}
		else
		{
        $this->db->where(array("uid"=>$uid, "tipe"=>"pengabdian"));
        $this->db->order_by("tahun_mulai", "desc");

		}
        return $this->db->get("penelitian")->result();
    }

    public function getPublikasi($id=null,$uid=''){
        if($id) $this->db->where("id", $id);
		if ($uid=='')
		{
        $this->db->where("uid", $this->session->userdata('login')->uid);
        $this->db->order_by("tahun", "desc");
		}
		else
		{
        $this->db->where("uid", $uid);
        $this->db->order_by("tahun", "desc");
		}
        return $this->db->get("publikasi")->result();
    }

    public function getSeminar($id=null,$uid=''){
        if($id) $this->db->where("id", $id);
		if ($uid=='')
		{
        $this->db->where("uid", $this->session->userdata('login')->uid);
        $this->db->order_by("waktu", "desc");

		}
		else
		{
        $this->db->where("uid", $uid);
        $this->db->order_by("waktu", "desc");

		}
        return $this->db->get("seminar")->result();
    }

    public function getPekerjaan($id=null,$uid=''){
        if($id) $this->db->where("id", $id);
		if ($uid=='')
		{
        $this->db->where("uid", $this->session->userdata('login')->uid);
        $this->db->order_by("tahun_mulai", "desc");
		}
		else
		{
        $this->db->where("uid", $uid);
        $this->db->order_by("tahun_mulai", "desc");
		}
        return $this->db->get("pekerjaan")->result();
    }

    public function getBukuTeks($id=null,$uid=''){
        if($id) $this->db->where("id", $id);
		if ($uid=='')
		{
        $this->db->where("uid", $this->session->userdata('login')->uid);
        $this->db->order_by("tahun_terbit", "desc");
		}
		else
		{
        $this->db->where("uid", $uid);
        $this->db->order_by("tahun_terbit", "desc");
		}
        return $this->db->get("buku_teks")->result();
    }

    public function getPenghargaan($id=null,$uid=''){
        if($id) $this->db->where("id", $id);
    if ($uid=='')
    {
        $this->db->where("uid", $this->session->userdata('login')->uid);
        $this->db->order_by("tahun_penghargaan", "desc");

    }
    else
    {
        $this->db->where("uid", $uid);
        $this->db->order_by("tahun_penghargaan", "desc");

    }
        return $this->db->get("penghargaan")->result();
    }

    public function getKuliah($id=null,$uid=''){
        if($id) $this->db->where("id", $id);
    if ($uid=='')
    {
        $this->db->where("uid", $this->session->userdata('login')->uid);
        $this->db->order_by("kode_mk", "desc");

    }
    else
    {
        $this->db->where("uid", $uid);
        $this->db->order_by("kode_mk", "desc");

    }
        return $this->db->get("kuliah")->result();
    }

    public function getKuliahItem($id=null,$uid=''){
        if($id) $this->db->where("id", $id);
    if ($uid=='')
    {
        $this->db->where("uid", $this->session->userdata('login')->uid);
        //$this->db->order_by("kode_mk", "desc");

    }
    else
    {
        $this->db->where("uid", $uid);
        //$this->db->order_by("kode_mk", "desc");

    }
        return $this->db->get("kuliah")->row();
    }

    public function getLastKuliahId()
    {
      $maxid = $this->db->query('SELECT AUTO_INCREMENT as maxid FROM information_schema.TABLES WHERE TABLE_SCHEMA = "manajemen_dosen" AND TABLE_NAME = "kuliah"')->row()->maxid;
      return $maxid;
    }

    public function setIdentitas($data){
      if($data['uid'])
      {
        $uid = $data['uid'];
      }
      else
      {
        $uid = $this->session->userdata('login')->uid;
      }
        return $this->db->update("users", $data, array("uid"=>($uid)));
    }

    public function setIdentitasuid($data,$uid){
      return $this->db->update("users", $data, array("uid"=>($uid)));
    }

    public function setPendidikan($data){
      if($data['uid'])
      {
        $uid = $data['uid'];
      }
      else
      {
        $uid = $this->session->userdata('login')->uid;
      }
        $this->db->query("REPLACE INTO pendidikan(uid, tingkat, nama_pt, bidang_ilmu, tahun_masuk, tahun_lulus, judul_ta, pembimbing) VALUES({$uid}, '{$data['tingkat']}', '{$data['nama_pt']}','{$data['bidang_ilmu']}', '{$data['tahun_masuk']}', '{$data['tahun_lulus']}', '{$data['judul_ta']}', '{$data['pembimbing']}')");
    }

    public function setPenelitian($data){
        $this->db->insert("penelitian", $data);
    }

    public function setPublikasi($data){
        $this->db->insert("publikasi", $data);
    }

    public function setSeminar($data){
        $this->db->insert("seminar", $data);
    }
    public function setPekerjaan($data){
        $this->db->insert("pekerjaan", $data);
    }

    public function setBukuTeks($data){
        $this->db->insert("buku_teks", $data);
    }

    public function setPenghargaan($data){
        $this->db->insert("penghargaan", $data);
    }

    public function setKuliah($data){
        $this->db->insert("kuliah", $data);
    }

    public function updatePendidikanlive($idpendidikan,$valuependidikan,$modulpendidikan){
  		$this->db->where(array("id"=>$idpendidikan));
  		$this->db->update("pendidikan",array($modulpendidikan=>$valuependidikan));
  	}
    public function updatePenelitian($data, $id){
        return $this->db->update("penelitian", $data, array("id"=>$id));
    }
    public function updatePenelitianlive($idpenelitian,$valuepenelitian,$modulpenelitian){
  		$this->db->where(array("id"=>$idpenelitian));
  		$this->db->update("penelitian",array($modulpenelitian=>$valuepenelitian));
  	}
    public function updatePengabdian($data, $id){
        return $this->db->update("penelitian", $data, array("id"=>$id));
    }
    public function updatePengabdianlive($idpengabdian,$valuepengabdian,$modulpengabdian){
  		$this->db->where(array("id"=>$idpengabdian));
  		$this->db->update("penelitian",array($modulpengabdian=>$valuepengabdian));
  	}
    public function updatePekerjaan($data, $id){
        return $this->db->update("pekerjaan", $data, array("id"=>$id));
    }
    public function updatePekerjaanlive($idpekerjaan,$valuepekerjaan,$modulpekerjaan){
  		$this->db->where(array("id"=>$idpekerjaan));
  		$this->db->update("pekerjaan",array($modulpekerjaan=>$valuepekerjaan));
  	}
    public function updatePublikasi($data, $id){
        return $this->db->update("publikasi", $data, array("id"=>$id));
    }
    public function updatePublikasilive($idpublikasi,$valuepublikasi,$modulpublikasi){
  		$this->db->where(array("id"=>$idpublikasi));
  		$this->db->update("publikasi",array($modulpublikasi=>$valuepublikasi));
  	}
    public function updateSeminar($data, $id){
        return $this->db->update("seminar", $data, array("id"=>$id));
    }
    public function updateSeminarlive($idseminar,$valueseminar,$modulseminar){
  		$this->db->where(array("id"=>$idseminar));
  		$this->db->update("seminar",array($modulseminar=>$valueseminar));
  	}
    public function updateBukuTeks($data, $id){
        return $this->db->update("buku_teks", $data, array("id"=>$id));
    }
    public function updateBukuTekslive($idbukuteks,$valuebukuteks,$modulbukuteks){
  		$this->db->where(array("id"=>$idbukuteks));
  		$this->db->update("buku_teks",array($modulbukuteks=>$valuebukuteks));
  	}
    public function updatePenghargaan($data, $id){
        return $this->db->update("penghargaan", $data, array("id"=>$id));
    }
    public function updatePenghargaanlive($idpenghargaan,$valuepenghargaan,$modulpenghargaan){
  		$this->db->where(array("id"=>$idpenghargaan));
  		$this->db->update("penghargaan",array($modulpenghargaan=>$valuepenghargaan));
  	}
    public function updateKuliah($data, $id){
        return $this->db->update("kuliah", $data, array("id"=>$id));
    }
    public function updateKuliahlive($idkuliah,$valuekuliah,$modulkuliah){
  		$this->db->where(array("id"=>$idkuliah));
  		$this->db->update("kuliah",array($modulkuliah=>$valuekuliah));
  	}
    public function deletePendidikan($id,$uid)
    {
      $this->db->delete('pendidikan', array('id'=>$id,'uid'=>$uid));
    }
    public function deletePenelitian($id,$uid)
    {
      $this->db->delete('penelitian', array('id'=>$id,'uid'=>$uid));
    }
    public function deletePekerjaan($id,$uid)
    {
      $this->db->delete('pekerjaan', array('id'=>$id,'uid'=>$uid));
    }
    public function deletePublikasi($id,$uid)
    {
      $this->db->delete('publikasi', array('id'=>$id,'uid'=>$uid));
    }
    public function deleteSeminar($id,$uid)
    {
      $this->db->delete('seminar', array('id'=>$id,'uid'=>$uid));
    }
    public function deleteBukuTeks($id,$uid)
    {
      $this->db->delete('buku_teks', array('id'=>$id,'uid'=>$uid));
    }
    public function deletePenghargaan($id,$uid)
    {
      $this->db->delete('penghargaan', array('id'=>$id,'uid'=>$uid));
    }
    public function deleteKuliah($id,$uid)
    {
      $this->db->delete('kuliah', array('id'=>$id,'uid'=>$uid));

    }
    public function deleteUser($uid){
      $this->db->query("DELETE FROM users WHERE uid=$uid");
      $this->db->query("DELETE FROM pekerjaan WHERE uid=$uid");
      $this->db->query("DELETE FROM pendidikan WHERE uid=$uid");
      $this->db->query("DELETE FROM penelitian WHERE uid=$uid");
      $this->db->query("DELETE FROM publikasi WHERE uid=$uid");
      $this->db->query("DELETE FROM seminar WHERE uid=$uid");
      $this->db->query("DELETE FROM penghargaan WHERE uid=$uid");
      $this->db->query("DELETE FROM buku_teks WHERE uid=$uid");
      $this->db->query("DELETE FROM kuliah WHERE uid=$uid");

      //$this->db->query("DELETE FROM bersama WHERE id_anggota=$uid");
    }
}
