<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adorderfee extends MY_Controller {

	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('logged_in'))
        {
        	redirect('auth/auth/login');
        }
		
	}

	public function index()
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_admanagement'), base_url('admin/adorderfee'));
		$this->mybreadcrumb->add($this->lang->line('brsub_adorderfee'), base_url('admin/adorderfee'));
		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'load_js'		=>	'adordersfee_list.js',
							'title'			=> $this->lang->line('page_title_adorderfee'));
		
		$this->page = 'admin/adorderfee_list';
		$this->layout();
		
	}

	
	public function edit($id)
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_admanagement'), base_url('admin/adorder'));
		$this->mybreadcrumb->add($this->lang->line('brsub_adorderfee'), base_url('admin/adorderfee'));
		$this->mybreadcrumb->add($this->lang->line('brsub_adorderfeeedit'), base_url('admin/adorderfee/edit'));
		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'title'			=>	$this->lang->line('page_title_adorderfee_edit'));

		$this->page = 'admin/adorderfee_edit';
		$this->layout();
		
	}
	
	public function add()
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_admanagement'), base_url('admin/adorder'));
		$this->mybreadcrumb->add($this->lang->line('brsub_adorderfee'), base_url('admin/adorderfee'));
		$this->mybreadcrumb->add($this->lang->line('brsub_adorderfeeeditadd'), base_url('admin/adorderfee/add'));
		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'title'			=>	$this->lang->line('page_title_adorderfee_add'));

		$this->page = 'admin/adorderfee_edit';
		$this->layout();
		
	}

	public function delete($id)
	{

	}

	
}

?>
