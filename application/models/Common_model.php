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
	

 
    // public function record_count() {
    //     return $this->db->count_all("product_information");
    // }
    // public function fetch_harvest($limit, $start) {
    //     $this->db->limit($limit, $start);
    //     $this->db->select("product_information.*,manufacturer_information.manufacturer_name as mname");
    //     $this->db->join("manufacturer_information","manufacturer_information.id=product_information.id");
    //     $this->db->join("product_category","product_category.id=product_information.category_id");
    //     // $this->db->join("city","city.id=harvest.city_id");
    //     $query = $this->db->get("product_information");
    //     if ($query->num_rows() > 0) {
    //         foreach ($query->result() as $row) {
    //             $data[] = $row;
    //         }
    //         return $data;
    //     }
    //     return false;
    // }
   
    public function fetch_filter_typestall()
    {

         $this->db->select("manufacturer_information.id,manufacturer_information.manufacturer_name,product_information.manufacturer_id");
         $this->db->join("product_information","product_information.manufacturer_id=manufacturer_information.id AND manufacturer_information.id!=0");
         $this->db->group_by("manufacturer_information.manufacturer_name");
         $query = $this->db->get("manufacturer_information");
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

         $this->db->select("product_category.id,product_category.category_name,product_information.category_id");
         $this->db->join("product_information","product_information.category_id=product_category.id");
         $this->db->group_by("product_category.category_name");
         $query = $this->db->get("product_category");
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

    
        $pu_details=$this->db->query("SELECT MIN(manufacturer_price) AS SmallestPrice, MAX(manufacturer_price) AS Largeprice 
        FROM product_information");
        if ($pu_details->num_rows() > 0) {
            foreach ($pu_details->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
        
    }
    
    
    public function make_query($minimum_price,$maximum_price,$stall, $category,$category1, $productname){
     // var_dump($minimum_price);
     // var_dump($maximum_price);
   $this->db->limit(1);
   $this->db->order_by("id","desc");
   $accdate=$this->Common_model->get_all("cashier_open")->result();

    $query="SELECT product_information.*,product_category.id as pcid, product_category.category_name as cname,manufacturer_name FROM product_information 
    LEFT JOIN product_category on  product_category.id=product_information.category_id LEFT JOIN manufacturer_information on  manufacturer_information.id=product_information.manufacturer_id ";

 //var_dump($minimum_price);
 //var_dump($maximum_price);
 
    if(isset($minimum_price, $maximum_price)){
      $query .= "WHERE product_information.id=357 OR product_information.id=358 OR product_information.manufacturer_id!=0 AND product_information.status=1 AND product_information.manufacturer_price>=".$minimum_price." AND product_information.manufacturer_price<=".$maximum_price." ";
    }
   
    if(isset($productname)){
        if($productname!=""):
             $query .= " AND ";
             $query .= "product_information.product_name LIKE('%".$productname."%') ";
        endif; 
    } 
    
    if(isset($stall)){
        if($stall!=""):
             $query .= " AND ";
             $query .= "product_information.manufacturer_id =".$stall." ";
        endif; 
    } 
      
     $catconcat="";
     
     
    
     //var_dump($category);
     //var_dump($category1);
      
     
     if($category!=""):
       // var_dump($category);
        //var_dump($category1);
        $cat_filter = implode("','", $category);

        $catconcat.= "product_information.category_id IN('".$cat_filter."')" ;
        if($category1 !=""):
            $catconcat.= " OR "."product_information.category_id IN('".$category1."')";
        endif;
     else:
        if($category1!=""):
            $catconcat.= "product_information.category_id IN('".$category1."')";
        endif;
     endif;

     if( $catconcat!=""): 
         
     $query .=  "AND (".$catconcat.")";
     endif; 
//  var_dump($query);
    
     return $query." ORDER BY product_name ASC";
    }
    
    public function count_all($minimum_price, $maximum_price,$stall, $category,$category1, $productname)
        {
        $query = $this->make_query($minimum_price, $maximum_price,$stall, $category, $category1, $productname);
        $data = $this->db->query($query);
        return $data->num_rows();
        }

     public  function fetch_data($limit, $start, $minimum_price, $maximum_price,$stall, $category,$category1, $productname){
         $query = $this->make_query($minimum_price, $maximum_price,$stall, $category, $category1, $productname);
        $query .= ' LIMIT '.$start.', ' . $limit;
        $data = $this->db->query($query);
        $this->load->helper('text');
        //var_dump($this->db->last_query()); character_limiter(,40) 
                //   <p><a >'.$row['cname'].'</a></p> 
                   
        $output = '';
         if($data->num_rows() > 0)
         {
               $output .='<div class="row" style="display:block">';
          foreach($data->result_array() as $row):
           $output .= '<div class="col-lg-2 col-md-2 col-sm-6 col-4" style="float:left;padding-left:0px;padding-right:0px">
       <div class="single_product" style="padding:5px;margin:4px;box-shadow: 0px 0px 1px #888888" >
           <div class="product_thumb">
                   <a class="primary_img"  ><img src="'.base_url().'assets/content/product_images/'. $row['image'].'" alt="" style="object-fit: cover"></a>
                   <a class="secondary_img"  ><img src="'.base_url().'assets/content/product_images/'. $row['image'].'" alt=""></a>
                   <div class="action_links">
                       <ul>
                           <li class="add_to_cart"><a  class="add_cart" id="'.$row['id'].'" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <i class="fa fa-shopping-cart" ></i></a></li>
                         
                       </ul>
                   </div>
               </div>
           <div class="product_content grid_content" style="margin-top:7px"> 
                   <h4 class="product_name" style="min-height:60px;margin-bottom:0px;margin-top:0px"><a  >'.$row['product_name'].'</a></h4>
                   <p><a>'.$row['manufacturer_name'].'</a></p>
                   <div class="price_box" style="margin-top:2px"> 
                       <span class="current_price">'.$row['manufacturer_price'].'</span>
                   </div>
              
               </div>
           <div class="product_content list_content">
           </div>
       </div>
   </div>';
          endforeach;
         $output .= '</div>';
         }else{
          $output = '<h3 style="text-align:center">No Item Found</h3>';
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
