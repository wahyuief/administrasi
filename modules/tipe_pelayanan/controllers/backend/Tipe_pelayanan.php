<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tipe Pelayanan Controller
*| --------------------------------------------------------------------------
*| Tipe Pelayanan site
*|
*/
class Tipe_pelayanan extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tipe_pelayanan');
	}

	/**
	* show all Tipe Pelayanans
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tipe_pelayanan_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tipe_pelayanans'] = $this->model_tipe_pelayanan->get($filter, $field, $this->limit_page, $offset);
		$this->data['tipe_pelayanan_counts'] = $this->model_tipe_pelayanan->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/tipe_pelayanan/index/',
			'total_rows'   => $this->model_tipe_pelayanan->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Tipe Pelayanan List');
		$this->render('backend/standart/administrator/tipe_pelayanan/tipe_pelayanan_list', $this->data);
	}
	
	/**
	* Add new tipe_pelayanans
	*
	*/
	public function add()
	{
		$this->is_allowed('tipe_pelayanan_add');

		$this->template->title('Tipe Pelayanan New');
		$this->render('backend/standart/administrator/tipe_pelayanan/tipe_pelayanan_add', $this->data);
	}

	/**
	* Add New Tipe Pelayanans
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tipe_pelayanan_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('nama_pelayanan', 'Nama Pelayanan', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_pelayanan' => $this->input->post('nama_pelayanan'),
				'deskripsi' => $this->input->post('deskripsi'),
			];

			
			$save_tipe_pelayanan = $this->model_tipe_pelayanan->store($save_data);

			if ($save_tipe_pelayanan) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tipe_pelayanan;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/tipe_pelayanan/edit/' . $save_tipe_pelayanan, 'Edit Tipe Pelayanan'),
						anchor('administrator/tipe_pelayanan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/tipe_pelayanan/edit/' . $save_tipe_pelayanan, 'Edit Tipe Pelayanan')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tipe_pelayanan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tipe_pelayanan');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Tipe Pelayanans
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tipe_pelayanan_update');

		$this->data['tipe_pelayanan'] = $this->model_tipe_pelayanan->find($id);

		$this->template->title('Tipe Pelayanan Update');
		$this->render('backend/standart/administrator/tipe_pelayanan/tipe_pelayanan_update', $this->data);
	}

	/**
	* Update Tipe Pelayanans
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tipe_pelayanan_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('nama_pelayanan', 'Nama Pelayanan', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_pelayanan' => $this->input->post('nama_pelayanan'),
				'deskripsi' => $this->input->post('deskripsi'),
			];

			
			$save_tipe_pelayanan = $this->model_tipe_pelayanan->change($id, $save_data);

			if ($save_tipe_pelayanan) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/tipe_pelayanan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tipe_pelayanan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tipe_pelayanan');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Tipe Pelayanans
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tipe_pelayanan_delete');

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
            set_message(cclang('has_been_deleted', 'tipe_pelayanan'), 'success');
        } else {
            set_message(cclang('error_delete', 'tipe_pelayanan'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Tipe Pelayanans
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tipe_pelayanan_view');

		$this->data['tipe_pelayanan'] = $this->model_tipe_pelayanan->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Tipe Pelayanan Detail');
		$this->render('backend/standart/administrator/tipe_pelayanan/tipe_pelayanan_view', $this->data);
	}
	
	/**
	* delete Tipe Pelayanans
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tipe_pelayanan = $this->model_tipe_pelayanan->find($id);

		
		
		return $this->model_tipe_pelayanan->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tipe_pelayanan_export');

		$this->model_tipe_pelayanan->export('tipe_pelayanan', 'tipe_pelayanan');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tipe_pelayanan_export');

		$this->model_tipe_pelayanan->pdf('tipe_pelayanan', 'tipe_pelayanan');
	}
}


/* End of file tipe_pelayanan.php */
/* Location: ./application/controllers/administrator/Tipe Pelayanan.php */