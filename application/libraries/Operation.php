<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Class to call data from API
 */
class Operation
{

	protected $entity;
	protected $id;
	protected $isDecode;
	protected $data;
	var $CI;


   	 public function __construct($entity = null, $id = null, $isDecode = 1, $data = null)
   	 {
   	 	

   	 }

	public function getList($entity, $isDecode, $id, $token)
	{
		$CI =& get_instance();
	    $CI->config->load('api_config');
	    $CI->load->library('curl');
	    $size = '?page_size=1000';
	    switch($entity)
	    {
	    	case 'Product':
	    	{
	    		if($id)
	    			$api = $CI->config->item('Product').$size.'&shop_id='.$id;
	    		else
	    			$api = $CI->config->item('Product').$size;
	    		break;
	    	}
	    		
	    	case 'ProductCategory':
	    		$api = $CI->config->item('ProductCategory').$size;
	    		break;
	    	case 'Shop':
	    		$api = $CI->config->item('Shop').$size;
	    		break;
	    	case 'ShopCategory':
	    		$api = $CI->config->item('ShopCategory').$size;
	    		break;
	    	case 'ShopComment':
	    		$api = $CI->config->item('ShopComment').'/'.$id;;
	    		break;	
	    	case 'User':
	    	{
	    		$api = $CI->config->item('User').$size;
	    		break;
	    	}
	    		
	    	case 'UserType':
	    		$api = $CI->config->item('UserType');
	    		break;
	    	case 'UserStatus':
	    		$api = $CI->config->item('UserStatus');
	    		break;
	    	case 'Blog':
	    		$api = $CI->config->item('Blog').$size;;
	    		break;
	    	case 'BlogCategory':
	    		$api = $CI->config->item('BlogCategory').$size;;
	    		break;
	    	case 'BlogComment':
	    		$api = $CI->config->item('BlogComment').'/'.$id;
	    		break;
	    	case 'Color':
	    		$api = $CI->config->item('Color');
	    		break;
	    	case 'Size':
	    		$api = $CI->config->item('Size');
	    		break;
	    	case 'CategoryStatus':
	    		$api = $CI->config->item('CategoryStatus');
	    		break;
	    	case 'ProductStatus':
	    		$api = $CI->config->item('ProductStatus');
	    		break;
	    	case 'ShopPaymentMethod':
	    		$api = $CI->config->item('ShopPaymentMethod');
	    		break;
	    	case 'ShopShipment':
	    		$api = $CI->config->item('ShopShipment');
	    		break;
	    	case 'Order':
	    		if($id)
	    			$concat = '&shop_id='.$id;
	    		else
	    			$concat = '';
	    		$api = $CI->config->item('Order').$size.$concat;
	    		break;
	    	case 'OrderStatus':
	    		$api = $CI->config->item('OrderStatus');
	    		break;
	    	case 'PaymentStatus':
	    		$api = $CI->config->item('PaymentStatus');
	    		break;
	    }
	 

	    $CI->curl->create($api);
		$CI->curl->option('returntransfer', 1);
		$CI->curl->option(CURLOPT_HTTPHEADER, array('Content-type: application/json; Charset=UTF-8', 'token: '.$token));
		$object = $CI->curl->execute();

		if($isDecode)
			$resp = json_decode($object, true);
		else
			$resp = json_decode($object);

		return $resp;
	}

