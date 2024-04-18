<?php //echo '<pre>'; print_r($getSuperAdmin); exit;
    $value = reset($getSuperAdmin);
 ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Update Admin</h1>
                       

    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Wait Alert -->
                <div id="editSuperAdminwait_msg" class="alert alert-warning no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <!-- Error Alert -->
                <div id="editSuperAdminerror_msg" class="alert alert-danger no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! </b></span><span id="editSuperAdminerror_content"></span>
                </div>
                <!-- Success Alert -->
                <div id="editSuperAdminsuccess_msg" class="alert alert-success no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Success! </b></span><span id="editSuperAdminsuccess_content"></span>
                </div>
                <div class="frmdtls_center_700">
                    <!-- Horizontal Form -->
                    <div class="box box-info allfrmdtls_boxcontent">
                    	<!-- <h3 class="text-center pink-text font-bold py-4 mr-1 pdgn-top"><strong>Subscribe</strong></h3> -->
                        <form class="form-horizontal" name="editSuperAdmin" id="editSuperAdmin" method="post">
                           <input type="hidden" name="sa_id" value="<?php echo base64_encode($value['sa_id']); ?>">
                            <div class="box-body frm-bor-rad-nd">                              
                                <div class="form-group">                                        
                                    <div class="col-md-12">
                                        <label class="control-label lab-nd">Name <span class="redtxt">*</span></label>
                                        <input name="sa_username" id="sa_username" value="<?php echo $value['sa_username']; ?>" type="text" placeholder="" class="form-control frm-bor-rad" required="">
                                    </div>
                                </div>
                                    <div class="form-group">                                        
                                    <div class="col-md-12">
                                        <label class="control-label lab-nd">Email Address <span class="redtxt">*</span></label>
                                        <input readonly name="sa_emailid" id="sa_emailid" value="<?php echo $value['sa_emailid']; ?>" type="email" placeholder="" class="form-control frm-bor-rad" required="">
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <div class="col-md-12">
                                        <label class="control-label lab-nd">Phone <span class="redtxt">*</span></label>
                                        <input name="sa_phonenumber" id="sa_phonenumber" value="<?php echo $value['sa_phonenumber']; ?>" type="phone" placeholder="" class="form-control frm-bor-rad" required="">
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-green btn-flat">Submit</button>
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

