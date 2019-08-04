<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends MY_Controller {

	public function __construct() {
        parent::__construct();     

        if(!$this->session->userdata('logged_in'))
        {
        	redirect('auth/auth/login');
        }
        $this->load->library('operation');
    }

	public function index()
	{
		if($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2) {
			$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
			$this->mybreadcrumb->add($this->lang->line('brsub_shopmanagement'), base_url('admin/shop'));
			$this->mybreadcrumb->add($this->lang->line('brsub_shoplist'), base_url('admin/shop'));
			$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
								'load_js'		=>	'shops_list.js',
								'title'			=>	$this->lang->line('page_title_shoplist')
			);
			$this->page = 'admin/shop_list';
			$this->layout();
		} else {
			redirect('admin/dashboard');
		}
	}

	public function list()
	{
		
		$shops = $this->operation->getList('Shop', 1, 0, $this->session->userdata('token'));

		if($shops)
		{
			foreach($shops as $shop)
			{
				if(isset($shop['id'])) {
				$id = $shop['id'];
				$name = $shop['name_en'];
				$owner = $shop['owner']['first_name'].' '.$shop['owner']['last_name'];
				$email = $shop['owner']['email'];
				$description = $shop['description_en'];
				$category = $shop['category']['name'];
				$status = $shop['status'];
				$operate = '<a href="shop/view/'.$shop['id'].'">Info</a> | ';
				$operate .= '<a href="shop/edit/'.$shop['id'].'">Edit</a>  | ';
				$operate .= '<a href="shop/delete/'.$shop['id'].'">Delete</a>';

				$shopObj[] = array(	'id' 			=>	$id, 
									'name'			=>	$name, 
									'owner'			=>	$owner, 
									'email'			=>	$email, 
									'description'	=>	$description, 
									'category'		=>	$category, 
									'status'		=>	ucfirst($status), 
									'operate'		=>	$operate
								);
				}
			}

			echo json_encode(array('data'=>$shopObj));
		}	
		else {

			echo json_encode(array('data'=>array()));
		}

	}


	public function view($id)
	{
		if(($this->session->userdata('user_shop_id') == $id) || ($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2)) {
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_shopmanagement'), base_url('admin/shop'));
		$this->mybreadcrumb->add($this->lang->line('brsub_shoplist'), base_url('admin/shop'));
		$this->mybreadcrumb->add($this->lang->line('brsub_shopinfo'), base_url('admin/shop/view'));

		$shopObject = $this->operation->getData('Shop', $id, 0, $this->session->userdata('token'));
		$paymentMethodListObject = $this->operation->getList('ShopPaymentMethod', 0, 0, $this->session->userdata('token'));

		$paymethods = array();
		foreach($shopObject->payment_method as $method)
		{
			$paymethods[$method->code] = array('accountinfo' => $method->account_info, 'remarks' => $method->remarks);
		}

		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'load_js'		=>	'shops_function.js',
							'isUpload'		=>	true,
							'shop'			=>  $shopObject,
							'paymentmethods'=> 	$paymentMethodListObject,
							'pmethod'		=>	$paymethods,
							'title'			=>	$this->lang->line('page_title_shopinfo')
		);
		$this->page = 'admin/shop_info';
		$this->layout();
	} else {
		redirect('admin/dashboard');
	}
		
	}

	public function edit($id)
	{
		if(($this->session->userdata('user_shop_id') == $id) || ($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2)) {
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		

		if($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2)
		{
			$this->mybreadcrumb->add($this->lang->line('brsub_shoplist'), base_url('admin/shop'));
			$this->mybreadcrumb->add($this->lang->line('brsub_shopmanagement'), base_url('admin/shop'));
		} else {
			$this->mybreadcrumb->add($this->lang->line('brsub_shopmanagement'), base_url('admin/shop/edit/'.$id));
		}
		
		$this->mybreadcrumb->add($this->lang->line('brsub_shopedit'), base_url('admin/shop/edit'));

		$shopObject = $this->operation->getData('Shop', $id, 0, $this->session->userdata('token'));
		$shopCategoryListObject = $this->operation->getList('ShopCategory', 0, 0, $this->session->userdata('token'));
		$paymentMethodListObject = $this->operation->getList('ShopPaymentMethod', 0, 0, $this->session->userdata('token'));
		$shipmentListObject = $this->operation->getList('ShopShipment', 0, 0, $this->session->userdata('token'));

		$paymethods = array();
		foreach($shopObject->payment_method as $method)
		{
			$paymethods[$method->code] = array('accountinfo' => $method->account_info, 'remarks' => $method->remarks);
		}

		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'load_js'		=>	'shops_function.js',
							'isUpload'		=>	true,
							'id'			=>	$id,
							'shop'			=>  $shopObject,
							'shopcategory'	=>	$shopCategoryListObject,
							'paymentmethods'=> 	$paymentMethodListObject,
							'pmethod'		=>	$paymethods,
							'shipments'		=> 	$shipmentListObject,
							'title'			=>	$this->lang->line('page_title_shopedit')
		);
		
		$this->page = 'admin/shop_edit';
		$this->layout(); } else {
		redirect('admin/dashboard');
	}
		
	}
	
	public function add()
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_shopmanagement'), base_url('admin/shop'));
		$this->mybreadcrumb->add($this->lang->line('brsub_shoplist'), base_url('admin/shop'));
		$this->mybreadcrumb->add($this->lang->line('brsub_shopadd'), base_url('admin/shop/add'));
		$shopCategoryListObject = $this->operation->getList('ShopCategory', 0, 0, $this->session->userdata('token'));
		
		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'shopcategory'	=>	$shopCategoryListObject,
							'title'			=>	'Add New Shop'
		);

		$this->page = 'admin/shop_add';
		$this->layout();
		
	}

	public function save()
	{
		$id = $this->input->post('shop_id');
		$category = $this->input->post('shopcategory');
		$owner = $this->input->post('owner');
		$shopname_en = $this->input->post('shopname_en');
		$shopname_tc = $this->input->post('shopname_tc');
		$shopname_sc = $this->input->post('shopname_sc');
		$status = $this->input->post('status');
		$desc_en = $this->input->post('description_en');
		$desc_tc = $this->input->post('description_tc');
		$desc_sc = $this->input->post('description_sc');
		$shipment_id = $this->input->post('shipment');
		$shipment_amt = $this->input->post('shipment_fee');

		if($this->input->post('addShop'))
		{
			$shop = array('name_en' 		=> 	$shopname_en,
					 	  'name_tc' 		=> 	$shopname_tc,
					 	  'name_sc'			=>	$shopname_sc,
					 	  'category_id'		=>	$category,
					 	  'status_id'		=>	$status,
					 	  'description_en'	=>	$desc_en,
					 	  'description_tc'	=>	$desc_tc,
					 	  'description_sc'	=>	$desc_sc
			);

			$resp = $this->operation->postData('Shop', $shop, $this->session->userdata('token'));
			
			if($resp['info']['http_code'] == 201)
			{	$shopArray = json_decode($resp['response']);

				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Shop has been successfully added.'));
				redirect('admin/shop/edit/'.$shopArray->id);
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to save shop.'));
				redirect('admin/shop/add');
			}

		}
		if($this->input->post('enableButton') || $this->input->post('disableButton'))
		{	
			
			$shop = array('id'				=>	$id,
						  'name_en'			=>	$shopname_en,
						  'name_tc'			=>	$shopname_tc,
						  'name_sc'			=>	$shopname_sc,
						  'category_id'		=>	$category,
						  'status_id'		=>	$this->input->post('enableButton') ? 1 : 2,
						  'description_en'	=>	$desc_en,
						  'description_tc'	=>	$desc_tc,
						  'description_sc'	=>	$desc_sc
					);


			$resp = $this->operation->patchData('Shop', $id, $shop, $this->session->userdata('token'));


			if($resp && $this->curl->info['http_code'] == 201)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Shop has been successfully saved.'));
				redirect('admin/shop/edit/'.$id);
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to save shop.'));
				redirect('admin/shop/edit/'.$id);
			}
		}
		if($this->input->post('saveShop'))
		{	

			$shop = array('id'				=>	$id,
						  'name_en'			=>	$shopname_en,
						  'name_tc'			=>	$shopname_tc,
						  'name_sc'			=>	$shopname_sc,
						  'category_id'		=>	$category,
						  'status_id'		=>	$status,
						  'description_en'	=>	$desc_en,
						  'description_tc'	=>	$desc_tc,
						  'description_sc'	=>	$desc_sc
					);
				
			$resp = $this->operation->patchData('Shop', $id, $shop, $this->session->userdata('token'));
			$response = json_decode($resp['response']);
			if($resp && $resp['info']['http_code'] == 201)
			{	
				
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Shop has been successfully saved.'));
				redirect('admin/shop/edit/'.$id.'#info');
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to save shop. '.$response->message));
				redirect('admin/shop/edit/'.$id.'#info');
			}
		}

		if($this->input->post('savPaymentMethod'))
		{	
			$methods = $this->operation->getList('ShopPaymentMethod', 0, 0, $this->session->userdata('token'));
			
				foreach($methods as $method)
				{
					$shopPay = array(	'shop_id'			=>	$id, 
										'payment_method_id'	=>	$this->input->post($method->code.'_'.$method->id),
										'account_info'		=>	$this->input->post('accountinfo_'.$method->code),
										'remarks'			=>	$this->input->post('remarks_'.$method->code) );
					
					if($this->input->post('hasPaymentMethod_'.$method->code))
						$payResp = $this->operation->patchData('ShopPaymentMethod', $id, $shopPay, $this->session->userdata('token'));
					else
						$payResp = $this->operation->postData('ShopPaymentMethod', $shopPay, $this->session->userdata('token'));

					$response = json_decode($payResp['response']);
					
					if($response->message){
						if($response->success == 'true')
					{
						$err[] = true;
					}
					else {
						$err[] = false;
						$err_resp .= $response->message;
					}
					}
					
				}  
				
				if(in_array(false, $err))
				{
					$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to save payment method. '.$err_resp));
					redirect('admin/shop/edit/'.$id.'#payment');
				} else {
					$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Payment method has been successfully saved.'));
				redirect('admin/shop/edit/'.$id.'#payment');
				}
		}

		if($this->input->post('saveShipment'))
		{
			$shipment = array('shop_id'		=>	$id,
								  'shipment_id'	=>	$shipment_id,
								  'amount'		=>	$shipment_amt);

			$shipmentResp = $this->operation->patchData('ShopShipment', $id, $shipment, $this->session->userdata('token'));
			$response = json_decode($shipmentResp['response']);
			if($shipmentResp && $shipmentResp['info']['http_code'] == 201)
			{	
				
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Shipment has been successfully saved.'));
				redirect('admin/shop/edit/'.$id.'#shipment');
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to save shipment. '.$response->message));
				redirect('admin/shop/edit/'.$id.'#shipment');
			}
		}
	}

	public function delete($id)
	{
		if(($this->session->userdata('user_shop_id') == $id) || ($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2)) {
		$resp = $this->operation->deleteData('Shop', $id, $this->session->userdata('token'));
		$response = json_decode($resp['response']);
		if($resp['info']['http_code'] == 200)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Shop has been successfully deleted.'));
				redirect('admin/shop');
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to delete shop. '.$response->message));
				redirect('admin/shop');
			}
		} else {
			redirect('admin/dashboard');
		}
	}

	public function upload($id)
	{ 

		$target_dir = APPPATH . '../uploads/files/shop/';
		$target_file = $target_dir.$_FILES['image']['name'];

		  $msg = ""; 
		  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
		  {

		  	$type = pathinfo($target_file, PATHINFO_EXTENSION);
		  	$path = curl_file_create($target_file,'image/'.$type,$_FILES['image']['name']);
		  	$img = array('image'=>$path);
				if($img)
				{
				 	$ImageResponseUrl = $this->operation->upload($img, $this->session->userdata('token'));
				 	$ImageUrl = json_decode($ImageResponseUrl);

				 	if($ImageUrl->file_url)
				 	{	
				 		unlink($target_file);
				 		$addImage = array('id'=>$id, 'image_url'=>$ImageUrl->file_url);
				 		$uploadResponse = $this->operation->assignImage($addImage, 'Shop', $this->session->userdata('token'));

				 	} 	 
				}	
		   }	
	}

	public function deleteImage()
	{
		$img_url = $_POST['img_url'];
		$id = $_POST['id'];

		$data = array('image_url'=>$img_url);

		$resp = $this->operation->deleteImage('ShopImage', $id, $data, $this->session->userdata('token'));

		if($resp['info']['http_code'] == 201)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Image has been successfully deleted.'));
				redirect('admin/shop/edit/'.$id);
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to delete image.'));
				redirect('admin/shop/edit/'.$id);
			}
	}

	public function commentList($id)
	{

		$comments = $this->operation->getList('ShopComment', 1, $id, $this->session->userdata('token'));

		if($comments) {
			foreach($comments as $c)
			{
				$cid = $c['comment_id'];
				$comment = $c['content'];
				$user = $c['user_name'];
				$datetime = $c['posted_date'];
				$operate = '<a href="shop/view/'.$cid.'">Info</a> | ';
				$operate .= '<a href="shop/edit/'.$cid.'">Edit</a>  | ';
				$operate .= '<a href="shop/delete/'.$cid.'">Delete</a>';

				$commentObj[] = array('id'		=>	$cid, 
									'user'		=>	$user, 
									'message'	=>	$comment, 
									'datetime'	=>	$datetime, 
									'operate'	=>	$operate
								);
				
			}
			echo json_encode(array('data'=>$commentObj));
		} else {

			echo json_encode(array('data'=>array()));
		}
	}

	public function productList($id)
	{

		
		$prod = $this->operation->getList('Product', 1, $id, $this->session->userdata('token'));


		if($prod)
		{
			foreach($prod as $key=>$value)
			{
				if(isset($value['id']))
				{
			
					$id 				= 	$value['id'];
					$name_en 			= 	$value['name_en'];
					$originalprice 		= 	$value['price_original'];
					$discountedprice 	= 	$value['price_discounted'];
					$sell 				= 	$value['sell'];
					$stock 				= 	$value['stock'];
					$status 			= 	$value['status'];

					$product[] = array(	'id'				=>	$id,
										'name_en'			=>	$name_en, 
										'originalprice'		=>	$originalprice, 
										'discountedprice'	=>	$discountedprice, 
										'sell'				=>	$sell,
										'stock'				=>	$stock, 
										'status'			=>	ucfirst($status)
									);

				}
			}

			echo (json_encode(array('data'=>$product)));
		}
		else 
		{
			echo json_encode(array('data'=>array()));
		}
	
	}

	public function orderList($id)
	{
	
			$order = $this->operation->getList('Order', 1, $id, $this->session->userdata('token'));

		if($order)
		{
			foreach($order as $key=>$value)
			{
				if(isset($value['id']))
				{
					$orderdate			= 	$value['order_date'];
					$createdate 		= 	$value['created_at'];
					$id 				= 	$value['id'];
					$buyer 				= 	$value['user']['username'];
					$orderstatus 		= 	$value['order_status'];
					$paymentstatus 		= 	$value['payment_status'];
					$price 				= 	number_format($value['shop_order']['total_amount'], 2);

					$orderlist[] = array('orderdate'	=>	$orderdate, 
										'createdate'	=>	$createdate, 
										'id'			=>	$id, 
										'buyer' 		=>	$buyer, 
										'orderstatus'	=>	$orderstatus,
										'paymentstatus'	=>	$paymentstatus,
										'price'			=>	ucfirst($price)
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
}

?>
