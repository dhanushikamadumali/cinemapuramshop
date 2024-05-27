<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Product Module</h4>
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
                                <h6>Add Product </h6>
                            </div>
                            <div class="card-body py-md-30">
                            <?= form_open_multipart("", array("id" => "inForm")); ?>
                                    <div class="row">
                                        <div class="col-md-6 mb-25">
                                            <select class="js-example-basic-single js-states form-control" name="cid">
                                                <option value="">Select Category</option>
                                                <?php
                                                $this->db->select("id,category_name");
                                                $this->db->order_by("category_name","ASC");
                                                $tableResult = $this->Common_model->get_all("product_category")->result();
                                                if ($tableResult):
                                                    foreach ($tableResult as $tableRes):
                                                        ?>
                                                        <option value="<?= $tableRes->id ?>"  > <?= $tableRes->category_name ?></option>
                                                    <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                            <!-- <span class="err err_cid required" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        </div>
                                        <!--<div class="col-md-6 mb-25">-->
                                        <!--    <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Product Code" name="pcode" > -->
                                        <!--     <span class="err err_pcode required" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        <!--</div>-->
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15 pname" placeholder="Product Name" name="pname" > 
                                            <span class="err err_pname required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <!--<div class="col-md-6 mb-25">-->
                                        <!--    <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15 gname" placeholder="Genaric Name" name="gname" > -->
                                        <!--     <span class="err err_gname" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        <!--</div>-->
                                        <!-- <div class="col-md-4 mb-25"> -->
                                            <!-- <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Strength" name="strength" >  -->
                                            <!-- <span class="err err_strength" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        <!-- </div> -->
                                        <!-- <div class="col-md-2 mb-25"> -->
                                          
                                            <!-- <select class="js-example-basic-single js-states form-control" name="measure">
                                                <option value="">Measure</option>
                                                <?php
                                                $this->db->select("id,measure_name");
                                                $tableResult = $this->Common_model->get_all("product_measure")->result();
                                                if ($tableResult):
                                                    foreach ($tableResult as $tableRes):
                                                        ?>
                                                        <option value="<?= $tableRes->measure_name ?>"  > <?= $tableRes->measure_name ?></option>
                                                    <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select> -->
                                            <!-- <span class="err err_measure required" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        <!-- </div> -->
                                        <!-- <div class="col-md-6 mb-25"> -->
                                            <!-- <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Box Size" name="boxsize" >  -->
                                            <!-- <span class="err err_bsize required" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        <!-- </div> -->
                                        <!-- <div class="col-md-6 mb-25"> -->
                                            <!-- <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Product Location" name="plocation" >  -->
                                            <!-- <span class="err err_plocation required" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        <!-- </div> -->
                                        <!-- <div class="col-md-6 mb-25"> -->
                                            <!-- <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Product Model" name="pmodel" >  -->
                                            <!-- <span class="err err_pmodel required" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        <!-- </div> -->
                                        <!--<div class="col-md-6 mb-25">-->
                                        <!--    <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15 pprice" placeholder="Purchase Price" name="pprice" > -->
                                        <!--    <span class="err err_pprice" style="font-size:10px; color: #F5576C !important" ></span>-->
                                        <!--</div>-->
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15 mprice" placeholder="Manufature price" name="mprice" > 
                                            <span class="err err_mprice required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <select class="js-example-basic-single js-states form-control" name="mid" >
                                                <option value="">Select Manufature</option>
                                                <?php
                                                $this->db->select("id,manufacturer_name");
                                                $tableResult = $this->Common_model->get_all("manufacturer_information")->result();
                                                if ($tableResult):
                                                    foreach ($tableResult as $tableRes):
                                                        ?>
                                                        <option value="<?= $tableRes->id ?>"  > <?= $tableRes->manufacturer_name ?></option>
                                                    <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                            <span class="err err_mid required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                      
                                        <!--<div class="col-md-6 mb-25">-->
                                        <!--    <select class="js-example-basic-single js-states form-control" name="unit" >-->
                                        <!--        <option value="">Select Unit</option>-->
                                                <?php
                                                // $this->db->select("id,unit_name");
                                                // $tableResult = $this->Common_model->get_all("product_unit")->result();
                                                // if ($tableResult):
                                                //     foreach ($tableResult as $tableRes):
                                                        ?>
                                                        <!--<option value="<?= $tableRes->id ?>"  > <?= $tableRes->unit_name ?></option>-->
                                                    <?php
                                                //     endforeach;
                                                // endif;
                                                ?>
                                        <!--    </select>-->
                                        <!--     <span class="err err_unit required" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        <!--</div>-->
                                        <!--<div class="col-md-6 mb-25">-->
                                        <!--    <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Product Details" name="pdetail" > -->
                                        <!--     <span class="err err_pdetail" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        <!--</div> -->
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Package Charge" name="pcharge" > 
                                            <!-- <span class="err err_pdetail" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        </div> 
                                        <div class="col-md-6 mb-25">
                                        <!-- <div class="input-group">
                                            <input type="file" name="image" class="image" value="" >
                                            <br/>
                                            <br/>
                                            <input id="pimage" type="hidden" name="pimage" value=""/>
                                            <img src="" name="pimage1"  id="pimage1" >
                                        </div>
                                         -->
                                        <div class="col-md-6">
                                            <div class="layout-button mt-0">
                                                <!--<button type="button" class="btn btn-default btn-squared border-normal bg-normal px-20 ">cancel</button>-->
                                                <button type="button" class="btn btn-primary btn-default btn-squared px-30 save_btn" name="login" value="Log in">Save</button>
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
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Crop image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">  
                                    default image where we will set the src via jquery
                                <img id="image">
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                </div>
            </div>
        </div>
    </div> 

