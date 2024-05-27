 <div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">  GL Account View</h4>
                </div>
            </div>
        </div>
         
          <div class="row" >
         
         <?php echo form_open_multipart('', ' id="add_form"'); ?>
        <!-- general form elements disabled -->
        
        
        <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-12 left">Branch </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <?php  
                            $this->db->select('id,branch_number,branch_name');
                            if ($ressalt = $this->Common_model->get_all('branch')->result()):
                                foreach ($ressalt as $res):
                                    $list[$res->id] = $res->branch_number . " " . $res->branch_name;
                                endforeach;
                            else:
                                $list[] = null;
                            endif;
                            ?>
                            <?= form_dropdown('branch', $list, (isset($_POST['search'])) ? $_POST['branch'] : NULL, array('class' => 'branch form-control select2')); ?>
                            <span class="error error_branch" style="font-size: 12px;color:red;position:absolute;"></span>
                        </div>
                        
                        
                        
                        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-12 left" style=" padding: 0;">Account </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <?php
                            $list[''] = 'Select Account';
                            $this->db->select('id,acc_code,account_name,acc_categry');
                            $reslt = $this->Common_model->get_all('acc_name')->result();
                            ?>
                            <select name="accountname" class="accountname form-control select2">
                                <option selected value="">Select Account</option>
                                <?php foreach ($reslt as $res): ?>
                                    <option value="<?= $res->id ?>" data-cat="<?= $res->acc_categry ?>" <?php echo (isset($_POST['search'])) ? ($_POST['accountname'] == $res->id) ? "selected" : NULL : NULL; ?>><?= $res->acc_code . " " . $res->account_name ?></option>
                                <?php endforeach; ?>
                            </select>

                            <span class="error error_accountname" style="font-size: 12px;color:red;position:absolute;"></span>
                        </div> 
                        
                        
                        
                         <div class="col-lg-1 col-md-1 col-sm-3 col-xs-12 left" style=" padding: 0;">Category </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <?php
                            $this->db->select('id,acc_code,account_name,acc_categry');
                            $reslt = $this->Common_model->get_all('acc_name')->result();
                            ?>
                            <select name="accountcat" class="accountcat form-control select2">
                                <option selected value="">Select Account Category</option>
                                <?php
                                $this->db->select('id,change');
                                $catgry = $this->Common_model->get_all('acc_category')->result();
                                foreach ($catgry as $cat):
                                    ?>
                                    <option value="<?= $cat->id ?>"  ><?= $cat->change ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="error error_accountcat" style="font-size: 12px;color:red;position:absolute;"></span>
                        </div>
                        
        </div>
         
                    <div class="row">
                        <label class="col-lg-2 col-md-2 col-sm-3 col-xs-12 left"> Transaction Date<span style="float:right;">:</span></label>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                            <input type="date" placeholder="Transaction Date" class="form-control fromdate" name="fromdate" value="<?= ($this->input->post("fromdate") != NULL ? $this->input->post("fromdate") : date("Y-m-d") ) ?>">
                            <span class="error error_branchcode" style="font-size: 12px;color:red;position:absolute;"></span>
                        </div>

                        <label class="col-lg-1 col-md-1 col-sm-3 col-xs-12 left">To<span style="float:right;">:</span></label>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <input type="date" placeholder="To" class="form-control todate" name="todate" value="<?= ($this->input->post("todate") != NULL) ? $this->input->post("todate") : date("Y-m-d") ?>">
                            <span class="error error_branch" style="font-size: 12px;color:red;position:absolute;"></span>
                        </div>


                        <label style="margin-top: 6px;" class=" hide col-lg-2 col-md-2 col-sm-2 col-xs-12 right"> <?= form_checkbox('check', '', '', array("class" => "flat-red")) ?> Without Retained</label>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" style="float:right;">
                            <button type="submit" style="background-color:#f8bc2e;border-color:#E5A817;" id="search" name="search" value="search" class="btn btn-block btn-primary btn-flat">Search</button>
                        </div>
                    </div><!-- end form group --> 
        
        <div class="row">
            
             <?php
                if (isset($_POST['search'])):
                    $catdetails = $this->db->query("SELECT increase,decrease,account_name FROM acc_name LEFT JOIN acc_category ON acc_category.id=acc_name.acc_categry WHERE acc_name.id='" . $this->input->post("accountname") . "'")->result();
                    $drdetails = [];
                    $crdetails = [];
                    $parabranch = "";
                    if (!empty($this->input->post("branch"))) :
                        if ($this->input->post("branch") == "all"):
                            $parabranch = "";
                        elseif ($this->input->post("branch") != NULL):
                            $parabranch = 'branch_id=' . $this->input->post("branch") . " AND ";
                        else:
                            $parabranch = "";
                        endif;
                    else:
                        $parabranch = "";
                    endif;
                    if ($catdetails):

 
