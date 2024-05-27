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
                                <h6>Edit Product </h6>
                            </div>
                            <div class="card-body py-md-30">
                            <?= form_open_multipart("", array("id" => "inForm")); ?>
                                    <?php
                                    if ($this->input->get('id')):
                                        $this->db->select('product_information.*');
                                        $product=$this->Common_model->get_all("product_information",array('id' => $this->input->get('id')))->result();
                                        if ($product !=NULL):
                                        
                                    ?>
                                    <div class="row">
                                        <div class="col-md-6 mb-25" hidden >
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Name" name="id" value="<?php echo ($product[0]->id) ?>">
                                        </div>
                                        <div class="col-md-6 mb-25" hidden>
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Product id" name="pid"  value="<?php echo ($product[0]->product_id) ?>" readonly > 
                                            <span class="err err_pid required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <select class="js-example-basic-single js-states form-control" name="cid"  >
                                                <option value="">Select Category</option>
                                                <?php
                                                $this->db->select("id,category_name");
                                                $tableResult = $this->Common_model->get_all("product_category")->result();
                                                if ($tableResult):
                                                    foreach ($tableResult as $tableRes):
                                                        $selected = $product[0]->category_id == $tableRes->id ? "selected" : null; ?>
                                                        <option  <?= $selected ?> value="<?= $tableRes->id ?>"  > <?= $tableRes->category_name ?></option>
                                                    <?php
                                                    endforeach;
                                                endif;
                                            ?>
                                            </select>
                                            <span class="err err_cid required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Product Code" name="pcode"  value="<?php echo ($product[0]->product_code) ?>"> 
                                            <!-- <span class="err err_pcode required" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15 pname" placeholder="Product Name" name="pname"  value="<?php echo ($product[0]->product_name) ?>"> 
                                            <span class="err err_pname required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15 gname" placeholder="Genaric Name" name="gname" value="<?php echo ($product[0]->generic_name) ?>" > 
                                            <!-- <span class="err err_gname" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        </div>
                                        <!-- <div class="col-md-6 mb-25"> -->
                                            <!-- <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Strength" name="strength" value="<?php echo ($product[0]->strength) ?>">  -->
                                            <!-- <span class="err err_strength" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        <!-- </div> -->
                                        <!-- <div class="col-md-6 mb-25"> -->
                                            <!-- <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Box Size" name="boxsize" value="<?php echo ($product[0]->box_size) ?>" >  -->
                                            <!-- <span class="err err_bsize required" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        <!-- </div> -->
                                        <!-- <div class="col-md-6 mb-25"> -->
                                            <!-- <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Product Location" name="plocation" value="<?php echo ($product[0]->product_location) ?>">  -->
                                            <!-- <span class="err err_plocation required" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        <!-- </div> -->
                                        <!-- <div class="col-md-6 mb-25"> -->
                                            <!-- <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Product Model" name="pmodel" value="<?php echo ($product[0]->product_model) ?>" >  -->
                                            <!-- <span class="err err_pmodel required" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        <!-- </div> -->
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15 pprice" placeholder="Purchase Price" name="pprice"  value="<?php echo ($product[0]->purchase_price) ?>"> 
                                            <span class="err err_pprice" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15 mprice" placeholder="Manufature price" name="mprice"  value="<?php echo ($product[0]->manufacturer_price) ?>" > 
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
                                                        $selected = $product[0]->manufacturer_id  == $tableRes->id ? "selected" : null; ?>
                                                        <option  <?= $selected ?> value="<?= $tableRes->id ?>"  > <?= $tableRes->manufacturer_name ?></option>
                                                    <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                            <span class="err err_mid required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        
                                        <div class="col-md-6 mb-25">
                                          
                                            <select class="js-example-basic-single js-states form-control" name="unit" >
                                                <option value="">Select Unit</option>
                                                <?php
                                                $this->db->select("id,unit_name");
                                                $tableResult = $this->Common_model->get_all("product_unit")->result();
                                                if ($tableResult):
                                                    foreach ($tableResult as $tableRes):
                                                        $selected = $product[0]->unit  == $tableRes->id ? "selected" : null; 
                                                       
                                                        ?>
                                                        <option <?= $selected ?> value="<?= $tableRes->id ?>"  > <?= $tableRes->unit_name ?></option>
                                                    <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                            <!-- <span class="err err_unit required" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Product Details" name="pdetail" value="<?php echo ($product[0]->product_details) ?>" > 
                                            <!-- <span class="err err_pdetail" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        </div>  
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Package Charge" name="pcharge" value="<?php echo ($product[0]->package_charge)?"":$product[0]->package_charge ?>" > 
                                            <!-- <span class="err err_pdetail" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        </div> 
                                        <!-- <div class="col-md-6 mb-25"> -->
                                            <!-- <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="pimage"  name="pimage" onchange="readURL(this) " >
                                                <input  type="hidden" class="custom-file-input" id="old-pimage"  name="old-pimage" value="<?=$product[0]->image?>" onchange="readURL(this) " >
                                                <label class="custom-file-label" for="pimage">Choose file</label>
                                            </div>
                                            </div>
                                            <br/> -->
                                            <!-- <img id="prev_img" src="<?= base_url()."./assets/content/product_images/". $product[0]->image ?>"  alt="<?php echo ($product[0]->product_name) ?>" width="75px" height="65px"/>    -->
                                            <!-- <input type="file" name="image" class="image" value="<?= base_url()."assets/content/product_images/".$product[0]->image?>" > -->
                                            <!-- <br/> -->
                                            <!-- <br/> -->
                                            
                                            <!-- <input id="pimage" type="hidden" name="pimage" /> -->
                                            <!-- <img  src="<?= base_url()."assets/content/product_images/".$product[0]->image?>"  id="pimage1" > -->
                                        <!-- </div> -->
                                       
                                        <div class="col-md-6">
                                            <div class="layout-button mt-0">
                                                <button type="button" class="btn btn-default btn-squared border-normal bg-normal px-20 ">cancel</button>
                                                <button type="button" class="btn btn-primary btn-default btn-squared px-30 save_btn" name="login" value="Log in">save</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                         endif;
                                    endif;
                                    ?>
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
        formdata.append("func_n","edit_productfull");
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
                    $(".err_pid").html(data.pid);
                    // $(".err_cid").html(data.cid);
                    $(".err_pname").html(data.pname);
                    // $(".err_gname").html(data.gname);
                    // $(".err_strength").html(data.strength);
                    // $(".err_bsize").html(data.bsize); 
                    // $(".err_plocation").html(data.plocation);
                    // $(".err_pmodel").html(data.pmodel);
                    $(".err_pprice").html(data.pprice);
                    $(".err_mid").html(data.mid);
                    $(".err_mprice").html(data.mprice);
                    // $(".err_unit").html(data.unit);
                    // $(".err_pdetail").html(data.pdetail);
                  
                        $.each(data.errors, function(key,val) {
                            $(".err_"+key).html(val);
                        });
            
                }else{
                   
                   // setTimeout(function(){ window.location.href="<?php echo base_url()?>index.php/Product/view_product";  });
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
