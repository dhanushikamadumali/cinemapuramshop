<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
</head>
<body>
<table>
<?php
    $twodate=explode("*",$this->input->get("date"));
    $fromdate =  $twodate[0];
    $todate =  $twodate[1];

    $query = $this->db->query("SELECT SUM(total_price) as pricesum  FROM sales_order_details WHERE  date(order_date) BETWEEN date($fromdate) AND date($todate)")->result();
    var_dump($query);
    $query1 = $this->db->query("SELECT SUM(amount) as pricesum, payment_type as ptype FROM sales_order_payment WHERE   date(date) BETWEEN '$fromdate' AND ' $todate '  GROUP BY payment_type")->result();
    $query2 = $this->db->query("SELECT SUM(total_amount) as pricesum, order_type as otype FROM sales_order WHERE   date(sales_date) BETWEEN '$fromdate' AND ' $todate '  GROUP BY order_type")->result();
    $query3 = $this->db->query("SELECT SUM(item_qty) as sumqty FROM sales_order_details WHERE  date(order_date) BETWEEN '$fromdate' AND ' $todate '")->result();
?>
<div  style="padding:0px">
    <div>
       <div  style="width: 300px">
                <img src="<?= base_url()."assets/content/logo/logo.jpg" ?>" style="display: block; margin-left: auto; margin-right: auto; width: 50%;margin-top:10px" >
                <div style="font-size: 25px;text-align:center;font-weight:800">CINAMA PURAM</div>
                <div style="font-size: 20px;text-align:center">No 20,Marine Drive</div> 
                <div style="font-size: 20px;text-align:center"> Bambalapitiya</div>
                <div style="font-size: 20px;text-align:center">Colambo</div> 
                <div style="font-size: 20px;text-align:center">0707778647</div>
                <div style="margin-top: -10px;margin-bottom: -10px;">------------------------------------------</div> 
                <div class="row">
                    <div  style="width:40%;font-weight: 600;font-size:15px">Frome date</div>
                    <div style="width:60%;"><?=$fromdate?></div>
                
                    <div style="width:40%;font-weight: 600;font-size:15px">To date</div>
                    <div  style="width:60%;"><?=  $todate ?></div>     
                </div>
                <div style="margin-top: -10px;margin-bottom: -10px;">------------------------------------------</div> 
                <div> USER SALES</div>
               <div><?=$query[0]->pricesum ?></div>
               <div>SALES BY PAYMENT METHODS</div>
                <div> 
                    <?php
                        foreach($query1 as $paymenttype):
                    ?>
                        <div><?= $paymenttype->ptype?> <?=$paymenttype->pricesum ?></div>
                    <?php
                    endforeach;
                    ?>    
                </div>
                <div>BILLING TYPE</div>
                <div> 
                        <?php
                         foreach($query2 as $ordertype):
                        ?>
                                <div><?= $ordertype->otype?> <?=$ordertype->pricesum ?></div>

                        <?php
                        endforeach;
                        ?>    
                    </div>
                    <div>DELLED VOID BILL</div>
                   
                    <div>
                    
                    <tr>
                        <td>
                        SALES BY ITEM CATEGORY
                        </td>
                    </tr>
                        <?php
                        $manus= $this->Common_model->get_all("manufacturer_information")->result();
                        foreach($manus as $manu):
                            $prodin= $this->Common_model->get_all("product_information" ,["manufacturer_id"=>$manu->id])->result();
                        $manu_total=0;
                        $all_manutotal=$query[0]->pricesum;
                        foreach($prodin as $prod):
                            $pid = $prod->id;
                            $query4 = $this->db->query("SELECT SUM(total_price) as pricesum FROM sales_order_details WHERE   date(order_date) BETWEEN '$fromdate' AND ' $todate ' AND product_id=$pid")->result();
                          
                            $manu_total+= $query4[0]->pricesum;
                          $manupre =  (($manu_total/$all_manutotal)*100)/100;  
                        endforeach;
                        ?>

                        <tr>
                       
                            <td>
                            <?= ($manu_total==0)?" ":$manu->manufacturer_name  ?>
                            </td>
                            <td>
                            <!-- <?= ($manu_total==0)?" ":$manupre.'%' ?> -->
                            </td>
                            <td>
                            <?= ($manu_total==0)?" ":$manu_total ?>
                            </td>
                        </tr>
                        
                        <?php
                        endforeach;
                        ?>
                        <tr>
                            <td>
                            <?=$query[0]->pricesum ?>
                            </td>
                        </tr>
                        
                    </div>

                   
                    <div>
                    <tr>
                        <td>
                        QUANTITY BY ITEM CATEGORY
                        </td>
                    </tr>
                    <?php
                    $manus= $this->Common_model->get_all("manufacturer_information")->result();
                    foreach($manus as $manu):
                        $prodin= $this->Common_model->get_all("product_information" ,["manufacturer_id"=>$manu->id])->result();
                    $manu_total=0;
                    $all_manuqty=$query3[0]->sumqty;
                    foreach($prodin as $prod):
                        $pid = $prod->id;
                        $query5 = $this->db->query("SELECT SUM(item_qty) as sumqty FROM sales_order_details WHERE   date(order_date) BETWEEN '$fromdate' AND ' $todate ' AND product_id=$pid")->result();
                          
                        $manu_total+= $query5[0]->sumqty;
                    //   $manupre =  (($manu_total/$all_manuqty)*100)/100;  
                    endforeach;
                    ?>
                    <tr>
                    <td>
                        <?= ($manu_total==0)?" ":$manu->manufacturer_name  ?>
                        </td>
                        <td>
                        <!-- <?= ($manu_total==0)?" ":$manupre.'%' ?> -->
                        </td>
                        <td>
                        <?= ($manu_total==0)?" ":$manu_total ?>
                        </td>
                    </tr>
                    
                   
                    <?php
                    endforeach;
                    ?>
  
                   
                    <tr>
                        <td><?=$query[0]->sumqty ?></td>
                    </tr>
                    
                </div>
               
                <div>
                    <tr>
                        <td>
                        QUANTITIES BY ITEMS
                        </td>
                    </tr>
                    <?php
                      $proddid = $this->db->query("SELECT product_id as pid  FROM sales_order_details WHERE   date(order_date) BETWEEN '$fromdate' AND ' $todate ' GROUP BY product_id ")->result();
                      $itemallqty=0;
                      $itemallprice=0;
                     foreach( $proddid as $prod):
                        $pid =  $prod->pid;
                         $prodid = $this->db->query("SELECT product_name as pname  FROM product_information WHERE id= $pid ")->result();
                         foreach($prodid as $prodids):
                            $proddetails = $this->db->query("SELECT SUM(item_qty) as sumqty, SUM(total_price) as totlprice FROM sales_order_details WHERE   date(order_date) BETWEEN '$fromdate' AND ' $todate ' AND product_id= $pid  ")->result();
                            $itemallqty +=$proddetails[0]->sumqty;
                            $itemallprice +=$proddetails[0]->totlprice;
                    ?>
                    <tr>
                        <td>
                        <?=$prodids->pname  ?>
                        </td>
                        <td>
                            <?= $proddetails[0]->sumqty?>
                        </td>
                        <td>
                            <?= $proddetails[0]->totlprice?>
                        </td>
                    </tr>
                        <?php
                        endforeach;
                       ?>
                       <?php
                     endforeach;
                     ?>
                     <tr>
                        <td>
                            <?=$itemallqty ?>
                        </td>
                        <td>
                            <?= $itemallprice ?>
                        </td>
                       </tr>
                </div>
                <!-- <div style="margin-top: -10px;margin-bottom: -10px;">------------------------------------------</div> 
                <div  style="font-weight: 600;font-size:15px;text-align:center">
                Thank you!!! come Again
                </div> -->
       </div> 
    </div>
    </div>

</body>
</html>