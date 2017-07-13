<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Pencarian extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pencarian_model','users');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');
         
        $prodis = $this->users->get_list_prodi();
 
        $opt = array('' => 'Semua Prodi');
        foreach ($prodis as $prodi) {
            $opt[$prodi] = $prodi;
        }
 
        $data['form_prodi'] = form_dropdown('',$opt,'','id="prodi" class="form-control"');
        $this->load->view('pencarians_view', $data);
    }
 
    public function ajax_list()
    {
        $list = $this->users->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $dosens) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = "<a href='". base_url() . "index.php/detail/index/" . $dosens->uid . "' >" . $dosens->nama_lengkap . "</a>";
            $row[] = $dosens->prodi;
            $row[] = "<a href='". base_url() . "index.php/detail/index/" . $dosens->uid . "' >" . $dosens->research_interests . "</a>";
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->users->count_all(),
                        "recordsFiltered" => $this->users->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
}