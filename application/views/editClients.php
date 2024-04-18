
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Update Client</h1>
                       
<?php $value = reset($getClient); ?>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Wait Alert -->
                <div id="editClientwait_msg" class="alert alert-warning no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <!-- Error Alert -->
                <div id="editClienterror_msg" class="alert alert-danger no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! </b></span><span id="editClienterror_content"></span>
                </div>
                <!-- Success Alert -->
                <div id="editClientsuccess_msg" class="alert alert-success no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Success! </b></span><span id="editClientsuccess_content"></span>
                </div>
                <div class="frmdtls_center_700">
                    <!-- Horizontal Form -->
                    <div class="box box-info allfrmdtls_boxcontent">
                    	<!-- <h3 class="text-center pink-text font-bold py-4 mr-1 pdgn-top"><strong>Subscribe</strong></h3> -->
                        <form class="form-horizontal" name="editClient" id="editClient" method="post">
                            <input type="hidden" name="ca_id" id="ca_id" value="<?php echo base64_encode($value['ca_id']); ?>">
                            <div class="box-body frm-bor-rad-nd">                              
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">First Name <span class="redtxt">*</span></label>
                                          <input name="ca_fname" id="edit_ca_fname" value="<?php echo $value['ca_fname'];  ?>" type="text" placeholder="" class="form-control frm-bor-rad" required="">
                                        <!-- <span id="usernameError" class="redtxt txt_left" style="float:left;display: none;">Client name already exists.</span> -->
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Last Name <span class="redtxt">*</span></label>
                                          <input name="ca_lname" id="edit_ca_lname" value="<?php echo $value['ca_lname'];  ?>" type="text" placeholder="" class="form-control frm-bor-rad" required="">
                                        <!-- <span id="usernameError" class="redtxt txt_left" style="float:left;display: none;">Client name already exists.</span> -->
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Email ID <span class="redtxt">*</span></label>
                                          <input name="ca_email" id="edit_ca_email" value="<?php echo $value['ca_emailid'];  ?>" type="text" placeholder="" class="form-control frm-bor-rad" required="">
                                        <!-- <span id="usernameError" class="redtxt txt_left" style="float:left;display: none;">Client name already exists.</span> -->
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Contact No <span class="redtxt">*</span></label>
                                          <input name="ca_phoneNumber" id="edit_ca_phoneNumber" value="<?php echo $value['ca_phoneNumber'];  ?>" type="text" placeholder="" class="form-control frm-bor-rad" required="">
                                        <!-- <span id="usernameError" class="redtxt txt_left" style="float:left;display: none;">Client name already exists.</span> -->
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Password <span class="redtxt">*</span></label>
                                          <input name="ca_password" id="edit_ca_password" value="<?php echo $value['ca_password'];  ?>" type="text" placeholder="" class="form-control frm-bor-rad" required="">
                                        <!-- <span id="usernameError" class="redtxt txt_left" style="float:left;display: none;">Client name already exists.</span> -->
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Confirm Password <span class="redtxt">*</span></label>
                                          <input name="ca_confirm_password" id="edit_ca_confirm_password" value="<?php echo $value['ca_confirm_password'];  ?>" type="text" placeholder="" class="form-control frm-bor-rad" required="">
                                        <!-- <span id="usernameError" class="redtxt txt_left" style="float:left;display: none;">Client name already exists.</span> -->
                                        </div>
                                    </div>
                                                                      
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Website <span class="redtxt">*</span></label>
                                          <input name="ca_website" id="edit_ca_website" value="<?php echo $value['ca_website'];  ?>" type="text" placeholder="" class="form-control frm-bor-rad" required="">
                                        <!-- <span id="usernameError" class="redtxt txt_left" style="float:left;display: none;">Client name already exists.</span> -->
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Postal Code <span class="redtxt">*</span></label>
                                          <input name="ca_postalcode" id="edit_ca_postalcode" value="<?php echo $value['ca_postalcode'];  ?>" type="text" placeholder="" class="form-control frm-bor-rad" required="">
                                        <!-- <span id="usernameError" class="redtxt txt_left" style="float:left;display: none;">Client name already exists.</span> -->
                                        </div>
                                    </div>
                                   

                                    <!-- <div class="form-group" >
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Country </label>
                                          <select name="country" id="country" class="form-control frm-bor-rad">
                                              <option value="">Country</option>
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
                                    </div> -->

                                    <!-- <div class="form-group" >
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">State </label>
                                          <select name="state" id="state" class="form-control frm-bor-rad">
                                              <option value="">State</option>
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
                                    </div> -->
                                    
                                    <!-- <div class="form-group" >
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">City </label>
                                          <select name="city" id="city" class="form-control frm-bor-rad">
                                              <option value="">City</option>
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
                                    </div> -->

                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Address<span class="redtxt">*</span></label>
                                          <input name="ca_address" id="edit_ca_address" value="<?php echo $value['ca_address'];  ?>" type="text" placeholder="" class="form-control frm-bor-rad" required="">
                                        <!-- <span id="usernameError" class="redtxt txt_left" style="float:left;display: none;">Client name already exists.</span> -->
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Notes<span class="redtxt">*</span></label>
                                          <input name="ca_notes" id="edit_ca_notes" value="<?php echo $value['ca_notes'];?>" type="text" placeholder="" class="form-control frm-bor-rad" required="">
                                        <!-- <span id="usernameError" class="redtxt txt_left" style="float:left;display: none;">Client name already exists.</span> -->
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">GSTIN<span class="redtxt">*</span></label>
                                          <input name="ca_gstin" id="edit_ca_gstin" value="<?php echo $value['ca_gstin'];?>" type="text" placeholder="" class="form-control frm-bor-rad" required="">
                                        <!-- <span id="usernameError" class="redtxt txt_left" style="float:left;display: none;">Client name already exists.</span> -->
                                        </div>
                                    </div>
                                </div>

                               
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-green btn-flat">Update</button>
                            </div>
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
    $(document).ready(function(){
    $("#editClient").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#editClientwait_msg').slideDown(1000);
        var data = $(this).serialize();
                    $.ajax({
                        url: baseURL + "client/updateclient",
                        type: "POST",
                        data: data,
                        success: function(result) {
                            if (result == 1) {
                                $('#editClientsuccess_content').html('Client updated successfully');
                                $('#editClientsuccess_msg').slideDown(1000);
                                $('#editClientwait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'client';
                                }, 4000);
                            }
                            else if (result == 3) {
                                window.scrollTo(0, 0);
                                $('#editClienterror_content').html('Client Name Already Exists!..');
                                $('#editClientwait_msg').slideUp(1000);
                                $('#editClienterror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#editClienterror_msg').slideUp(1000);
                                }, 4000);
                            } else {
                                window.scrollTo(0, 0);
                                $('#editClienterror_content').html(result);
                                $('#editClientwait_msg').slideUp(1000);
                                $('#editClienterror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#editClienterror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });
          });
</script>
