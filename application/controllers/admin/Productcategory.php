<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productcategory extends MY_Controller {

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
		$this->mybreadcrumb->add($this->lang->line('brsub_productmanagement'), base_url('admin/productcategory'));
		$this->mybreadcrumb->add($this->lang->line('brsub_productcategory'), base_url('admin/productcategory'));
		
		$this->page = 'admin/productcategory_list';
		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'load_js'		=>	'productscategory_list.js',
							'title'			=>	$this->lang->line('page_title_productcategorylist')
							);

		$this->layout();
		
	}

	public function list()
	{

		$prodCat = $this->operation->getList('ProductCategory', 1, 0, $this->session->userdata('token'));

		if($prodCat) 
		{
			foreach($prodCat as $cats=>$cat)
				{
					$id = $cat['category']['id'];
					$name = $cat['category']['name'];
					$status = $cat['category']['status'];
					$operate = '<a href="productcategory/view/'.$id.'">Info</a> | ';
					$operate .= '<a href="productcategory/edit/'.$id.'">Edit</a>  | ';
					$operate .= '<a href="productcategory/delete/'.$id.'">Delete</a>';

					$productCategory[] = array(	'id'		=>	$id, 
												'name'		=>	$name, 
												'status'	=>	ucfirst($status), 
												'operate'	=>	$operate
											);
				}

			echo json_encode(array('data'=>$productCategory));
		}
		else 
		{
			echo json_encode(array('data'=>array()));
		}
	}

	public function view($id)
	{
		//set breadcrumbs
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_productmanagement'), base_url('admin/productcategory'));
		$this->mybreadcrumb->add($this->lang->line('brsub_productcategorylist'), base_url('admin/productcategory'));
		$this->mybreadcrumb->add($this->lang->line('brsub_productcategoryinfo'), base_url('admin/productcategory/view'));

		$productCategoryListObject = $this->operation->getData('ProductCategory', $id, 0, $this->session->userdata('token'));

		//set data values
		$this->data = array('breadcrumbs'		=>		$this->mybreadcrumb->render(),
							'title'				=>		$this->lang->line('page_title_productcategoryinfo'),
							'productCategory'	=>		$productCategoryListObject);

		$this->page = 'admin/productcategory_info';
		$this->layout();
		
	}

	public function edit($id)
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_productmanagement'), base_url('admin/productcategory'));
		$this->mybreadcrumb->add($this->lang->line('brsub_productcategorylist'), base_url('admin/productcategory'));
		$this->mybreadcrumb->add($this->lang->line('brsub_productcategoryedit'), base_url('admin/productcategory/edit'));


		$productCategoryListObject = $this->operation->getData('ProductCategory', $id, 0, $this->session->userdata('token'));
		$productCategoryStatusObject = $this->operation->getList('CategoryStatus', 0, 0, $this->session->userdata('token'));

		$this->data = array('breadcrumbs'		=>	$this->mybreadcrumb->render(),
							'title'				=>	$this->lang->line('page_title_productcategoryedit'),
							'statuses'			=>	$productCategoryStatusObject,
							'productCategory'	=>	$productCategoryListObject);

		$this->page = 'admin/productcategory_edit';
		$this->layout();
		
	}
	
	public function add()
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_productmanagement'), base_url('admin/productcategory'));
		$this->mybreadcrumb->add($this->lang->line('brsub_productcategoryadd'), base_url('admin/productcategory/add'));
		$productCategoryStatusObject = $this->operation->getList('CategoryStatus', 0, 0, $this->session->userdata('token'));

		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'title'			=>	$this->lang->line('page_title_productcategoryadd'),
							'statuses'		=>	$productCategoryStatusObject);
		
		
		$this->page = 'admin/productcategory_add';
		$this->layout();
		  
	}

	public function save()
	{
		$category = $this->input->post('categoryname');
		$status = $this->input->post('status');
		$id = $this->input->post('categoryid');
		$parentcategory = ($this->input->post('parentcategoryid') ? $this->input->post('parentcategoryid') : 0);
		//Add
		if($this->input->post('addProdCat'))
		{
			$productCategory = array('name' 				=> $category,
					 		 		'status_id' 			=> $status,
					 		 		'parent_category_id'	=> $parentcategory
								);

			$resp = $this->operation->postData('ProductCategory', $productCategory, $this->session->userdata('token'));
	
			if($resp && $this->curl->info['http_code'] == 201)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Product category has been successfully added.'));
				redirect('admin/productcategory/add/');
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to add product category.'));
				redirect('admin/productcategory/add/');
			}
			
			
		}
		//Save
		if($this->input->post('saveProdCat'))
		{
			$productCategory = array(
									 'name' 				=> $category,
							 		 'status_id' 			=> $status,
							 		 'parent_category_id'	=> $parentcategory
								);
			//$productCategory = '?name='.$category.'&status_id='.$status.'&parent_category_id='.$parentcategory;
	
			$resp = $this->operation->patchData('ProductCategory', $id, $productCategory, $this->session->userdata('token'));
			$response = json_decode($resp['response']);
			if($resp && $resp['info']['http_code'] == 201)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Product category has been successfully saved.'));
				redirect('admin/productcategory/edit/'.$id);
			} else {

				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to save product category. '.$response->message));
				redirect('admin/productcategory/edit/'.$id);
			}
		}
	}

	public function delete($id)
	{
		$resp = $this->operation->deleteData('ProductCategory', $id, $this->session->userdata('token'));

		if($resp['info']['http_code'] == 200)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Product category has been successfully deleted.'));
				redirect('admin/productcategory');
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to delete product category.'));
				redirect('admin/productcategory');
			}
	}
}

?>
