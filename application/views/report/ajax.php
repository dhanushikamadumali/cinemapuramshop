<?php

if($this->input->post("func_n")=="get_stole_daily_report"):
    
    ?>
                                   <tr style="font-size:13px"> 
                            <td style="width:45%;float:left">
                        <b>  Stall Name</b>
                            </td>
                            <td style="width:10%;float:left;text-align:right;">
                         <b>  18%</b>
                            </td>
                            <td style="width:15%;float:left;text-align:right">
                         <b>  Total Sales with <br>PK Charges</b>
                            </td>
                            <td style="width:10%;float:left;text-align:right">
                         <b>  Advance</b>
                            </td>
                            <td style="width:10%;float:left;text-align:right">
                        <b> Balance</b>
                            </td>
                            <td style="width:10%;float:left;text-align:right">
                        <b> Send</b>
                            </td>
                        </tr>       
                                 
                                       <?php
                                       
                                       
                                        $this->db->select('SUM(total_price) as pricesum, SUM(item_qty) as sumqty');
    $condition = ["status"=>1, "date(acc_date)"=> date('Y-m-d',strtotime($this->input->post("selectdate")))];
    $query= $this->Common_model->get_all("sales_order_details",$condition)->result();
    
 
                        $manus= $this->Common_model->get_all("manufacturer_information")->result();
                        $ftotal=0.00;
                        $presenttotal=0.00;
                        $balancetotal=0.00;
                        $advancetotal=0.00;
                        $oddeven=0;
                        foreach($manus as $manu):
                            $prodin= $this->Common_model->get_all("product_information" ,["manufacturer_id"=>$manu->id])->result();
                        $manu_total=0;
                        $all_manutotal=$query[0]->pricesum;
                        foreach($prodin as $prod):
                            $pid = $prod->id;
                            $this->db->select('SUM(total_price) as pricesum,SUM(packaging_charge) as pkgsum');
                            $condition4 = ["product_id"=>$pid,"status"=>1, "date(acc_date)"=> date('Y-m-d',strtotime($this->input->post("selectdate")))];
                            $query4 = $this->Common_model->get_all("sales_order_details",$condition4)->result();
                            
                            $manu_total+= $query4[0]->pricesum+$query4[0]->pkgsum;
                            $manupre =  (($manu_total/$all_manutotal)*100);  
                        endforeach;
                        $this->db->select('SUM(amount) as samount');
                       $manpayment= $this->Common_model->get_all("manufacturer_payment",["manu_id"=>$manu->id,"date(acc_date)"=>date('Y-m-d',strtotime($this->input->post("selectdate")))])->result();
                        ?>
                        <tr  class="row" style="font-size:13px;<?php echo ($oddeven%2==1)?"background-color:#ccc":"background-color:#d9daf8"  ?>"> 
                            <td style="width:45%;float:left">
                            <?= $manu->manufacturer_name ?>
                            </td>
                            <td style="width:10%;float:left;text-align:right;">
                            <?=  number_format(($manu_total*$manu->commission)/100,2,".",","); $presenttotal+=($manu_total*$manu->commission)/100; ?>
                            </td>
                            <td style="width:15%;float:left;text-align:right">
                            <?php  
                            echo number_format($manu_total,2,".",","); 
                             $ftotal+=floatval($manu_total); 
                            ?>
                            </td>
                            <td style="width:10%;float:left;text-align:right">
                            <?= number_format($manpayment[0]->samount ,2,".",","); $advancetotal+=$manpayment[0]->samount  ?>
                            </td>
                            <td style="width:10%;float:left;text-align:right">
                            <?php
                           $mmn= $manu_total-$manpayment[0]->samount-(($manu_total*$manu->commission)/100);
                            echo number_format($mmn,2,".",","); $balancetotal+= $mmn; ?>
                            </td>
                            <td style="width:10%;float:left;text-align:right">
                           <a target="_blank" style="padding:0px" href="https://api.whatsapp.com/send?phone=<?= $manu->mobile ?>&text=<?= $this->input->post("selectdate")?>%0a<?=$manu->manufacturer_name?>%0a Total Sales - <?php echo  number_format($manu_total,2,".",","); ?> %0a Commission - <?=  ($manu_total*$manu->commission)/100 ?> %0a Advance - <?= $manpayment[0]->samount ?> %0a Balance - <?= $manu_total-$manpayment[0]->samount-(($manu_total*$manu->commission)/100) ?>"><button class="btn" style="line-height:1.65rem">SEND</button></a> </td>
                        </tr>
                        
                        <?php
                        $oddeven++;
                        endforeach;
                          ?>
                          <tr  class="row" style="font-size:13px;<?php echo ($oddeven%2==1)?"background-color:#ccc":"background-color:#d9daf8"  ?>"> 
                            <th style="width:45%;float:left">
                            
                            </th>
                            <th style="width:10%;float:left;text-align:right;">
                            <?=  number_format($presenttotal,2,".",",") ?>
                            </th>
                            <th style="width:15%;float:left;text-align:right">
                            <?php echo  number_format($ftotal,2,".",",");  ?>
                            </th>
                            <th style="width:10%;float:left;text-align:right">
                            <?= number_format($advancetotal,2,".",",") ?>
                            </th>
                            <th style="width:10%;float:left;text-align:right">
                            <?= number_format($balancetotal,2,".",",") ?>
                            </th>
                            <th style="width:10%;float:left;text-align:right">  </th>
                        </tr>
                          <?php
                        
