
 
<div class="row">
<style>
td{
    white-space: nowrap;
}
</style>
<table class="table table-hover">
<?php
  //$month = $this->input->get('date');

  $mnY=explode("-",$this->input->get("date"));
  $monthdates = cal_days_in_month(CAL_GREGORIAN, $mnY[1],$mnY[0]); // 31
   $odyear=$mnY[1];
   $odmnth=$mnY[0];
  


 $arr_mon=[];
    $arr_tue=[];
    $arr_wed=[];
    $arr_thu=[];
    $arr_fri=[];
    $arr_sat=[];
    $arr_sun=[];
    $arr_week=[];


for($x=1;$x<=$monthdates;$x++):
    $day = date('D', strtotime($this->input->get("date")."-".$x));  
     $weeknumber= date("W",strtotime($this->input->get("date")."-".$x));
    if (!in_array($weeknumber, $arr_week)):
        array_push($arr_week,$weeknumber);
    endif;  
    if($day=="Mon"):
        array_push($arr_mon,date("Y-m-d",strtotime($this->input->get("date")."-".$x)));
    elseif($day=="Tue"):
        array_push($arr_tue,date("Y-m-d",strtotime($this->input->get("date")."-".$x)));
    elseif($day=="Wed"):
        array_push($arr_wed,date("Y-m-d",strtotime($this->input->get("date")."-".$x)));
    elseif($day=="Thu"):
        array_push($arr_thu,date("Y-m-d",strtotime($this->input->get("date")."-".$x)));
    elseif($day=="Fri"):
        array_push($arr_fri,date("Y-m-d",strtotime($this->input->get("date")."-".$x)));
    elseif($day=="Sat"):
        array_push($arr_sat,date("Y-m-d",strtotime($this->input->get("date")."-".$x)));
    elseif($day=="Sun"):
        array_push($arr_sun,date("Y-m-d",strtotime($this->input->get("date")."-".$x)));
    endif; 
endfor;

// var_dump($arr_mon);
// echo '<br>';
// var_dump($arr_tue);
// echo '<br>';
// var_dump($arr_wed);
// echo '<br>';
// var_dump($arr_thu);
// echo '<br>';
// var_dump($arr_fri);
// echo '<br>';
// var_dump($arr_sat);
// echo '<br>';
// var_dump($arr_sun);
// echo '<br>';
// echo date("W",strtotime('2023-01-01'));
// var_dump($arr_week);

echo "<tr style='background-color:#e1dede'>";
foreach($arr_week as $arrWeek):
    $GLOBALS["salestotal".$arrWeek] =0;
    $GLOBALS["presentage".$arrWeek] =0;
    $GLOBALS["balance".$arrWeek] =0;
    echo "<th width='200' style='width:175px'>Week -".$arrWeek."</th>";
    echo "<th width='200' style='width:175px'>Date</th>";
    echo "<th width='200' style='width:400px'>Stole</th>";
    echo "<th width='200' style='width:175px'>Total</th>";
    echo "<th width='200' style='width:175px'>18%</th>";
    echo "<th width='200' style='width:175px'>Balance</th>";  
    echo "<td width='200' style='width:175px;background-color:#ccc'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
