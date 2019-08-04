<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends MY_Controller {

	public function __construct() {
        parent::__construct();     

        if(!$this->session->userdata('logged_in'))
        {
        	if(!$_REQUEST)
        		redirect('auth/auth/login');
        } 
        
        $this->load->library('operation');
        
    }

	public function index()
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_ordermanagement'), base_url('admin/order'));
		$this->mybreadcrumb->add($this->lang->line('brsub_orderlist'), base_url('admin/order'));

		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'load_js'		=>	'orders_list.js',
							'title'			=>	$this->lang->line('page_title_orderlist'));

		$this->page = 'admin/order_list';
		$this->layout();
		
	}

	public function list()
	{
	
			$order = $this->operation->getList('Order', 1, 0, $this->session->userdata('token'));

		if($order)
		{
			foreach($order as $key=>$value)
			{
				if(isset($value['id']))
				{
				
					$id 				= 	$value['id'];
					$user 				= 	$value['user']['username'];
					$shop 				= 	$value['shop']['name_en'];
					$item 				= 	$value['shop_order']['total_quantity'];
					$price 				= 	number_format($value['shop_order']['total_amount'], 2);
					$orderdate			= 	$value['order_date'];
					$status 			= 	$value['order_status'];
					$operate 			=  	'<a href="order/view/'.$id.'">Info</a> | ';
					$operate 			.= 	'<a href="order/edit/'.$id.'">Edit</a> | ';
					$operate 			.= 	'<a href="order/delete/'.$id.'">Delete</a>';

					$orderlist[] = array(	'id'		=>	$id, 
										'user'			=>	$user, 
										'shop'			=>	$shop, 
										'item' 			=>	$item, 
										'price'			=>	$price,
										'orderdate'		=>	$orderdate,
										'status'		=>	ucfirst($status), 
										'operate'		=>	$operate
									);

				}
			}

			echo (json_encode(array('data'=>$orderlist)));
		}
		else 
		{
			echo json_encode(array('data'=>array()));
		}
	
	}

	public function view($id)
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_ordermanagement'), base_url('admin/order'));
		$this->mybreadcrumb->add($this->lang->line('brsub_orderlist'), base_url('admin/order'));
		$this->mybreadcrumb->add($this->lang->line('brsub_orderinfo'), base_url('admin/order/view'));

		$orderListObject = $this->operation->getData('Order', $id, 0, $this->session->userdata('token'));
		$cartListObject = $this->operation->getData('Cart', $orderListObject->cart_id, 0, $this->session->userdata('token'));

		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'order'			=>	$orderListObject,
							'cart'			=>	$cartListObject,
							'title'			=> 	$this->lang->line('page_title_orderinfo'));
		
		$this->page = 'admin/order_info';
		$this->layout();
		
	}

	public function edit($id)
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_ordermanagement'), base_url('admin/order'));
		$this->mybreadcrumb->add($this->lang->line('brsub_orderlist'), base_url('admin/order'));
		$this->mybreadcrumb->add($this->lang->line('brsub_orderedit'), base_url('admin/order/edit'));

		$orderListObject = $this->operation->getData('Order', $id, 0, $this->session->userdata('token'));
		$cartListObject = $this->operation->getData('Cart', $orderListObject->cart_id, 0, $this->session->userdata('token'));
		$orderStatusObject = $this->operation->getList('OrderStatus', 0, 0, $this->session->userdata('token'));
		$paymentStatusObject = $this->operation->getList('PaymentStatus', 0, 0, $this->session->userdata('token'));

		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'order'			=>	$orderListObject,
							'cart'			=>	$cartListObject,
							'orderstatus'	=>	$orderStatusObject,
							'paymentstatus'	=>	$paymentStatusObject,
							'title'			=> $this->lang->line('page_title_orderedit'));

		$this->page = 'admin/order_edit';
		$this->layout();
		
	}

	public function save()
	{
		$id = $this->input->post('orderid');
		$orderstatus = $this->input->post('orderstatus');
		$paymentstatus = $this->input->post('paymentstatus');
		$address = $this->input->post('shipmentaddress');
		$receiver = $this->input->post('receiver');
		$fee = $this->input->post('shipmentfee');

		if($this->input->post('saveOrder'))
		{
			$order = array(	'id'				=>	$id, 
							'order_status_id'	=>	$orderstatus, 
							'payment_status_id'	=>	$paymentstatus,
							'shipment_address'	=>	$address,
							'shipment_receiver'	=>	$receiver,
							'shipment_fee'		=>	$fee);

			$resp = $this->operation->patchData('Order', $id, $order, $this->session->userdata('token'));

			$response = json_decode($resp);
			
			if($resp['info']['http_code'] == 200)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Order has been successfully saved.'));
				redirect('admin/order/edit/'.$id);
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to save order. '.$response->message));
				redirect('admin/order/edit/'.$id);
			}
		}

		if($this->input->post('orderOnHold'))
		{
			$order = array(	'id'				=>	$id, 
							'order_status_id'	=>	12);

			$resp = $this->operation->patchData('Order', $id, $order, $this->session->userdata('token'));
			
			$response = json_decode($resp);
			
			if($resp['info']['http_code'] == 200)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Order has been successfully saved.'));
				redirect('admin/order/edit/'.$id);
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to save order. '.$response->message));
				redirect('admin/order/edit/'.$id);
			}
		}
	}
	
	public function add()
	{	
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_ordermanagement'), base_url('admin/order'));
		$this->mybreadcrumb->add($this->lang->line('brsub_orderadd'), base_url('admin/order/add'));

		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'title'			=> $this->lang->line('page_title_orderadd'));

		$this->page = 'admin/order_add';
		$this->layout();
		
	}

	public function pay()
	{


		// Set variables for paypal form
        $returnURL = base_url().'admin/paypal/success';
        $cancelURL = base_url().'admin/paypal/cancel';
        $notifyURL = base_url().'admin/paypal/ipn';
    


		$shopId = $_REQUEST['shopID'];
		$token = $_REQUEST['token'];
		$receiver = $_REQUEST['receiver'];
		$address = $_REQUEST['address'];
		
    	
        $cart = $this->operation->getData('Cart', $shopId, 0, $token);
    	
    	foreach($cart->shop as $details)
    	{
    		if($details->shop_id == $shopId)
    		{
    			$quantity = $details->total_quantity;
    			$amount = $details->total_amount;
    			$shopname = $details->name_en;

    			foreach($details->payment_method as $pay)
    			{
    				if($pay->code == 'paypal')
    					$merchant = $pay->account_info;
    			}
    			$productname= '';
    			foreach($details->product as $prod)
    			{
    				$productname .= $prod->name_en .' / ';
    			}
    			
    		}
    	}

    	$this->load->library('paypal_lib');
    	
        // Add fields to paypal form
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', $productname);
        $this->paypal_lib->add_field('custom', $token);
        $this->paypal_lib->add_field('business', $merchant);
        $this->paypal_lib->add_field('item_number', $shopId.'+'.$receiver.'+'.$address);
        $this->paypal_lib->add_field('amount',  1);//$amount
        
        // Render paypal form
        $this->paypal_lib->paypal_auto_form();
	}

	public function delete($id)
	{

		$resp = $this->operation->deleteData('Order', $id, $this->session->userdata('token'));
		$response = json_decode($resp['response']);
		if($resp['info']['http_code'] == 200)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Order has been successfully deleted.'));
				redirect('admin/order');
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to delete order. '.$response->message));
				redirect('admin/order');
			}
		
	}
}

?>
