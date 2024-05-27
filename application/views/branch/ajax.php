<?php 
if($this->input->post("func_n") == "ad_branch"):
    // var_dump($_POST);

	$this->form_validation->set_rules('bno', 'branch number', "trim|required|is_unique[branch.branch_number]",array('is_unique'  => 'This %s already exists.'));
	$this->form_validation->set_rules('bname', 'branch name', "trim|required|is_unique[branch.branch_name]",array('is_unique'  => 'This %s already exists.'));
	$this->form_validation->set_rules('address', 'address', "trim|required");
	$this->form_validation->set_rules('code', 'code', "trim|required");
	
	if ($this->form_validation->run()):
		// create acc code
        $query = $this->db->query("SELECT * FROM acc_name ORDER BY id DESC LIMIT 1")->result();
        if($query):
			$exp_acc_code = (explode("-", $query[0]->acc_code)); 
        	$Eacc_code =  $exp_acc_code[1];
		else:
       		$Eacc_code =  "ACC-001";
		endif;

// ===========================  Good purchase  Account
        $Eacc_code++;
        $lngth = strlen((string)$Eacc_code)+2;
        $accCD = 'ACC-'.str_pad($Eacc_code, $lngth, "0", STR_PAD_LEFT);
       
        $acc_name_details = array("acc_categry"=> 1,
                                "acc_code"=> $accCD,
                                "account_name"=> "Good Purchase - ".$this->input->post("bname"),
                                "description"=> $this->input->post("bname")
                            );
		//  get acc id
        $this->Common_model->insert("acc_name", $acc_name_details);
		$acc_good_purchaseID = $this->Common_model->getInsert_id();

// ===========================  purchase Payment Account
		$Eacc_code++;
        $lngth = strlen((string)$Eacc_code)+2;
        $accCD = 'ACC-'.str_pad($Eacc_code, $lngth, "0", STR_PAD_LEFT);
       
        $acc_name_details = array("acc_categry"=> 1,
                                "acc_code"=> $accCD,
                                "account_name"=> "Purchase Payment - ".$this->input->post("bname"),
                                "description"=> $this->input->post("bname")
                            );
		//  get acc id
        $this->Common_model->insert("acc_name", $acc_name_details);
		$acc_purchase_paymentID = $this->Common_model->getInsert_id();
// ===========================  sales order Account
		$Eacc_code++;
		$lngth = strlen((string)$Eacc_code)+2;
		$accCD = 'ACC-'.str_pad($Eacc_code, $lngth, "0", STR_PAD_LEFT);

		$acc_name_details = array("acc_categry"=> 1,
								"acc_code"=> $accCD,
								"account_name"=> "Sales Order - ".$this->input->post("bname"),
								"description"=> $this->input->post("bname")
							);
		//  get acc id
		$this->Common_model->insert("acc_name", $acc_name_details);
		$acc_sales_orderID = $this->Common_model->getInsert_id();
		// ===========================  cash in hand Account
		$Eacc_code++;
        $lngth = strlen((string)$Eacc_code)+2;
        $accCD = 'ACC-'.str_pad($Eacc_code, $lngth, "0", STR_PAD_LEFT);
       
        $acc_name_details = array("acc_categry"=> 1,
                                "acc_code"=> $accCD,
                                "account_name"=> "Cash in Hand - ".$this->input->post("bname"),
                                "description"=> $this->input->post("bname")
                            );
		//  get acc id
        $this->Common_model->insert("acc_name", $acc_name_details);
		$acc_Cashin_handID = $this->Common_model->getInsert_id();
 
		$add_branch_details = array("branch_number"=>$this->input->post("bno"),
									"branch_name"=>$this->input->post("bname"),
									"address"=>$this->input->post("address"),
									"code"=>$this->input->post("code"),
									"acc_good_purchase"=>$acc_good_purchaseID,
									"acc_purchase_payment"=>$acc_purchase_paymentID,
									"acc_sales_order"=>$acc_sales_orderID,
									"acc_cashin_hand"=>$acc_Cashin_handID 
    								);
		$this->Common_model->insert("branch",$add_branch_details);
		$success['status'] = true; 
		echo json_encode($success);

 else:
		$error['status'] = false;
		$error['bno'] = form_error("bno");
		$error['bname'] = form_error("bname"); 		
		echo json_encode($error);
	
	endif;
endif;


