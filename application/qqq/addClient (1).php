
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Add Client</h1>
                       

    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Wait Alert -->
                <div id="addClientwait_msg" class="alert alert-warning no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <!-- Error Alert -->
                <div id="addClienterror_msg" class="alert alert-danger no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! </b></span><span id="addClienterror_content"></span>
                </div>
                <!-- Success Alert -->
                <div id="addClientsuccess_msg" class="alert alert-success no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Success! </b></span><span id="addClientsuccess_content"></span>
                </div>
                <div class="frmdtls_center_700">
                    <!-- Horizontal Form -->
                    <div class="box box-info allfrmdtls_boxcontent">
                    	<!-- <h3 class="text-center pink-text font-bold py-4 mr-1 pdgn-top"><strong>Subscribe</strong></h3> -->
                        <form class="form-horizontal" name="addClient" id="addClient" method="post">
                           
                            <div class="box-body frm-bor-rad-nd">                              
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">First Name <span class="redtxt">*</span></label>
                                          <input name="fname" id="fname" value="" type="text" placeholder="" class="form-control frm-bor-rad" required="">
                                          <span id="usernameError" class="redtxt txt_left" style="float:left;display: none;">Client name already exists.</span>

                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Last Name <span class="redtxt">*</span></label>
                                          <input name="lname" id="lname" value="" type="text" placeholder="" class="form-control frm-bor-rad"  required="">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                     <div class="form-group">                                        
                                          <label class="control-label lab-nd">Email <span class="redtxt">*</span></label>
                                          <input name="emailid" id="emailid" value="" type="email" placeholder="" class="form-control frm-bor-rad" required>
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Contact No <span class="redtxt">*</span></label>
                                          <input name="phoneNumber" id="phoneNumber" value="" type="tel" placeholder="" class="form-control frm-bor-rad" required>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                            <label class="control-label lab-nd">Password <span class="redtxt">*</span></label>
                                            <input name="password" id="password" required="" value="" type="text" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Confirm Password <span class="redtxt">*</span></label>
                                          <input name="confirm_password" id="confirm_password" value="" type="text" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Website <span class="redtxt">*</span></label>
                                          <input name="website" id="website" value="" type="text" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Postal Code <span class="redtxt">*</span></label>
                                          <input name="postalcode" id="postalcode" value="" type="text" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Address <span class="redtxt">*</span></label>
                                          <input name="address" id="address" value="" type="text" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Notes <span class="redtxt">*</span></label>
                                          <input name="notes" id="notes" value="" type="text" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Profile <span class="redtxt">*</span></label>
                                          <input name="ca_developerKey" id="ca_developerKey" value="" type="text" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">GSTIN <span class="redtxt">*</span></label>
                                          <input name="gstin" id="gstin" value="" type="text" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div>
                                </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-green btn-flat">Save</button>
                                <button type="button" class="btn btn-green btn-flat">Discard</button>
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
    $("#addClient").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#addClientwait_msg').slideDown(1000);
        var data = $(this).serialize();
                    $.ajax({
                        url: baseURL + "client/addClient_ctrl",
                        type: "POST",
                        data: data,
                        success: function(result) {
                            if (result == 1) {
                                $('#addClientsuccess_content').html('Client added successfully');
                                $('#addClientsuccess_msg').slideDown(1000);
                                $('#addClientwait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'client';
                                }, 4000);
                            }
                            else if (result == 3) {
                                window.scrollTo(0, 0);
                                $('#addClienterror_content').html('Client Name Already Exists!..');
                                $('#addClientwait_msg').slideUp(1000);
                                $('#addClienterror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#addClienterror_msg').slideUp(1000);
                                }, 4000);
                            } else {
                                window.scrollTo(0, 0);
                                $('#addClienterror_content').html(result);
                                $('#addClientwait_msg').slideUp(1000);
                                $('#addClienterror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#addClienterror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });
          });
</script>            