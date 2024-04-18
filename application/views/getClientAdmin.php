
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Client Admin Details</h1>
                       
<?php $value = reset($getClientAdmin); ?>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Wait Alert -->
                <div id="addClientAdminwait_msg" class="alert alert-warning no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>�</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <!-- Error Alert -->
                <div id="addClientAdminerror_msg" class="alert alert-danger no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>�</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! </b></span><span id="addClientAdminerror_content"></span>
                </div>
                <!-- Success Alert -->
                <div id="addClientAdminsuccess_msg" class="alert alert-success no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>�</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Success! </b></span><span id="addClientAdminsuccess_content"></span>
                </div>
                <div class="frmdtls_center_700">
                    <!-- Horizontal Form -->
                    <div class="box box-info allfrmdtls_boxcontent">
                    	<!-- <h3 class="text-center pink-text font-bold py-4 mr-1 pdgn-top"><strong>Subscribe</strong></h3> -->
                        <form class="form-horizontal" name="editClientAdmin" id="editClientAdmin" method="post">
                           
                            <div class="box-body frm-bor-rad-nd">                              
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="">Client<span class="redtxt">*</span></label></div>
                                         <div class="col-sm-12"><?php echo $domain_name; //echo $value[''];  ?>
                                        </div>
									</div>

									
									<div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class=""> Name <span class="redtxt">*</span></label></div>
                                         <div class="col-sm-12"><?php echo $value['first_name'].' '.$value['last_name'];  ?>
                                        </div>
                                    </div>
                                     <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="">Email Address <span class="redtxt">*</span></label></div>
                                         <div class="col-sm-12"><?php echo $value['username'];  ?>
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="">Phone <span class="redtxt">*</span></label></div>
                                         <div class="col-sm-12"><?php echo $value['phone_number'];  ?>
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="">Domain </label></div>
                                         <div class="col-sm-12"><?php echo $value['domain_name'];  ?>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">                                        
                                        <div class="col-md-12">
                                            <p class="">TAPI Details</p>                                           
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                            <label class="">Client ID <span class="redtxt">*</span></label></div>
                                            <div class="col-sm-12"><?php //echo $value['ca_clinetId'];  ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="">Developer Key <span class="redtxt">*</span></label></div>
                                          <div class="col-sm-12"><?php //echo $value['ca_developerKey'];  ?>
                                        </div>
                                    </div> -->

                                </div>
                            <!-- /.box-body -->
                           
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
