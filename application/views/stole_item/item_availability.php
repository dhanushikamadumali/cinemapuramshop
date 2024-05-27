
<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Stole & item Module</h4>
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
                                <h6>item Availability</h6>
                            </div>
                            <div class="card-body py-md-30">
                            

                                <?= form_open_multipart("", array("id" => "inForm")); ?>
                               
                                    <div class="row">
                                   
                                        <div class="col-md-6 mb-25">
                                          
                                            <select class="js-example-basic-single js-states form-control mname" name="mid" readonly disabled>
                                                <option value="">Select Manufature</option>
                                                <?php
                                                $this->db->select("id,manufacturer_name");
                                                $manu = $this->Common_model->get_all("manufacturer_information")->result();
                                                if ($manu):
                                                    foreach ($manu as $tableRes):
                                                        ?>
                                                        <option value="<?= $tableRes->id ?>" <?php echo ($this->session->userdata("manufaturer_id")== $tableRes->id)?"selected":NULL?> > <?= $tableRes->manufacturer_name ?></option>
                                                    <?php
                                                    endforeach;
                                                endif;
                                                    ?>
                                              
                                            </select>
                                            <span class="err err_bname required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        Shop Open Status
                                        </div>
                                        
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <?php
                                        $details = $this->Common_model->get_all("manufacturer_information",["id"=>$this->session->userdata("manufaturer_id")])->result();
                                         
                                        if( $details ):
                                            if($details[0]->shop_status=="1"){ ?>    
                                            <div class="custom-control custom-switch switch-primary switch-md "> 
                                            <input type="checkbox" class="custom-control-input isshop" id="editch"    value="<?php echo $this->session->userdata("manufaturer_id")?>" checked>
                                            <label class="custom-control-label " for="editch"> </label>
                                                        
                                            
                                        </div>
                                                          
                                        <?php } ?> 
                                        <?php if($details[0]->shop_status=="0") {?>
                                            <div class="custom-control custom-switch switch-primary switch-md "> 
                                            <input type="checkbox" class="custom-control-input isshop" id="editch"   value="<?php echo $this->session->userdata("manufaturer_id")?>" >
                                            <label class="custom-control-label " for="editch"> </label>
                                 
                                        </div>
                                        <?php }
                                        endif;
                                        ?>
                                        </div>
                                        
                                        <div class="row">
                                        
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg3">
                                            <div class="custom-control custom-switch switch-primary switch-md "> 
                                                    <input type="checkbox" class="custom-control-input allsel" id="allsel">
                                                    <label class="custom-control-label" for="allsel">All Select</label>
                                    
                                                </div>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg3">
                                                <input type="text" class="form-control allqty" id="allqty" value="10">
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg3">
                                                <div class="layout-button mt-0">
                                                    <button type="button" class="btn btn-primary   setqty" style="margin:0px">Set Qty</button>  
                                                </div>
                                                
                                            </div>
                                            <!-- <div class="form-check">
                                          <input class="form-check-input allsel" type="checkbox" value="" id="allsel">
                                          <label class="form-check-label" for="allsel">
                                            All select
                                          </label>
                                        </div> -->
                                        
                                    </div>

                                        <div class="row">
                                            
                                            
                                            
                                            
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="row">
                                                <div class="product"  >
                                                </div>
                                            </div>
                                            <!-- <span class="err err_bbranch required" style="font-size:10px; color: #F5576C !important" ></span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="layout-button mt-0">
                                               
                                                <button type="button" class="btn btn-primary btn-default btn-squared px-30 save_btn" name="login" value="Log in">save</button>
                                            </div>
                                        </div>
                                    </div>
                                <?= form_close() ?> 
                            </div>
                        </div>
                        <!-- ends: .card -->

                    </div>
        </div>
    </div>
</div>

