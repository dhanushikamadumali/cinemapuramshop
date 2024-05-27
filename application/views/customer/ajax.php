<?php 
if($this->input->post("func_n") == "ad_customer"):
   
	$this->form_validation->set_rules('cname', 'customer name', "trim|required");
    $this->form_validation->set_rules('address', 'Address', "trim");
    $this->form_validation->set_rules('mobile', 'Mobile', "trim|required");
    $this->form_validation->set_rules('details', 'Details', "trim");
	
	if ($this->form_validation->run()):
         #region ------- // create customer id
		$cusquery = $this->db->query("SELECT * FROM customer_information ORDER BY id DESC LIMIT 1")->result();
		
        if($cusquery):
			$exp_tranno_code = (explode("-", $cusquery[0]->customer_id));
			$Eacc_number =  $exp_tranno_code[1];
			$Eacc_number++;
			$cId = "CUS".'-'.str_pad($Eacc_number, 3, "0", STR_PAD_LEFT);
		else: 
			$cId = "CUS".'-'."001";
		endif;
        // create acc id
        $query = $this->db->query("SELECT * FROM acc_name ORDER BY id DESC LIMIT 1")->result();
        if($query):
        $exp_acc_code = (explode("-", $query[0]->acc_code));
        $Eacc_code =  $exp_acc_code[1];
        $Eacc_code++;
        $lngth = strlen((string)$Eacc_code)+2;
        $accCD = 'ACC-'.str_pad($Eacc_code, $lngth, "0", STR_PAD_LEFT);
        else:
            $accCD = 'ACC-'."001";
        endif;
        $acc_name_details = array("acc_categry"=> 1,
                                "acc_code"=> $accCD,
                                "account_name"=> "Customer Account -".$cId." ".$this->input->post("cname") ,
                                "description"=> $this->input->post("cname")
                            );
	    // get acc id
        $this->Common_model->insert("acc_name", $acc_name_details);
		$acc_name_insertID = $this->Common_model->getInsert_id();
		$account_id = $acc_name_insertID;
        $DateTime = date('Y-m-d H:i:s');
		$add_customer_details = array(  "customer_id"=>$cId,
                                        "customer_name"=>$this->input->post("cname"),
                                        "address"=>$this->input->post("address"),
                                        "mobile"=>$this->input->post("mobile"),
                                        "details"=>$this->input->post("details"),
                                        "status"=> 1,
                                        "acc_id"=>$account_id,
                                        "datetime"=>  $DateTime
                                    );
									
		$this->Common_model->insert("customer_information",$add_customer_details);
		$success['status'] = true; 
		echo json_encode($success);
       
    else:
		$error['status'] = false;
		$error['cname'] = form_error("cname"); 	
        // $error['address'] = form_error("address");
		$error['mobile'] = form_error("mobile"); 	
        // $error['details'] = form_error("details");	
		echo json_encode($error);
	
	endif;
endif;
unset($func_n);

if($this->input->post("func_n") =="edit_customer"):

	$this->form_validation->set_rules('cname', 'customer name', "trim|required");
	$this->form_validation->set_rules('address', 'address', "trim");
    $this->form_validation->set_rules('mobile', 'mobile', "trim|required");
	$this->form_validation->set_rules('details', 'details', "trim");

    if ($this->form_validation->run()):
      
        $customer_details = $this->Common_model->get_all("customer_information",array("id"=>$this->input->post("cid")))->result();

    if($customer_details != NULL):
        #region ------- // get customer  id
        $this->db->select('*');
        $cusdetails = $this->Common_model->get_all('customer_information',['id'=>$this->input->post('cid')])->result();
        // get customer acc id----
        $cacc_id =  $cusdetails[0]->acc_id;
        // delete customer acc id 
        $this->Common_model->delete("acc_name",["id"=>$cacc_id]);
         // create acc id
         $query = $this->db->query("SELECT * FROM acc_name ORDER BY id DESC LIMIT 1")->result();
         if($query):
         $exp_acc_code = (explode("-", $query[0]->acc_code));
         $Eacc_code =  $exp_acc_code[1];
         $Eacc_code++;
         $lngth = strlen((string)$Eacc_code)+2;
         $accCD = 'ACC-'.str_pad($Eacc_code, $lngth, "0", STR_PAD_LEFT);
         else:
             $accCD = 'ACC-'."001";
         endif;
         $acc_name_details = array("acc_categry"=> 1,
                                 "acc_code"=> $accCD,
                                 "account_name"=> "Customer Account -".$this->input->post("customerid")." ".$this->input->post("cname") ,
                                 "description"=> $this->input->post("cname")
                             );
         // get acc id
         $this->Common_model->insert("acc_name", $acc_name_details);
         $acc_name_insertID = $this->Common_model->getInsert_id();
         $account_id = $acc_name_insertID;
         $DateTime = date('Y-m-d H:i:s');
		$edit_customer_details = array( "customer_id "=>$this->input->post("customerid"),
                                        "customer_name"=>$this->input->post("cname"),
                                        "address"=>$this->input->post("address"),
                                        "mobile"=>$this->input->post("mobile"),
                                        "details"=>$this->input->post("details"),
                                        "status"=> 1,
                                        "acc_id"=>$account_id,
                                        "datetime"=>  $DateTime
                                    );
    
		$update_customer_details=$this->Common_model->update("customer_information", $edit_customer_details,array("id"=>$customer_details[0]->id));
        $success["status"] = true;
		echo json_encode($success);
   
    endif;
    else:
        $error['status'] = false;
		$error['cname'] = form_error("cname");
		// $error['address'] = form_error("address");
		$error['mobile'] = form_error("mobile");
        // $error['details'] = form_error("details");
		echo json_encode($error);
		
    endif;
endif;


if($this->input->post("func_n") =="delete_customer"):
    $cid = $this->input->post("id");
    $so_details = $this->Common_model->get_all("sales_order",array("customer_id"=>$this->input->post("id")))->result();
	
    if(!$so_details):
        $query = $this->db->query("SELECT * FROM customer_information WHERE id='$cid'")->result();
      
        if($query != NULL):
        $this->Common_model->delete("customer_information",array('id'=>$this->input->post("id")));
        $this->Common_model->delete("acc_name",array('id'=>$query[0]->acc_id));
        endif;

        $success["status"] = true;
        echo json_encode($success);
    else:
        $error['status'] = false;
        echo json_encode($error);
    endif;
		
endif;
		


