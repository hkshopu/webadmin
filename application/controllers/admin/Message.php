<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends MY_Controller {

	public function index()
	{
		$this->mybreadcrumb->add('Home', base_url('admin/dashboard'));
		$this->mybreadcrumb->add('Messages', base_url('admin/message'));
		$this->data['breadcrumbs'] = $this->mybreadcrumb->render();
		$this->data['title'] = 'Messages';
		$this->page = 'admin/message_list';
		$this->layout();
		
	}

	public function compose()
	{
		$this->mybreadcrumb->add('Home', base_url('admin/dashboard'));
		$this->mybreadcrumb->add('Compose New Message', base_url('admin/message/compose'));
		$this->data['breadcrumbs'] = $this->mybreadcrumb->render();
		$this->data['title'] = 'Compose New Message';
		$this->page = 'admin/message_compose';
		$this->layout();
		
	}

	public function read()
	{
		$this->mybreadcrumb->add('Home', base_url('admin/dashboard'));
		$this->mybreadcrumb->add('Read Message', base_url('admin/message/read'));
		$this->data['breadcrumbs'] = $this->mybreadcrumb->render();
		$this->data['title'] = 'Read Message';
		$this->page = 'admin/message_read';
		$this->layout();

	}

	
}

?>
