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

$this->db->select('*'); 
$sales_order = $this->Common_model->get_all('sales_order',['sales_order.id'=> $this->input->get('id')])->result();
//$sales_order_payment = $this->Common_model->get_all('sales_order_payment',['order_id'=> $this->input->get('id')])->result();
$this->db->select('sales_order_details.*,product_information.product_name as pname,product_information.manufacturer_id,manufacturer_information.manufacturer_name'); 
$this->db->join("product_information","product_information.id=sales_order_details.product_id","LEFT"); 
$this->db->join("manufacturer_information","manufacturer_information.id=product_information.manufacturer_id","LEFT"); 
$this->db->group_by('product_information.manufacturer_id');
$sales_order_stoles = $this->Common_model->get_all('sales_order_details',['sales_order_details.order_id'=> $this->input->get('id')])->result();
 foreach($sales_order_stoles as $sadetails):
    $items=0;
    $itemqty=0;
    $ttlprice=0;
    $ttldisco=0;
     
    $this->db->select('sales_order_details.*,product_information.product_name as pname,product_information.manufacturer_id'); 
    $this->db->join("product_information","product_information.id=sales_order_details.product_id","LEFT");  
    $sales_order_details = $this->Common_model->get_all('sales_order_details',['sales_order_details.order_id'=> $this->input->get('id'),'product_information.manufacturer_id'=>$sadetails->manufacturer_id])->result();
     ?>
     <div class="container-fluid" style="padding:0px">
    <div class="row">
       <div class="" style="width: 300px">
                <div  style="font-weight: 600;font-size:16px;text-align:center">
               <?php echo  $sadetails->manufacturer_id. " ".$sadetails->manufacturer_name; ?>
                </div>
                <div style="text-align:center;font-weight:700;font-size:14px;text-transform:capitalize"><?= $sales_order[0]->order_type." Bill"  ?></div>
                <div class="row">
                    <div  style="width:40%;font-weight: 600;font-size:14px">Order No</div>
                    <div style="width:60%;"><?=  $this->input->get('id')  ?></div>
                    <div style="width:40%;font-weight: 600;font-size:14px">Date</div>
                    <div  style="width:60%;"><?= date($sales_order[0]->sales_date)  ?></div>     
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
                        foreach($sales_order_details as $sadetails):
                            $items++;
                            ?>
                            <tr>
                                <td style="font-size: 13px;font-weight:600;padding:0px 0px"><?= $sadetails->pname?></td>
                                <td style="text-align:left;padding:0px 4px"><?= $sadetails->item_qty; $itemqty+=$sadetails->item_qty ?></td>
                                <td style="text-align:right;padding:0px 4px"><?= number_format($sadetails->per_price,0,"","") ?></td>
                                <td style="text-align:right;padding:0px 4px"><?= number_format($sadetails->total_price,0,"",""); $ttlprice+=$sadetails->total_price; ?></td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                <div style="margin-top: -10px;margin-bottom: -10px;">------------------------------------------</div> 
                <div class="row" style="font-size:14px">
                    <div  style="width:50%;text-align:center">
                    Item : <?php echo $items ?>
                    </div>
                    <div  style="width:50%;text-align:center">
                    Qty:  <?php echo $itemqty?>
                    </div>
                </div>
                <div style="margin-top: -10px;margin-bottom: -10px;">------------------------------------------</div> 
                <div class="row">
                    <div style="width:50%;font-weight: 600;font-size:14px">Total</div>
                    <div  style="width:50%;font-size:14px;text-align:right"><?= number_format($ttlprice,2,".",",")  ?></div>
               </div>
                <div class="row">
                    <div  style="width:50%;font-weight: 600;font-size:14px">Discount</div>
                    <div  style="width:50%;font-size:14px;text-align:right"> <?= number_format($ttldisco,2,".",",")?> </div>
                </div> 
               <div class="row">
                    <div style="width:50%;font-weight: 600;font-size:14px">Grand Total</div>
                   <div  style="width:50%;font-size:14px;text-align:right"><?= number_format($ttlprice-$ttldisco,2,".",",")  ?></div>
                </div>
                <div style="margin-top: -10px;margin-bottom: -10px;">------------------------------------------</div> 
       </div> 
    </div>
    </div>
    <br>
    <br>
    <?php
endforeach;
   ?>
                        
</body>
</html>

<script>
// $(window).load(function() {
//     window.print();
//     window.close();
// });
$(window).on('load', function(){
     window.print(); 
    setTimeout(function(){ 
            self.close();
         }, 3000);
    
    
    
    //  window.open("<?php //echo base_url() ?>index.php/pos, '_blank');
   // window.open(location, '_self').close(); 
    // window.location.href = '<?php //echo base_url()?>index.php/Pos';
    //window.close();
});



</script>