<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('do_upload')) {

	function do_upload()
	{
		$config['upload_path'] = 'uploads/images/categories/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 2048;
		$config['encrypt_name'] = true;
		$config['remove_spaces'] = true;
		$config['detect_mime'] = true;
		$instance =& get_instance();
		$instance->load->library('upload', $config);
		if (!$instance->upload->do_upload('photo')) {
			return array('error' => $instance->upload->display_errors());
		} else {
			$data = $instance->upload->data();
			return array('file_name' => $data['file_name']);
		}
	}
}
