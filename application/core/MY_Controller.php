<?php

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function isLoggedIn()
	{
		$this->load->library('session');
		if ($this->session->userdata('logged_in') === true) {
			redirect(base_url() . 'admin/dashboard', 'refresh');
		}
	}

	public function isNotLoggedIn()
	{
		$this->load->library('session');

		if ($this->session->userdata('logged_in') !== true) {
			redirect(base_url() . 'login', 'refresh');
		}
	}

}