	public function getData($entity, $id, $isDecode, $token)
	{
		$CI =& get_instance();
	    $CI->config->load('api_config');
	    $CI->load->library('curl');

	    switch($entity)
	    {
	    	case 'Product':
	    		$api = $CI->config->item('Product').'/'.$id;
	    		break;
	    	case 'ProductCategory':
	    		$api = $CI->config->item('ProductCategory').'/'.$id;
	    		break;
	    	case 'Shop':
	    		$api = $CI->config->item('Shop').'/'.$id;
	    		break;
	    	case 'ShopCategory':
	    		$api = $CI->config->item('ShopCategory').'/'.$id;
	    		break;
	    	case 'ShopComment':
	    		$api = $CI->config->item('ShopComment').'/'.$id;
	    		break;
	    	case 'User':
	    		$api = $CI->config->item('User').'/'.$id;
	    		break;
	    	case 'Logout':
	    		$api = $CI->config->item('Logout');
	    		break;
	    	case 'Blog':
	    		$api = $CI->config->item('Blog').'/'.$id;
	    		break;
	    	case 'BlogCategory':
	    		$api = $CI->config->item('BlogCategory').'/'.$id;
	    		break;
	    	case 'Order':
	    		$api = $CI->config->item('Order').'/'.$id;
	    		break;
	    	case 'Cart':
	    		$api = $CI->config->item('Cart').'/'.$id;
	    		break;
	    }

		$CI->curl->create($api);
		$CI->curl->option('returntransfer', 1);
		$CI->curl->option(CURLOPT_HTTPHEADER, array('Content-type: application/json; Charset=UTF-8', 'token: '.$token));
		$object = $CI->curl->execute();

		if($isDecode)
			$resp = json_decode($object, true);
		else
			$resp = json_decode($object);

		return $resp;
	}

