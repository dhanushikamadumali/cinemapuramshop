<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">User Module</h4>
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
                                <h6>Edit User Role</h6>
                            </div>
                            <div class="card-body py-md-30">
                            <?= form_open_multipart("", array("id" => "inForm")); ?>
                                <?php
                                if ($this->input->get('id')):
                                    // $this->db->select('system_user_permission.*,system_user_type.name as utype,system_user_type.id as utypeid');
                                    // $this->db->join("system_user_type","system_user_type.id=system_user_permission.user_type_id ");
                                    $user=$this->Common_model->get_all("system_user_type",array('id '=> $this->input->get('id')))->result();
                                    if ($user !=NULL):
                                ?>
                                    <div class="row">
                                        <div class="col-md-6 mb-25">
                                        <input type="hidden" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Add User Role" name="usertypeid" value="<?php echo($user[0]->id) ?>" >
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Add User Role" name="usertype" value="<?php echo($user[0]->name) ?>" >
                                            <span class="err err_usertype required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="row">
                                                <div class="product"  >
                                                   	
                                                    <div class="row">
                                                    <?php
                                                    $mCounter=0;
                                                    $ufeartures=$this->Common_model->get_all('system_feature',["parent"=>"0"])->result();
                                                    foreach($ufeartures as $ufear):
                                                        $upermition1=$this->Common_model->get_all("system_user_permission",array('user_type_id'=> $this->input->get('id'),"feature_id"=>$ufear->id))->result();
                                                         $checked1 = $upermition1 ? "checked" : null;  
                                                        $mCounter++;
                                                        ?>
                                                        <div class="col-md-12" style="padding-bottom: 10px;background-color:#ccc">  
                                                        <div class="checkbox-theme-default custom-checkbox ">
                                                            <input class="checkbox" type="checkbox" id="check-un<?php echo  $ufear->id?>"  value="<?php echo  $ufear->id?>" name="features[]" <?= $checked1 ?> >
                                                            <label for="check-un<?php echo  $ufear->id?>"   style="font-size: 16px;color:#4d4d4d">
                                                                <span class="checkbox-text" >
                                                               
                                                                <?php echo  $ufear->name?>
                                                                </span>
                                                            </label>
                                                           
                                                        </div>
                                                        <!-- <input type="checkbox" class="chkbx" value="<?php echo  $ufear->id?>" name="features[]" style="margin-right:8px"  <?= $checked1 ?>><?php echo  $ufear->name?>  -->
                                                        </div>
                                                        <?php
                                                        $ufeartures11=$this->Common_model->get_all('system_feature',["parent"=> $ufear->id])->result();
                                                        foreach($ufeartures11 as $ufear11):
                                                           $upermition=$this->Common_model->get_all("system_user_permission",array('user_type_id'=> $this->input->get('id'),"feature_id"=>$ufear11->id))->result();
                                                            ?> 
                                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="padding-bottom: 10px;"> 
                                                            <?php   $checked = $upermition ? "checked" : null;   ?>
                                                            <div class="checkbox-theme-default custom-checkbox ">
                                                                <input class="checkbox" type="checkbox" id="check-un<?php echo  $ufear11->id?>" value="<?php echo  $ufear11->id?>" name="features[]" <?= $checked ?> >
                                                                <label for="check-un<?php echo  $ufear11->id?>" style="font-size:15px;color:#808080;">
                                                                    <span class="checkbox-text">
                                                                    <?php echo  $ufear11->name?> 

                                                                    </span>
                                                                </label>
                                                            </div>
                                                                
                                                            <!-- <input type="checkbox" class="chkbx" value="<?php echo  $ufear11->id?>" name="features[]"  <?= $checked ?> style="margin-right:8px"><?php echo  $ufear11->name?>  -->
                                                            </div>
                                                            <?php
                                                        endforeach;
                                                        if ($mCounter % 4 == 0):
                                                            ?>
                                                            <!-- </div>
                                                            <div class="row">
                                        
                                                            </div>
                                                            <div class="row"> -->
                                                            <?php
                                                        endif;
                                                        ?>
                                                        <?php
                                                    endforeach;
                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <span class="err err_bbranch required" style="font-size:10px; color: #F5576C !important" ></span> -->
                                            </div>
                                        </div>
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

<script type="text/javascript">

 $(".save_btn").click(function (e) {
    e.preventDefault(); 
    $form = $("#inForm"); 
    add_form($form);
    function add_form($form) { 
        var formdata = new FormData($form[0]);
       
        formdata.append("func_n","edit_user_type");
        $.ajax({
            type: "post",
            dataType: "JSON",
            url: "<?php echo base_url(); ?>index.php/userrole/user_role_ajax",
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
               
                $(".err").html("");
                if(data.status==false){
                    $(".err_usertype").html(data.usertype);
                    // $(".err_bbranch").html(data.bbranch);
                    // $(".err_accno").html(data.accno);
                   
                        $.each(data.errors, function(key,val) {
                            $(".err_"+key).html(val);
                        });
            
                }else{
                   
                    setTimeout(function(){ window.location.reload ()});
                }
                
            }
        });
    }

    
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




</script>
