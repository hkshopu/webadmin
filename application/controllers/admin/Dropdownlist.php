<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dropdownlist extends MY_Controller {

	public function __construct() {
        parent::__construct();     

        if(!$this->session->userdata('logged_in'))
        {
        	redirect('auth/auth/login');
        }
        
        $this->load->library('operation');
    }

	public function colors()
	{
		
		$ColorListObject = $this->operation->getList('Color', 0, 0, $this->session->userdata('token'));
		echo json_encode($ColorListObject);
	}

	public function sizes()
	{
		
		$SizeListObject = $this->operation->getList('Size', 0, 0, $this->session->userdata('token'));
		echo json_encode($SizeListObject);
	}

}

?>