<script type="text/javascript">
     $("body").on('keyup', '.pname', function () {
        $('.gname').val($(this).val());
    });
    $("body").on('keyup', '.pprice', function () {
        $('.mprice').val($(this).val());
    });
 $(".save_btn").click(function (e) {
    e.preventDefault(); 
    $form = $("#inForm"); 
    add_form($form);
    function add_form($form) { 
        var formdata = new FormData($form[0]);
        formdata.append("func_n","ad_product");
        $.ajax({
            type: "post",
            dataType: "JSON",
            url: "<?php echo base_url(); ?>index.php/product/product_ajax",
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $(".err").html("");
                if(data.status==false){
                    // $(".err_cid").html(data.cid);
                    // $(".err_pcode").html(data.pcode);
                    $(".err_pname").html(data.pname);
                    // $(".err_gname").html(data.gname);
                    // $(".err_strength").html(data.strength);
                    // $(".err_measure").html(data.measure);
                    // $(".err_bsize").html(data.bsize); 
                    // $(".err_plocation").html(data.plocation);
                    // $(".err_pmodel").html(data.pmodel);
                    $(".err_pprice").html(data.pprice);
                    $(".err_mid").html(data.mid);
                    $(".err_mprice").html(data.mprice);
                    // $(".err_unit").html(data.unit);
                //   /  $(".err_pdetail").html(data.pdetail);
                 
                        $.each(data.errors, function(key,val) {
                            $(".err_"+key).html(val);
                        });
            
                }else{
                   
                    setTimeout(function(){ window.location.href="<?php echo base_url()?>index.php/product/add_product";  });
                }
            }
        });
    }
}); 

function readURL(input) {
    if (input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#prev_img1')
            .attr('src',e.target.result)
            .height(70)
            .width(80);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function(){
    var  canvas;
    var    url;
    var base64data;

var bs_modal = $('#modal');
    var image = document.getElementById('image');
    var cropper,reader,file;
   
    $("body").on("change", ".image", function(e) {
        var files = e.target.files;
        var done = function(url) {
            image.src = url;
            bs_modal.modal('show');
        };

        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    bs_modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });
  
    $("#crop").click(function() {
        canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
        });
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                $('#pimage').val(base64data);
                $('#pimage1').attr('src',base64data);
                bs_modal.modal('hide');
            };
        });
    });
});  
</script>
