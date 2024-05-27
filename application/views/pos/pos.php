<?php
// $this->db->order_by("id","DESC");
// $this->db->limit(1);
// $accdate=$this->Common_model->get_all("cashier_open")->result();
// 			$current=date("h:i a");
// 			$sunrise = "1:30 pm";
//             $sunset = "9:00 pm";
//             $date1 = DateTime::createFromFormat('h:i a', $current);
//         	$date2 = DateTime::createFromFormat('h:i a', $sunrise);
//             $date3 = DateTime::createFromFormat('h:i a', $sunset);
//             if ($date1 > $date2 && $date1 < $date3): 
//               if(date("Y-m-d")==date("Y-m-d",strtotime($accdate[0]->acc_date))):
//                      echo "cashier OPEN";
//                   else:
//                       echo "cashier closed";
//               endif;
//             endif; 
// 	if(date("Y-m-d")==$accdate[0]->acc_date){
// 	}else{
// 	  //  header("Location:".base_url()."index.php/pos/cashier_open");
// 	}	
?>

<?php
$query = $this->db->query("SELECT * FROM cashier_open ORDER BY id DESC LIMIT 1")->result();
if ($query[0]->close_date == 0 || $query[0]->close_date == null):

else:
    header("Location:" . base_url() . "index.php/pos/cashier_open");
    die();
