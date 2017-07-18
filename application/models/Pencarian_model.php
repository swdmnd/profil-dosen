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
        $this->db->order_by('nm_prodi','asc');
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
        $this->db->order_by('nama_lengkap','asc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

}
