<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >
            </div>
        </div>
        <div class="row">
           
        <div class="col-lg-12">
                        <div class="card card-Vertical card-default card-md mb-4">
                            <div class="card-header">
                                <h6>All Kot </h6>
                            </div>
                            <div class="card-body py-md-30">
                                <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                                <input type="hidden" class="mid" value="<?php echo $this->session->userdata("manufaturer_id") ?>">
                                    <div class="row">
                                    <div class="table-responsive col-md-12">
                                            <table class="table "> 
                                            <tr style="font-size:13px"> 
                                                      <td style="width:10%;float:left">
                                                      <b>order id</b>
                                                      </td>
                                                      <td style="width:30%;float:left">
                                                      <b>product name</b>
                                                      </td>
                                                      <td style="width:20%;float:left">
                                                      <b> Date</b>
                                                      </td>
                                                      <td style="width:20%;float:left">
                                                      <b> Total quantity</b>
                                                      </td>
                                                      <td style="width:20%;float:left">
                                                      <b> Total Price</b>
                                                      </td>
                                                  </tr>  
                                                  <?php  
                                                  $kots= $this->db->query('SELECT * FROM `sales_order_details` JOIN product_information as pi ON pi.id=sales_order_details.product_id WHERE manufacturer_id='.$this->session->userdata("manufaturer_id").'')->result();
                                                      $oddeven=0;
                                                  
                                                  foreach($kots as $manu):
                                                    $oddeven++;
                                                      ?>
                                                      <tr  class="row" style="font-size:13px;<?php echo ($oddeven%2==1)?"background-color:#ccc":"background-color:#d9daf8"  ?>"> 
                                                          <td style="width:10%;float:left">
                                                          <?= $manu->order_id  ?>
                                                          </td>
                                                          <td style="width:30%;float:left">
                                                          <?= $manu->product_name  ?>
                                                          </td>
 
                                                          <td style="width:20%;float:left">
                                                          <?= $manu->order_date ?>
                                                          </td>
                                                          <td style="width:20%;float:left">
                                                          <?= $manu->item_qty  ?>
                                                          </td>
                                                          <td style="width:20%;float:left">
                                                          <?= $manu->total_price  ?>
                                                          </td>
                                                      </tr>
                   
                                                  <?php
                                                       endforeach;
            
                                                  ?>
                                            </table>
                                        </div>
                                    </div>
                                   
                                <div class="row">
                                    &nbsp;
                                </div>
                                   
                                   
                                </div>

                                </div>
                            </div>
                        </div>
                        <!-- ends: .card -->

                    </div>
        </div>
    </div>
</div>

</div>
<script>

</script>