$drdetails = $this->db->query("select sum(tamt) as drsum FROM (SELECT acc_date,total_amount as tamt,dr,cr,transaction_no FROM sales_order WHERE dr='" . $this->input->post("accountname") . "' AND acc_date <'" . date('Y-m-d H:i:s',strtotime($this->input->post("fromdate"))). "' UNION  ALL "
                                        . "SELECT acc_date,amount as tamt,dr,cr,transaction_no  FROM sales_order_payment WHERE dr='" . $this->input->post("accountname") . "' AND acc_date <'" . date('Y-m-d H:i:s',strtotime($this->input->post("fromdate"))). "') drtable ORDER BY acc_date ASC")->result();

// $drdetails = $this->db->query("select sum(amount) as drsum FROM (SELECT date,amount,dr,cr,branch,transaction_no,remark FROM general_journal_accounting WHERE " . $parabranch . " dr='" . $this->input->post("accountname") . "' AND date <'" . date('Y-m-d H:i:s',strtotime($this->input->post("fromdate"))). "' UNION  ALL "
//                                         . "SELECT date,amount,dr,cr,branch,transaction_no,remark FROM general_journal_investment WHERE " . $parabranch . " dr='" . $this->input->post("accountname") . "' AND date <'" .date('Y-m-d H:i:s',strtotime($this->input->post("fromdate"))) . "' UNION  ALL "
//                                         . "SELECT date,amount,dr,cr,branch,transaction_no,remark  FROM general_journal_loan WHERE " . $parabranch . " dr='" . $this->input->post("accountname") . "' AND date <'" . date('Y-m-d H:i:s',strtotime($this->input->post("fromdate"))). "') drtable LEFT JOIN branch ON branch.id=drtable.branch  ORDER BY date ASC")->result();

 
 $crdetails = $this->db->query("select sum(tamt) as crsum FROM (SELECT acc_date,total_amount as tamt,dr,cr,transaction_no FROM sales_order WHERE cr='" . $this->input->post("accountname") . "' AND acc_date <'" . date('Y-m-d H:i:s',strtotime($this->input->post("fromdate"))). "' UNION  ALL "
                                        . "SELECT acc_date,amount as tamt,dr,cr,transaction_no  FROM sales_order_payment WHERE cr='" . $this->input->post("accountname") . "' AND acc_date <'" . date('Y-m-d H:i:s',strtotime($this->input->post("fromdate"))). "') drtable   ORDER BY acc_date ASC")->result();


//  $crdetails = $this->db->query("select sum(amount) as crsum FROM (SELECT date,amount,dr,cr,branch,transaction_no,remark FROM general_journal_accounting WHERE " . $parabranch . " cr='" . $this->input->post("accountname") . "' AND date <'" . date('Y-m-d H:i:s',strtotime($this->input->post("fromdate"))). "' UNION ALL "
//                                         . "SELECT date,amount,dr,cr,branch,transaction_no,remark FROM general_journal_investment WHERE " . $parabranch . " cr='" . $this->input->post("accountname") . "' AND date <'" .date('Y-m-d H:i:s',strtotime($this->input->post("fromdate"))). "' UNION ALL "
//                                         . "SELECT date,amount,dr,cr,branch,transaction_no,remark  FROM general_journal_loan WHERE " . $parabranch . " cr='" . $this->input->post("accountname") . "' AND date <'" . date('Y-m-d H:i:s',strtotime($this->input->post("fromdate"))). "') drtable LEFT JOIN branch ON branch.id=drtable.branch  ORDER BY date ASC")->result();



