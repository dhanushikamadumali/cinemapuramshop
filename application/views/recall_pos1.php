<!doctype html>
<html lang="en" dir="ltr">
<!-- Mirrored from demo.jsnorm.com/html/strikingdash/strikingdash/ltr/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Jul 2022 02:54:30 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apply Bright Solutions</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <!-- endinject -->
    <link rel="icon" type="image/png"href="<?php echo base_url()?>assets/content/logo/New_Brand2.png">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/notifications/css/lobibox.min.css"/>
    <!-- inject:css-->

    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/plugin.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/style.css">
    <!-- Font Awesome -->
	<link href="<?= base_url() ?>assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/fontawesome/css/regular.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/fontawesome/css/solid.min.css" rel="stylesheet">

    <!-- endinject -->

    <link rel="icon" type="image/png"href="<?php echo base_url()?>assets/content/logo/New_Brand2.png">

    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/notifications/css/lobibox.min.css"/>
</head>
<style>
    .product_card{

        background-color: #fff;
        border: 1px solid #e0e0d1;
        border-radius: 15px;
        cursor: pointer;
        /* margin-bottom:13px; */
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
      
       color: #5F63F2;
       font-weight:750;
       font-size: 12px;
       /* padding-bottom: 10px; */
    }
    .product_qty{
        margin-left: 10px;
      
      /* color: #5F63F2; */
      font-weight:750;
      font-size: 12px;
      /* padding-bottom: 10px; */

    }
    .product_manu{
        /* margin-left: 10px; */
      text-align: center;
       color: #5F63F2;
       font-weight:750;
       font-size: 12px;
       padding-bottom: 10px;
       display: block;
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
        background-color:#5F63F2;
        width:100%;
        border-radius: 10px;
        height:30px;
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
        font-size:15px;
        /* margin-left:230px; */
        
    }
    .in_pu_othercharge{
        color:#132645;
        font-weight: bold;
        font-size:15px;
        /* margin-left:230px; */
        
    }
    .in_pu_gtot{
        color:#132645;
        font-weight: bold;
        font-size:15px;
        /* margin-top:10px; */
        /* margin-left:180px; */
       

    }
   .in_pu_recive{
        color:#132645;
        /* font-weight: bold; */ 
        font-size:15px;
       
        /* margin-left:140px; */
    } 
    .in_pu_subtol{
        color:#132645;
        font-weight: bold;
        font-size:15px;
        /* margin-left:230px; */
       
    }
    .in_pu_recive{
        color:#132645;
        font-weight: bold;
        font-size:15px;
        /* margin-left:200px; */
        
    }
    .in_pu_balance{
        color:#132645;
        font-weight: bold;
        font-size:15px;
        /* margin-left:230px; */
       
    }
    .sublable{
        color:#132645;
        font-weight: bold;
        font-size:15px
    }
    .totallable{
        color:#132645;
        font-weight: bold;
        font-size:20px;
        margin-top:0px
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
        <table style="display:none">
        <tbody>
        <tr class="fTr" >
            <td  style=" padding-top: 0.85rem;padding-right: 0.20rem;padding-bottom: 0.85rem;padding-left: 0.40rem;">
                <input type="hidden" placeholder="" class="form-control in_id " name="table_id[]"  value="00">
                <input type="hidden" placeholder="" class="form-control table_pid " name="table_pid[]"  value="">
                <input class="form-control-plaintext a  text-left view table_prdct" name="table_prdct[]" id="table_prdct"  value=""  style="font-size:small;width:190px;" readonly="readonly"></div>
            </td>
            <td>
                <div class="input-group" style="width:120px;height:auto">
                   
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text minus" value=""  style="border-radius: 15px;"><i class="fa fa-minus" ></i></button>
                    </div>
                    <div class='custom-file'>
                        <input  class="form-control-plaintext a text-center view table_qty"  id='table_qty' name='table_qty[]' value='1'   oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                    <div class="input-group-prepend qtyparent ">
                        <button class="input-group-text pluse" type="button"  value="" style="border-radius: 15px;" ><i class='fa fa-plus'></i></button>
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
        <div class="col-lg-12" style="padding: 0px;" >
        <div class="card card-Vertical card-default card-md mb-4 mt-4">
        <?= form_open_multipart("", array("id" => "inForm")); ?>
        <?php
            $order_id = $this->input->get('id');
            if ($order_id):
                $this->db->select('sales_order_hold.*');
                $order=$this->Common_model->get_all("sales_order_hold",array('id' =>$order_id))->result();
                // $order1=$this->Common_model->get_all("sales_order_payment",array('order_id' =>$order_id))->result();
                if ($order !=NULL):  
                   
            ?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
     
     <!-- <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="datetime" style="margin-top:10px;color:#132645;font-size:larger"></div> -->
     <div class="col-md-6 mb-25" hidden >
        <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Name" name="id" value="<?php echo ($order[0]->id) ?>">
    </div>
     <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="margin-top: 10px;margin-bottom:10px;display:none">
   
         <select class="form-control in_pu_branch" name="in_pu_branch">
             <option value="">Branch select</option>
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
     <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin-top: 10px;margin-bottom:10px;">
         <span class="err err_in_pu_cus required" style="color:red;position:absolute;font-size:10px"></span>
            <div class="row">
                <div class="col-md-8" style="padding-right:0px">

                    <div class="mb-25 select-style2" style="width:100%">
                        <div class="atbd-select ">
                            <select name="in_pu_cus" id="select-alerts2" class="form-control in_pu_cus" style="padding: 0;">
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
                        </div>
                    </div>
                    <span class="err err_in_pu_cus required" style="color:red;position:absolute;font-size:10px"></span>

                </div>
                <div class="col-md-1" style="padding-left:3px">
                    <button class="input-group-text pluse addcus" type="button"  value="" style="height:42px"><i class='fa fa-plus'></i></button>

                </div>
            </div>
        </div>
        <div class="col-xs-1  col-sm-1 col-md-1 col-lg-1" style="margin-top: 10px;margin-bottom:10px;padding-left:2px">
        <input type="text" class="form-control " placeholder="T No" name="tno" id="tno">
        <!-- <span class="err err_in_pu required" style="color:red;position:absolute;font-size:10px"></span> -->
    </div>
    
     <div class="col-xs-1  col-sm-1 col-md-1 col-lg-1" style="margin-top: 10px;margin-bottom:10px;">
         <select  class="form-control in_pu_pytp " name="in_pu_pytp" >
             <!-- <option value="">Please Select Payment Type</option> -->
             <!-- <?php $selected = $order1[0]->payment_type == "cash" ? "selected" : null; ?>  -->
             <option   value="cash" > Cash</option>
             <!-- <?php $selected = $order1[0]->payment_type  == "bank" ? "selected" : null; ?>  -->
             <option   value="bank" > Bank</option>
             <!-- <?php $selected = $order1[0]->payment_type  == "credit" ? "selected" : null; ?>  -->
             <option  value="credit" > Credit</option>
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
     
     <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin-top: 10px;" >
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn active" style="padding-left:13px;padding-right:13px">
            <input type="radio" name="otype" id="option1" autocomplete="off" value="dine-in" checked>Dine-in
        </label>
        <label class="btn " style="padding-left:13px;padding-right:13px">
            <input type="radio" name="otype" id="option2" autocomplete="off" value="delivery" >Delivery
        </label>
        <label class="btn" style="padding-left:13px;padding-right:13px">
            <input type="radio" name="otype" id="option3" autocomplete="off" value="drive through" >Drive through
        </label>
        <label class="btn " style="padding-left:13px;padding-right:13px">
            <input type="radio" name="otype" id="option3" autocomplete="off" value="take away" >Take away
        </label>
        </div>
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 10px;margin-bottom:10px;"">
        <div class="input-group">
            <!-- <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
            </div> -->
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
        </div>
        
     
       
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row" >
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding:0px">
                    <div class="postable">
                        <div  style="clear: both;overflow-y: scroll;height: 230px;">
                            <table class="table table-responsive-*">
                                <tbody class="aTbody cart_product" >
                                <?php
                                     $this->db->select('sales_order_hold_details.*,product_information.product_name as pname');
                                     $this->db->join("product_information","product_information.id=sales_order_hold_details.product_id");
                                    $sales_order_details_res  = $this->Common_model->get_all("sales_order_hold_details",array("order_id"=>$order_id))->result();
                                   
                                    if($sales_order_details_res):
                                        $dscnts = 0;
                                        foreach($sales_order_details_res as $dtailsArray):
                                            $sales_order_details[0] = $dtailsArray;
                                        ?>
                                    <tr class="fTr" style="margin:0px">
                                    <td style=" padding-top: 0.85rem;padding-right: 0.20rem;padding-bottom: 0.85rem;padding-left: 0.40rem;">
                                        <input type="hidden" placeholder="" class="form-control in_id " name="table_id[]" >
                                        <input type="hidden" placeholder="" class="form-control table_pid " name="table_pid[]"  value="<?= $sales_order_details[0]->product_id ?>">
                                        <input class="form-control-plaintext a  text-left view table_prdct" name="table_prdct[]" id="table_prdct"  value="<?= $sales_order_details[0]->pname ?>"  style="font-size:small;width:190px;" readonly="readonly"></div>
                                    </td>
                                    <td>
                                        <div class="input-group" style="width:120px;height:auto">
                                           
                                            <div class="input-group-prepend">
                                                <button type="button" class="input-group-text minus" value=""  style="border-radius: 15px;"><i class="fa fa-minus" ></i></button>
                                            </div>
                                            <div class='custom-file'>
                                                <input  class="form-control-plaintext a text-center view table_qty"  id='table_qty' name='table_qty[]' value='<?= $sales_order_details[0]->item_qty?>'   oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                            </div>
                                            <div class="input-group-prepend qtyparent ">
                                                <button class="input-group-text pluse" type="button"  value="" style="border-radius: 15px;" ><i class='fa fa-plus'></i></button>
                                            </div>
                                          
                                        </div>
                                    </td>
                                    <td>
                                        <input  type="text" placeholder="Price" class="form-control-plaintext a  text-center view table_pr" name="table_pr[]"  value="<?= $sales_order_details[0]->per_price?>">
                                        <span class="err err_table_pr required" style="color:red;position:absolute;font-size:10px"></span>
                                    </td>
                                    <td>
                                        <input  type="text" placeholder="Price" class="form-control-plaintext a  text-center view table_rt" name="table_rt[]"  value="<?= $sales_order_details[0]->total_price?>" readonly>
                                        <span class="err err_table_rt required" style="color:red;position:absolute;font-size:10px"></span>
                                    </td>
                                    <td >
                                        <div style="padding-top: 0px;">
                                            <a href='javascript:void(0)' style="padding-top: 6px;font-size:20px"  type="button" class="text-danger delete_butt"><i class="fas fa-times"></i></a>
                                            <input  type="hidden" class="form-control table_dscnt" name="table_dscnt[]"  value="<?= $sales_order_details[0]->discount?>">
                                            <input  type="hidden" class="form-control table_btchid" name="table_btchid[]"  value="<?= $sales_order_details[0]->batch_id?>">
                                        </div>
                                    </td>
                                </tr>
                                <?php
                              
                                endforeach;
                                endif; ?>
                                </tbody>
                            </table>
                        </div>  
                    </div>
                    <!-- <div class="row"> -->
                        <div class="card" style="box-shadow: 0 6px 8px rgba(0,0,0,.1); ">
                        <div class="card-body"  style="padding: 10px 10px 10px 10px">
                            <div class="row">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <label class="sublable">Customer Paid</label> 
                                </div> 
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                               
                                    <input type="text" class="form-control in_pu_recive" name="in_pu_recive" value="<?=$order[0]->customer_paid?>"></input>   
                                    <span class="err err_in_pu_recive required" style="color:red;position:absolute;font-size:10px"></span>
                                </div> 
                              
                            </div>
                            <div class="row">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <label class="sublable" >Discount</label> 
                                </div> 
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <input class="form-control-plaintext a text-center view dicountclass in_pu_totdsc" name="in_pu_totdsc" value="" readonly></input>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <label class="sublable" >Other Charge</label> 
                                </div> 
                              
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <input class="form-control-plaintext a text-center view dicountclass in_pu_othercharge" name="in_pu_othercharge" value="" readonly></input>
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <label class="totallable" >Total</label> 
                                </div> 
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <input class="form-control-plaintext a  text-center view totallable in_pu_gtot" name="in_pu_gtot" value="" readonly></input>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <label class="sublable">Paid Amount</label> 
                                </div> 
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <input class="form-control-plaintext a  text-center view dicountclass in_pu_gtot" name="in_pu_gtot" value="" readonly></input>   
                                </div> 
                            </div>
                           
                            <div class="row">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <label class="sublable">SubTotal</label> 
                                </div> 
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <input class="form-control-plaintext a text-center view subtoalclass in_pu_subtol" name="in_pu_subtol" value="" readonly></input>   
                                </div> 
                               
                            </div>
                            <div class="row">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <label class="sublable" >Balance</label> 
                                </div> 
                               
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <input class="form-control-plaintext a  text-center view dicountclass in_pu_balance" name="in_pu_balance" value="" disabled></input>
                                </div>
                            </div>
                        </div>
                        </div>
                       
                    <!-- </div> -->
                </div>
                
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="padding:0px">
                        <div  style="height:40vh; overflow-y:scroll" style="padding:0px 20px 0px 10px">
                            <!-- <div class="row"> -->
                            <?php
                            $this->db->select('*');
                            $manufature_information = $this->Common_model->get_all('`manufacturer_information', ['status' => 1])->result();
                            if ($manufature_information):
                                foreach ($manufature_information as $information):
                                    ?>
                                    <div class="manuDiv" id="<?= $information->id; ?>" style="margin-bottom:3px;width:100%;line-height: 20px" >
                                        <div class="product_card" >
                                            <div class="product_name" style="text-align:center"><?= $information->manufacturer_name ?></div>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                            <!-- </div> -->
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding:4px">
                                <button type="button"  class="btn order_btn" id="order_butt" style="background-color:#5F63F2;width:100%;border-radius: 10px;height:50px;margin-top: 8px;outline: none;color: #fff; cursor: pointer; font-size:15px; line-height: 20px;" >Order</button>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding:4px">
                                <button type="button"  class="btn order_print_btn" id="order_butt"  style="background-color:#5F63F2;width:100%;border-radius: 10px;height:50px;margin-top: 8px;outline: none;color: #fff; cursor: pointer; font-size:13px; line-height: 20px;" >Order & print</button>
                            </div>  
                                             

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding:4px">
                                <button type="button"  class="btn settlebtn" id="order_butt" style="background-color:#5F63F2;width:100%;border-radius: 10px;height:30px;margin-top: 10px;outline: none;color: #fff; cursor: pointer; font-size:15px;text-align: center;" >Settle</button>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding:4px">
                                <button type="button"  class="btn btnval" id="order_butt" value="1000" style="background-color:#5F63F2;width:100%;border-radius: 10px;height:30px;margin-top: 10px;outline: none;color: #fff; cursor: pointer; font-size:15px;text-align: center;" >1000</button>
                            </div>
  
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding:4px">
                                <button type="button"  class="btn btnval" id="order_butt" value="3000" style="background-color:#5F63F2;width:100%;border-radius: 10px;height:30px;margin-top: 10px;outline: none;color: #fff; cursor: pointer; font-size:15px;text-align: center;">3000</button>
                            </div>


                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding:4px">
                                <button type="button"  class="btn btnval" id="order_butt" value="5000" style="background-color:#5F63F2;width:100%;border-radius: 10px;height:30px;margin-top: 10px;outline: none;color: #fff; cursor: pointer; font-size:15px;text-align: center;" >5000</button>
                            </div>

                                             
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding:4px">
                                <button type="button"  class="btn billhold_btn" style="background-color:#5F63F2;width:100%;border-radius: 10px;height:50px;margin-top: 8px;outline: none;color: #fff; cursor: pointer; font-size:15px; line-height: 20px;" >Bill hold</button>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding:4px">
                                <button type="button"  class="btn" id="order_butt"  data-toggle="modal" data-target=".bd-example-modal-lg"style="background-color:#5F63F2;border-radius: 10px;height:50px;margin-top: 10px;outline: none;color: #fff; cursor: pointer; font-size:15px;" >Recall</button>
                            </div>  
                        </div>

                    </div>
                
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-right: 0px;" >
                            <div class="productHolder">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height:70vh; overflow-y:scroll" >
                                <div class="row">
                                    <?php
                                     $this->db->select('product_information.*,manufacturer_information.manufacturer_name as mname');
                                     //$this->db->join("","product_purchase_details.product_id=product_information.id","right");
                                     $this->db->join("manufacturer_information","manufacturer_information.id=product_information.manufacturer_id","right");
                                     $product_information = $this->Common_model->get_all('product_information',['product_information.status' => 1])->result();
                                     $DateTime = date('Y-m-d H:i:s');
                                    // / $this->db->select('*');
                                    // $product_information = $this->Common_model->get_all('product_information', ['status' => 1])->result();
                                    if ($product_information):
                                        foreach ($product_information as $information):
                                        
                                    ?>
                                         <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 productDiv" manu_price="<?= $information->manufacturer_price ?>" prod_name="<?= $information->product_name ?>" id="<?= $information->id; ?>" style="padding:3px">
                                        <?php
                                        $prod_count = $this->Common_model->get_all("product_purchase_details", ["product_id" => $information->id, "date(prod_date)" => date("Y-m-d"),])->result();
                                        $proqty = ($prod_count) ? $prod_count[0]->quantity : 0;
                                        ?>
                                        <div class="product_card" style="<?php echo ($proqty <= 1) ? "border-color:red" : NULL ?>" >
                                            <div class="product_name"><?= $information->product_name ?></div>
                                        <div class="col-md-12">
                                        <div class="row">
                                                <div class="col-md-8" style="padding:0px">
                                                <div class="product_strenth"><?= $information->strength ?><?= $information->measure ?></div>
                                                <div class="product_price" >Price : <?= $information->manufacturer_price ?></div>
                                                <div class="product_qty" >Qty :<?= ($prod_count) ?$prod_count[0]->quantity:0?></div>
                                            </div>
                                            <div class="col-md-4 " style="padding:0px">
                                            <!-- <div class="product_image"> -->
                                                    <!-- <img src="<?php echo base_url()."assets/content/product_images/" . $information->image  ?>" alt="<?= $information->product_name . " - " . $information->strength ?>" style="width:75%;  cursor: pointer;margin-top:0px;border-radius: 15px"> -->
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                        <div class="row product_manu" >
                                        <?= $information->mname ?>
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
                            <p>2022 @<a href="#">ApplyBrightSolutions</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-menu text-right">
                            <!-- <ul>
                                <li>
                                    <a href="#">About</a>
                                </li>
                                <li>
                                    <a href="#">Team</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                            </ul> -->
                        </div>
                        <!-- ends: .Footer Menu -->
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <div id="overlayer">
        <span class="loader-overlay">
            <!-- <div class="atbd-spin-dots spin-lg"> -->
                <!-- <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span> -->
            <!-- </div> -->
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

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bill Hold Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table mb-0 table-borderless adv-table example" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10">
                                <thead>
                                    <tr class="userDatatable-header">
 
                                        <th>
                                            <span class="userDatatable-title">transaction no</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">customer name</span>
                                        </th> 
                                        <th>
                                            <span class="userDatatable-title">customer paid</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">total amount</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">sales date</span>
                                        </th>
                                    
                                        <th>
                                            <span class="userDatatable-title">action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $this->db->select('sales_order_hold.*,customer_information.customer_name as cname,branch.branch_name as bname');
                                    $this->db->join("customer_information", "customer_information.id=sales_order_hold.customer_id");
                                    $this->db->join("branch", "branch.id=sales_order_hold.branch_id");
                                    $order = $this->Common_model->get_all('sales_order_hold')->result();
                                    if ($order):
                                        foreach ($order as $information):
                                            ?>
                                            <tr>

                                                <td>
                                                    <div class="d-flex">
                                                        <div class="userDatatable-inline-title">
                                                            <a href="#" class="text-dark fw-500">
                                                                <h6> <?= $information->transaction_no ?></h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="userDatatable-inline-title">
                                                            <a href="#" class="text-dark fw-500">
                                                                <h6> <?= $information->cname ?></h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>

                                           
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="userDatatable-inline-title">
                                                            <a href="#" class="text-dark fw-500">
                                                                <h6> <?= $information->customer_paid ?></h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="userDatatable-inline-title">
                                                            <a href="#" class="text-dark fw-500">
                                                                <h6> <?= $information->total_amount ?></h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="userDatatable-inline-title">
                                                            <a href="#" class="text-dark fw-500">
                                                                <h6> <?= $information->sales_date ?></h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>                                
                                                <td>  
                                                    <a href='<?php echo base_url(); ?>index.php/Pos/Edit?id=<?php echo $information->id; ?>' class="edit">
                                                        <span class="far fa-edit"></span></a>                                              
                                                </td>
                                            </tr>

                                            <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade addcustomerModal" id="addcustomerModal" tabindex="-1" role="dialog" aria-labelledby="addcusModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >Add Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                       <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
                       <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <input type="text" class="form-control cname" name="cname" placeholder="Name" >
                            <div class="row">&nbsp;</div>
                            <input type="text" class="form-control cmobile" name="cmobile" placeholder="Mobile">
                       </div>
                       <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary cusadd" ppdid="">Save changes</button>
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
  
    <!-- alert -->
    <script type="text/javascript" src="<?=base_url()?>assets/js/sweetalert.js" rel="stylesheet"></script>
    <script type="text/javascript">
        $(document).keydown(function(event) {
        //event.preventDefault(); 
        if (event.keyCode == 114) { // F3
        event.preventDefault();
            // Remap F3 to some other key that the browser doesn't care about
            $('.searchProduct').val("");
            $('.searchProduct').focus();
        }
        if (event.keyCode == 116) { // F5
            // Remap F3 to some other key that the browser doesn't care about
        //    location.reload();
        }
        });
         $(document).ready(function(){
       
        get_total($(this));
       
        var reamount = parseFloat($('.in_pu_recive').val());
        var total = parseFloat($('.in_pu_gtot').val());
        
        if( reamount >= total){
        var balance = reamount - total;
            $('.in_pu_balance').val(balance.toFixed(2));
        }else{
            $('.in_pu_balance').val("");
        }

    });
    $("body").on('click', '.productDiv', function () {
        get_product($(this));
        get_total($(this))
       
    });
    function  get_product(e) {

        var isthereitem = false;
        $(".cartrowitem").each(function () {
            if (($(this).find(".table_pid").val()) == (e.attr("id"))) {
                isthereitem = true;
                var extqty = $(this).closest('tr').find('.table_qty').val();
                var tprice = $(this).closest('tr').find('.table_pr').val();
                var subtotal = 0;
                if (extqty != '') {
                    $(this).closest('tr').find('.table_qty').val(parseInt(extqty) + 1).change();
                    subtotal = (parseInt(extqty) + 1) * tprice
                    $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
                } else {
                    $(this).closest('tr').find('.table_qty').val(1).change();
                    subtotal = (1) * tprice
                    $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
                }
                get_total();
            }
        })
        if (!isthereitem) {
            $(".aTbody").append("<tr class='cartrowitem'>" + $(".fTr").html() + "</tr>");
            $(".aTbody tr:last").find('.table_pid').val(e.attr("id"));
            $(".aTbody tr:last").find('.table_prdct').val(e.attr("prod_name"));
            $(".aTbody tr:last").find('.table_pr').val(e.attr("manu_price"));
            $(".aTbody tr:last").find('.table_rt').val(e.attr("manu_price"));
        }


        // var func_n = "gt_product";
        // $.ajax({
        //     dataType:"json",
        //     type: "post",
        //     url: "<?php //echo base_url();      ?>index.php/Pos/pos_ajax",
        //     data: {
        //         pid: e.attr('id'),
        //         func_n: func_n,
        //     },
        //     success: function (data) {

        //         if(data.product_status == 0){
        //                 var isthereitem = false;
        //                 $(".cartrowitem").each(function () {
        //                 if (($(this).find(".table_pid").val()) == (data.product_id) ) {
        //                         isthereitem = true;
        //                         var extqty = $(this).closest('tr').find('.table_qty').val();
        //                         var tprice = $(this).closest('tr').find('.table_pr').val();
        //                         var subtotal = 0;
        //                         if (extqty != '') {
        //                             $(this).closest('tr').find('.table_qty').val(parseInt(extqty) + 1).change();
        //                             subtotal = (parseInt(extqty)+1)*tprice
        //                             $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
        //                         } else {
        //                             $(this).closest('tr').find('.table_qty').val(1).change();
        //                             subtotal = (1)*tprice
        //                             $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
        //                         } 
        //                         get_total();
        //                 } 

        //                 })
        //                 if(!isthereitem){
        //                     $(".aTbody").append("<tr class='cartrowitem'>" + $(".fTr").html() + "</tr>");
        //                     $(".aTbody tr:last").find('.table_pid').val(data.product_id);
        //                     $(".aTbody tr:last").find('.table_prdct').val(data.product_name);
        //                     $(".aTbody tr:last").find('.table_pr').val(data.product_price);
        //                     $(".aTbody tr:last").find('.table_rt').val(data.product_price);
        //                 }
        //         }else{

        //             $('.modalbodytable').empty();
        //             for(let x=0;x<data.product_arr.length;x++){
        //                 if( data.product_arr.length > 1){
        //                     if ($('.in_pu_sup :selected').attr("custype") == 1) {
        //                         var row_item= "<tr ><td>"+ data.product_arr[x].product_name+"</td><td>"+ 
        //                         data.product_arr[x].manufacturer_price+"</td><td><button id='"+ data.product_arr[x].prod_id+"' value='"+ data.product_arr[x].prod_id+"' class='btn btn-default selectitem' itemid='"+ 
        //                         data.product_arr[x].prod_id+"' item_price='"+ data.product_arr[x].manufacturer_price+"' item_name='"+
        //                         data.product_arr[x].product_name+"' item_dis='"+data.product_arr[x].discount+"' item_batchid='"+data.product_arr[x].batch_id +"' >SELECT</button></td></tr>"

        //                     }else{
        //                         var row_item= "<tr><td>"+ data.product_arr[x].product_name+"</td><td>"+ 
        //                         data.product_arr[x].manufacturer_price+"</td><td><button class='btn btn-default selectitem'  itemid='"+ 
        //                         data.product_arr[x].prod_id+"' item_price='"+ data.product_arr[x].manufacturer_price+"' item_name='"+
        //                         data.product_arr[x].product_name+"' item_dis='"+data.product_arr[x].discount+"'item_batchid='"+data.product_arr[x].batch_id +"' >SELECT</button></td></tr>"

        //                     }
        //                     $('.modalbodytable').append(row_item);
        //                     $('#modalpopup').modal("show");  
        //                 }
        //                else{
        //                     var isthereitem = false;
        //                     $(".cartrowitem").each(function () {
        //                     if (($(this).find(".table_pid").val()) == (data.product_arr[x].product_id) ) {
        //                         isthereitem = true;
        //                         var extqty = $(this).closest('tr').find('.table_qty').val();
        //                         var tprice = $(this).closest('tr').find('.table_pr').val();
        //                         var subtotal = 0;
        //                         if (extqty != '') {
        //                             $(this).closest('tr').find('.table_qty').val(parseInt(extqty) + 1).change();
        //                             subtotal = (parseInt(extqty)+1)*tprice
        //                             $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
        //                         } else {
        //                             $(this).closest('tr').find('.table_qty').val(1).change();
        //                             subtotal = (1)*tprice
        //                             $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
        //                         }
        //                         get_total();
        //                     } 
        //                     })
        //                     if(!isthereitem){
        //                         $(".aTbody").append("<tr class='cartrowitem'>" + $(".fTr").html() + "</tr>")
        //                         $(".aTbody tr:last").find('.table_pid').val(data.product_arr[x].product_id);
        //                         $(".aTbody tr:last").find('.table_prdct').val(data.product_arr[x].product_name);
        //                         $(".aTbody tr:last").find('.table_pr').val(data.product_arr[x].manufacturer_price);
        //                         $(".aTbody tr:last").find('.table_rt').val(data.product_arr[x].manufacturer_price);
        //                         $(".aTbody tr:last").find('.table_dscnt').val(data.product_arr[x].discount);
        //                         $(".aTbody tr:last").find('.table_btchid').val(data.product_arr[x].batch_id);
        //                     }
        //                }
        //             } 
        //         }
        //         get_total();
        //     }

        // });
        }
    $("body").on('click','.selectitem',function(){
        $('#modalpopup').modal("hide");
       if( duplicate_product($(this))) {

       }else{
            $(".aTbody").append("<tr class='cartrowitem'>" + $(".fTr").html() + "</tr>");
            $(".aTbody tr:last").find('.table_pid').val($(this).attr("itemid"));
            $(".aTbody tr:last").find('.table_prdct').val($(this).attr("item_name"));
            $(".aTbody tr:last").find('.table_pr').val($(this).attr("item_price"));
            $(".aTbody tr:last").find('.table_rt').val($(this).attr("item_price"));
            $(".aTbody tr:last").find('.table_dscnt').val($(this).attr("item_dis"));
            $(".aTbody tr:last").find('.table_btchid').val($(this).attr("item_batchid"));
       }
       get_total();
    })

    function duplicate_product(e){
        var selecteditem = e;
        var isthereitem = false;
        $(".cartrowitem").each(function () {
        if (($(this).find(".table_pid").val()) == (e.attr('itemid')) &&  ($(this).find(".table_pr").val()) == (e.attr('item_price')) ) {
                isthereitem = true;
                var extqty = $(this).closest('tr').find('.table_qty').val();
                var tprice = $(this).closest('tr').find('.table_pr').val();
                var subtotal = 0;
                if (extqty != '') {
                    $(this).closest('tr').find('.table_qty').val(parseInt(extqty) + 1).change();
                    subtotal = (parseInt(extqty)+1)*tprice
                    $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
                } else {
                    $(this).closest('tr').find('.table_qty').val(1).change();
                    subtotal = (1)*tprice
                    $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
                } 
                get_total();
        } 
            
        })
            return isthereitem;
    }

       

    // let cart_list = [];
    // function duplicate_product(e){
    //     var selecteditem = e;
    // if(!cart_list.length>0){
    //     cart_list.push({[0]:selecteditem.attr('itemid'),[1]:selecteditem.attr('item_price')});
    //     console.log(cart_list.length);
    // }else{
    //     $.each(cart_list,(e,i)=>{
    //         alert(i)
    //         if(i[0].includes(selecteditem.attr('itemid'))&& i[1].includes(selecteditem.attr('item_price'))){
                

            // $(".cartrowitem").each(function (e,i) {
              
               
               
            
        
            //    console.log(cart_list.length)
            //     console.log('avalibel')
            //     // console.log($(this).find(".table_pid").val());
            //     console.log($(this).closest('tr').find('.table_pid').val());
               
            // })
           
              
                 
                  
//             }else{
//                 cart_list.push({[0]:selecteditem.attr('itemid'),[1]:selecteditem.attr('item_price')});
//                 console.log(cart_list.length);
//             }
//         })
//     }
        
       
//    }
 

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
    $("body").on('keyup', '.table_pr', function () {

        var tprice =  $(this).closest('tr').find('.table_pr').val();
        var tqty = $(this).closest('tr').find('.table_qty').val();
        var subtotal = 0;
        subtotal = (parseInt(tqty))*tprice
        $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
        get_total();

    });
    $("body").on('click','.btnval',function(){
        var btnval=  parseFloat($(this).val());
        $('.in_pu_recive').val( btnval.toFixed(2));

        get_balance($(this));
       
       
    });
    $("body").on('click', '.settlebtn', function () {
        var total = parseFloat($('.in_pu_gtot').val());

        $('.in_pu_recive').val(total.toFixed(2));

        get_balance($(this));


    })
    function get_balance(){
        var reamount = parseFloat($('.in_pu_recive').val());
        var total = parseFloat($('.in_pu_gtot').val());
        if( reamount >= total){
        var balance = reamount - total;
            $('.in_pu_balance').val(balance.toFixed(2));
        }else{
            $('.in_pu_balance').val("");
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
            } 
            
        }); 
        
    })
    
    $("body").on('change', '.in_pu_pytp', function () {
            if ($(this).val() == 'bank') {
                $(".in_pu_bnk").removeAttr('disabled');
                get_total();
            } else {
                $(".in_pu_bnk").attr('disabled', true);
                get_total();
            }
           
    });
    // function get_othercharge(){
    //     var subtotal = parseInt($('.in_pu_subtol').val());
    //     var othercharge = (subtotal * 3)/100;
    //     var charge = 3/100;
    //     var getotherchr = subtotal+ othercharge
    //     $('.in_pu_subtol').val(getotherchr.toFixed(2));
    //     $('.in_pu_othercharge').val(charge);
    //     $('.in_pu_gtot').val(getotherchr.toFixed(2));
      
    // }

 
    function get_total(){
        var tlinetotal=0;
        var tlinedis=0;
        var fsubtotal=0;
        //var subtotal=0;

        var banktype = $('.in_pu_pytp').val();
       
       
        if(banktype == 'bank'){ 
            $(".cart_product tr").each(function(){
                // var qty = parseFloat($(this).find('.table_qty').val()); 
                var price = parseFloat($(this).find('.table_rt').val());
                var discount = parseFloat(($(this).find('.table_dscnt').val())?$(this).find('.table_dscnt').val():0);
                      
                tlinetotal += price ;
                tlinedis += discount;   
            }) 
            fsubtotal=tlinetotal-tlinedis;

            var finaltotal = fsubtotal*(103/100);
            // var subtotal = charge + fsubtotal;
            // alert(subtotal)
            // var total = charge + ftotal


            // $(".in_pu_gtot").text(ftotal).val($(this).attr("item_price")); 
            $('.in_pu_gtot').val(finaltotal.toFixed(2));
            $('.in_pu_totdsc').val(tlinedis.toFixed(2));
            $('.in_pu_subtol').val(fsubtotal.toFixed(2));
            $('.in_pu_othercharge').val("3%");
            get_balance($(this));
          

        }else if(banktype == 'cash'){ 
          
             $(".cart_product tr").each(function(){
                // var qty = parseFloat($(this).find('.table_qty').val()); 
                var price = parseFloat($(this).find('.table_rt').val());
                var discount = parseFloat(($(this).find('.table_dscnt').val())?$(this).find('.table_dscnt').val():0);
                
                tlinetotal += price ;
                tlinedis += discount;   
            }) 
            fsubtotal=tlinetotal-tlinedis;

            var finaltotal = fsubtotal;
            // $(".in_pu_gtot").text(ftotal).val($(this).attr("item_price")); 
            $('.in_pu_gtot').val(finaltotal.toFixed(2));
            $('.in_pu_totdsc').val(tlinedis.toFixed(2));
            $('.in_pu_subtol').val(fsubtotal.toFixed(2));
            $('.in_pu_othercharge').val("0");
            get_balance($(this));

        }else if(banktype == 'credit'){
            $(".cart_product tr").each(function(){
                // var qty = parseFloat($(this).find('.table_qty').val()); 
                var price = parseFloat($(this).find('.table_rt').val());
                var discount = parseFloat(($(this).find('.table_dscnt').val())?$(this).find('.table_dscnt').val():0);
                
                tlinetotal += price ;
                tlinedis += discount;   
            }) 
            fsubtotal=tlinetotal-tlinedis;

            var finaltotal = fsubtotal;
            // $(".in_pu_gtot").text(ftotal).val($(this).attr("item_price")); 
            $('.in_pu_gtot').val(finaltotal.toFixed(2));
            $('.in_pu_totdsc').val(tlinedis.toFixed(2));
            $('.in_pu_subtol').val(fsubtotal.toFixed(2));
            $('.in_pu_othercharge').val("0");
            get_balance($(this));

        }
       
    }

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
   


    $("body").on('keyup', '.searchProduct', function () {
        if ($(this).val().length >= 4) {
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
        }
    });
    $("body").on('click', '.manuDiv', function () {
        // var mid = $(this).attr("id");
        // alert(mid);
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>index.php/Sales/sales_ajax",
            data: {
                func_n: "m_prdct",
                clickTrm: $(this).attr("id"),
                
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
                            var isthereitem = false;
                            $(".cartrowitem").each(function () {
                            if (($(this).find(".table_pid").val()) == (data.product_arr[x].prod_id) ) {
                                isthereitem = true;
                                var extqty = $(this).closest('tr').find('.table_qty').val();
                                var tprice = $(this).closest('tr').find('.table_pr').val();
                                var subtotal = 0;
                                if (extqty != '') {
                                    $(this).closest('tr').find('.table_qty').val(parseInt(extqty) + 1).change();
                                    subtotal = (parseInt(extqty)+1)*tprice
                                    $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
                                } else {
                                    $(this).closest('tr').find('.table_qty').val(1).change();
                                    subtotal = (1)*tprice
                                    $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
                                } 
                                get_total();
                            } 
                            })
                            if(!isthereitem){
                                $(".aTbody").append("<tr>" + $(".fTr").html() + "</tr>");
                                $(".aTbody tr:last").find('.table_pid').val(data.product_arr[x].prod_id);
                                $(".aTbody tr:last").find('.table_prdct').val(data.product_arr[x].product_name);
                                $(".aTbody tr:last").find('.table_pr').val(data.product_arr[x].manufacturer_price);
                                $(".aTbody tr:last").find('.table_rt').val(data.product_arr[x].manufacturer_price);
                                $(".aTbody tr:last").find('.table_dscnt').val(data.product_arr[x].discount);
                                $(".aTbody tr:last").find('.table_btchid').val(data.product_arr[x].batch_id);
                            }
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
        $(".order_print_btn").click(function (e) {
            e.preventDefault();
            $form = $("#inForm");
            add_form($form);
            function add_form($form) {
                var formdata = new FormData($form[0]);
                formdata.append("func_n", "recallpos");
                $.ajax({
                    type: "post",
                    dataType: "JSON",
                    url: "<?php echo base_url(); ?>index.php/Pos/pos_ajax",
                    data: formdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        console.log(data.saleid)
                        $(".err").html("");
                            if(data.status==false){
                                $(".err_in_pu_cus").html(data.in_pu_cus);
                                $(".err_in_pu_branch").html(data.in_pu_branch);
                                $(".err_in_pu_recive").html(data.accno);
                                // notification_message("error","Error Occurred ! Please Check the fields.");
                                    $.each(data.errors, function(key,val) {
                                        $(".err_"+key.replace('[]','')).html(val);
                                    });
                                   
                            }else{
                              
                              
                                setTimeout(function(){  window.location.href = "<?php echo base_url() ?>index.php/Pos/Printbill?id=" + data.saleid; });
                              
                            }
                                }
                            });

                        
            }
        }); //End save btn click

        $(".order_btn").click(function (e) {
            e.preventDefault();
            $form = $("#inForm");
            add_form($form);
            function add_form($form) {
                var formdata = new FormData($form[0]);
                formdata.append("func_n", "recallpos");
                $.ajax({
                    type: "post",
                    dataType: "JSON",
                    url: "<?php echo base_url(); ?>index.php/Pos/pos_ajax",
                    data: formdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        console.log(data.saleid)
                        $(".err").html("");
                            if(data.status==false){
                                $(".err_in_pu_cus").html(data.in_pu_cus);
                                $(".err_in_pu_branch").html(data.in_pu_branch);
                                $(".err_in_pu_recive").html(data.accno);
                                // notification_message("error","Error Occurred ! Please Check the fields.");
                                    $.each(data.errors, function(key,val) {
                                        $(".err_"+key.replace('[]','')).html(val);
                                    });
                                   
                            }else{
                              
                              
                                setTimeout(function(){ window.location.reload()  });
                              
                            }
                                }
                            });
                        }
            
        }); //End save btn click

        $(".billhold_btn").click(function (e) {
            e.preventDefault();
            $form = $("#inForm");
            add_form($form);
            function add_form($form) {
                var formdata = new FormData($form[0]);
                formdata.append("func_n", "bill_hold");
                $.ajax({
                    type: "post",
                    dataType: "JSON",
                    url: "<?php echo base_url(); ?>index.php/Pos/pos_ajax",
                    data: formdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        console.log(data.saleid)
                        $(".err").html("");
                            if(data.status==false){
                                $(".err_in_pu_cus").html(data.in_pu_cus);
                                $(".err_in_pu_branch").html(data.in_pu_branch);
                                $(".err_in_pu_recive").html(data.accno);
                                // notification_message("error","Error Occurred ! Please Check the fields.");
                                    $.each(data.errors, function(key,val) {
                                        $(".err_"+key.replace('[]','')).html(val);
                                    });
                            }else{
                                setTimeout(function(){ window.location.reload();  });
                            }
                                }
                            });
            }
        
       
        }); //End save btn click


    // add customer
    $(".addcus").click(function () {
        $(".addcustomerModal").modal('show');
    });

    $(".cusadd").click(function () {
        $.ajax({
            type: "post",
            dataType: "JSON",
            url: "<?php echo base_url(); ?>index.php/Pos/pos_ajax",
            data: {
                "func_n": "get_customer",
                "cusname": $(".cname").val(),
                "cmobile": $(".cmobile").val()
            }, 
            success: function (data) { 
                if (data.status == false) {  
                } else { 
                    $('.cname').val('');
                    $('.cmobile').val('');
                    $(".addcustomerModal").modal('hide');
                    $(".in_pu_cus").append("<option value='" + data.cus_id + "'>" + data.cus_name + "</option>"); 
                    $(".in_pu_cus").val(data.cus_id);
                        
                }
            }
        });
    });

      
    $("body").on("click",".close",function(){
        $(".addcustomerModal").modal('hide');
    });

        
	

</script>



<!-- Mirrored from demo.jsnorm.com/html/strikingdash/strikingdash/ltr/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Jul 2022 02:54:30 GMT -->
</html>  