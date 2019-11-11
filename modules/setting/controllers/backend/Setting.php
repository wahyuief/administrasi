<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Setting Controller
*| --------------------------------------------------------------------------
*| setting site
*|
*/
class Setting extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_setting');
	}

	/**
	* show all setting
	*
	* @var String $offset
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('setting');
		$this->load->model('page/model_page');

		$this->data = [
			'times' => [
				['label' => '15 Minutes', 'value' => '900'],
				['label' => '30 Minutes', 'value' => '1800'],
				['label' => '1 Hours', 'value' => '3600'],
				['label' => '2 Hours', 'value' => '7200'],
				['label' => '4 Hours', 'value' => '14400'],
				['label' => '6 Hours', 'value' => '21600'],
				['label' => '8 Hours', 'value' => '28800'],
				['label' => '12 Hours', 'value' => '43200'],
				['label' => '1 Days', 'value' => '86400'],
				['label' => '1 Week', 'value' => '604800'],
				['label' => '1 Month', 'value' => '2592000'],
				['label' => '6 Month', 'value' => '15552000'],
				['label' => '1 Years', 'value' => '31104000'],
				['label' => 'Always', 'value' => '0']
			],
			'pages' => $this->model_page->find_all(),
			'landing_page' => get_option('landing_page_id', 'default'),
			'active_theme' => get_option('active_theme', 'cicool'),
			'timezone_opt' => get_option('timezone')
		];

		$this->template->title('Setting List');
		$this->render('backend/standart/administrator/setting/setting_general', $this->data);
	}

	/**
	* Update settings
	*
	*/
	public function save()
	{
		if (!$this->is_allowed('setting_update', false)) {
			return $this->response([
				'success' => false,
				'message' => 'Sorry you do not have permission to setting'
				]);
		}

		$this->load->helper('file');
		$this->load->helper(['cookie']);
		
		$this->form_validation->set_rules('site_name', 'Site Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('encryption_key', 'Encryption Key', 'trim|required');
		$this->form_validation->set_rules('sess_expiration', 'Encryption Key', 'trim|numeric');
		$this->form_validation->set_rules('sess_time_to_update', 'Session Time to Update', 'trim|numeric');
		$this->form_validation->set_rules('global_xss_filtering', 'Global XSS Filtering', 'trim|required');
		$this->form_validation->set_rules('csrf_token_name', 'CSRF Token Name', 'trim|required');
		$this->form_validation->set_rules('csrf_cookie_name', 'CSRF Cookie Name', 'trim|required');
		$this->form_validation->set_rules('csrf_expire', 'CSRF Expire', 'trim|required');
		$this->form_validation->set_rules('sess_cookie_name', 'Session Cookie Name', 'trim|required');
		$this->form_validation->set_rules('permitted_uri_chars', 'Permitted URI Chars', 'trim|required');
		$this->form_validation->set_rules('landing_page_id', 'Default landing page', 'trim|required');

		cicool()->eventListen('before_save_setting', $this->form_validation);

		if ($this->form_validation->run()) {
			cicool()->eventListen('save_setting', $this);
			set_option('site_name', $this->input->post('site_name'));
			set_option('site_description', $this->input->post('site_description'));
			set_option('landing_page_id', $this->input->post('landing_page_id'));
			set_option('active_theme', $this->input->post('active_theme'));
			set_cookie('language', $this->input->post('language'), (60 * 60 * 24) * 365 );
			set_option('keywords', $this->input->post('keywords'));
			set_option('author', $this->input->post('author'));
			set_option('email', $this->input->post('email'));
			set_option('timezone', $this->input->post('timezone'));
			set_option('skin', $this->input->post('skin'));
			set_option('google_id', $this->input->post('google_id'));
			set_option('google_secret', $this->input->post('google_secret'));

			if (!is_dir(FCPATH . 'setting/')) {
				mkdir(FCPATH . 'setting/');
			}

			$setting_attachment_uuid = $this->input->post('setting_attachment_uuid');
			$setting_attachment_name = $this->input->post('setting_attachment_name');

			if (!empty($setting_attachment_name)) {

				rename(FCPATH . 'setting/' . $setting_attachment_uuid . '/' . $setting_attachment_name, 
						FCPATH . 'setting/' . $setting_attachment_name);

				if (!is_file(FCPATH . 'setting/' . $setting_attachment_name)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}
				set_option('logo', $setting_attachment_name);
			}

			$setting_attachment_uuid2 = $this->input->post('setting_attachment_uuid2');
			$setting_attachment_name2 = $this->input->post('setting_attachment_name2');

			if (!empty($setting_attachment_name2)) {

				rename(FCPATH . 'setting/' . $setting_attachment_uuid2 . '/' . $setting_attachment_name2, 
						FCPATH . 'setting/' . $setting_attachment_name2);

				if (!is_file(FCPATH . 'setting/' . $setting_attachment_name2)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}
				set_option('logo_small', $setting_attachment_name2);
			}

			$setting_attachment_uuid3 = $this->input->post('setting_attachment_uuid3');
			$setting_attachment_name3 = $this->input->post('setting_attachment_name3');

			if (!empty($setting_attachment_name3)) {

				rename(FCPATH . 'setting/' . $setting_attachment_uuid3 . '/' . $setting_attachment_name3, 
						FCPATH . 'setting/' . $setting_attachment_name3);

				if (!is_file(FCPATH . 'setting/' . $setting_attachment_name3)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}
				set_option('favicon', $setting_attachment_name3);
			}

			$setting_attachment_uuid4 = $this->input->post('setting_attachment_uuid4');
			$setting_attachment_name4 = $this->input->post('setting_attachment_name4');

			if (!empty($setting_attachment_name4)) {

				rename(FCPATH . 'setting/' . $setting_attachment_uuid4 . '/' . $setting_attachment_name4, 
						FCPATH . 'setting/' . $setting_attachment_name4);

				if (!is_file(FCPATH . 'setting/' . $setting_attachment_name4)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}
				set_option('background', $setting_attachment_name4);
			}

			$csrf_exclude_uris = $this->clean_exclude_uris($this->input->post('csrf_exclude_uris'));

			$data = [
				'php_tag_open' 					=> '<?php',
				'permitted_uri_chars'			=> addslashes($this->input->post('permitted_uri_chars')),
				'url_suffix'					=> addslashes($this->input->post('url_suffix')),
				'encryption_key'				=> addslashes($this->input->post('encryption_key')),

				'sess_expiration'				=> addslashes($this->input->post('sess_expiration')),
				'sess_cookie_name'				=> addslashes($this->input->post('sess_cookie_name')),
				'sess_time_to_update'			=> addslashes($this->input->post('sess_time_to_update')),

				'global_xss_filtering'			=> addslashes($this->input->post('global_xss_filtering')),

				'csrf_protection'		    	=> addslashes($this->input->post('csrf_protection')),
				'csrf_token_name'				=> addslashes($this->input->post('csrf_token_name')),
				'csrf_cookie_name'				=> addslashes($this->input->post('csrf_cookie_name')),
				'csrf_expire'					=> addslashes($this->input->post('csrf_expire')),
				'csrf_regenerate'				=> addslashes($this->input->post('csrf_regenerate')),
				'csrf_exclude_uris'		    	=> $csrf_exclude_uris,
				
				'language'						=> addslashes($this->input->post('language')),
				'maintenance_mode'				=> addslashes($this->input->post('maintenance_mode')),
				'log_threshold'				    => addslashes($this->input->post('log_threshold')),
			];

			$config_template = $this->parser->parse('core_template/config_template.txt', $data, TRUE);
			write_file(FCPATH . '/application/config/config.php', $config_template);

			$config_template = $this->parser->parse('core_template/setting/routes_landing.php', $data, TRUE);
			write_file(FCPATH . '/application/routes/routes_landing.php', $config_template);

			$this->response['success'] = true;
			$this->response['message'] = 'Your setting has been successfully updated. ';
		} else {
			$this->response['success'] = false;
			$this->response['message'] = validation_errors();
		}

		return $this->response($this->response);
	}

	public function clean_exclude_uris($exclude_uri_string){
		$exclude_uri_arr_string = "";
		$exclude_uri_arr = explode(',',$exclude_uri_string);
		foreach($exclude_uri_arr as $string){
			$string1 = str_replace('"', "", $string);
			$string2 = str_replace("'", "", $string1);

			$exclude_uri_arr_string .= "'".$string2."',";
		}
		return $exclude_uri_arr_string;
	}

	// Logo
	/**
	* Upload Image Notice Board	* 
	* @return JSON
	*/
	public function upload_attachment_file()
	{
		if (!$this->is_allowed('setting_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 		=> $uuid,
			'table_name' 		=> 'setting',
			'allowed_types' 	=> 'jpg|png|jpeg',
			'upload_path_tmp'   => './setting/tmp/',
            'upload_path'       => 'setting/'
		]);
	}

	/**
	* Delete Image Notice Board	* 
	* @return JSON
	*/
	public function delete_attachment_file($cc_option, $uuid)
	{
		if (!$this->is_allowed('setting_update', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		$this->load->helper('file');

        $path = FCPATH . 'setting/' . $uuid . '/';
        $delete_file = delete_files($path, true);
        $path = 'setting/' . $uuid;
        if (is_file($path)) {
            $delete_file = unlink($path);
        }

        set_option($cc_option, '');

        $this->response(['success' => true]);
	}

	/**
	* Get Image Notice Board	* 
	* @return JSON
	*/
	public function get_attachment_file($cc_option, $id = null)
	{
		if (!$this->is_allowed('setting_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$file = get_option($cc_option);

		$this->response([[
            'success'               => true,
            'thumbnailUrl'          => check_is_image_ext(base_url('setting/' . $file)),
            'id'                    => 0,
            'name'                  => $file,
            'uuid'                  => $file,
            'deleteFileEndpoint'    => 'setting/delete_attachment_file',
            'deleteFileParams'      => ['by' => '']
        ]]);
	}

}


/* End of file Setting.php */
/* Location: ./application/controllers/administrator/Setting.php */