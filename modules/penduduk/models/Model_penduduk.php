<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_penduduk extends MY_Model {

	private $primary_key 	= 'id';
	private $table_name 	= 'penduduk';
	private $field_search 	= ['nik', 'nama_lengkap', 'jenis_kelamin', 'tanggal_lahir', 'agama', 'pekerjaan', 'rt', 'rw'];

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
	                $where .= "penduduk.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . "penduduk.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . "penduduk.".$field . " LIKE '%" . $q . "%' )";
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
	                $where .= "penduduk.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . "penduduk.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . "penduduk.".$field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) AND count($select_field)) {
        	$this->db->select($select_field);
        }
		
		$this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->order_by('penduduk.'.$this->primary_key, "DESC");
		$query = $this->db->get($this->table_name);

		return $query->result();
	}

    public function join_avaiable() {
        $this->db->join('kota', 'kota.nama = penduduk.tempat_lahir', 'LEFT');
        $this->db->join('golongandarah', 'golongandarah.nama = penduduk.golongan_darah', 'LEFT');
        $this->db->join('agama', 'agama.nama = penduduk.agama', 'LEFT');
        $this->db->join('pendidikan', 'pendidikan.nama = penduduk.pendidikan_akhir', 'LEFT');
        $this->db->join('pekerjaan', 'pekerjaan.nama = penduduk.pekerjaan', 'LEFT');
        $this->db->join('statuskawin', 'statuskawin.nama = penduduk.status_perkawinan', 'LEFT');
        $this->db->join('statuskeluarga', 'statuskeluarga.nama = penduduk.status_keluarga', 'LEFT');
        
    	$this->db->select('penduduk.*,kota.nama as kota_nama,golongandarah.nama as golongandarah_nama,agama.nama as agama_nama,pendidikan.nama as pendidikan_nama,pekerjaan.nama as pekerjaan_nama,statuskawin.nama as statuskawin_nama,statuskeluarga.nama as statuskeluarga_nama');


        return $this;
    }

    public function filter_avaiable() {

		if ($this->input->get('keluarga')) {
			$this->db->where('nama_ayah', $this->input->get('keluarga'));
		}
        
        return $this;
    }

}

/* End of file Model_penduduk.php */
/* Location: ./application/models/Model_penduduk.php */