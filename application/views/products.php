<!-- Content Wrapper. Contains page content -->

                                       
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Products</h1>
        <span class="tbltoprgt_btn"><a href="<?php echo base_url('Products/addProducts'); ?>" class="btn btn-flat btn-sm btn-success margn-right-btn">Add New Product</a></span>   

    </section>


    <div class="innercontentdiv whitebg">
                    <div class="alldata_tbl">
                        <div id="all_tbl_container1">
                            <div class="table-responsive"> 
                                <table id="client_tbl" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                      
                                        <th>Product Name</th>
                                        <th>Codes</th>
                                        <th>Made to Measure</th>
                                        <th>Paint to Order</th>
                                        <th>Cutting & Edged</th>
                                        <th>Description</th>
                                        <th>Selling Price (£)</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php if(isset($getAllProduct) && !empty($getAllProduct)){ 
                                              foreach($getAllProduct as $key=>$value){
                                        ?>
                                        <tr>
                                          <td><?php echo $value['itemName']; ?></td>
                                          <td><?php echo $value['codes']; ?></td>
                                          <td><?php echo $value['made_to_measure']; ?></td>
                                          <td><?php echo $value['paint_to_order']; ?></td>
                                          <td><?php echo $value['cutting_edged']; ?></td>
                                          <td><?php echo $value['description']; ?></td>
                                          <td> £<?php echo $value['sellingPrice']; ?></td>
                                        <td>
                                        <a data-toggle="modal" href= "<?php echo base_url('Products/editProducts/').base64_encode($value['itemRowId']); ?>"> <i class="fa fa-pencil" data-toggle="tooltip"  data-original-title="Edit Product"></i></a> |
                                            <a data-toggle="modal" data-target="#deleteProductModal" onclick="setdeleteproductId('<?php echo $value['itemRowId']; ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Product" data-placement="left" title=""></i></a>
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


<!-- delete Category -->
<div class="modal fade issuerpopup" id="deleteProductModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Product</h4>
            </div>
            <!-- Wait Alert -->
            <div id='deleteProductwait_msg' class="alert alert-warning no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
            </div>
            <!-- Error Alert -->
            <div id='deleteProducterror_msg' class="alert alert-danger no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Sorry! </b></span><span id="deleteProducterror_content"></span>
            </div>
            <!-- Success Alert -->
            <div id='deleteProductsuccess_msg' class="alert alert-success no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Success! </b></span><span id="deleteClientsuccess_content"></span>
            </div>
            <form class="form-horizontal" method="post" name="deleteProduct" id="deleteProduct">
                <div class="modal-body">
                    <div class="popupcontentdiv">
                        <h4 class="text-center">Delete !<br><br>Are you sure want to delete this "Product" ?</br></br></h4>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="col-sm-2"></div>
                                <input type="hidden" name="delete_cat_id" id="delete_cat_id" value=""/>
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
      $("#deleteProduct").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#deleteProductsuccess_msg ,#deleteProducterror_msg').slideUp(1000);
        $('#deleteProductwait_msg').slideDown(1000);
       
        var data = $(this).serialize();
                    $.ajax({
                        url: baseURL + "products/deleteProduct",
                        type: "POST",
                        data: data,
                        success: function(result) {
                            if(result==1) {
                                $('#deleteProductsuccess_content').html('Product deleted successfully');
                                $('#deleteProductsuccess_msg').slideDown(1000);
                                $('#deleteProductwait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'Products';
                                }, 4000);
                            } else if(result==0) {
                                window.scrollTo(0, 0);
                                $('#deleteProducterror_content').html("Not Deleted");
                                $('#deleteProductwait_msg').slideUp(1000);
                                $('#deleteProducterror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#deleteProducterror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });
                

    });

    
function setdeleteproductId(id,name) {
    $("#delete_cat_id").val(id);
    

}
    
</script>
