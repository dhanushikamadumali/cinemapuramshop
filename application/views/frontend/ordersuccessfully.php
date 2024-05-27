
    
<!-- customer login start -->
<div class="customer_login">
    <div class="container">
        
        
        <?php
                        
                        $this->db->order_by("id","DESC");
                        $this->db->limit(1);
                        $sales_order = $this->Common_model->get_all('sales_order', ['sales_order.customer_id' => $this->session->userdata('cus_id')])->result();
                        if( $sales_order): 
                            if($sales_order[0]->status==1): 
                                if(isset($_SESSION['cart'])):
                                  unset($_SESSION['cart']);
                                endif; 
                            ?> 
                                <div class="row"> 
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="account_form " style="border-radius: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);align-items: center;justify-content: center;">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="color:#15A34A;font-size:30px;text-align:center;font-weight:500">
                                                    <br>
                                                    <i class="fa fa-check-circle" aria-hidden="true" style="color:#15A34A;font-size:75px"></i>
                                                    <br><br>SUCCESS <br> 
                                            </div> 
                                            <div class="row">  
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center">
                                                        <div style="text-align: center;">Transaction Number : <?php echo $sales_order[0]->transaction_no ?> </div> 
                                                        <div style="text-align: center;">Total Amount(Rs) : <?php echo $sales_order[0]->total_amount?></div>
                                                        <p style="font-size:15px;font-weight: bold;text-align: center;">Your order has been succesfully placed</p>
                                                    </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-20 mb-40" style="text-align:center">
                                                    <a href="<?php echo base_url()?>index.php/shop"   >
                                                    <button style=" border-radius: 30px; 
                                                    box-shadow: 0 6px 8px rgba(0,0,0,.1); 
                                                    background-image: linear-gradient(to left, #8ef0b2 20%, #15A34A 90%);">Continue Shopping</button>
                                                </a> 
                                                </div> 
                                            </div>
                                        </div> 
                                    </div>
                                </div>   
                                <?php 
                                else:
                                    ?>
                                    <div class="row"> 
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="account_form " style="border-radius: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);align-items: center;justify-content: center;">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="color:#AA0122;font-size:30px;text-align:center;font-weight:500">
                                                    <br>
                                                    <i class="fa fa-check-circle" aria-hidden="true" style="color:#AA0122;font-size:75px"></i>
                                                    <br><br>FAILED <br> 
                                            </div> 
                                            <div class="row">  
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center">
                                                        <div style="text-align: center;">Transaction Number : <?php echo $sales_order[0]->transaction_no ?> </div> 
                                                        <div style="text-align: center;">Total Amount(Rs) : <?php echo $sales_order[0]->total_amount?></div>
                                                         <p style="font-size:15px;font-weight: bold;text-align: center;">Something went wrong in your payment</p>
                                                    </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-20 mb-40" style="text-align:center">
                                                    <a href="<?php echo base_url()?>index.php/shop"   >
                                                        <button style=" border-radius: 30px; 
                                                        box-shadow: 0 6px 8px rgba(0,0,0,.1); 
                                                        background-image: linear-gradient(to left, #AA0122 20%, #f08e8e 90%);">Try Again</button>
                                                    </a>  
                                                </div> 
                                            </div>
                                        </div> 
                                    </div>
                                </div> 
                                    <?php
                                endif; 
                            endif; 
                            ?> 
        
    </div>    
</div>
<!-- customer login end -->
<script type="text/javascript">

 
</script>