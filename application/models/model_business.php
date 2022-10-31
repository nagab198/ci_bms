<?php

class model_business extends CI_Model

{
	public function __construct()
	{
		parent::__construct();
	}

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
			'sub_category_id' => $this->input->post('sub_category_id'),
			'address' => $this->input->post('address'),
			'phone_number' => $this->input->post('phone_number'),
			'desc' => $this->input->post('desc'),
			'priority' => $this->input->post('priority') ? 1 : 0,
			'img_url' => $img_url,
			'status' => 1,
		);

		$status = $this->db->insert('business', $insert_data);
		return $status === true ? true : false;

	}

	public function fetchBusiness($status = null)
	{
		{
			$query = $this->db->get_where('business', array('status' => $status));
			return $query->result_array();
		}
	}

	public function fetchBusinessById($id)
	{
		if ($id) {
			$query = $this->db->get_where('business', array('id' => $id));
			return $query->row_array();
		} else {
			return null;
		}
	}

	public function updateInfo($data, $img)
	{
		$id = $data['id'];
		if ($id) {
			$update_data = array(
				'name' => $this->input->post('name') ? $this->input->post('name') : $data['name'],
				'meta_name' => $this->input->post('meta_name') ? $this->input->post('meta_name') : $data['meta_name'],
				'meta_desc' => $this->input->post('meta_desc') ? $this->input->post('meta_desc') : $data['meta_desc'],
				'meta_keyword' => $this->input->post('meta_keyword') ? $this->input->post('meta_keyword') : $data['meta_keyword'],
				'category_id' => $this->input->post('category_id') ? $this->input->post('category_id') : $data['category_id'],
				'sub_category_id' => $this->input->post('sub_category_id') ? $this->input->post('sub_category_id') : $data['sub_category_id'],
				'address' => $this->input->post('address') ? $this->input->post('address') : $data['address'],
				'phone_number' => $this->input->post('phone_number') ? $this->input->post('phone_number') : $data['phone_number'],
				'desc' => $this->input->post('desc') ? $this->input->post('desc') : $data['desc'],
				'priority' => $this->input->post('priority') ? $this->input->post('priority') : $data['priority'],
				'img_url' => $img ? $img : $data['img_url'],
			);

			$this->db->where('id', $id);
			$query = $this->db->update('business', $update_data);
			return ($query === true ? true : false);
		} else {
			return false;
		}
	}

	public function remove($id = null)
	{
		if ($id) {
			$this->db->where('id', $id);
			$result = $this->db->delete('business');
			return $result === true;
		}
	}

}
