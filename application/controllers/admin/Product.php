<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends MY_Controller {

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
		
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_productmanagement'), base_url('admin/product'));
		$this->mybreadcrumb->add($this->lang->line('brsub_productlist'), base_url('admin/product'));
		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'load_js'		=>	'products_list.js',
							'title'			=>	$this->lang->line('page_title_productlist'));

		$this->page = 'admin/product_list';
		$this->layout(); 
		
	}

	public function lists()
     {

          // Datatables Variables
          $draw = intval($this->input->post("draw"));
          $start = intval($this->input->post("start"));
          $length = intval($this->input->post("length"));

          if($this->session->userdata('level_id') == 3)
			$prod = $this->operation->getList('Product', 1, $this->session->userdata('user_shop_id'), $this->session->userdata('token'));
		else
			$prod = $this->operation->getList('Product', 1, 0, $this->session->userdata('token'));


          $data = array();

          foreach($prod as $value) {
          	if(isset($value['id']))
				{
               $data[] = array(
                    $value['id'],
                    $value['category']['name'],
                    $value['name_en'],
                    $value['shop']['name_en'],
					$value['price_original'] ? $value['price_original'] : 0.00,
					$value['price_discounted'] ? $value['price_discounted'] : 0.00,
					$value['sell'],
					$value['stock'],
					$value['status'],
					'<a href="product/view/'.$value['id'].'">Info</a> | <a href="product/edit/'.$value['id'].'">Edit</a> | <a href="product/delete/'.$value['id'].'">Delete</a>'
               );
           }
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => count($prod),
                 "recordsFiltered" => count($prod),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
     }

	public function list()
	{
		if($this->session->userdata('level_id') == 3)
			$prod = $this->operation->getList('Product', 1, $this->session->userdata('user_shop_id'), $this->session->userdata('token'));
		else
			$prod = $this->operation->getList('Product', 1, 0, $this->session->userdata('token'));

		if($prod)
		{
			foreach($prod as $value)
			{
				if(isset($value['id']))
				{
			
					$id 				= 	$value['id'];
					$category 			= 	$value['category']['name'];
					$name_en 			= 	$value['name_en'];
					$shop 				= 	$value['shop']['name_en'];
					$name_sc 			= 	$value['name_sc'];
					$name_tc 			= 	$value['name_tc'];
					$desc_en 			= 	$value['description_en'];
					$desc_sc 			= 	$value['description_sc'];
					$desc_tc 			= 	$value['description_tc'];
					$originalprice 		= 	$value['price_original'] ? $value['price_original'] : 0.00;
					$discountedprice 	= 	$value['price_discounted'] ? $value['price_discounted'] : 0.00;
					$sell 				= 	$value['sell'];
					$stock 				= 	$value['stock'];
					$status 			= 	$value['status'];
					$operate 			=  	'<a href="product/view/'.$id.'">Info</a> | ';
					$operate 			.= 	'<a href="product/edit/'.$id.'">Edit</a> | ';
					$operate 			.= 	'<a href="product/delete/'.$id.'">Delete</a>';

					$product[] = array(	'id'				=>	$id, 
										'category'			=>	$category, 
										'name_en'			=>	$name_en, 
										'shop' 				=>	$shop, 
										'name_sc'			=>	$name_sc,
										'name_tc'			=>	$name_tc, 
										'desc_en'			=>	$desc_en, 
										'desc_sc'			=>	$desc_sc, 
										'desc_tc'			=>	$desc_tc,
										'originalprice'		=>	$originalprice, 
										'discountedprice'	=>	$discountedprice, 
										'sell'				=>	$sell,
										'stock'				=>	$stock, 
										'status'			=>	ucfirst($status), 
										'operate'			=>	$operate
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

	public function view($id)
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_productmanagement'), base_url('admin/product'));
		$this->mybreadcrumb->add($this->lang->line('brsub_productlist'), base_url('admin/product'));
		$this->mybreadcrumb->add($this->lang->line('brsub_productinfo'), base_url('admin/product/view'));

		$productListObject = $this->operation->getData('Product', $id, 0, $this->session->userdata('token'));

		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'load_js'		=>	'products_function.js',
							'isUpload'		=>	true,
							'controller'	=>	'product',
							'var_id'		=>	$id,
							'product'		=>  $productListObject,
							'title'			=>	$this->lang->line('page_title_productinfo'));
		
		$this->page = 'admin/product_info';
		$this->layout();
		
	}

	public function edit($id)
	{
		//breadcrumbs
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_productmanagement'), base_url('admin/product'));
		$this->mybreadcrumb->add($this->lang->line('brsub_productlist'), base_url('admin/product'));
		$this->mybreadcrumb->add($this->lang->line('brsub_productedit'), base_url('admin/product/edit'));

		$productListObject = $this->operation->getData('Product', $id, 0, $this->session->userdata('token'));
		$productCategoryListObject = $this->operation->getList('ProductCategory', 0, 0, $this->session->userdata('token'));
		$productColorListObject = $this->operation->getList('Color', 0, 0, $this->session->userdata('token'));
		$productSizeListObject = $this->operation->getList('Size', 0, 0, $this->session->userdata('token'));
		$productStatusObject = $this->operation->getList('ProductStatus', 0, 0, $this->session->userdata('token'));
		
		//organize data
		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'controller'	=>	'product',
							'load_js'		=>	'products_function.js',
							'isUpload'		=>	true,
							'var_id'		=>	$id,
							'product'		=>  $productListObject,
							'productcategory'	=>	$productCategoryListObject,
							'colors'		=>	$productColorListObject,
							'sizes'			=>	$productSizeListObject,
							'statuses'		=>	$productStatusObject,
							
							'title'			=>	$this->lang->line('page_title_productedit'));
		$this->page = 'admin/product_edit';
		$this->layout();
		
	}
	
	public function add()
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_productmanagement'), base_url('admin/product'));
		$this->mybreadcrumb->add($this->lang->line('brsub_productlist'), base_url('admin/product'));
		$this->mybreadcrumb->add($this->lang->line('brsub_productadd'), base_url('admin/product/add'));

		$productCategoryListObject = $this->operation->getList('ProductCategory', 0, 0, $this->session->userdata('token'));
		$productStatusObject = $this->operation->getList('ProductStatus', 0, 0, $this->session->userdata('token'));
		/*$productColorListObject = $this->operation->getList('Color', 0, 0, $this->session->userdata('token'));
		$productSizeListObject = $this->operation->getList('Size', 0, 0, $this->session->userdata('token'));*/

		//organize data
		$this->data = array('breadcrumbs'		=>	$this->mybreadcrumb->render(),
							'load_js'			=>	'products_function.js',
							'productcategory'	=>	$productCategoryListObject,
							'statuses'			=>	$productStatusObject,
							/*'colors'			=>	$productColorListObject,
							'sizes'				=>	$productSizeListObject,*/
							'title'				=>	$this->lang->line('page_title_productadd'));

		$this->page = 'admin/product_add';
		$this->layout();
		
	}

	public function upload($id)
	{ 

		$target_dir = APPPATH . '../uploads/files/products/';
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
				 		$uploadResponse = $this->operation->assignImage($addImage, 'Product', $this->session->userdata('token'));

				 	} 	 
				}	
		   }	
	}

	public function deleteImage()
	{
		$img_url = $_POST['img_url'];
		$id = $_POST['id'];

		$data = array('image_url'=>$img_url);

		$resp = $this->operation->deleteImage('ProductImage', $id, $data, $this->session->userdata('token'));

		return $resp;

	}

	public function save()
	{

		$id = $this->input->post('product_id');
		$sku = $this->input->post('sku');
		$name_en = $this->input->post('productname_en');
		$name_tc = urlencode($this->input->post('productname_tc'));
		$name_sc = urlencode($this->input->post('productname_sc'));
		$category = $this->input->post('productcategory');
		$status = $this->input->post('status');
		$originalprice = $this->input->post('originalprice');
		$discountprice = $this->input->post('discountprice');
		$description_en = $this->input->post('description_en');
		$description_tc = urlencode($this->input->post('description_tc'));
		$description_sc = urlencode($this->input->post('description_sc'));
		$shipmentprice = $this->input->post('shipmentprice') ? $this->input->post('shipmentprice') : 0;

		$row_ids = $this->input->post('row_id');
		$sizes = $this->input->post('size');
		$colors = $this->input->post('color');
		$others = $this->input->post('other');
		$stocks = $this->input->post('stock');
		$orig_stocks = $this->input->post('orig_stock');

		$toremove = explode("+",$this->input->post('toremove'));

		$stockData = array(	'attribute_id'		=>	$row_ids, 
							'size_id'			=>	$sizes, 
							'color_id'			=>	$colors, 
							'other'			=>	$others, 
							'stock'			=>	$stocks, 
							'orig_stock'	=>	$orig_stocks
						);

		if($this->input->post('saveProduct'))
		{
			
			$product = array(
					'id'				=>		$id,
					'sku'				=>		$sku,
					'name_en'			=>		$name_en,
					'name_tc'			=>		$name_tc,
					'name_sc'			=>		$name_sc,
					'category_id' 		=> 		$category,
					'status_id' 		=> 		$status,
					'price_original' 	=> 		$originalprice,
					'price_discounted' 	=> 		$discountprice,
					'description_en' 	=> 		$description_en,
					'description_tc'	=>		$description_tc,
					'description_sc'	=>		$description_sc,
					'shipping_price'	=>		$shipmentprice
					);

			$resp = $this->operation->patchData('Product', $id, $product, $this->session->userdata('token'));

			$response = json_decode($resp);
			
			if($resp['info']['http_code'] == 201)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Product has been successfully saved.'));
				redirect('admin/product/edit/'.$id."#details");
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to save product. '.$response->message));
				redirect('admin/product/edit/'.$id."#details");
			}
		}

		if($this->input->post('saveStock'))
		{
			$resp = $this->operation->PostProductStock($id, $stockData, $this->session->userdata('token'));
			$resp2 = $this->operation->PutProductStock($id, $stockData, $this->session->userdata('token'));
			$resp3 = $this->operation->DeleteStock($id, $toremove, $this->session->userdata('token'));

			if($resp && $resp2 && $resp3)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Product stock has been successfully saved.'));
				redirect('admin/product/edit/'.$id."#stock");
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to save product stock.'));
				redirect('admin/product/edit/'.$id."#stock");
			}
			
		}

		if($this->input->post('enableButton') || $this->input->post('disableButton'))
		{
			
			$product = array(
					'id'				=>		$id,
					'sku'				=>		$sku,
					'name_en'			=>		$name_en,
					'name_tc'			=>		$name_tc,
					'name_sc'			=>		$name_sc,
					'category_id' 		=> 		$category,
					'status_id' 		=> 		$this->input->post('enableButton') ? 1 : 2,
					'price_original' 	=> 		$originalprice,
					'price_discounted' 	=> 		$discountprice,
					'description_en' 	=> 		$description_en,
					'description_tc'	=>		$description_tc,
					'description_sc'	=>		$description_sc,
					'shipping_price'	=>		$shipmentprice
					);
			
			$resp = $this->operation->patchData('Product', $id, $product, $this->session->userdata('token'));
			
			if($resp['info']['http_code'] == 201)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Product has been successfully saved.'));
				redirect('admin/product/edit/'.$id);
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to save product.'));
				redirect('admin/product/edit/'.$id);
			}
		}

		if($this->input->post('addProduct'))
		{
			if ($discountprice) 
			
				$attr = "'price_discounted' 	=> 		$discountprice,";
			 else 
			 	$attr = "";
			$product = array(
					'sku'				=>		$sku,
					'name_en'			=>		$name_en,
					'name_tc'			=>		$name_tc,
					'name_sc'			=>		$name_sc,
					'category_id' 		=> 		$category,
					'status_id' 		=> 		$status,
					'price_original' 	=> 		$originalprice,
					$attr.'description_en' 	=> 		$description_en,
					'description_tc'	=>		$description_tc,
					'description_sc'	=>		$description_sc,
					'shipping_price'	=>		$shipmentprice,
					'shop_id'			=>		$this->session->userdata('user_shop_id'),
					'stock'				=>		0
					);

			if($this->session->userdata('user_shop_id'))
			{
				$resp = $this->operation->postData('Product', $product, $this->session->userdata('token'));
				$response = json_decode($resp['response']);
				
				if($resp['info']['http_code'] == 201)
				{	
					$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Product has been successfully saved.'));
					redirect('admin/product/edit/'.$response->id);
				} else {
					$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to save product. '.$response->message));
					redirect('admin/product/add');
				}
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Create Shop first before adding product.'));
					redirect('admin/product/add');
			}
			
		}
	}


	public function delete($id)
	{
		$resp = $this->operation->deleteData('Product', $id, $this->session->userdata('token'));

		if($resp['info']['http_code'] == 200)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Product has been successfully deleted.'));
				redirect('admin/product');
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to delete product.'));
				redirect('admin/product');
			}
	}

	public function deleteattribute($id)
	{
		$resp = $this->operation->deleteData('ProductAttribute', $id, $this->session->userdata('token'));
		echo json_encode($resp);
	}

}

?>
