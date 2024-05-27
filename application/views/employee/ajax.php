<?php
$func_n = "ad_employee";
if($this->input->post("func_n") == $func_n):
	$this->form_validation->set_rules('name', 'name', "trim|required");
	$this->form_validation->set_rules('address', 'address', "trim|required");
	$this->form_validation->set_rules('tno', 'tno', "trim|required");
	$this->form_validation->set_rules('email', 'email', "trim|required");
	
	if ($this->form_validation->run()):

		$add_employee_details = array("ename"=>$this->input->post("name"),
									"address"=>$this->input->post("address"),
									"t_no"=>$this->input->post("tno"),
									"email"=>$this->input->post("email"),
									);

		$this->Common_model->insert("employee", $add_employee_details);
		$employee_insertID = $this->Common_model->getInsert_id();

		$success['status'] = true; 
		echo json_encode($success);

 else:
		$error['status'] = false;
		$error['name'] = form_error("name");
		$error['address'] = form_error("address");
		$error['tno'] = form_error("tno");
		$error['email'] = form_error("email");
		echo json_encode($error);
	
	endif;
endif;
unset($func_n);

$func_n = "edit_employee";
if($this->input->post("func_n") == $func_n):
	
	$this->form_validation->set_rules('name', 'name', "trim|required");
	$this->form_validation->set_rules('address', 'address', "trim|required");
	$this->form_validation->set_rules('tno', 'tno', "trim|required");
	$this->form_validation->set_rules('email', 'email', "trim|required");
	
    if ($this->form_validation->run()):
        $employee_details = $this->Common_model->get_all("employee",array("id"=>$this->input->post("id")))->result();

    if($employee_details != NULL):
		
		$edit_employee_details = array("ename"=>$this->input->post("name"),
										"address"=>$this->input->post("address"),
										"t_no" => $this->input->post("tno"),
										"email" => $this->input->post("email")
									);
	
		
			$update_employee_details=$this->Common_model->update("employee", $edit_employee_details,array("id"=>$employee_details[0]->id));
			
			

			$success["status"] = true;
			echo json_encode($success);
			
		endif;
		else:
			$error['status'] = false;
			$error['name'] = form_error("name");
			$error['address'] = form_error("address");
			$error['tno'] = form_error("tno");
			$error['email'] = form_error("email");
		
			echo json_encode($error);
		endif;
	endif;
	unset($func_n);


if($this->input->post("func_n") == "deactiveemployee"):

	$employee_details = $this->Common_model->get_all("employee",array("id"=>$this->input->post("eid")))->result();
	if($employee_details):
		$deactive_employeedetails = array("status"=>0);

	$update_employee_details=$this->Common_model->update("employee", $deactive_employeedetails,array("id"=>$this->input->post("eid")));

	endif;

endif;
if($this->input->post("func_n") == "activeemployee"):

	$employee_details = $this->Common_model->get_all("employee",array("id"=>$this->input->post("eid")))->result();
	var_dump($employee_details);
	if($employee_details):
		$active_employeedetails = array("status"=>1);

	$update_employee_details=$this->Common_model->update("employee", $active_employeedetails,array("id"=>$this->input->post("eid")));

	endif;

endif;
$func_n = "employee_attendance";
if($this->input->post("func_n") == $func_n):
	$this->form_validation->set_rules('name', 'name', "trim");
	$this->form_validation->set_rules('date', 'date', "trim");
	$this->form_validation->set_rules('amount', 'Amount', "trim");
	$this->form_validation->set_rules('tno', 'tno', "trim");
	$this->form_validation->set_rules('status', 'status', "trim");
	
	if ($this->form_validation->run()):

		$add_employee_attendance_details = array("e_id"=>$this->input->post("ename"),
									"date"=>$this->input->post("date"),
									"amount"=>$this->input->post("amount"),
									"work_status"=>$this->input->post("status")
									);

		$this->Common_model->insert("employee_attendance", $add_employee_attendance_details);
		
		$success['status'] = true; 
		echo json_encode($success);

 else:
		$error['status'] = false;
		
		echo json_encode($error);
	
	endif;
endif;

