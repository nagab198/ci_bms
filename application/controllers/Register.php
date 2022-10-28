<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

//		$this->isNotLoggedIn();

		// loading the teacher model
		$this->load->model('model_category');

		// loading the form validation library
		$this->load->library('form_validation');
	}
	/*
*------------------------------------
* inserts the category information
* into the database
*------------------------------------
*/
	public function create()
	{
		$validator = array('success' => false, 'messages' => array());

		$validate_data = array(
			array(
				'field' => 'meta_name',
				'label' => 'Meta Name',
				'rules' => 'required'
			),
			array(
				'field' => 'meta_desc',
				'label' => 'Meta Description',
				'rules' => 'required'
			),
			array(
				'field' => 'meta_keyword',
				'label' => 'Meta Keyword',
				'rules' => 'required'
			),
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($validate_data);
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() === true) {
			$imgUrl = $this->uploadImage();
			if ($this->model_category->create($imgUrl)) {
				$validator['success'] = true;
				$validator['messages'] = "Successfully added";
			} else {
				$validator['success'] = false;
				$validator['messages'] = "Error while inserting the information into the database";
			}
		} else {
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}
		} // /else

		echo json_encode($validator);
	}

	/*
	*------------------------------------
	* returns the uploaded image url
	*------------------------------------
	*/
	public function uploadImage()
	{
		$type = explode('.', $_FILES['photo']['name']);
		$type = $type[count($type) - 1];
		$url = 'uploads/images/categories/' . uniqid(rand()) . '.' . $type;
		if (in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
			if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
				if (move_uploaded_file($_FILES['photo']['tmp_name'], $url)) {
					return $url;
				} else {
					return false;
				}
			}
		}
	}

	public function create_record()
	{
		if ($file != null && $file['photo']['tmp_name']) {
			$rand_name = rand(1000, 100000);
			$file = $rand_name . "-" . $_FILES['photo']['name'];
			$file_loc = $_FILES['photo']['tmp_name'];
			$file_size = $_FILES['photo']['size'];
			$file_type = $_FILES['photo']['type'];
			$folder = "upload/";
			move_uploaded_file($file_loc, $folder . $file);
		} else {
			$file = $data['path'];
		}
		if (empty($data["meta_name"])) {
			$error_array['meta_name_err'] = "Please Enter meta name";
		} else {
			$meta_name = validation_check($data["meta_name"]);
		}
		if (empty($data["meta_desc"])) {
			$error_array['meta_desc_err'] = "Please Enter meta description";
		} else {
			$meta_desc = validation_check($data["meta_desc"]);
		}
		if (empty($data["meta_keyword"])) {
			$error_array['meta_keyword_err'] = "Please Enter meta keyword";
		} else {
			$meta_keyword = validation_check($data["meta_keyword"]);
		}
		if (empty($data["name"])) {
			if ($data['form_type'] == 'product') {
				$error_array['name_err'] = "Please Enter product name";
			} else if ($data['form_type'] == 'business') {
				$error_array['name_err'] = "Please Enter business name";
			} else {
				$error_array['name_err'] = "Please Enter name";
			}

		} else {
			$name = validation_check($data["name"]);
		}
		if ($data['form_type'] == 'sub_category' || $data['form_type'] == 'product' || $data['form_type'] == 'business') {
			if (empty($data["category_id"])) {
				$error_array['category_id_err'] = "Please Select category";
			} else {
				$category_id = validation_check($data["category_id"]);

			}
		}
		if ($data['form_type'] == 'product' || $data['form_type'] == 'business') {
			if (empty($data["sub_category_id"])) {
				$error_array['sub_category_id_err'] = "Please Select sub category";
			} else {
				$sub_category_id = validation_check($data["sub_category_id"]);
			}
			if (empty($data["desc"])) {
				$error_array['desc_err'] = "Please Enter description";
			} else {
				$desc = validation_check($data["desc"]);
			}
		}
		if ($data['form_type'] == 'business') {
			if (empty($data["address"])) {
				$error_array['address_err'] = "Please Enter address";
			} else {
				$meta_name = validation_check($data["address"]);
			}
			if (empty($data["phone_number"])) {
				$error_array['phone_number_err'] = "Please Enter phone number ";
			} else {
				$meta_name = validation_check($data["phone_number"]);
			}
		}
	}

}