endforeach; 
echo "</tr>";   
$this->db->order_by("manufacturer_id","ASC");
$manus= $this->Common_model->get_all("manufacturer_information")->result();
foreach($manus as $manu): 
    echo "<tr>";
    $iteration=0;
    foreach($arr_week as $arrWeek): 
        foreach($arr_mon as $arrMon):
            if($arrWeek==date("W",strtotime($arrMon))):   
                    $prods= $this->Common_model->get_all("product_information" ,["manufacturer_id"=>$manu->id])->result();
                    $manu_total=0;
                    foreach($prods as $prod):
                        $dt=date("Y-m-d",strtotime($arrMon));
                        $this->db->select("SUM(total_price) as pricesum");
                        $prods= $this->Common_model->get_all("sales_order_details" ,["date(acc_date)"=>$arrMon,"product_id"=>$prod->id])->result();
                        $manu_total+= $prods[0]->pricesum;
                    endforeach; 
                    echo "<td width='200' style='width:175px'>".date('D', strtotime($arrMon))."</td>";
                    echo "<td width='200' style='width:175px'>".$arrMon."</td>";
                    echo "<td width='200' style='width:400px'>".$manu->manufacturer_name."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format($manu_total,2,".",",")."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format((($manu_total * $manu->commission)/100),2,".",",")."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format(($manu_total-(($manu_total * $manu->commission)/100)),2,".",",")."</td>"; 
                    echo "<td width='200' style='width:175px;background-color:#ccc'></td>";
                        $GLOBALS["salestotal".$arrWeek] +=$manu_total;
                        $GLOBALS["presentage".$arrWeek] +=(($manu_total * $manu->commission)/100);
                        $GLOBALS["balance".$arrWeek]+=($manu_total-(($manu_total * $manu->commission)/100));
                    $iteration++;
                    break;
            else: 
                if($iteration==0):
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:400px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>"; 
                    echo "<td width='200' style='width:175px;background-color:#ccc'></td>";
                 endif;
            endif;
            $iteration++; 
        endforeach;  
    endforeach;  
    echo "</tr>";
endforeach;
  echo "<tr>";
foreach($arr_week as $arrWeek):  
    echo "<th width='200' style='width:175px'></th>";
    echo "<th width='200' style='width:175px'></th>";
    echo "<th width='200' style='width:400px'></th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["salestotal".$arrWeek],2,".",",")."</th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["presentage".$arrWeek],2,".",",") ."</th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["balance".$arrWeek],2,".",",") ."</th>";  
    echo "<td width='200' style='width:175px;background-color:#ccc'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
endforeach; 
echo "</tr>";  

//=================================================================================================================
//=================================================================================================================
//=================================================================================================================

echo "<tr style='background-color:#e1dede'>";
foreach($arr_week as $arrWeek):
    $GLOBALS["salestotal".$arrWeek] =0;
    $GLOBALS["presentage".$arrWeek] =0;
    $GLOBALS["balance".$arrWeek] =0;
    echo "<th width='200' style='width:175px'>Week -".$arrWeek."</th>";
    echo "<th width='200' style='width:175px'>Date</th>";
    echo "<th width='200' style='width:400px'>Stole</th>";
    echo "<th width='200' style='width:175px'>Total</th>";
    echo "<th width='200' style='width:175px'>18%</th>";
    echo "<th width='200' style='width:175px'>Balance</th>";  
    echo "<td width='200' style='width:175px;background-color:#ccc'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>"; 
endforeach; 
echo "</tr>";   
$this->db->order_by("manufacturer_id","ASC");
$manus= $this->Common_model->get_all("manufacturer_information")->result();
foreach($manus as $manu): 
    echo "<tr>";
    $iteration=0;
    foreach($arr_week as $arrWeek): 
        foreach($arr_tue as $arrTue):
            if($arrWeek==date("W",strtotime($arrTue))):   
                    $prods= $this->Common_model->get_all("product_information" ,["manufacturer_id"=>$manu->id])->result();
                    $manu_total=0;
                    foreach($prods as $prod):
                        $dt=date("Y-m-d",strtotime($arrTue));
                        $this->db->select("SUM(total_price) as pricesum");
                        $prods= $this->Common_model->get_all("sales_order_details" ,["date(acc_date)"=>$arrTue,"product_id"=>$prod->id])->result();
                        $manu_total+= $prods[0]->pricesum;
                    endforeach; 
                    echo "<td width='200' style='width:175px'>".date('D', strtotime($arrTue))."</td>";
                    echo "<td width='200' style='width:175px'>".$arrTue."</td>";
                    echo "<td width='200' style='width:400px'>".$manu->manufacturer_name."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format($manu_total,2,".",",")."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format((($manu_total * $manu->commission)/100),2,".",",")."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format(($manu_total-(($manu_total * $manu->commission)/100)),2,".",",")."</td>";
                    echo "<td width='200' style='width:175px;background-color:#ccc'></td>"; 
                        $GLOBALS["salestotal".$arrWeek] +=$manu_total;
                        $GLOBALS["presentage".$arrWeek] +=(($manu_total * $manu->commission)/100);
                        $GLOBALS["balance".$arrWeek]+=($manu_total-(($manu_total * $manu->commission)/100));
                    $iteration++;
                    break;
            else: 
                if($iteration==0):
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:400px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>"; 
                    echo "<td width='200' style='width:175px;background-color:#ccc'></td>"; 
                 endif;
            endif;
            $iteration++; 
        endforeach;  
    endforeach;  
    echo "</tr>";