endif;
?>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Apply Bright Solutions</title>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script> -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins.min.js"></script>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> -->
        <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"> -->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
        <!-- endinject -->
        <link rel="icon" type="image/png"href="<?php echo base_url() ?>assets/content/logo/New_Brand2.png">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/notifications/css/lobibox.min.css"/>
        <!-- inject:css-->

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/plugin.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/style.css">
        <!-- Font Awesome -->
        <link href="<?= base_url() ?>assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/fontawesome/css/regular.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/fontawesome/css/solid.min.css" rel="stylesheet">

        <!-- endinject -->
        <link rel="icon" type="image/png"href="<?php echo base_url() ?>assets/content/logo/New_Brand2.png">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/notifications/css/lobibox.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/datatables.min.js"></script>
    </head>
    <style>

        .product_card{
            background-color: #fff;
            border: 1px solid #e0e0d1;
            border-radius: 0px;
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
            /* padding-bottom: 5px; */
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
            height:30px;
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



        .form-control-plaintext {
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
            /*cursor: alias;*/
        }
        .select2-search__field{
            height:35px !important;
        }
        .alert2 .select2-results > .select2-results__options{
            padding:0px;
        }
        .alert2{
            padding:10px 15px !important;
        }

        .cartrowitem>td{
            padding:0px 15px !important;
        }
    </style>
    <script>

        // $('body').keypress(function (e) {
        //  var key = e.which;
        //  if(key == 8)  // the enter key code
        //   {
        //   $('.searchProduct').focus();
        //   }
        //   alert();
        // }); 
        // window.onkeypress = function(e) {
        //     if ((e.which || e.keyCode) == 115) {
        //         alert("fresh");
        //     }
        // };


    </script>
    <body class="layout-light side-menu overlayScroll">
        <div class="mobile-search">
            <!--<form class="search-form">-->
            <!--    <span data-feather="search"></span>-->
            <!--    <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">-->
            <!--</form>-->
        </div>
        <div class="mobile-author-actions"></div>
        <?php $this->load->view('template/header_menu'); ?>
        <div class="contents" style="padding-left:15px !important">

            <div class="container-fluid" >
                <div class="social-dash-wrap">
                    <div class="row" >
                    </div>
                    <table style="display:none">
                        <tbody>
                            <tr class="fTr" style="margin:0px">
                                <td style=" padding-top: 0.85rem;padding-right: 0.20rem;padding-bottom: 0.85rem;padding-left: 0.40rem;">
                                    <input type="hidden" placeholder="" class="form-control in_id " name="table_id[]"  value="00">
                                    <input type="hidden" placeholder="" class="form-control table_pid " name="table_pid[]"  value="">
                                    <input class="form-control-plaintext a text-left view table_prdct" name="table_prdct[]" id="table_prdct" style="font-size:small;width:190px;" readonly="readonly">
                                </td>
                                <td>
                                    <div class="input-group" style="width:120px;height:auto">
                                        <div class="input-group-prepend">
                                            <button type="button" class="input-group-text minus" value=""  style="border-radius: 10px;"><i class="fa fa-minus" ></i></button>
                                        </div>
                                        <div class='custom-file'>
                                            <input  class="form-control-plaintext a text-center view table_qty"  id='table_qty' name='table_qty[]' value='1'   oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                        <div class="input-group-prepend qtyparent ">
                                            <button class="input-group-text pluse" type="button"  value="" style="border-radius: 10px;" ><i class='fa fa-plus'></i></button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <input  type="text" placeholder="Price" class="form-control-plaintext a  text-center view table_pr" name="table_pr[]"  value="">
                                    <span class="err err_table_pr" style="color:red;position:absolute;font-size:10px"></span>
                                </td>
                                <!--<td>-->
                                <!--    <input  type="text" placeholder="Discount" class="form-control-plaintext a  text-center view table_dscnt" name="table_dc[]"  value="" >-->
                                <!--    <span class="err err_table_dc required" style="color:red;position:absolute;font-size:10px"></span>-->
                                <!--</td>-->

                                <td class="pkchargecolumn" style="display:none">
                                    <input  type="hidden" class="form-control-plaintext a  text-center view hiddenpackagingcharge" name="hiddenpackagingcharge[]"  value="" >
                                    <input  type="text" placeholder="Packaging" class="form-control-plaintext a  text-center view table_pkcharge" name="table_pkcharge[]"  value="" >
                                    <span class="err err_table_pkcharge" style="color:red;position:absolute;font-size:10px"></span>
                                </td>
                                <td>
                                    <input  type="text" placeholder="Price" class="form-control-plaintext a  text-center view table_rt" name="table_rt[]"  value="" readonly>
                                    <span class="err err_table_rt" style="color:red;position:absolute;font-size:10px"></span>
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
                    <div class="row"  >
                        <div class="col-lg-12" style="padding: 0px;" >
                            <div class="card card-Vertical card-default card-md mb-4" style="margin-top:1rem !important">
                                <?= form_open_multipart("", array("id" => "inForm")); ?>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background-color:#ccc">
                                    <div class="row">
                                        <!-- <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="datetime" style="margin-top:10px;color:#132645;font-size:larger"></div> -->
                                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="margin-top: 10px;display:none">
                                            <select class="form-control in_pu_branch" name="in_pu_branch">
                                                <option value="">Branch select</option>
                                                <?php
                                                $this->db->select("id,branch_name");
                                                $tableResult = $this->Common_model->get_all("branch")->result();
                                                if ($tableResult):
                                                    foreach ($tableResult as $tableRes):
                                                        ?>
                                                        <option <?= $tableRes->id == '1' ? 'selected' : null ?>  value="<?= $tableRes->id ?>" > <?= $tableRes->branch_name ?></option>
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                            <span class="err err_in_pu_branch required" style="color:red;position:absolute;font-size:10px"></span>
                                        </div> 
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin-top: 10px;">
                                            <div class="row">
                                                <div class="col-md-8" style="padding-right:0px">
                                                    <div class="select-style2" style="width:100%">

                                                        <input type="text" class="form-control in_pu_cus" value="0000000000" name="in_pu_cus" style="height:30px" onkeyup="if(/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                                        <div class="atbd-select" style="display: none">
                                                            <select name="in_pu_cus12" id="select-alerts2" class="form-control in_pu_cus" style="padding: 0;">
                                                                <?php
                                                                $this->db->select("id,customer_name");
                                                                $tableResult = $this->Common_model->get_all("customer_information")->result();
                                                                if ($tableResult):
                                                                    foreach ($tableResult as $tableRes):
                                                                        ?>
                                                                        <option <?= $tableRes->id == '1' ? 'selected' : null ?>  value="<?= $tableRes->id ?>" > <?= $tableRes->customer_name ?></option>
                                                                        <?php
                                                                    endforeach;
                                                                endif;
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="customernametext" style="color:black;position:absolute;font-size:10px"></span>
                                                    <span class="err err_in_pu_cus required" style="color:red;position:absolute;font-size:10px"></span>
                                                </div>
                                                <div class="col-md-1" style="padding-left:3px">
                                                    <!--<button class="input-group-text pluse addcus" type="button"  value="" style="height:42px"><i class='fa fa-plus'></i></button>-->
                                                    <button class="input-group-text resetnum" type="button"  value="" style="height:42px"><i class='fa fa-undo'></i></button>
                                                    <script>
                                                        $("body").on("click", ".resetnum", function () {
                                                            $(".in_pu_cus").val("0000000000");
                                                            $('.customernametext').text('Walking Customer');
                                                        });
                                                        $("body").on("keyup change", ".in_pu_cus", function () {
                                                            if ($(this).val().length == 10) {
                                                                $(this).css("border", "1px solid #f1f2f6");
                                                                $(this).css("color", "#495057");
                                                                $.ajax({
                                                                    type: "post",
                                                                    dataType: "JSON",
                                                                    url: "<?php echo base_url(); ?>index.php/Pos/pos_ajax",
                                                                    data: {
                                                                        "func_n": "get_customer_name",
                                                                        "cusmno": $(this).val()
                                                                    },
                                                                    success: function (data) {
                                                                        if (data.status == false) {
                                                                            $('.customernametext').text('');
                                                                        } else {
                                                                            $('.customernametext').text(data.cusname);
                                                                        }
                                                                    }
                                                                });
                                                            } else {
                                                                $(this).css("border", "1px solid #ff5c5c");
                                                                $(this).css("color", "red");
                                                                $('.customernametext').text('');
                                                            }
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-1  col-sm-1 col-md-1 col-lg-1" style="padding:10px 5px">
                                            <input type="text" class="form-control " placeholder="T No" name="tno" id="tno"  style="padding-left:15px;padding-right:10px">
                                            <!-- <span class="err err_in_pu required" style="color:red;position:absolute;font-size:10px"></span> -->
                                        </div>

                                        <div class="col-xs-1  col-sm-1 col-md-1 col-lg-1" style="padding:10px 5px">
                                            <select  class="form-control in_pu_pytp " name="in_pu_pytp" style="padding-left:15px;padding-right:10px">
                                                <!-- <option value="">Please Select Payment Type</option> -->
                                                <option value="cash" > Cash</option>
                                                <option value="bank" > Bank</option>
                                                <option value="credit" > Credit</option>
                                            </select>
                                            <span class="err err_in_pu_pytp required" style="color:red;position:absolute;font-size:10px"></span>
                                        </div>
                                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="margin-top: 10px;">
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
                                                <label class="btn active" style="padding-left:13px;padding-right:13px" ottype="dine-in">
                                                    <input type="radio" name="otype" id="option1" autocomplete="off" value="dine-in" checked>Dine-in
                                                </label>
                                                <label class="btn " style="padding-left:13px;padding-right:13px" ottype="take away">
                                                    <input type="radio" name="otype" id="option3" autocomplete="off" value="take away" >Take away
                                                </label>
                                                <label class="btn " style="padding-left:13px;padding-right:13px" ottype="delivery">
                                                    <input type="radio" name="otype" id="option2" autocomplete="off" value="delivery" >Delivery
                                                </label>
                                                <label class="btn" style="padding-left:13px;padding-right:13px" ottype="drive through">
                                                    <input type="radio" name="otype" id="option3" autocomplete="off" value="drive through" >Drive through
                                                </label>

                                            </div>
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 10px;margin-bottom:10px;">
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
                                                <div  style="clear: both;overflow-y: scroll;height: 300px;">
                                                    <table class="table table-responsive-*">
                                                        <tbody class="aTbody cart_product" >
                                                        </tbody>
                                                    </table>
                                                </div>  
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row"> 
                                                    <div class="card col-md-8" style="box-shadow: 0 6px 8px rgba(0,0,0,.1);padding:0px ">
                                                        <div class="card-body" style="padding: 10px 10px 10px 10px">

                                                            <div class="col-md-12">
                                                                <div class="row" style="background-color:#ccc" >
                                                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="padding:9px;color:black">
                                                                        <b> SubTotal</b> 
                                                                    </div> 
                                                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                        <input class="form-control-plaintext a text-center view subtoalclass in_pu_subtol" name="in_pu_subtol" value="0" readonly>    
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="row" style="background-color:#aaf">
                                                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="padding:9px;color:black">
                                                                        <b>Stole Discount</b> 
                                                                    </div> 
                                                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                        <input class="form-control-plaintext a text-center view in_pu_totdsc" name="in_pu_totdsc" value="" autocomplete="off" style="height:2.2rem;margin-top:3px;" readonly> 
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="background-color:#ccc">
                                                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="padding:9px;color:black">
                                                                        <b>CP Discount</b> 
                                                                    </div> 
                                                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="padding:9px;color:black">
                                                                        <div class="radio-theme-default custom-radio " style="float:left">
                                                                            <input class="radio" type="radio" name="cpdis" value="cpdfx" id="cpdfx">
                                                                            <label for="cpdfx" style="padding-left:21px">
                                                                                <span class="radio-text">FX</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="radio-theme-default custom-radio " style="float:left;padding-left:8px">
                                                                            <input class="radio" type="radio" name="cpdis" value="cpdpre" id="cpdpre" checked>
                                                                            <label for="cpdpre" style="padding-left:21px">
                                                                                <span class="radio-text">%</span>
                                                                            </label>
                                                                        </div>
                                                                        <!--<input type="radio" name="cpdistype" value="fixed" id="fxclass"> <span style="font-size:10px" for="fxclass">FX</span>-->
                                                                        <!--<input type="radio" name="cpdistype" value="present" id="preclass"> <span style="font-size:10px" for="preclass">%</span>-->
                                                                    </div> 
                                                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                        <input class="form-control-plaintext a text-center view in_pu_totcpdsc" name="in_pu_totcpdsc" value="" autocomplete="off" style="height:2.2rem;margin-top:3px;background-color:white" > 
                                                                        <input type="hidden" class="cpdiscountamount" name="cpdiscountamount" > 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 service">
                                                                <div class="row" style="background-color:#aaf">
                                                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="padding:9px;color:black">
                                                                        <b>Service Charge</b> 
                                                                    </div> 
                                                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="padding:9px;color:black">
                                                                        <div class="radio-theme-default custom-radio " style="float:left">
                                                                            <input class="radio" type="radio" name="scamt" value="scdfx" id="scdfx">
                                                                            <label for="scdfx" style="padding-left:21px">
                                                                                <span class="radio-text">FX</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="radio-theme-default custom-radio " style="float:left;padding-left:8px">
                                                                            <input class="radio" type="radio" name="scamt" value="scdpre" id="scdpre" checked>
                                                                            <label for="scdpre" style="padding-left:21px">
                                                                                <span class="radio-text">%</span>
                                                                            </label>
                                                                        </div>
                                                                        <!--<input type="radio" name="cpdistype" value="fixed" id="fxclass"> <span style="font-size:10px" for="fxclass">FX</span>-->
                                                                        <!--<input type="radio" name="cpdistype" value="present" id="preclass"> <span style="font-size:10px" for="preclass">%</span>-->
                                                                    </div> 
                                                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                        <input type="text" class="form-control-plaintext a text-center view  in_pu_servicecharge" name="in_pu_servicecharge" value="2" style="height:2.2rem;margin-top:3px;background-color:white"> 
                                                                        <input type="hidden" class="servicechargeamount" name="servicechargeamount" > 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 packaging" style="display:none">
                                                                <div class="row" style="background-color:#ccc">
                                                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="padding:9px;color:black">
                                                                        <b>Packaging Charge</b> 
                                                                    </div> 
                                                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                        <input class="form-control-plaintext a text-center view in_pu_packagingcharge" name="in_pu_packagingcharge" value="" style="height:2.2rem;margin-top:3px" readonly> 
                                                                        <input type="hidden" class="packingchargeamount" name="packingchargeamount" readonly>  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 delivery" style="display:none">
                                                                <div class="row" style="background-color:#aaf">
                                                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="padding:9px;color:black">
                                                                        <b>Delivery Charge</b> 
                                                                    </div> 
                                                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                        <input class="form-control-plaintext a text-center view  in_pu_deliverycharge" name="in_pu_deliverycharge" value="" style="height:2.2rem;margin-top:3px;background-color:white"> 
                                                                        <input type="hidden" class="deliverychargeamount" name="deliverychargeamount" > 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="row"style="background-color:#ccc">
                                                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"  style="padding:9px;color:black">
                                                                        <label style="color:#132645;font-weight: bold;font-size:20px;margin:0px">Total</label> 
                                                                    </div> 
                                                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                        <input class="form-control-plaintext a  text-center view totallable in_pu_gtot" name="in_pu_gtot" value="" readonly> 
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="row" style="background-color:#aaf">
                                                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="padding:9px;color:black">
                                                                        <b> Customer Paid</b> 
                                                                    </div> 
                                                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                        <input  class="form-control-plaintext text-center in_pu_recive" name="in_pu_recive" value="" autocomplete="off" style="height:2.2rem;margin-top:3px;background-color:white">    
                                                                        <span class="err err_in_pu_recive required" style="color:red;position:absolute;font-size:10px"></span>
                                                                    </div>  
                                                                </div>
                                                            </div>






                                                            <!--<div class="col-md-12">-->
                                                            <!--<div class="row" style="background-color:#aaf">-->
                                                            <!--    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="padding:9px;color:black">-->
                                                            <!--         <b>Other Charge </b> -->
                                                            <!--    </div> -->
                                                            <!--    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">-->
                                                            <!--        <input class="form-control-plaintext a text-center view  in_pu_othercharge" name="in_pu_othercharge" value="" readonly></input>-->
                                                            <!--    </div>-->
                                                            <!--</div>-->
                                                            <!--</div>-->

                                                            <!--<div class="col-md-12">-->
                                                            <!--<div class="row" style="background-color:#aaf">-->
                                                            <!--    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"  style="padding:9px;color:black">-->
                                                            <!--       <b> Paid Amount</b> -->
                                                            <!--    </div> -->
                                                            <!--    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">-->
                                                            <!--        <input class="form-control-plaintext a  text-center view  in_pu_gtot" name="in_pu_gtot" value="" readonly></input>   -->
                                                            <!--    </div> -->
                                                            <!--</div>-->
                                                            <!--</div>-->

                                                            <div class="col-md-12">
                                                                <div class="row" style="background-color:#aaf">
                                                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="padding:9px;color:black">
                                                                        <b> Balance </b> 
                                                                    </div> 
                                                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                        <input class="form-control-plaintext a  text-center view  in_pu_balance" name="in_pu_balance" value="" disabled></input>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="row">
                                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding:4px">
                                                                <button type="button"  class="btn order_btn"   style="background-color:#5F63F2;width:100%;height:50px;margin-top: 8px;outline: none;color: #fff; cursor: pointer; font-size:15px; line-height: 20px;" >Order</button>
                                                            </div>
                                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding:4px">
                                                                <button type="button"  class="btn order_print_btn"    style="background-color:#5F63F2;width:100%;height:50px;margin-top: 8px;outline: none;color: #fff; cursor: pointer; font-size:13px; line-height: 20px;" >Order & print</button>
                                                            </div>  
                                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding:4px">
                                                                <button type="button"  class="btn settlebtn"   style="background-color:#5F63F2;width:100%;height:30px;outline: none;color: #fff; cursor: pointer; font-size:15px;text-align: center;" >Settle</button>
                                                            </div>
                                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding:4px">
                                                                <button type="button"  class="btn btnval"   value="1000" style="background-color:#5F63F2;width:100%;height:30px;outline: none;color: #fff; cursor: pointer; font-size:15px;text-align: center;" >1000</button>
                                                            </div>
                                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding:4px">
                                                                <button type="button"  class="btn btnval"   value="3000" style="background-color:#5F63F2;width:100%;height:30px;outline: none;color: #fff; cursor: pointer; font-size:15px;text-align: center;">3000</button>
                                                            </div>
                                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding:4px">
                                                                <button type="button"  class="btn btnval"   value="5000" style="background-color:#5F63F2;width:100%;height:30px;outline: none;color: #fff; cursor: pointer; font-size:15px;text-align: center;" >5000</button>
                                                            </div>


                                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding:4px">
                                                                <button type="button"  class="btn billhold_btn" style="background-color:#5F63F2;width:100%;height:50px;outline: none;color: #fff; cursor: pointer; font-size:15px; line-height: 20px;" >Bill hold</button>
                                                            </div>

                                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding:4px">
                                                                <button type="button"  class="btn"   data-toggle="modal" data-target=".bd-example-modal-lg" style="background-color:#5F63F2;width:100%;height:50px;outline: none;color: #fff; cursor: pointer; font-size:15px;" >Recall</button>
                                                            </div> 
                                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding:4px">
                                                                <a href="<?php echo base_url() ?>index.php/pos">
                                                                    <button type="button"  class="btn" style="background-color:#5F63F2;width:100%;height:50px;outline: none;color: #fff; cursor: pointer; font-size:13px; line-height: 20px;" >New Bill</button></a>
                                                                <!--<button type="button"  class="btn" id=""   style="background-color:#5F63F2;border-radius: 10px;height:50px;margin-top: 10px;outline: none;color: #fff; cursor: pointer; font-size:15px;" ></button>-->
                                                            </div>
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:4px"> 
                                                                <a href="<?php echo base_url() ?>index.php/pos/cashier_open" >
                                                                    <button type="button"  class="btn btn-danger" style="width:100%;height:50px;outline: none;color: #fff; cursor: pointer; font-size:13px; line-height: 20px;" >Close Cashier</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="padding:0px">
                                            <div  style="height:100vh; overflow-y:scroll" style="padding:0px 20px 0px 10px">
                                                <!-- <div class="row"> -->
                                                <?php
                                                $this->db->select('*');
                                                $this->db->order_by('manufacturer_id', "ASC");
                                                $manufature_information = $this->Common_model->get_all('`manufacturer_information', ['status' => 1])->result();
                                                if ($manufature_information):
                                                    foreach ($manufature_information as $information):
                                                        ?>
                                                        <div class="manuDiv" id="<?= $information->id; ?>" style="margin-bottom:3px;width:100%;line-height: 20px;" >
                                                            <div class="product_card" style="background-color:#ccc"> 
                                                                <div class="" style="text-align:center;padding: 15px 0px;font-weight:600;color:black;font-size:15px"><?= $information->manufacturer_name ?></div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                                <!-- </div> -->
                                            </div>


                                        </div>

                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-right: 0px;" >
                                            <div class="productHolder">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 prodlist" style="height:100vh; overflow-y:scroll" >
                                                    <div class="row" >
                                                        <?php
                                                        $this->db->select('product_information.*,manufacturer_information.manufacturer_name as mname');
                                                        $this->db->join("manufacturer_information", "manufacturer_information.id=product_information.manufacturer_id", "right");
                                                        $this->db->order_by("product_information.product_name", "asc");
                                                        $product_information = $this->Common_model->get_all('product_information', ['product_information.status' => 1, 'manufacturer_information.shop_status' => 1])->result();
                                                        $DateTime = date('Y-m-d H:i:s');
                                                        if ($product_information):
                                                            foreach ($product_information as $information):
                                                                ?>
                                                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 productDiv" manu_price="<?= $information->manufacturer_price ?>" table_pkcharge="<?= $information->package_charge ?>" prod_name="<?= $information->product_name ?>" id="<?= $information->id; ?>" style="padding:3px">
                                                                    <?php
                                                                    $prod_count = $this->Common_model->get_all("product_purchase_details", ["product_id" => $information->id, "date(prod_date)" => date("Y-m-d"),])->result();
                                                                    $proqty = ($prod_count) ? $prod_count[0]->quantity : 0;
                                                                    ?>
                                                                    <div class="product_card" style="<?php echo ($proqty <= 1) ? "border-color:red" : NULL ?>" >
                                                                        <div class="product_name"><?= $information->product_name ?></div>
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-md-12" style="padding:0px">
                                                                                    <div class="product_strenth"><?= $information->strength ?><?= $information->measure ?></div>
                                                                                    <div class="product_price" >Price : <?= $information->manufacturer_price ?></div>
                                                                                    <div class="product_qty" >Qty :<?= ($prod_count) ? $prod_count[0]->quantity : 0 ?></div>
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
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 orderlist" style="height:0vh; overflow-y:scroll" >

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>


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
                        <table class="table ">
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
                                                <!--<a href='<?php //echo base_url();      ?>index.php/pos/edit?id=<?php //echo $information->id;      ?>' class="edit">-->
                                                <span class="far fa-edit recall_bill" bill_id="<?php echo $information->id; ?>"></span>
                                                <!--</a>                                              -->
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
                    <button type="button" class="close" >
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
</div>
</body>  
<!-- <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDduF2tLXicDEPDMAtC6-NLOekX0A5vlnY"></script> -->
<!-- inject:js-->
<script src="<?php echo base_url() ?>assets/js/script.min.js"></script>
<!-- endinject-->
<!-- alert -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/sweetalert.js" rel="stylesheet"></script>

<script type="text/javascript">

$(".recall_bill").click(function () {
    // alert();
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>index.php/pos/pos_ajax",
        data: {
            func_n: "get_bill_details",
            bill_id: $(this).attr("bill_id")
        },
        success: function (data) {
            //console.log(data)
            $(".aTbody").empty();
            $(".aTbody").append(data);
            //  $(".bd-example-modal-lg").modal('toggle'); 
            //alert($(".rccusname").val()); 
            $(".close").click();
            //$(".in_pu_cus").append("<option value='" + $(".rccusname").val() + "'>" + $(".rccusname").val()+"hello" + "</option>"); 
            //$(".in_pu_cus").val($(".rccusname").val());
            //$(".in_pu_cus").load(location.href + " .in_pu_cus");
            //$("#mydiv").load(location.href + " #mydiv");

            $("label[ottype='" + $(".rcotype").val() + "']").click();
            $(".in_pu_cus").val($(".rccusname").val());
            $(".select2-selection__rendered").val($(".in_pu_cus").text());


            if ($("input[name='otype']:checked").val() == "dine-in") {
                $(".cartrowitem>.pkchargecolumn").css("display", "none");
            } else {
                //alert();
                $(".cartrowitem>.pkchargecolumn").css("display", "table-cell");
            }
            get_total();

            // $(".err").html("");
            // if (data.status == false) {
            //     $(".err_in_pu_cus").html(data.in_pu_cus);
            //     $(".err_in_pu_branch").html(data.in_pu_branch);
            //     $(".err_in_pu_recive").html(data.accno);
            //     // notification_message("error","Error Occurred ! Please Check the fields.");
            //     $.each(data.errors, function (key, val) {
            //         $(".err_" + key.replace('[]', '')).html(val);
            //     });
            // } else {
            //     setTimeout(function () {
            //         window.open("<?php //echo base_url()      ?>index.php/pos/printbill?id=" + data.saleid, '_blank'); 
            //           window.location.reload();
            //         //window.location.href = "<?php //echo base_url()      ?>index.php/Pos/Printbill?id=" + data.saleid;
            //     });
            // }
        }
    });
});



$("input[name='otype']").change(function () {
    //alert($(this).is(':checked').val());

    if ($("input[name='otype']:checked").val() == "dine-in") {
        $(".in_pu_servicecharge").val("2");
        $(".service").css("display", "block");
        $(".delivery").css("display", "none");
        $(".packaging").css("display", "none");
        $(".cartrowitem>.pkchargecolumn").css("display", "none");
        get_total();
    } else if ($("input[name='otype']:checked").val() == "delivery") {
        $(".in_pu_servicecharge").val("");
        $(".service").css("display", "none");
        $(".delivery").css("display", "block");
        $(".packaging").css("display", "block");
        $(".cartrowitem>.pkchargecolumn").css("display", "table-cell");
        get_total();
    } else if ($("input[name='otype']:checked").val() == "drive through") {
        $(".in_pu_servicecharge").val("");
        $(".service").css("display", "none");
        $(".delivery").css("display", "block");
        $(".packaging").css("display", "block");
        $(".cartrowitem>.pkchargecolumn").css("display", "table-cell");
        get_total();
    } else if ($("input[name='otype']:checked").val() == "take away") {
        $(".in_pu_servicecharge").val("");
        $(".service").css("display", "none");
        $(".delivery").css("display", "block");
        $(".packaging").css("display", "block");
        $(".cartrowitem>.pkchargecolumn").css("display", "table-cell");
        get_total();
    }


})
$('input[name="cpdis"]').change(function () {
    get_total();
});

$('input[name="scamt"]').change(function () {
    get_total();
});
$('.in_pu_totcpdsc').keyup(function () {
    get_total();
});
$('.in_pu_servicecharge').keyup(function () {
    get_total();
});
$('.in_pu_deliverycharge').keyup(function () {
    get_total();
});
$('.in_pu_packagingcharge').keyup(function () {
    get_total();
});

$(document).ready(function () {
    $(document).keydown(function (event) {
        //event.preventDefault(); 
        if (event.keyCode == 113) { // F2
            event.preventDefault();
            // Remap F3 to some other key that the browser doesn't care about
            $('#tno').val("");
            $('#tno').focus();

        }
        if (event.keyCode == 114) { // F3
            event.preventDefault();
            // Remap F3 to some other key that the browser doesn't care about
            $('.searchProduct').val("");
            $('.searchProduct').focus();
        }
        if (event.keyCode == 117) { // F6
            event.preventDefault();
            // Remap F3 to some other key that the browser doesn't care about
            $('.in_pu_recive').val("");
            $('.in_pu_recive').focus();
        }
        if (event.keyCode == 116) { // F5
            event.preventDefault();
            return false;
        }
    });
});

//=========================================== Get Product to cart   
$("body").on('click', '.productDiv', function () {

    get_product($(this));
    get_total();
});

function  get_product(e) {
    var isthereitem = false;
    $(".cartrowitem").each(function () {
        if (($(this).find(".table_pid").val()) == (e.attr("id"))) {
            isthereitem = true;
            var extqty = $(this).closest('tr').find('.table_qty').val();
            var tprice = $(this).closest('tr').find('.table_pr').val();
            var hpkcharge = $(this).closest('tr').find('.hiddenpackagingcharge').val();
            // console.log(extqty);
            // console.log(tprice);
            // console.log(tpkcharge);
            var subtotal = 0;
            if (extqty != '') {
                $(this).closest('tr').find('.table_qty').val(parseInt(extqty) + 1).change();
                subtotal = ((parseInt(extqty) + 1) * tprice);
                $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
                $(this).closest('tr').find('.table_pkcharge').val(((parseInt(extqty) + 1) * hpkcharge).toFixed(2));
            } else {
                $(this).closest('tr').find('.table_qty').val(1).change();
                subtotal = (1) * tprice;
                $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
                $(this).closest('tr').find('.table_pkcharge').val(((parseInt(extqty) + 1) * hpkcharge).toFixed(2));
            }
            get_total();
        }
    })
    if (!isthereitem) {
        $(".aTbody").append("<tr class='cartrowitem'>" + $(".fTr").html() + "</tr>");
        $(".aTbody tr:last").find('.table_pid').val(e.attr("id"));
        $(".aTbody tr:last").find('.table_prdct').val(e.attr("prod_name"));
        $(".aTbody tr:last").find('.table_pr').val(e.attr("manu_price"));
        $(".aTbody tr:last").find('.hiddenpackagingcharge').val(e.attr("table_pkcharge"));
        $(".aTbody tr:last").find('.table_pkcharge').val(e.attr("table_pkcharge"));
        $(".aTbody tr:last").find('.table_rt').val(parseFloat(e.attr("manu_price"))); //+parseFloat(e.attr("table_pkcharge"))
    }

    if ($("input[name='otype']:checked").val() == "dine-in") {
        $(".cartrowitem>.pkchargecolumn").css("display", "none");
    } else {
        $(".cartrowitem>.pkchargecolumn").css("display", "table-cell");
    }

    // var func_n = "gt_product";
    // $.ajax({
    //     dataType:"json",
    //     type: "post",
    //     url: "<?php //echo base_url();           ?>index.php/Pos/pos_ajax",
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

//=========================================== Get Product to cart        


$("body").on('click', '.selectitem', function () {
    //  if($("input[name='otype']:checked").val()=="dine-in"){
    //      $(".cartrowitem>.pkchargecolumn").css("display","none");
    // }else{
    //      $(".cartrowitem>.pkchargecolumn").css("display","table-cell");
    // }

    $('#modalpopup').modal("hide");
    if (duplicate_product($(this))) {

    } else {
        $(".aTbody").append("<tr class='cartrowitem'>" + $(".fTr").html() + "</tr>");
        $(".aTbody tr:last").find('.table_pid').val($(this).attr("itemid"));
        $(".aTbody tr:last").find('.table_prdct').val($(this).attr("item_name"));
        $(".aTbody tr:last").find('.table_pr').val($(this).attr("item_price"));
        $(".aTbody tr:last").find('.table_rt').val($(this).attr("item_price"));
        $(".aTbody tr:last").find('.hiddenpackagingcharge').val($(this).attr("table_pkcharge"));
        $(".aTbody tr:last").find('.table_pkcharge').val($(this).attr("table_pkcharge"));
        $(".aTbody tr:last").find('.table_dscnt').val($(this).attr("item_dis"));
        $(".aTbody tr:last").find('.table_btchid').val($(this).attr("item_batchid"));
    }
    get_total();
})

function duplicate_product(e) {
    //  if($("input[name='otype']:checked").val()=="dine-in"){
    //      $(".cartrowitem>.pkchargecolumn").css("display","none");
    // }else{
    //      $(".cartrowitem>.pkchargecolumn").css("display","table-cell");
    // }
    var selecteditem = e;
    var isthereitem = false;
    $(".cartrowitem").each(function () {
        if (($(this).find(".table_pid").val()) == (e.attr('itemid')) && ($(this).find(".table_pr").val()) == (e.attr('item_price'))) {
            isthereitem = true;
            var extqty = $(this).closest('tr').find('.table_qty').val();
            var tprice = $(this).closest('tr').find('.table_pr').val();
            //var tpkcharge = $(this).closest('tr').find('.table_pkcharge').val(); 
            var subtotal = 0;
            if (extqty != '') {
                $(this).closest('tr').find('.table_qty').val(parseInt(extqty) + 1).change();
                subtotal = (parseInt(extqty) + 1) * tprice;
                $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
            } else {
                $(this).closest('tr').find('.table_qty').val(1).change();
                subtotal = (1) * tprice;
                $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
            }
            get_total();
        }

    })
    return isthereitem;
}


$("body").on('click', '.pluse', function (e) {
    var qty = $(this).parent().parent().find('.table_qty').val();
    $(this).parent().parent().find('.table_qty').val(parseInt(qty) + 1);
    var pprice = $(this).closest('tr').find('.table_pr').val();
    var hpkcharge = $(this).closest('tr').find('.hiddenpackagingcharge').val();
    var subtotal = 0;
    subtotal = (parseInt(qty) + 1) * parseFloat(pprice);
    $(this).closest('tr').find('.table_pkcharge').val(((parseInt(qty) + 1) * hpkcharge).toFixed(2));
    $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
    get_total();
});

$("body").on('click', '.minus', function () {
    var qty = $(this).parent().parent().find('.table_qty').val();
    var hpkcharge = $(this).closest('tr').find('.hiddenpackagingcharge').val();
    if (qty >= 2) {
        $(this).parent().parent().find('.table_qty').val(parseInt(qty) - 1);
        var pprice = $(this).closest('tr').find('.table_pr').val();
        var subtotal = 0;
        subtotal = (parseInt(qty) - 1) * parseFloat(pprice);
        $(this).closest('tr').find('.table_pkcharge').val(((parseInt(qty) - 1) * hpkcharge).toFixed(2));
        $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
    }
    get_total();
});


//===================================== Order Placement

$(".order_print_btn").click(function (e) {
    $(".order_btn").attr("disabled", true);
    $(".order_print_btn").attr("disabled", true);
    var iscart = false;
    $(".cartrowitem").each(function () {
        iscart = true;
    })
    if (iscart) {

        e.preventDefault();
        $form = $("#inForm");
        add_form($form);
        function add_form($form) {
            var formdata = new FormData($form[0]);
            formdata.append("func_n", "ad_inv");
            $.ajax({
                type: "post",
                dataType: "JSON",
                url: "<?php echo base_url(); ?>index.php/pos/pos_ajax",
                data: formdata,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data.saleid);
                    $(".err").html("");
                    if (data.status == false) {
                        $(".err_in_pu_cus").html(data.in_pu_cus);
                        $(".err_in_pu_branch").html(data.in_pu_branch);
                        $(".err_in_pu_recive").html(data.accno);
                        // notification_message("error","Error Occurred ! Please Check the fields.");
                        $.each(data.errors, function (key, val) {
                            $(".err_" + key.replace('[]', '')).html(val);
                        });
                        $(".order_btn").attr("disabled", false);
                        $(".order_print_btn").attr("disabled", false);
                    } else {
                        setTimeout(function () {
                            window.open("<?php echo base_url() ?>index.php/pos/printbill?id=" + data.saleid, '_blank');
                            window.location.reload();
                            //window.location.href = "<?php //echo base_url()      ?>index.php/Pos/Printbill?id=" + data.saleid;
                        });
                    }
                }
            });
        }
    }

}); //End save btn click

