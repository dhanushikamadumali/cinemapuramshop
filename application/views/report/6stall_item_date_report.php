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
    $stallid= $this->input->get("mid");
    // var_dump($stallid);
    $fromdate =  $this->input->get("fromdate");
    $todate = $this->input->get("todate");
   

    
?>
<div  style="padding:0px">
    <div>
       <div  style="width: 300px">
                <img src="<?= base_url()."assets/content/logo/logo.jpg" ?>" style="display: block; margin-left: auto; margin-right: auto; width: 50%;margin-top:10px" >
                <div style="font-size: 25px;text-align:center;font-weight:800">CINAMA PURAM</div>
                <div style="font-size: 20px;text-align:center">No 20,Marine Drive, Bambalapitiya</div> 
                <div style="font-size: 20px;text-align:center">077 47 47 777</div>
                <div style="margin-top:0px;margin-bottom: 0px;">------------------------------------------</div> 
                <div class="row">
                    <div  style="width:40%;float:left;font-weight: 600;font-size:15px">From Date</div>
                    <div style="width:60%;float:left;text-align:right"><?=$fromdate?></div> 
                    <div style="width:40%;float:left;font-weight: 600;font-size:15px">To Date</div>
                    <div  style="width:60%;float:left;text-align:right"><?=  $todate ?></div>     
                    <?php
                    // $stallid = $this->Common_model->get_all("manufacturer_information",["id"=>$stallid])->result();
                    $stalldetails = $this->db->query("SELECT * FROM manufacturer_information WHERE id=$stallid")->result();
                   
                   ?>
                      <div style="width:40%;float:left;font-weight: 600;font-size:15px">Stall</div>
                    <div  style="width:60%;float:left;text-align:right"><?= $stalldetails[0]->manufacturer_name?></div> 
                    
                </div>
                <div style="margin-top: 0px;margin-bottom: 0px;">------------------------------------------</div> 
           
             
                    
            
                <div class="row" style="background-color:#ccc;width:100%;padding:10px;text-align:center">
                        QUANTITIES BY ITEMS
                        </div>
                    <?php
                  
                       $condition6 = ["status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))];
                      $this->db->group_by('product_id ');
                      $proddid = $this->Common_model->get_all("sales_order_details",$condition6)->result();
                  
                    // $proddid = $this->db->query("SELECT product_id as pid  FROM sales_order_details WHERE   date(order_date) BETWEEN '$fromdate' AND ' $todate ' GROUP BY product_id ")->result();
                    
                      $itemallqty=0;
                      $itemallprice=0;
                     foreach( $proddid as $prod):
                        $pid =  $prod->product_id;
                        $prodid = $this->Common_model->get_all("product_information",["manufacturer_id"=>$stallid,"id"=>$pid])->result();

                         foreach($prodid as $prodids):
                            $this->db->select('SUM(item_qty) as sumqty, SUM(total_price) as totlprice');
                            $condition7 = ["product_id"=>$prodids->id,"status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))];
                            $proddetails = $this->Common_model->get_all("sales_order_details",$condition7)->result();
                           
                            $itemallqty +=$proddetails[0]->sumqty;
                            $itemallprice +=$proddetails[0]->totlprice;
                    ?>
                     <div class="row" style="font-size:13px"> 
                        <div style="width:60%;float:left">
                        <?=$prodids->product_name?>
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
             
                 
                <div style="margin-top: -10px;margin-bottom: -10px;">------------------------------------------</div> 
                <div  style="font-weight: 600;font-size:15px;text-align:center">
                Thank you!!! come Again
                </div>
       </div> 
    </div>
    </div>

</body>
</html>