endforeach;
  echo "<tr>";
foreach($arr_week as $arrWeek):  
    echo "<th width='200' style='width:175px'></th>";
    echo "<th width='200' style='width:175px'></th>";
    echo "<th width='200' style='width:400px'></th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["salestotal".$arrWeek],2,".",",")."</th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["presentage".$arrWeek],2,".",",") ."</th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["balance".$arrWeek],2,".",",") ."</th>";  
    echo "<td width='200' style='width:175px;background-color:#ccc'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>"; 
endforeach; 
echo "</tr>";  


//=================================================================================================================
//=================================================================================================================
//=================================================================================================================

echo "<tr style='background-color:#e1dede'>";
foreach($arr_week as $arrWeek):
    $GLOBALS["salestotal".$arrWeek] =0;
    $GLOBALS["presentage".$arrWeek] =0;
    $GLOBALS["balance".$arrWeek] =0;
    echo "<th width='200' style='width:175px'>Week -".$arrWeek."</th>";
    echo "<th width='200' style='width:175px'>Date</th>";
    echo "<th width='200' style='width:400px'>Stole</th>";
    echo "<th width='200' style='width:175px'>Total</th>";
    echo "<th width='200' style='width:175px'>18%</th>";
    echo "<th width='200' style='width:175px'>Balance</th>";  
    echo "<td width='200' style='width:175px;background-color:#ccc'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>"; 
endforeach; 
echo "</tr>";   
$this->db->order_by("manufacturer_id","ASC");
$manus= $this->Common_model->get_all("manufacturer_information")->result();
foreach($manus as $manu): 
    echo "<tr>";
    $iteration=0;
    foreach($arr_week as $arrWeek): 
        foreach($arr_wed as $arrTue):
            if($arrWeek==date("W",strtotime($arrTue))):   
                    $prods= $this->Common_model->get_all("product_information" ,["manufacturer_id"=>$manu->id])->result();
                    $manu_total=0;
                    foreach($prods as $prod):
                        $dt=date("Y-m-d",strtotime($arrTue));
                        $this->db->select("SUM(total_price) as pricesum");
                        $prods= $this->Common_model->get_all("sales_order_details" ,["date(acc_date)"=>$arrTue,"product_id"=>$prod->id])->result();
                        $manu_total+= $prods[0]->pricesum;
                    endforeach; 
                    echo "<td width='200' style='width:175px'>".date('D', strtotime($arrTue))."</td>";
                    echo "<td width='200' style='width:175px'>".$arrTue."</td>";
                    echo "<td width='200' style='width:400px'>".$manu->manufacturer_name."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format($manu_total,2,".",",")."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format((($manu_total * $manu->commission)/100),2,".",",")."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format(($manu_total-(($manu_total * $manu->commission)/100)),2,".",",")."</td>";
                    echo "<td width='200' style='width:175px;background-color:#ccc'></td>"; 
                        $GLOBALS["salestotal".$arrWeek] +=$manu_total;
                        $GLOBALS["presentage".$arrWeek] +=(($manu_total * $manu->commission)/100);
                        $GLOBALS["balance".$arrWeek]+=($manu_total-(($manu_total * $manu->commission)/100));
                    $iteration++;
                    break;
            else: 
                if($iteration==0):
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:400px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>"; 
                    echo "<td width='200' style='width:175px;background-color:#ccc'></td>";  
                 endif;
            endif;
            $iteration++; 
        endforeach;  
    endforeach;  
    echo "</tr>";
