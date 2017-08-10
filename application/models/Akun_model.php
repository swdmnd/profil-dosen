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
  
    public function queryUser($where, $q){
        $this->db->select('no_induk AS `NIK/NIDN`, nama_lengkap AS Nama, jabatan_fungsional AS `Jabatan Fungsional`, jabatan_struktural AS `Jabatan Struktural`');
        if($q!="") $this->db->where(str_replace('?', $q, $where));
        $res = $this->db->where('level = "dosen"')->get("users")->result_array();
        $thead = array();
        if(!empty($res)){
          foreach($res[0] as $key=>$val){
            array_push($thead, $key);
          }
          for($i=0; $i < count($res); ++$i){
            $temp = array();
            foreach($res[$i] as $k=>$v){
              $temp[$k] = "<a href='".site_url()."/beranda?t=dosen&nik=".$res[$i]['NIK/NIDN']."' style='display:block;'>$v</a>";
            }
            $res[$i] = $temp;
          }
        }
        return (object)array('thead'=>$thead, 'tbody'=>$res);
    }
    public function queryPenelitian($where, $q){
        $this->db->select('penelitian.id, penelitian.uid, penelitian.judul as `Judul Penelitian`, penelitian.tahun_mulai, penelitian.tahun_selesai, users.no_induk, users.nama_lengkap AS Ketua, penelitian.tags as Tags');
        $this->db->where('penelitian.uid = users.uid');
        $this->db->from('penelitian,users');
        if($q!="") $this->db->where(str_replace('?', $q, $where));
        $res = $this->db->where("tipe = 'penelitian'")->get()->result_array();
        $thead = array();
        if(!empty($res)){
          for($i=0; $i < count($res); ++$i){
            $temp = array();
            $temp['Judul Penelitian'] = "<a href='".site_url()."/beranda?t=penelitian&id=".$res[$i]['id']."' style='display:block;'>{$res[$i]['Judul Penelitian']}</a>";
            $temp['Tahun'] = "<a href='".site_url()."/beranda?t=penelitian&id=".$res[$i]['id']."' style='display:block;'>{$res[$i]['tahun_mulai']} - {$res[$i]['tahun_selesai']}</a>";
            $temp['Anggota'] = array();
            array_push($temp['Anggota'], "<a href='".site_url()."/beranda?t=dosen&nik=".$res[$i]['no_induk']."'>{$res[$i]['Ketua']}</a>");
            $anggota = $this->db->query("SELECT users.uid, users.no_induk, users.nama_lengkap FROM bersama, users WHERE bersama.id_anggota = users.uid AND bersama.id_penelitian = {$res[$i]['id']} AND bersama.ref='penelitian'")->result_array();
            foreach($anggota as $a){
              array_push($temp['Anggota'], "<a href='".site_url()."/beranda?t=dosen&nik=".$a['no_induk']."'>{$a['nama_lengkap']}</a>");
            }
            $temp['Anggota'] = implode(', ', $temp['Anggota']);
            $temp['Tags'] = array_filter(explode(',', $res[$i]['Tags']));
            if(!empty($temp['Tags'])){
              for($j=0; $j < count($temp['Tags']); ++$j){
                $temp['Tags'][$j] = "<a href='".site_url()."/beranda?q=".urlencode($temp['Tags'][$j])."&cat=penelitian_tag'>{$temp['Tags'][$j]}</a>";
              };
            }
            $temp['Tags'] = trim(implode(', ', $temp['Tags']));
            $res[$i] = $temp;
          }
          
          foreach($res[0] as $key=>$val){
            array_push($thead, $key);
          }
        }
        return (object)array('thead'=>$thead, 'tbody'=>$res);
    }
    public function queryPengabdian($where, $q){
        $this->db->select('penelitian.id, penelitian.uid, penelitian.judul as `Judul Pengabdian`, penelitian.tahun_mulai, penelitian.tahun_selesai, users.no_induk, users.nama_lengkap AS Ketua, penelitian.tags as Tags');
        $this->db->where('penelitian.uid = users.uid');
        $this->db->from('penelitian,users');
        if($q!="") $this->db->where(str_replace('?', $q, $where));
        $res = $this->db->where("tipe = 'pengabdian'")->get()->result_array();
        $thead = array();
        if(!empty($res)){
          for($i=0; $i < count($res); ++$i){
            $temp = array();
            $temp['Judul Pengabdian'] = "<a href='".site_url()."/beranda?t=pengabdian&id=".$res[$i]['id']."' style='display:block;'>{$res[$i]['Judul Pengabdian']}</a>";
            $temp['Tahun'] = "<a href='".site_url()."/beranda?t=pengabdian&id=".$res[$i]['id']."' style='display:block;'>{$res[$i]['tahun_mulai']} - {$res[$i]['tahun_selesai']}</a>";
            $temp['Anggota'] = array();
            array_push($temp['Anggota'], "<a href='".site_url()."/beranda?t=dosen&nik=".$res[$i]['no_induk']."'>{$res[$i]['Ketua']}</a>");
            $anggota = $this->db->query("SELECT users.uid, users.no_induk, users.nama_lengkap FROM bersama, users WHERE bersama.id_anggota = users.uid AND bersama.id_penelitian = {$res[$i]['id']} AND bersama.ref='penelitian'")->result_array();
            foreach($anggota as $a){
              array_push($temp['Anggota'], "<a href='".site_url()."/beranda?t=dosen&nik=".$a['no_induk']."'>{$a['nama_lengkap']}</a>");
            }
            $temp['Anggota'] = implode(', ', $temp['Anggota']);
            $temp['Tags'] = array_filter(explode(',', $res[$i]['Tags']));
            if(!empty($temp['Tags'])){
              for($j=0; $j < count($temp['Tags']); ++$j){
                $temp['Tags'][$j] = "<a href='".site_url()."/beranda?q=".urlencode($temp['Tags'][$j])."&cat=pengabdian_tag'>{$temp['Tags'][$j]}</a>";
              };
            }
            $temp['Tags'] = trim(implode(', ', $temp['Tags']));
            $res[$i] = $temp;
          }
          foreach($res[0] as $key=>$val){
            array_push($thead, $key);
          }
        }
        return (object)array('thead'=>$thead, 'tbody'=>$res);
    }
    public function queryPublikasi($where, $q){
        $this->db->select('publikasi.id, publikasi.uid, publikasi.judul as `Judul Publikasi`, publikasi.tahun, publikasi.nomor_jurnal AS `Nomor Jurnal`, publikasi.nama_jurnal AS `Nama Jurnal`, users.no_induk, users.nama_lengkap AS Ketua, publikasi.tags as Tags');
        $this->db->where('publikasi.uid = users.uid');
        $this->db->from('publikasi,users');
        if($q!="") $this->db->where(str_replace('?', $q, $where));
        $res = $this->db->get()->result_array();
        $thead = array();
        if(!empty($res)){
          for($i=0; $i < count($res); ++$i){
            $temp = array();
            $temp['Judul Publikasi'] = "<a href='".site_url()."/beranda?t=publikasi&id=".$res[$i]['id']."' style='display:block;'>{$res[$i]['Judul Publikasi']}</a>";
            $temp['Tahun'] = "<a href='".site_url()."/beranda?t=publikasi&id=".$res[$i]['id']."' style='display:block;'>{$res[$i]['tahun']}</a>";
            $temp['Penulis'] = array();
            array_push($temp['Penulis'], "<a href='".site_url()."/beranda?t=dosen&nik=".$res[$i]['no_induk']."'>{$res[$i]['Ketua']}</a>");
            $anggota = $this->db->query("SELECT users.uid, users.no_induk, users.nama_lengkap FROM bersama, users WHERE bersama.id_anggota = users.uid AND bersama.id_penelitian = {$res[$i]['id']} AND bersama.ref='publikasi'")->result_array();
            foreach($anggota as $a){
              array_push($temp['Penulis'], "<a href='".site_url()."/beranda?t=dosen&nik=".$a['no_induk']."'>{$a['nama_lengkap']}</a>");
            }
            $temp['Penulis'] = implode(', ', $temp['Penulis']);
            $temp['Nama Jurnal'] = "<a href='".site_url()."/beranda?q=".urlencode($res[$i]['Nama Jurnal'])."&cat=publikasi_jurnal'>{$res[$i]['Nama Jurnal']}</a>";
            $temp['Nomor Jurnal'] = "<a href='".site_url()."/beranda?q=".urlencode($res[$i]['Nomor Jurnal'])."&cat=publikasi_nomor'>{$res[$i]['Nomor Jurnal']}</a>";
            $temp['Tags'] = array_filter(explode(',', $res[$i]['Tags']));
            if(!empty($temp['Tags'])){
              for($j=0; $j < count($temp['Tags']); ++$j){
                $temp['Tags'][$j] = "<a href='".site_url()."/beranda?q=".urlencode($temp['Tags'][$j])."&cat=publikasi_tag'>{$temp['Tags'][$j]}</a>";
              };
            }
            $temp['Tags'] = trim(implode(', ', $temp['Tags']));
            $res[$i] = $temp;
          }
          
          foreach($res[0] as $key=>$val){
            array_push($thead, $key);
          }
        }
        return (object)array('thead'=>$thead, 'tbody'=>$res);
    }
    
    public function getIdentitas($uid = null){
        if($uid) $this->db->where("uid", $uid);
        else $this->db->where("uid", $this->session->userdata('login')->uid);
        return $this->db->get("users")->row();
    }
    
    public function getPendidikan(){
        $this->db->where("uid", $this->session->userdata('login')->uid);
        $res = $this->db->get("pendidikan")->result();
        $data = array();
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
    
    public function getPenelitian($id=null){
        if($id) $this->db->where("id", $id);
        else $this->db->where(array("uid"=>$this->session->userdata('login')->uid, "tipe"=>"penelitian"));
        return $this->db->get("penelitian")->result();
    }
  
    public function getPenelitianExtra($id=null){
        $cond="";
        if($id) $cond = "AND penelitian.id = $id";
        return $this->db->query("SELECT penelitian.*, users.nama, users.uid FROM penelitian, bersama, users WHERE penelitian.id = bersama.id_penelitian AND penelitian.uid = users.uid AND bersama.id_anggota = {$this->session->userdata('login')->uid} AND penelitian.tipe='penelitian' AND bersama.ref='penelitian' $cond")->result();
    }
    
    public function getPengabdian($id=null){
        if($id) $this->db->where("id", $id);
        else $this->db->where(array("uid"=>$this->session->userdata('login')->uid, "tipe"=>"pengabdian"));
        return $this->db->get("penelitian")->result();
    }
  
    public function getPengabdianExtra($id=null){
        $cond="";
        if($id) $cond = "AND penelitian.id = $id";
        return $this->db->query("SELECT penelitian.*, users.nama, users.uid FROM penelitian, bersama, users WHERE penelitian.id = bersama.id_penelitian AND penelitian.uid = users.uid AND bersama.id_anggota = {$this->session->userdata('login')->uid} AND penelitian.tipe='pengabdian' AND bersama.ref='penelitian' $cond")->result();
    }
    
    public function getDetailPenelitian($id){
      $ketua = $this->db->query("SELECT users.uid as id_ketua, users.nama_lengkap as nama_ketua FROM users, penelitian WHERE penelitian.uid = users.uid AND penelitian.id=$id")->row();
      $anggota = $this->db->query("SELECT users.uid, users.no_induk, users.nama_lengkap FROM bersama, users WHERE bersama.id_anggota = users.uid AND bersama.id_penelitian = $id AND bersama.ref='penelitian'")->result();
      return (object)array("ketua"=>$ketua, "anggota"=>$anggota);
    }
  
    public function getDetailPublikasi($id){
      $ketua = $this->db->query("SELECT users.uid as id_ketua, users.nama_lengkap as nama_ketua FROM users, publikasi WHERE publikasi.uid = users.uid AND publikasi.id=$id")->row();
      $anggota = $this->db->query("SELECT users.uid, users.no_induk, users.nama_lengkap FROM bersama, users WHERE bersama.id_anggota = users.uid AND bersama.id_penelitian = $id AND bersama.ref='publikasi'")->result();
      return (object)array("ketua"=>$ketua, "anggota"=>$anggota);
    }
    
    public function getPublikasi($id=null){
        if($id) $this->db->where("id", $id);
        $this->db->where("uid", $this->session->userdata('login')->uid);
        return $this->db->get("publikasi")->result();
    }
  
    public function getPublikasiExtra($id=null){
        $cond="";
        if($id) $cond = "AND publikasi.id = $id";
        return $this->db->query("SELECT publikasi.*, users.nama, users.uid FROM publikasi, bersama, users WHERE publikasi.id = bersama.id_penelitian AND publikasi.uid = users.uid AND bersama.id_anggota = {$this->session->userdata('login')->uid} AND bersama.ref='publikasi' $cond")->result();
    }
    
    public function getSeminar($id=null){
        if($id) $this->db->where("id", $id);
        $this->db->where("uid", $this->session->userdata('login')->uid);
        return $this->db->get("seminar")->result();
    }
    
    public function getPekerjaan($id=null){
        if($id) $this->db->where("id", $id);
        $this->db->where("uid", $this->session->userdata('login')->uid);
        return $this->db->get("pekerjaan")->result();
    }
    
    public function setIdentitas($data, $uid=null){
        if($uid){
          if($this->db->where("no_induk = {$data['no_induk']} AND uid != $uid")->get('users')->num_rows() > 0)
            return 0;
          $this->db->update("users", $data, array("uid"=>$uid));
          return 1;
        }
        else{
          return $this->db->update("users", $data, array("uid"=>($this->session->userdata('login')->uid)));
        }
    }
    
    public function setPendidikan($data){
        $this->db->query("REPLACE INTO pendidikan(uid, tingkat, nama_pt, tahun_masuk, tahun_lulus, judul_ta, pembimbing) VALUES({$this->session->userdata('login')->uid}, '{$data['tingkat']}', '{$data['nama_pt']}', '{$data['tahun_masuk']}', '{$data['tahun_lulus']}', '{$data['judul_ta']}', '{$data['pembimbing']}')");
    }
    
    public function setPenelitian($data){
        $data['jumlah_dana'] = implode('', explode('.', $data['jumlah_dana']));
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
    
    public function updatePenelitian($data, $id){
        $data['jumlah_dana'] = implode('', explode('.', $data['jumlah_dana']));
        $anggota = $data['anggota'];
        unset($data['anggota']);
        $this->db->update("penelitian", $data, array("id"=>$id));
        $this->db->where(array("id_penelitian"=>$id, 'ref'=>'penelitian'))->delete("bersama");
        $data_anggota=array();
        foreach($anggota as $a){
            $this->db->insert("bersama", array("id_penelitian"=>$id, "id_anggota"=>$a, 'ref'=>'penelitian'));
        }
    }
    public function updatePekerjaan($data, $id){
        return $this->db->update("pekerjaan", $data, array("id"=>$id));
    }
    public function updatePublikasi($data, $id){
        $anggota = $data['anggota'];
        unset($data['anggota']);
        $this->db->update("publikasi", $data, array("id"=>$id));
        $this->db->where(array("id_penelitian"=>$id, 'ref'=>'publikasi'))->delete("bersama");
        $data_anggota=array();
        foreach($anggota as $a){
            $this->db->insert("bersama", array("id_penelitian"=>$id, "id_anggota"=>$a, 'ref'=>'publikasi'));
        }
    }
    public function updateSeminar($data, $id){
        return $this->db->update("seminar", $data, array("id"=>$id));
    }
  
    public function deleteUser($uid){
      $this->db->query("DELETE FROM users WHERE uid=$uid");
      $this->db->query("DELETE FROM pekerjaan WHERE uid=$uid");
      $this->db->query("DELETE FROM pendidikan WHERE uid=$uid");
      $this->db->query("DELETE FROM penelitian WHERE uid=$uid");
      $this->db->query("DELETE FROM publikasi WHERE uid=$uid");
      $this->db->query("DELETE FROM seminar WHERE uid=$uid");
      $this->db->query("DELETE FROM bersama WHERE id_anggota=$uid");
    }
}