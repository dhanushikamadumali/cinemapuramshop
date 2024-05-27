<?php
if($this->input->post("func_n") == "get_product"):
   // var_dump($this->input->post());
    ?>
     <div class="row">
    <?php
    if($this->input->post("m_id")!=""):
          $mCounter=0;
          $this->db->select("id,product_name,status,manufacturer_price as mnuprice");
          $pname=$this->Common_model->get_all("product_information",["manufacturer_id"=>$this->input->post("m_id")])->result();
          
          	$this->db->limit(1);
			$this->db->order_by("id","desc");
			$accdate=$this->Common_model->get_all("cashier_open")->result();
          
          
           $i=0; 
         foreach($pname as $prname):
            $isinserted= $this->Common_model->get_all("product_purchase_details",["product_id"=>$prname->id,"acc_date"=>$accdate[0]->acc_date])->result();
             if(! $isinserted):
            $mCounter++;
            ?>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="custom-control custom-switch switch-primary switch-md "><br>
                  <input type="checkbox" class="custom-control-input isitemAvail" id="switch-s<?php echo $prname->id?>" name="qty[]"  value="<?php echo $prname->id?>"  <?php //echo ($prname->status == 1 )?"checked":NULL ?>>
                  <label class="custom-control-label " for="switch-s<?php echo $prname->id?>"> <?php echo $prname->product_name?></label>
                </div>
                <!-- <input  type="checkbox" class="chkbx " value="" id="<?php //echo $prname->id?>">                -->
                <!-- <input class="chkbx isitemAvail toSwitch"  type="checkbox"  onclick="" value="<?php // echo $prname->id?>"  id=""  />  <?php echo $prname->product_name?> -->
              </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 quantity">
                <input  type="text" placeholder="Qty" class="form-control prqty-<?php echo $prname->id?>"  value="" id="<?php echo $prname->id?>" style="display: none;padding:.375rem 0.5rem" >
                
                </div>
            <?php if ($mCounter % 3 == 0):  ?>
               
            </div>
            <div class="row">
                <?php
                endif;
                ?>
                <?php
              $i++; 
          endif;
          endforeach;
          
          
        endif;
        
        
            ?>
     </div>		                  
     
    <?php
   
    endif;
// available product
if($this->input->post("func_n") == "available_product"):

       
       
       
       
      // $this->Common_model->delete("product_purchase_details",["purchase_id"=>$product_purchase_insertID]);
       
       
  #region ------- // get supplier acc id
  // $this->db->select('acc_id');
  // $supplier_acc_id  = $this->Common_model->get_all('supplier_information',['id'=>$this->input->post('sid')])->result();
       #region ------- // get bank commpany account id
      $this->db->select('*');
  $branch_details  = $this->Common_model->get_all('branch',['id'=>1])->result();
        #region ------- // create transation number
      $query = $this->db->query("SELECT * FROM product_purchase ORDER BY id DESC LIMIT 1")->result();
      if($query):
          $exp_tranno_code = (explode("_", $query[0]->transaction_no));
          $Eacc_number =  $exp_tranno_code[1];
          $Eacc_number++;
          $traNo = $branch_details[0]->code."GP". date('Ym').'_'.str_pad($Eacc_number, 4, "0", STR_PAD_LEFT);
      else: 
          $traNo = $branch_details[0]->code."GP". date('Ym').'_'."0001";
      endif;
     
       #region ------- // insert product purchase details
      $DateTime = date('Y-m-d H:i:s');
      $add_product_purchase_details = array(
                                              "branch_id "=>1,
                                              // "supplier_id"=>$this->input->post("sid"),
                                              "transaction_no"=> $traNo,
                                              // "purchase_remark"=>$this->input->post("pdtls"),
                                              // "total_amount"=>$this->input->post("alltotal"),
                                              "purchase_date"=> $DateTime,
                                              "cr"=>$branch_details [0]->acc_good_purchase,
                                              // "dr"=>$supplier_acc_id [0]->acc_id,
                                              // "acc_remark "=>$this->input->post("pdtls"),
                                              "add_by"=>$this->session->userdata("user_id"),
                                              "status"=>1,
                                          );
                
  $this->Common_model->insert("product_purchase",  $add_product_purchase_details);
      $product_purchase_insertID = $this->Common_model->getInsert_id();



      #region ------- Product Purchase Details -------
  foreach (json_decode($this->input->post("availarr")) as $dtArray ):
        
    //var_dump($dtArray->prod_id);
