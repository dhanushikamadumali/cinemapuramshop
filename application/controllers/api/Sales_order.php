<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
//use chriskacerguis\RestServer\RestController;
// use Restserver\Libraries\REST_Controller;
 
class Sales_order extends REST_Controller{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Colombo");
    }

    public function order_callback_post(){
        
        $data= json_decode(file_get_contents("php://input"));
        
        $transref=$data->transactionReference;
        $ordid=$data->orderId;
        $transtimill=$data->transactionTimeInMillis; 
        $transamt=$data->transactionAmount;
        $transstatus=$data->transactionStatus;
        $trchecksum=$data->checksum;
        
        $this->Common_model->insert("online_order_details",[
            'transactionReference'=>$transref,
            'orderId'=>$ordid,
            'transactionTimeInMillis'=>$transtimill,
            'transactionAmount'=>$transamt,
            'transactionStatus'=>$transstatus,
            'checksum'=>$data->checksum,
            'datetime'=>date("Y-m-d h:i:s")]);
          
          $message= $transref.$ordid.$transtimill.$transamt.$transstatus;
          //
                $s = hash_hmac('sha256', $message, 'SarrajCinema@#0147', true);
                base64_encode($s);
                // echo '<br>';
                if(base64_encode($s)==$data->checksum && ($transstatus=="A" || $transstatus=="P")):  
                    $this->Common_model->update("sales_order",["status"=>1,"paid_status"=>1],["id"=>$ordid]); 
                    $this->Common_model->update("sales_order_payment",["status"=>1],["order_id"=>$ordid]);
                    $this->Common_model->update("sales_order_details",["status"=>1],["order_id"=>$ordid]);
                       
                    $order_details= $this->Common_model->get_all("sales_order_details",["order_id"=>$ordid])->result();
                    $this->db->limit(1);
                    $this->db->order_by("id","desc");
                    $accdate=$this->Common_model->get_all("cashier_open")->result();
                    foreach($order_details as $order_detail):
                        // var_dump($order_detail);
                        // echo '<br>';
                        // echo  $order_detail->product_id;
                        $ppqty=$this->Common_model->get_all('product_purchase_details',['product_id'=>$order_detail->product_id,'prod_date'=>$accdate[0]->acc_date])->result();
                        if($ppqty):
                            $updetails=array(
                                "quantity"=>$ppqty[0]->quantity-$order_detail->item_qty,
                                "sold_qty"=>$ppqty[0]->sold_qty+$order_detail->item_qty
                            );
                            $this->Common_model->update('product_purchase_details',$updetails,['product_id '=>$order_detail->product_id,'prod_date'=>$accdate[0]->acc_date]);
                        endif;
                    endforeach;
                    // if(isset($_SESSION['cart'])):
                    //   unset($_SESSION['cart']);
                    // endif; 
                    $this->response("OK",200);
                else:
                    $this->response("ERROR",500);
                endif;
         
         
         
          
    }

    
}

?>