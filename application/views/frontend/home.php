
    
<!--slider area start-->
<section class="slider_section">
    <div class="slider_area owl-carousel">
        <div class="single_slider d-flex align-items-center" data-bgimg="<?php echo base_url()?>assets/frontend/img/slider/slider1.jpg"  style="background-repeat: no-repeat;background-size: cover;background-position: center;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="slider_content"  style="color:white">
                            <h1>Prepared Fresh. </h1>
                            <h2>Serve with Love</h2>
                            <!--<p>-->
                            <!--10% certifled-organic mix of fruit and veggies. Perfect for weekly cooking and snacking!-->
                            <!--</p> -->
                            <br>
                            <a href="<?php echo base_url()?>index.php/shop">Order Now </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider d-flex align-items-center" data-bgimg="<?php echo base_url()?>assets/frontend/img/slider/slider2.jpg" style="background-repeat: no-repeat;background-size: cover;background-position: center;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="slider_content"  style="color:white">
                            <h1>Best Biriyani in </h1>
                            <h2>Sri Lankan Street Food</h2>
                            <!--<p>-->
                            <!--Widest range of farm-fresh Vegetables, Fruits & seasonal produce-->
                            <!-- </p> -->
                            <br>
                            <a href="<?php echo base_url()?>index.php/shop">Order Now </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider d-flex align-items-center" data-bgimg="<?php echo base_url()?>assets/frontend/img/slider/slider3.jpg" style="background-repeat: no-repeat;background-size: cover;background-position: center;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="slider_content"  style="color:white">
                            <h1>Don’t Think About It,</h1>
                            <h2>Eat It!</h2>
                            <!--<p>-->
                            <!--Natural organic tomatoes make your health stronger. Put your information here-->
                            <!-- </p>-->
                            <br>
                            <a href="<?php echo base_url()?>index.php/shop">Order Now </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--slider area end-->
    


   <!--product area start-->
   <div class="product_area color_two  mb-60 mt-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_header">
                    <div class="section_title">
                       <p>Recently added our store</p>
                       <h2>Trending Products</h2>
                    </div>
                </div>
            </div>
        </div> 
        <div class="product_container">  
           <div class="row">
               <div class="col-12">
                    <div class="tab-content">
                    <div class="row ">
                        <?php 
                        $this->load->helper("text");
                        
                        
                        $this->db->limit(6);
                         $this->db->select('featured_product.*,product_information.id as prodid,product_information.product_name as product_name,product_information.image as image,product_information.manufacturer_price as manufacturer_price,manufacturer_information.manufacturer_name');
                        $this->db->join("product_information","product_information.id=featured_product.product_id","LEFT");
                        $this->db->join("manufacturer_information","product_information.manufacturer_id=manufacturer_information.id","LEFT");
                        $product = $this->Common_model->get_all('featured_product',['position'=>2])->result();
                        
                        // $this->db->join("manufacturer_information","manufacturer_information.id=product_information.manufacturer_id");
                        //$this->db->where(["product_information.manufacturer_id!="=>0]);
                       // $product = $this->Common_model->get_all('product_information')->result();
                        if ($product):
                            foreach ($product as $information): 
                        ?>
                        
                        <div class="col-lg-2 col-md-2 col-sm-6 col-4" style="float:left;padding:3px;">
       <div class="single_product" style="padding:5px;margin:4px;box-shadow: 0px 0px 1px #888888" >
           <div class="product_thumb">
                   <a class="primary_img"  ><img src="<?php echo base_url() ?>assets/content/product_images/<?=$information->image ?>" alt="" style="object-fit: cover"></a>
                   <a class="secondary_img"  ><img src="<?php echo base_url() ?>assets/content/product_images/<?=$information->image ?>" alt=""></a>
                  
                   <div class="action_links">
                       <ul>
                           <li class="add_to_cart"><a  class="add_cart" id="<?=$information->prodid ?>" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <i class="fa fa-shopping-cart" ></i></a></li>
                         
                       </ul>
                   </div>
               </div>
           <div class="product_content grid_content">
                   <h4 class="product_name"  style="min-height:60px;margin-bottom:0px"><a  ><?= $information->product_name ?>  </a></h4>
                   <p><a><?= $information->manufacturer_name ?></a></p>
                   <div class="price_box" style="margin-top:2px"> 
                       <span class="current_price"><?=$information->manufacturer_price ?></span> 
                   </div>
              
               </div>
           <div class="product_content list_content">
           </div>
       </div>
   </div>
   
 
                        

                                <?php     
                                endforeach;
                            endif;

                            ?>

                        </div>
                       
                    </div>
                </div>
            </div>        
        </div>   
    </div> 
