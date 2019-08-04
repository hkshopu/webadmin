<?php

class Layout extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
		//$data['load_js'] = 'salesareas.js';
		$data['title'] = 'Users';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/top_nav');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/content');
		$this->load->view('templates/footer');
		$this->load->view('templates/page_end', $data);
	}

}