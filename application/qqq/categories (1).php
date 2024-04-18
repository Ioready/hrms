<!-- Content Wrapper. Contains page content -->

                                       
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Category</h1>
        <span class="tbltoprgt_btn"><a data-toggle="modal"data-target="#addcategory" class="btn btn-flat btn-sm btn-success margn-right-btn">Add Category</a></span>   

    </section>

    <div class="innercontentdiv whitebg">
                    <div class="alldata_tbl">
                        <div id="all_tbl_container1">
                            <div class="table-responsive"> 
                                <table id="client_tbl" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php if(isset($getAllCategory) && !empty($getAllCategory)){ 
                                              foreach($getAllCategory as $key=>$value){
                                                
                                        ?>
                                        <tr>
                                          <td><?php echo $value['name']; ?></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#updateCategoryModal" onclick="setUpdateCategoryId('<?php echo $value['id'];?>','<?php echo $value['name'];?>');"><i class="fa fa-pencil" data-toggle="tooltip"  data-original-title="Edit Category"></i></a> | 

                                            <a data-toggle="modal" data-target="#deleteClientModal" onclick="setdeleteCategoryId('<?php echo $value['id']; ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Category" data-placement="left" title=""></i></a>
                                          </td>
                                        </tr>
                                      <?php }} ?>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>   
                </div>             
            
    
    <!-- /.content -->
</div>


<!-- add category -->
<div id="addcategory" class="modal fade in">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X</button>
                <h1 class="modal-title text-center">Add Category</h1>
            </div>
            <div class="modal-body">
                <div id='addClientwait_msg' class="alert alert-warning no-border" style="display: none;">
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <div id='addClienterror_msg' class="alert alert-danger no-border" style="display: none;">
                    <span class="text-semibold"><b>Sorry! </b></span><span id="addClienterror_content"></span>
                </div>
                <div id='addClientsuccess_msg' class="alert alert-success no-border" style="display: none;">
                    <span class="text-semibold"><b>Success! </b></span><span id="addClientsuccess_content"></span>
                </div>
                <form name="addcategoryform" id="addcategoryform" method="post">
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        <label for="name" class="form-label required mb-3">Name:</label>
                        <input id="category_name" class="form-control form-control-solid" required="" placeholder="Name" name="category_name" type="text">
                    </div>
                </div>
                <div class="modal-footer pt-0">
                <button type="submit" class="btn btn-primary me-2" id="btnSave" data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing...">Save</button>
                <button type="button" class="btn btn-secondary btn-active-light-primary me-3" data-bs-dismiss="modal">Cancel</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- update category -->
<div id="updateCategoryModal" class="modal fade in">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X</button>
                <h1 class="modal-title text-center">update Category</h1>
            </div>
            <div class="modal-body">
                <div id='updateCategorywait_msg' class="alert alert-warning no-border" style="display: none;">
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <div id='updateCategoryerror_msg' class="alert alert-danger no-border" style="display: none;">
                    <span class="text-semibold"><b>Sorry! </b></span><span id="updateCategoryerror_content"></span>
                </div>
                <div id='updateCategorysuccess_msg' class="alert alert-success no-border" style="display: none;">
                    <span class="text-semibold"><b>Success! </b></span><span id="updateCategorysuccess_content"></span>
                </div>
                
               
                <form name="updatecategoryform" id="updatecategoryform" method="post">
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                    <input type="hidden" name="edit_cat_id" id="edit_cat_id" value=""/>
                        <label for="name" class="form-label required mb-3">Name:</label>
                        <input id="edit_category_name" class="form-control form-control-solid" required="" placeholder="Name" name="edit_category_name" type="text" value=""/>
                        
                        
                    </div>
                </div>
               
                <div class="modal-footer pt-0">
                <button type="submit" class="btn btn-primary me-2" id="btnSave" data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing...">Save</button>
                <button type="button" class="btn btn-secondary btn-active-light-primary me-3" data-bs-dismiss="modal">Cancel</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- delete Category -->
