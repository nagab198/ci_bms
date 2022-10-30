<?php

class model_sub_category extends CI_Model

{
	public function __construct()
	{
		parent::__construct();
	}

	/*
	*------------------------------------
	* inserts the category information
	* into the database
	*------------------------------------
	*/
	public function create($img_url)
	{
		if ($img_url == '') {
			$img_url = 'uploads/images/default/default_avatar.png';
		}

		$insert_data = array(
			'name' => $this->input->post('name'),
			'meta_name' => $this->input->post('meta_name'),
			'meta_desc' => $this->input->post('meta_desc'),
			'meta_keyword' => $this->input->post('meta_keyword'),
			'category_id' => $this->input->post('category_id'),
			'img_url' => $img_url,
			'status' => 1,
		);

		return $this->db->insert('sub_category', $insert_data);

	}

	public function fetchSubCategory($status = null)
	{
//		$query = $this->db->query("SELECT * FROM category WHERE status = ?", array($status));
		$query = $this->db->get_where('sub_category', array('status' => $status));
		return $query->result_array();
	}

}
