<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blogcategory extends MY_Controller {

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
		$this->mybreadcrumb->add($this->lang->line('br_blogcategorylist'), base_url('admin/blogcategory'));
		$this->mybreadcrumb->add($this->lang->line('brsub_blogcategorylist'), base_url('admin/blogcategory'));
		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'load_js'		=>	'blogscategory_list.js',
							'title'			=>	$this->lang->line('page_title_blogcategorylist'));
		
		$this->page = 'admin/blogcategory_list';
		$this->layout();
		
	}

	public function list()
	{
		
		$blogcategories = $this->operation->getList('BlogCategory', 1, 0, $this->session->userdata('token'));

		if($blogcategories)
		{
			foreach($blogcategories as $blogcat)
			{
				$id = $blogcat['id'];
				$name = $blogcat['name'];
				$owner = $blogcat['id'];
				$status = ucfirst($blogcat['status']);
				$operate = '<a href="blogcategory/view/'.$blogcat['id'].'">Info</a> | ';
				$operate .= '<a href="blogcategory/edit/'.$blogcat['id'].'">Edit</a>  | ';
				$operate .= '<a href="blogcategory/delete/'.$blogcat['id'].'">Delete</a>';

				$shopObj[] = array(	'id' 			=>	$id, 
									'name'			=>	$name, 
									'category'			=>	$owner, 
									'status'		=>	$status, 
									'operate'		=>	$operate
								);
			}

			echo json_encode(array('data'=>$shopObj));
		}	
		else {

			echo json_encode(array('data'=>array()));
		}

	}

	public function view($id)
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('br_blogcategorylist'), base_url('admin/blogcategory'));
		$this->mybreadcrumb->add($this->lang->line('brsub_blogcategorylist'), base_url('admin/blogcategory'));
		$this->mybreadcrumb->add($this->lang->line('brsub_blogcategoryinfo'), base_url('admin/blogcategory/view'));

		$blogCategoryObject = $this->operation->getData('BlogCategory', $id, 0, $this->session->userdata('token'));

		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'title'			=>	$this->lang->line('page_title_blogcategoryinfo'),
							'load_js'		=>	'blogscategory_function.js',
							'blogcategory'	=>  $blogCategoryObject);

		$this->page = 'admin/blogcategory_info';
		$this->layout();
		
	}

	public function edit($id)
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('br_blogcategorylist'), base_url('admin/blogcategory'));
		$this->mybreadcrumb->add($this->lang->line('brsub_blogcategorylist'), base_url('admin/blogcategory'));
		$this->mybreadcrumb->add($this->lang->line('brsub_blogcategoryedit'), base_url('admin/blogcategory/edit'));

		$blogCategoryObject = $this->operation->getData('BlogCategory', $id, 0, $this->session->userdata('token'));

		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'title'			=>	$this->lang->line('page_title_blogcategoryedit'),
							'load_js'		=>	'blogscategory_function.js',
							'blogcategory'	=>  $blogCategoryObject);

		$this->page = 'admin/blogcategory_edit';
		$this->layout();
		
	}
	
	public function add()
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('br_blogcategorylist'), base_url('admin/blogcategory'));
		$this->mybreadcrumb->add($this->lang->line('brsub_blogcategorylist'), base_url('admin/blogcategory'));
		$this->mybreadcrumb->add($this->lang->line('brsub_blogcategoryadd'), base_url('admin/blogcategory/add'));
		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'title'			=>	$this->lang->line('page_title_blogcategoryadd'));

		$this->page = 'admin/blogcategory_add';
		$this->layout();
		
	}

	public function save()
	{
		$category = $this->input->post('categoryname');
		$status = $this->input->post('status');
		$type = $this->input->post('type');
		$id = $this->input->post('categoryid');
		
		//Add
		if($this->input->post('addBlogCategory'))
		{
			$blogCategory = array(	
									'name' 			=> $category,
					 		 		'status_id' 	=> $status
								);

			$resp = $this->operation->postData('BlogCategory', $blogCategory, $this->session->userdata('token'));

			if($resp && $this->curl->info['http_code'] == 201)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Blog category has been successfully added.'));
				redirect('admin/blogcategory/add/');
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to add blog category.'));
				redirect('admin/blogcategory/add/');
			}
			
			
		}
		//Save
		if($this->input->post('saveBlogCategory'))
		{
			$blogCategory = array('id'				=> $id,
									'name' 			=> $category,
					 		 		'status_id' 	=> $status
								);
			//$blogCategory	=	'?name='.$category.'&status_id='.$status;

			$resp = $this->operation->patchData('BlogCategory', $id, $blogCategory, $this->session->userdata('token'));
			
			if($resp && $this->curl->info['http_code'] == 201)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Blog category has been successfully saved.'));
				redirect('admin/blogcategory/edit/'.$id);
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to save blog category.'));
				redirect('admin/blogcategory/edit/'.$id);
			}
		}
	}

	public function delete($id)
	{
		$resp = $this->operation->deleteData('BlogCategory', $id, $this->session->userdata('token'));

		if($resp['info']['http_code'] == 200)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Blog category has been successfully deleted.'));
				redirect('admin/blogcategory');
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to delete blog category.'));
				redirect('admin/blogcategory');
			}
	}
}

?>
