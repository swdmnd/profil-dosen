<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencarian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('pencarian_model','users');
    }

    public function index()
    {
     $this->view();
    }

    public function view($start=0)
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $prodis = $this->users->get_list_prodi();

        foreach ($prodis as $prodi) {
            $opt[$prodi] = $prodi;
        }

        $data['form_prodi'] = form_dropdown('',$opt,'','id="prodi" name="prodi" class="form-control"');
        $opt = array('' => 'Semua Prodi');
        foreach ($prodis as $prodi) {
            $opt[$prodi] = $prodi;
        }
        $data['form_prodi_select'] = form_dropdown('',$opt,'','id="prodiselect" name="prodiselect" class="form-control"');
        $config['base_url'] = site_url('pencarian/view');
        //$config['total_rows'] = $this->db->count_all('users');
        //$config['per_page'] = "10";
        $config["uri_segment"] = 3;
        //$choice = $config["total_rows"] / $config["per_page"];
        //$config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        //$users = $this->users->get_list_users();
        //$data['users'] = $users;
		    $data['pagination'] = $this->pagination->create_links();
        //$data['users'] = $this->users->get_list_users($config["per_page"], $start);
        $data['users'] = $this->users->get_list_user_awal('Teknik Sipil');
        for ($i = 0; $i < count($data['users']); ++$i) {
          $uid = $data['users'][$i]->uid;
          $data['pendidikan'][$i] = $this->users->get_list_pendidikan_by_uid($uid);
        }
        //$data['max_users'] = $this->users->get_max_users();
        $data['prodi'] = 'Teknik Sipil';


		$this->load->view('pencarians_view', $data);
    }

    public function search($start=0)
    {
      $this->load->helper('form');

      $prodis = $this->users->get_list_prodi();
      //$opt = array('' => 'Semua Prodi');
      foreach ($prodis as $prodi) {
          $opt[$prodi] = $prodi;
      }

        // get search string
        $search = ($this->input->post("prodi"))? $this->input->post("prodi") : "NIL";

        $data['form_prodi'] = form_dropdown('',$opt,$search,'id="prodi" name="prodi" class="form-control"');
        $opt = array('' => 'Semua Prodi');
        foreach ($prodis as $prodi) {
            $opt[$prodi] = $prodi;
        }
        $data['form_prodi_select'] = form_dropdown('',$opt,'','id="prodiselect" name="prodiselect" class="form-control"');


        // pagination settings
        $config = array();
        $config['base_url'] = site_url("pencarian/search/");
        $config['total_rows'] = $this->users->get_list_users_keyword($search);
        $config['per_page'] = $this->users->get_list_users_keyword($search);
        $config["uri_segment"] = 3;
        if ($config["per_page"]!=0)
        {$choice = $config["total_rows"]/$config["per_page"];}
        else {

          $choice = 0;
        }
        $config["num_links"] = floor($choice);

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        //$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        // get books list
        $data['users'] = $this->users->get_list_user($config['per_page'], $start, $search);
        for ($i = 0; $i < count($data['users']); ++$i) {
          $uid = $data['users'][$i]->uid;
          $data['pendidikan'][$i] = $this->users->get_list_pendidikan_by_uid($uid);
        }
        //$data['max_users'] = $this->users->get_max_users();

        $data['pagination'] = $this->pagination->create_links();
        $data['prodi'] = $search;
        //load view
        $this->load->view('pencarians_view',$data);
    }

    public function ajax_list()
    {
        $list = $this->users->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $dosens) {
            $no++;
            $row = array();
            $row[] = "<b>" . $no . "</b>";
            $row[] = "<b><a style='color:black' href='". base_url() . "index.php/detail/index/" . $dosens->uid . "/identitas' >" . $dosens->nama_lengkap . "</a></b>";
            $row[] = "<b><p style='color:black'>" . $dosens->prodi . "</p></b>";
            $row[] = "<b><a style='color:black' href='". base_url() . "index.php/detail/index/" . $dosens->uid . "/identitas' >" . $dosens->research_interests . "</a></b>";

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
