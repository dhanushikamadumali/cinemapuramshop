<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Stole & Item Module</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap"  style="display:none">
                        <div class="action-btn">

                            <div class="form-group mb-0">
                                <div class="input-container icon-left position-relative">
                                    <span class="input-icon icon-left">
                                        <span data-feather="calendar"></span>
                                    </span>
                                    <input type="text" class="form-control form-control-default date-ranger" name="date-ranger" placeholder="Oct 30, 2019 - Nov 30, 2019">
                                    <span class="input-icon icon-right">
                                        <span data-feather="chevron-down"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
                        <div class="card card-Vertical card-default card-md mb-4">
                            <div class="card-header">
                                <h6>Today Available Item  </h6>
                            </div>
                            <div class="card-body py-md-30">
                                <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                                    <div class="table-responsive">
                                        <div id="filter-form-container"></div> 
                                        <?php 
                                        $this->db->select('product_purchase_details.id,prod_date,purchase_qty,quantity,sold_qty,product_information.product_name as pname,manufacturer_information.manufacturer_name as mname');
                                        $this->db->join("product_information","product_information.id=product_purchase_details.product_id");
                                        $this->db->join("manufacturer_information","manufacturer_information.id=product_information.manufacturer_id");
                                        // $todayitem=$this->Common_model->get_all("product_purchase_details",["product_purchase_details.prod_date"=>date("Y-m-d")])->result();
                                        $todayitem=$this->Common_model->get_all("product_purchase_details",["date(product_purchase_details.prod_date)"=>date("Y-m-d"),"manufacturer_information.id"=>$this->session->userdata("manufaturer_id")])->result();
                                        ?>
                                        <table class="table mb-0 table-borderless adv-table example" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10">
                                            <thead>
                                                <tr class="userDatatable-header">
                                                  
                                                    <th>
                                                        <span class="userDatatable-title">Product name</span>
                                                    </th>
                                                    <!--<th>-->
                                                    <!--    <span class="userDatatable-title">Manufature name</span>-->
                                                    <!--</th>-->
                                                    <!--<th>-->
                                                    <!--    <span class="userDatatable-title">Date</span>-->
                                                    <!--</th>-->
                                                     
                                                    <th>
                                                        <span class="userDatatable-title">Purchase qty</span>
                                                    </th>
                                                     
                                                    <th>
                                                        <span class="userDatatable-title">Available qty </span>
                                                    </th>
                                                 
                                                    <th>
                                                        <span class="userDatatable-title">Sold qty</span>
                                                    </th>
                                                   
                                                   
                                                    <th data-type="html" data-name='status'>
                                                        <span class="userDatatable-title">status</span>
                                                    </th>
                                                    <!-- <th>
                                                        <span class="userDatatable-title float-right">action</span>
                                                    </th> -->
                                                </tr>
                                            </thead>
                                             <tbody>
                                       
                                                <?php
                                                if ($todayitem):
                                                    foreach ($todayitem as $information): 
                                                        
                                                ?>
                                                <tr>
                                                
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="userDatatable-inline-title">
                                                                <a href="#" class="text-dark fw-500">
                                                                    <h6> <?= $information->	pname ?></h6>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--  <td>-->
                                                    <!--    <div class="d-flex">-->
                                                    <!--        <div class="userDatatable-inline-title">-->
                                                    <!--            <a href="#" class="text-dark fw-500">-->
                                                    <!--                <h6> <?= $information->mname ?></h6>-->
                                                    <!--            </a>-->
                                                    <!--        </div>-->
                                                    <!--    </div>-->
                                                    <!--</td>-->
                                                    <!--<td>-->
                                                    <!--    <div class="d-flex">-->
                                                    <!--        <div class="userDatatable-inline-title">-->
                                                    <!--            <a href="#" class="text-dark fw-500">-->
                                                    <!--                <h6> <?= $information->prod_date ?></h6>-->
                                                    <!--            </a>-->
                                                    <!--        </div>-->
                                                    <!--    </div>-->
                                                    <!--</td>-->
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="userDatatable-inline-title">
                                                                <a href="#" class="text-dark fw-500">
                                                                    <h6> <?= $information->purchase_qty?></h6>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="userDatatable-inline-title">
                                                               
                                                                <div class="input-group" style="width:150px;height:auto">
                                                                      <div class="input-group-prepend">
                                                                          <button type="button" class="input-group-text minus" value=""  style="border-radius: 0px;padding:0rem 1rem"><i class="fa fa-minus" ></i></button>
                                                                      </div>
                                                                      <div class='custom-file'>
                                                                      <input type="hidden" value="<?= $information->sold_qty?>" class="sold_qty">
                                                                        <input type="hidden" value="<?= $information->id?>" class="pid" />
                                                                          <input  class="form-control-plaintext a text-center cngqty qty" placeholder="current quantity" id='qty' name='qty' value='<?php echo number_format($information->quantity,0,"","");?> ' oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..?)\../g, '$1');">
                                                                      </div>
                                                                      <div class="input-group-prepend qtyparent ">
                                                                          <button class="input-group-text pluse" type="button"  value="" style="border-radius: 0px;;padding:0rem 1rem" ><i class='fa fa-plus'></i></button>
                                                                      </div>
                                                                  </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="userDatatable-inline-title">
                                                                <a href="#" class="text-dark fw-500">
                                                                   
                                                                    <h6> <?= $information->sold_qty?></h6>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content d-inline-block">
                                                            <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -->
                                                        <!-- <ul class="orderDatatable_actions mb-0 d-flex flex-wrap"> -->
                                                            <!-- <li>
                                                                <a href="#" class="view">
                                                                <span class="fa fa-eye"></span></a>
                                                            </li> -->
                                                            <!-- <li>
                                                                <a href='#' class="editbtn" id="<?= $information->id  ?>">
                                                                <span class="far fa-edit"></span></a>
                                                            </li> -->
                                                            <!-- <li>
                                                                <a href="#" class="remove">
                                                                <span class="far fa-trash-alt"></span></a>
                                                            </li> -->
                                                        <!-- </ul>
                                                    </td> -->
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
                        <!-- ends: .card -->

                    </div>
        </div>
    </div>
