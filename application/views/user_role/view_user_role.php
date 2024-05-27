<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">User Module</h4>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
                        <div class="card card-Vertical card-default card-md mb-4">
                            <div class="card-header">
                                <h6>View User Role</h6>
                            </div>
                            <div class="card-body py-md-30">
                          

                                <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                                    <div class="table-responsive">
                                       
                                        <div id="filter-form-container"></div>
                                        <table  class="table mb-0 table-borderless adv-table example" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10">
                                            <thead>
                                                <tr class="userDatatable-header">
                                                 
                                                    <th>
                                                        <span class="userDatatable-title">name</span>
                                                    </th>
                                                 
                                                   
                                                    <th>
                                                        <span class="userDatatable-title float-right">action</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                             <tbody>
                                            <?php
                                            $this->db->select('*');
                                            $user = $this->Common_model->get_all('system_user_type')->result();
                                            if ($user):
                                                foreach ($user as $information):  
                                            ?>
                                                <tr>
                                                  
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="userDatatable-inline-title">
                                                                <a href="#" class="text-dark fw-500">
                                                                    <h6> <?= $information->name ?></h6>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                   
                                                   
                                                   
                                                  
                                                    <td>
                                                        <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                            <li>
                                                                <a href="#" class="view">
                                                                    <span class="fa fa-eye"></span></a>
                                                            </li>
                                                            <li>
                                                                <a href='<?php echo base_url(); ?>index.php/Userrole/Edit?id=<?php echo $information->id; ?>' class="edit">
                                                                   <span class="far fa-edit"></span></a>
                                                            </li>
                                                            <li>
                                                                <a href="#" onclick="product(<?php echo $information->id ?>)"class="remove">
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
        
    function product(e) {
       
       swal({
       
        title: "Delete Product?",
        text: "Are you sure you want to delete user permision now!!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      
       })
       .then((willDelete) => {
       if (willDelete) { 
           $.ajax({
               type: "post",
               dataType: "JSON",
               url: "<?php echo base_url(); ?>index.php/Userrole/user_role_ajax",
               data: {
                   func_n: "delete_user_role",
                   id: e,
                   // orderid: a
                   // man: $(".mname").val()
               },
               success: function (data) {
                if(data.status==false){
                        swal("Can't delete this user role!!", "Users have in this user role ", "warning");
                }else{
                   
                    setTimeout(function(){ window.location.reload ()});
                }
               }

           });
       } 
       
   }); 

}                
   
                                        
</script>
