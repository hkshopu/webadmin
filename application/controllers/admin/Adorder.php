<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adorder extends MY_Controller {

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
		$this->mybreadcrumb->add($this->lang->line('brsub_admanagement'), base_url('admin/adorder'));
		$this->mybreadcrumb->add($this->lang->line('brsub_adorderlist'), base_url('admin/adorder'));
		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'load_js'		=>	'adorders_list.js',
							'title'			=> $this->lang->line('page_title_adorderlist'));
		
		$this->page = 'admin/adorder_list';
		$this->layout();
		
	}

	public function view()
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_admanagement'), base_url('admin/adorder'));
		$this->mybreadcrumb->add($this->lang->line('brsub_adorderlist'), base_url('admin/adorder'));
		$this->mybreadcrumb->add($this->lang->line('brsub_adorderinfo'), base_url('admin/adorder/view'));
		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'title'			=>	$this->lang->line('page_title_adorderinfo'));

		$this->page = 'admin/adorder_info';
		$this->layout();
		
	}

	public function edit()
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_admanagement'), base_url('admin/adorder'));
		$this->mybreadcrumb->add($this->lang->line('brsub_adorderlist'), base_url('admin/adorder'));
		$this->mybreadcrumb->add($this->lang->line('brsub_adorderedit'), base_url('admin/adorder/edit'));
		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'load_js'		=>	'adorders_function.js',
							'title'			=>	$this->lang->line('page_title_adorderedit'));

		$this->page = 'admin/adorder_edit';
		$this->layout();
		
	}
	
	public function add()
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_admanagement'), base_url('admin/adorder'));
		$this->mybreadcrumb->add($this->lang->line('brsub_adorderlist'), base_url('admin/adorder'));
		$this->mybreadcrumb->add($this->lang->line('brsub_adorderinfo'), base_url('admin/adorder/view'));
		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'title'			=>	'Add New Ads');

		$this->page = 'admin/adorder_add';
		$this->layout();
		
	}

	public function topup($id)
	{
		// Set variables for paypal form
        $returnURL = base_url().'admin/paypal/success';
        $cancelURL = base_url().'admin/paypal/cancel';
        $notifyURL = base_url().'admin/paypal/ipn';
        
        // Get shop details
       // $shop = $this->product->getRows($id);

        //test data
        $userID = $this->session->userdata('userid');
        $shop['name']	=	'HKShopU';
        $shop['id']		=	$this->session->userdata('shop_id');
        $shop['number']	=	235346;
        $topup_amount	=	$this->input->post('amount');
        

        $this->load->config('paypal');
    	// Load paypal library & product model
        $this->load->library('paypal_lib');
        
        // Add fields to paypal form
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', 'HKShopU Top Up');
        $this->paypal_lib->add_field('custom', $userID);
        $this->paypal_lib->add_field('business', $this->config->item('business'));
        $this->paypal_lib->add_field('item_number',  $shop['id']);
        $this->paypal_lib->add_field('amount',  $topup_amount);
        
        // Render paypal form
        $this->paypal_lib->paypal_auto_form();
	}
}

?>
