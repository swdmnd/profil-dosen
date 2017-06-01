<?php

class Akun_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }
    
    public function getIdentitas(){
        $this->db->where("uid", $this->session->userdata('login')->uid);
        return $this->db->get("users")->row();
    }
    
    public function getPendidikan(){
        $this->db->where("uid", $this->session->userdata('login')->uid);
        $res = $this->db->get("pendidikan")->result();
        foreach($res as $item){
            $data['tingkat'][] = $item->tingkat;
            $data['nama_pt'][] = $item->nama_pt;
            $data['bidang_ilmu'][] = $item->bidang_ilmu;
            $data['tahun_masuk'][] = $item->tahun_masuk;
            $data['tahun_lulus'][] = $item->tahun_lulus;
            $data['judul_ta'][] = $item->judul_ta;
            $data['pembimbing'][] = $item->pembimbing;
        }
        $data = (object) $data;
        return $data;
    }
    
    public function getPenelitian(){
        $this->db->where(array("uid"=>$this->session->userdata('login')->uid, "tipe"=>"penelitian"));
        return $this->db->get("penelitian")->result();
    }
    
    public function getPengabdian(){
        $this->db->where(array("uid"=>$this->session->userdata('login')->uid, "tipe"=>"pengabdian"));
        return $this->db->get("penelitian")->result();
    }
    
    public function getPublikasi(){
        $this->db->where("uid", $this->session->userdata('login')->uid);
        return $this->db->get("publikasi")->result();
    }
    
    public function getSeminar(){
        $this->db->where("uid", $this->session->userdata('login')->uid);
        return $this->db->get("seminar")->result();
    }
    
    public function getPekerjaan(){
        $this->db->where("uid", $this->session->userdata('login')->uid);
        return $this->db->get("pekerjaan")->result();
    }
    
    public function setIdentitas($data){
        return $this->db->update("users", $data, array("uid"=>($this->session->userdata('login')->uid)));
    }
    
    public function setPendidikan($data){
        $this->db->query("REPLACE INTO pendidikan(uid, tingkat, nama_pt, tahun_masuk, tahun_lulus, judul_ta, pembimbing) VALUES({$this->session->userdata('login')->uid}, '{$data['tingkat']}', '{$data['nama_pt']}', '{$data['tahun_masuk']}', '{$data['tahun_lulus']}', '{$data['judul_ta']}', '{$data['pembimbing']}')");
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
}