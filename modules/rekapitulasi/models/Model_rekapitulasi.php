<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_rekapitulasi extends MY_Model {

	private $primary_key 	= 'id';
	private $table_name 	= 'kuesioner';
	private $field_search 	= ['user', 'pertanyaan', 'jawaban_persepsi', 'jawaban_harapan'];

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
	                $where .= "kuesioner.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . "kuesioner.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . "kuesioner.".$field . " LIKE '%" . $q . "%' )";
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
	                $where .= "kuesioner.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . "kuesioner.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . "kuesioner.".$field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) AND count($select_field)) {
        	$this->db->select($select_field);
        }
		
		$this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->order_by('kuesioner.'.$this->primary_key, "DESC");
		$query = $this->db->get($this->table_name);

		return $query->result();
	}

    public function join_avaiable() {
        $this->db->join('kuesioner_pertanyaan', 'kuesioner_pertanyaan.id = kuesioner.pertanyaan', 'LEFT');
        
    	$this->db->select('kuesioner.*,kuesioner_pertanyaan.pertanyaan as kuesioner_pertanyaan_pertanyaan,kuesioner_pertanyaan.id as pertanyaan_id,kuesioner_pertanyaan.tipe as pertanyaan_tipe');


        return $this;
    }

    public function filter_avaiable() {
        
        return $this;
	}
	
	public function group_nama() {
		$this->db->group_by('user');
		return $this;
	}

	public function group_pertanyaan() {
		$this->db->group_by('pertanyaan');
		return $this;
	}

	public function group_tipe() {
		$this->db->group_by('pertanyaan_tipe');
		return $this;
	}

}

/* End of file Model_kuesioner.php */
/* Location: ./application/models/Model_kuesioner.php */