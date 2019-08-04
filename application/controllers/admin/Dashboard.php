<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct() {
        parent::__construct();     


        if(!$this->session->userdata('logged_in'))
        {
        	redirect('auth/auth/login');
        }

        $this->load->library('operation');

        $order = $this->operation->getList('Order', 1, 0, $this->session->userdata('token'));
        $ctr = 0;
        if($order) {
            foreach($order as $key=>$or)
        {   
            if($or['shop_id'] == 10000006)
            {
                if($or['is_new']){
                    $ctr++;
                }
            }

            if(!$this->session->userdata('user_shop_id'))
            {
                if($or['is_new']){
                    $ctr++;
                }
            }
        }
    } else {
        $ctr = 0;
    }
        

        $this->session->set_userdata('totalorder', $ctr);

    }

	public function index()
	{
         $this->load->library('operation');
		if($this->session->userdata('token'))
		{
            $order = $this->operation->getList('Order', 1, $this->session->userdata('user_shop_id'), $this->session->userdata('token'));
			$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url());
			$this->data['breadcrumbs'] = $this->mybreadcrumb->render();
			$this->data['title'] = 'Dashboard';
            $this->data['err'] = $order;
			$this->page = 'admin/dashboard';
			$this->layout($this->data);
		} else {
			echo "Access Denied";
		}
		
		
	}
	
}

?>
