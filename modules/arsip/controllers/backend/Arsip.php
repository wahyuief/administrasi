<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Data Arsip Controller
*| --------------------------------------------------------------------------
*| Data Arsip site
*|
*/
class Arsip extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_arsip');
	}

	/**
	* show all Data Arsips
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('arsip_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['arsips'] = $this->model_arsip->get($filter, $field, $this->limit_page, $offset);
		$this->data['arsip_counts'] = $this->model_arsip->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/arsip/index/',
			'total_rows'   => $this->model_arsip->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Data Arsip List');
		$this->render('backend/standart/administrator/arsip/arsip_list', $this->data);
	}
	
	/**
	* Add new arsips
	*
	*/
	public function add()
	{
		$this->is_allowed('arsip_add');

		$this->template->title('Data Arsip New');
		$this->render('backend/standart/administrator/arsip/arsip_add', $this->data);
	}

	/**
	* Add New Data Arsips
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('arsip_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('arsip_ktp_name', 'Kartu Tanda Penduduk', 'trim|required');
		$this->form_validation->set_rules('arsip_kk_name', 'Kartu Keluarga', 'trim|required');
		$this->form_validation->set_rules('arsip_foto_name[]', 'Foto Formal (2x3, 3x4, 4x6)', 'trim|required');
		

		if ($this->form_validation->run()) {
			$arsip_ktp_uuid = $this->input->post('arsip_ktp_uuid');
			$arsip_ktp_name = $this->input->post('arsip_ktp_name');
			$arsip_kk_uuid = $this->input->post('arsip_kk_uuid');
			$arsip_kk_name = $this->input->post('arsip_kk_name');
		
			$save_data = [
				'nama' => $this->input->post('nama'),
			];

			if (!is_dir(FCPATH . '/uploads/arsip/')) {
				mkdir(FCPATH . '/uploads/arsip/');
			}

			if (!empty($arsip_ktp_name)) {
				$arsip_ktp_name_copy = date('YmdHis') . '-' . $arsip_ktp_name;

				rename(FCPATH . 'uploads/tmp/' . $arsip_ktp_uuid . '/' . $arsip_ktp_name, 
						FCPATH . 'uploads/arsip/' . $arsip_ktp_name_copy);

				if (!is_file(FCPATH . '/uploads/arsip/' . $arsip_ktp_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['ktp'] = $arsip_ktp_name_copy;
			}
		
			if (!empty($arsip_kk_name)) {
				$arsip_kk_name_copy = date('YmdHis') . '-' . $arsip_kk_name;

				rename(FCPATH . 'uploads/tmp/' . $arsip_kk_uuid . '/' . $arsip_kk_name, 
						FCPATH . 'uploads/arsip/' . $arsip_kk_name_copy);

				if (!is_file(FCPATH . '/uploads/arsip/' . $arsip_kk_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['kk'] = $arsip_kk_name_copy;
			}
		
			if (count((array) $this->input->post('arsip_foto_name'))) {
				foreach ((array) $_POST['arsip_foto_name'] as $idx => $file_name) {
					$arsip_foto_name_copy = date('YmdHis') . '-' . $file_name;

					rename(FCPATH . 'uploads/tmp/' . $_POST['arsip_foto_uuid'][$idx] . '/' .  $file_name, 
							FCPATH . 'uploads/arsip/' . $arsip_foto_name_copy);

					$listed_image[] = $arsip_foto_name_copy;

					if (!is_file(FCPATH . '/uploads/arsip/' . $arsip_foto_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file'
							]);
						exit;
					}
				}

				$save_data['foto'] = implode($listed_image, ',');
			}
		
			
			$save_arsip = $this->model_arsip->store($save_data);

			if ($save_arsip) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_arsip;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/arsip/edit/' . $save_arsip, 'Edit Data Arsip'),
						anchor('administrator/arsip', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/arsip/edit/' . $save_arsip, 'Edit Data Arsip')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/arsip');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/arsip');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Data Arsips
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('arsip_update');

		$this->data['arsip'] = $this->model_arsip->find($id);

		$this->template->title('Data Arsip Update');
		$this->render('backend/standart/administrator/arsip/arsip_update', $this->data);
	}

	/**
	* Update Data Arsips
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('arsip_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('arsip_ktp_name', 'Kartu Tanda Penduduk', 'trim|required');
		$this->form_validation->set_rules('arsip_kk_name', 'Kartu Keluarga', 'trim|required');
		$this->form_validation->set_rules('arsip_foto_name[]', 'Foto Formal (2x3, 3x4, 4x6)', 'trim|required');
		
		if ($this->form_validation->run()) {
			$arsip_ktp_uuid = $this->input->post('arsip_ktp_uuid');
			$arsip_ktp_name = $this->input->post('arsip_ktp_name');
			$arsip_kk_uuid = $this->input->post('arsip_kk_uuid');
			$arsip_kk_name = $this->input->post('arsip_kk_name');
		
			$save_data = [
				'nama' => $this->input->post('nama'),
			];

			if (!is_dir(FCPATH . '/uploads/arsip/')) {
				mkdir(FCPATH . '/uploads/arsip/');
			}

			if (!empty($arsip_ktp_uuid)) {
				$arsip_ktp_name_copy = date('YmdHis') . '-' . $arsip_ktp_name;

				rename(FCPATH . 'uploads/tmp/' . $arsip_ktp_uuid . '/' . $arsip_ktp_name, 
						FCPATH . 'uploads/arsip/' . $arsip_ktp_name_copy);

				if (!is_file(FCPATH . '/uploads/arsip/' . $arsip_ktp_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['ktp'] = $arsip_ktp_name_copy;
			}
		
			if (!empty($arsip_kk_uuid)) {
				$arsip_kk_name_copy = date('YmdHis') . '-' . $arsip_kk_name;

				rename(FCPATH . 'uploads/tmp/' . $arsip_kk_uuid . '/' . $arsip_kk_name, 
						FCPATH . 'uploads/arsip/' . $arsip_kk_name_copy);

				if (!is_file(FCPATH . '/uploads/arsip/' . $arsip_kk_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['kk'] = $arsip_kk_name_copy;
			}
		
			$listed_image = [];
			if (count((array) $this->input->post('arsip_foto_name'))) {
				foreach ((array) $_POST['arsip_foto_name'] as $idx => $file_name) {
					if (isset($_POST['arsip_foto_uuid'][$idx]) AND !empty($_POST['arsip_foto_uuid'][$idx])) {
						$arsip_foto_name_copy = date('YmdHis') . '-' . $file_name;

						rename(FCPATH . 'uploads/tmp/' . $_POST['arsip_foto_uuid'][$idx] . '/' .  $file_name, 
								FCPATH . 'uploads/arsip/' . $arsip_foto_name_copy);

						$listed_image[] = $arsip_foto_name_copy;

						if (!is_file(FCPATH . '/uploads/arsip/' . $arsip_foto_name_copy)) {
							echo json_encode([
								'success' => false,
								'message' => 'Error uploading file'
								]);
							exit;
						}
					} else {
						$listed_image[] = $file_name;
					}
				}
			}
			
			$save_data['foto'] = implode($listed_image, ',');
		
			
			$save_arsip = $this->model_arsip->change($id, $save_data);

			if ($save_arsip) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/arsip', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/arsip');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/arsip');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}

		/**
	* Update view Data Arsips
	*
	* @var $id String
	*/
	public function edit_arsip_pribadi()
	{
		$this->is_allowed('edit_arsip_pribadi');
		$nama = $this->aauth->get_user()->full_name;
		$this->data['arsip'] = db_get_data('arsip', ['nama'=>$nama]);

		$this->template->title('Data Arsip Pribadi');
		$this->render('backend/standart/administrator/arsip/edit_arsip_pribadi', $this->data);
	}

	/**
	* Update Data Arsips
	*
	* @var $id String
	*/
	public function edit_arsip_pribadi_save()
	{
		if (!$this->is_allowed('edit_arsip_pribadi', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$nama = $this->input->get('nama');
		$id = db_get_data('arsip', ['nama'=>$nama])->id;
		
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('arsip_ktp_name', 'Kartu Tanda Penduduk', 'trim|required');
		$this->form_validation->set_rules('arsip_kk_name', 'Kartu Keluarga', 'trim|required');
		$this->form_validation->set_rules('arsip_foto_name[]', 'Foto Formal (2x3, 3x4, 4x6)', 'trim|required');
		
		if ($this->form_validation->run()) {
			$arsip_ktp_uuid = $this->input->post('arsip_ktp_uuid');
			$arsip_ktp_name = $this->input->post('arsip_ktp_name');
			$arsip_kk_uuid = $this->input->post('arsip_kk_uuid');
			$arsip_kk_name = $this->input->post('arsip_kk_name');
		
			$save_data = [
				'nama' => $this->input->post('nama'),
			];

			if (!is_dir(FCPATH . '/uploads/arsip/')) {
				mkdir(FCPATH . '/uploads/arsip/');
			}

			if (!empty($arsip_ktp_uuid)) {
				$arsip_ktp_name_copy = date('YmdHis') . '-' . $arsip_ktp_name;

				rename(FCPATH . 'uploads/tmp/' . $arsip_ktp_uuid . '/' . $arsip_ktp_name, 
						FCPATH . 'uploads/arsip/' . $arsip_ktp_name_copy);

				if (!is_file(FCPATH . '/uploads/arsip/' . $arsip_ktp_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['ktp'] = $arsip_ktp_name_copy;
			}
		
			if (!empty($arsip_kk_uuid)) {
				$arsip_kk_name_copy = date('YmdHis') . '-' . $arsip_kk_name;

				rename(FCPATH . 'uploads/tmp/' . $arsip_kk_uuid . '/' . $arsip_kk_name, 
						FCPATH . 'uploads/arsip/' . $arsip_kk_name_copy);

				if (!is_file(FCPATH . '/uploads/arsip/' . $arsip_kk_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['kk'] = $arsip_kk_name_copy;
			}
		
			$listed_image = [];
			if (count((array) $this->input->post('arsip_foto_name'))) {
				foreach ((array) $_POST['arsip_foto_name'] as $idx => $file_name) {
					if (isset($_POST['arsip_foto_uuid'][$idx]) AND !empty($_POST['arsip_foto_uuid'][$idx])) {
						$arsip_foto_name_copy = date('YmdHis') . '-' . $file_name;

						rename(FCPATH . 'uploads/tmp/' . $_POST['arsip_foto_uuid'][$idx] . '/' .  $file_name, 
								FCPATH . 'uploads/arsip/' . $arsip_foto_name_copy);

						$listed_image[] = $arsip_foto_name_copy;

						if (!is_file(FCPATH . '/uploads/arsip/' . $arsip_foto_name_copy)) {
							echo json_encode([
								'success' => false,
								'message' => 'Error uploading file'
								]);
							exit;
						}
					} else {
						$listed_image[] = $file_name;
					}
				}
			}
			
			$save_data['foto'] = implode($listed_image, ',');
			
			$save_arsip = $this->model_arsip->change($id, $save_data);

			if ($save_arsip) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/arsip', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/arsip');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/arsip');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Data Arsips
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('arsip_delete');

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
            set_message(cclang('has_been_deleted', 'arsip'), 'success');
        } else {
            set_message(cclang('error_delete', 'arsip'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Data Arsips
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('arsip_view');

		$this->data['arsip'] = $this->model_arsip->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Data Arsip Detail');
		$this->render('backend/standart/administrator/arsip/arsip_view', $this->data);
	}
	
	/**
	* delete Data Arsips
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$arsip = $this->model_arsip->find($id);

		if (!empty($arsip->ktp)) {
			$path = FCPATH . '/uploads/arsip/' . $arsip->ktp;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		if (!empty($arsip->kk)) {
			$path = FCPATH . '/uploads/arsip/' . $arsip->kk;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		if (!empty($arsip->foto)) {
			foreach ((array) explode(',', $arsip->foto) as $filename) {
				$path = FCPATH . '/uploads/arsip/' . $filename;

				if (is_file($path)) {
					$delete_file = unlink($path);
				}
			}
		}
		
		return $this->model_arsip->remove($id);
	}
	
	/**
	* Upload Image Data Arsip	* 
	* @return JSON
	*/
	public function upload_ktp_file()
	{
		if (!$this->is_allowed('arsip_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'arsip',
			'allowed_types' => 'jpg|jpeg|png',
		]);
	}

	/**
	* Delete Image Data Arsip	* 
	* @return JSON
	*/
	public function delete_ktp_file($uuid)
	{
		if (!$this->is_allowed('arsip_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'ktp', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'arsip',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/arsip/'
        ]);
	}

	/**
	* Get Image Data Arsip	* 
	* @return JSON
	*/
	public function get_ktp_file($id)
	{
		if (!$this->is_allowed('arsip_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$arsip = $this->model_arsip->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'ktp', 
            'table_name'        => 'arsip',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/arsip/',
            'delete_endpoint'   => 'administrator/arsip/delete_ktp_file'
        ]);
	}
	
	/**
	* Upload Image Data Arsip	* 
	* @return JSON
	*/
	public function upload_kk_file()
	{
		if (!$this->is_allowed('arsip_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'arsip',
			'allowed_types' => 'jpg|jpeg|png',
		]);
	}

	/**
	* Delete Image Data Arsip	* 
	* @return JSON
	*/
	public function delete_kk_file($uuid)
	{
		if (!$this->is_allowed('arsip_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'kk', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'arsip',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/arsip/'
        ]);
	}

	/**
	* Get Image Data Arsip	* 
	* @return JSON
	*/
	public function get_kk_file($id)
	{
		if (!$this->is_allowed('arsip_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$arsip = $this->model_arsip->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'kk', 
            'table_name'        => 'arsip',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/arsip/',
            'delete_endpoint'   => 'administrator/arsip/delete_kk_file'
        ]);
	}
	
	
	/**
	* Upload Image Data Arsip	* 
	* @return JSON
	*/
	public function upload_foto_file()
	{
		if (!$this->is_allowed('arsip_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'arsip',
			'allowed_types' => 'jpg|jpeg|png',
		]);
	}

	/**
	* Delete Image Data Arsip	* 
	* @return JSON
	*/
	public function delete_foto_file($uuid)
	{
		if (!$this->is_allowed('arsip_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'foto', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'arsip',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/arsip/'
        ]);
	}

	/**
	* Get Image Data Arsip	* 
	* @return JSON
	*/
	public function get_foto_file($id)
	{
		if (!$this->is_allowed('arsip_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$arsip = $this->model_arsip->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'foto', 
            'table_name'        => 'arsip',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/arsip/',
            'delete_endpoint'   => 'administrator/arsip/delete_foto_file'
        ]);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('arsip_export');

		$this->model_arsip->export('arsip', 'arsip');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('arsip_export');

		$this->model_arsip->pdf('arsip', 'arsip');
	}
}


/* End of file arsip.php */
/* Location: ./application/controllers/administrator/Data Arsip.php */