</div>
<!--product area end-->
  
<!--banner area start-->
<div class="banner_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="single_banner">
                    <div class="banner_thumb">
                        <a href="<?php echo base_url()?>index.php/shop"><img src="<?php echo base_url()?>assets/frontend/img/bg/banner1.jpg" alt=""></a> 
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="single_banner">
                    <div class="banner_thumb">
                        <a href="<?php echo base_url()?>index.php/shop"><img src="<?php echo base_url()?>assets/frontend/img/bg/banner2.jpg" alt=""></a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--banner area end-->
<!--product area start-->
<div class="product_area mb-65">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                  <p>Recently added our store </p>
                   <h2>Mostview Products</h2>
                </div>
            </div>
        </div> 
         <div class="product_container">  
           <div class="row">
               <div class="col-12">
              
               <div class="row ">

                    <?php 
                    $this->db->select('product_information.*,manufacturer_information.manufacturer_name as mname');
                    $this->db->join("manufacturer_information","manufacturer_information.id=product_information.manufacturer_id");
                    $this->db->limit(6);
                    $this->db->order_by('rand()');
                    $this->db->where(["product_information.manufacturer_id!="=>0]);
                    $product = $this->Common_model->get_all('product_information')->result();
                    if ($product):
                        // var_dump($product);
                        foreach ($product as $information): 

                                            

                    ?>
 <div class="col-lg-2 col-md-2 col-sm-6 col-4" style="float:left;padding:3px;">
       <div class="single_product" style="padding:5px;margin:4px;box-shadow: 0px 0px 1px #888888" >
           <div class="product_thumb">
                   <a class="primary_img"  ><img src="<?php echo base_url() ?>assets/content/product_images/<?=$information->image ?>" alt="" style="object-fit: cover"></a>
                   <a class="secondary_img"  ><img src="<?php echo base_url() ?>assets/content/product_images/<?=$information->image ?>" alt=""></a>
                  
                   <div class="action_links">
                       <ul>
                           <li class="add_to_cart"><a  class="add_cart" id="<?=$information->id ?>" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <i class="fa fa-shopping-cart" ></i></a></li>
                         
                       </ul>
                   </div>
               </div>
           <div class="product_content grid_content">
                   <h4 class="product_name" style="min-height:60px;margin-bottom:0px"><a  ><?=  $information->product_name  ?>  </a></h4>
                   <p><a><?=$information->mname ?></a></p> 
                    <div class="price_box" style="margin-top:2px"> 
                       <span class="current_price"><?=$information->manufacturer_price ?></span> 
                   </div>
              
               </div>
           <div class="product_content list_content">
           </div>
       </div>
   </div>
    
                    <?php
                                
                                    endforeach;
                                endif;

                                    ?>

                    </div>
                </div>
            </div>        
        </div>  
    </div> 
</div>
<!--product area end-->

    
<!--banner fullwidth area satrt-->
<div class="banner_fullwidth">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner_full_content" style="color:white">
                    <p> </p>
                    <h2><br><br> </h2>
                    <a> </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--banner fullwidth area end-->
    
