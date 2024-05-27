<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('Common_model');
	
		
	}
	public function index()
	{
	    	$this->Common_model->is_logged_in();
		$this->load->view('template/header');
		$this->load->view('welcome_message');
		$this->load->view('template/footer');
		
	}
	public function smstest(){
		   
           
            /* Endpoint */
            $url = 'https://e-sms.dialog.lk/api/v1/login';
            /* eCurl */
            $curl = curl_init($url);
            /* Data */
            $data = json_encode(["username" => "cinemapuramlk", "password" => "Sameera@123"]);

            /* Set JSON data to POST */
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            /* Define content type */
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            /* Return json */
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            /* make request */
            $result = curl_exec($curl);
            curl_close($curl);

// var_dump(json_decode($result)->userData->walletBalance);
// die();//["walletBalance"]

            if(json_decode($result)->userData->walletBalance>2):
                //var_dump(json_decode($result)->userData->walletBalance);
                    /* Endpoint */
                    $url = 'https://e-sms.dialog.lk/api/v1/sms';
                    /* eCurl */
                    $curl = curl_init($url);
                    /* Data *///Your order amount is :".$this->input->post("in_pu_gtot") $customer_mobile
                    $data = json_encode(["message" => "Thank you for ordering with Cinemapuram. See your E bill:".base_url()."index.php/ebill?id=".base64_encode(30000),
                            "transaction_id" =>146,
                            "msisdn" => [
                                ["mobile"=> '0771989496']
                                ],
                        "push_notification_url"=> ""
                    ]);
                    /* Set JSON data to POST */
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    /* Define content type */
                    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                        'Content-Type:application/json',
                        'Authorization:Bearer ' . json_decode($result)->token));
                    /* Return json */
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    /* make request */
                    $result = curl_exec($curl);
                    curl_close($curl);
                    var_dump(json_decode($result));
            endif;

 

	}
}