$(".order_btn").click(function (e) {
    $(".order_btn").attr("disabled", true);
    $(".order_print_btn").attr("disabled", true);
    var iscart = false;
    $(".cartrowitem").each(function () {
        iscart = true;
    })
    if (iscart) {

        e.preventDefault();
        $form = $("#inForm");
        add_form($form);
        function add_form($form) {
            var formdata = new FormData($form[0]);
            formdata.append("func_n", "ad_inv");
            $.ajax({
                type: "post",
                dataType: "JSON",
                url: "<?php echo base_url(); ?>index.php/pos/pos_ajax",
                data: formdata,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data.saleid)
                    $(".err").html("");
                    if (data.status == false) {
                        $(".err_in_pu_cus").html(data.in_pu_cus);
                        $(".err_in_pu_branch").html(data.in_pu_branch);
                        $(".err_in_pu_recive").html(data.accno);
                        // notification_message("error","Error Occurred ! Please Check the fields.");
                        $.each(data.errors, function (key, val) {
                            $(".err_" + key.replace('[]', '')).html(val);
                        });
                        $(".order_btn").attr("disabled", false);
                        $(".order_print_btn").attr("disabled", false);
                    } else {
                        setTimeout(function () {
                            window.location.reload();
                        });
                    }
                }
            });
        }
    }

}); //End save btn click


