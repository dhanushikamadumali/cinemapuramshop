<?php
$func_n = "ad_user";
if($this->input->post("func_n") == $func_n):
	$this->form_validation->set_rules('name', 'name', "trim|required");
	$this->form_validation->set_rules('uname', 'uname', "trim|required");
	$this->form_validation->set_rules('pswrd', 'pswrd', "trim|required|matches[cpswrd]");
	$this->form_validation->set_rules('cpswrd', 'cpswrd', "trim|required");
	$this->form_validation->set_rules('email', 'email', "trim|required");
	$this->form_validation->set_rules('urole', 'urole', "trim|required");


	if ($this->form_validation->run()):
		
		// if($_POST['fimage']!=""){
		// 	$folderPath = 'assets/contents/farmer_images/';
		// 	$image_parts = explode(";base64,", $_POST['fimage']);
		// 	$image_type_aux = explode("image/", $image_parts[0]);
		// 	$image_type = $image_type_aux[1];
		// 	$image_base64 = base64_decode($image_parts[1]);
		// 	$file = $folderPath . uniqid() . '.jpg';
		// 	file_put_contents($file, $image_base64);
		// 	// echo json_encode($file);
	
		// }else{
		// 	$file='assets/contents/farmer_images/user_img_default.jpg';
		// }

		$add_user_details = array("name"=>$this->input->post("name"),"user_name"=>$this->input->post("uname"),"password"=>$this->input->post("pswrd"),"image"=>"user_default_image.jpg",
									"con_password"=>$this->input->post("cpswrd"),"email"=>$this->input->post("email"),"user_role"=>$this->input->post("urole"));
		$this->Common_model->insert("system_user", $add_user_details);
		$user_insertID = $this->Common_model->getInsert_id();

		if ($this->input->post('mname') != NULL):
            foreach ($this->input->post('mname') as $result):
                $user_manufaturer = array(
                                            "user_id"=>  $user_insertID,
                                            "manufaturer_id" =>$result
                                        );
                $this->Common_model->insert("user_manufaturer",$user_manufaturer );
            endforeach;
        endif;
		
		
		$success['status'] = true; 
		echo json_encode($success);

 else:
		$error['status'] = false;
		$error['name'] = form_error("name");
		$error['uname'] = form_error("uname");
		$error['pswrd'] = form_error("pswrd");
		$error['cpswrd'] = form_error("cpswrd");
		$error['email'] = form_error("email");
		$error['urole'] = form_error("urole");
	
		echo json_encode($error);
	
	endif;
endif;
unset($func_n);

$func_n = "edit_user";
if($this->input->post("func_n") == $func_n):
	
	$this->form_validation->set_rules('name', 'name', "trim|required");
	$this->form_validation->set_rules('uname', 'uname', "trim|required");
	$this->form_validation->set_rules('pswrd', 'pswrd', "trim|required");
	$this->form_validation->set_rules('cpswrd', 'cpswrd', "trim|required|matches[cpswrd]");
	$this->form_validation->set_rules('email', 'email', "trim|required");
	$this->form_validation->set_rules('urole', 'urole', "trim|required");
    if ($this->form_validation->run()):
        $user_details = $this->Common_model->get_all("system_user",array("id"=>$this->input->post("id")))->result();

    if($user_details != NULL):
		
		$edit_user_details = array("name"=>$this->input->post("name"),"user_name"=>$this->input->post("uname"),"password" => $this->input->post("pswrd"),"con_password" => $this->input->post("cpswrd"),"user_role"=>$this->input->post("urole"));
	
		// if($_POST['fimage']!=""):
		// 	$existing_image= $farmer_details[0]->fimage;
		// 	if ($existing_image == "assets/contents/farmer_images/default_image.jpg"):
		// 	else:
		// 		$image_name = $existing_image;
		// 		if($existing_image != null):
		// 			if (file_exists($image_name)):
		// 				unlink($image_name);
		// 			endif;
		// 		endif;
	
		// 	endif;

			// $folderPath = 'assets/contents/farmer_images/';
			// $image_parts = explode(";base64,", $_POST['fimage']);
			// $image_type_aux = explode("image/", $image_parts[0]);
			// $image_type = $image_type_aux[1];
			// $image_base64 = base64_decode($image_parts[1]);
			// $file = $folderPath . uniqid() . '.jpg';
			// file_put_contents($file, $image_base64);
			// $edit_farmer_details["fimage"]=$file;

		// endif;
			$update_user_details=$this->Common_model->update("system_user", $edit_user_details,array("id"=>$user_details[0]->id));
			
			$this->Common_model->delete("user_manufaturer",array("user_id"=>$this->input->post("id")));
		
			if ($this->input->post('mname') != NULL):
				foreach ($this->input->post('mname') as $result):
					$user_manufaturer = array(
												"user_id"=> $this->input->post("id"),
												"manufaturer_id" =>$result
											);
					$this->Common_model->insert("user_manufaturer",$user_manufaturer );
				endforeach;
			endif;

			$success["status"] = true;
			echo json_encode($success);
			
		endif;
		else:
			$error['status'] = false;
			$error['name'] = form_error("name");
			$error['uname'] = form_error("uname");
			$error['pswrd'] = form_error("pswrd");
			$error['cpswrd'] = form_error("cpswrd");
			$error['email'] = form_error("email");
			$error['urole'] = form_error("urole");
			echo json_encode($error);
		endif;
	endif;
	unset($func_n);


if($this->input->post("func_n") == "deactiveuser"):

	$user_details = $this->Common_model->get_all("system_user",array("id"=>$this->input->post("uid")))->result();
	if($user_details):
		$deactive_userdetails = array("active_status"=>0);

	$update_user_details=$this->Common_model->update("system_user", $deactive_userdetails,array("id"=>$this->input->post("uid")));

	endif;

endif;
if($this->input->post("func_n") == "activeuser"):

	$user_details = $this->Common_model->get_all("system_user",array("id"=>$this->input->post("uid")))->result();
	if($user_details):
		$active_userdetails = array("active_status"=>1);

	$update_user_details=$this->Common_model->update("system_user", $active_userdetails,array("id"=>$this->input->post("uid")));

	endif;

endif;