<!--product banner area satrt-->
<div class="product_banner_area mb-65">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                   <p>Recently added our store </p>
                   <h2>Best Sellers</h2>
                </div>
            </div>
        </div> 
      
        <div class="product_banner_container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="banner_thumb">
                    <a href="<?php echo base_url()?>index.php/shop"><img src="<?php echo base_url()?>assets/frontend/img/bg/banner4.jpg" alt=""></a> 
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="small_product_area product_carousel  product_column2 owl-carousel">
                            <?php 
                           
                            $this->db->select('*');  
                            $this->db->order_by("id","DESC");
                            $this->db->limit(5);
                            $this->db->where(["id!="=>0]);
                            $manu = $this->Common_model->get_all("manufacturer_information")->result();
                        
                            if ($manu):
                                foreach ($manu as $information): 
                            ?>
                        <div class="product_items">
                            <?php 
                               
                                $this->db->select('*'); 
                                $this->db->limit(3);
                                 $this->db->where(['manufacturer_id'=>$information->id]);
                                $product = $this->Common_model->get_all("product_information")->result();
                           
                                if ($product):
                                    foreach ($product as $information2): 
                                       

                                ?>
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="#"><img src="<?php echo base_url()?>assets/content/product_images/<?=$information2->image ?>" alt="<?php echo $information2->image ?>" ></a>
                                        <!-- <a class="secondary_img" href="#"><img src="assets/img/product/product2.jpg" alt=""></a> -->
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name"><a href="#"><?php echo $information2->product_name ?></a></h4>
                                        <p><a href="#"><?php echo $information->manufacturer_name ?></a></p>
                                        <div class="action_links">
                                             <ul>
                                                <li class="add_to_cart"><a  class="add_cart" id="<?=$information2->id ?>" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <i class="fa fa-shopping-cart" ></i></a></li>
                         
                                               <!--<li class="quick_button"><a href="#" data-tippy="quick view" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-bs-toggle="modal" data-bs-target="#modal_box" > <span class="lnr lnr-magnifier"></span></a></li>-->
                                                 <!--<li class="wishlist"><a href="wishlist.html" data-tippy="Add to Wishlist" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"><span class="lnr lnr-heart"></span></a></li> -->
                                            <!--    <li class="compare"><a href="#" data-tippy="Add to Compare" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"><span class="lnr lnr-sync"></span></a></li>-->
                                            </ul> 
                                        </div>
                                        <div class="price_box"> 
                                            <span class="current_price"><?php echo $information2->manufacturer_price?></span>
                                            <!-- <span class="old_price">$362.00</span> -->
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                            <?php
                              
                            endforeach;
                        endif;
        
                            ?>
                          
                        </div>
                        <?php
                              
                            endforeach;
                        endif;
            
                            ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product banner area end-->
    

    
                                
    