//===================================== Order Placement








$('.example').DataTable();









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




$("body").on('click', '.btnval', function () {
    var btnval = parseFloat($(this).val());
    $('.in_pu_recive').val(btnval.toFixed(2));
    get_balance($(this));
})

// $("body").on('click', '.in_pu_totdsc', function () {
//     var btnval = parseFloat($(this).val());
//     $('.in_pu_recive').val(btnval.toFixed(2));
//     get_balance($(this));
// })
$("body").on('click', '.settlebtn', function () {
    var total = parseFloat($('.in_pu_gtot').val());
    if (!isNaN(total)) {
        $('.in_pu_recive').val(total.toFixed(2));
        get_balance($(this));
    }
})


$("body").on('keyup', '.table_pr', function () {
    var tprice = $(this).closest('tr').find('.table_pr').val();
    var tqty = $(this).closest('tr').find('.table_qty').val();
    var subtotal = 0;
    subtotal = (parseInt(tqty)) * tprice
    $(this).closest('tr').find('.table_rt').val(subtotal.toFixed(2));
    get_total();
});

$("body").on('click', '.delete_butt', function () {
    swal({
        title: "Delete Product?",
        text: "Are you sure you want to delete product now !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
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
    if (reamount >= total) {
        var balance = reamount - total;
        $('.in_pu_balance').val(balance.toFixed(2));
    } else {
        $('.in_pu_balance').val("");
    }
});


$("body").on('keyup', '.searchProduct', function () {
    if ($(this).val().length >= 2) {
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>index.php/pos/pos_ajax",
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
        url: "<?php echo base_url(); ?>index.php/pos/pos_ajax",
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
        url: "<?php echo base_url(); ?>index.php/pos/pos_ajax",
        data: {
            func_n: "get_barcode_product",
            srchTrm: $(this).val(),
        },
        success: function (data) {
            $(".barcodesearch").val("");
            if (data.product_status == 0) {
                // $(".aTbody").append("<tr>" + $(".fTr").html() + "</tr>");
                // $(".aTbody tr:last").find('.table_prdct').val(data.product_name);
                // $(".aTbody tr:last").find('.table_rt').val(data.product_price);
            } else {
                $('.modalbodytable').empty();
                for (let x = 0; x < data.product_arr.length; x++) {
                    if (data.product_arr.length > 1) {
                        if ($('.in_pu_sup :selected').attr("custype") == 1) {
                            var row_item = "<tr><td>" + data.product_arr[x].product_name + "</td><td>" +
                                    data.product_arr[x].manufacturer_price + "</td><td><button class='btn btn-default selectitem' itemid='" +
                                    data.product_arr[x].prod_id + "' item_price='" + data.product_arr[x].manufacturer_price + "' item_name='" +
                                    data.product_arr[x].product_name + "' item_dis='" + data.product_arr[x].discount + "' item_batchid='" + data.product_arr[x].batch_id + "' >SELECT</button></td></tr>"

                        } else {
                            var row_item = "<tr><td>" + data.product_arr[x].product_name + "</td><td>" +
                                    data.product_arr[x].manufacturer_price + "</td><td><button class='btn btn-default selectitem' itemid='" +
                                    data.product_arr[x].prod_id + "' item_price='" + data.product_arr[x].manufacturer_price + "' item_name='" +
                                    data.product_arr[x].product_name + "' item_dis='" + data.product_arr[x].discount + "' item_batchid='" + data.product_arr[x].batch_id + "' >SELECT</button></td></tr>"

                        }
                        $('.modalbodytable').append(row_item);
                        $('#modalpopup').modal("show");
                    } else {
                        var isthereitem = false;
                        $(".cartrowitem").each(function () {
                            if (($(this).find(".table_pid").val()) == (data.product_arr[x].prod_id)) {
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
                            $(".aTbody").append("<tr>" + $(".fTr").html() + "</tr>");
                            $(".aTbody tr:last").find('.table_pid').val(data.product_arr[x].prod_id);
                            $(".aTbody tr:last").find('.table_prdct').val(data.product_arr[x].product_name);
                            $(".aTbody tr:last").find('.table_pr').val(data.product_arr[x].manufacturer_price);
                            $(".aTbody tr:last").find('.table_rt').val(data.product_arr[x].manufacturer_price);
                            $(".aTbody tr:last").find('.hiddenpackagingcharge').val(data.product_arr[x].package_charge);
                            $(".aTbody tr:last").find('.table_pkcharge').val(data.product_arr[x].package_charge);
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





$(".billhold_btn").click(function (e) {

    var iscart = false;
    $(".cartrowitem").each(function () {
        iscart = true;
    })
    if (iscart) {

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
                    if (data.status == false) {
                        $(".err_in_pu_cus").html(data.in_pu_cus);
                        $(".err_in_pu_branch").html(data.in_pu_branch);
                        $(".err_in_pu_recive").html(data.accno);
                        // notification_message("error","Error Occurred ! Please Check the fields.");
                        $.each(data.errors, function (key, val) {
                            $(".err_" + key.replace('[]', '')).html(val);
                        });
                    } else {
                        setTimeout(function () {
                            window.location.reload();
                        });
                    }
                }
            });
        }
    }
}); //End save btn click



//===================================== Customer Functions
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

$("body").on("click", ".close", function () {
    $(".addcustomerModal").modal('hide');
});

//===================================== Customer Functions


function get_total() {
    var tlinetotal = 0.0;
    var tlinedis = 0.0;
    var tlinepkcharges = 0.0;
    var ftotal = 0.0;
    var CPdiscount = ($('.in_pu_totcpdsc').val() != "") ? $('.in_pu_totcpdsc').val() : 0.00;
    var serviceCharge = ($('.in_pu_servicecharge').val() != "") ? $('.in_pu_servicecharge').val() : 0.00;


    $(".cart_product tr").each(function () {
        var price = parseFloat($(this).find('.table_rt').val());
        var pkcharges = parseFloat($(this).find('.table_pkcharge').val());
        var discount = parseFloat(($(this).find('.table_dscnt').val()) ? $(this).find('.table_dscnt').val() : 0);
        tlinetotal += price;
        tlinedis += discount;
        tlinepkcharges += pkcharges;
    })
    $('.in_pu_subtol').val(tlinetotal.toFixed(2));
    $('.in_pu_totdsc').val(tlinedis.toFixed(2));

//========== Packaging charge            
    if ($("input[name='otype']:checked").val() != "dine-in") {
        $('.in_pu_packagingcharge').val(tlinepkcharges.toFixed(2));
    } else {
        $('.in_pu_packagingcharge').val(0);
    }


//========== Service charge                   
    if ($('input[name="scamt"]:checked').val() == "scdpre") {
        serviceCharge = parseFloat(tlinetotal) * (parseFloat(serviceCharge)) / 100;
        $(".servicechargeamount").val(serviceCharge);
    } else {
        $(".servicechargeamount").val(serviceCharge);
    }

//========== CP Discount charge              
    if ($('input[name="cpdis"]:checked').val() == "cpdpre") {
        CPdiscount = parseFloat(tlinetotal) * (CPdiscount) / 100;
        $(".cpdiscountamount").val(CPdiscount);
    } else {
        $(".cpdiscountamount").val(CPdiscount);
    }


    var deliveryCharge = ($('.in_pu_deliverycharge').val() != "") ? $('.in_pu_deliverycharge').val() : 0.00;
    var packagingCharge = ($('.in_pu_packagingcharge').val() != "") ? $('.in_pu_packagingcharge').val() : 0.00;

    ftotal = (parseFloat(tlinetotal) - (parseFloat(tlinedis) + parseFloat(CPdiscount))) + (parseFloat(serviceCharge) + parseFloat(packagingCharge) + parseFloat(deliveryCharge));
    $('.in_pu_gtot').val(parseFloat(ftotal).toFixed(2));
    if ($(".in_pu_pytp ").val() == "bank") {
        $(".in_pu_recive ").val(ftotal);
    }
    get_balance();
}

function get_balance() {
    var reamount = parseFloat($('.in_pu_recive').val());
    var total = parseFloat($('.in_pu_gtot').val());
    //var maindiscount = parseFloat($('.in_pu_totdsc').val());
    if (reamount >= total) {
        var balance = reamount - total;
        $('.in_pu_balance').val(balance.toFixed(2));
    } else {
        $('.in_pu_balance').val("");
    }
}



setInterval(function () {
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>index.php/Pos/pos_ajax",
        data: {
            "func_n": "get_neworders"
        },
        success: function (data) {
            if (data) {
                // alert();
                $(".prodlist").css("height", "50vh");
                $(".orderlist").css("height", "50vh");
                $(".orderlist").empty();
                $(".orderlist").append(data);
            } else {
                $(".prodlist").css("height", "100vh");
                $(".orderlist").css("height", "0vh");
            }
            // var diff=4563433213654535665;
            //   var rodid=0;
            //   var rot=true;
            //   var rclr='#cccccc !important';
            //     $("tbody tr").each(function(){ 
            //         if(rot){
            //             rodid=$(this).find('td:nth-child(1)').html();
            //             rot=false;
            //         }
            //         if(rodid == $(this).find('td:nth-child(1)').html()){
            //             $(this).css("background-color",rclr);
            //         }else{
            //             if(rclr=='#cccccc !important'){rclr="#d3d3d3 !important";}else{rclr='#cccccc !important';}
            //             $(this).css("background-color",rclr); 
            //         }
            //         rodid=$(this).find('td:nth-child(1)').html();
            //         if($(this).find('td:nth-child(8)').html()!=null){
            //             var d = new Date();
            //             var tme=Date.parse($(this).find('td:nth-child(8)').html().replace(" ", "T"));
            //             diff= d.getTime()-tme;
            //             $(".t1").html(d.getTime()); 
            //   	        $(".t2").html(tme); 
            //   	        $(".t3").html(diff);
            //         } 
            //     });   
            //     if(parseInt(diff)<30000){  
            //  //alert();
            //       var x = document.getElementById("myAudio");
            //         x.play();
            //     } 
        }
    });
}, 15000);

function product(e) {
    swal({
        text: "Are you sure you want to delivered product!",
        icon: "info",
        buttons: true,
    })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url(); ?>index.php/stoleitem/stole_item_ajax",
                        data: {
                            func_n: "get_stole_order",
                            id: e
                        },
                        success: function (data) {
                            $.ajax({
                                type: "post",
                                url: "<?php echo base_url(); ?>index.php/Pos/pos_ajax",
                                data: {
                                    "func_n": "get_neworders"
                                },
                                success: function (data) {
                                    if (data) {
                                        $(".prodlist").css("height", "50vh");
                                        $(".orderlist").css("height", "50vh");
                                        $(".orderlist").empty();
                                        $(".orderlist").append(data);

                                    } else {
                                        $(".prodlist").css("height", "100vh");
                                        $(".orderlist").css("height", "0vh");
                                    }
                                }
                            });
                        }

                    });
                }

            });

}

$(document).ready(function() {
      var selectedRowIndex = -1;
      var tableRows = $("#myTable tr");
        
      $(document).keydown(function(event) {
        if (event.which === 38) { // 38 is the key code for the up arrow key
          if (selectedRowIndex > 0) {
            tableRows.eq(selectedRowIndex).removeClass("highlighted");
            selectedRowIndex--;
            tableRows.eq(selectedRowIndex).addClass("highlighted");
          }
        } else if (event.which === 40) { // 40 is the key code for the down arrow key
          if (selectedRowIndex < tableRows.length - 1) {
            if (selectedRowIndex !== -1) {
              tableRows.eq(selectedRowIndex).removeClass("highlighted");
            }
            selectedRowIndex++;
            tableRows.eq(selectedRowIndex).addClass("highlighted");
          }
        }
      });
        
      // Clear highlight when key is released
      $(document).keyup(function(event) {
        if (event.which === 38 || event.which === 40) {
         // tableRows.removeClass("highlighted");
        }
      });
    });

</script>
</html>  