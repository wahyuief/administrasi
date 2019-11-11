<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Dashboard Controller
*| --------------------------------------------------------------------------
*| For see your board
*|
*/
class Dashboard extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_dashboard');
	}

	public function index($offset = 0)
	{
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/', 'refresh');
		}
		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');
		$this->limit_page = 50;
		
		$this->data['users'] = $this->model_dashboard->get($filter, $field, $this->limit_page, $offset);
		$this->data['user_counts'] = $this->model_dashboard->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/dashboard/index/',
			'total_rows'   => $this->model_dashboard->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		$this->cc_html->registerScriptFile(BASE_URL.'asset/js/pagination.min.js');
		$this->render('backend/standart/administrator/dashboard/dashboard_view', $this->data);
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/administrator/Dashboard.php */