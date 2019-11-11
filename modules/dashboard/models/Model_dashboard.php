<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Model_dashboard extends MY_Model {

	private $primary_key 	= 'id';
	private $table_name 	= 'aauth_users';
	private $field_search 	= array('email', 'username', 'full_name');

	public function __construct()
	{
		$config = array(
			'primary_key' 	=> $this->primary_key,
		 	'table_name' 	=> $this->table_name,
		 	'field_search' 	=> $this->field_search,
		 );

		parent::__construct($config);
	}

	public function count_all($q = '', $field = '')
	{
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
		$field = $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
	            if ($iterasi == 1) {
	                $where .= "(" . $field . " LIKE '%" . $q . "%' ";
	            } else if ($iterasi == $num) {
	                $where .= "OR " . $field . " LIKE '%" . $q . "%') ";
	            } else {
	                $where .= "OR " . $field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }
        } else {
        	$where .= "(" . $field . " LIKE '%" . $q . "%' )";
        }

        $this->db->where($where);
		$query = $this->db->get($this->table_name);

		return $query->num_rows();
	}

	public function get($q = '', $field = '', $limit = 0, $offset = 0)
	{
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
		$field = $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
	            if ($iterasi == 1) {
	                $where .= "(" . $field . " LIKE '%" . $q . "%' ";
	            } else if ($iterasi == $num) {
	                $where .= "OR " . $field . " LIKE '%" . $q . "%') ";
	            } else {
	                $where .= "OR " . $field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }
        } else {
        	$where .= "(" . $field . " LIKE '%" . $q . "%' )";
        }

        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->order_by($this->primary_key, "ASC");
		$query = $this->db->get($this->table_name);

		return $query->result();
	}

	public function hitung($table, $field, $user_id = null, $reverse = false, $pks = false) {
		if ($reverse == true) {
			$this->db->group_by($field);
		}
		if ($user_id != null) {
			$this->db->where($field, $user_id);
		}

		if ($pks == 'non') {
			$this->db->where('ks_jenis_kerjasama_id !=', 3);
		} else if ($pks == 'pks') {
			$this->db->where('ks_jenis_kerjasama_id', 3);
		}

		$query = $this->db->get($table)->result_array();
		return count($query);
	}

}


/* End of file Model_user.php */
/* Location: ./application/models/Model_user.php */