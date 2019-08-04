<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

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
		$this->mybreadcrumb->add($this->lang->line('brsub_settings'), base_url('admin/profile'));
		$this->mybreadcrumb->add($this->lang->line('brsub_userprofile'), base_url('admin/profile'));

		$userObject = $this->operation->getData('User', $this->session->userdata('userid'), 0, $this->session->userdata('token'));
		$userStatusObject = $this->operation->getList('UserStatus', 0, 0, $this->session->userdata('token'));

		$this->data = array('breadcrumbs'		=>	$this->mybreadcrumb->render(),
							'load_js'			=>	'profile.js',
							'isOneTimeUpload'	=>	true,
							'user'				=>	$userObject,
							'userstatus'		=>  $userStatusObject,
							'title'				=>	$this->lang->line('page_title_userprofile'));
		$this->page = 'admin/profile_info';
		$this->layout();
		
	}

	public function updatePassword()
	{
		$current_password = $this->input->post('currentpassword');
		$new_password = $this->input->post('newpassword');
		$id = $this->input->post('id');

		$password = array('current_password' => $current_password, 'password' => $new_password);

		$resp = $this->operation->patchData('UpdatePassword', $id, $password, $this->session->userdata('token'));
		
		echo json_encode($resp);

	}

	public function save()
	{
		$id = $this->input->post('userid');
		$username = $this->input->post('username');
		$usertype = $this->input->post('usertype');
		$userstatus = $this->input->post('userstatus');
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$email = $this->input->post('email');
		$dob = date("Y-m-d", strtotime($this->input->post('dob')));
		$gender = $this->input->post('gender');
		$mobile = $this->input->post('mobile');
		$address = $this->input->post('address');


		if($this->input->post('saveProfile'))
		{
			
			$profile = array('username' => $username,
					 'usertype' => $usertype,
					 'first_name' => $firstname,
					 'last_name' => $lastname,
					 'user_type_id'	=> $usertype,
					 'email' => $email,
					 'birth_date' => $dob,
					 'gender' => $gender,
					 'mobile_phone' => $mobile,
					 'address' => $address,
					 'status_id'=> $userstatus
					);
			
			$resp = $this->operation->patchData('User', $id, $profile, $this->session->userdata('token'));

			$response = json_decode($resp['response']);
			if($resp && $resp['info']['http_code'] == 200)
			{	
				
				$this->session->set_userdata('username', $username);
				$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Profile has been successfully saved.'));
				redirect('admin/profile');
			} else {
				$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to save profile. '.$response->message));
				redirect('admin/profile');
			}
		
		}
		
	}

	public function upload($id)
	{ 

		if(isset($_POST["image"]))
		{
		    $data = $_POST["image"];

		    $image_array_1 = explode(";", $data);

		    $image_array_2 = explode(",", $image_array_1[1]);

		    $data = base64_decode($image_array_2[1]);

		    $imageName = time() . '.png';

		    $target_dir = APPPATH . '../uploads/files/userprofile/';
		    file_put_contents($target_dir."$imageName", $data);

		}

		$target_file = $target_dir.$imageName;

		  $msg = ""; 
		  //if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
		 // {

		  	$type = pathinfo($target_file, PATHINFO_EXTENSION);
		  	$path = curl_file_create($target_file,'image/'.$type,$imageName);
		  	$img = array('image'=>$path);
		  	$oldImage = array('id' => $id, 'image_url' => $this->session->userdata('img'));
				if($img)
				{
				 	$ImageResponseUrl = $this->operation->upload($img, $this->session->userdata('token'));
				 	$ImageUrl = json_decode($ImageResponseUrl);

				 	if($ImageUrl->file_url)
				 	{	
				 		$deleteResponse = $this->operation->deleteImage('UserImage', $id, $oldImage, $this->session->userdata('token'));
			 			$addImage = array('id'=>$id, 'image_url'=>$ImageUrl->file_url);
			 			$uploadResponse = $this->operation->assignImage($addImage, 'User', $this->session->userdata('token'));
			 			$this->session->set_userdata('img', $ImageUrl->file_url);
				 		
				 	} 	 
				}

				unlink($target_file);	
		   //}	
	}

	public function deleteImage()
	{
		$img_url = $_POST['img_url'];
		$id = $_POST['id'];

		$data = array('image_url'=>$img_url);

		$resp = $this->operation->deleteImage('UserImage', $id, $data, $this->session->userdata('token'));

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