endforeach;
  echo "<tr>";
foreach($arr_week as $arrWeek):  
    echo "<th width='200' style='width:175px'></th>";
    echo "<th width='200' style='width:175px'></th>";
    echo "<th width='200' style='width:400px'></th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["salestotal".$arrWeek],2,".",",")."</th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["presentage".$arrWeek],2,".",",") ."</th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["balance".$arrWeek],2,".",",") ."</th>"; 
    echo "<td width='200' style='width:175px;background-color:#ccc'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>"; 
endforeach; 
echo "</tr>";  



 //=================================================================================================================
//=================================================================================================================
//=================================================================================================================

echo "<tr style='background-color:#e1dede'>";
foreach($arr_week as $arrWeek):
    $GLOBALS["salestotal".$arrWeek] =0;
    $GLOBALS["presentage".$arrWeek] =0;
    $GLOBALS["balance".$arrWeek] =0;
    echo "<th width='200' style='width:175px'>Week -".$arrWeek."</th>";
    echo "<th width='200' style='width:175px'>Date</th>";
    echo "<th width='200' style='width:400px'>Stole</th>";
    echo "<th width='200' style='width:175px'>Total</th>";
    echo "<th width='200' style='width:175px'>18%</th>";
    echo "<th width='200' style='width:175px'>Balance</th>";  
    echo "<td width='200' style='width:175px;background-color:#ccc'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>"; 
endforeach; 
echo "</tr>";   
$this->db->order_by("manufacturer_id","ASC");
$manus= $this->Common_model->get_all("manufacturer_information")->result();
foreach($manus as $manu): 
    echo "<tr>";
    $iteration=0;
    foreach($arr_week as $arrWeek): 
        foreach($arr_thu as $arrTue):
            if($arrWeek==date("W",strtotime($arrTue))):   
                    $prods= $this->Common_model->get_all("product_information" ,["manufacturer_id"=>$manu->id])->result();
                    $manu_total=0;
                    foreach($prods as $prod):
                        $dt=date("Y-m-d",strtotime($arrTue));
                        $this->db->select("SUM(total_price) as pricesum");
                        $prods= $this->Common_model->get_all("sales_order_details" ,["date(acc_date)"=>$arrTue,"product_id"=>$prod->id])->result();
                        $manu_total+= $prods[0]->pricesum;
                    endforeach; 
                    echo "<td width='200' style='width:175px'>".date('D', strtotime($arrTue))."</td>";
                    echo "<td width='200' style='width:175px'>".$arrTue."</td>";
                    echo "<td width='200' style='width:400px'>".$manu->manufacturer_name."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format($manu_total,2,".",",")."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format((($manu_total * $manu->commission)/100),2,".",",")."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format(($manu_total-(($manu_total * $manu->commission)/100)),2,".",",")."</td>"; 
                    echo "<td width='200' style='width:175px;background-color:#ccc'></td>"; 
                        $GLOBALS["salestotal".$arrWeek] +=$manu_total;
                        $GLOBALS["presentage".$arrWeek] +=(($manu_total * $manu->commission)/100);
                        $GLOBALS["balance".$arrWeek]+=($manu_total-(($manu_total * $manu->commission)/100));
                    $iteration++;
                    break;
            else: 
                if($iteration==0):
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:400px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>"; 
                    echo "<td width='200' style='width:175px'></td>";  
                 endif;
            endif;
            $iteration++; 
        endforeach;  
    endforeach;  
    echo "</tr>";
endforeach;
  echo "<tr>";
foreach($arr_week as $arrWeek):  
    echo "<th width='200' style='width:175px'></th>";
    echo "<th width='200' style='width:175px'></th>";
    echo "<th width='200' style='width:400px'></th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["salestotal".$arrWeek],2,".",",")."</th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["presentage".$arrWeek],2,".",",") ."</th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["balance".$arrWeek],2,".",",") ."</th>"; 
    echo "<td width='200' style='width:175px;background-color:#ccc'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";  
endforeach; 
echo "</tr>";  


