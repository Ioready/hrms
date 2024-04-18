
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Add Admin</h1>
                       

    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Wait Alert -->
                <div id="addSuperAdminwait_msg" class="alert alert-warning no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <!-- Error Alert -->
                <div id="addSuperAdminerror_msg" class="alert alert-danger no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! </b></span><span id="addSuperAdminerror_content"></span>
                </div>
                <!-- Success Alert -->
                <div id="addSuperAdminsuccess_msg" class="alert alert-success no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Success! </b></span><span id="addSuperAdminsuccess_content"></span>
                </div>
                <div class="frmdtls_center_700">
                    <!-- Horizontal Form -->
                    <div class="box box-info allfrmdtls_boxcontent">
                    	<!-- <h3 class="text-center pink-text font-bold py-4 mr-1 pdgn-top"><strong>Subscribe</strong></h3> -->
                        <form class="form-horizontal" name="addSuperAdmin" id="addSuperAdmin" method="post">
                           
                            <div class="box-body frm-bor-rad-nd">                              
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Name <span class="redtxt">*</span></label>
                                          <input name="sa_username" id="sa_username" value="" type="text" placeholder="" class="form-control frm-bor-rad" required="">
                                        </div>
                                    </div>
                                     <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Email Address <span class="redtxt">*</span></label>
                                          <input name="sa_emailid" id="sa_emailid" value="" type="text" placeholder="" class="form-control frm-bor-rad" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Phone <span class="redtxt">*</span></label>
                                          <input name="sa_phonenumber" id="sa_phonenumber" value="" type="phone" placeholder="" class="form-control frm-bor-rad" required="">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">                                        
                                        <div class="col-md-12">
                                            <label class="control-label lab-nd">Password <span class="redtxt">*</span></label>
                                            <input name="sa_password" id="sa_password" required="" value="" type="password" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div> -->

                                    <!-- <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Confirm Password <span class="redtxt">*</span></label>
                                          <input name="sa_con_password" id="sa_con_password" value="" type="password" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div> -->

                                </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary btn-flat">Submit</button>
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
