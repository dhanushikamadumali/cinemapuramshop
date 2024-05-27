<?php 
if($this->input->post("func_n") == "ad_supplier"):
   
	$this->form_validation->set_rules('sname', 'supplier name', "trim|required");
    $this->form_validation->set_rules('address', 'Address', "trim|required");
    $this->form_validation->set_rules('mobile', 'Mobile', "trim|required");
    $this->form_validation->set_rules('details', 'Details', "trim|required");
	
	if ($this->form_validation->run()):
        #region ------- // create supplier id
		$supquery = $this->db->query("SELECT * FROM supplier_information ORDER BY id DESC LIMIT 1")->result();
		if($supquery):
			$exp_tranno_code = (explode("-", $supquery[0]->supplier_id));
			$Eacc_number =  $exp_tranno_code[1];
			$Eacc_number++;
			$sId = "S".'-'.str_pad($Eacc_number, 3, "0", STR_PAD_LEFT);
		else: 
			$sId = "S".'-'."001";
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
                                "account_name"=> "Supplier Account -".$sId." ".$this->input->post("sname") ,
                                "description"=> $this->input->post("sname")
                            );
	    // get acc id
        $this->Common_model->insert("acc_name", $acc_name_details);
		$acc_name_insertID = $this->Common_model->getInsert_id();
		$account_id = $acc_name_insertID;
        $DateTime = date('Y-m-d H:i:s');
		$add_supplier_details = array(  "supplier_id"=>$sId,
                                        "supplier_name"=>$this->input->post("sname"),
                                        "address"=>$this->input->post("address"),
                                        "mobile"=>$this->input->post("mobile"),
                                        "details"=>$this->input->post("details"),
                                        "status"=> 1,
                                        "acc_id"=>"$account_id",
                                        "datetime"=>"$DateTime"
                                    );
									
		$this->Common_model->insert("supplier_information",$add_supplier_details);
		$success['status'] = true; 
		echo json_encode($success);

 else:
		$error['status'] = false;
		$error['sname'] = form_error("sname"); 	
        $error['address'] = form_error("address");
		$error['mobile'] = form_error("mobile"); 	
        $error['details'] = form_error("details");	
		echo json_encode($error);
	
	endif;
endif;
if($this->input->post("func_n") == "edit_supplier"):
   
	$this->form_validation->set_rules('sname', 'supplier name', "trim|required");
    $this->form_validation->set_rules('address', 'Address', "trim|required");
    $this->form_validation->set_rules('mobile', 'Mobile', "trim|required");
    $this->form_validation->set_rules('details', 'Details', "trim|required");
	
	if ($this->form_validation->run()):
        #region ------- // get supplier acc id
        $this->db->select('*');
        $supdetails = $this->Common_model->get_all('supplier_information',['id'=>$this->input->post('id')])->result();
      
        $sacc_id =   $supdetails[0]->acc_id;
       
        if($supdetails != NULL):
        $this->Common_model->delete("acc_name",["id"=>$sacc_id]);
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
                                "account_name"=> "Supplier Account -".$this->input->post('sid')." ".$this->input->post("sname") ,
                                "description"=> $this->input->post("sname")
                            );
	    // get acc id
        $this->Common_model->insert("acc_name", $acc_name_details);
		$acc_name_insertID = $this->Common_model->getInsert_id();
		$account_id = $acc_name_insertID;
        $DateTime = date('Y-m-d H:i:s');
		$edit_supplier_details = array( "supplier_id"=>$this->input->post('sid'),
                                        "supplier_name"=>$this->input->post("sname"),
                                        "address"=>$this->input->post("address"),
                                        "mobile"=>$this->input->post("mobile"),
                                        "details"=>$this->input->post("details"),
                                        "status"=> 1,
                                        "acc_id"=>"$account_id",
                                        "datetime"=>"$DateTime"
                                    );
		$update_customer_details=$this->Common_model->update("supplier_information", $edit_supplier_details,array("id"=>$supdetails[0]->id));
	
		$success['status'] = true; 
		echo json_encode($success);
    endif;

 else:
		$error['status'] = false;
		$error['sname'] = form_error("sname"); 	
        $error['address'] = form_error("address");
		$error['mobile'] = form_error("mobile"); 	
        $error['details'] = form_error("details");	
		echo json_encode($error);
	
	endif;
endif;