//=================================================================================================================
//=================================================================================================================
//=================================================================================================================

echo "<tr style='background-color:#e1dede'>";
foreach($arr_week as $arrWeek):
    $GLOBALS["salestotal".$arrWeek] =0;
    $GLOBALS["presentage".$arrWeek] =0;
    $GLOBALS["balance".$arrWeek] =0;
    echo "<th width='200' style='width:175px'>Week -".$arrWeek."</th>";
    echo "<th width='200' style='width:175px'>Date</th>";
    echo "<th width='200' style='width:400px'>Stole</th>";
    echo "<th width='200' style='width:175px'>Total</th>";
    echo "<th width='200' style='width:175px'>18%</th>";
    echo "<th width='200' style='width:175px'>Balance</th>";  
    echo "<td width='200' style='width:175px;background-color:#ccc'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>"; 
endforeach; 
echo "</tr>";   
$this->db->order_by("manufacturer_id","ASC");
$manus= $this->Common_model->get_all("manufacturer_information")->result();
foreach($manus as $manu): 
    echo "<tr>";
    $iteration=0;
    foreach($arr_week as $arrWeek): 
        foreach($arr_fri as $arrTue):
            if($arrWeek==date("W",strtotime($arrTue))):   
                    $prods= $this->Common_model->get_all("product_information" ,["manufacturer_id"=>$manu->id])->result();
                    $manu_total=0;
                    foreach($prods as $prod):
                        $dt=date("Y-m-d",strtotime($arrTue));
                        $this->db->select("SUM(total_price) as pricesum");
                        $prods= $this->Common_model->get_all("sales_order_details" ,["date(acc_date)"=>$arrTue,"product_id"=>$prod->id])->result();
                        $manu_total+= $prods[0]->pricesum;
                    endforeach; 
                    echo "<td width='200' style='width:175px'>".date('D', strtotime($arrTue))."</td>";
                    echo "<td width='200' style='width:175px'>".$arrTue."</td>";
                    echo "<td width='200' style='width:400px'>".$manu->manufacturer_name."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format($manu_total,2,".",",")."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format((($manu_total * $manu->commission)/100),2,".",",")."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format(($manu_total-(($manu_total * $manu->commission)/100)),2,".",",")."</td>"; 
                    echo "<td width='200' style='width:175px;background-color:#ccc'></td>"; 
                        $GLOBALS["salestotal".$arrWeek] +=$manu_total;
                        $GLOBALS["presentage".$arrWeek] +=(($manu_total * $manu->commission)/100);
                        $GLOBALS["balance".$arrWeek]+=($manu_total-(($manu_total * $manu->commission)/100));
                    $iteration++;
                    break;
            else: 
                if($iteration==0):
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:400px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>"; 
                    echo "<td width='200' style='width:175px;background-color:#ccc'></td>";  
                 endif;
            endif;
            $iteration++; 
        endforeach;  
    endforeach;  
    echo "</tr>";
endforeach;
  echo "<tr>";
foreach($arr_week as $arrWeek):  
    echo "<th width='200' style='width:175px'></th>";
    echo "<th width='200' style='width:175px'></th>";
    echo "<th width='200' style='width:400px'></th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["salestotal".$arrWeek],2,".",",")."</th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["presentage".$arrWeek],2,".",",") ."</th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["balance".$arrWeek],2,".",",") ."</th>"; 
    echo "<td width='200' style='width:175px;background-color:#ccc'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";  
endforeach; 
echo "</tr>";  
  
    
  //=================================================================================================================
//=================================================================================================================
//=================================================================================================================

echo "<tr style='background-color:#e1dede'>";
foreach($arr_week as $arrWeek):
    $GLOBALS["salestotal".$arrWeek] =0;
    $GLOBALS["presentage".$arrWeek] =0;
    $GLOBALS["balance".$arrWeek] =0;
    echo "<th width='200' style='width:175px'>Week -".$arrWeek."</th>";
    echo "<th width='200' style='width:175px'>Date</th>";
    echo "<th width='200' style='width:400px'>Stole</th>";
    echo "<th width='200' style='width:175px'>Total</th>";
    echo "<th width='200' style='width:175px'>18%</th>";
    echo "<th width='200' style='width:175px'>Balance</th>";  
    echo "<td width='200' style='width:175px;background-color:#ccc'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";  