var_dump($drdetails);
var_dump($crdetails);

                        $totsum = 0;
                        $predr=0;
                        $precr=0;
                        $predr=($drdetails[0]->drsum==NULL)?0:$drdetails[0]->drsum;
                        $precr=($crdetails[0]->crsum==NULL)?0:$crdetails[0]->crsum;
                          
                        if ($catdetails[0]->increase == "dr"):
                            $totsum = $predr - $precr;  //final corrected
                        else:
                            $totsum = $precr-$predr;
                        endif;
                    endif;

                          $allledgers = $this->db->query("select date,amount,dr,cr,branch,branch.branch_name,transaction_no,remark FROM (SELECT date,SUM(amount) as amount,dr,cr,branch,transaction_no,remark FROM general_journal_accounting WHERE " . $parabranch . "   `date` >='" . $this->input->post("fromdate") . "' AND `date` <'" . date('Y-m-d',strtotime($this->input->post("todate") . "+1 days")) . "' AND (dr='" . $this->input->post("accountname") . "' OR cr='" . $this->input->post("accountname") . "')  GROUP BY `tbl_type`, `tbl_id`  UNION ALL SELECT date,SUM(amount) as amount,dr,cr,branch,transaction_no,remark FROM general_journal_investment WHERE " . $parabranch . "   `date` >='" . $this->input->post("fromdate") . "' AND `date` <'" . date('Y-m-d',strtotime($this->input->post("todate") . "+1 days")) . "' AND (dr='" . $this->input->post("accountname") . "' OR cr='" . $this->input->post("accountname") . "')  GROUP BY `tbl_type`, `tbl_id` UNION ALL SELECT date,SUM(amount) as amount,dr,cr,branch,transaction_no,remark  FROM general_journal_loan WHERE " . $parabranch . "   `date` >='" . $this->input->post("fromdate") . "' AND `date` <'" .date('Y-m-d',strtotime($this->input->post("todate") . "+1 days")) ."' AND (dr='" . $this->input->post("accountname") . "' OR cr='" . $this->input->post("accountname") . "' )  GROUP BY `tbl_type`,`tbl_id`) drtable LEFT JOIN branch ON branch.id=drtable.branch  ORDER BY date ASC")->result();
              
                endif;
                ?> 

                
                    <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <div style="padding-right: 11px;" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 left"> Openning Balance </div>
                        <div class="col-lg-6 col-md-6 col-sm-3 col-xs-12">
                            <input type="text" disabled placeholder="Openning Balance" class="form-control opbalance" name="opbalance" value="<?php echo (isset($_POST['search'])) ? $totsum : NULL; ?>">
                            <span class="error error_opbalance" style="font-size: 12px;color:red;position:absolute;"></span>
                        </div>
                        <div style="padding-right: 3px;padding-left: 0px;" class="hide col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <input type="text" placeholder="" class="form-control" name="contractno" value="">
                            <span class="error error_branch" style="font-size: 12px;color:red;position:absolute;"></span>
                        </div>
                    </div><!-- end form group -->
                 
                
                
        
        </div>
        
        
        
        
        <div class="box box-warning">
            <div class="box-header">

            </div><!-- /.box-header -->
            <div class="box-body" style="overflow-y: scroll"> 
               

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <br>
                        <table id="dTable" class="display " style="width:100%" >
                            <thead>
                                <tr style="background-color:rgba(103, 0, 239, 0.24);">
                                    <th  class="text-center" style="width:15% !important;padding: 10px 1px 12px 1px !important;text-align: center !important;">Date</th>
                                    <th  class="text-center" style="width:5%  !important;padding: 10px 1px 12px 1px !important;text-align: center !important;">Branch</th>
                                    <th  class="text-center" style="width:20% !important;padding: 10px 1px 12px 1px !important;text-align: center !important;">Account</th>
                                    <th  class="text-center" style="width:15% !important;padding: 10px 1px 12px 1px !important;text-align: center !important;">Transaction No</th>
                                    <th  class="text-center" style="width:25% !important;padding: 10px 1px 12px 1px !important;text-align: center !important;">Description</th>
                                    <th  class="text-center" style="width:5%  !important;padding: 10px 1px 12px 1px !important;">Debit</th>
                                    <th  class="text-center" style="width:5%  !important;padding: 10px 1px 12px 1px !important;">Credit</th>
                                    <th  class="text-center" style="width:15% !important;padding: 10px 1px 12px 1px !important;">Running Balance</th>
                                </tr>
                            </thead>
                            <tbody id="t_tbodys">
                                <?php
                                $runningbal=0;
                                $totdr=0;
                                $totcr=0; 
                                
                                if (isset($_POST['search'])) :
                              //  if($this->input->post('accountname') != '209' && $this->input->post('accountname') != '212' && $this->input->post('accountname') != '211' && $this->input->post('accountname') != '210'):

                                $runningbal = $totsum;
                                    $lineamtdr = 0;
                                    $lineamtcr = 0;
                                   // var_dump($runningbal);
                                    foreach ($allledgers as $allledger):
                                    //  var_dump($allledger); 

                                     ?>
                                        <tr>
                                            <td  class="text-center" style="width:15% !important;padding: 10px 1px 12px 1px !important;text-align: center !important;"><?php echo date("Y-m-d", strtotime($allledger->date)) ; ?></td>
                                            <td  class="text-center" style="width:5% !important;padding: 10px 1px 12px 1px !important;text-align: center !important;"><?php echo $allledger->branch_name ?></td>
                                            <td  class="text-center" style="width:20% !important;padding: 10px 1px 12px 1px !important;text-align: center !important;"><?php echo $catdetails[0]->account_name ?></td>
                                            <td  class="text-center" style="width:15% !important;padding: 10px 1px 12px 1px !important;text-align: center !important;"><?php echo $allledger->transaction_no ?></td>
                                            <td  class="text-center" style="width:25% !important;padding: 10px 1px 12px 1px !important;text-align: left !important;"><?php echo $allledger->remark ?></td>
                                            <td  class="text-center" style="width:5% !important;padding: 10px 1px 12px 1px !important;"><?php
                                               //       var_dump($runningbal);
                                                if ($allledger->dr == $_POST['accountname']) {
                                                    echo number_format(str_replace(' ', '', $allledger->amount),2,".",",");
                                                    $lineamtdr = str_replace(' ', '', $allledger->amount);
                                                    $totdr+= str_replace(' ', '', $allledger->amount);
                                                } else {
                                                    echo "0.00";
                                                    $lineamtdr = 0;
                                                }
                                                 ?></td>
                                            <td  class="text-center" style="width:5% !important;padding: 10px 1px 12px 1px !important;"><?php
                                                if ($allledger->cr == $_POST['accountname']) {
                                                    echo number_format(str_replace(' ', '', $allledger->amount),2,".",",");
                                                    $lineamtcr =str_replace(' ', '', $allledger->amount);
                                                    $totcr+= str_replace(' ', '', $allledger->amount);
                                                } else {
                                                    echo "0.00";
                                                    $lineamtcr = 0;
                                                }
                                                 ?></td>
                                            <td  class="text-center" style="width:15% !important;padding: 10px 1px 12px 1px !important;">
                                                <?php
                                                if ($catdetails[0]->increase == "dr"):
                                                    $runningbal = $runningbal + $lineamtdr;
                                                    $runningbal = $runningbal - $lineamtcr;
                                                    // var_dump($lineamtdr);
                                                    // var_dump($lineamtcr);
                                                    // var_dump($runningbal);                           
                                                else:
                                                    $runningbal = $runningbal + $lineamtcr;
                                                    $runningbal = $runningbal - $lineamtdr;
                                                endif;
                                                 echo  number_format($runningbal,2,".",",");;
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    endforeach;
                                        else://else if account names
                                        ?>
                                    <!--<script type="text/javascript">-->
                                    <!--    $(document).ready(function(){-->
                                    <!--        $(".loading").show();-->
                                    <!--    });-->
                                    <!--</script>-->
                                <?php
                              //  endif;//end if account name
                                endif;
                                ?>

                            </tbody> 
                            <tfoot>
                                <tr>
                                <th rowspan="1" colspan="5" style="background-color: #d6d6d685;" >Total </th>
                                <th rowspan="1" colspan="1" style="background-color: #d6d6d685;" class="totdramount" ><?php echo number_format($totdr,2,".",",")?></th>
                                <th rowspan="1" colspan="1" style="background-color: #d6d6d685;" class="totcramount" ><?php echo number_format($totcr,2,".",",")?></th>
                                <th rowspan="1" colspan="1" style="background-color: #d6d6d685;" > </th>
                            </tr>
                            <tr>
                                <th rowspan="1" colspan="5" style="background-color: #d6d6d685;" >Clossing Balance </th>
                                <th rowspan="1" colspan="5" style="background-color: #d6d6d685;" class="clsngblnc" ><?php echo  number_format($runningbal,2,".",",")?></th>

                            </tr>
                            </tfoot>

                        </table> 
                    </div>
                </div>


            </div><!-- /.box-body -->
        </div><!-- /.box --> 
        <?= form_close() ?>
         
         
         
          </div>
         
         
         
        </div>
    </div>
</div>

</div>
 

 
 
  