<!doctype html>
<html lang="en" dir="ltr">


<!-- Mirrored from demo.jsnorm.com/html/strikingdash/strikingdash/ltr/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Jul 2022 02:54:30 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StrikingDash</title>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

    <!-- inject:css-->

    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/plugin.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/style.css">

    <!-- endinject -->

    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/img/favicon.png">

    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/notifications/css/lobibox.min.css"/>
</head>
<style>
    .product_card{
      
        background-color: #fff;
        border: 2px solid #e0e0d1;
        border-radius: 15px;
        cursor: pointer;
        margin-bottom:13px;
    }
    .product_name{
        /* padding: 10px; */
        font-weight: bold;
        color: #132645;
        font-size:15px ;
        line-height: 15px;
        margin-left: 10px;
        margin-top: 6px;
        height: 35px;
    }
    
    .product_price{
        margin-left: 10px;
       
       color: #F07613;
       font-weight: 500;
       font-size: 12px;
       padding-bottom: 10px;
    }
    .product_strenth{
        margin-left: 10px;
        color: #999999;
        font-size: 12px;
    }
    
    .view:focus {
        outline-style: none;
    }

    #order_butt{
        background-color:#F07613;
        width:100%;
        border-radius: 10px;
        height:50px;
        margin-top: 20px;
        outline: none;
        color: #fff;
        cursor: pointer;
        font-size:medium;
        /* margin-left:26px */
    }
    .in_pu_totdsc{
        color:#132645;
        font-weight: bold;
        font-size:18px;
        margin-left:200px;
        cursor: none;
    }
    .in_pu_gtot{
        color:#132645;
        font-weight: bold;
        font-size:18px;
        /* margin-top:10px; */
        margin-left:160px;
        cursor: none;

    }
    .in_pu_recive{
        color:#132645;
        /* font-weight: bold; */ 
        font-size:18px;
       
        margin-left:130px;
    }
    .in_pu_subtol{
        color:#132645;
        font-weight: bold;
        font-size:18px;
        margin-left:200px;
        cursor: none;
    }
    .in_pu_recive{
        color:#132645;
        font-weight: bold;
        font-size:18px;
        /* margin-left:200px; */
        
    }
    .in_pu_balance{
        color:#132645;
        font-weight: bold;
        font-size:18px;
        margin-left:200px;
        cursor: none;
    }
    .sublable{
        color:#132645;
        font-weight: bold;
        font-size:18px
    }
    .totallable{
        color:#132645;
        font-weight: bold;
        font-size:25px;
        margin-top:12px
    }
    /* width */
    ::-webkit-scrollbar {
    width: 7px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
    background: #f1f1f1; 
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
    /* background: #888;  */
    /* border: 3px solid orange; */
    border-radius: 20px;
    background-color: #132645;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
    background: #555; 
    }
  
    .view:focus {
        outline-style: none;
    }

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

<body class="layout-light side-menu overlayScroll">
    <div class="mobile-search">
        <form class="search-form">
            <span data-feather="search"></span>
            <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
        </form>
    </div>

    <div class="mobile-author-actions"></div>
    <?php $this->load->view('template/header_menu'); ?>
    <div class="contents" style=padding-left:15px !important">