endforeach; 
echo "</tr>";   
$this->db->order_by("manufacturer_id","ASC");
$manus= $this->Common_model->get_all("manufacturer_information")->result();
foreach($manus as $manu): 
    echo "<tr>";
    $iteration=0;
    foreach($arr_week as $arrWeek): 
        foreach($arr_sat as $arrTue):
            if($arrWeek==date("W",strtotime($arrTue))):   
                    $prods= $this->Common_model->get_all("product_information" ,["manufacturer_id"=>$manu->id])->result();
                    $manu_total=0;
                    foreach($prods as $prod):
                        $dt=date("Y-m-d",strtotime($arrTue));
                        $this->db->select("SUM(total_price) as pricesum");
                        $prods= $this->Common_model->get_all("sales_order_details" ,["date(acc_date)"=>$arrTue,"product_id"=>$prod->id])->result();
                        $manu_total+= $prods[0]->pricesum;
                    endforeach; 
                    echo "<td width='200' style='width:175px'>".date('D', strtotime($arrTue))."</td>";
                    echo "<td width='200' style='width:175px'>".$arrTue."</td>";
                    echo "<td width='200' style='width:400px'>".$manu->manufacturer_name."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format($manu_total,2,".",",")."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format((($manu_total * $manu->commission)/100),2,".",",")."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format(($manu_total-(($manu_total * $manu->commission)/100)),2,".",",")."</td>"; 
                    echo "<td width='200' style='width:175px;background-color:#ccc'></td>"; 
                        $GLOBALS["salestotal".$arrWeek] +=$manu_total;
                        $GLOBALS["presentage".$arrWeek] +=(($manu_total * $manu->commission)/100);
                        $GLOBALS["balance".$arrWeek]+=($manu_total-(($manu_total * $manu->commission)/100));
                    $iteration++;
                    break;
            else: 
                if($iteration==0):
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:400px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>"; 
                    echo "<td width='200' style='width:175px;background-color:#ccc'></td>"; 
                 endif;
            endif;
            $iteration++; 
        endforeach;  
    endforeach;  
    echo "</tr>";
endforeach;
  echo "<tr>";
foreach($arr_week as $arrWeek):  
    echo "<th width='200' style='width:175px'></th>";
    echo "<th width='200' style='width:175px'></th>";
    echo "<th width='200' style='width:400px'></th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["salestotal".$arrWeek],2,".",",")."</th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["presentage".$arrWeek],2,".",",") ."</th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["balance".$arrWeek],2,".",",") ."</th>";  
    echo "<td width='200' style='width:175px;background-color:#ccc'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>"; 
endforeach; 
echo "</tr>";  




//=================================================================================================================
//=================================================================================================================
//=================================================================================================================

echo "<tr style='background-color:#e1dede'>";
foreach($arr_week as $arrWeek):
    $GLOBALS["salestotal".$arrWeek] =0;
    $GLOBALS["presentage".$arrWeek] =0;
    $GLOBALS["balance".$arrWeek] =0;
    echo "<th width='200' style='width:175px'>Week -".$arrWeek."</th>";
    echo "<th width='200' style='width:175px'>Date</th>";
    echo "<th width='200' style='width:400px'>Stole</th>";
    echo "<th width='200' style='width:175px'>Total</th>";
    echo "<th width='200' style='width:175px'>18%</th>";
    echo "<th width='200' style='width:175px'>Balance</th>";  
    echo "<td width='200' style='width:175px;background-color:#ccc'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";  
