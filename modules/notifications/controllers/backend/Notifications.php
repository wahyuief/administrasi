<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| User Controller
*| --------------------------------------------------------------------------
*| user site
*|
*/
class Notifications extends Admin
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_notif');
	}

	public function index($offset = 0)
	{
		// $this->limit_page = 5;

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		if ($this->uri->segment(4) == 'read') {
			$this->db->where('date_read !=', NULL);
		} else if ($this->uri->segment(4) == 'unread') {
			$this->db->where('date_read', NULL);
		}

		$this->data['content_title'] = "Notifications";
		$this->data['content_sub_title'] = "Please check your new notifications.";
		$this->data['content_page'] = 'backend/standart/administrator/notifications/notifications';
		$this->data['pms'] = $this->model_notif->get($filter, $field, $this->limit_page, $offset);
		if ($this->uri->segment(4) == 'read') {
			$this->db->where('date_read !=', NULL);
		} else if ($this->uri->segment(4) == 'unread') {
			$this->db->where('date_read', NULL);
		}
		$this->data['pms_counts'] = $this->model_notif->count_all($filter, $field);

		$config = [
			'base_url'     => base_url().'administrator/notifications/index/',
			'total_rows'   => $this->aauth->count_pms(),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Notifications');
		$this->render('backend/standart/administrator/notifications/notifications', $this->data);
	}

	public function view($id)
	{
		$pm = $this->aauth->get_pm($id);
		$vlq_name = explode('-',$pm->title)[0];
		$vlq_id = explode('-',$pm->title)[1];

		if ($vlq_name == 'LAYANAN') {
			redirect('administrator/pelayanan/index?f=id&q='.$vlq_id, 'refresh');
		} else {
			redirect('administrator/dashboard', 'refresh');
		}

	}

	public function delete($pm_id)
	{
		if ($this->aauth->delete_pm($pm_id, get_user_data('id'))) {
			redirect('administrator/notifications');
		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/administrator/User.php */
