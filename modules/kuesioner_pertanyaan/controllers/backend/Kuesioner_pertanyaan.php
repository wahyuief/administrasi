<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Kuesioner Pertanyaan Controller
*| --------------------------------------------------------------------------
*| Kuesioner Pertanyaan site
*|
*/
class Kuesioner_pertanyaan extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_kuesioner_pertanyaan');
	}

	/**
	* show all Kuesioner Pertanyaans
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('kuesioner_pertanyaan_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['kuesioner_pertanyaans'] = $this->model_kuesioner_pertanyaan->get($filter, $field, $this->limit_page, $offset);
		$this->data['kuesioner_pertanyaan_counts'] = $this->model_kuesioner_pertanyaan->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/kuesioner_pertanyaan/index/',
			'total_rows'   => $this->model_kuesioner_pertanyaan->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Kuesioner Pertanyaan List');
		$this->render('backend/standart/administrator/kuesioner_pertanyaan/kuesioner_pertanyaan_list', $this->data);
	}
	
	/**
	* Add new kuesioner_pertanyaans
	*
	*/
	public function add()
	{
		$this->is_allowed('kuesioner_pertanyaan_add');

		$this->template->title('Kuesioner Pertanyaan New');
		$this->render('backend/standart/administrator/kuesioner_pertanyaan/kuesioner_pertanyaan_add', $this->data);
	}

	/**
	* Add New Kuesioner Pertanyaans
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('kuesioner_pertanyaan_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('tipe', 'Tipe', 'trim|required');
		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'tipe' => $this->input->post('tipe'),
				'pertanyaan' => $this->input->post('pertanyaan'),
			];

			
			$save_kuesioner_pertanyaan = $this->model_kuesioner_pertanyaan->store($save_data);

			if ($save_kuesioner_pertanyaan) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_kuesioner_pertanyaan;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/kuesioner_pertanyaan/edit/' . $save_kuesioner_pertanyaan, 'Edit Kuesioner Pertanyaan'),
						anchor('administrator/kuesioner_pertanyaan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/kuesioner_pertanyaan/edit/' . $save_kuesioner_pertanyaan, 'Edit Kuesioner Pertanyaan')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kuesioner_pertanyaan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kuesioner_pertanyaan');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Kuesioner Pertanyaans
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('kuesioner_pertanyaan_update');

		$this->data['kuesioner_pertanyaan'] = $this->model_kuesioner_pertanyaan->find($id);

		$this->template->title('Kuesioner Pertanyaan Update');
		$this->render('backend/standart/administrator/kuesioner_pertanyaan/kuesioner_pertanyaan_update', $this->data);
	}

	/**
	* Update Kuesioner Pertanyaans
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('kuesioner_pertanyaan_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('tipe', 'Tipe', 'trim|required');
		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'tipe' => $this->input->post('tipe'),
				'pertanyaan' => $this->input->post('pertanyaan'),
			];

			
			$save_kuesioner_pertanyaan = $this->model_kuesioner_pertanyaan->change($id, $save_data);

			if ($save_kuesioner_pertanyaan) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/kuesioner_pertanyaan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kuesioner_pertanyaan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kuesioner_pertanyaan');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Kuesioner Pertanyaans
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('kuesioner_pertanyaan_delete');

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
            set_message(cclang('has_been_deleted', 'kuesioner_pertanyaan'), 'success');
        } else {
            set_message(cclang('error_delete', 'kuesioner_pertanyaan'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Kuesioner Pertanyaans
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('kuesioner_pertanyaan_view');

		$this->data['kuesioner_pertanyaan'] = $this->model_kuesioner_pertanyaan->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Kuesioner Pertanyaan Detail');
		$this->render('backend/standart/administrator/kuesioner_pertanyaan/kuesioner_pertanyaan_view', $this->data);
	}
	
	/**
	* delete Kuesioner Pertanyaans
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$kuesioner_pertanyaan = $this->model_kuesioner_pertanyaan->find($id);

		
		
		return $this->model_kuesioner_pertanyaan->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('kuesioner_pertanyaan_export');

		$this->model_kuesioner_pertanyaan->export('kuesioner_pertanyaan', 'kuesioner_pertanyaan');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('kuesioner_pertanyaan_export');

		$this->model_kuesioner_pertanyaan->pdf('kuesioner_pertanyaan', 'kuesioner_pertanyaan');
	}
}


/* End of file kuesioner_pertanyaan.php */
/* Location: ./application/controllers/administrator/Kuesioner Pertanyaan.php */