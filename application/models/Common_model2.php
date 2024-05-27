<?php

class Common_model extends CI_Model {

    private $id, $insert_id,$encryptKey; 

    public function __construct() {
        parent::__construct();
         $this->encryptKey = "AkdflkRUIPpeb-56"; //5f3-qww_rgb47
    }
     //return user id
     public function user_id() {
        return $this->id;
    }
    function getId() {
        return $this->id;
    }

    function getInsert_id() {
        return $this->insert_id;
    }

    //insert
    public function insert($table, $data) {
        $this->db->trans_start();
        $this->db->insert($table, $data);
        $this->insert_id = $this->db->Insert_id();
        $this->db->trans_complete();
    }

    //update
    public function update($table, $data, $where) {
        $this->db->update($table, $data, $where);
    }

    //delete
    public function delete($table, $where) {
        $this->db->where($where);
        $this->db->delete($table);
    }
       //get single system user details
       public function get_single_system_user() {
    	// $this->db->where(['prefix'=>constant('PRE_FIX')]);
        $query1 = $this->db->get_where('system_user', func_get_arg(0));
        if ($query1->num_rows() > 0):
            foreach ($query1->result() as $row):
                $this->id = $row->id;
                $this->userName = $row->user_name;
//            $this->userTypeId   = $row->user_type_id;
//            $this->image        = $row->image;
            endforeach;

            if (count(func_get_args()) == 2 && func_get_arg(1) == TRUE):
                foreach ($query1->result() as $row):
                    $this->password = $row->password;
                endforeach;
            endif;
            return TRUE;
        else:
            return FALSE;
        endif;
    }

    //get all details
//    public function get_all($table,$data = NULL){
//        return $this->db->get_where($table,$data);
//    }
//     public function get_all($table, $data = NULL, $limit = NULL, $des = null, $order = null) {
// //        (count(func_get_args()) == 2) ? $this->db->limit(func_get_arg(1), func_get_arg(2)) : NULL;
//         if ($limit != null) {
//             $this->db->limit($limit);
//         }
//         if ($des != null) {
//             $this->db->order_by('id', "desc");
//         }
//         if ($order != null) {
//             $this->db->order_by($order, "asc");
//         }
//         $result = $this->db->get_where($table, $data);
//         // $this->numrows = $this->db->affected_rows();
//         // return ($this->db->affected_rows() ? $result : FALSE);
//         return $result;
//     }

