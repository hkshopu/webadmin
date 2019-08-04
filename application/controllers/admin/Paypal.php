<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends MY_Controller{
    
     function  __construct(){
        parent::__construct();

        $this->load->library('operation');
        
        // Load paypal library & product model
        $this->load->library('paypal_lib');

     }
     
    function success(){
        // Get the transaction data
        $paypalInfo = $_REQUEST;

        $response = array('payer_email'             => $paypalInfo['payer_email'],
                          'payer_id'                => $paypalInfo['payer_id'],
                          'payer_status'            => $paypalInfo['payer_status'],
                          'first_name'              => $paypalInfo['first_name'],
                          'last_name'               => $paypalInfo['last_name'],
                          'address_name'            => $paypalInfo['address_name'],
                          'address_street'          => $paypalInfo['address_street'],
                          'address_city'            => $paypalInfo['address_city'],
                          'address_country_code'    => $paypalInfo['address_country_code'],
                          'residence_country'       => $paypalInfo['residence_country'],
                          'txn_id'                  => $paypalInfo['txn_id'],
                          'mc_currency'             => $paypalInfo['mc_currency'],
                          'mc_gross'                => $paypalInfo['mc_gross'],
                          'protection_eligibility'  => $paypalInfo['protection_eligibility'],
                          'payment_gross'           => $paypalInfo['payment_gross'],
                          'payment_status'          => $paypalInfo['payment_status'],
                          'pending_reason'          => '',
                          'payment_type'            => $paypalInfo['payment_type'],
                          'item_name'               => $paypalInfo['item_name'],
                          'quantity'                => $paypalInfo['quantity'],
                          'txn_type'                => $paypalInfo['txn_type'],
                          'payment_date'            => $paypalInfo['payment_date'],
                          'business'                => $paypalInfo['business'],
                          'receiver_id'             => $paypalInfo['receiver_id'],
                          'notify_version'          => $paypalInfo['notify_version'],
                          'custom'                  => $paypalInfo['custom'],
                          'verify_sign'             => $paypalInfo['verify_sign']);


        $data['data'] = $response;
        $data['title'] = 'success';
        
        if($paypalInfo['payment_status'] == 'Completed')
          $is_successful = 'true';
        else
          $is_successful = 'false'; 
        if($paypalInfo['item_name'] == 'HKShopU Top Up')
        {
          redirect('admin/adorder', 'refresh');
        }
        else{
          $shop = explode("+", $paypalInfo['item_number']);
          $order = array( 'shop_id'           =>  $shop[0], 
                          'payment_method_id' =>  1, 
                          'receiver'          =>  $shop[1], 
                          'address'           =>  $shop[2],
                          'is_successful'     =>  $is_successful);

          $resp = $this->operation->postData('Order', $order, $paypalInfo['custom']);
          $data['order'] = json_decode($resp['response']);
          if($resp)
            $this->load->view('admin/paypal/success', $data);
        }
       
    }
     
     function cancel(){

        /*$this->mybreadcrumb->add($this->lang->line('brsub_home'), base_url('admin/dashboard'));
        $this->data = array('breadcrumbs'   =>  $this->mybreadcrumb->render(),
                            'title'         =>  '');
    
        $this->page = 'admin/paypal/cancel';
        $this->layout();*/

        // Load payment failed view
        $this->load->view('admin/paypal/cancel');
     }
     
     function ipn(){
        // Paypal posts the transaction data
        $paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            // Validate and get the ipn response
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);

            // Check whether the transaction is valid
            if($ipnCheck){
                // Insert the transaction data in the database
                $data['user_id']        = $paypalInfo["custom"];
                $data['product_id']        = $paypalInfo["item_number"];
                $data['txn_id']            = $paypalInfo["txn_id"];
                $data['payment_gross']    = $paypalInfo["mc_gross"];
                $data['currency_code']    = $paypalInfo["mc_currency"];
                $data['payer_email']    = $paypalInfo["payer_email"];
                $data['payment_status'] = $paypalInfo["payment_status"];

                $this->product->insertTransaction($data);
            }
        }
    }
}