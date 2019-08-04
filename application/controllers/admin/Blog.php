<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends MY_Controller {

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
		$this->mybreadcrumb->add($this->lang->line('brsub_blogmanagement'), base_url('admin/blog'));
		$this->mybreadcrumb->add($this->lang->line('brsub_bloglist'), base_url('admin/blog'));
		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'load_js'		=>	'blogs_list.js',
							'title'			=>	$this->lang->line('page_title_bloglist'));
	
		$this->page = 'admin/blog_list';
		$this->layout();
		
	}

	public function list()
	{
		
		$blogs = $this->operation->getList('Blog', 1, 0, $this->session->userdata('token'));

		if($blogs)
		{
			foreach($blogs as $blog)
			{
				$id = $blog['id'];
				$title = $blog['title_en'];
				$category = $blog['category']['name'];
				$topping = $blog['is_top'] ? '<div class="checkbox"><input type="checkbox" checked disabled></div>':'<div class="checkbox"><input type="checkbox" disabled></div>';
				$publishdate = $blog['date_publish_start'];
				$enddate = $blog['date_publish_end'];
				$views = $blog['views'];
				$likes = $blog['likes'];
				$comments = $blog['comments'];
				$status = ucfirst($blog['status']);
				$operate = '<a href="blog/view/'.$blog['id'].'">Info</a> | ';
				$operate .= '<a href="blog/edit/'.$blog['id'].'">Edit</a>  | ';
				$operate .= '<a href="blog/delete/'.$blog['id'].'">Delete</a>';

				$blogObj[] = array(	'id' 			=>	$id, 
									'title'			=>	$title, 
									'category'		=>	$category, 
									'topping'		=>	$topping, 
									'publishdate'	=>	$publishdate, 
									'enddate'		=>	$enddate, 
									'views'			=>	$views, 
									'likes'			=>	$likes, 
									'comments'		=>	$comments, 
									'status'		=>	$status, 
									'operate'		=>	$operate
								);
			}

			echo json_encode(array('data'=>$blogObj));
		}	
		else {

			echo json_encode(array('data'=>array()));
		}

	}

	public function view($id)
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_blogmanagement'), base_url('admin/blog'));
		$this->mybreadcrumb->add($this->lang->line('brsub_bloglist'), base_url('admin/blog'));
		$this->mybreadcrumb->add($this->lang->line('brsub_bloginfo'), base_url('admin/blog/view'));

		$blogObject = $this->operation->getData('Blog', $id, 0, $this->session->userdata('token'));
		$blogCommentListObject = $this->operation->getList('BlogComment', 0, $id, $this->session->userdata('token'));

		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'isUpload'		=>	true,
							'load_js'		=>	'blogs_function.js',
							'title'			=>	$this->lang->line('page_title_bloginfo'),
							'blog'			=>	$blogObject,
							'blogcomments'	=>	$blogCommentListObject);

		$this->page = 'admin/blog_info';
		$this->layout();
		
	}

	public function edit($id)
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_blogmanagement'), base_url('admin/blog'));
		$this->mybreadcrumb->add($this->lang->line('brsub_bloglist'), base_url('admin/blog'));
		$this->mybreadcrumb->add($this->lang->line('brsub_blogedit'), base_url('admin/blog/edit'));

		$blogObject = $this->operation->getData('Blog', $id, 0, $this->session->userdata('token'));
		$blogCategoryListObject = $this->operation->getList('BlogCategory', 0, 0, $this->session->userdata('token'));
		$blogCommentListObject = $this->operation->getList('BlogComment', 0, $id, $this->session->userdata('token'));

		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'isUpload'		=>	true,
							'load_js'		=>	'blogs_function.js',
							'title'			=>	$this->lang->line('page_title_blogedit'),
							'blog'			=>	$blogObject,
							'blogcomments'	=>	$blogCommentListObject,
							'blogCategory'	=>	$blogCategoryListObject);

		$this->page = 'admin/blog_edit';
		$this->layout();
		
	}
	
	public function add()
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_blogmanagement'), base_url('admin/blog'));
		$this->mybreadcrumb->add($this->lang->line('brsub_blogadd'), base_url('admin/blog/add'));
		$blogCategoryListObject = $this->operation->getList('BlogCategory', 0, 0, $this->session->userdata('token'));
		$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'title'			=>	$this->lang->line('page_title_blogadd'),
							'blogCategory'	=>	$blogCategoryListObject);

		$this->page = 'admin/blog_add';
		$this->layout();
		
	}

	public function save()
	{
		$id = $this->input->post('id');
		$shopid = $this->input->post('shop_id');
		$title_en = $this->input->post('title_en');
		$title_tc = $this->input->post('title_tc');
		$title_sc = $this->input->post('title_sc');
		$category = $this->input->post('category');
		$status = $this->input->post('status');
		$content_en = $this->input->post('content_en');
		$content_tc = $this->input->post('content_tc');
		$content_sc = $this->input->post('content_sc');
		$publish_date = date("Y-m-d", strtotime($this->input->post('publish_date')));
		$end_date = date("Y-m-d", strtotime($this->input->post('end_date')));
		$is_top = $this->input->post('is_top') ? 1 : 0;

		if($this->input->post('addBlog'))
		{
			$blog = array('id'				=>	$id,
						  'shop_id'			=>	$shopid,
						  'title_en'		=>	$title_en,
						  'title_tc'		=>	$title_tc,
						  'title_sc'		=>	$title_sc,
						  'category_id'		=>	$category,
						  'status_id'		=>	$status,
						  'content_en'		=>	$content_en,
						  'content_tc'		=>	$content_tc,
						  'content_sc'		=>	$content_sc,
						  'is_top'			=>	$is_top,
						  'date_publish_start'	=>	$publish_date,
						  'date_publish_end'	=>	$end_date
			);

			$resp = $this->operation->postData('Blog', $blog, $this->session->userdata('token'));

			if($resp['info']['http_code'] == 201)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Blog has been successfully added.'));
				redirect('admin/blog/add');
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to save blog.'));
				redirect('admin/blog/add');
			}

		}
		if($this->input->post('saveBlog'))
		{	
			
			$blog = array(
						  'shop_id'			=>	$shopid,
						  'title_en'		=>	$title_en,
						  'title_tc'		=>	$title_tc,
						  'title_sc'		=>	$title_sc,
						  'category_id'		=>	$category,
						  'status_id'		=>	$status,
						  'content_en'		=>	$content_en,
						  'content_tc'		=>	$content_tc,
						  'content_sc'		=>	$content_sc,
						  'is_top'			=>	$is_top
					);

			$resp = $this->operation->patchData('Blog', $id, $blog, $this->session->userdata('token'));

			if($resp && $this->curl->info['http_code'] == 201)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Blog has been successfully saved.'));
				redirect('admin/blog/edit/'.$id);
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to save blog.'));
				redirect('admin/blog/edit/'.$id);
			}
		}
	}

	public function upload($id)
	{ 

		$target_dir = APPPATH . '../uploads/files/blog/';
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
				 		$uploadResponse = $this->operation->assignImage($addImage, 'Blog', $this->session->userdata('token'));

				 	} 	 
				}	
		   }	
	}

	public function deleteImage()
	{
		$img_url = $_POST['img_url'];
		$id = $_POST['id'];

		$data = array('image_url'=>$img_url);

		$resp = $this->operation->deleteImage('BlogImage', $id, $data, $this->session->userdata('token'));

		if($resp['info']['http_code'] == 201)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Image has been successfully deleted.'));
				redirect('admin/shop/edit/'.$id);
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to delete image.'));
				redirect('admin/shop/edit/'.$id);
			}
	}
}

?>
