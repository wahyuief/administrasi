<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_notif extends MY_Model {

	private $primary_key 	= 'id';
	private $table_name 	= 'aauth_pms';
	private $field_search 	= ['id', 'sender_id', 'receiver_id', 'title', 'message', 'date_sent', 'date_read', 'pm_deleted_sender', 'pm_deleted_receiver'];

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
	                $where .= "aauth_pms.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . "aauth_pms.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
			$has_comma = strpos($q, ',') !== false;
			if($has_comma){
				$where .= "(" . "aauth_pms.".$field . " IN (" . $q . ") )";
			} else {
				$where .= "(" . "aauth_pms.".$field . " LIKE '%" . $q . "%' )";
			}
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
	                $where .= "aauth_pms.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . "aauth_pms.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
			$has_comma = strpos($q, ',') !== false;
			if($has_comma){
				$where .= "(" . "aauth_pms.".$field . " IN (" . $q . ") )";
			} else {
				$where .= "(" . "aauth_pms.".$field . " LIKE '%" . $q . "%' )";
			}
        }

        if (is_array($select_field) AND count($select_field)) {
        	$this->db->select($select_field);
        }
		
		$this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->order_by('aauth_pms.'.$this->primary_key, "DESC");
		$query = $this->db->get($this->table_name);

		return $query->result();
	}

	public function replace_data($table, $data, $key, $value)
	{
		$this->db->where($key, $value);
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	}

    public function join_avaiable() {
        return $this;
    }

    public function filter_avaiable() {
		$this->db->where('receiver_id', get_user_data('id'));
        return $this;
    }

}

/* End of file Model_aauth_pms.php */
/* Location: ./application/models/Model_aauth_pms.php */