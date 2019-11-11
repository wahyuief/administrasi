<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Pelayanan Controller
*| --------------------------------------------------------------------------
*| Pelayanan site
*|
*/
class Pelayanan extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_pelayanan');
	}

	/**
	* show all Pelayanans
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('pelayanan_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['pelayanans'] = $this->model_pelayanan->get($filter, $field, $this->limit_page, $offset);
		$this->data['pelayanan_counts'] = $this->model_pelayanan->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/pelayanan/index/',
			'total_rows'   => $this->model_pelayanan->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Pelayanan List');
		$this->render('backend/standart/administrator/pelayanan/pelayanan_list', $this->data);
	}
	
	/**
	* Add new pelayanans
	*
	*/
	public function add()
	{
		$this->is_allowed('pelayanan_add');

		$this->template->title('Pelayanan New');
		$this->render('backend/standart/administrator/pelayanan/pelayanan_add', $this->data);
	}

	/**
	* Add New Pelayanans
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('pelayanan_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('nama', 'Nama Pemohon', 'trim|required');
		$this->form_validation->set_rules('tipe', 'Surat Permintaan', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama' => $this->input->post('nama'),
				'tipe' => $this->input->post('tipe'),
			];

			
			$save_pelayanan = $this->model_pelayanan->store($save_data);

			if ($save_pelayanan) {
				$this->aauth->send_pms(get_user_data('id'), 2, "PERMINTAAN-".$save_pelayanan, "Terdapat Permintaan ".$save_data['tipe']." Untuk ".$save_data['nama']." Dari RT ".get_user_data('rt'));
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_pelayanan;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/pelayanan/edit/' . $save_pelayanan, 'Edit Pelayanan'),
						anchor('administrator/pelayanan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/pelayanan/edit/' . $save_pelayanan, 'Edit Pelayanan')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/pelayanan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/pelayanan');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Pelayanans
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('pelayanan_update');

		$this->data['pelayanan'] = $this->model_pelayanan->find($id);

		$this->template->title('Pelayanan Update');
		$this->render('backend/standart/administrator/pelayanan/pelayanan_update', $this->data);
	}

	/**
	* Update Pelayanans
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('pelayanan_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('nama', 'Nama Pemohon', 'trim|required');
		$this->form_validation->set_rules('tipe', 'Surat Permintaan', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama' => $this->input->post('nama'),
				'tipe' => $this->input->post('tipe'),
				'status' => $this->input->post('status'),
			];

			
			$save_pelayanan = $this->model_pelayanan->change($id, $save_data);

			if ($save_pelayanan) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/pelayanan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/pelayanan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/pelayanan');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Pelayanans
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('pelayanan_delete');

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
            set_message(cclang('has_been_deleted', 'pelayanan'), 'success');
        } else {
            set_message(cclang('error_delete', 'pelayanan'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Pelayanans
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('pelayanan_view');

		$this->data['pelayanan'] = $this->model_pelayanan->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Pelayanan Detail');
		$this->render('backend/standart/administrator/pelayanan/pelayanan_view', $this->data);
	}
	
	/**
	* delete Pelayanans
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$pelayanan = $this->model_pelayanan->find($id);

		
		
		return $this->model_pelayanan->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('pelayanan_export');

		$this->model_pelayanan->export('pelayanan', 'pelayanan');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('pelayanan_export');

		$this->model_pelayanan->pdf('pelayanan', 'pelayanan');
	}
}


/* End of file pelayanan.php */
/* Location: ./application/controllers/administrator/Pelayanan.php */