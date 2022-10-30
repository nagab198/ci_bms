<?php

class model_product extends CI_Model

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
			'name'				 => $this->input->post('name'),
			'meta_name'			 => $this->input->post('meta_name'),
			'meta_desc'			 => $this->input->post('meta_desc'),
			'meta_keyword'		 => $this->input->post('meta_keyword'),
			'category_id'		 => $this->input->post('category_id'),
			'sub_category_id'	 => $this->input->post('sub_category_id'),
			'desc'				 => $this->input->post('desc'),
			'status'			 => 1,
			'home_priority'		 => $this->input->post('priority') ? 1 : 0,
			'img_url' 			 => $img_url,
		);

		$status = $this->db->insert('product', $insert_data);
		return $status === true ? true : false;

	}

	public function fetchProduct($status = null)
	{
//		$query = $this->db->query("SELECT * FROM product WHERE status = ?", array($status));
		$query = $this->db->get_where('product', array('status' => $status));
		return $query->result_array();
	}

}
