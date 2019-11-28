<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pelayanan extends MY_Model {

	private $primary_key 	= 'id';
	private $table_name 	= 'pelayanan';
	private $field_search 	= ['nama', 'tipe', 'status', 'tanggal'];

	public function __construct()
	{
		$config = array(
			'primary_key' 	=> $this->primary_key,
		 	'table_name' 	=> $this->table_name,
		 	'field_search' 	=> $this->field_search,
		 );

		parent::__construct($config);
	}

	public function count_all($q = null, $field = null)
	{
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
		$field = $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
	            if ($iterasi == 1) {
	                $where .= "pelayanan.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . "pelayanan.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . "pelayanan.".$field . " LIKE '%" . $q . "%' )";
        }

		$this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
		$query = $this->db->get($this->table_name);

		return $query->num_rows();
	}

	public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
	{
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
		$field = $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
	            if ($iterasi == 1) {
	                $where .= "pelayanan.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . "pelayanan.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . "pelayanan.".$field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) AND count($select_field)) {
        	$this->db->select($select_field);
        }
		
		$this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->order_by('pelayanan.'.$this->primary_key, "DESC");
		$query = $this->db->get($this->table_name);

		return $query->result();
	}

    public function join_avaiable() {
        $this->db->join('penduduk', 'penduduk.nama_lengkap = pelayanan.nama', 'LEFT');
        $this->db->join('tipe_pelayanan', 'tipe_pelayanan.nama_pelayanan = pelayanan.tipe', 'LEFT');
        
    	$this->db->select('pelayanan.*,penduduk.nama_lengkap as penduduk_nama_lengkap,tipe_pelayanan.nama_pelayanan as tipe_pelayanan_nama_pelayanan');


        return $this;
    }

    public function filter_avaiable() {
        if ($this->aauth->is_member(2) == 1) {
			$this->db->where('rt', get_user_data('rt'));
			$this->db->where('rw', get_user_data('rw'));
		}

		if ($this->aauth->is_member(3) == 1) {
			$this->db->where('rw', get_user_data('rw'));
		}

		if ($this->aauth->is_member(6) == 1) {
			$this->db->where('nama', get_user_data('full_name'));
		}

        return $this;
	}

}

/* End of file Model_pelayanan.php */
/* Location: ./application/models/Model_pelayanan.php */