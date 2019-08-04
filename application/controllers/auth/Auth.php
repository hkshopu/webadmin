<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation','session'));
		$this->load->helper('captcha');
		$this->load->library('operation');

	}

	public function index()
	{
		$data['header_title'] = 'HKShopU Web Admin';
		$this->load->view('auth/login', $data);
		
	}
	public function register()
	{

		$shopCategoryListObject = $this->operation->getList('ShopCategory', 0, 0, $this->session->userdata('token'));

		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required|matches[password]', array('matches' => 'Password did not match.'

		));
		if ($this->form_validation->run() == FALSE) {

			$config = array(
						'img_url'		=>	base_url() . 'captcha_images/',
						'img_path'		=>	'captcha_images/',
						'img_height'	=>	30,
						'word_length'	=>	5,
						'img_width'		=>	'190',
						'font_size'		=>	12
			);
			$captcha = create_captcha($config);
			$this->session->unset_userdata('valuecaptchaCode');
			$this->session->set_userdata('valuecaptchaCode', $captcha['word']);

			//$userTypeObject = $this->operation->getList('UserType', 0, 0, $this->session->userdata('token'));

			$data = array('header_title'	=>	'HKShopU Web Admin',
						  'captchaImg'		=>	$captcha['image'],
						  'shopcategory'	=>	$shopCategoryListObject);
						  //'usertype'		=>	$userTypeObject);
			
			$this->load->view('auth/register', $data);
        }
        else {
        	if($this->input->post('register'))
			{

				$captcha_insert = $this->input->post('captcha');
				$contain_sess_captcha = $this->session->userdata('valuecaptchaCode');

				$username = $this->input->post('username');
				$firstname = $this->input->post('firstname');
				$lastname = $this->input->post('lastname');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$shop_en = $this->input->post('shop_name_en');
				$shop_tc = $this->input->post('shop_name_tc');
				$shop_sc = $this->input->post('shop_name_sc');
				$shopcategory = $this->input->post('shopcategory');

				if($captcha_insert === $contain_sess_captcha)
				{
					
					$register = array(	'username'			=>	$username,
										'first_name'		=>	$firstname,
										'last_name'			=>	$lastname,
										'email'				=>	$email,
										'password'			=>	$password,
										'shop_name_en'		=>	$shop_en,
										'shop_name_tc'		=>	$shop_tc,
										'shop_name_sc'		=>	$shop_sc,
										'shop_category_id'	=>	$shopcategory
							);

					$resp = $this->operation->postData('Register', $register, '');
					$msg = json_decode($resp['response']);

					if($resp['info']['http_code'] == 200)
					{	
						$this->session->set_flashdata(array('message_type'=>'Success', 'message'=>'Account successfully created.'));
						redirect('auth/auth/register');
					} else {
						$this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Failed to save account. '.$msg->message,
						'username' => $username, 'firstname'=>$firstname, 'lastname'=>$lastname, 'email'=>$email, 'shop_name_en'=>$shop_en, 
						'shop_name_tc'=>$shop_tc, 'shop_name_sc'=>$shop_sc));
						redirect('auth/auth/register');
					}

				} else {
					echo $this->session->set_flashdata(array('message_type'=>'Failed', 'message'=>'Incorrect captcha',
						'username' => $username, 'firstname'=>$firstname, 'lastname'=>$lastname, 'email'=>$email, 'shop_name_en'=>$shop_en, 
						'shop_name_tc'=>$shop_tc, 'shop_name_sc'=>$shop_sc));
					//print_r($login);
					redirect('auth/auth/register');
				}
				
			} else {
				$config = array(
							'img_url'		=>	base_url() . 'captcha_images/',
							'img_path'		=>	'captcha_images/',
							'img_height'	=>	45,
							'word_length'	=>	5,
							'img_width'		=>	'190',
							'font_size'		=>	12
				);

				$captcha = create_captcha($config);
				$this->session->unset_userdata('valuecaptchaCode');
				$this->session->set_userdata('valuecaptchaCode', $captcha['word']);
				$data['captchaImg'] = $captcha['image'];
				$this->load->view('auth/register', $data);
			}
        }	
	}

	public function refresh()
	{
		$config = array(
						'img_url'		=>	base_url() . 'captcha_images/',
						'img_path'		=>	'captcha_images/',
						'img_height'	=>	45,
						'word_length'	=>	5,
						'img_width'		=>	'190',
						'font_size'		=>	12
			);

			$captcha = create_captcha($config);
			$this->session->unset_userdata('valuecaptchaCode');
			$this->session->set_userdata('valuecaptchaCode', $captcha['word']);
			echo $captcha['image'];
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data['header_title'] = 'HKShopU Web Admins';
			$this->load->view('auth/login', $data);

        }
        else {
			if($this->input->post('login'))
			{

				$login = $this->input->post('username', TRUE);
				$password = $this->input->post('password', TRUE);
				$token = 'hkshopu';
				$credential = array('login'=>$login, 'password'=>$password, 'token'=>$token);

				$resp = $this->operation->postData('Login', $credential, $token);
				$userdata = json_decode($resp['response']);

				if($resp['info']['http_code'] == 200)
				{
					$sesdata = array(
							'userid' 	=> $userdata->user_id,
							'username' 	=> $userdata->user->username,
							'token'		=> $userdata->token,
							'email' 	=> $userdata->user->email,
							'level_id' 	=> $userdata->user->user_type_id,
							'usertype'	=> $userdata->user->user_type->name,
							'user_shop_id'	=>	$userdata->user->shop_id,
							'img'		=>	$userdata->user->image_url ? $userdata->user->image_url : base_url().'assets/dist/img/avatar.png',
							'logged_in' => true);
					if($userdata->user->user_type_id == 4 || $userdata->user->user_type_id == 5)
					{
						echo $this->session->set_flashdata('msg', "Invalid login credentials");
						redirect('auth/auth/login');

					} else {
						$this->session->set_userdata($sesdata);
						redirect('admin/dashboard');
					}
					
				
				} else {

					echo $this->session->set_flashdata('msg', $userdata->message);
					redirect('auth/auth/login');
				}

			}
    
        }

	}

	public function logout()
	{
		$response = $this->operation->getData('Logout', $this->session->userdata('userid'), 0, $this->session->userdata('token'));
		
		if($response->success)
		{
			$this->session->sess_destroy();
			redirect('auth/login');
		}
	}
}

