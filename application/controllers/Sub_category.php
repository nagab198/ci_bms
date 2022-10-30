<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property $model_sub_category
 */
class Sub_category extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
//		$this->isNotLoggedIn();
		$this->load->model('model_sub_category');

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
//		$creat = false;

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
			),
			array(
				'field' => 'category_id',
				'label' => 'Category',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($validate_data);
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() === true) {
			$imgUrl = $this->uploadImage();
			if ($this->model_sub_category->create($imgUrl)) {
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
}
