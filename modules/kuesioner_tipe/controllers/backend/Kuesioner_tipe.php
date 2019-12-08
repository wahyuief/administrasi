<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Kuesioner Tipe Controller
*| --------------------------------------------------------------------------
*| Kuesioner Tipe site
*|
*/
class Kuesioner_tipe extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_kuesioner_tipe');
	}

	/**
	* show all Kuesioner Tipes
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('kuesioner_tipe_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['kuesioner_tipes'] = $this->model_kuesioner_tipe->get($filter, $field, $this->limit_page, $offset);
		$this->data['kuesioner_tipe_counts'] = $this->model_kuesioner_tipe->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/kuesioner_tipe/index/',
			'total_rows'   => $this->model_kuesioner_tipe->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Kuesioner Tipe List');
		$this->render('backend/standart/administrator/kuesioner_tipe/kuesioner_tipe_list', $this->data);
	}
	
	/**
	* Add new kuesioner_tipes
	*
	*/
	public function add()
	{
		$this->is_allowed('kuesioner_tipe_add');

		$this->template->title('Kuesioner Tipe New');
		$this->render('backend/standart/administrator/kuesioner_tipe/kuesioner_tipe_add', $this->data);
	}

	/**
	* Add New Kuesioner Tipes
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('kuesioner_tipe_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama' => $this->input->post('nama'),
			];

			
			$save_kuesioner_tipe = $this->model_kuesioner_tipe->store($save_data);

			if ($save_kuesioner_tipe) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_kuesioner_tipe;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/kuesioner_tipe/edit/' . $save_kuesioner_tipe, 'Edit Kuesioner Tipe'),
						anchor('administrator/kuesioner_tipe', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/kuesioner_tipe/edit/' . $save_kuesioner_tipe, 'Edit Kuesioner Tipe')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kuesioner_tipe');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kuesioner_tipe');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Kuesioner Tipes
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('kuesioner_tipe_update');

		$this->data['kuesioner_tipe'] = $this->model_kuesioner_tipe->find($id);

		$this->template->title('Kuesioner Tipe Update');
		$this->render('backend/standart/administrator/kuesioner_tipe/kuesioner_tipe_update', $this->data);
	}

	/**
	* Update Kuesioner Tipes
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('kuesioner_tipe_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama' => $this->input->post('nama'),
			];

			
			$save_kuesioner_tipe = $this->model_kuesioner_tipe->change($id, $save_data);

			if ($save_kuesioner_tipe) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/kuesioner_tipe', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kuesioner_tipe');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kuesioner_tipe');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Kuesioner Tipes
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('kuesioner_tipe_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'kuesioner_tipe'), 'success');
        } else {
            set_message(cclang('error_delete', 'kuesioner_tipe'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Kuesioner Tipes
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('kuesioner_tipe_view');

		$this->data['kuesioner_tipe'] = $this->model_kuesioner_tipe->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Kuesioner Tipe Detail');
		$this->render('backend/standart/administrator/kuesioner_tipe/kuesioner_tipe_view', $this->data);
	}
	
	/**
	* delete Kuesioner Tipes
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$kuesioner_tipe = $this->model_kuesioner_tipe->find($id);

		
		
		return $this->model_kuesioner_tipe->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('kuesioner_tipe_export');

		$this->model_kuesioner_tipe->export('kuesioner_tipe', 'kuesioner_tipe');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('kuesioner_tipe_export');

		$this->model_kuesioner_tipe->pdf('kuesioner_tipe', 'kuesioner_tipe');
	}
}


/* End of file kuesioner_tipe.php */
/* Location: ./application/controllers/administrator/Kuesioner Tipe.php */