
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit Product</h1>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Wait Alert -->
                <div id="addProductwait_msg" class="alert alert-warning no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <!-- Error Alert -->
                <div id="addProducterror_msg" class="alert alert-danger no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! </b></span><span id="addProducterror_content"></span>
                </div>
                <!-- Success Alert -->
                <div id="addProductsuccess_msg" class="alert alert-success no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Success! </b></span><span id="addProductsuccess_content"></span>
                </div>
                <div class="frmdtls_center_700">
                    <!-- Horizontal Form -->
                    <div class="box box-info allfrmdtls_boxcontent">
                    	<!-- <h3 class="text-center pink-text font-bold py-4 mr-1 pdgn-top"><strong>Subscribe</strong></h3> -->
                        <form class="form-horizontal" name="editProduct" id="editProduct" method="post">
                                <?php
                                    foreach ($getAllproduct as $key=>$value) {
                                        ?> 
                                         
                            <div class="box-body frm-bor-rad-nd">                              

                            <input type="hidden"  value="<?php echo $this->uri->segment(3) ?>" name="itemID">
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Product Name:</label>
                                          <input name="itemName" id="itemName" value="<?php echo $value['itemName']; ?>" type="text" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Codes:</label>
                                          <input name="codes" id="codes" value="<?php echo $value['codes']; ?>" type="text" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Made to Measure:</label>
                                          <input name="made_to_measure" id="made_to_measure" value="<?php echo $value['made_to_measure']; ?>" type="text" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Paint to Order:</label>
                                          <input name="paint_to_order" id="paint_to_order" placeholder="" class="form-control frm-bor-rad" value="<?php echo $value['paint_to_order']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Cutting & Edged:</label>
                                          <input name="cutting_edged" id="cutting_edged" placeholder="" class="form-control frm-bor-rad" value="<?php echo $value['cutting_edged']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Description:</label>
                                          <input name="description" id="description" value="<?php echo $value['description']; ?>" type="text" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div>

                                   
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Selling Price:</label>
                                          <input name="sellingPrice" id="sellingPrice" placeholder="" class="form-control frm-bor-rad" value="<?php echo $value['sellingPrice']; ?>">
                                        </div>
                                    </div>
                                   
                                    

                  
                                  
                                </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-green btn-flat">Save</button>
                                <a href= "<?php echo base_url('products/');?>"><button type="button" class="btn btn-green btn-flat" >Discard</button></a>
                            </div>
                            <!-- /.box-footer -->
                            <?php }?> 
                        </form>
                    </div>
                    <!-- /.box -->
            </div>
        </div>
    </section>               


            
    
    <!-- /.content -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() { 

    $("#editProduct").submit(function(e) {
        e.preventDefault();

        window.scrollTo(0, 0);
        $('#addProductwait_msg').slideDown(1000);
        var data = $(this).serialize();
       
                    $.ajax({
                        url: baseURL + "products/updateProduct",
                        type: "POST",
                        data: data,
                        success: function(result) {
                            if (result >= 1) {
                                $('#addProductsuccess_content').html('Product updated successfully');
                                $('#addProductsuccess_msg').slideDown(1000);
                                $('#addProductwait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'Products';
                                }, 4000);
                            } else {
                                window.scrollTo(0, 0);
                                $('#addProducterror_content').html(result);
                                $('#addProductwait_msg').slideUp(1000);
                                $('#addProducterror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#addProducterror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });
            });
    </script>