<?php

class model_category extends CI_Model

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
			'img_url' => $img_url,
		);

		return $this->db->insert('category', $insert_data);

	}

	/*
	*------------------------------------
	* retrieves category information
	*------------------------------------
	*/
	public function fetch_category_data($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM category WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM category";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	/*
	*------------------------------------
	* updates teacher information
	*------------------------------------
	*/
	public function updateInfo($teacherId = null)
	{
		if ($teacherId) {
			$update_data = array(
				'register_date' => $this->input->post('editRegisterDate'),
				'fname' => $this->input->post('editFname'),
				'lname' => $this->input->post('editLname'),
				'date_of_birth' => $this->input->post('editDob'),
				'age' => $this->input->post('editAge'),
				'contact' => $this->input->post('editContact'),
				'email' => $this->input->post('editEmail'),
				'address' => $this->input->post('editAddress'),
				'city' => $this->input->post('editCity'),
				'country' => $this->input->post('editCountry'),
				'job_type' => $this->input->post('editJobType')
			);

			$this->db->where('teacher_id', $teacherId);
			$query = $this->db->update('teacher', $update_data);

			return ($query === true ? true : false);
		}
	}

	/*
	*------------------------------------
	* updates teacher information
	*------------------------------------
	*/
	public function updatePhoto($teacherId = null, $imageUrl = null)
	{
		if ($teacherId && $imageUrl) {
			$update_data = array(
				'image' => $imageUrl
			);

			$this->db->where('teacher_id', $teacherId);
			$query = $this->db->update('teacher', $update_data);

			return ($query === true ? true : false);
		}
	}

	/*
	*------------------------------------
	* removes teacher information
	*------------------------------------
	*/
	public function remove($teacherId = null)
	{
		if ($teacherId) {
			$this->db->where('teacher_id', $teacherId);
			$result = $this->db->delete('teacher');
			return ($result === true ? true : false);
		} // /if
	}

	/*
	*------------------------------------
	* count total teacher information
	*------------------------------------
	*/
	public function countTotalTeacher()
	{
		$sql = "SELECT * FROM teacher";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
}
