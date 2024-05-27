<?php 
if($this->input->post("func_n") == "get_bank_branch"):
	$this->db->order_by("id","ASC");
	$branches=$this->Common_model->get_all("bank_branches",["bank_id"=>$this->input->post("bank_id")])->result();
	foreach($branches as $branch):
		?><option value="<?php echo $branch->id?>"><?php echo $branch->branch_code." - ".$branch->branch_name?></option><?php
	endforeach;
endif;



if($this->input->post("func_n") == "ad_bcompany"):
   
	$this->form_validation->set_rules('bname', 'bank name', "trim|required");
	$this->form_validation->set_rules('bbranch', 'branch name', "trim|required");
	$this->form_validation->set_rules('accno', 'account', "trim|required|is_unique[bank_company_accounts.account_no]",array('is_unique'  => 'This %s already exists.'));
	
	if ($this->form_validation->run()):
		// create acc id
        $query = $this->db->query("SELECT * FROM acc_name ORDER BY id DESC LIMIT 1")->result();
        $exp_acc_code = (explode("-", $query[0]->acc_code));
        $Eacc_code =  $exp_acc_code[1];
        $Eacc_code++;
        $lngth = strlen((string)$Eacc_code)+2;
        $accCD = 'ACC-'.str_pad($Eacc_code, $lngth, "0", STR_PAD_LEFT);

        $acc_name_details = array("acc_categry"=> 1,
                                "acc_code"=> $accCD,
                                "account_name"=> "Bank Company Account -".$this->input->post("accno"),
                                "description"=> "Bank Company Account"
                            );
        $this->Common_model->insert("acc_name", $acc_name_details);
		// get account id
		$acc_name_insertID = $this->Common_model->getInsert_id();
		$account_id = $acc_name_insertID;
		$add_bankcompany_details = array(	"bank"=>$this->input->post("bname"),
											"bank_branch"=>$this->input->post("bbranch"),
											"account_no"=>$this->input->post("accno"),
											"acc_id"=>"$account_id"
										);	
		$this->Common_model->insert("bank_company_accounts",$add_bankcompany_details);
		$success['status'] = true; 
		echo json_encode($success);

 else:
		$error['status'] = false;
		$error['bname'] = form_error("bname");
		$error['bbranch'] = form_error("bbranch"); 	
		$error['accno'] = form_error("accno"); 			
		echo json_encode($error);
		
	
	endif;
endif; 



