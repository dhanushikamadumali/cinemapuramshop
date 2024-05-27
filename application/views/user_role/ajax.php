<?php
if($this->input->post("func_n") == "add_user_type"):
   
    $this->form_validation->set_rules('usertype', 'User Type Name', "trim|required|is_unique[system_user_type.name]");
    if ($this->form_validation->run()):
        $user_type_details = array('name' => $this->input->post('usertype'));
      
       $this->Common_model->insert("system_user_type",   $user_type_details);
       $user_typeID  = $this->Common_model->getInsert_id();
       
        if ($this->input->post('features') != NULL):
            foreach ($this->input->post('features') as $result):
                $user_permission = array(
                                            "user_type_id"=>  $user_typeID,
                                            "feature_id" =>$result
                                        );
                $this->Common_model->insert("system_user_permission",$user_permission );
            endforeach;
        endif;

        $success['status'] = true; 
        echo json_encode($success);
    else:
        $error['status'] = false;
        $error["errors"] = $this->form_validation->error_array();
        echo json_encode($error);
    endif;
endif;


//edit user type
if($this->input->post("func_n") == "edit_user_type"):
    
        $usertype =$this->input->post('usertype');
        // var_dump($usertype);
        $user_type_details=$this->db->query("SELECT * FROM system_user_type WHERE  name = '$usertype'" )->result();
            
            if(count($user_type_details)>0):

            $this->form_validation->set_rules('usertype', 'User Type Name', "trim|required");

            if ($this->form_validation->run()):
                $user_type_details1 = $this->Common_model->get_all("system_user_type",array("id"=>$this->input->post("usertypeid")))->result();
           
            if($user_type_details1 != NULL):
                $edit_user_type_details = array('name' => $this->input->post('usertype'));
        
                $this->Common_model->update("system_user_type", $edit_user_type_details,array("id"=>$user_type_details1[0]->id));
                $this->Common_model->delete('system_user_permission',array('user_type_id' => $this->input->post('usertypeid')));
                
                if ($this->input->post('features')):
                    foreach ($this->input->post('features') as $result):
                        $user_permission = array(
                            "user_type_id"=>  $this->input->post('usertypeid'),
                            "feature_id" =>$result
                        );
                        $this->Common_model->insert("system_user_permission",$user_permission );
                    endforeach;
                endif;
                
                
                $success['status'] = true; 
                echo json_encode($success);
            endif;
            else:
                $error['status'] = false;
                $error["errors"] = $this->form_validation->error_array();
                echo json_encode($error);
                // $error['usertype'] = form_error('usertype');
                // echo json_encode($error);
            endif;

          else:

            $this->form_validation->set_rules('usertype', 'User Type Name', "trim|required|is_unique[system_user_type.name]");
            if ($this->form_validation->run()):
                $user_type_details = $this->Common_model->get_all("system_user_type",array("id"=>$this->input->post("usertypeid")))->result();
            
            if($user_type_details != NULL):

                $edit_user_type_details = array('name' => $this->input->post('usertype'));
        
                $this->Common_model->update("system_user_type", $edit_user_type_details,array("id"=>$user_type_details[0]->id));
                $this->Common_model->delete('system_user_permission',array('user_type_id' => $this->input->post('usertypeid')));
                
                if ($this->input->post('features')):
                    foreach ($this->input->post('features') as $result):
                        $user_permission = array(
                            "user_type_id"=> $this->input->post('usertypeid'),
                            "feature_id" =>$result
                        );
                        $this->Common_model->insert("system_user_permission",$user_permission );
                    endforeach;
                endif;
                
                $success['status'] = true; 
                echo json_encode($success);
            endif;
            else:
                $error['status'] = false;
                $error["errors"] = $this->form_validation->error_array();
                echo json_encode($error);
            endif;
          endif;
endif;



if($this->input->post("func_n") == "delete_user_role"):
    
    $usertypeid =$this->input->post('id');
    $user_type=$this->db->query("SELECT * FROM system_user WHERE  user_role = '$usertypeid'" )->result();
    // $user_type_details=$this->db->query("SELECT * FROM system_user_permission WHERE  user_type_id = '$usertypeid'" )->result();
    // $user_type = $this->Common_model->get_all("system_user",array("user_role"=>$this->input->post("id")))->result();
  
    if( $user_type == NULL):
        $this->Common_model->delete('system_user_permission',array('user_type_id' => $this->input->post('id')));
        $this->Common_model->delete('system_user_type',array('id' => $this->input->post('id')));
       
       
    // endif;
        // var_dump("fkgh");
    // $user_type_details = $this->Common_model->get_all("system_user_permission",array("user_type_id"=>$this->input->post("id")))->result();
    // var_dump($user_type_details[0]->feature_id );
        // if(($user_type_details) != NULL):
           
            //     $this->form_validation->set_rules('usertype', 'User Type Name', "trim|required");

    //     if ($this->form_validation->run()):
    //         
       
    //     if($user_type_details != NULL):
    //         $edit_user_type_details = array('name' => $this->input->post('usertype'));
    
    //         $this->Common_model->update("system_user_type", $edit_user_type_details,array("id"=>$user_type_details[0]->id));
    //         
            
    //         if ($this->input->post('features')):
    //             foreach ($this->input->post('features') as $result):
    //                 $user_permission = array(
    //                     "user_type_id"=>  $this->input->post('usertypeid'),
    //                     "feature_id" =>$result
    //                 );
    //                 $this->Common_model->insert("system_user_permission",$user_permission );
    //             endforeach;
    //         endif;
            
    //         $success['success'] = "true";
    //         echo json_encode($success);
    //     endif;
    //     else:
    //         $error['usertype'] = form_error('usertype');
    //         echo json_encode($error);
    //     endif;

    //   else:

    //     $this->form_validation->set_rules('usertype', 'User Type Name', "trim|required|is_unique[system_user_type.name]");
    //     if ($this->form_validation->run()):
    //         $user_type_details = $this->Common_model->get_all("system_user_type",array("id"=>$this->input->post("usertypeid")))->result();
        
    //     if($user_type_details != NULL):

    //         $edit_user_type_details = array('name' => $this->input->post('usertype'));
    
    //         $this->Common_model->update("system_user_type", $edit_user_type_details,array("id"=>$user_type_details[0]->id));
    //         $this->Common_model->delete('system_user_permission',array('user_type_id' => $this->input->post('usertypeid')));
            
    //         if ($this->input->post('features')):
    //             foreach ($this->input->post('features') as $result):
    //                 $user_permission = array(
    //                     "user_type_id"=> $this->input->post('usertypeid'),
    //                     "feature_id" =>$result
    //                 );
    //                 $this->Common_model->insert("system_user_permission",$user_permission );
    //             endforeach;
            // endif;
            
            $success['status'] = true; 
            echo json_encode($success);
        // endif;
        else:
            $error['status'] = false;
            echo json_encode($error);
           
      endif;
endif;
?>