$product_details=$this->Common_model->get_all("product_information",["id"=> $dtArray->prod_id])->result();


	$this->db->limit(1);
			$this->db->order_by("id","desc");
			$accdate=$this->Common_model->get_all("cashier_open")->result();
			
			
			
    $pid =$dtArray->prod_id;
    $table_qty = $dtArray->prod_qty;
    $DateTime = date('Y-m-d H:i:s');
    $product_purchase_details_details = array(  
                                                      "branch_id"=> 1,
                                                      "purchase_id"=>$product_purchase_insertID,
                                                      "product_id"=> $pid,
                                                      "purchase_qty"=> $table_qty,
                                                      "quantity"=> $table_qty,
                                                "sold_qty"=> 0,
                                                "prod_date"=> $DateTime,
                                                // "purchase_price"=> $table_pprice,
                                                "manufacturer_price"=>($product_details)?$product_details[0]->manufacturer_price:0,
                                                // "amount"=> $table_tot,
                                                 "acc_date"=> $accdate[0]->acc_date,
                                                "status"=>1
                                                  );
                                                  
  $purchase_details=$this->Common_model->get_all("product_purchase_details",[ "product_id"=> $dtArray->prod_id, "date(acc_date)"=>$accdate[0]->acc_date])->result();
       
        if($purchase_details):
          $updetails=array(
            "purchase_qty"=>$purchase_details[0]->purchase_qty+$table_qty,
          );
          $this->Common_model->update('product_purchase_details',$updetails,['product_id '=>$purchase_details[0]->product_id,"date(prod_date)"=>$accdate[0]->acc_date]);
        else:
          $this->Common_model->insert("product_purchase_details", $product_purchase_details_details);
        endif;
  endforeach;//End Iterator Foreach

      

  $success['status'] = true; 
  echo json_encode($success);


endif;


// available product
if($this->input->post("func_n") == "get_stole_order"):

  
  $update_delivery_status= array("delivery_status"=>1);
  $update_customer_details=$this->Common_model->update("sales_order_details",  $update_delivery_status,array("id"=>$this->input->post('id')));
       
  $success['status'] = true; 
  echo json_encode($success);


endif;


if($this->input->post("func_n") == "get_purchaseqty_order"):
  // var_dump($this->input->post("pqty"));
  // var_dump($this->input->post("pdid"));
  $sold_qty=$this->Common_model->get_all("product_purchase_details",[ "id"=> $this->input->post("pdid")])->result();
      //  var_dump($sold_qty[0]->sold_qty);
  $update_details= array( "purchase_qty"=>$this->input->post("pqty"),
                          "quantity"=>$this->input->post("pqty")-$sold_qty[0]->sold_qty
                        );
  $update_customer_details=$this->Common_model->update("product_purchase_details",   $update_details,array("id"=>$this->input->post("pdid")));

  $success['status'] = true; 
  echo json_encode($success);
   
  endif;


