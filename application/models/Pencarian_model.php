<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencarian_model extends CI_Model {

    var $table = 'users';
	  var $tableprodi = 'prodi';
    var $column_order = array(null, 'nama_lengkap','prodi','research_interests','uid'); //set column field database for datatable orderable
    var $column_search = array('nama_lengkap','prodi','research_interests','uid'); //set column field database for datatable searchable
    var $order = array('uid' => 'asc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {

        //add custom filter here
        $this->db->where('level !=','admin');
        if($this->input->post('nama_lengkap'))
        {
            $this->db->like('nama_lengkap', $this->input->post('nama_lengkap'));
        }
        if($this->input->post('prodi'))
        {
            $this->db->like('prodi', $this->input->post('prodi'));
        }
        if($this->input->post('research_interests'))
        {
			       $this->db->like('research_interests', $this->input->post('research_interests'));
		    }
        $this->db->from($this->table);

        $order_gelar = sprintf('FIELD (users.gelar_akademik, "%s","%s","%s","%s")', "Profesor", "Doktor", "Kandidat Doktor", "Magister");
        $this->db->order_by($order_gelar);
        $this->db->order_by("nidn", "asc");

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if(isset($_POST['search']['value'])) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }

    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_list_prodi()
    {
        $this->db->select('nm_prodi');
        $this->db->from($this->tableprodi);
        $this->db->order_by('id_prodi','asc');
        $query = $this->db->get();
        $result = $query->result();

        $prodis = array();
        foreach ($result as $row)
        {
            $prodis[] = $row->nm_prodi;
        }
        return $prodis;
    }

    public function get_list_users($limit,$start)
    {
        $this->db->select('uid,nama_lengkap,prodi,research_interests,foto,deskripsi_singkat');
        $this->db->from($this->table);
        $this->db->where('level <>','admin');
        $this->db->order_by('nidn','asc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_max_users()
    {
        $this->db->select('count(uid) as jumlah');
        $this->db->from($this->table);
        $this->db->where('level <>','admin');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function get_list_user($limit, $start, $keyword = NULL)
    {
        if ($keyword == "NIL") $keyword = "";
        $order_gelar = sprintf('FIELD (users.gelar_akademik, "%s","%s","%s","%s")', "Profesor", "Doktor", "Kandidat Doktor", "Magister");
        $sql = "select * from users where level!='admin' and prodi like '%$keyword%' order by " . $order_gelar . ", nidn asc limit " . $start . ", " . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_list_user_awal($keyword = NULL)
    {
        if ($keyword == "NIL") $keyword = "";
        $order_gelar = sprintf('FIELD (users.gelar_akademik, "%s","%s","%s","%s")', "Profesor", "Doktor", "Kandidat Doktor", "Magister");
        $sql = "select * from users where level!='admin' and prodi like '%$keyword%' order by " . $order_gelar . ", nidn asc";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function get_list_users_keyword($keyword = NULL)
       {
           if ($keyword == "NIL") $keyword = "";
           $order_gelar = sprintf('FIELD (users.gelar_akademik, "%s","%s","%s","%s")', "Profesor", "Doktor", "Kandidat Doktor", "Magister");

           $sql = "select * from users where level!='admin' and prodi like '%$keyword%' order by " . $order_gelar . ", nidn asc";
           $query = $this->db->query($sql);

           return $query->num_rows();
       }

       public function get_list_pendidikan_by_uid($uid = NULL)
       {
           if ($uid == "NIL") $uid = "";
           $sql = "select * from pendidikan where uid = '$uid'";
           $query = $this->db->query($sql);
           return $query->result();
       }
}
