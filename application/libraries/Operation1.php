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

	public function getList($entity, $isDecode, $id)
	{
		$CI =& get_instance();
	    $CI->config->load('api_config');
	    $CI->load->library('curl');

	    switch($entity)
	    {
	    	case 'Product':
	    		$api = $CI->config->item('Product');
	    		break;
	    	case 'ProductCategory':
	    		$api = $CI->config->item('ProductCategory');
	    		break;
	    	case 'Shop':
	    		$api = $CI->config->item('Shop');
	    		break;
	    	case 'ShopCategory':
	    		$api = $CI->config->item('ShopCategory');
	    		break;
	    	case 'ShopComment':
	    		$api = $CI->config->item('ShopComment').'/'.$id;;
	    		break;	
	    }
	 
	    $CI->curl->create($api);
		$CI->curl->option('returntransfer', 1);
		$object = $CI->curl->execute();

		if($isDecode)
			$resp = json_decode($object, true);
		else
			$resp = json_decode($object);

		return $resp;
	}

	public function getData($entity, $id, $isDecode)
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
	    }

		$CI->curl->create($api);
		$CI->curl->option('returntransfer', 1);
		$object = $CI->curl->execute();

		if($isDecode)
			$resp = json_decode($object, true);
		else
			$resp = json_decode($object);

		return $resp;
	}

	public function patchData($entity, $id, $data)
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
	    }

	    $CI->curl->create($api);
		$CI->curl->option(CURLOPT_HTTPHEADER, array('Content-type: application/json; Charset=UTF-8'));
		$CI->curl->patch($data);
		$object = $CI->curl->execute();
		$resp = array('response'=>$object, 'error_code'=>$CI->curl->error_code, 'error_string'=>$CI->curl->error_string, 'info'=>$CI->curl->info);
		return $resp;
	}

	public function postData($entity, $data)
	{
		$CI =& get_instance();
	    $CI->config->load('api_config');
	    $CI->load->library('curl');

	    switch($entity)
	    {
	    	case 'Product':
	    		$api = $CI->config->item('Product');
	    		break;
	    	case 'ProductCategory':
	    		$api = $CI->config->item('ProductCategory');
	    		break;
	    	case 'Shop':
	    		$api = $CI->config->item('Shop');
	    		break;
	    }


	    $CI->curl->create($api);	
		$CI->curl->option(CURLOPT_HTTPHEADER, array('Content-type: application/json; Charset=UTF-8'));	
		$CI->curl->post(json_encode($data));
		$object = $CI->curl->execute();
		$resp = array('response'=>$object, 'error_code'=>$CI->curl->error_code, 'error_string'=>$CI->curl->error_string, 'info'=>$CI->curl->info);
		return $resp;
	}

	public function deleteData($entity, $id)
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
	    }

	
	    $CI->curl->create($api);	
		$CI->curl->option(CURLOPT_HTTPHEADER, array('Content-type: application/json; Charset=UTF-8'));	
		$CI->curl->delete(array('id'=>$id));
		$object = $CI->curl->execute();
		$resp = array('response'=>$object, 'error_code'=>$CI->curl->error_code, 'error_string'=>$CI->curl->error_string, 'info'=>$CI->curl->info);
		return $resp;
	}

	public function updateStock($id, $data)
	{
		$CI =& get_instance();
	    $CI->config->load('api_config');
	    $CI->load->library('curl');

	    $row_ids = $data['row_id'];
		$sizes 	= $data['size'];
		$colors = $data['color'];
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
	            $orig_stock = $orig_stocks[$key];
	            $new_stock = $row_id ? $stock - $orig_stock : $stock;

	            if($orig_stock < $stock)
	            {
	            	$productStock = array('id' => $id, 'stock' => $new_stock, 'size_id' => $size, 'color_id' => $color, 'other' => '');

	            	$productStockUrl = $CI->config->item('ProductStockAdd') . '/'.$id;
	            } 

	            else if($orig_stock > $stock)
	            {
	            	$productStock = array('id' => $id, 'stock' => $new_stock, 'attribute_id' => $row_id);
	            	$productStockUrl = $CI->config->item('ProductStockRemove') . '/'.$id;
	            }
	            else 
	            {
	            	$productStock = array('id' => $id, 'stock' => $new_stock, 'size_id' => $size, 'color_id' => $color, 'other' => '');

	            	$productStockUrl = $CI->config->item('ProductStockAdd') . '/'.$id;
	            }

	            $CI->curl->create($productStockUrl);	
				$CI->curl->option(CURLOPT_HTTPHEADER, array('Content-type: application/json; Charset=UTF-8'));			
				$CI->curl->post(json_encode($productStock));
				$object = $CI->curl->execute();
				$err = $CI->curl->error_code ? true : false; 
				$resp = array_push($err);
        	}

        	if(in_array(true, $resp))
        		return false;
        	else
        		return true;
	}

	public function upload($data)
	{
		$CI =& get_instance();
	    $CI->config->load('api_config');
	    $CI->load->library('curl');

	    	$ch = curl_init();
		 
			$url = $CI->config->item('ImageUpload');
			$header = array("Content-Type:multipart/form-data");
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLINFO_HEADER_OUT, true);
			$result = curl_exec($ch);
			return $result;

	}

	public function assignImage($data, $entity)
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
		    }

		    $CI->curl->create($api);	
			$CI->curl->option(CURLOPT_HTTPHEADER, array('Content-type: application/json; Charset=UTF-8'));	
			$CI->curl->post(json_encode($data));
			$object = $CI->curl->execute();
			$result = array('response'=>$object, 'error_code'=>$CI->curl->error_code, 'error_string'=>$CI->curl->error_string, 'info'=>$CI->curl->info);

			return $result;
	}

}