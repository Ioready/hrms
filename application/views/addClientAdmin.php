
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Add Client Admin</h1>
                       

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
                    <span class="text-semibold"><b>Success! </b>Client Admin Added Successfully</span><span id="addClientAdminsuccess_content"></span>
                </div>
                <div class="frmdtls_center_700">
                    <!-- Horizontal Form -->
                    <div class="box box-info allfrmdtls_boxcontent">
                    	<!-- <h3 class="text-center pink-text font-bold py-4 mr-1 pdgn-top"><strong>Subscribe</strong></h3> -->
                        <form class="form-horizontal" name="addClientAdmin" id="addClientAdmin" method="post">
                           
                            <div class="box-body frm-bor-rad-nd">                              
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Client<span class="redtxt">*</span></label>
                                          <select required name="clientname" id="clientname"  class="form-control frm-bor-rad" >
											  <option value="0"> -- Select Client --</option>
                                                <?php foreach($getClient as $Clients){?>
                                                <option value="<?php echo $Clients['ca_id'];?>"><?php echo $Clients['ca_username'];?></option>
                                                <?php } ?>
                                              </select>
										</select>
                                           
										</div>
									</div>
									<div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">First Name<span class="redtxt">*</span></label>
                                          <input name="first_name" id="first_name" value="" type="text" placeholder="" class="form-control frm-bor-rad" required>
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Last Name <span class="redtxt">*</span></label>
                                          <input name="last_name" id="last_name" value="" type="text" placeholder="" class="form-control frm-bor-rad"  required>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">                                        
                                       <div class="col-md-8">
                                            <label class="control-label lab-nd" data-toggle="tooltip" data-placement="top" title="If domain name not defined means client user name used instead of domain.">Client User Name <span class="redtxt">*</span></label>
                                           <input name="ca_user_unique_name" id="ca_user_unique_name" value="" type="text" placeholder="" class="form-control frm-bor-rad" maxlength="100" required>
                                        </div>

                                        <div class="col-md-4 pdgn-top_43">
                                           <label class="control-label lab-nd"><?php //echo DEFINED_DOMAIN ?></label>
                                        </div>
                                   </div> -->

                                     <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Email Address <span class="redtxt">*</span></label>
                                          <input name="emailid" id="emailid" value="" type="email" placeholder="" class="form-control frm-bor-rad" required>
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Phone <span class="redtxt">*</span></label>
                                          <input name="phoneNumber" id="phoneNumber" value="" type="tel" placeholder="" class="form-control frm-bor-rad" required>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Domain</label>
                                          <input name="domainname" id="domainname" value="" type="text" placeholder="" class="form-control frm-bor-rad" disabled>
                                        </div>
									</div> -->
									

									
                                    <!-- <div class="form-group">                                        
                                        <div class="col-md-12">
                                            <p class="control-label lab-nd">TAPI Details</p>                                           
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                            <label class="control-label lab-nd">Client ID <span class="redtxt">*</span></label>
                                            <input name="ca_clinetId" id="ca_clinetId" required value="" type="text" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Developer Key <span class="redtxt">*</span></label>
                                          <input name="ca_developerKey" id="ca_developerKey" value="" type="text" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div> -->

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
