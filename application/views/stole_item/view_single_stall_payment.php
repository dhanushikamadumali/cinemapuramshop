<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Stall Module</h4>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
                        <div class="card card-Vertical card-default card-md mb-4">
                            <div class="card-header">
                                <h6>View Stall payment </h6>
                            </div>
                            <div class="card-body py-md-30">
                                <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                                    <div class="table-responsive">
                                        <div id="filter-form-container"></div>
                                        <table  class="table mb-0 table-borderless adv-table example" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10">
                                            <thead>
                                                <tr class="userDatatable-header">
                                                 
                                                   
                                                    <th>
                                                        <span class="userDatatable-title">mname</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">amount</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">date</span>
                                                    </th>
                                                    <!-- <th>
                                                        <span class="userDatatable-title">join date</span>
                                                    </th> -->
                                                    <th data-type="html" data-name='status'>
                                                        <span class="userDatatable-title">status</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title float-right">action</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                             <tbody>
                                            <?php
                                            $this->db->select('manufacturer_payment.*,manufacturer_information.manufacturer_name as mname');
                                            $this->db->join("manufacturer_information","manufacturer_information.id=manufacturer_payment.manu_id","left");
                                            $this->db->order_by("id","DESC");
                                            $manu = $this->Common_model->get_all('manufacturer_payment',["manu_id" =>$this->session->userdata("manufaturer_id")])->result();
                                            if ($manu):
                                                foreach ($manu as $information):  
                                            ?>
                                           

                                                <tr>
                                                  
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="userDatatable-inline-title">
                                                                <a href="#" class="text-dark fw-500">
                                                                    <h6> <?= $information->mname ?></h6>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                        <?= $information->amount ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                        <?= $information->date ?> 
                                                        </div>
                                                    </td>
                                                   
                                                   
                                                    <td>
                                                        <div class="userDatatable-content d-inline-block">
                                                            <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                         <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                            <li>
                                                                <a href="#" class="view">
                                                                    <span class="fa fa-eye"></span></a>
                                                            </li>
                                                            <li>
                                                                <a href='<?php echo base_url(); ?>index.php/Stoleitem/stolepaymentEdit?id=<?php echo $information->id; ?>' class="edit">
                                                                   <span class="far fa-edit"></span></a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="delete_btn" id="<?php echo $information->id; ?>">
                                                                   <span class="far fa-trash-alt"></span></a>
                                                            </li>
                                                        </ul>
                                                    </td>
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

<!-- alert -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/sweetalert.js" rel="stylesheet"></script>
<script type="text/javascript">
        $('.example').DataTable();        
   
        $("body").on("click",".delete_btn",function(){
		
            swal({            
                title: "Delete stall payment?",
                text: "Are you sure you want to delete stall payment now !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                   
                })
                .then((willDelete) => {
                if (willDelete) { 
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url(); ?>index.php/stoleitem/stole_item_ajax",
                        data: {
                            func_n: "delete_stole_payment",
                            id: $(this).attr("id"),
                            // orderid: a
                            // man: $(".mname").val()
                        },
                        success: function (data) {
                               
                            // setTimeout(function(){ window.location.reload(); });
                        }
        
                    });
                } 
                    
            }); 
        });                       
</script>
