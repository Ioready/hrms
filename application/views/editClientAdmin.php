
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Update Client Admin</h1>
                       
<?php $value = reset($getClientAdmin); ?>
    </section>
    <?php //echo'<pre>';print_r($value);exit;?>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Wait Alert -->
                <div id="editClientAdminwait_msg" class="alert alert-warning no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>�</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <!-- Error Alert -->
                <div id="editClientAdminerror_msg" class="alert alert-danger no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>�</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! </b></span><span id="editClientAdminerror_content"></span>
                </div>
                <!-- Success Alert -->
                <div id="editClientAdminsuccess_msg" class="alert alert-success no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>�</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Success! Client Admin Updated Successfully. </b></span><span id="editClientAdminsuccess_content"></span>
                </div>
                <div class="frmdtls_center_700">
                    <!-- Horizontal Form -->
                    <div class="box box-info allfrmdtls_boxcontent">
                    	<!-- <h3 class="text-center pink-text font-bold py-4 mr-1 pdgn-top"><strong>Subscribe</strong></h3> -->
                        <form class="form-horizontal" name="editClientAdmin" id="editClientAdmin" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo base64_encode($value['id']); ?>">
                            <div class="box-body frm-bor-rad-nd">                              
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
										<label class="control-label lab-nd">Client<span class="redtxt">*</span></label>

										  <select disabled name="clientname" id="clientname" class="form-control frm-bor-rad" value="<?php echo $value['client_id']?>">
										<?php foreach($getClient as $Clients){?>
										  <!-- <option value="<?php //echo $value['domain_name']; ?>"><?php //echo $value['domain_name']; ?></option> -->
                                                <option value="<?php echo $Clients['ca_id'];?>"
                                                <?php if($Clients["ca_id"] == $value['client_id']){echo "selected";} ?>>
                                                <?php echo $Clients['ca_username'];?></option>
                                                <?php } ?>
                                              </select>
									</div>
                                    </div>
                                    <!-- <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Firm Name <span class="redtxt">*</span></label>
                                          <input name="ca_name" id="ca_name_up" value="<?php //echo $value['ca_name'];  ?>" type="text" placeholder="" class="form-control frm-bor-rad" required="">
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd"  data-toggle="tooltip" data-placement="top" title="If domain name not defined means client user name used instead of domain.">Client User Name <span class="redtxt">*</span><i style="color: #1c2229;" class="fa fa-question-circle-o" aria-hidden="true"></i></label>
                                          <input name="ca_user_unique_name" id="ca_user_unique_name_up" value="<?php //echo $value['ca_user_unique_name'];  ?>"  type="text" placeholder="" 
                                          class="form-control frm-bor-rad" maxlength="100" required="">
                                        </div>

									</div> -->

									<div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">First Name<span class="redtxt">*</span></label>
                                          <input name="first_name" id="first_name" value="<?php echo $value['first_name'];  ?>" type="text" placeholder="" class="form-control frm-bor-rad" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Last Name <span class="redtxt">*</span></label>
                                          <input name="last_name" id="last_name" value="<?php echo $value['last_name'];  ?>" type="text" placeholder="" class="form-control frm-bor-rad"  required="">
                                        </div>
                                    </div>


                                     <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Email Address <span class="redtxt">*</span></label>
                                          <input name="emailid" id="emailid" value="<?php echo $value['username'];  ?>" type="email" placeholder="" class="form-control frm-bor-rad" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Phone <span class="redtxt">*</span></label>
                                          <input name="phoneNumber" id="phoneNumber" value="<?php echo $value['phone_number'];  ?>" type="phone" placeholder="" class="form-control frm-bor-rad" required="">
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Domain </label>
                                          <input name="domain" id="domain" value="<?php //echo $value['domain_name'];  ?>" type="text" placeholder="" class="form-control frm-bor-rad"  readonly>
                                        </div> 
                                    </div> -->

                                    
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
