<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Client Admin Users</h1>
        <span class="tbltoprgt_btn"><a href="<?php echo base_url('dashboard/addClientAdmin'); ?>" class="btn btn-flat btn-sm btn-success margn-right-btn">Add Client Admin User</a></span>                      

    </section>
                <!-- SET ADMIN PASSWORD -->
                <!-- Wait Alert -->
                <div id='setAdminPasswordwait_msg' class="alert alert-warning no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Password generating for Client Admin...</span>
                </div>
                <!-- Error Alert -->
                <div id='setAdminPassworderror_msg' class="alert alert-danger no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! Something went wrong</b></span><span id="setAdminPassword_error_content"></span>
                </div>
                <!-- Success Alert -->
                <div id='setAdminPasswordSuccess_msg' class="alert alert-success no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Success! </b>Password generated successfully.</span><span id=""></span>
                </div>

                <!-- RESET PASSWORD -->
                <!-- Wait Alert -->
                <div id='resetAdminPasswordwait_msg' class="alert alert-warning no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Password re-generating for Client Admin...</span>
                </div>
                <!-- Error Alert -->
                <div id='resetAdminPassworderror_msg' class="alert alert-danger no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! Something went wrong</b></span><span id="resetAdminPassword_error_content"></span>
                </div>
                <!-- Success Alert -->
                <div id='resetAdminPasswordSuccess_msg' class="alert alert-success no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Success! </b>Password re-generated successfully.</span><span id=""></span>
                </div>



    <div class="innercontentdiv whitebg">
                    <div class="alldata_tbl">
                        <div id="all_tbl_container1">
                            <div class="table-responsive"> 
                                <table id="clientuser_tbl" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th hidden>Client_id</th>
                                        <th>S.No</th>
                                        <th>Client Admin Name</th>
                                        <!-- <th>Instance ID</th> -->
										<th>Email ID</th>
                                        <th>Last Login</th>
										<th>Mobile Number</th>
                                        <th>Domain Name</th>
										<th>Created Date & Time</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php if(isset($getClient) && !empty($getClient)){ 
                                              foreach($getClient as $key=>$value){
                                        ?>
                                        <tr id="">
                                          <td hidden id="id" value="<?php echo $value['id']; ?>"></td>
                                          <td id="s.no" value="<?php echo $key+1;?>"><?php echo $key+1; ?></td>
                                          <td id="clientadminname" value="" class="clientadminname"><?php echo $value['first_name'].' '.$value['last_name']; ?></td>
                                          <!-- <td id="instance_id" value=""><?php //echo $value['ca_instanseId']; ?></td> -->
										  <td id="email_id" value=""><?php echo $value['username']; ?></td>
										  <td id="email_id" value=""><?php echo $value['last_login']; ?></td>
										  <td id="phoneNumber" value=""><?php echo $value['phone_number']; ?></td>
                                          <td id="domain_name" value=""><?php echo $value['domain_name']; ?></td>
										   
                                          <td id="created_date" value="<?php
                                                if($value['created_at'] != '0000-00-00 00:00:00'){
                                                    echo date("m-d-Y H:i:s", strtotime($value['created_at']));
                                                }
                                            ?>">
                                            <?php
                                             if($value['created_at'] != '0000-00-00 00:00:00'){
                                                    echo date("m-d-Y H:i:s", strtotime($value['created_at']));
                                                }
                                            ?>
                                        </td>
                                          <td>
                                            <!-- <a href="#" data-toggle="modal" class="send_invitation" data-client_id="<?php //echo $value['id']; ?>" data-client_name="<?php //echo $value['username']; ?>" data-target="#sendInvitationClient" >Send Invitation</a>  -->
										  <?php if($value['invitation_status'] == 0) { ?>
										  <a href="#" data-toggle="modal" class="send_invitationAdmin" data-client_id="<?php echo $value['id']; ?>" data-client_name="<?php echo $value['first_name'].' '.$value['last_name']; ?>" data-target="#sendInvitationClient" ><i class="fa fa-envelope-open" data-toggle="tooltip" data-original-title="Send Invitation" data-placement="left" title=""></i></a> 
										  <?php }else{ ?>
										  <a href="#" data-toggle="modal" class="send_invitationAdmin" data-client_id="<?php echo $value['id']; ?>" data-client_name="<?php echo $value['first_name'].' '.$value['last_name']; ?>" data-target="#sendInvitationClient" ><i style="padding-right: 4px;" class="fa fa-unlock-alt" data-toggle="tooltip" data-original-title="Reset Password" data-placement="left" title=""></i></a> 
										  <?php } ?>
										  <a href="<?php echo base_url('dashboard/getClientAdmin/' . base64_encode($value['id'])); ?>"><i class="fa fa-eye" data-toggle="tooltip" data-original-title="View User" data-placement="left" title=""></i></a>
                                            <a href="<?php echo base_url('dashboard/editClientAdmin/' . base64_encode($value['id'])); ?>"><i class="fa fa-pencil" data-toggle="tooltip" data-original-title="Edit User" data-placement="left" title=""></i></a>
                                            <a data-toggle="modal" onclick="setDeleteClientAdminId('<?php echo base64_encode($value['id']); ?>');" data-target="#deleteClientAdminModal"><i class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete User" data-placement="left" title=""></i></a>

                                            <!-- <a onclick="setClientAdminPassword('<?php //echo $value['ca_id']; ?>');" > -->
                                            <!-- Set Admin Password</a> -->
                                            <!-- <a data-toggle="modal" onclick="setClientAdminPassword('<?php //echo $value['ca_id']; ?>');" data-target="#setCApassword">
											Set Admin Password</a> -->

                                            <!-- <?php //if($value['ca_password'] == 'created'){ ?>
                                            <a class="resetClientAdminPassword" value="" id="<?php //echo $value['ca_id']; ?>" href="">Reset Admin Password</a>
                                            <?php //}else{ ?>
                                            <a class="setClientAdminPassword" value="" id="<?php //echo $value['ca_id']; ?>" href="">Set Admin Password</a>
                                            <?php //} ?> -->
                                        </td>
                                        </tr>
                                      <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>   
                </div>             
            
    
    <!-- /.content -->
</div>

<div class="modal fade issuerpopup" id="deleteClientAdminModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete User</h4>
            </div>
            <!-- Wait Alert -->
            <div id='deleteClientAdminwait_msg' class="alert alert-warning no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
            </div>
            <!-- Error Alert -->
            <div id='deleteClientAdminerror_msg' class="alert alert-danger no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Sorry! </b></span><span id="deleteClientAdminerror_content"></span>
            </div>
            <!-- Success Alert -->
            <div id='deleteClientAdminsuccess_msg' class="alert alert-success no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Success! </b></span><span id="deleteClientAdminsuccess_content"></span>
            </div>
            <form class="form-horizontal" method="post" name="deleteClientAdmin" id="deleteClientAdmin">
                <div class="modal-body">
                    <div class="popupcontentdiv">
                        <h4 class="text-center">Deleting this user will delete all the details.<br><br>Are you sure?<br><br></h4>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="col-sm-2"></div>
                                <input type="hidden" name="clientAdminId" id="clientAdminId" />
                                <div class="col-sm-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-flat btn-green">Submit</button>
                        <div class="btn btn-default btn-flat" data-dismiss="modal">Close</div>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>



<div id="sendInvitationClient" class="modal fade in">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X</button>
                <h1 class="modal-title text-center">Send Invitation</h1>
            </div>
            <div class="modal-body">
                <div id='sendInvitationAdminWaitMsg' class="alert alert-warning no-border" style="display: none;">
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <div id='sendInvitationAdminErrorMsg' class="alert alert-danger no-border" style="display: none;">
                    <span class="text-semibold"><b>Sorry! </b></span><span id="sendInvitationErrorContent"></span>
                </div>
                <div id='sendInvitationAdminSuccessMsg' class="alert alert-success no-border" style="display: none;">
                    <span class="text-semibold"><b>Success! </b></span><span id="sendInvitationSuccessContent"></span>
                </div>
                <form method="post">
                    <p align="center">Sending invitation set up to the Client Admin</p>
                    <div class="confirm-alert text-center">
                        <a href="" id="sendInvitationClientAdmin" data-client_id="<?php echo $value['id']; ?>"
                         data-client_uname="<?php echo $value['first_name'].' '.$value['last_name']; ?>" class="btn btn-lg btn-blue">Yes</a>
                        <div class="btn btn-lg btn-primary" data-dismiss="modal">No</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


