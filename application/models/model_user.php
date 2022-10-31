<?php

class model_user extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function login($username = null, $password = null)
	{
		if ($username && $password) {
			$query = $this->db->get_where('user', array('user_name' => $username, 'password' => $password));
			$result = $query->row_array();
			return ($query->num_rows() === 1 ? $result['id'] : false);
		} else {
			return false;
		}
	}

	public function validate_username($username = null)
	{
		if ($username) {
			$query = $this->db->get_where('user', array('user_name' => $username));
			$result = $query->row_array();
			return ($query->num_rows() === 1 ? true : false);
		} else {
			return false;
		}
	} // /validate username function


	public function validate_current_password($password = null, $userId = null)
	{
		if ($password && $userId) {
			$password = md5($this->input->post('currentPassword'));

			$sql = "SELECT * FROM users WHERE password = ? AND user_id = ?";
			$query = $this->db->query($sql, array($password, $userId));
			$result = $query->row_array();

			return ($query->num_rows() === 1 ? true : false);
		} else {
			return false;
		}
	} // /validate username function


	public function fetchUserData($userId = null)
	{
		if ($userId) {
			$sql = "SELECT * FROM users WHERE user_id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}
	}

	public function updateProfile($userId = null)
	{
		if ($userId) {
			$update_data = array(
				'username' => $this->input->post('username'),
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'email' => $this->input->post('email')
			);

			$this->db->where('user_id', $userId);
			$status = $this->db->update('users', $update_data);
			return ($status == true ? true : false);
		}
	}

	public function changePassword($userId = null)
	{
		if ($userId) {
			$password = md5($this->input->post('newPassword'));
			$update_data = array(
				'password' => $password
			);

			$this->db->where('user_id', $userId);
			$status = $this->db->update('users', $update_data);
			return ($status == true ? true : false);
		}
	}

}