<div class="container-fluid">
    <div class="social-dash-wrap">
   
        <div class="row" >
           
        </div>
        <table style="display:none" >
        <tbody>
        <tr class="fTr"  style="height:20px">
            <td >
                <input type="hidden" placeholder="" class="form-control in_id " name="table_id[]"  value="00">
                <input type="hidden" placeholder="" class="form-control table_pid " name="table_pid[]"  value="">
                <input class="form-control-plaintext a  text-left view table_prdct" name="table_prdct[]" id="table_prdct"  value="" style="font-size:small;width:50px" readonly="readonly"></div>
            </td>
            <td>
                <div class="input-group" style="width:120px;">
                    <div class="input-group-prepend qtyparent ">
                        <button class="input-group-text pluse" type="button"  value="" style="border-radius: 15px;" ><i class='fa fa-plus'></i></button>
                    </div>
                    <div class='custom-file'>
                        <input  class="form-control-plaintext a text-center view table_qty"  id='table_qty' name='table_qty[]' value='1'   oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text minus" value=""  style="border-radius: 15px;"><i class="fa fa-minus" ></i></button>
                    </div>
                </div>
            </td>
            <td>
                <input  type="text" placeholder="Price" class="form-control-plaintext a  text-center view table_pr" name="table_pr[]"  value="">
                <span class="err err_table_pr required" style="color:red;position:absolute;font-size:10px"></span>
            </td>
            <td>
                <input  type="text" placeholder="Price" class="form-control-plaintext a  text-center view table_rt" name="table_rt[]"  value="" readonly>
                <span class="err err_table_rt required" style="color:red;position:absolute;font-size:10px"></span>
            </td>
            <td >
                <div style="padding-top: 0px;">
                    <a href='javascript:void(0)' style="padding-top: 6px;font-size:20px"  type="button" class="text-danger delete_butt"><i class="fas fa-times"></i></a>
                    <input  type="hidden" class="form-control table_dscnt" name="table_dscnt[]"  value="">
                    <input  type="hidden" class="form-control table_btchid" name="table_btchid[]"  value="">
                </div>
            </td>
          
            
        </tr>
        </tbody>
        </table>
        <div class="row">
        <div class="col-lg-12">
        <div class="card card-Vertical card-default card-md mb-4 mt-4">
        <?= form_open_multipart("", array("id" => "inForm")); ?>
            <?php
            $order_id = $this->input->get('id');
            if ($order_id):
                $this->db->select('sales_order.*');
                $order=$this->Common_model->get_all("sales_order",array('id' =>$order_id))->result();
                if ($order !=NULL):     
            ?>
        <div class="row">
     
        <!-- <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="datetime" style="margin-top:10px;color:#132645;font-size:larger"></div> -->
        <input type="hidden"  class="form-control order_id " name="order_id"  value="<?= $order_id ?>">
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="margin-top: 10px;margin-bottom:10px;">
            <select class="form-control in_pu_branch" name="in_pu_branch">
                <option  value="">Select Branch...</option>
                <?php
                    $this->db->select("id,branch_name");
                    $tableResult = $this->Common_model->get_all("branch")->result();
                    if ($tableResult):
                        foreach ($tableResult as $tableRes):
                            $selected = $order[0]->branch_id == $tableRes->id ? "selected" : null; ?>
                            <option  <?= $selected ?> value="<?= $tableRes->id ?>" > <?= $tableRes->branch_name ?></option>
                            <?php
                        endforeach;
                    endif;
                ?>
            </select>
            <span class="err err_in_pu_branch required" style="color:red;position:absolute;font-size:10px"></span>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="margin-top: 10px;margin-bottom:10px;">
            <select class="form-control in_pu_cus" name="in_pu_cus">
                <option  value="">Select Customer...</option>
                <?php
                    $this->db->select("id,customer_name");
                    $tableResult = $this->Common_model->get_all("customer_information")->result();
                    if ($tableResult):
                        foreach ($tableResult as $tableRes):
                           
                             $selected = $order[0]->customer_id == $tableRes->id ? "selected" : null; ?>
                            <option  <?= $selected ?> value="<?= $tableRes->id ?>" > <?= $tableRes->customer_name ?></option>
                            <?php
                        endforeach;
                    endif;
                ?>
            </select>
            <span class="err err_in_pu_cus required" style="color:red;position:absolute;font-size:10px"></span>
        </div>
   
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="margin-top: 10px;margin-bottom:10px;">
            <select  class="form-control in_pu_pytp " name="in_pu_pytp" >
                <option value="">Please Select Payment Type</option>
                <option value="cash" > Cash</option>
                <option value="bank" > Bank</option>
                <option value="credit" > Credit</option>
            </select>
            <span class="err err_in_pu_pytp required" style="color:red;position:absolute;font-size:10px"></span>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="margin-top: 10px;margin-bottom:10px;">
            <select class="form-control in_pu_bnk" name="in_pu_bnk" disabled>
                <option  value="">Select Bank...</option>
                <?php
                    $this->db->select("id,account_no");
                    $tableResult = $this->Common_model->get_all("bank_company_accounts")->result();
                    if ($tableResult):
                        foreach ($tableResult as $tableRes):
                            ?>
                            <option <?= $tableRes->id == '1' ? 'selected' : null ?> value="<?= $tableRes->id ?>" > <?= $tableRes->account_no ?></option>
                            <?php
                        endforeach;
                    endif;
                ?>
            </select>
            <span class="err err_in_pu_bnk required" style="color:red;position:absolute;font-size:10px"></span>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="margin-top: 10px;margin-bottom:10px;">
        <div  style="margin-left:30px;margin-bottom:8px">
                        <div class="form-check-inline">
                            <label class="radio-inline">
                            <input type="radio" name="otype" value="delivery" checked>        Delivery
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="radio-inline">
                            <input type="radio" name="otype" value="drive through" >          Drive through
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="radio-inline">
                            <input type="radio" name="otype" value="take away" >              Take away
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="radio-inline">
                            <input type="radio" name="otype" value="dine-in" >                Dine-in
                            </label>
                        </div>
                       
                    </div>
            
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 10px;margin-bottom:10px;"">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" class="form-control searchProduct" placeholder="Search Product" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin-top:10px;display:none" >
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1" ><i class="fa fa-barcode" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="form-control barcodesearch table_btchid" name="table_btchid" placeholder="Barcode Search" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
      
        </div>
        <div class="row" >
      
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="postable">
                    <div  style="clear: both;overflow-y: scroll;height: 300px;">
                        <table class="table table-responsive-*">
                            <tbody class="aTbody cart_product" >
                                    <?php
                                     $this->db->select('sales_order_details.*,product_information.product_name as pname');
                                     $this->db->join("product_information","product_information.id=sales_order_details.product_id");
                                    $sales_order_details_res  = $this->Common_model->get_all("sales_order_details",array("order_id"=>$order_id))->result();
                                    if($sales_order_details_res):
                                        $dscnts = 0;
                                        foreach($sales_order_details_res as $dtailsArray):
                                            $sales_order_details[0] = $dtailsArray;
                                        ?>
                                    <tr class="fTr">
                                    <td >
                                        <input type="hidden" placeholder="" class="form-control table_pid " name="table_pid[]"  value="<?= $sales_order_details[0]->product_id ?>">
                                    </td>
                                    <td >
                                       
                                        <input class="form-control-plaintext a  text-left view table_prdct" name="table_prdct[]" id="table_prdct"  value="<?= $sales_order_details[0]->pname ?>" style="font-size:small;width:100px" readonly="readonly"></div>
                                    </td>
                                    <td>
                                        <div class="input-group" style="width:130px;">
                                            <div class="input-group-prepend qtyparent ">
                                                <button class="input-group-text pluse" type="button"  value="" style="border-radius: 20px;" ><i class='fa fa-plus'></i></button>
                                            </div>
                                            <div class='custom-file'>
                                                <input  class="form-control-plaintext a text-center view table_qty"  id='table_qty' name='table_qty[]' value='<?= $sales_order_details[0]->item_qty?>'   oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                            </div>
                                            <div class="input-group-prepend">
                                                <button type="button" class="input-group-text minus" value=""  style="border-radius: 20px;"><i class="fa fa-minus"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input  type="text" placeholder="Price" class="form-control-plaintext a  text-center view table_pr" name="table_pr[]"  value="<?= $sales_order_details[0]->per_price?>">
                                        <span class="errors error_table_pr" style="color:red;position:absolute;"></span>
                                    </td>
                                    <td>
                                        <input  type="text" placeholder="Price" class="form-control-plaintext a  text-center view table_rt" name="table_rt[]"  value="<?= $sales_order_details[0]->total_price?>">
                                        <span class="errors error_table_rt" style="color:red;position:absolute;"></span>
                                    </td>
                                    <td >
                                        <div style="padding-top: 0px;">
                                        <a href='javascript:void(0)' style="padding-top: 6px;font-size:20px"  type="button" class="text-danger delete_butt"><i class="fas fa-times"></i></a>
                                        
                                        </div>
                                    </td>
                                    <td>
                                        <input  type="hidden" class="form-control table_dscnt" name="table_dscnt[]"  value="<?= $sales_order_details[0]->discount?>">
                                    </td>
                                    <td>
                                        <input  type="hidden" class="form-control table_btchid" name="table_btchid[]"  value="<?= $sales_order_details[0]->batch_id?>">
                                    </td>
                                    
                                </tr>
                                <?php
                              
                                endforeach;
                                endif; ?>
                                </tbody>
                        </table>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="card" style="box-shadow: 0 6px 8px rgba(0,0,0,.1);width:500px;height:310px ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <label class="sublable">SubTotal</label> 
                            </div> 
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <input class="form-control-plaintext a text-center view subtoalclass in_pu_subtol" name="in_pu_subtol" value=""></input>   
                            </div> 
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <label class="sublable" >Discount</label> 
                            </div> 
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <input class="form-control-plaintext a text-center view dicountclass in_pu_totdsc" name="in_pu_totdsc" value="<?=$order[0]->total_discount?>"></input>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <label class="totallable" >Total</label> 
                            </div> 
                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                <input class="form-control-plaintext a  text-center view totallable in_pu_gtot" name="in_pu_gtot" value="<?=$order[0]->total_amount?>"></input>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <label class="sublable">Paid Amount</label> 
                            </div> 
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <input class="form-control-plaintext a  text-center view dicountclass in_pu_gtot" name="in_pu_gtot" value="<?=$order[0]->total_amount?>"></input>   
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                <label class="sublable">Customer Paid</label> 
                            </div> 
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <input class="form-control in_pu_recive" name="in_pu_recive" value="<?=$order[0]->customer_paid?>"></input>   
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <label class="sublable" >Balance</label> 
                            </div> 
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <input class="form-control-plaintext a  text-center view dicountclass in_pu_balance" name="in_pu_balance" value=""></input>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button type="button"  class="btn save_btn" id="order_butt" >Order</button>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button type="button"  class="btn" id="order_butt" data-toggle="modal" data-target="#deleteThis"><i class="fa fa-calculator" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
        </div>
                
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <div  style="height:40vh; overflow-y:scroll" >
                        <!-- <div class="row"> -->
                            <?php
                            $this->db->select('*');
                            $manufature_information = $this->Common_model->get_all('`manufacturer_information', ['status' => 1])->result();
                            if ( $manufature_information):
                                foreach ( $manufature_information as $information):
                                
                            ?>
                            <div class="manuDiv" id="<?= $information->id; ?>" >
                                <div class="product_card" >
                                    <div class="product_name"><?= $information->manufacturer_name	 ?></div>
                                </div>
                            </div>
                            <?php
                            endforeach;
                            endif;
                            ?>
                        <!-- </div> -->
                        </div>
                    </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                
               
                <div class="productHolder">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height:92vh; overflow-y:scroll" >
                    <div class="row">
                        <?php
                       
                        $this->db->select('*');
                        
                        $product_information = $this->Common_model->get_all('product_information', ['status' => 1])->result();
                        if ($product_information):
                          
                            foreach ($product_information as $information):
                    
                        ?>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 productDiv" id="<?= $information->id; ?>" >
                            <div class="product_card" >
                                <div class="product_name"><?= $information->product_name ?></div>
                               <div class="row">
                                   <div class="col-md-6">
                                   <div class="product_strenth"><?= $information->strength ?><?= $information->measure ?></div>
                                  
                                    <div class="product_price"><?= $information->manufacturer_price ?></div>
                                  
                                   </div>
                                   <div class="col-md-6 ">
                                   <div class="product_image">
                                        <img src="<?php echo base_url()?>assets/content/product_images/<?= $information->image ?>" alt="<?= $information->product_name . " - " . $information->strength ?>" style="width:90%;  cursor: pointer;margin-top:0px;border-radius: 15px">
                                    </div>
                                   </div>
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
                <!-- <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="card" style="box-shadow: 0 6px 8px rgba(0,0,0,.1);width:500px;height:310px ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <label class="sublable">SubTotal</label> 
                            </div> 
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <input class="form-control-plaintext a text-center view subtoalclass in_pu_subtol" name="in_pu_subtol" value=""></input>   
                            </div> 
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <label class="sublable" >Discount</label> 
                            </div> 
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <input class="form-control-plaintext a text-center view dicountclass in_pu_totdsc" name="in_pu_totdsc" value="<?=$order[0]->total_discount?>"></input>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <label class="totallable" >Total</label> 
                            </div> 
                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                <input class="form-control-plaintext a  text-center view totallable in_pu_gtot" name="in_pu_gtot" value="<?=$order[0]->total_amount?>"></input>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <label class="sublable">Paid Amount</label> 
                            </div> 
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <input class="form-control-plaintext a  text-center view dicountclass in_pu_gtot" name="in_pu_gtot" value="<?=$order[0]->total_amount?>"></input>   
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                <label class="sublable">Customer Paid</label> 
                            </div> 
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <input class="form-control in_pu_recive" name="in_pu_recive" value="<?=$order[0]->customer_paid?>"></input>   
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <label class="sublable" >Balance</label> 
                            </div> 
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <input class="form-control-plaintext a  text-center view dicountclass in_pu_balance" name="in_pu_balance" value=""></input>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
             -->
                <!-- <div class="row">
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                        <button type="button"  class="btn save_btn" id="order_butt" >Order</button>
                    </div>
                </div> -->
                <!-- <div class="row">
                    
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                        <button type="button"  class="btn" id="order_butt" ><i class="fa fa-calculator" aria-hidden="true"></i></button>
                    </div>
                </div> -->
        </div>
            </div>
        </div>
        <?php
                endif;
        endif;
        ?>
        <?= form_close() ?>
        </div>
        <!-- ends: .card -->
        </div>
        </div>
    </div>