<!--custom product area start-->
<div class="custom_product_area mb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                   <p>Recently added our store </p>
                   <h2>Featured Products</h2>
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="row">
                    <?php 
                       // select  from  where DATE()>= and DATE()<= group by product_id order by itemqty DESC LIMIT 4
                        // $this->db->select('system_user.*,system_user_type.name as rolename');
                        // $this->db->join("system_user_type","system_user_type.id=system_user.user_role","right");
                        // $this->db->select('SUM(item_qty) as itemqty,so.product_id,pi.product_name,manufacturer_price,image,mi.manufacturer_name');
                        // $condition = ["date(acc_date) <=","DATE_ADD(NOW(),INTERVAL 1DAY - INTERVAL 1 MONTH,"%Y-%m-01")"];
                        // $query= $this->Common_model->get_all("sales_order_details",$condition)->result();
                        // $this->db->order_by("itemqty","DESC");
                        // $this->db->group_by("product_id");
                        $this->db->limit(6);
                        // $this->db->join("product_information pi","pi.id=so.product_id");
                        // $this->db->join("manufacturer_information mi","mi.id=pi.manufacturer_id");
                        // $this->db->where(["date(acc_date) >=", date('Y-m-d', strtotime("-10 days"))]);
                        // $this->db->where(['date(acc_date)<='=>date('Y-m-d'),'date(acc_date)>='=>date('Y-m-d', strtotime("-30 days"))]);
                        // $this->db->where(["pi.manufacturer_id!="=>0]);
                        // $product = $this->Common_model->get_all("sales_order_details so")->result();
                        // $str = $this->db->last_query();
                    //    var_dump($str);
                    
                    
                     $this->db->select('featured_product.*,product_information.product_name,product_information.image,product_information.manufacturer_price,manufacturer_name');
                    $this->db->join("product_information","product_information.id=featured_product.product_id","LEFT");
                    $this->db->join("manufacturer_information","product_information.manufacturer_id=manufacturer_information.id","LEFT");
                    $product = $this->Common_model->get_all('featured_product',['position'=>1])->result();
                    
                        if ($product):
                            foreach ($product as $information): 
                                                

                        ?>
                        
                         <div class="col-lg-2 col-md-2 col-sm-6 col-4" style="float:left;padding:3px;">
       <div class="single_product" style="padding:5px;margin:4px;box-shadow: 0px 0px 1px #888888" >
           <div class="product_thumb">
                   <a class="primary_img"  ><img src="<?php echo base_url() ?>assets/content/product_images/<?=$information->image ?>" alt="" style="object-fit: cover"></a>
                   <a class="secondary_img"  ><img src="<?php echo base_url() ?>assets/content/product_images/<?=$information->image ?>" alt=""></a>
                  
                   <div class="action_links">
                       <ul>
                           <li class="add_to_cart"><a  class="add_cart" id="<?=$information->product_id ?>" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <i class="fa fa-shopping-cart" ></i></a></li>
                         
                       </ul>
                   </div>
               </div>
           <div class="product_content grid_content">
                   <h4 class="product_name"  style="min-height:60px;margin-bottom:0px"><a  ><?= $information->product_name ?>  </a></h4>
                   <p><a><?= $information->manufacturer_name ?></a></p>
                   <div class="price_box" style="margin-top:2px"> 
                       <span class="current_price"><?=$information->manufacturer_price ?></span> 
                   </div>
              
               </div>
           <div class="product_content list_content">
           </div>
       </div>
   </div>
                        
                        
                        
                        
                        
                        
                         
                        <?php
                                       
                                    endforeach;
                                endif;
                    
                                    ?>
                    </div>
                
            
                           
            
                        
                
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!--custom product area end-->
    


  
   
