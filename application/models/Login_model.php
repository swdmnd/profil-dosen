<?php

class Login_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }

    public function login(){
        $this->db->where(array("no_induk"=>$this->input->post('username'),
                               "password"=>md5($this->input->post('password'))));
        //return $this->db->select(array('uid', 'no_induk', 'nama', 'level'))->get("users")->row();
        return $this->db->select(array('uid', 'no_induk', 'nama', 'nama_lengkap', 'level'))->get("users")->row();

    }
}