</div>
</div>

<footer class="footer-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-copyright">
                            <p>2020 @<a href="#">Aazztech</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-menu text-right">
                            <ul>
                                <li>
                                    <a href="#">About</a>
                                </li>
                                <li>
                                    <a href="#">Team</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <!-- ends: .Footer Menu -->
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <div id="overlayer">
        <span class="loader-overlay">
            <div class="atbd-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </span>
    </div>
    <div class="overlay-dark-sidebar"></div>
    <div class="customizer-overlay"></div>
     <!-- Modal -->
 <div class="modal fade" id="modalpopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <table class=" table table-responsive-*">
        <thead>
            <tr>
                <th>Product name</th> 
                <th>Price</th> 
                <th>Action</th> 
            </tr>
        </thead>
            <tbody class="modalbodytable">
            </tbody>
        </table>                  
        </div>
        </div>
    </div>
    </div>
    </body>  
   

    <!-- <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDduF2tLXicDEPDMAtC6-NLOekX0A5vlnY"></script> -->
    <!-- inject:js-->
    <script src="<?php echo base_url()?>assets/js/plugins.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.min.js"></script>
    <!-- endinject-->
    <!--notification js -->
    <script src="<?= base_url() ?>assets/plugins/notifications/js/lobibox.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/notifications/js/notifications.min.js"></script>
      <!-- alert -->
    <script type="text/javascript" src="<?=base_url()?>assets/js/sweetalert.js" rel="stylesheet"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            get_total();
            set_amounts($(this));

            
        });
        $("body").on('click', '.productDiv', function () {
            get_product($(this));
        });
    
        function  get_product(e) {
                var SelectedProduct = e;
                var func_n = "gt_product";
                $.ajax({
                    dataType:"json",
                    type: "post",
                    url: "<?php echo base_url(); ?>index.php/Sales/sales_ajax",
                    data: {
                        pid: e.attr('id'),
                        func_n: func_n,
                    },
                    success: function (data) {
                    //console.log(data.product_status);
                        if(data.product_status == 0){
                            $(".aTbody").append("<tr>" + $(".fTr").html() + "</tr>");
                            $(".aTbody tr:last").find('.table_pid').val(data.product_id);
                            $(".aTbody tr:last").find('.table_prdct').val(data.product_name);
                            $(".aTbody tr:last").find('.table_pr').val(data.product_price);
                            $(".aTbody tr:last").find('.table_rt').val(data.product_price);
                        
                        }else{

                            $('.modalbodytable').empty();
                            for(let x=0;x<data.product_arr.length;x++){
                                if( data.product_arr.length > 1){
                                    if ($('.in_pu_sup :selected').attr("custype") == 1) {
                                        var row_item= "<tr><td>"+ data.product_arr[x].product_name+"</td><td>"+ 
                                        data.product_arr[x].manufacturer_price+"</td><td><button class='btn btn-default selectitem' itemid='"+ 
                                        data.product_arr[x].prod_id+"' item_price='"+ data.product_arr[x].manufacturer_price+"' item_name='"+
                                        data.product_arr[x].product_name+"' item_dis='"+data.product_arr[x].discount+"' item_batchid='"+data.product_arr[x].batch_id +"' >SELECT</button></td></tr>"
                                
                                    }else{
                                        var row_item= "<tr><td>"+ data.product_arr[x].product_name+"</td><td>"+ 
                                        data.product_arr[x].manufacturer_price+"</td><td><button class='btn btn-default selectitem' itemid='"+ 
                                        data.product_arr[x].prod_id+"' item_price='"+ data.product_arr[x].manufacturer_price+"' item_name='"+
                                        data.product_arr[x].product_name+"' item_dis='"+data.product_arr[x].discount+"'item_batchid='"+data.product_arr[x].batch_id +"' >SELECT</button></td></tr>"
                                
                                    }
                                    $('.modalbodytable').append(row_item);
                                    $('#modalpopup').modal("show");  
                                }
                            else{
                                $(".aTbody").append("<tr>" + $(".fTr").html() + "</tr>")
                                $(".aTbody tr:last").find('.table_pid').val(data.product_arr[x].prod_id);
                                $(".aTbody tr:last").find('.table_prdct').val(data.product_arr[x].product_name);
                                $(".aTbody tr:last").find('.table_pr').val(data.product_arr[x].manufacturer_price);
                                $(".aTbody tr:last").find('.table_rt').val(data.product_arr[x].manufacturer_price);
                                $(".aTbody tr:last").find('.table_dscnt').val(data.product_arr[x].discount);
                                $(".aTbody tr:last").find('.table_btchid').val(data.product_arr[x].batch_id);
                            
                                // if ($('.in_pu_sup :selected').attr("custype") == 1) {
                                //     $(".aTbody tr:last").find('.table_dscnt').val(data.product_arr[x].lsd_rate);
                                // }else{
                                //     $(".aTbody tr:last").find('.table_dscnt').val(data.product_arr[x].nlsd_rate);
                                // }
                            }
                            } 
                        }
                        
                        get_total();
                        
                    }

                });
        }
        $("body").on('click','.selectitem',function(){
            $('#modalpopup').modal("hide");
            $(".aTbody").append("<tr>" + $(".fTr").html() + "</tr>");
            $(".aTbody tr:last").find('.table_pid').val($(this).attr("itemid"));
            $(".aTbody tr:last").find('.table_prdct').val($(this).attr("item_name"));
            $(".aTbody tr:last").find('.table_pr').val($(this).attr("item_price"));
            $(".aTbody tr:last").find('.table_rt').val($(this).attr("item_price"));
            $(".aTbody tr:last").find('.table_dscnt').val($(this).attr("item_dis"));
            $(".aTbody tr:last").find('.table_btchid').val($(this).attr("item_batchid"));
            // get_subtotal();
            get_total();
            // get_discount()
        })

        $("body").on('click','.pluse',function(e){
            var qty= $(this).parent().parent().find('.table_qty').val();
            $(this).parent().parent().find('.table_qty').val(parseInt(qty)+1);
            var pprice=  $(this).closest('tr').find('.table_pr').val();
            var subtotal = 0;
            subtotal = (parseInt(qty)+1)*pprice
            $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
            
        
            get_total();
            
        })
        $("body").on('click','.minus',function(){
            var qty=$(this).parent().parent().find('.table_qty').val();
            if(qty >= 2){
                $(this).parent().parent().find('.table_qty').val(parseInt(qty)-1);
                var pprice=  $(this).closest('tr').find('.table_pr').val();
                var subtotal = 0;
                subtotal = (parseInt(qty)-1)*pprice
                $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
            }
        get_total();
        
        })
        function get_total(){
            
            var ftotal=0;
            var dis=0;
            var fsubtotal=0;
            $(".cart_product tr").each(function(){
                    // var qty = parseFloat($(this).find('.table_qty').val()); 
                    var price = parseInt($(this).find('.table_rt').val());
                    var discount = parseFloat(($(this).find('.table_dscnt').val())?$(this).find('.table_dscnt').val():0);
                    
                            fsubtotal += price
                            dis += discount
                            ftotal+=(price)-discount
                    
            }) 
            // $(".in_pu_gtot").text(ftotal).val($(this).attr("item_price")); 
            $('.in_pu_gtot').val(ftotal.toFixed(2)); 
            $('.in_pu_totdsc').val(dis.toFixed(2));
            $('.in_pu_subtol').val(fsubtotal.toFixed(2));
        }
        $("body").on('keyup', '.in_pu_recive', function () {
            set_amounts($(this));
          
        });
        function set_amounts(e){
            var reamount = parseFloat($('.in_pu_recive').val());
            var total = parseFloat($('.in_pu_gtot').val());
            // alert(reamount)
            // alert(total)
            if( reamount >= total){
            var balance = reamount - total;
                $('.in_pu_balance').val(balance.toFixed(2));
            }else{
                var balance = total - reamount;
                $('.in_pu_balance').val(balance.toFixed(2));
            }

        }
        $("body").on('click','.delete_butt',function(){
            swal({
                title: "Delete Product?",
                text: "Are you sure you want to delete product now !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) { 
                    $(this).closest("tr").remove();
                    get_total();
                    set_amounts($(this));
                } 
                
            }); 
            
        })
    
        
        // $(".in_pu_recive").focus();
        //     $(".in_pu_recive").change(function () {
        //         alert()
        //     })
            // $('.in_pu_recive').change(function(){
                // var ReceiveAmount = parseFloat($('#Receiveamount').val());
                // var payamount = parseFloat($('#payamount').val());
                // if(ReceiveAmount >= payamount){
                //     var balance = ReceiveAmount - payamount;
                //     $('#Balanceamount').val(balance.toFixed(2));
                // }else{
                //     $('#Balanceamount').val("");
                // } 
            //     alert()

            // });
        $("body").on('keyup', '.in_pu_recive', function () {

            var reamount = parseFloat($('.in_pu_recive').val());
            var total = parseFloat($('.in_pu_gtot').val());
            // alert(reamount)
            // alert(total)
            if( reamount >= total){
            var balance = reamount - total;
                $('.in_pu_balance').val(balance.toFixed(2));
            }else{
                $('.in_pu_balance').val("");
            }
        
        });


        $("body").on('keyup', '.searchProduct', function () {
        
            $.ajax({
                type: "post",
                url: "<?php echo base_url(); ?>index.php/Sales/sales_ajax",
                data: {
                    func_n: "s_prdct",
                    srchTrm: $(this).val(),
                    cat: $(".pr_cat").val()
                },
                success: function (data) {
                    $(".productHolder").html(data);
                }
            });
        });

        
            $(".barcodesearch").focus();
            $(".barcodesearch").change(function () {
                $.ajax({
                    type: "post",
                    dataType: "JSON",
                    url: "<?php echo base_url(); ?>index.php/Sales/sales_ajax",
                    data: {
                        func_n: "get_barcode_product",
                        srchTrm: $(this).val(),
                    },
                    success: function (data) {
                        // console.log(data);
                        // console.log(data.status);
                        // console.log(data["batch_details"][0]["id"]);
                        //alert(data["batch_details"][0]["id"]);

                        $(".barcodesearch").val("");
                        if(data.product_status == 0){

                            // $(".aTbody").append("<tr>" + $(".fTr").html() + "</tr>");
                            // $(".aTbody tr:last").find('.table_prdct').val(data.product_name);
                            // $(".aTbody tr:last").find('.table_rt').val(data.product_price);
                        
                        }else{

                            $('.modalbodytable').empty();
                            for(let x=0;x<data.product_arr.length;x++){
                                if( data.product_arr.length > 1){
                                    if ($('.in_pu_sup :selected').attr("custype") == 1) {
                                        var row_item= "<tr><td>"+ data.product_arr[x].product_name+"</td><td>"+ 
                                        data.product_arr[x].manufacturer_price+"</td><td><button class='btn btn-default selectitem' itemid='"+ 
                                        data.product_arr[x].prod_id+"' item_price='"+ data.product_arr[x].manufacturer_price+"' item_name='"+
                                        data.product_arr[x].product_name+"' item_dis='"+data.product_arr[x].discount+"' item_batchid='"+data.product_arr[x].batch_id +"' >SELECT</button></td></tr>"
                                
                                    }else{
                                        var row_item= "<tr><td>"+ data.product_arr[x].product_name+"</td><td>"+ 
                                        data.product_arr[x].manufacturer_price+"</td><td><button class='btn btn-default selectitem' itemid='"+ 
                                        data.product_arr[x].prod_id+"' item_price='"+ data.product_arr[x].manufacturer_price+"' item_name='"+
                                        data.product_arr[x].product_name+"' item_dis='"+data.product_arr[x].discount+"' item_batchid='"+data.product_arr[x].batch_id +"' >SELECT</button></td></tr>"

                                    }
                                    $('.modalbodytable').append(row_item);
                                    $('#modalpopup').modal("show");  
                                }
                            else{
                                $(".aTbody").append("<tr>" + $(".fTr").html() + "</tr>");
                                $(".aTbody tr:last").find('.table_pid').val(data.product_arr[x].prod_id);
                                $(".aTbody tr:last").find('.table_prdct').val(data.product_arr[x].product_name);
                                $(".aTbody tr:last").find('.table_pr').val(data.product_arr[x].manufacturer_price);
                                $(".aTbody tr:last").find('.table_rt').val(data.product_arr[x].manufacturer_price);
                                $(".aTbody tr:last").find('.table_dscnt').val(data.product_arr[x].discount);
                                $(".aTbody tr:last").find('.table_btchid').val(data.product_arr[x].batch_id);
                            
                                // if ($('.in_pu_sup :selected').attr("custype") == 1) {
                                //     $(".aTbody tr:last").find('.table_dscnt').val(data.product_arr[x].lsd_rate);
                                // }else{
                                //     $(".aTbody tr:last").find('.table_dscnt').val(data.product_arr[x].nlsd_rate);
                                // }
                            }
                            } 
                        }
                        get_total();
                        
                    }
                });

            })

            $(".save_btn").click(function (e) {
                e.preventDefault();
                $form = $("#inForm");
                add_form($form);
                function add_form($form) {
                    var formdata = new FormData($form[0]);
                    formdata.append("func_n", "edit_inv");
                    $.ajax({
                        type: "post",
                        dataType: "JSON",
                        url: "<?php echo base_url(); ?>index.php/Sales/sales_ajax",
                        data: formdata,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $(".err").html("");
                            if(data.status==false){
                            //     $(".err_bname").html(data.bname);
                            //     $(".err_bbranch").html(data.bbranch);
                            //     $(".err_accno").html(data.accno);
                                notification_message("error","Error Occurred ! Please Check the fields.");
                                    $.each(data.errors, function(key,val) {
                                        $(".err_"+key.replace('[]','')).html(val);
                                    });
                        
                            }else{
                                notification_message("info", "Order Updated Successfully!!");
                                setTimeout(function(){ window.location.href="<?php echo base_url()?>index.php/Sales";  }, 3000);
                            }
                        }
                    });
                }


            }); //End save btn click



            function notification_message(success_status,message,size = false){
			if (size){
				n_size = 'large';
			}else{
				n_size = 'mini';
				}

			if (success_status == 'success'){
				var icon_class = 'fa-check-circle';
				var msg_status = '<b>Success</b> <br>';
			}

			if (success_status == 'error'){
				var icon_class = 'fa-times-circle';
				var msg_status = '<b>Error</b> <br>';
			}

			if (success_status == 'warning'){
				var icon_class = 'fa-exclamation-circle';
				var msg_status = '<b>Warning</b> <br>';
			}

			if (success_status == 'info'){
				var icon_class = 'fa-info-circle';
				var msg_status = '<b>Info</b> <br>';
			}

			Lobibox.notify(success_status, {
				pauseDelayOnHover: true,
				size: n_size,
				icon: 'fa '+icon_class,
				continueDelayOnInactiveTab: false,
				position: 'bottom right',
				msg: msg_status+' '+message
			});
		}
            
</script>
<!-- Mirrored from demo.jsnorm.com/html/strikingdash/strikingdash/ltr/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Jul 2022 02:54:30 GMT -->
</html>  