endforeach; 
echo "</tr>";   
$this->db->order_by("manufacturer_id","ASC");
$manus= $this->Common_model->get_all("manufacturer_information")->result();
foreach($manus as $manu): 
    echo "<tr>";
    $iteration=0;
    foreach($arr_week as $arrWeek): 
        foreach($arr_sun as $arrTue): 
            if($arrWeek==date("W",strtotime($arrTue))):   
                    $prods= $this->Common_model->get_all("product_information" ,["manufacturer_id"=>$manu->id])->result();
                    $manu_total=0;
                    foreach($prods as $prod):
                        $dt=date("Y-m-d",strtotime($arrTue));
                        $this->db->select("SUM(total_price) as pricesum");
                        $prods= $this->Common_model->get_all("sales_order_details" ,["date(acc_date)"=>$arrTue,"product_id"=>$prod->id])->result();
                        $manu_total+= $prods[0]->pricesum;
                    endforeach; 
                    echo "<td width='200' style='width:175px'>".date("D",strtotime($arrTue))."</td>";
                    echo "<td width='200' style='width:175px'>".$arrTue."</td>";
                    echo "<td width='200' style='width:400px'>".$manu->manufacturer_name."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format($manu_total,2,".",",")."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format((($manu_total * $manu->commission)/100),2,".",",")."</td>";
                    echo "<td width='200' style='width:175px;text-align:right'>".number_format(($manu_total-(($manu_total * $manu->commission)/100)),2,".",",")."</td>"; 
                    echo "<td width='200' style='width:175px;background-color:#ccc'></td>";  
                        $GLOBALS["salestotal".$arrWeek] +=$manu_total;
                        $GLOBALS["presentage".$arrWeek] +=(($manu_total * $manu->commission)/100);
                        $GLOBALS["balance".$arrWeek]+=($manu_total-(($manu_total * $manu->commission)/100));
                    $iteration++;
                    break;
            else: 
                if($iteration==0):
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:400px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>";
                    echo "<td width='200' style='width:175px'>-</td>"; 
                    echo "<td width='200' style='width:175px;background-color:#ccc'></td>";  
                 endif;
            endif;
            $iteration++; 
        endforeach;  
    endforeach;  
    echo "</tr>";
endforeach;
  echo "<tr>";
foreach($arr_week as $arrWeek):  
    echo "<th width='200' style='width:175px'></th>";
    echo "<th width='200' style='width:175px'></th>";
    echo "<th width='200' style='width:400px'></th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["salestotal".$arrWeek],2,".",",")."</th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["presentage".$arrWeek],2,".",",") ."</th>";
    echo "<th width='200' style='width:175px;text-align:right'>".number_format($GLOBALS["balance".$arrWeek],2,".",",") ."</th>";
    echo "<td width='200' style='width:175px;background-color:#ccc'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";  
endforeach; 
echo "</tr>";  







    // var_dump($arr_mon) ;
    // echo '<br>';
    // var_dump($arr_tue) ;
    // echo '<br>';
    // var_dump($arr_wed) ;
    // echo '<br>';
    // var_dump($arr_thu) ;
    // echo '<br>';
    // var_dump($arr_fri) ;
    // echo '<br>';
    // var_dump($arr_sat) ;
    // echo '<br>';
    // var_dump($arr_sun) ;
    // echo '<br>';
    // var_dump( $arr_week) ;
    // echo '<br>';
        


        // $manus= $this->Common_model->get_all("manufacturer_information")->result();
        // foreach($manus as $manu):
        //     $prods= $this->Common_model->get_all("product_information" ,["manufacturer_id"=>$manu->id])->result();
        //     $manu_total=0;
        //     foreach($prods as $prod):
        //         $dt=date("Y-m-d",strtotime($this->input->get("date")."-".$x));
        //         $this->db->select("SUM(total_price) as pricesum");
        //         $prods= $this->Common_model->get_all("sales_order_details" ,["date(acc_date)"=>$dt,"product_id"=>$prod->id])->result();
        //         $manu_total+= $prods[0]->pricesum;
        //     endforeach;
        //     var_dump($day." - ".date("Y-m-d",strtotime($this->input->get("date")."-".$x)));
        //     echo $manu->manufacturer_name ." - ".$manu_total;
        //     echo "<br>";
        // endforeach;
        
        
        
        
        
        

?>

</table>

</div>
 