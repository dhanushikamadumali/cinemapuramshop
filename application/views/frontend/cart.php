<style>

form-control-plaintext {
        display: block;
        width: 100%;
        padding: 0.375rem 0;
        margin-bottom: 0;
        font-size: 1rem;
        line-height: 1.5;
        color: #212529;
        background-color: transparent;
        border: solid transparent;
        border-width: 1px 0;
        cursor: alias;
    }
    
  
</style>

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                   <h3>Cart</h3>
                    <ul>
                        <li><a href="<?php echo base_url() ?>index.php">home</a></li>
                        <li>Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>
<!--breadcrumbs area end-->
    
 <!--shopping cart area start -->
<div class="shopping_cart_area mt-70">
    <div class="container">  
            <div class="row"> 
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-20 " style="background-color:#aa0122;">
                <?php  if($this->session->userdata('table_id')): ?>
                     <div style="color:#ededed;font-size:20px;text-align:center;padding:20px;font-weight:500">Table No : <?php echo $this->session->userdata('table_id') ?> <i class="fa fa-trash removetable" style="float:right"></i></div>
                 <?php
                    else:
                    ?>
                    <div style="font-size:20px;text-align:center;padding:20px;color:white">Take Away Order<br>
                    <span style="text-align:center;font-size:15px">Scan the table QR for dine in </span>
                    </div>
                <?php
                    endif;
                ?>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="table_desc" >
                        <div class="cart_page" style="overflow-x:auto;">
                            <table class="gridtable">
                        <thead>
                            <tr>
                                <th class="product_remove">Delete</th>
                                <th class="product_thumb">Image</th>
                                <th class="product_name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product_quantity">Quantity</th>
                                <th class="product_total">Total</th>
                            </tr>
                        </thead>
                        <tbody class="cart_product">
						<?php
							//  $this->session->unset_userdata('cart');
							if(isset($_SESSION['cart'])):
							 foreach($_SESSION['cart'] as $key=>$value) :
								$p_details = $this->Common_model->get_all('product_information',['id'=>$key])->result()[0];
								if ($p_details):
									// var_dump($p_details->package_charge*$value);
                                 
							?>
							 <tr>
							   <td class="product_remove delete_btn" prod_id="<?=$p_details->id?>"> <i class="fas fa-times" style="padding-top: 6px;font-size:15px" class="text-danger "></i> </td>
								<td ><a href="#"><img src="<?php echo base_url()?>assets/content/product_images/<?=$p_details->image ?>" alt="" style="width: 90px;"></a></td>
								<td style="display: none;"> <input  type="hidden" class="form-control-plaintext a  text-center view table_pid" name="table_pid[]"  value="<?=$p_details->id?>"></td>
								<td class="product_name"><a href="#"><?=$p_details->product_name?></a></td>
								<td >
										<input  type="text" placeholder="Price" class="form-control-plaintext a  text-center view table_pr" name="table_pr[]"  value="<?=$p_details->manufacturer_price?>" readonly>
								</td>
								<td class="product_quantity">
								<!--<div class="input-group"  style="margin-left: 45px;">-->
									<div class="row" style="display:block">
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="float:left">
										<!--<div class="input-group-prepend">-->
												<button type="button" class="input-group-text minus" value="<?=$p_details->id?>" ><i class="fa fa-minus" ></i></button>
											<!--</div>-->
										</div>
                                    
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="float:left">
										<div class="custom-file" >
												<!-- <input class="view table_qty"  name='table_qty[]' value='<?=$value?>'  style="border: none;padding: 0 0px 10px 10px"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"> -->
												<input type="text" class="view  table_qty"  id='table_qty' name='table_qty[]' value='<?php echo $value?>' readonly style="border: none;width:50px;padding: 0 0px 10px 10px"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
										</div>
                                    
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="float:left">
										<!--<div class="input-group-prepend ">-->
												<button class="input-group-text pluse" type="button"  value="<?=$p_details->id?>" ><i class='fa fa-plus'></i></button>
											<!--</div>-->
										</div>
                                        
									</div>
									<!--</div>-->
								</td>
								<td class="pkchargecolumn" style="display:none" >
										<input  type="text" class="form-control-plaintext a  text-center view hiddenpackagingcharge" name="hiddenpackagingcharge[]"  value="<?=$p_details->package_charge?>" >
										<input  type="text" placeholder="Packaging" class="form-control-plaintext a  text-center view table_pkcharge" name="table_pkcharge[]"  value="<?=$p_details->package_charge * $value?>" >
								</td>
								<td class="product_total">
										<input  type="text" placeholder="Price" class="form-control-plaintext a  text-center view table_rt" name="table_rt[]"  value="<?=$p_details->manufacturer_price * $value?>" readonly>
								</td>
							</tr>
							<?php
								// endforeach;
							endif;
							endforeach;
							endif;
							?>
                        </tbody>
                    </table>   
                        </div>  
                        <style>
                        .btn-prime{
                            background: #222222;
                            border: 0;
                            color: #ffffff;
                            display: inline-block;
                            font-size: 12px;
                            font-weight: 500;
                            height: 38px;
                            line-height: 20px;
                            padding: 10px 15px;
                            text-transform: uppercase;
                            cursor: pointer;
                            -webkit-transition: 0.3s;
                            transition: 0.3s;
                            border-radius: 3px;
                        }
                        </style>
                        <?php 
                         if(isset($_SESSION['cart'])):
                             ?>
                              <div class="emptycart">
                                        <button type="button" class="btn-prime">Empty Cart</button> 
                                    </div>  
                             <?php
                             else:
                                 ?>
                                  <div  >
                                        <a href="<?php echo base_url()?>index.php/shop"><button type="button" class="btn-prime">Continue Shopping</button></a>
                                    </div>  
                                    <?php
                             endif;
                        ?>
                       
                    </div>
                 </div>
             </div>
             <!--coupon code area start-->
            <div class="coupon_area">

                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code left">
                        <h3>Cart Totals</h3>
                            <div class="coupon_inner">
                               <div class="cart_subtotal">
                                   <p>Subtotal</p>
                                   <!-- <p class="cart_amount">£215.00</p> -->
                                  
                                   <input class="view in_pu_subtol" name="in_pu_subtol" value="0" style="font-size:18px;font-weight:500;width:150px;text-align:center;border:none" readonly>    
                               </div>
                                <?php  if($this->session->userdata('table_id')): ?>
                     <div class="cart_subtotal ">
                                   <p>Service Charge</p>
                                   <input class="service_charge" name="in_service_charge"  value="2%" style="font-size:18px;font-weight:500;width:150px;text-align:center;border:none" readonly>    
                               </div>
                 <?php
                    else:
                    ?>
                     <div class="cart_subtotal ">
                                   <p>Package Charge</p>
                                   <input class="view in_pu_package_charge" name="in_pu_package_charge" value="0" style="font-size:18px;font-weight:500;width:150px;text-align:center;border:none" readonly>    
                               </div>
                <?php
                    endif;
                ?>
                              
                               <div class="cart_subtotal">
                                   <p>Total</p>
                                   <input class="view in_pu_gtot" name="in_pu_gtot" value="0" style="font-size:18px;font-weight:500;width:150px;text-align:center;border:none" readonly>    
                               </div>
                                <?php if($this->session->userdata('cus_id') !=NULL ):?>
                                 

                                    <?php
                                    endif;
                                    ?>
                              
                            </div>  
                        </div>
                    </div>
                    
                    
                    
                    <?php if ($this->session->userdata('cus_id') ==NULL ):?>
                    <div class="col-lg-6 col-md-6"> 
                        <?= form_open_multipart("", array("id" => "loginForm")); ?>
                            <div class="row">
                               <!--login area start-->
                                <!-- <div class="col-lg-6 col-md-6"> -->
                                    <div class="account_form" style="border: 1px solid #ededed;padding: 23px 20px 29px;border-radius: 5px;">
                                        <h2 style="font-weight: bold;">login</h2>
                   
                                            <p>   
                                                <label>Username or email <span>*</span></label>
                                                <input type="text" name="uname" value="" class="uname">
                                                <span class="err err_uname" style="color:red;font-size:10px" ></span>
                                             </p>
                                             <p>   
                                                <label>Passwords <span>*</span></label>
                                                <input type="password" name="pswrd" value="" class="pswrd">
                                                <span class="err err_password" style="color:red;font-size:10px" ></span>
                                             </p>   
                                            <div class="login_submit">
                          
                                                <button type="submit" class="login_btn">login</button>
                        
                                            </div>

                        
                                     </div>    
                                <!-- </div> -->
                                <!--login area start-->
                            </div>
                        <?= form_close() ?> 
                    </div>
                    <?php
                    else:
                        ?>
                        <div class="col-lg-6 col-md-6">
                        <div class="coupon_code left">
                        <h3>Check out to</h3>
                            <div class="coupon_inner"> 
                                
                                <?php if($this->session->userdata('cus_id') !=NULL ):?>
                                
                                 
                                 <form id="payment_submit_form" method="POST" action="https://ipay.lk/ipg/checkout">
                                        <input type="hidden" name="merchantWebToken" value="eyJhbGciOiJIUzUxMiJ9.eyJtaWQiOiIwMDA1NDEwNiJ9.f_H_MnULkWRrOwsqnWczDswaZb4wCN7HPEnxoe5LlBDFzhKMMjYapBMV3P-su9Dk-RT54vT5-HpuV_aYC1hXtg"> <!-- Replace your web token -->
                                        <input type="hidden" name="orderId" class="order_id" value="">
                                        <input type="hidden" name="orderDescription" class="orderDescription" value=""> <!-- Optional -->
                                        <input type="hidden" name="returnUrl" value="https://cinemapuram.lk/index.php/frontend/order_completion">
                                        <input type="hidden" name="cancelUrl" value="https://cinemapuram.lk/index.php/cart">
                                        <input type="hidden" name="subMerchantReference" value=""> <!-- Optional -->
                                        
                                        <?php
                                         $customer = $this->Common_model->get_all("customer_information",["id"=>$this->session->userdata('cus_id')])->result();
                                        ?>
                                        <table>
                                         
                                        <tr>
                                        <th  style="width:50%">Customer Name </th> 
                                        <td  style="width:50%"><?= $customer[0]->customer_name?><input type="hidden" name="totalAmount" class="in_pu_gtot"><input type="hidden" name="customerName" value="<?= $customer[0]->customer_name?>"></td>
                                        </tr>
                                        <tr>
                                        <th >Customer Mobile</th> 
                                        <td><?= $customer[0]->mobile?><input type="hidden" name="customerPhone" value="<?= $customer[0]->mobile?>"></td>
                                        </tr>
                                        <tr>
                                        <th >Customer Email</th> 
                                        <td><?= $customer[0]->email?><input type="hidden" name="customerEmail" value="<?= $customer[0]->email?>"></td>
                                        </tr>
                                        </table>
                                        
                                         <!--<button type="submit" style="margin-top:15px">Proceed to Checkout</button>-->
                                        </form>
                                    
                                    <?php
                                       $query = $this->db->query("SELECT * FROM cashier_open ORDER BY id DESC LIMIT 1")->result(); 
                                         if($query[0]->close_date == 0 || $query[0]->close_date == null): 
                                             ?>
                                                <div class="checkout_btn">
                                                    <button type="submit">Proceed to Checkout</a>
                                                </div>
                                             <?php
                                         else:
                                            ?>
                                            <div style="color:white;background:#aa0122;padding:15px;text-align:center"><h3>Sorry</H3>We are open at 4.30pm</div>
                                            <?php
                                         endif;
                                        
                                        
                                    ?>
                                    
                                   
                    
                    
                             
                               

                                    <?php
                                    endif;
                                    ?>
                              
                            </div>  
                        </div>
                    </div>
                        <?php
                    endif;
                    ?>
                </div> 
                        <!-- </div>    -->
                    </div>
                    
           
               
            </div>
        <!--coupon code area end-->
           

         
