<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {
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
			$this->mybreadcrumb->add($this->lang->line('brsub_usermanagement'), base_url('admin/user'));
			$this->mybreadcrumb->add($this->lang->line('brsub_userlist'), base_url('admin/user'));
			$this->data = array('breadcrumbs'		=>	$this->mybreadcrumb->render(),
								'load_js'			=>	'users_list.js',
								'title'				=>	$this->lang->line('page_title_userlist'));
			
			$this->page = 'admin/user_list';
			$this->layout();

	}

	public function lists()
     {

          // Datatables Variables
          $draw = intval($this->input->post("draw"));
          $start = intval($this->input->post("start"));
          $length = intval($this->input->post("length"));

          $users = $this->operation->getList('User', 1, 0, $this->session->userdata('token'));

          $u = (array) $users;
          $data = array();
          if($u)
		{
          foreach($u as $user) {
          	if(isset($user['id']))
				{
               $data[] = array(
                    $user['id'],
					$user['username'] ? $user['username']: '',
					$user['email'],
					ucfirst($user['user_type']['name']),
					$user['shop'] ? $user['shop']['name_en'] : '',
					ucfirst($user['status']),
					'<a href="user/view/'.$user['id'].'">Info</a> | <a href="user/edit/'.$user['id'].'">Edit</a>  | <a href="user/delete/'.$user['id'].'">Delete</a>'
               );
           }
          }
      }
          $output = array(
               "draw" => $draw,
                 "recordsTotal" => count((array)($users)),
                 "recordsFiltered" => count((array)($users)),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
     }

	public function list()
	{
		
		$users = $this->operation->getList('User', 1, 0, $this->session->userdata('token'));

		if($users)
		{
			foreach($users as $user)
			{
				
				$id = $user['id'];
				$username = $user['username'] ? $user['username']: '';
				$email = $user['email'];
				$user_type = ucfirst($user['user_type']['name']);
				$shop = $user['shop'] ? $user['shop']['name_en'] : '';
				$status = ucfirst($user['status']);
				$operate = '<a href="user/view/'.$user['id'].'">Info</a> | ';
				$operate .= '<a href="user/edit/'.$user['id'].'">Edit</a>  | ';
				$operate .= '<a href="user/delete/'.$user['id'].'">Delete</a>';

				$userObj[] = array(	'id' 			=>	$id, 
									'username'		=>	$username, 
									'email'			=>	$email, 
									'user_type'		=>	$user_type, 
									'shop'			=>	$shop,
									'status'		=>	$status,
									'operate'		=>	$operate
								);
			}

			echo json_encode(array('data'=>$userObj));
		}	
		else {

			echo json_encode(array('data'=>array()));
		}

	}

	public function view($id)
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_usermanagement'), base_url('admin/user'));
		$this->mybreadcrumb->add($this->lang->line('brsub_userlist'), base_url('admin/user'));
		$this->mybreadcrumb->add($this->lang->line('brsub_userinfo'), base_url('admin/user/view'));

		$userObject = $this->operation->getData('User', $id, 0, $this->session->userdata('token'));

		$this->data = array(
							'breadcrumbs'	=>	$this->mybreadcrumb->render(),
							'load_js'		=>	'users_function.js',
							'user'			=>	$userObject,
							'title'			=>	$this->lang->line('page_title_userinfo')
		);
		$this->page = 'admin/user_info';
		$this->layout();
		
	}

	public function edit($id)
	{
		$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
		$this->mybreadcrumb->add($this->lang->line('brsub_usermanagement'), base_url('admin/user'));
		$this->mybreadcrumb->add($this->lang->line('brsub_userlist'), base_url('admin/user'));
		$this->mybreadcrumb->add($this->lang->line('brsub_useredit'), base_url('admin/user/edit'));
		$userObject = $this->operation->getData('User', $id, 0, $this->session->userdata('token'));
		$userTypeObject = $this->operation->getList('UserType', 0, 0, $this->session->userdata('token'));
		$this->data = array('breadcrumbs' 	=> 	$this->mybreadcrumb->render(),
							'load_js'		=>	'users_function.js',
							'isOneTimeUpload'	=>	true,
							'title'			=>	$this->lang->line('page_title_useredit'),
							'user'			=>	$userObject,
							'usertype'		=>	$userTypeObject,
							'output'		=>	array('status' => '', 'message' => '', 'title' => ''),
							'userid' 		=> $id
		);

		$this->page = 'admin/user_edit';
		$this->layout();
		
	}
	
	public function add()
	{

			$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
			$this->mybreadcrumb->add($this->lang->line('brsub_usermanagement'), base_url('admin/user'));
			$this->mybreadcrumb->add($this->lang->line('brsub_userlist'), base_url('admin/user'));
			$this->mybreadcrumb->add($this->lang->line('brsub_useradd'), base_url('admin/user/add'));
			$userTypeObject = $this->operation->getList('UserType', 0, 0, $this->session->userdata('token'));
			$shopCategoryObject = $this->operation->getList('ShopCategory', 0, 0, $this->session->userdata('token'));
			$this->data = array('breadcrumbs'	=>	$this->mybreadcrumb->render(),
								'load_js'		=>	'users_function.js',
								'isOneTimeUpload'	=>	true,
						  'title'		=>	$this->lang->line('page_title_useradd'),
						  'usertype'	=>	$userTypeObject,
						  'shopcategory'=>	$shopCategoryObject
					);
			$this->page = 'admin/user_add';
			$this->layout();
	}

	public function save()
	{
		$id = $this->input->post('userid');
		$username = $this->input->post('username');
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$password = $this->input->post('password');
		$usertype = $this->input->post('usertype');
		$email = $this->input->post('email');
		$gender = $this->input->post('gender');
		$dob = date("Y-m-d", strtotime($this->input->post('dob')));
		$mobile = $this->input->post('mobile');
		$address = $this->input->post('address');
		$shopcategory = $this->input->post('shopcategory');

		if($this->input->post('addUser'))
		{
			
			$user = array(	'first_name' => 	$firstname,
							'last_name' 	=> 	$lastname,
							'username'	=>	$username,
							'email' 	=> 	$email,
							'password'	=>	$password,
							'user_type_id'	=> 	$usertype,
							'shop_name_en'	=>	'',
							'shop_name_tc'	=>	'',
							'shop_name_sc'	=>	'',
							'shop_category_id'	=>	$shopcategory
							
					);
		
			$resp = $this->operation->postData('User', $user, $this->session->userdata('token'));
			
			if($resp['info']['http_code'] == 200)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'User has been successfully added.'));
				redirect('admin/user/add');
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to save user.'));
				redirect('admin/user/add');
			}

		}

		if($this->input->post('enableButton') || $this->input->post('disableButton'))
		{
			$user = array('username' 	=> $username,
					 'usertype' 		=> $usertype,
					 'first_name' 		=> $firstname,
					 'last_name' 		=> $lastname,
					 'user_type_id'		=> $usertype,
					 'email' 			=> $email,
					 'birth_date' 		=> $dob,
					 'gender' 			=> $gender,
					 'mobile_phone' 	=> $mobile,
					 'address' 			=> $address,
					 'status_id'		=> $this->input->post('enableButton') ? 1 : 2
					);
			

			$resp = $this->operation->patchData('User', $id, $user, $this->session->userdata('token'));

			$response = json_decode($resp['response']);
			if($resp['info']['http_code'] == 200)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'User has been successfully saved.'));
				redirect('admin/user/edit/'.$id);
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to save user.'.$response->message));
				redirect('admin/user/edit/'.$id);
			}
		}

		if($this->input->post('saveUser'))
		{
			
			$user = array('id' 			=>	$id,
						  'username'	=>	$username,
						  'first_name'	=>	$firstname,
						  'last_name' 	=>	$lastname,
						  'user_type_id'	=>	$usertype,
						  'email' 		=>	$email,
						  'gender' 		=>	$gender,
						  'dob' 		=>	$dob,
						  'mobile_phone' 		=>	$mobile,
						  'address'		=>	$address
					);


			$resp = $this->operation->patchData('User', $id, $user, $this->session->userdata('token'));

			$response = json_decode($resp['response']);
			if($resp['info']['http_code'] == 200)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'User has been successfully saved.'));
				redirect('admin/user/edit/'.$id);
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to save user.'.$response->message));
				redirect('admin/user/edit/'.$id);
			}
		}
	}

	public function delete($id)
	{
		$resp = $this->operation->deleteData('User', $id, $this->session->userdata('token'));
		
		if($resp['info']['http_code'] == 200)
			{	
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'User has been successfully deleted.'));
				redirect('admin/user');
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to delete user.'));
				redirect('admin/user');
			}
	}

	public function upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '100';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';

		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			print_r($this->upload->data);
			die();
		}
		else
		{
			print_r($this->upload->display_errors);
			die();
		}
	}
}

?>
