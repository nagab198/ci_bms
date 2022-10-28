<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
	}

	public function create_business()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/create_forms/business');
		$this->load->view('templates/footer');
	}

	public function create_category()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/create_forms/category');
		$this->load->view('templates/footer');
	}

	public function create_sub_category()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/create_forms/sub_category');
		$this->load->view('templates/footer');
	}

	public function create_product()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/create_forms/product');
		$this->load->view('templates/footer');
	}

	public function get_business()
	{
		$this->load->view('templates/header');
		$this->load->view('view_business');
		$this->load->view('templates/footer');
	}

	public function get_category()
	{
		$this->load->view('templates/header');
		$this->load->view('view_category');
		$this->load->view('templates/footer');
	}

	public function get_sub_category()
	{
		$this->load->view('templates/header');
		$this->load->view('view_sub_category');
		$this->load->view('templates/footer');
	}

	public function get_product()
	{
		$this->load->view('templates/header');
		$this->load->view('view_product');
		$this->load->view('templates/footer');
	}

}