	//  //get all details
	//  public function get_alldetails($table, $data = NULL,$options = false) {
	//     $this->TABLE_NAME = $table;
	//     if(in_array($table,$this->commonTables)):
	//        if($options == false):
	// 	            $data[$table.'.prefix'] = constant('PRE_FIX');
	//        endif;
	//     endif;
	//     $result =  $this->db->get_where($this->TABLE_NAME,$data)->result();
	//     $this->numrows = $this->db->affected_rows();
    //     return ($this->db->affected_rows() ? $result : FALSE); 
    // }
	
    
    //get all details
	public function get_all($table, $data = NULL, $limit = NULL, $des = null, $order = null) {
		//        (count(func_get_args()) == 2) ? $this->db->limit(func_get_arg(1), func_get_arg(2)) : NULL;
		if ($limit != null) {
			$this->db->limit($limit);
		}
		if ($des != null) {
			$this->db->order_by('id', "desc");
		}
		if ($order != null) {
			$this->db->order_by($order, "asc");
		}
		$result = $this->db->get_where($table, $data);
		return $result;
	}
	

 
    public function record_count() {
        return $this->db->count_all("harvest");
    }
    public function fetch_harvest($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->select("harvest.*,vegitable_list.name,vegitable_list.image,farmer.fname as fname,farmer.fimage,farmer.mobile,city.city_name");
        $this->db->join("vegitable_list","vegitable_list.id=harvest.vegitable_list_id");
        $this->db->join("farmer","farmer.id=harvest.farmer_id");
        $this->db->join("city","city.id=harvest.city_id");
        $query = $this->db->get("harvest");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
   
    public function fetch_filter_typecategory()
    {

         $this->db->select("vegitable_category.id,vegitable_category.cat_name,harvest.h_id");
         $this->db->join("vegitable_list","vegitable_list.vegitable_category_id=vegitable_category.id");
         $this->db->join("harvest","harvest.vegitable_list_id=vegitable_list.id");
         $this->db->group_by("vegitable_category.cat_name");
         $query = $this->db->get("vegitable_category");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
        
    }
    public function fetch_filter_typearea()
    {

         $this->db->select("city.id,city.city_name,harvest.city_id");
       
         $this->db->join("harvest","harvest.city_id=city.id");
         $this->db->group_by("city.city_name");
         $query = $this->db->get("city");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
        
    }
    
public function fetch_filter_typeprice()
{

   
    $pu_details=$this->db->query("SELECT MIN(price) AS SmallestPrice, MAX(price) AS Largeprice 
     FROM harvest");
    if ($pu_details->num_rows() > 0) {
        foreach ($pu_details->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
    
}
    public function make_query($minimum_price, $maximum_price,$area, $category)
    {
     $query = "SELECT harvest.*,vegitable_list.name,
                vegitable_list.image,vegitable_list.id,
                farmer.fname,farmer.fimage,farmer.mobile,
                farmer.id,city.id,city.city_name,vegitable_category.id,vegitable_list.vegitable_category_id 
                FROM harvest JOIN vegitable_list ON vegitable_list.id=harvest.vegitable_list_id
                JOIN farmer ON farmer.id=harvest.farmer_id
                JOIN city ON city.id=harvest.city_id
                JOIN vegitable_category ON vegitable_category.id=vegitable_list.vegitable_category_id 
                WHERE harvest.sold_out = '1'";
   
     if(isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price))
     {
      $query .= "AND price BETWEEN '".$minimum_price."' AND '".$maximum_price."'";
     }
   
     if(isset($area))
     {
      //$area_filter = implode("','", $area);
       ($area!="")? $query .="AND city_id IN('".$area."')":NULL;
     }
   
     if(isset($category))
     {
        if($category!=null):
      $cat_filter = implode("','", $category);
      $query .= " AND vegitable_category.id IN('".$cat_filter."')";
        endif;
     }
   
     
     return $query;
    }
    public function count_all($minimum_price, $maximum_price,$area, $category)
        {
        $query = $this->make_query($minimum_price, $maximum_price,$area, $category);
        $data = $this->db->query($query);
        return $data->num_rows();
        }

     public  function fetch_data($limit, $start, $minimum_price, $maximum_price,$area, $category){
         $query = $this->make_query($minimum_price, $maximum_price,$area, $category);
        $query .= ' LIMIT '.$start.', ' . $limit;
        $data = $this->db->query($query);
        $output = '';
         if($data->num_rows() > 0)
         {
          foreach($data->result_array() as $row)
          {
           $output .= '
            <div class="col-lg-4 col-sm-6">
                <div class="product">
                    <span class="pr_flash bg_green">Sale</span>
                        <div class="product_img">
                             <a href="#"><img  src="'.base_url().'assets/contents/vegetable_images/'. $row['image'].'"  alt="" style="width:250px;height:200px"/></a>
                        </div>
                        <div class="product_info">
                        <h4><a href="#"></a>'.$row['h_title'].'</h4>
                        <h7><a href="#"></a>'.$row['name'].' </h7>
                        </br>
                        <h7><a href="#"></a>'. $row['city_name'].'</h7>
                        </br>
                        <h7><a href="#"></a>'.$row['fname'].' | <a href="#"></a>'.$row['mobile'].' </h7> 
                       
                        
                        </br>
                        <span class="price">Rs'.$row['price'].'.00 | <h7><a href="#"></a>'.$row['kilos'].'</h7></span>
                    </div>               
                                
                </div>
            </div>
           ';
          }
         }
         else
         {
          $output = '<h3>No Data Found</h3>';
         }
         return $output;
        }
       

 
// 	public function get_single_system_farmer() {
//     	$this->db->where(['prefix'=>constant('PRE_FIX')]);
//         $query1 = $this->db->get_where('farmer', func_get_arg(0));
//         if ($query1->num_rows() > 0):
//             foreach ($query1->result() as $row):
//                 $this->id = $row->id;
//                 $this->fName = $row->name;
// //            $this->userTypeId   = $row->user_type_id;
// //            $this->image        = $row->image;
//             endforeach;

//             if (count(func_get_args()) == 2 && func_get_arg(1) == TRUE):
//                 foreach ($query1->result() as $row):
//                     $this->password = $row->password;
//                 endforeach;
//             endif;
//             return TRUE;
//         else:
//             return FALSE;
//         endif;
//     }

    public function search_without($table, $name = NULL, $inarray = NULL) {
        $this->db->like('item_name', $name, 'after');
        $this->db->select()->from($table);
        $this->db->where_not_in('id', $inarray);
        $query = $this->db->get();
        return $query;
    }

   #region ------- URL Encoding -------
	/************  Url Encodeing Functions ***********/
	public function safe_b64encode($string) {

		$data = base64_encode($string);
		$data = str_replace(array('+', '/', '='), array('-', '_', ''), $data);
		return $data;
	}

	public function safe_b64decode($string) {
		$data = str_replace(array('-', '_'), array('+', '/'), $string);
		$mod4 = strlen($data) % 4;
		if ($mod4) {
			$data .= substr('====', $mod4);
		}
		return base64_decode($data);
	}

	public function url_encode($value) {

		if (!$value) {
			return false;
		}
		$text = $value;
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->encryptKey, $text, MCRYPT_MODE_ECB, $iv);
		return trim($this->safe_b64encode($crypttext));
	}

	public function url_decode($value) {

		if (!$value) {
			return false;
		}
		$crypttext = $this->safe_b64decode($value);
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->encryptKey, $crypttext, MCRYPT_MODE_ECB, $iv);
		return trim($decrypttext);
	}
	/************ End Url Encodeing Functions***********/
	#endregion ------  End URL Encoding ------


	//system users password encode
    public function password_encode() {
        if (func_get_arg(0) != null):
            $key = "4:L@795T26u44g";
            $pass = func_get_arg(0) . $key;
            $pass = md5(sha1(md5($pass)));
            $password = $this->encrypt->encode($pass);
            return array('password' => $password);
        endif;

        if (count(func_get_args()) == 2):
            $key = "4:L@795T26u44g";
            $pass = func_get_arg(1) . $key;
            $pass = md5(sha1(md5($pass)));
            return array('password' => $pass);
        endif;
    }
    //is logged in
    public function is_logged_in() {

        if ($this->uri->segment(1) != 'login' && $this->uri->segment(1) != 'logout'):
                $this->get_single_system_user(array('id' => $this->session->userdata('user_id')));
                ($this->getId() != NULL)? : redirect(base_url().'index.php/logout');
        endif;

        if ($this->uri->segment(1) == 'login'):
            if ($this->session->userdata('user_id') != NULL):
                redirect(base_url() . 'index.php');
            endif;
        endif;
    }
    //get user all permissions{
        public function get_all_permissions($data = NULL){
            // $this->db->where(['prefix'=>constant('PRE_FIX')]);
            $this->allPermissions = $this->db->get_where('system_user_permission',$data);
        }

        //check user privileges
    public function if_set_privileges($uri,$redirect = NULL){
        $user_details=$this->get_all("system_user",array('id'=>$this->session->userdata('user_id')))->result();
        if($user_details):
            $allfeatures=$this->get_all("system_user_permission",array('user_type_id'=> $user_details[0]->user_role))->result();
            if(count($allfeatures) > 0):
                foreach($allfeatures as $row):
                    $feature_ids[] = $row->feature_id;
                endforeach;
                $featuresIds = implode(',',$feature_ids);
                $all_features= $this->db->query("SELECT * FROM `system_feature`  WHERE `id` in ({$featuresIds})")->result();
               // $all_features= $this->get_all("system_feature",$featuresIds)->result();
                foreach( $all_features as $row):
                    $feature_keys[] = $row->name;
                endforeach;
                if(in_array($uri,$feature_keys)):
                    return TRUE;
                else:
                    if($redirect == TRUE):
                        header("Location: ".base_url()."index.php/dashboard");
                    endif;
                    return FALSE;
                endif;
            else:
                if($redirect == TRUE):
                        header("Location: ".base_url()."index.php/dashboard");
                    endif;
                    return FALSE;
            endif;//if permissions not null
        endif;//if type id not null
    }
    //end check user privileges
 

    
}