</div>

</div>

<script type="text/javascript">
        $('.example').DataTable({
              "aLengthMenu": [[50, 150, -1], [50, 150, "All"]],
        "iDisplayLength": 50,
        "order": [[0, "ASC"]]
        });        
   
        $("body").on("click",".editbtn",function(e){
        e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?php echo base_url(); ?>index.php/stoleitem/stole_item_ajax",
                data: {
                    func_n: "get_today_item_update",
                    id: $(this).attr("id"),
                    // orderid: a
                    // man: $(".mname").val()
                },
                success: function (data) {
                    console.log(data);
                    $(".product_list_modal").modal('show');
                    $(".product").empty();
                    $(".product").append(data);
                    // setTimeout(function(){ window.location.reload(); });
                }
            });
    });   
    $("body").on("click", ".close", function () {
        $(".product_list_modal").modal('hide');
    });
    $("body").on('click', '.pluse', function (e) {
       
        var qty = $(this).parent().parent().find('.qty').val();
        $(this).parent().parent().parent().find('.qty').val(parseInt(qty) + 1);
        var pid = $(this).parent().parent().find('.pid').val();  
        
        
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>index.php/stoleitem/stole_item_ajax",
            data: {
                "func_n":"today_available_item_update",
                "qty":(parseInt(qty) + 1),
                "pid":pid
            },
            success: function () { 
               // setTimeout(function(){ window.location.reload(); });
       
            }
        });
        
    });

    $("body").on('click', '.minus', function () {
        var qty = $(this).parent().parent().find('.qty').val();
        var soldqty = $(this).parent().parent().find('.sold_qty').val();
       
        $(this).parent().parent().parent().find('.qty').val(parseInt(qty) - 1);
        var pid = $(this).parent().parent().find('.pid').val();
        if (soldqty > qty) {
            // alert(soldqty);
            // var balance = reamount-total;
            // $('.in_pu_balance').val(balance.toFixed(2));
        } else {
              $.ajax({
                type: "post",
                url: "<?php echo base_url(); ?>index.php/stoleitem/stole_item_ajax",
                data: {
                    "func_n":"today_available_item_update",
                    "qty":(parseInt(qty) - 1),
                    "pid":pid
                },
                success: function () { 
                   // setTimeout(function(){ window.location.reload(); });
       
                }
            });
        }
        
    });




             
</script>

