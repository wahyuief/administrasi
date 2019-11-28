<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Data Penduduk Controller
*| --------------------------------------------------------------------------
*| Data Penduduk site
*|
*/
class Penduduk extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_penduduk');
	}

	/**
	* show all Data Penduduks
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('penduduk_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['penduduks'] = $this->model_penduduk->get($filter, $field, $this->limit_page, $offset);
		$this->data['penduduk_counts'] = $this->model_penduduk->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/penduduk/index/',
			'total_rows'   => $this->model_penduduk->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Data Penduduk List');
		$this->render('backend/standart/administrator/penduduk/penduduk_list', $this->data);
	}
	
	/**
	* Add new penduduks
	*
	*/
	public function add()
	{
		$this->is_allowed('penduduk_add');

		$this->template->title('Data Penduduk New');
		$this->render('backend/standart/administrator/penduduk/penduduk_add', $this->data);
	}

	/**
	* Add New Data Penduduks
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('penduduk_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('nkk', 'Nomor Kartu Keluarga', 'trim|required|callback_valid_number');
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('golongan_darah', 'Golongan Darah', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('pendidikan_akhir', 'Pendidikan Terakhir', 'trim|required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
		$this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'trim|required');
		$this->form_validation->set_rules('status_keluarga', 'Status Hubungan Dalam Keluarga', 'trim|required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required');
		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required');
		$this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'trim|required');
		$this->form_validation->set_rules('rt', 'RT Berapa', 'trim|required');
		$this->form_validation->set_rules('rw', 'RW Berapa', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'nkk' => $this->input->post('nkk'),
				'nik' => $this->input->post('nik'),
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'golongan_darah' => $this->input->post('golongan_darah'),
				'agama' => $this->input->post('agama'),
				'pendidikan_akhir' => $this->input->post('pendidikan_akhir'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'status_perkawinan' => $this->input->post('status_perkawinan'),
				'status_keluarga' => $this->input->post('status_keluarga'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'nama_ayah' => $this->input->post('nama_ayah'),
				'alamat_lengkap' => $this->input->post('alamat_lengkap'),
				'rt' => $this->input->post('rt'),
				'rw' => $this->input->post('rw'),
			];

			
			$save_penduduk = $this->model_penduduk->store($save_data);

			if ($save_penduduk) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_penduduk;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/penduduk/edit/' . $save_penduduk, 'Edit Data Penduduk'),
						anchor('administrator/penduduk', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/penduduk/edit/' . $save_penduduk, 'Edit Data Penduduk')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/penduduk');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/penduduk');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Data Penduduks
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('penduduk_update');

		$this->data['penduduk'] = $this->model_penduduk->find($id);

		$this->template->title('Data Penduduk Update');
		$this->render('backend/standart/administrator/penduduk/penduduk_update', $this->data);
	}

	/**
	* Update Data Penduduks
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('penduduk_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('nkk', 'Nomor Kartu Keluarga', 'trim|required|callback_valid_number');
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('golongan_darah', 'Golongan Darah', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('pendidikan_akhir', 'Pendidikan Terakhir', 'trim|required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
		$this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'trim|required');
		$this->form_validation->set_rules('status_keluarga', 'Status Hubungan Dalam Keluarga', 'trim|required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required');
		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required');
		$this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'trim|required');
		$this->form_validation->set_rules('rt', 'RT Berapa', 'trim|required');
		$this->form_validation->set_rules('rw', 'RW Berapa', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nkk' => $this->input->post('nkk'),
				'nik' => $this->input->post('nik'),
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'golongan_darah' => $this->input->post('golongan_darah'),
				'agama' => $this->input->post('agama'),
				'pendidikan_akhir' => $this->input->post('pendidikan_akhir'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'status_perkawinan' => $this->input->post('status_perkawinan'),
				'status_keluarga' => $this->input->post('status_keluarga'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'nama_ayah' => $this->input->post('nama_ayah'),
				'alamat_lengkap' => $this->input->post('alamat_lengkap'),
				'rt' => $this->input->post('rt'),
				'rw' => $this->input->post('rw'),
			];

			
			$save_penduduk = $this->model_penduduk->change($id, $save_data);

			if ($save_penduduk) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/penduduk', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/penduduk');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/penduduk');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}

	public function get_nama()
	{
		$nik = $this->input->get('nik');
		$user = db_get_data('aauth_users', ['username'=>$nik]);
		echo json_encode($user);
	}

	public function edit_data_pribadi()
	{
		$this->is_allowed('edit_data_pribadi');
		$nik = $this->aauth->get_user()->username;
		$this->data['penduduk'] = db_get_data('penduduk', ['nik'=>$nik]);
		$this->template->title('Edit Data Pribadi');
		$this->render('backend/standart/administrator/penduduk/edit_data_pribadi', $this->data);
	}

	/**
	* Update Data Penduduks
	*
	* @var $id String
	*/
	public function edit_data_pribadi_save($id)
	{
		if (!$this->is_allowed('edit_data_pribadi', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('nkk', 'Nomor Kartu Keluarga', 'trim|required|callback_valid_number');
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('golongan_darah', 'Golongan Darah', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('pendidikan_akhir', 'Pendidikan Terakhir', 'trim|required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
		$this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'trim|required');
		$this->form_validation->set_rules('status_keluarga', 'Status Hubungan Dalam Keluarga', 'trim|required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required');
		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required');
		$this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'trim|required');
		$this->form_validation->set_rules('rt', 'RT Berapa', 'trim|required');
		$this->form_validation->set_rules('rw', 'RW Berapa', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nkk' => $this->input->post('nkk'),
				'nik' => $this->input->post('nik'),
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'golongan_darah' => $this->input->post('golongan_darah'),
				'agama' => $this->input->post('agama'),
				'pendidikan_akhir' => $this->input->post('pendidikan_akhir'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'status_perkawinan' => $this->input->post('status_perkawinan'),
				'status_keluarga' => $this->input->post('status_keluarga'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'nama_ayah' => $this->input->post('nama_ayah'),
				'alamat_lengkap' => $this->input->post('alamat_lengkap'),
				'rt' => $this->input->post('rt'),
				'rw' => $this->input->post('rw'),
			];

			
			$save_penduduk = $this->model_penduduk->change($id, $save_data);

			if ($save_penduduk) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/penduduk', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/penduduk');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/penduduk');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Data Penduduks
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('penduduk_delete');

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
            set_message(cclang('has_been_deleted', 'penduduk'), 'success');
        } else {
            set_message(cclang('error_delete', 'penduduk'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Data Penduduks
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('penduduk_view');

		$this->data['penduduk'] = $this->model_penduduk->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Data Penduduk Detail');
		$this->render('backend/standart/administrator/penduduk/penduduk_view', $this->data);
	}
	
	/**
	* delete Data Penduduks
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$penduduk = $this->model_penduduk->find($id);

		
		
		return $this->model_penduduk->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('penduduk_export');

		$this->model_penduduk->export('penduduk', 'penduduk');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('penduduk_export');

		$this->model_penduduk->pdf('penduduk', 'penduduk');
	}
}


/* End of file penduduk.php */
/* Location: ./application/controllers/administrator/Data Penduduk.php */