</div>
<!-- sweetalert -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/sweetalert.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
        $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>index.php/stoleitem/stole_item_ajax",
        data: {
            "m_id":$(".mname").val(),
            "func_n":"get_product"
            }, 
        success: function (data) {
            $(".product").empty();
            $(".product").append(data);
        
        }
    });
  });

  $("body").on("click",".isitemAvail",function(){
    if($(this).is(':checked')){ 
        $(".prqty-"+$(this).attr("value")).css("display","block");        
    }else{
        $(".prqty-"+$(this).attr("value")).css("display","none");
    }

  });
    $("body").on("click",".setqty",function(){
        $(".quantity input").val( $(".allqty").val()); 
  });
  $("body").on("click",".allsel",function(){ 
    if($(this).is(':checked')){ 
       // alert();
        $(".isitemAvail").prop('checked',true); 
          $(".quantity input").css("display","block");
              
    }else{
        $(".isitemAvail").prop('checked',false); 
        $(".quantity input").css("display","none"); 
    }
});
 
$(".save_btn").click(function (e) {
    $(this).attr("disable",true);
    e.preventDefault(); 

var availItems= new Array();

$(".isitemAvail").each(function(){
    if($(this).is(':checked')){
        var avArr={};
        avArr["prod_id"]=$(this).attr("value");
        avArr["prod_qty"]= $(".prqty-"+$(this).attr("value")).val();
        availItems.push(avArr);
    }
});
// $('.allsel').on("change",function (e) {
    // $(".allsel").on("click",function(){



// $('#allsel').click(function () {    
//      $('input:checkbox').prop('checked', this.checked);    
//  });


//console.log(JSON.stringify(availItems));


    // $form = $("#inForm"); 
    // add_form($form12);
    // function add_form($form) { 
    //     var formdata = new FormData($form[0]);
       
    //     formdata.append("func_n","available_product");
        $.ajax({
            type: "post",
            dataType: "JSON",
            url: "<?php echo base_url(); ?>index.php/stoleitem/stole_item_ajax",
            data: {
                "availarr":JSON.stringify(availItems) ,
                "func_n":"available_product"
            },
            // cache: false,
            // contentType: false,
            // processData: false,
            success: function (data) {
               $(this).attr("disable",false);
                $(".err").html("");
                if(data.status==false){
                    // $(".err_bname").html(data.bname);
                    // $(".err_bbranch").html(data.bbranch);
                    // $(".err_accno").html(data.accno);
                    // notification_message("error","Error Occurred ! Please Check the fields.");
                    //     $.each(data.errors, function(key,val) {
                    //         $(".err_"+key).html(val);
                    //     });
            
                }else{
                 
                    setTimeout(function(){ window.location.reload(); },0);
                }
                
            }
        });
    // }

    
});



$('.mname').change(function(e){

$.ajax({
    type: "post",
    url: "<?php echo base_url(); ?>index.php/stoleitem/stole_item_ajax",
    data: {
        "m_id":$(this).val(),
        "func_n":"get_product"
        }, 
    success: function (data) {
        $(".product").empty();
        $(".product").append(data);
       
    }
});



});

$("#editch").on("click",function(){
    
      
        swal({
        title: "is Shop Open?",
        text: "Are you sure you want to open shop now !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/stoleitem/stole_item_ajax",
                type:'POST',
                data: {
                "mid": $(this).val(),
                "func_n":"shopstatusupdate"
                }, 
                success: function(data){ 
                   
                    
                        setTimeout(function(){window.location.reload();});
                
                }
            });

        } 
        });  
    
     
  });
 

//   $('.isshop').not(this).prop('checked', false);


// $('.chkbx').on("change",function () 
// {
//     // var str ="";
//     $('.chkbx:checked').each(function()
//     {
//         // str+= $(this).val()+" ";
//         $(".quantity").append($(".qty").html() )
//     });
//     // $('#CD_Supplr').val(str);

// });

// $("body").on("click",".chkbx",function(){
//         if($(this).is(':checked')) {
    // $('.quantity').text(" <input  type='text' placeholder='Qty' class='form-control' name='qty[]'  value='>");//use <br /> instead of \n
   
// }else {
   
//   }
      
        // var mnuPrice = $(this).data("manuprice");
    
				// $(this).('
			

    //  alert(mnuprice)
        // alert()
			// var mnuPrice = $(this).find('.pprice').val("pprice");
            // alert(mnuPrice);
			// if(mnuPrice != 'undefined' || mnuPrice != ''){
			// 	$(this).closest('tr').find('.table_rt').val(mnuPrice);
			// }else{
			// 	$(this).closest('tr').find('.table_rt').val(0);
			// }
// });
      

</script>
