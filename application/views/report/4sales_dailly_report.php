<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<style>
@media print{
    .button{
        display: none;
    }
}
@media print{
    @page{
        margin-top: 0;
        margin-bottom: 0;
    }
}
</style>


    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
</head>
<body>

<?php

///var_dump($_GET);
    //$twodate=explode("*",$this->input->get("date"));
    $fromdate =  $this->input->get("fromdate");
    $todate = $this->input->get("todate");
    $withproduct = $this->input->get("withitem")?"1":"0";

    // $query = $this->db->query("SELECT SUM(total_price) as pricesum,SUM(item_qty) as sumqty FROM sales_order_details WHERE  date(order_date) BETWEEN '$fromdate' AND ' $todate '")->result();
    // $this->db->select("SUM(total_price) as pricesum");
    // $this->db->where('order_date BETWEEN "'. date('Y-m-d', strtotime($fromdate)). '" and "'. date('Y-m-d', strtotime($todate)).'"');
    // $prods= $this->Common_model->get_all("sales_order_details")->result();
    

    // $this->db->select('SUM(total_amount) as total_amount');
    // $condition = 'acc_date(acc_date) BETWEEN "('. date('Y-m-d', strtotime($fromdate)). '" and "'. date('Y-m-d', strtotime($todate)).')" and status=1';
    // $query0= $this->Common_model->get_all("sales_order",[$condition])->result(); 
    
    
    $this->db->select('SUM(total_price) as pricesum, SUM(item_qty) as sumqty');
    $condition = ["status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))];
    // $condition = 'date(acc_date) BETWEEN "('. date('Y-m-d', strtotime($fromdate)). '" and "'. date('Y-m-d', strtotime($todate)).')" and status=1';
    $query= $this->Common_model->get_all("sales_order_details",$condition)->result();
  
    
    $this->db->select('SUM(total_amount) as total_amount,system_user.user_name');
    $condition0 = ["status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))];
    $this->db->join("system_user","system_user.id=sales_order.add_by","left");
    $this->db->group_by("user_name");
    $query0= $this->Common_model->get_all("sales_order",$condition0)->result(); 
    
    
    $this->db->select('SUM(amount) as pricesum, payment_type as ptype');
    $condition1 = ["status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))];
    // $condition1 = 'acc_date BETWEEN "('. date('Y-m-d', strtotime($fromdate)). '" and "'. date('Y-m-d', strtotime($todate)).')" and status=1';
    $this->db->group_by('payment_type');
    $query1 = $this->Common_model->get_all("sales_order_payment",$condition1)->result();
   
    $this->db->select('SUM(total_amount) as pricesum, order_type as otype');
     $condition2 = ["status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))];
    // $condition2 = 'acc_date BETWEEN "('. date('Y-m-d', strtotime($fromdate)). '" and "'. date('Y-m-d', strtotime($todate)).')" and status=1';
    $this->db->group_by('order_type');
    $query2 = $this->Common_model->get_all("sales_order",$condition2)->result();

    // $query2 = $this->db->query("SELECT SUM(total_amount) as pricesum, order_type as otype FROM sales_order WHERE   date(sales_date) BETWEEN '$fromdate' AND ' $todate '  GROUP BY order_type")->result();
    $this->db->select('SUM(item_qty) as sumqty');
     $condition3 = ["status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))];
    // $condition3 = 'acc_date BETWEEN "('. date('Y-m-d', strtotime($fromdate)). '" and "'. date('Y-m-d', strtotime($todate)).')" and status=1';
    $query3 = $this->Common_model->get_all("sales_order_details",$condition3)->result();

    // $query3 = $this->db->query("SELECT SUM(item_qty) as sumqty FROM sales_order_details WHERE  date(order_date) BETWEEN '$fromdate' AND ' $todate '")->result();
?>
<div  style="padding:0px">
    <div>
       <div  style="width: 300px">
                <img src="<?= base_url()."assets/content/logo/logo.jpg" ?>" style="display: block; margin-left: auto; margin-right: auto; width: 50%;margin-top:10px" >
                <div style="font-size: 25px;text-align:center;font-weight:800">CINAMA PURAM</div>
                <div style="font-size: 17px;text-align:center">No 20,Marine Drive, Bambalapitiya</div> 
                <div style="font-size: 17px;text-align:center">077 47 47 777</div>
                <div style="margin-top:-10px;margin-bottom: 0px;">------------------------------------------</div> 
                <div class="row">
                    <div  style="width:40%;float:left;font-weight: 600;font-size:15px">From Date</div>
                    <div style="width:60%;float:left;text-align:right"><?=$fromdate?></div> 
                    <div style="width:40%;float:left;font-weight: 600;font-size:15px">To Date</div>
                    <div  style="width:60%;float:left;text-align:right"><?=  $todate ?></div>     
                </div>
                <div style="margin-top: -10px;margin-bottom: 0px;">------------------------------------------</div> 
                <!--<div class="row" style="background-color:#ccc;width:100%;padding:5px 10px;text-align:center"> USER SALES</div>-->
                
                <div class="row" style="">
                    <?php
                    $utamt=0;
                    foreach($query0 as $usamount):
                        ?>
                         <div style="width:50%;float:left;text-align:left"><?= $usamount->user_name ?></div> 
                   <div style="width:50%;float:left;text-align:right"> <?= $usamount->total_amount ?></div> 
                   <?php
                   $utamt+=$usamount->total_amount;
                        endforeach;
                    ?>
                  <div style="width:50%;float:left;text-align:left"><b>Total</b></div> 
                   <div style="width:50%;float:left;text-align:right"><b><?= $utamt ?></b></div> 
                </div>
                
                <div class="row" style="background-color:#ccc;width:100%;padding:5px 10px;text-align:center">SALES BY PAYMENT METHODS</div>
                <div class="row"> 
                    <?php
                    $pmtamt=0;
                        foreach($query1 as $paymenttype):
                    ?> 
                         <div style="width:50%;float:left;text-align:left"><?= $paymenttype->ptype?> </div> 
                         <div style="width:50%;float:left;text-align:right"><?=$paymenttype->pricesum ?></div>
                    <?php
                    $pmtamt+=$paymenttype->pricesum;
                    endforeach;
                    ?> 
                    <div style="width:50%;float:left;text-align:left"><b>Total</b></div> 
                    <div style="width:50%;float:left;text-align:right"><b><?= $pmtamt ?></b></div>
                </div>
                <div  class="row" style="background-color:#ccc;width:100%;padding:5px 10px;text-align:center">BILLING TYPE</div>
                    <?php
                    $bttamt=0;
                     foreach($query2 as $ordertype):
                    ?>
                            <div style="width:50%;float:left;text-align:left"><?= $ordertype->otype?> </div>
                            <div style="width:50%;float:left;text-align:right"><?= $ordertype->pricesum ?></div>
                    <?php
                    $bttamt+=$ordertype->pricesum;
                    endforeach;
                    ?>    
                     <div style="width:50%;float:left;text-align:left"><b>Total</b></div> 
                    <div style="width:50%;float:left;text-align:right"><b><?=  $bttamt ?></b></div>
                    
                    <div class="row" style="background-color:#ccc;width:100%;padding:5px 10px;text-align:center">DELLED VOID BILL</div>
                   <?php 
                    $cnd = ["status"=>0, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))];
                    $delbill=$this->Common_model->get_all("sales_order",$cnd)->result();
                   ?>
                   <div class="row">  
                         <div style="width:50%;float:left;text-align:left">Deleted Bills</div> 
                         <div style="width:50%;float:left;text-align:right"><?= count($delbill) ?></div>
                    </div>
                    
                    <div class="row" style="background-color:#ccc;width:100%;padding:5px;text-align:center">
                        SALES BY ITEM STALL
                      </div>
                    
                        <?php
                        $all_total=0;
                        $this->db->order_by("manufacturer_id","ASC");
                        $manus= $this->Common_model->get_all("manufacturer_information")->result();
                        foreach($manus as $manu):
                            $prodin= $this->Common_model->get_all("product_information" ,["manufacturer_id"=>$manu->id])->result();
                        $manu_total=0;
                        
                        $all_manutotal=($query[0]->pricesum==0)?1:$query[0]->pricesum;
                        foreach($prodin as $prod):
                            $pid = $prod->id;
                            $this->db->select('SUM(total_price) as pricesum,SUM(packaging_charge) as pkgsum');
                             $condition4 = ["product_id"=>$pid,"status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))];
                            // $condition4 = 'order_date BETWEEN "('. date('Y-m-d', strtotime($fromdate)). '" and "'. date('Y-m-d', strtotime($todate)).')" and status=1';
                            $query4 = $this->Common_model->get_all("sales_order_details",$condition4)->result();
                            // $query4 = $this->db->query("SELECT SUM(total_price) as pricesum FROM sales_order_details WHERE   date(order_date) BETWEEN '$fromdate' AND ' $todate ' AND product_id=$pid")->result();
                           // $pkg_total+=$query4[0]->pkgsum;
                            $manu_total+= $query4[0]->pricesum+$query4[0]->pkgsum;
                          $manupre =  (($manu_total/$all_manutotal)*100);  
                        endforeach;
                        
                        $all_total+=$manu_total;
                        
                        ?>

                        <div  class="row" style="font-size:13px"> 
                            <div style="width:56%;float:left">
                            <?= ($manu_total==0)?" ":$manu->manufacturer_name  ?>
                            </div>
                            <div style="width:14%;float:left;text-align:right;padding:0px">
                            <?= ($manu_total==0)?" ": number_format($manupre,2,".",",") .'%' ?>
                            </div>
                            <div style="width:30%;float:left;text-align:right">
                            <?= ($manu_total==0)?" ": number_format($manu_total,2,".",","); ?>
                            </div>
                        </div>
                        
                        <?php
                        endforeach;
                        ?>
                         <div  class="row" style="font-size:13px"> 
                            <div style="width:100%;text-align:right;border-top:1px solid black">
                             <b><?= number_format($all_total,2,".",",") ?></b>
                            </div>
                         </div>
                         <!--<div  class="row" style="font-size:13px"> -->
                         <!--   <div style="width:60%;text-align:left;border-top:1px solid black">-->
                         <!--    <b>Packaging Charges</b>-->
                         <!--   </div>-->
                         <!--   <div style="width:40%;text-align:right;border-top:1px solid black">-->
                         <!--    <b><?= number_format($pkg_total,2,".",",") ?></b>-->
                         <!--   </div>-->
                         <!--</div>-->
                         <!--<div  class="row" style="font-size:13px"> -->
                         <!--   <div style="width:60%;text-align:left;border-top:1px solid black">-->
                         <!--        <b>Total Collection</b>-->
                         <!--   </div>-->
                         <!--   <div style="width:40%;text-align:right;border-top:1px solid black">-->
                         <!--    <b><?= number_format($query[0]->pricesum+$pkg_total,2,".",",") ?></b>-->
                         <!--   </div>-->
                         <!--</div>-->
                    
                    <div class="row" style="background-color:#ccc;width:100%;padding:10px;text-align:center">
                        QUANTITY BY ITEM CATEGORY
                    </div>
                         
                    <?php
                    $manus= $this->Common_model->get_all("manufacturer_information")->result();
                    foreach($manus as $manu):
                        $prodin= $this->Common_model->get_all("product_information" ,["manufacturer_id"=>$manu->id])->result();
                    $manu_total=0;
                    $all_manuqty=($query3[0]->sumqty==0)?1:$query3[0]->sumqty;
                    foreach($prodin as $prod):
                        $pid = $prod->id;
                        $this->db->select('SUM(item_qty) as sumqty');
                         $condition5 = ["product_id"=>$pid,"status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))];
                        // $condition5 = 'order_date BETWEEN "('. date('Y-m-d', strtotime($fromdate)). '" and "'. date('Y-m-d', strtotime($todate)).')" and status=1';
                        $query5 = $this->Common_model->get_all("sales_order_details",$condition5)->result();
                       
                        // $query5 = $this->db->query("SELECT SUM(item_qty) as sumqty FROM sales_order_details WHERE   date(order_date) BETWEEN '$fromdate' AND ' $todate ' AND product_id=$pid")->result();
                          
                        $manu_total+= $query5[0]->sumqty;
                      $manupre =  (($manu_total/$all_manuqty)*100)/100;  
                    endforeach;
                    ?>
                    
                    <div class="row" style="font-size:13px">  
                        <div style="width:60%;float:left;">
                        <?= ($manu_total==0)?" ":$manu->manufacturer_name  ?>
                        </div>
                        <div style="width:10%;float:left;text-align:right;"> 
                        <?= ($manu_total==0)?" ": number_format($manupre,2,".",",").'%' ?> 
                       </div> 
                       <div style="width:30%;float:left;text-align:right">
                        <?= ($manu_total==0)?" ":number_format($manu_total,0,".",",") ?>
                        </div> 
                    </div>
                   
                    <?php
                    endforeach;
                    ?>
                     <div  class="row" style="font-size:13px;border-top:1px solid black">
                           <b> <div style="width:100%;text-align:right"><?=$query[0]->sumqty ?></div></b>
                    </div>
                    
            <?php
            if($withproduct==1):
                ?>
                <div class="row" style="background-color:#ccc;width:100%;padding:10px;text-align:center">
                        QUANTITIES BY ITEMS
                        </div>
                    <?php
                       $this->db->select('product_id as pid');
                       $condition6 = ["status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))]; 
                      $this->db->group_by('product_id ');
                      $proddid = $this->Common_model->get_all("sales_order_details",$condition6)->result();
                     
                      $itemallqty=0;
                      $itemallprice=0;
                     foreach( $proddid as $prod):
                        $pid =  $prod->pid;
                        $this->db->select('product_name as pname');
                        $prodid = $this->Common_model->get_all("product_information",["id"=>$pid])->result();
 
                         foreach($prodid as $prodids):
                            $this->db->select('SUM(item_qty) as sumqty, SUM(total_price) as totlprice');
                            $condition7 = ["product_id"=>$pid,"status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))]; 
                            $proddetails = $this->Common_model->get_all("sales_order_details",$condition7)->result();
                            
                            $itemallqty +=$proddetails[0]->sumqty;
                            $itemallprice +=$proddetails[0]->totlprice;
                    ?>
                     <div class="row" style="font-size:13px"> 
                        <div style="width:60%;float:left">
                        <?=$prodids->pname  ?>
                        </div>
                        <div style="width:10%;float:left;text-align:right">
                            <?= $proddetails[0]->sumqty?>
                        </div>
                        <div style="width:30%;float:left;text-align:right">
                            <?= number_format($proddetails[0]->totlprice,2,".",",") ?>
                        </div>
                    </div>
                        <?php
                        endforeach;
                       ?>
                       <?php
                     endforeach;
                     ?>
                    <div class="row" style="font-size:13px;border-top:1px solid black"> 
                        <div style="width:70%;float:left;text-align:right">
                           <b> <?= number_format($itemallqty,0,".",",") ?></b>
                        </div>
                        <div style="width:30%;float:left;text-align:right">
                           <b> <?= number_format($itemallprice,2,".",",") ?></b>
                        </div>
                    </div>
                <?php
            endif;
            ?>        
                 
                <!-- <div style="margin-top: -10px;margin-bottom: -10px;">------------------------------------------</div> 
                <div  style="font-weight: 600;font-size:15px;text-align:center">
                Thank you!!! come Again
                </div> -->
       </div> 
    </div>
    </div>

</body>
</html>