</div>
 <!--shopping cart area end -->
 <script type="text/javascript">
    $(document).ready(function(){
       
        get_total();

    });
   
      $("body").on('click', '.pluse', function (e) {
        e.preventDefault();
        var pid = $(this).parent().parent().find('.pluse').val(); 
        var qty = $(this).parent().parent().parent().find('.table_qty').val();
        $(this).parent().parent().parent().find('.table_qty').val(parseInt(qty) + 1);
        var pprice = $(this).closest('tr').find('.table_pr').val(); 
        var hpkcharge = $(this).closest('tr').find('.hiddenpackagingcharge').val(); 
       
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>index.php/frontend/add_to_cart",
            data: {
                "product_id":pid 
                }, 
            success: function () { 
       
            }
        });
        var subtotal = 0;
        subtotal = (parseInt(qty) + 1) * parseFloat(pprice);
        $(this).closest('tr').find('.table_pkcharge').val(((parseInt(qty) + 1) *hpkcharge).toFixed(2));
        $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
        get_total();
    });
        
    $("body").on('click', '.minus', function (e) {
        e.preventDefault();
        var pid = $(this).parent().parent().find('.minus').val(); 
        var qty = $(this).parent().parent().parent().find('.table_qty').val();  
         
        if (qty >= 2) {
            $(this).parent().parent().parent().find('.table_qty').val(parseInt(qty) - 1);
       
        var hpkcharge = $(this).closest('tr').find('.hiddenpackagingcharge').val();  
            $.ajax({
                type: "post",
                url: "<?php echo base_url(); ?>index.php/frontend/remove_to_cart",
                data: {
                    "product_id":pid 
                    }, 
                success: function () { 
       
                }
            });
         
           
            var pprice = $(this).closest('tr').find('.table_pr').val();
            var subtotal = 0;  
            subtotal = (parseInt(qty) - 1) * parseFloat(pprice); 
            $(this).closest('tr').find('.table_pkcharge').val(((parseInt(qty) - 1) *hpkcharge).toFixed(2));
            $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
        }
        get_total();
    });

 
    $("body").on("click",".delete_btn",function(e){
        var xbtn=$(this);
        e.preventDefault();
           swal({            
               title: "Remove this item from the Order?",
               text: "Are you sure you want to remove this item from the order now !",
               icon: "warning",
               buttons: true,
               dangerMode: true,
                          
               })
               .then((willDelete) => {
               if (willDelete) { 
                    xbtn.parent().remove();
                   $.ajax({
                       type: "post",
                       dataType:"JSON",
                       url: "<?php echo base_url(); ?>index.php/frontend/remove_cart_item",
                       data: { 
                           product_id: $(this).attr("prod_id") 
                       },
                       success: function (data) {
                           get_total(); 
                            $(".item_count").html(data.count);
                       }
                   });
               }            
           }); 
       });


    $("body").on("click",".removetable",function(e){
         
        e.preventDefault();
           swal({            
               title: "Remove Table?",
               text: "Are you sure you want to remove the table it will automatically get as delivery order !",
               icon: "warning",
               buttons: true,
               dangerMode: true,
                          
               })
               .then((willDelete) => {
               if (willDelete) { 
                     
                   $.ajax({
                       type: "post",
                       url: "<?php echo base_url(); ?>index.php/frontend/remove_table",
                       data: { 
                           product_id: "" 
                       },
                       success: function (data) {
                           location.reload();
                       }
                   });
               }            
           }); 
       });
       
       
    $("body").on("click",".emptycart",function(e){
         
        e.preventDefault();
           swal({            
               title: "Empty Cart?",
               text: "Are you sure you want to Empty Cart !",
               icon: "warning",
               buttons: true,
               dangerMode: true,
                          
               })
               .then((willDelete) => {
               if (willDelete) { 
                     
                   $.ajax({
                       type: "post",
                       url: "<?php echo base_url(); ?>index.php/frontend/empty_cart",
                       data: { 
                           product_id: "" 
                       },
                       success: function (data) {
                          // get_total(); 
                           window.location.href="<?php echo base_url()?>index.php/shop";
                       }
                   });
               }            
           }); 
       });
    //===================================== Customer Functions


    function get_total() {
                var tlinetotal = 0.0;
                // var tlinedis = 0.0;
                var tlinepkcharges = 0.0;
                var ftotal = 0.0; 
                //  var CPdiscount=($('.in_pu_totcpdsc').val()!="")?$('.in_pu_totcpdsc').val():0.00;
                // var serviceCharge=($('.in_pu_servicecharge').val()!="")?$('.in_pu_servicecharge').val():0.00;
            
             
                 $(".cart_product tr").each(function () { 
                    var price = parseFloat($(this).find('.table_rt').val());
                    var pkcharges = parseFloat($(this).find('.table_pkcharge').val());
                    // var discount = parseFloat(($(this).find('.table_dscnt').val()) ? $(this).find('.table_dscnt').val() : 0);
                    tlinetotal += price;
                    // tlinedis += discount;
                    tlinepkcharges+=pkcharges;
                    // alert(tlinepkcharges);
                })
                
              <?php  if($this->session->userdata('table_id')): ?>
                      $('.in_pu_subtol').val(tlinetotal.toFixed(2));
                $('.in_pu_package_charge').val(0);
                ftotal = ((parseFloat(tlinetotal)*2)/100); 
                $('.service_charge').val(parseFloat(ftotal).toFixed(2)); 
                $('.in_pu_gtot').val((parseFloat(tlinetotal)+parseFloat(ftotal)).toFixed(2)); 
                 <?php
                    else:
                    ?>
                      $('.in_pu_subtol').val(tlinetotal.toFixed(2));
                    $('.in_pu_package_charge').val(tlinepkcharges.toFixed(2));
                    ftotal = (parseFloat(tlinetotal))+(parseFloat(tlinepkcharges)); 
                    $('.in_pu_gtot').val(parseFloat(ftotal).toFixed(2)); 
                <?php
                    endif;
                ?>
                
                
                
               
            
 
            }
        
            // function get_balance() {
            //     var reamount = parseFloat($('.in_pu_recive').val());
            //     var total = parseFloat($('.in_pu_gtot').val());
            //     //var maindiscount = parseFloat($('.in_pu_totdsc').val());
            //     if (reamount >= total) {
            //         var balance = reamount-total;
            //         $('.in_pu_balance').val(balance.toFixed(2));
            //     } else {
            //         $('.in_pu_balance').val("");
            //     }
            // }


    //===================================== Order Placement

  

            $(".checkout_btn").click(function (e) {
                // alert()
                var iscart=false;
                    $(".cart_product").each(function(){
                        iscart=true;
                    })
                    if(iscart){

                    e.preventDefault();
                    $form = $("#inForm");
                    add_form($form);
                    function add_form($form) {
                        var formdata = new FormData($form[0]);
                        formdata.append("func_n", "ad_inv");
                        $.ajax({
                            type: "post",
                            dataType: "JSON",
                            url: "<?php echo base_url(); ?>index.php/frontend/add_invoice",
                            data: formdata,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function (data) {
                                $(".err").html("");
                                if (data.status == false) {
                                    $.each(data.errors, function (key, val) {
                                        $(".err_" + key.replace('[]', '')).html(val);
                                    });
                                } else { 
                                    var orderidstatus=false;
                                    while($(".order_id").val()==""){ 
                                        $(".order_id").val(data.saleid); 
                                        $(".orderDescription").val(data.transID); 
                                        orderidstatus=true; 
                                        if(orderidstatus){
                                            // $('#payment_submit_form').append("<input type='hidden' name='orderId' value='"+data.saleid+"'/>");
                                           $("#payment_submit_form").submit(); 
                                        }
                                    }  
                                }
                            }
                        });
                    }
                }
                }); //End save btn click


    //===================================== Order Placement

    ///=============================login customer
    $(".login_btn").click(function (e) {
        e.preventDefault();
        $form = $("#loginForm"); 
        add_form($form);
        function add_form($form) {
            var cntrl = "Frontend";
            var mthd = "customer_login";
            var formdata = new FormData($form[0]);
            console.log(formdata);
            $.ajax({
                type: "post",
                dataType: "JSON",
                url: "<?php echo base_url(); ?>index.php/" + cntrl + "/" + mthd,
                data: formdata,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $(".err").html("");
                    if(data.status==false){
                        $(".err_uname").html(data.uname);
                        $(".err_password").html(data.pswrd);
                        notification_message("error","Error Occurred ! Please Check the fields.");
                            $.each(data.errors, function(key,val) {
                                $(".err_"+key).html(val);
                            });
                    }else{
                        window.location.reload();
                        // notification_message("info", "User Login Successfully!!");
                        // setTimeout(function(){ window.location.href="<?php echo base_url()?>index.php";  });
                    }
                
                }
            });
        }


    }); //End save btn click
   
      

    ///===============================end customer
        
   
 </script>