	public function patchData($entity, $id, $data, $token)
	{
		$CI =& get_instance();
	    $CI->config->load('api_config');
	    $CI->load->library('curl');

	    switch($entity)
	    {
	    	case 'Product':
	    		$api = $CI->config->item('Product').'/'.$id.'?sku='.$data['sku'].'&name_en='.$data['name_en'].'&name_tc='.$data['name_tc'].'&name_sc='.$data['name_sc'].'&category_id='.$data['category_id'].'&status_id='.$data['status_id'].'&price_original='.$data['price_original'].'&price_discounted='.$data['price_discounted'].'&description_en='.$data['description_en'].'&description_tc='.$data['description_tc'].'&description_sc='.$data['description_sc'].'&shipping_price='.$data['shipping_price'];
	    		break;
	    	case 'ProductCategory':
	    		$api = $CI->config->item('ProductCategory').'/'.$id.'?name='.$data['name'].'&status_id='.$data['status_id'].'&parent_category_id='.$data['parent_category_id'];
	    		break;
	    	case 'Shop':
	    		$api = $CI->config->item('Shop').'/'.$id;/*.'?name_en='.$data['name_en'].'&name_tc='.$data['name_tc'].'&name_sc='.$data['name_sc'].'&category_id='.$data['category_id'].'&status_id='.$data['status_id'].'&description_en='.$data['description_en'].'&description_tc='.$data['description_tc'].'&description_sc='.$data['description_sc'];*/
	    		break;
	    	case 'User':
	    		$api = $CI->config->item('User').'/'.$id;//.'?username='.$data['username'].'&usertype='.$data['usertype'].'&first_name='.$data['first_name'];
	    		break;
	    	case 'Blog':
	    		$api = $CI->config->item('Blog').'/'.$id.'?shop_id='.$data['shop_id'].'&title_en='.$data['title_en'].'&title_tc='.$data['title_tc'].'&title_sc='.$data['title_sc'].'&category_id='.$data['category_id'].'&status_id='.$data['status_id'].'&content_en='.$data['content_en'].'&content_tc='.$data['content_tc'].'&content_sc='.$data['content_sc'].'&is_top='.$data['is_top'];
	    		break;
	    	case 'BlogCategory':
	    		$api = $CI->config->item('BlogCategory').'/'.$id.'?name='.$data['name'].'&status_id='.$data['status_id'];
	    		break;
	    	case 'ShopPaymentMethod':
	    		$api = $CI->config->item('ShopPaymentMethod');
	    		break;
	    	case 'ShopShipment':
	    		$api = $CI->config->item('ShopShipment');
	    		break;
	    	case 'UpdatePassword':
	    		$api = $CI->config->item('UpdatePassword').'/'.$id;
	    		break;
	    	case 'ProductAttribute':
	    		$api = $CI->config->item('ProductAttribute').'/'.$id;
	    		break;
	    	case 'Order':
	    		$api = $CI->config->item('Order').'/'.$id;
	    		break;
	    }

	
		$headers = array('Content-Type: application/json', 'token: '.$token);
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $api);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_FAILONERROR, false);
		curl_setopt($curl, CURLINFO_HEADER_OUT, true);

		$object = curl_exec($curl);
		$info = curl_getinfo($curl);
		$errno = curl_errno($curl);
		curl_close($curl);
	
		$resp = array('response'=>$object, 'error_code'=>$errno,  'info'=>$info);
	
		return $resp;
	}

	public function postData($entity, $data, $token)
	{
		$CI =& get_instance();
	    $CI->config->load('api_config');
	    $CI->load->library('curl');

	    switch($entity)
	    {
	    	case 'Login':
	    	{
	    		$api = $CI->config->item('Login');
	    		$token = 'hkshopu';
	    		break;
	    	}
	    	case 'Register':
	    	{
	    		$api = $CI->config->item('Register');
	    		/*'?username='.$data['username'].'&first_name='.$data['first_name'].'&last_name='.$data['last_name'].'&email='.$data['email'].'&password='.$data['password'].'&shop_name_en='.$data['shop_name_en'].'&shop_name_tc='.$data['shop_name_tc'].'&shop_name_sc='.$data['shop_name_sc'].'&shop_category_id='.$data['shop_category_id'];*/
	    		$token = 'hkshopu';
	    		break;
	    	}
	    	case 'Product':
	    		$api = $CI->config->item('Product');
	    		break;
	    	case 'ProductCategory':
	    		$api = $CI->config->item('ProductCategory');
	    		break;
	    	case 'Shop':
	    		$api = $CI->config->item('Shop');
	    		break;
	    	case 'User':
	    		$api = $CI->config->item('User');
	    		break;
	    	case 'Blog':
	    		$api = $CI->config->item('Blog');
	    		break;
	    	case 'BlogCategory':
	    		$api = $CI->config->item('BlogCategory');
	    		break;
	    	case 'ShopPaymentMethod':
	    		$api = $CI->config->item('ShopPaymentMethod');
	    		break;
	    	case 'Order':
	    		$api = $CI->config->item('Order');
	    		break;
	    }


	    $CI->curl->create($api);	
		$CI->curl->option(CURLOPT_HTTPHEADER, array('Content-type: application/json; Charset=UTF-8', 'token: '.$token));	
		$CI->curl->option(CURLOPT_FAILONERROR, false);
		$CI->curl->post(json_encode($data));
		$object = $CI->curl->execute();

		$resp = array('response'=>$object, 'error_code'=>$CI->curl->error_code, 'error_string'=>$CI->curl->error_string, 'info'=>$CI->curl->info);
		
		return $resp;
	}

	public function deleteData($entity, $id, $token)
	{
		$CI =& get_instance();
	    $CI->config->load('api_config');
	    $CI->load->library('curl');

	    switch($entity)
	    {
	    	case 'Product':
	    		$api = $CI->config->item('Product').'/'.$id;
	    		break;
	    	case 'ProductCategory':
	    		$api = $CI->config->item('ProductCategory').'/'.$id;
	    		break;
	    	case 'Shop':
	    		$api = $CI->config->item('Shop').'/'.$id;
	    		break;
	    	case 'User':
	    		$api = $CI->config->item('User').'/'.$id;
	    		break;
	    	case 'Blog':
	    		$api = $CI->config->item('Blog').'/'.$id;
	    		break;
	    	case 'BlogCategory':
	    		$api = $CI->config->item('BlogCategory').'/'.$id;
	    		break;
	    	case 'ProductStock':
	    		$api = $CI->config->item('ProductStock').'/'.$id;
	    		break;
	    	case 'Order':
	    		$api = $CI->config->item('Order').'/'.$id;
	    		break;
	    }

	
	    $CI->curl->create($api);	
		$CI->curl->option(CURLOPT_HTTPHEADER, array('Content-type: application/json; Charset=UTF-8', 'token: '.$token));	
		$CI->curl->option(CURLOPT_FAILONERROR, false);
		$CI->curl->delete(array('id'=>$id));
		$object = $CI->curl->execute();
		$resp = array('response'=>$object, 'error_code'=>$CI->curl->error_code, 'error_string'=>$CI->curl->error_string, 'info'=>$CI->curl->info);
		return $resp;
	}

	

	public function PostProductStock($id, $data, $token)
	{
		$CI =& get_instance();
	    $CI->config->load('api_config');
	    $CI->load->library('curl');

	    $row_ids = $data['attribute_id'];
		$sizes 	= $data['size_id'];
		$colors = $data['color_id'];
		$others = $data['other'];
		$stocks = $data['stock'];
		$orig_stocks = $data['orig_stock'];

	    foreach ($stocks as $key => $value ) 
        {
        	
        	$row_id = $row_ids[$key];
	        $stock = $value;
	        $color = $colors[$key];
	        $other = $others[$key];
	        $size = $sizes[$key];
	        $stock = $stocks[$key];
	        /*$orig_stock = $orig_stocks[$key];
	        $new_stock = $row_id ? $stock - $orig_stock : $stock;*/

	
	        	$productStock = array('product_id' => $id, 'size_id' =>	$size, 'color_id' => $color, 'other' => $other, 'stock' => $stock);
	       
	            
	            $productStockUrl = $CI->config->item('ProductStock') . '/'.$id;

	            $CI->curl->create($productStockUrl);	
				$CI->curl->option(CURLOPT_HTTPHEADER, array('Content-type: application/json; Charset=UTF-8', 'token: '.$token));			
				$CI->curl->post(json_encode($productStock));
				$rep = $CI->curl->execute();
				$err = $CI->curl->error_code ? true : false; 
				$resp[] = $err;
        	}

        	if(in_array(true, $resp))
        		return false;
        	else
        		return true;
	}

	public function PutProductStock($id, $data, $token)
	{
		$CI =& get_instance();
	    $CI->config->load('api_config');
	    $CI->load->library('curl');

	    $row_ids = $data['attribute_id'];
		$sizes 	= $data['size_id'];
		$colors = $data['color_id'];
		$others = $data['other'];
		$stocks = $data['stock'];
		$orig_stocks = $data['orig_stock'];

	    foreach ($stocks as $key => $value ) 
        {
        	
        	$row_id = $row_ids[$key];
	        $stock = $value;
	        $color = $colors[$key];
	        $other = $others[$key];
	        $size = $sizes[$key];
	        $stock = $stocks[$key];
	        /*$orig_stock = $orig_stocks[$key];
	        $new_stock = $row_id ? $stock - $orig_stock : $stock;*/


	          	$productStock = array('product_id' => $id, 'attribute_id' => $row_id, 'size_id' =>	$size, 'color_id' => $color, 'other' => $other, 'stock' => $stock);
	       
	       
	            $productStockUrl = $CI->config->item('ProductStock') . '/'.$id;

	            /*$CI->curl->create($productStockUrl);	
				$CI->curl->option(CURLOPT_HTTPHEADER, array('Content-type: application/json; Charset=UTF-8', 'token: '.$token));			
				$CI->curl->put(json_encode($productStock));
				$object = $CI->curl->execute();
				$err = $CI->curl->error_code ? true : false; 
				$resp[] = $err;
				print_r($productStock);*/

				$headers = array('Content-Type: application/json', 'token: '.$token);
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $productStockUrl);
			curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
			curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($productStock));
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_FAILONERROR, false);
			curl_setopt($curl, CURLINFO_HEADER_OUT, true);

			$object = curl_exec($curl);
			$info = curl_getinfo($curl);
			$errno = curl_errno($curl);
			$err = $errno ? true : false; 
				$resp[] = $err;

        	} 

        	if(in_array(true, $resp))
        		return false;
        	else
        		return true;
	}

	public function DeleteStock($id, $data, $token)
	{
		$CI =& get_instance();
	    $CI->config->load('api_config');
	    $CI->load->library('curl');

	 
	    $api = $CI->config->item('ProductStock').'/'.$id;

		foreach($data as $rem)
		{
			if($rem != '' && $rem != 0)
				{
					$data = array('product_id' => $id, 'attribute_id' => $rem);
					
					$CI->curl->create($api);	
					$CI->curl->option(CURLOPT_HTTPHEADER, array('Content-type: application/json; Charset=UTF-8', 'token: '.$token));	
					$CI->curl->delete(json_encode($data));
					$object = $CI->curl->execute();
					$err = $CI->curl->error_code ? true : false; 
					$resp[] = $err;
				}
				
        }

        	if(in_array(true, $resp))
        		return false;
        	else
        		return true;
	}

	public function upload($data, $token)
	{
		$CI =& get_instance();
	    $CI->config->load('api_config');
	    $CI->load->library('curl');

	    	$ch = curl_init();
		 
			$url = $CI->config->item('ImageUpload');
			$header = array("Content-Type:multipart/form-data", 'token: '.$token);
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLINFO_HEADER_OUT, true);
			$result = curl_exec($ch);
			return $result;

	}

	public function assignImage($data, $entity, $token)
	{
		$CI =& get_instance();
	    $CI->config->load('api_config');
	    $CI->load->library('curl');

		switch($entity)
		    {
		    	case 'Product':
		    		$api = $CI->config->item('ProductImage').'/'.$data['id'];
		    		break;
		    	case 'Shop':
		    		$api = $CI->config->item('ShopImage').'/'.$data['id'];
		    		break;
		    	case 'User':
		    		$api = $CI->config->item('UserImage').'/'.$data['id'];
		    		break;
		    	case 'Blog':
		    		$api = $CI->config->item('BlogImage').'/'.$data['id'];
		    		break;
		    }

		    $CI->curl->create($api);	
			$CI->curl->option(CURLOPT_HTTPHEADER, array('Content-type: application/json; Charset=UTF-8','token: '.$token));	
			$CI->curl->post(json_encode($data));
			$object = $CI->curl->execute();
			$result = array('response'=>$object, 'error_code'=>$CI->curl->error_code, 'error_string'=>$CI->curl->error_string, 'info'=>$CI->curl->info);

			return $result;
	}

	public function deleteImage($entity, $id, $data, $token)
	{
		$CI =& get_instance();
	    $CI->config->load('api_config');
	    $CI->load->library('curl');

	    switch($entity)
	    {
	    	case 'ProductImage':
	    		$api = $api = $CI->config->item('ProductImage').'/'.$id;
	    		break;
	    	case 'ShopImage':
	    		$api = $api = $CI->config->item('ShopImage').'/'.$id;
	    		break;
	    	case 'BlogImage':
	    		$api = $api = $CI->config->item('BlogImage').'/'.$id;
	    		break;
	    	case 'UserImage':
	    		$api = $api = $CI->config->item('UserImage').'/'.$id;
	    		break;
	    }
	    
	    		
	    $CI->curl->create($api);	
		$CI->curl->option(CURLOPT_HTTPHEADER, array('Content-type: application/json; Charset=UTF-8', 'token: '.$token));	
		$CI->curl->delete(json_encode($data));
		$object = $CI->curl->execute();
		$resp = array('response'=>$object, 'error_code'=>$CI->curl->error_code, 'error_string'=>$CI->curl->error_string, 'info'=>$CI->curl->info);
		return $resp;
	}

}