<div class="modal fade issuerpopup" id="deleteClientModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete User</h4>
            </div>
            <!-- Wait Alert -->
            <div id='deleteClientwait_msg' class="alert alert-warning no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
            </div>
            <!-- Error Alert -->
            <div id='deleteClienterror_msg' class="alert alert-danger no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Sorry! </b></span><span id="deleteClienterror_content"></span>
            </div>
            <!-- Success Alert -->
            <div id='deleteClientsuccess_msg' class="alert alert-success no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Success! </b></span><span id="deleteClientsuccess_content"></span>
            </div>
            <form class="form-horizontal" method="post" name="deleteCategory" id="deleteCategory">
                <div class="modal-body">
                    <div class="popupcontentdiv">
                        <h4 class="text-center">Delete !<br><br>Are you sure want to delete this "Category" ?</br></br></h4>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="col-sm-2"></div>
                                <input type="hidden" name="delete_cat_id" id="delete_cat_id" value="<?php echo ($value['id']); ?>"/>
                                <div class="col-sm-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-flat btn-green">Yes,Delete!</button>
                        <div class="btn btn-default btn-flat" data-dismiss="modal">No,Cancel</div>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>


<!-- add category -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $("#addcategoryform").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#addClientsuccess_msg,#addClienterror_msg').slideUp(1000);
        $('#addClientwait_msg').slideDown(1000);
       
        var data = $(this).serialize();
                    $.ajax({
                        url: baseURL + "categories/addCategory",
                        type: "POST",
                        data: data,
                        success: function(result) {
                            if(result==1) {
                                $('#addClientsuccess_content').html('Category saved successfully');
                                $('#addClientsuccess_msg').slideDown(1000);
                                $('#addClientwait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'categories';
                                }, 4000);
                            } else if(result==0) {
                                window.scrollTo(0, 0);
                                $('#addClienterror_content').html("The name has already been taken.");
                                $('#addClientwait_msg').slideUp(1000);
                                $('#addClienterror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#addClienterror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });

        //  update
         $("#updatecategoryform").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#updateCategorysuccess_msg,#updateCategoryerror_msg').slideUp(1000);
        $('#updateCategorywait_msg').slideDown(1000);
       
        var data = $(this).serialize();
                    $.ajax({
                        url: baseURL + "categories/updateCategory",
                        type: "POST",
                        data: data,
                        success: function(result) {
                            if(result==1) {
                                $('#updateCategorysuccess_content').html('Category updated successfully');
                                $('#updateCategorysuccess_msg').slideDown(1000);
                                $('#updateCategorywait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'categories';
                                }, 4000);
                            } else if(result==0) {
                                window.scrollTo(0, 0);
                                $('#updateCategoryerror_content').html("The name has already been taken.");
                                $('#updateCategorywait_msg').slideUp(1000);
                                $('#updateCategoryerror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#updateCategoryerror_msg').slideUp(1000);
                                }, 4000);

                            }
                            else {
                                window.scrollTo(0, 0);
                                $('#updateCategoryerror_content').html("Not Updated");
                                $('#updateCategorywait_msg').slideUp(1000);
                                $('#updateCategoryerror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#updateCategoryerror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });
            


            
      $("#deleteCategory").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#deleteClientsuccess_msg ,#deleteClienterror_msg').slideUp(1000);
        $('#deleteClientwait_msg').slideDown(1000);
       
        var data = $(this).serialize();
                    $.ajax({
                        url: baseURL + "categories/deleteCategory",
                        type: "POST",
                        data: data,
                        success: function(result) {
                            if(result==1) {
                                $('#deleteClientsuccess_content').html('Category deleted successfully');
                                $('#deleteClientsuccess_msg').slideDown(1000);
                                $('#deleteClientwait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'categories';
                                }, 4000);
                            } else if(result==0) {
                                window.scrollTo(0, 0);
                                $('#deleteClienterror_content').html("Not Deleted");
                                $('#deleteClientwait_msg').slideUp(1000);
                                $('#deleteClienterror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#addClienterror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });
                

    });

    function setUpdateCategoryId(id,name) {
    $("#edit_cat_id").val(id);
    $("#edit_category_name").val(name);

}
function setdeleteCategoryId(id,name) {
    $("#delete_cat_id").val(id);
    

}
    
</script>