if($this->input->post("func_n") == "ad_stallpayment"):
   
    $this->form_validation->set_rules('mname', 'Manufaturer Name', "trim|required");
    $this->form_validation->set_rules('amount', 'Amount', "trim|required");
    $this->form_validation->set_rules('payaccount', 'Pay Account', "trim|required");
    $this->form_validation->set_rules('remark', 'Remark', "trim");
    
    
    if ($this->form_validation->run()):
        date_default_timezone_set('Asia/Colombo');
        $DateTime = date('Y-m-d H:i:s');
        $mid =  $this->input->post("mname");
        $query = $this->db->query("SELECT acc_id FROM manufacturer_information WHERE id='$mid'")->result();
        $macc_id = $query[0]->acc_id;
       
       
       	$this->db->limit(1);
		$this->db->order_by("id","desc");
		$accdate=$this->Common_model->get_all("cashier_open")->result();
			
			
        $manu_payment_details = array("manu_id"=> $this->input->post("mname"),
                                        "amount"=>$this->input->post("amount"),
                                        "remark"=>$this->input->post("remark"),
                                        "cr"=>$this->input->post("payaccount"),
                                        "dr"=> $macc_id,
                                        "date"=>  $DateTime,
                                        "status"=> 1,
                                        "user_id"=> $this->session->userdata("user_id"),
										"acc_date"=> $accdate[0]->acc_date
                                      );
      $this->Common_model->insert("manufacturer_payment",  $manu_payment_details);
      $success['status'] = true; 
      echo json_encode($success);
  
   else:
      $error['status'] = false;
      $error['mname'] = form_error("mname");
      $error['amount'] = form_error("amount"); 		
      $error['payaccount'] = form_error("payaccount"); 		
      echo json_encode($error);
      
    
    endif;
  endif; 


  if($this->input->post("func_n") == "edit_stallpayment"):
   
    $this->form_validation->set_rules('mname', 'manufaturer name', "trim|required");
    $this->form_validation->set_rules('amount', 'amount', "trim|required"); 
    $this->form_validation->set_rules('payaccount', 'Pay Account', "trim|required");
    $this->form_validation->set_rules('remark', 'Remark', "trim");
      
    if ($this->form_validation->run()):
      $manupay_details = $this->Common_model->get_all("manufacturer_payment",array("id"=>$this->input->post("id")))->result();
      if($manupay_details != NULL):
        date_default_timezone_set('Asia/Colombo');
        $DateTime = date('Y-m-d H:i:s');
        $mid =  $this->input->post("mname");
        $query = $this->db->query("SELECT acc_id FROM manufacturer_information WHERE id='$mid'")->result();
        $macc_id = $query[0]->acc_id;
        $manu_payment_update_details = array("manu_id"=> $this->input->post("mname"),
                                              "amount"=>$this->input->post("amount"), 
                                              "cr"=>$this->input->post("payaccount"),
                                              "dr"=> $macc_id,
                                              "date"=>  $DateTime,
                                              "status"=> 1,
                                              "user_id"=> $this->session->userdata("user_id")
                                            );
       $this->Common_model->update("manufacturer_payment", $manu_payment_update_details ,array("id"=>$manupay_details[0]->id));
      // $this->Common_model->insert("manufacturer_payment",  $manu_payment_details);
      $success['status'] = true; 
      echo json_encode($success);
    endif;
   else:
      $error['status'] = false;
      $error['mname'] = form_error("mname");
      $error['amount'] = form_error("amount"); 	
      $error['payaccount'] = form_error("payaccount");	
      echo json_encode($error);
    endif;
  endif; 

  if($this->input->post("func_n") =="delete_stole_payment"):
    $manupay_details = $this->Common_model->get_all("manufacturer_payment",array("id"=>$this->input->post("id")))->result();
    if($manupay_details ):
      $this->Common_model->delete("manufacturer_payment",array('id'=>$this->input->post("id")));
    endif;
  endif;



if($this->input->post("func_n") == "shopstatusupdate"):

    $m_details = $this->Common_model->get_all("manufacturer_information",array("id"=>$this->input->post("mid")))->result();
    if($m_details):
      $isshop_details = array("shop_status"=>1);
  
   $this->Common_model->update("manufacturer_information", $isshop_details,array("id"=>$this->input->post("mid")));
  
    endif;
  
  endif;
  
  
  if($this->input->post("func_n") == "get_today_item_update"):
	
    $details=$this->Common_model->get_all("product_purchase_details",["id"=>$this->input->post("id")])->result();
    if($details):
      
    ?>
    <div class="row">	
    <input type="hidden" class="form-control ih-medium ip-gray radius-xs b-light px-15" name="id"  value="<?php echo ($details[0]->id) ?>"> 
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        Available Item Quantity
      </div>
      
    <div class="col-md-5 mb-15">
          <div class="input-group" style="width:150px;height:auto">
              <div class="input-group-prepend">
                  <button type="button" class="input-group-text minus" value=""  style="border-radius: 0px;padding:0rem 1rem"><i class="fa fa-minus" ></i></button>
              </div>
              <div class='custom-file'>
                  <input  class="form-control-plaintext a text-center cngqty qty" placeholder="current quantity"  id='qty' name='qty' value='<?php echo number_format($details[0]->quantity,0,"",""); ?>'   oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..?)\../g, '$1');">
              </div>
              <div class="input-group-prepend qtyparent ">
                  <button class="input-group-text pluse" type="button"  value="" style="border-radius: 0px;;padding:0rem 1rem" ><i class='fa fa-plus'></i></button>
              </div>
          </div>
      </div>
    </div>
    <?php
      endif;
    ?>
  <?php
   
  endif;

  if($this->input->post("func_n") == "today_available_item_update"):

 
	$this->db->limit(1);
		$this->db->order_by("id","desc");
		$accdate=$this->Common_model->get_all("cashier_open")->result(); 

        $details = $this->Common_model->get_all("product_purchase_details",["id"=>$this->input->post("pid")])->result();
 var_dump($details);
        if($details):
            $update_purchaseqty = ($this->input->post("qty")-$details[0]->quantity)+$details[0]->purchase_qty;
 
            $update_details = array("quantity"=>$this->input->post("qty"),
                                    "purchase_qty"=>$update_purchaseqty                                    );
        $this->Common_model->update("product_purchase_details", $update_details,array("id"=>$this->input->post("pid")));
  
  endif;
  
