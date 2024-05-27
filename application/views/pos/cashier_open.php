<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">POS Module</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap"  style="display:none"> 
                </div> 
            </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
                        <div class="card card-Vertical card-default card-md mb-4">
                            <div class="card-header">
                                <h6>Cashier Open Date</h6>
                            </div>
                            <div class="card-body py-md-30">
                                <?php
                                     $query = $this->db->query("SELECT * FROM cashier_open ORDER BY id DESC LIMIT 1")->result(); 
                                     if($query[0]->close_date == 0|| $query[0]->close_date == null): 
                                    ?>
                                    <div class="row">
                                        <div class="col-md-3 mb-25"><label>Open Date Time</label></div>
                                        <div class="col-md-3 mb-25"><input  class="form-control odate" id="odate" name="odate" value="<?= $query[0]->opendate ?>" readonly></div> 
                                    </div>
                                    <div class="row">
                                    <div class="col-md-3 mb-25"><label>Close Date</label></div> 
                                        <div class="col-md-6">
                                            <div class="layout-button mt-0">
                                                <button type="button" class="btn btn-primary btn-default btn-squared px-30 close_btn">Close Cashier Now</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                     else: 
                                    ?>
                                         <div class="row">
                                            <div class="col-md-3 mb-25"><label>Open Date</label></div> 
                                            <div class="col-md-6">
                                                <div class="layout-button mt-0">
                                                    <button type="button" class="btn btn-primary btn-default btn-squared px-30 open_btn" >Open Date</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        endif;
                                    ?>
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

$("body").on("click", ".open_btn", function (e) {
   
        e.preventDefault();
        swal({title: "Cashire Open date?",
            text: "Are you sure you want to open cashier date now !",
            icon: "warning",
            buttons: true,
            dangerMode: true})
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "post",
                            url: "<?php echo base_url(); ?>index.php/pos/pos_ajax",
                            data: {
                                func_n: "cashier_open"
                            },
                            success: function (data) {
                                window.location.href = "<?php echo base_url(); ?>index.php/pos/"; 
                            }
                        });
                    }
                });
    });


    $("body").on("click", ".close_btn", function (e) {
   
   e.preventDefault();
   swal({title: "Cashire Close Date?",
       text: "Are you sure you want to close cashier date now !",
       icon: "warning",
       buttons: true,
       dangerMode: true})
           .then((willDelete) => {
               if (willDelete) {
                   $.ajax({
                       type: "post",
                       url: "<?php echo base_url(); ?>index.php/pos/pos_ajax",
                       data: {
                           func_n: "cashier_close" 
                       },
                       success: function (data) { 
                               window.location.reload(); 
                       }
                   });
               }
           });
});




</script>