endif;    


if($this->input->post("func_n")=="get_service_charge_report"):
    $fromdate = $this->input->post("fromdate");
    $todate = $this->input->post("todate");

?>
    <tr style="font-size:13px"> 
        <td style="width:15%;float:left">
    <b>  Date</b>
        </td>
        <td style="width:25%;float:left;text-align:right;">
        <b>  Sales with serive charge</b>
        </td>
        <td style="width:25%;float:left;text-align:right">
        <b> Sales without service charge</b>
        </td>
        <td style="width:25%;float:left;text-align:right">
        <b>  Only Service charge</b>
        </td>
        
    </tr>  
            <?php  
            $date1 = new DateTime($fromdate);
            $date2 = new DateTime($todate);
                        //var_dump($date1 <=$date2);
        while($date1 <= $date2):

            $query =$this->db->query("SELECT SUM(total_amount) as pricesum, SUM(service_charge) as sumservicecharge from sales_order 
            where date(acc_date)='".$fromdate."'")->result();

        
        $withoutsc =  $query[0]->pricesum -  $query[0]->sumservicecharge;
        ?>

        <tr  class="row" style="font-size:13px;background-color:#d9daf8">           
            <td style="width:15%;float:left">
            <?php echo $fromdate ?>
            </td>
            <td style="width:25%;float:left;text-align:right;">
            <?php echo $query[0]->pricesum ?>
            </td>
            <td style="width:25%;float:left;text-align:right">
            <?php echo $withoutsc ?>
            </td>
            <td style="width:25%;float:left;text-align:right">
            <?php echo $query[0]->sumservicecharge ?>
            </td>
                            
        </tr>
                    
    <?php
        $fromdate = date("Y-m-d",strtotime("+1 day", strtotime($fromdate)));
        $date1 = new DateTime($fromdate);
        //echo date("Y-m-d", $date);
    endwhile;
    
endif;

if($this->input->post("func_n")=="get_stall_daterange_report"):
    
    ?>
        <tr style="font-size:13px"> 
            <td style="width:40%;float:left">
                <b>  Stall Name</b>
            </td> 
            <td style="width:20%;float:left;text-align:right">
                <b>  Total Sales</b>
            </td>
            <td style="width:20%;float:left;text-align:right">
                <b> Commision</b>
            </td>    
           
           
        </tr>       
                                 
            <?php               
            $this->db->select('SUM(total_price) as pricesum');
            $condition = ["status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($this->input->post("fromdate"))), "date(acc_date)<"=>  date('Y-m-d', strtotime($this->input->post("todate")))];
            // $condition = ["status"=>1, "date(acc_date)"=> date('Y-m-d',strtotime($this->input->post("selectdate")))];
            $query= $this->Common_model->get_all("sales_order_details",$condition)->result();
            
            
            
            $this->db->select("id,manufacturer_name,commission");
            $manus= $this->Common_model->get_all("manufacturer_information")->result();
            $ftotal=0;
            $oddeven=0;
            $commision=0;
            foreach($manus as $manu):
                $prodin= $this->Common_model->get_all("product_information" ,["manufacturer_id"=>$manu->id])->result();
            $manu_total=0;
            $all_manutotal=$query[0]->pricesum;
            foreach($prodin as $prod):
                $pid = $prod->id;
                $this->db->select('SUM(total_price) as pricesum');
                $condition4 = ["product_id"=>$pid,"status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($this->input->post("fromdate"))), "date(acc_date)<"=>  date('Y-m-d', strtotime($this->input->post("todate")))];
                $query4 = $this->Common_model->get_all("sales_order_details",$condition4)->result();

                $manu_total+= $query4[0]->pricesum;
             
                $commision = ($manu_total* $manu->commission)/100;
                // $manupre =  (($manu_total/$all_manutotal)*100);  
            endforeach;

            ?>

            <tr  class="row" style="font-size:13px;<?php echo ($oddeven%2==1)?"background-color:#ccc":"background-color:#d9daf8"  ?>"> 
                <td style="width:40%;float:left">
                <?= $manu->manufacturer_name  ?>
                </td>
                <td style="width:20%;float:left;text-align:center">
                <?php echo  number_format($manu_total,2,".",",");$ftotal+=$manu_total ?>
                </td>
                <td style="width:20%;float:left;text-align:center">
                <?= number_format($commision,2,".","," ) ?>
                </td>
                
            <?php
            $oddeven++;
            endforeach;
                             
endif;


if($this->input->post("func_n")=="get_employee_attendance_report"):
    $fromdate = $this->input->post("fromdate");
    $todate = $this->input->post("todate");
    $eid = $this->input->post("eid");

?>
        <tr style="font-size:13px"> 
        <td style="width:15%;float:left">
            <b>  date</b>
        </td>
        <td style="width:15%;float:left">
            <b>  amount</b>
        </td>
        <td style="width:25%;float:left;text-align:right;">
            <b>  status</b>
        </td>
        </tr>  
            <?php  
            $date1 = new DateTime($fromdate);
            $date2 = new DateTime($todate);
                        
        while($date1 <= $date2):
            $query =$this->db->query("SELECT * from employee_attendance where date(date)='".$fromdate."' and e_id='".$eid."'" )->result();
        if($query):
            ?> 
            <tr  class="row" style="font-size:13px;background-color:#d9daf8">                   
            <td style="width:15%;float:left">
            <?php echo $fromdate ?>
                </td>
                <td style="width:25%;float:left;text-align:right">
                <?php  echo $query[0]->amount ?>
                </td>  
                <td style="width:25%;float:left;text-align:right">
                <?php  if( $query[0]->work_status==0):
                    echo  "OFF";
                    elseif( $query[0]->work_status==1):
                        echo  "ON";
                        elseif( $query[0]->work_status ==2):
                            echo  "HALF";                   
                        endif;  ?>
                </td>                
            </tr>
                                
            <?php
        else:
            ?> 
            
            <tr  class="row" style="font-size:13px;background-color:#d9daf8">                   
            <td style="width:15%;float:left">
            <?php echo $fromdate ?>
            </td>
            <td style="width:25%;float:left;text-align:right">
            -
            </td>  
            <td style="width:25%;float:left;text-align:right">
            Off
            </td>                
            </tr>
                                    
            <?php
        endif;
            $fromdate = date("Y-m-d",strtotime("+1 day", strtotime($fromdate)));
            $date1 = new DateTime($fromdate);
            //echo date("Y-m-d", $date);
        endwhile;
    
endif;
