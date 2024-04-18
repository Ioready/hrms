
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit Quotes</h1>
                       

    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Wait Alert -->
                <div id="editQuoteswait_msg" class="alert alert-warning no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <!-- Error Alert -->
                <div id="editQuoteserror_msg" class="alert alert-danger no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! </b></span><span id="editQuoteserror_content"></span>
                </div>
                <!-- Success Alert -->
                <div id="editQuotessuccess_msg" class="alert alert-success no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Success! </b></span><span id="editQuotessuccess_content"></span>
                </div>
                <div class="frmdtls_center_500">
                    <!-- Horizontal Form -->
                    <div class="box box-info allfrmdtls_boxcontent">
                <div class="modal-body scroll-y">
                    	<!-- <h3 class="text-center pink-text font-bold py-4 mr-1 pdgn-top"><strong>Subscribe</strong></h3> -->
                        <form class="form-horizontal" name="editQuotes" id="editQuotes" method="post">
                                    <?php
                                    foreach ($getAllQuotes as $key=>$value) {
                                        ?>
                                    <input id="p_id" class="form-control "  name="p_id" type="hidden" value="<?php echo $value['id']; ?>">  
                                    <div class="form-group col-lg-4 col-sm-12 mb-5 ">
                                        <label for="name_client" class="form-label mb-3">Client:<span class="redtxt">*</span></label>
                                        <div class="input-group">
                                        <input id="client" class="form-control " placeholder="Client" name="client" type="text" value="<?php echo $value['client_id']; ?>">
                                         </div>
                                    </div>
                                    <div class="form-group col-lg-4 col-sm-12 mb-5 ">
                                        <label for="quotes_id" class="form-label mb-3">Quotes <span class="redtxt">#</span></label>
                                        <div class="input-group">
                                        <input id="quotes_name" class="form-control " placeholder="" name="quotes_name" type="text" value="<?php echo $value['name']; ?>">
                                         </div>
                                    </div>
                                    
                                    <div class="form-group col-lg-4 col-sm-12 mb-5">
                                    <label for="price" class="form-label mb-3">Quotes Date:<span class="redtxt">*</span></label>
                                        <div class="input-group">
                                        <input id="quotes_date" class="form-control " autocomplete="off" required data-focus="false"  type="text" name="quotes_date" type="text" value="<?php echo $value['quotes_date']; ?>">
                                         </div>
                                    </div>

                                    <div class="form-group col-lg-4 col-sm-12 mb-5 ">
                                        <label for="price" class="form-label mb-3">Due Date:<span class="redtxt">*</span></label>
                                        <div class="input-group">
                                        <input id="due_date" class="form-control " autocomplete="off" required data-focus="false"  type="text" name="due_date" type="text" value="<?php echo $value['due_date']; ?>">
                                         </div>
                                    </div>
                                    

                                <div class="form-group col-lg-4 col-sm-12 sm-5 ">
                                    <label for="status" class="form-label required mb-3">status:</label>
                                    <div class="input-group col-sm-5">
                                          <select name="quotes_status" id="quotes_status" class="form-control">
                                        
                                              <option value="">status</option>
                                              <option value="unpaid">Unpaid
                                                <option value="paid">Paid
                                                <option value="partially paid">Partially Paid
                                                <option value="overdue">Overdue
                                                <option value="processing">Processing
                                          </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-4 col-sm-12 sm-5 ">
                                    <label for="template" class="form-label required mb-3">Quotes Template:</label>
                                    <div class="input-group col-sm-5">
                                          <select name="template_id" id="template_id" class="form-control">
                                              <option value=""></option>
                                              <option value="unpaid">Unpaid
                                                <option value="paid">Paid
                                                <option value="partially paid">Partially Paid
                                                <option value="overdue">Overdue
                                                <option value="processing">Processing
                                          </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4 col-sm-12 sm-5 ">
                                    <label for="qr_code" class="form-label required mb-3">Payment QR Code:</label>
                                    <div class="input-group col-sm-5">
                                          <select name="qr_code_id" id="qr_code_id" class="form-control">
                                              <option value=""></option>
                                              <option value="unpaid">Unpaid
                                                <option value="paid">Paid
                                                <option value="partially paid">Partially Paid
                                                <option value="overdue">Overdue
                                                <option value="processing">Processing
                                          </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4 col-sm-12 sm-5 ">
                                    <label for="qr_code" class="form-label required mb-3">Currencies:</label>
                                    <div class="input-group col-sm-5">
                                          <select name="currency_id" id="currency_id" class="form-control">
                                              <option value=""></option>
                                              <option value="unpaid">Unpaid
                                                <option value="paid">Paid
                                                <option value="partially paid">Partially Paid
                                                <option value="overdue">Overdue
                                                <option value="processing">Processing
                                          </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <!-- <label class="form-label mb-3">Image:
                                          <input name="file" id="file" value="" type="file" placeholder="" class="form-control frm-bor-rad"> -->
                                        </div>
                                    </div> 
                                </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-green btn-flat">Save</button>
                                <button type="button" class="btn btn-green btn-flat">Discard</button>
                            </div>
                            <?php }?> 
                            <!-- /.box-footer -->
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

    $("#editQuotes").submit(function(e) {
        e.preventDefault();

        window.scrollTo(0, 0);
        $('#addProductwait_msg').slideDown(1000);
        var data = $(this).serialize();
       
                    $.ajax({
                        url: baseURL + "Quotes/updateQuotes",
                        type: "POST",
                        data: data,
                        success: function(result) {
                            if (result >= 1) {
                                $('#editQuotessuccess_content').html('Quotes updated successfully');
                                $('#editQuotessuccess_msg').slideDown(1000);
                                $('#editQuoteswait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'Quotes';
                                }, 4000);
                            } else {
                                window.scrollTo(0, 0);
                                $('#editQuoteserror_content').html(result);
                                $('#editQuoteswait_msg').slideUp(1000);
                                $('#editQuoteserror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#editQuoteserror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });
            $("#quotes_date,#due_date").datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: 0,
            format: "yyyy-mm-dd",
        });
            });
    </script>