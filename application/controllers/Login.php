<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login/login');
	}

	 //admin login validation
	 public function admin_login_validation() {
       
       // if ($this->input->post("login")):
		// var_dump($_POST);
            $this->form_validation->set_rules('uname', 'username', 'trim|required|callback_check_user_exists');
            $this->form_validation->set_rules('pswrd', 'Password', 'trim|required');
            // $this->form_validation->set_message('check_user_exists', 'Invalid Username or Password!');
            if ($this->form_validation->run()):
				
	            $user_details=$this->Common_model->get_all("system_user",array('user_name' => $this->input->post('uname')))->result();
	            $user_insertID =$user_details[0]->id;
				// var_dump();
if($user_insertID): 
	$user_manufaturer_details=$this->Common_model->get_all("user_manufaturer",array('user_id' => $user_insertID ))->result();
				
				if($user_manufaturer_details): 
						$data = array(
							'user_id'=>$user_insertID,
							'manufaturer_id' => $user_manufaturer_details[0]->manufaturer_id
						);
						//var_dump($data);
						$this->session->set_userdata($data); 
					else:
						$data = array(
							'user_id'=>$user_insertID
						);
						// var_dump($data);
						$this->session->set_userdata($data); 
				endif;
endif;


					
				// if ($this->input->post('mname') != NULL):
				// 	foreach ($this->input->post('mname') as $result):
				// 		$user_manufaturer = array(
				// 									"user_id"=>  $user_insertID,
				// 									"manufaturer_id" =>$result
				// 								);
				// 		$this->Common_model->insert("user_manufaturer",$user_manufaturer );
				// 	endforeach;
				// endif;
				$success['status'] = true; 
				echo json_encode($success);
			else:
				$error['status'] = false;
				$error['uname'] = form_error("uname");
				$error['pswrd'] = form_error("pswrd");
				echo json_encode($error);
        	endif;
    }

    //end admin login validation
    //check user exists
    public function check_user_exists() {
        $user_details=$this->Common_model->get_all("system_user",array('user_name' => $this->input->post('uname')))->result();
		// var_dump($user_details);
        if ($user_details):
			// echo 'callback';
		// var_dump($user_details);
            //decode and check system user password
            // $ps = $this->Common_model->password_encode($this->input->post('password'));
			// echo "udetails in";
			//var_dump($this->encrypt->encode("ABC"));
			//var_dump($this->encrypt->decode($this->encrypt->encode("ABC")));
			//  var_dump($ps['password']);
			//  var_dump(($user_details[0]->password));
			//  var_dump($this->input->post('password'));
            if ($user_details[0]->password == $this->input->post('pswrd')):
			// echo "udetails pw";
			// var_dump($user_details[0]->password);
                return TRUE;
            else:
                return FALSE;
            endif;
        else:
            return FALSE;
        endif;
    }

}
