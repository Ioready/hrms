
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
                <div class="frmdtls_center_500">
                    <!-- Horizontal Form -->
                    <div class="box box-info allfrmdtls_boxcontent">
                <div class="modal-body scroll-y">
                    	<!-- <h3 class="text-center pink-text font-bold py-4 mr-1 pdgn-top"><strong>Subscribe</strong></h3> -->
                        <form class="form-horizontal" name="editProduct" id="editProduct" method="post">
                                <?php
                                    foreach ($getAllproduct as $key=>$value) {
                                        ?>
                                    <input id="p_id" class="form-control "  name="p_id" type="hidden" value="<?php echo $value['id']; ?>">
                                    <div class="form-group col-lg-4 col-sm-12 mb-5 ">
                                        <label for="name_product" class="form-label mb-3">Name:<span class="redtxt">*</span></label>
                                        <div class="input-group">
                                        <input id="p_name" class="form-control " placeholder="Name" name="p_name" type="text" value="<?php echo $value['name']; ?>">
                                         </div>
                                    </div>
                                    <div class="form-group col-lg-4 col-sm-12 mb-5 ">
                                        <label for="code" class="form-label mb-3">Product Code:<span class="redtxt">*</span></label>
                                        <div class="input-group">
                                        <input id="p_code" class="form-control " placeholder="Product Code" name="p_code" type="text" value="<?php echo $value['product_code']; ?>">
                                         </div>
                                    </div>
                                    
                                    <div class="form-group col-lg-4 col-sm-12 mb-5">
                                     <label for="category" class="form-label required mb-3">Category:</label>
                                          <select name="category_name" id="category_name" class="form-control">
                                              <option value="">Category</option>
                                              <option value="Afghanistan">Afghanistan
                                                <option value="Albania">Albania
                                                <option value="Algeria">Algeria
                                                <option value="American Samoa">American Samoa
                                                <option value="Andorra">Andorra
                                                <option value="Angola">Angola
                                                <option value="Anguilla">Anguilla
                                                <option value="Antarctica">Antarctica
                                                <option value="Antigua And Barbuda">Antigua And Barbuda
                                                <option value="Argentina">Argentina
                                                <option value="Armenia">Armenia
                                                <option value="Aruba">Aruba
                                                <option value="Australia">Australia
                                                <option value="Austria">Austria
                                                <option value="Azerbaijan">Azerbaijan
                                                <option value="Bahamas The">Bahamas The
                                                <option value="Bahrain">Bahrain
                                                <option value="Bangladesh">Bangladesh
                                                <option value="Barbados">Barbados
                                                <option value="Belarus">Belarus
                                                <option value="Belgium">Belgium
                                                <option value="Belize">Belize
                                                <option value="Benin">Benin
                                                <option value="Bermuda">Bermuda
                                                <option value="Bhutan">Bhutan
                                          </select>
                                    
                                    </div>

                                    <div class="form-group col-lg-4 col-sm-12 mb-5 ">
                                        <label for="price" class="form-label mb-3">Unit Price<span class="redtxt">*</span></label>
                                        <div class="input-group">
                                        <input id="u_price" class="form-control " placeholder="Unit Price:" name="u_price" type="text" value="<?php echo $value['unit_price']; ?>">
                                         </div>
                                    </div>
                                    


                                    <div class="form-group col-lg-4 col-sm-12 mb-5 ">
                                    <label for="price" class="form-label mb-3">Description:</label>
                                        <div class="input-group">
                                        <textarea class="form-control " placeholder="Description" id="u_notes" name="u_notes" rows="4" cols="50"><?php echo $value['description'];?></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="form-label mb-3">Image:
                                          <input name="file" id="file" value="" type="file" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div>
                                </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-green btn-flat">Save</button>
                                <button type="button" class="btn btn-green btn-flat">Discard</button>
                            </div>
                            <!-- /.box-footer -->
                            <?php }?> 
                        </form>
                    </div>
                    <!-- /.box -->
                </div>   
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