<!-- modal area start-->
<div class="modal fade" id="modal_box" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="icon-x"></i></span>
            </button>
            <div class="modal_body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="modal_tab">  
                                <div class="tab-content product-details-large">
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="<?php echo base_url()?>assets/frontend/img/product/productbig1.jpg" alt=""></a>    
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="<?php echo base_url()?>assets/frontend/img/product/productbig2.jpg" alt=""></a>    
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab3" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="<?php echo base_url()?>assets/frontend/img/product/productbig3.jpg" alt=""></a>    
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab4" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="<?php echo base_url()?>assets/frontend/img/product/productbig4.jpg" alt=""></a>    
                                        </div>
                                    </div>
                                </div>
                                <div class="modal_tab_button">    
                                    <ul class="nav product_navactive owl-carousel" role="tablist">
                                        <li >
                                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="<?php echo base_url()?>assets/frontend/img/product/product1.jpg" alt=""></a>
                                        </li>
                                        <li>
                                             <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="<?php echo base_url()?>assets/frontend/img/product/product6.jpg" alt=""></a>
                                        </li>
                                        <li>
                                           <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="<?php echo base_url()?>assets/frontend/img/product/product2.jpg" alt=""></a>
                                        </li>
                                        <li>
                                           <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img src="<?php echo base_url()?>assets/frontend/img/product/product7.jpg" alt=""></a>
                                        </li>

                                    </ul>
                                </div>    
                            </div>  
                        </div> 
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="modal_right">
                                <div class="modal_title mb-10">
                                    <h2>Donec Ac Tempus</h2> 
                                </div>
                                <div class="modal_price mb-10">
                                    <span class="new_price">$64.99</span>    
                                    <span class="old_price" >$78.99</span>    
                                </div>
                                <div class="modal_description mb-15">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel recusandae </p>    
                                </div> 
                                <div class="variants_selects">
                                    <div class="variants_size">
                                       <h2>size</h2>
                                       <select class="select_option">
                                           <option selected value="1">s</option>
                                           <option value="1">m</option>
                                           <option value="1">l</option>
                                           <option value="1">xl</option>
                                           <option value="1">xxl</option>
                                       </select>
                                    </div>
                                    <div class="variants_color">
                                       <h2>color</h2>
                                       <select class="select_option">
                                           <option selected value="1">purple</option>
                                           <option value="1">violet</option>
                                           <option value="1">black</option>
                                           <option value="1">pink</option>
                                           <option value="1">orange</option>
                                       </select>
                                    </div>
                                    <div class="modal_add_to_cart">
                                        <form action="#">
                                            <input min="1" max="100" step="2" value="1" type="number">
                                            <button type="submit">add to cart</button>
                                        </form>
                                    </div>   
                                </div>
                                <div class="modal_social">
                                    <h2>Share this product</h2>
                                    <ul>
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>    
                                </div>      
                            </div>    
                        </div>    
                    </div>     
                </div>
            </div>    
        </div>
    </div>
</div>
<!-- modal area end-->
    
 <!--news letter popup start-->
 <!-- <div class="newletter-popup">
    <div id="boxes" class="newletter-container">
        <div id="dialog" class="window">
            <div id="popup2">
                <span class="b-close"><span>close</span></span>
            </div>
            <div class="box">
                <div class="newletter-title">
                    <h2>Newsletter</h2>
                </div>
                <div class="box-content newleter-content">
                    <label class="newletter-label">Enter your email address to subscribe our notification of our new post &amp; features by email.</label>
                    <div id="frm_subscribe">
                        <form name="subscribe" id="subscribe_popup">
                                <!-- <span class="required">*</span><span>Enter you email address here...</span>-->
                                <!-- <input type="text" value="" name="subscribe_pemail" id="subscribe_pemail" placeholder="Enter you email address here...">
                                <input type="hidden" value="" name="subscribe_pname" id="subscribe_pname">
                                <div id="notification"></div>
                                <a class="theme-btn-outlined" onclick="email_subscribepopup()"><span>Subscribe</span></a>
                        </form>
                        <div class="subscribe-bottom">
                            <input type="checkbox" id="newsletter_popup_dont_show_again">
                            <label for="newsletter_popup_dont_show_again">Don't show this popup again</label>
                        </div>
                    </div> -->
                    <!-- /#frm_subscribe -->
                <!-- </div> -->
                <!-- /.box-content -->
            <!-- </div> -->
        <!-- </div> -->

    <!-- </div> -->
    <!-- /.box -->
<!-- </div>  -->
<!-- news letter popup start -->
    
<script>

$("body").on("click",".add_cart",function(e){
        e.preventDefault(); 
        $.ajax({
            type: "post",
            dataType:"JSON",
            url: "<?php echo base_url(); ?>index.php/frontend/add_to_cart",
            data: {
                product_id:$(this).attr("id"),
                func_n: "add_to_cart",
            },
            success: function (data) {
                swal({
            title: "Add to Cart",
            text: "Successfully Added!",
            icon: "success"});
            $(".item_count").html(data.count); 
            }
	
        });
			
			
    });
    </script>
    
