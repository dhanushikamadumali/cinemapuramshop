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
</head>

<?php
$saleid = $this->input->get('id');

$this->db->select('sales_order.*,system_user.name,user_name'); //,system_user_type.name as urolename
// $this->db->join("system_user_type","system_user_type.id=sales_order.user_role","left");
$this->db->join("system_user","sales_order.add_by=system_user.id","left");
$sales_order = $this->Common_model->get_all('sales_order',['sales_order.id'=> $this->input->get('id')])->result();
//var_dump($sales_order);
if(!$sales_order):
  die(); 
endif;
$sales_order_payment = $this->Common_model->get_all('sales_order_payment',['order_id'=> $this->input->get('id')])->result();

$this->db->select('sales_order_details.*,product_information.product_name as pname,product_information.manufacturer_id');
$this->db->join("product_information","product_information.id=sales_order_details.product_id");
$sales_order_details = $this->Common_model->get_all('sales_order_details',['sales_order_details.order_id'=> $this->input->get('id'),'sales_order_details.status'=>1])->result();

$itemcount  = $this->db->query("SELECT count(product_id) as pid from sales_order_details where order_id= '$saleid'")->result();

$itemquty  = $this->db->query("SELECT SUM(item_qty) as qty from sales_order_details where order_id= '$saleid'")->result();
?>
<div class="container-fluid" style="padding:0px">
    <div class="row">
       <!--<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>-->
       <div class="" style="width: 300px">
                <img src="<?= base_url()."assets/content/logo/logo.jpg" ?>" style="display: block; margin-left: auto; margin-right: auto; width: 50%;margin-top:10px" >
                <div style="font-size: 25px;text-align:center;font-weight:800">CINEMA PURAM</div>
                <div style="font-size: 16px;text-align:center">No 20,Marine Drive, Bambalapitiya</div> 
                <div style="font-size: 20px;text-align:center">077 47 47 777</div>
                <div style="margin-top: -10px;margin-bottom: -10px;">------------------------------------------</div> 
                <div style="text-align:center;font-weight:700;font-size:15px;text-transform:capitalize"><?= $sales_order[0]->order_type." bill"  ?></div>
                <div class="row">
                     <div style="width:40%;font-weight: 600;font-size:14px">Bill No</div>
                    <div  style="width:60%;"> <?= ($sales_order)?$sales_order[0]->transaction_no :"";    //($sales_order_payment)?$sales_order_payment[0]->transaction_no:"" ?></div>
                    
                    <div  style="width:40%;font-weight: 600;font-size:14px">Table No</div>
                    <div style="width:60%;"><?=  $sales_order[0]->token_number ?></div>
                
                    <div style="width:40%;font-weight: 600;font-size:14px">Date</div>
                    <div  style="width:60%;"><?= date($sales_order[0]->sales_date)  ?></div>     
                    
                   <div style="width:40%;font-weight: 600;font-size:14px">User Role</div>
                   <div style="width:60%;"> <?php echo $sales_order[0]->user_name ?></div>
                
                    <div style="width:40%;font-weight: 600;font-size:14px;padding-right:0px">Payment Mode</div>
                    <div style="width:60%;"><?= ($sales_order_payment)?$sales_order_payment[0]->payment_type:"" ?></div>
                </div>
                <div style="margin-top: -10px;margin-bottom: -10px;">------------------------------------------</div> 
                
                    <table class="table " style="padding:0px;margin-bottom:0px;font-size:13px">
                        <thead>
                            <tr>
                                <td style="font-size: 13px;font-weight:600;padding:0px 0px">Item</td>
                                <td style="font-size:13px;font-weight:600;padding:0px 4px;text-align:left">Qty</td>
                                <td style="font-size: 13px;font-weight:600;padding:0px 4px;text-align:right">Price</td>
                                <td style="font-size: 13px;font-weight:600;padding:0px 4px;text-align:right">Amount</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $itemlinetotal=0;
                        foreach($sales_order_details as $sadetails):
                            ?>
                            <tr>
                                <td style="font-size: 13px;font-weight:600;padding:0px 0px"><?= $sadetails->pname?></td>
                                <td style="text-align:left;padding:0px 4px"><?= $sadetails->item_qty?></td>
                                <td style="text-align:right;padding:0px 4px"><?= number_format($sadetails->per_price,0,"","")?></td>
                                <td style="text-align:right;padding:0px 4px"><?= number_format($sadetails->total_price,0,"",""); $itemlinetotal+= $sadetails->total_price ?></td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                <div style="margin-top: -10px;margin-bottom: -10px;">------------------------------------------</div> 
                <div class="row" style="font-size:14px">
                    
                    <div  style="width:50%;text-align:center">
                    Total Item : <?= $itemcount[0]->pid ?>
                    </div>
                    
                    <div  style="width:50%;text-align:center">
                    Total Qty:  <?=$itemquty[0]->qty?>
                    </div>
                    
                </div>
                <div style="margin-top: -10px;margin-bottom: -10px;">------------------------------------------</div> 
                <?php $finaltotal;?>
                <div class="row">
                    <div  style="width:50%;font-weight: 600;font-size:14px">Sub Total</div>
                    <div  style="width:50%;font-size:14px;text-align:right"> <?= number_format($itemlinetotal,2,".",","); ?></div>
                </div> 
                <div class="row">
                    <div  style="width:50%;font-weight: 600;font-size:14px">CP Discount</div>
                    <div  style="width:50%;font-size:14px;text-align:right"> <?= number_format($sales_order[0]->total_discount,2,".",",") ?></div>
                </div>
                
                <?php
                $ftt=0;
                if($sales_order[0]->order_type=="dine-in"):
                    ?>
                     <div class="row">
                        <div  style="width:50%;font-weight: 600;font-size:14px">Service Charge</div>
                        <div  style="width:50%;font-size:14px;text-align:right"> <?= number_format($sales_order[0]->service_charge,2,".",",") ?></div>
                    </div>
                    <?php
                   $ftt= ($itemlinetotal-$sales_order[0]->total_discount)+$sales_order[0]->service_charge;
                  else:
                      ?>
                       <div class="row">
                        <div  style="width:50%;font-weight: 600;font-size:14px">Packaging Charge</div>
                        <div  style="width:50%;font-size:14px;text-align:right"> <?= number_format($sales_order[0]->packaging_charge,2,".",",") ?></div>
                    </div>
                     <div class="row">
                        <div  style="width:50%;font-weight: 600;font-size:14px">Delivery Charge</div>
                        <div  style="width:50%;font-size:14px;text-align:right"> <?= number_format($sales_order[0]->delivery_charge,2,".",",") ?></div>
                    </div><?php
                    $ftt= ($itemlinetotal-$sales_order[0]->total_discount)+$sales_order[0]->packaging_charge+$sales_order[0]->delivery_charge;
                    endif;
                ?> 
                 <div class="row">
                    <div  style="width:50%;font-weight: 600;font-size:15px">Total</div>
                    <div  style="width:50%;font-weight: 600;font-size:15px;text-align:right"> <?= number_format($ftt,2,".",",") ?></div>
                </div>
               <div class="row">
                    <div style="width:50%;font-weight: 600;font-size:14px">Customer Paid</div>
                    <div  style="width:50%;font-size:14px;text-align:right"><?= number_format($sales_order[0]->customer_paid,2,".",",")?></div>
               </div>
               <div class="row">
                    <div style="width:50%;font-weight: 600;font-size:14px">Balance</div>
                   <div  style="width:50%;font-size:14px;text-align:right">  <?=  $sales_order[0]->customer_paid - $sales_order[0]->total_amount. ".00"?></div>
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

<?php 
$this->db->select('product_information.manufacturer_id'); 
$this->db->join("product_information","product_information.id=sales_order_details.product_id","LEFT"); 
$this->db->group_by('product_information.manufacturer_id');
$sales_order_stoles = $this->Common_model->get_all('sales_order_details',['sales_order_details.order_id'=> $this->input->get('id'),'sales_order_details.status'=>1])->result(); 
?>

<script>
<? 
// if($sales_order):
?>
    
$(window).on('load', function(){
    window.print();  
    <?php
    //foreach($sales_order_stoles as $sadetails):
      ?>
     // window.open("<?php //echo base_url() ?>index.php/pos/kotbill?id=" + <?php //echo $this->input->get('id')?>+ "&stall_id="+<?php //echo $sadetails->manufacturer_id?>, '_blank');
      <?php  
   // endforeach; 
    ?>
    setTimeout(function(){ 
        self.close();
    },3000);    
});

<?
// endif;
?>
 
</script>