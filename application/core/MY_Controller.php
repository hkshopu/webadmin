<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $data = array();

	public function __construct()
	{
		parent::__construct();
	}

	public function layout()
	{
		$this->data['header_title'] = 'HKShopU Web Admin';
		$this->template['header'] = $this->load->view('templates/header', $this->data, TRUE);
		$this->template['top_nav'] = $this->load->view('templates/top_nav', $this->data, TRUE);
		$this->template['sidebar'] = $this->load->view('templates/sidebar', $this->data, TRUE);
		$this->template['breadcrumbs'] = $this->load->view('templates/breadcrumbs', $this->data, TRUE);
		$this->template['footer'] = $this->load->view('templates/footer', $this->data, TRUE);
		$this->template['page_end'] = $this->load->view('templates/page_end', $this->data, TRUE);
		$this->template['page'] = $this->load->view($this->page, $this->data, TRUE);
		$this->load->view('templates/content', $this->template);
	}
}
		