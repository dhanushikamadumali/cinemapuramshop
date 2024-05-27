<?php 
if($this->input->post("func_n") == "ad_manu"):
 
	$this->form_validation->set_rules('mname', 'Manufature Name', "trim|required");
 $this->form_validation->set_rules('commission', 'Commission', "trim|required");
	// $this->form_validation->set_rules('mobile', 'mobile', "trim|required");
	// $this->form_validation->set_rules('details', 'detail', "trim|required");

	if ($this->form_validation->run()):
		#region ------- // create categoery id
		$query = $this->db->query("SELECT * FROM manufacturer_information ORDER BY id DESC LIMIT 1")->result();
		if($query):
			$exp_tranno_code = (explode("-", $query[0]->manufacturer_id));
			$Eacc_number =  $exp_tranno_code[1];
			$Eacc_number++;
			$mNo = "M".'-'.str_pad($Eacc_number, 3, "0", STR_PAD_LEFT);
		else: 
			$mNo = "M".'-'."001";
		endif;

		 // create acc id
		 $query = $this->db->query("SELECT * FROM acc_name ORDER BY id DESC LIMIT 1")->result();
		
		 if($query):
			// var_dump($query[0]->acc_code);
		 $exp_acc_code = (explode("-", $query[0]->acc_code));
		//  var_dump($exp_acc_code );
		 $Eacc_code =  $exp_acc_code[1];
		 $Eacc_code++;
		//  var_dump($Eacc_code++);
		 $lngth = strlen((string)$Eacc_code)+2;
		 var_dump($lngth);
		 $accCD = 'ACC-'.str_pad($Eacc_code, $lngth, "0", STR_PAD_LEFT);
		 var_dump($accCD);
		 else:
			 $accCD = 'ACC-'."001";
		 endif;
		 $acc_name_details = array("acc_categry"=> 1,
								 "acc_code"=> $accCD,
								 "account_name"=> "Stall Account -"." ".$this->input->post("mname") ,
								 "description"=> $this->input->post("mname")
							 );
		 // get acc id
		 $this->Common_model->insert("acc_name", $acc_name_details);
		 $acc_name_insertID = $this->Common_model->getInsert_id();
		 $account_id = $acc_name_insertID;

		$add_manufature_details = array("manufacturer_id"=>$this->input->post("morder"),
										"manufacturer_name"=>$this->input->post("mname"),
										"address"=>$this->input->post("address"),
										"mobile"=>$this->input->post("mobile"),
										"details"=>$this->input->post("details"),
										"status"=>"1",
										"commission"=>$this->input->post("commission"),
										"acc_id"=>$account_id);
									
		$this->Common_model->insert("manufacturer_information", $add_manufature_details);
		$success['status'] = true; 
		echo json_encode($success);

 else:
		$error['status'] = false;
		$error['mname'] = form_error("mname");
			$error['commission'] = form_error("commission"); 
		// $error['mobile'] = form_error("mobile");
		// $error['details'] = form_error("details");
	
		echo json_encode($error);
	
	endif;
endif;
unset($func_n);

if($this->input->post("func_n") =="edit_manu"):
	$this->form_validation->set_rules('mname', 'Manufature Name', "trim|required");
    $this->form_validation->set_rules('commission', 'Commission', "trim|required");
	// $this->form_validation->set_rules('mobile', 'mobile', "trim|required");
	// $this->form_validation->set_rules('details', 'detail', "trim|required");

    if ($this->form_validation->run()):
        $manu_details = $this->Common_model->get_all("manufacturer_information",array("id"=>$this->input->post("id")))->result();

    if($manu_details != NULL):
		
		$edit_manu_details = array("manufacturer_id"=>$this->input->post("morder"),
									"manufacturer_name"=>$this->input->post("mname"),
									"address"=>$this->input->post("address"),
									"mobile"=>$this->input->post("mobile"),
									"details"=>$this->input->post("details"),
										"commission"=>$this->input->post("commission"),
									"status"=>"1");	
		$update_manu_details=$this->Common_model->update("manufacturer_information", $edit_manu_details,array("id"=>$manu_details[0]->id));
        $success["status"] = true;
		echo json_encode($success);
   
    endif;
    else:
		$error['status'] = false;
		$error['mname'] = form_error("mname");
			$error['commission'] = form_error("commission");
		// $error['mobile'] = form_error("mobile");
		// $error['details'] = form_error("details");
	
		echo json_encode($error);
    endif;
endif;
unset($func_n);