endif;
  
  
  if($this->input->post("func_n")=="get_today_kot"):
 
  ?>
      
          <tr style="font-size:13px"> 
                  <td>
                  <b>Order No</b>
                  </td>
                  <td>
                  <b>Product name</b>
                  </td>
                  <td>
                  <b>Date</b>
                  </td>
                  <td>
                  <b> QTY</b>
                  </td>
                   <td>
                  <b>Order Type</b>
                  </td>
                  <td>
                  <b>Order Status</b>
                  </td>
                  <td>
                  <b>Total Price</b>
                  </td>
              </tr>       
              <?php  
                  $kots= $this->db->query('SELECT sales_order_details.*,pi.*,sales_order.order_type,sales_order.transaction_no, sales_order_details.status FROM `sales_order_details` 
                  JOIN product_information as pi ON pi.id=sales_order_details.product_id LEFT JOIN sales_order ON sales_order.id=sales_order_details.order_id
                  WHERE manufacturer_id='.$this->input->post("mid").' AND  date(sales_order_details.acc_date) between "'.$this->input->post("fromdate").'" 
                  AND "'.$this->input->post("todate").'" ORDER BY order_date ASC')->result();
                      $oddeven=0;
                      $ttlamt=0;
                  foreach($kots as $manu):
                    $oddeven++;
                      ?>
                      <tr style="font-size:13px;<?php echo ($manu->status==1)?($oddeven%2==1)?"background-color:#ccc":"background-color:#d9daf8": "background-color:#ffb1b1" ?>"> 
                          <td>
                          <?= explode("_",$manu->transaction_no) [1] ?>
                          </td>
                          <td>
                          <?= $manu->product_name  ?>
                          </td>
                          <td>
                          <?= $manu->order_date ?>
                          </td>
                          <td>
                          <?= $manu->item_qty  ?>
                          </td>
                          <td>
                          <?= $manu->order_type  ?>
                          </td> 
                          <td>
                          <?= ($manu->status==1)?"Delevered":"Cancelled"  ?>
                          </td>
                          <td style="text-align:right">
                          <?php
                          if($manu->status==1):
                              if($manu->order_type=="dine-in"):
                                  echo  number_format($manu->total_price,2,".",",");
                                  $ttlamt+= $manu->total_price ;
                              else:
                                   echo number_format($manu->package_charge+$manu->total_price,2,".",",");
                                   $ttlamt+=$manu->package_charge+$manu->total_price ;
                              endif;
                          else:
                              echo  number_format(0,2,".",",");
                          endif;
                          ?>
                          </td>
                      </tr>
                   
                  <?php
                       endforeach;
                  ?>
                  <tr style="font-size:13px;<?php echo ($oddeven%2==1)?"background-color:#ccc":"background-color:#d9daf8"  ?>"> 
                          <td>
                          
                          </td>
                          <td>
                          
                          </td> <td>
                          
                          </td>
                          <td>
                           
                          </td>
                          <td>
                          
                          </td>
                          <th>
                          Total
                          </th>
                          <th style="text-align:right">
                          <?php echo number_format($ttlamt,2,".",",")  ?>
                          </th>
                      </tr>
                      <?php          
endif;
if($this->input->post("func_n")=="shop_pause"):
      $this->Common_model->update("manufacturer_information",["shop_status"=>$this->input->post("sstatus")],["id"=>$this->session->userdata("manufaturer_id")]);
endif;
?>