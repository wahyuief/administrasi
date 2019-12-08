<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Kuesioner Controller
*| --------------------------------------------------------------------------
*| Kuesioner site
*|
*/
class Kuesioner extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_kuesioner');
	}

	/**
	* show all Kuesioners
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('kuesioner_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['kuesioners'] = $this->model_kuesioner->group_nama()->get($filter, $field, $this->limit_page, $offset);
		$this->data['kuesioner_counts'] = $this->model_kuesioner->group_nama()->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/kuesioner/index/',
			'total_rows'   => $this->model_kuesioner->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Kuesioner List');
		$this->render('backend/standart/administrator/kuesioner/kuesioner_list_nama', $this->data);
	}

	public function nama($offset = 0)
	{
		$this->is_allowed('kuesioner_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');
		$user 	= $this->input->get('user');

		$this->db->where('user', $user);
		$this->data['kuesioners'] = $this->model_kuesioner->get($filter, $field, $this->limit_page, $offset);
		$this->db->where('user', $user);
		$this->data['kuesioner_counts'] = $this->model_kuesioner->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/kuesioner/index/',
			'total_rows'   => $this->model_kuesioner->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Kuesioner List');
		$this->render('backend/standart/administrator/kuesioner/kuesioner_list', $this->data);
	}
	
	/**
	* Add new kuesioners
	*
	*/
	public function add()
	{
		$this->is_allowed('kuesioner_add');

		$this->template->title('Kuesioner New');
		$this->render('backend/standart/administrator/kuesioner/kuesioner_jawab', $this->data);
	}


	public function simpan_jawaban()
	{
		$user = get_user_data('id');
		$pertanyaan = $this->input->get('pertanyaan');
		$jawaban = $this->input->get('jawaban');
		$exist = db_get_data('kuesioner', ['user'=>$user, 'pertanyaan'=>$pertanyaan]);

		$save_data = array(
			'user' => $user,
			'pertanyaan' => $pertanyaan,
			'jawaban' => $jawaban
		);

		if ($exist) {
			$this->db->where([
				'user' => $user,
				'pertanyaan' => $pertanyaan
			]);
			$update = $this->db->update('kuesioner', $save_data);
		} else {
			$insert = $this->model_kuesioner->store($save_data);
		}
		
		redirect('administrator/kuesioner/add','refresh');
		
	}
	/**
	* Add New Kuesioners
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('kuesioner_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('jawaban', 'Jawaban', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'user' => $this->input->post('user'),
				'pertanyaan' => $this->input->post('pertanyaan'),
				'jawaban' => $this->input->post('jawaban'),
			];

			
			$save_kuesioner = $this->model_kuesioner->store($save_data);

			if ($save_kuesioner) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_kuesioner;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/kuesioner/edit/' . $save_kuesioner, 'Edit Kuesioner'),
						anchor('administrator/kuesioner', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/kuesioner/edit/' . $save_kuesioner, 'Edit Kuesioner')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kuesioner');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kuesioner');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Kuesioners
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('kuesioner_update');

		$this->data['kuesioner'] = $this->model_kuesioner->find($id);

		$this->template->title('Kuesioner Update');
		$this->render('backend/standart/administrator/kuesioner/kuesioner_update', $this->data);
	}

	/**
	* Update Kuesioners
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('kuesioner_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('jawaban', 'Jawaban', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'user' => $this->input->post('user'),
				'pertanyaan' => $this->input->post('pertanyaan'),
				'jawaban' => $this->input->post('jawaban'),
			];

			
			$save_kuesioner = $this->model_kuesioner->change($id, $save_data);

			if ($save_kuesioner) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/kuesioner', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kuesioner');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kuesioner');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Kuesioners
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('kuesioner_delete');

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
            set_message(cclang('has_been_deleted', 'kuesioner'), 'success');
        } else {
            set_message(cclang('error_delete', 'kuesioner'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Kuesioners
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('kuesioner_view');

		$this->data['kuesioner'] = $this->model_kuesioner->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Kuesioner Detail');
		$this->render('backend/standart/administrator/kuesioner/kuesioner_view', $this->data);
	}
	
	/**
	* delete Kuesioners
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$kuesioner = $this->model_kuesioner->find($id);

		
		
		return $this->model_kuesioner->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('kuesioner_export');

		$this->model_kuesioner->export('kuesioner', 'kuesioner');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('kuesioner_export');

		$this->model_kuesioner->pdf('kuesioner', 'kuesioner');
	}
}


/* End of file kuesioner.php */
/* Location: ./application/controllers/administrator/Kuesioner.php */