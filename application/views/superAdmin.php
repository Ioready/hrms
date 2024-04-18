<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Admin</h1>
        <span class="tbltoprgt_btn"><a href="<?php echo base_url('dashboard/addSuperAdmin'); ?>" class="btn btn-flat btn-sm btn-success margn-right-btn">Add Admin</a></span>                      

    </section>

    <div class="innercontentdiv whitebg">
                    <div class="alldata_tbl">
                        <div id="all_tbl_container1">
                            <div class="table-responsive"> 
                                <table id="superAdmin_tbl" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Email ID</th>
                                        <th>Last Login</th>
                                        <th>Phone</th>
                                        <th>Created Date & Time</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php if(isset($getSuperAdmin) && !empty($getSuperAdmin)){ 
                                              foreach($getSuperAdmin as $key=>$value){
                                        ?>
                                        <tr>
                                          <td><?php echo $key+1; ?></td>
                                          <td><?php echo $value['sa_username']; ?></td>
                                          <td><?php echo $value['sa_emailid']; ?></td>
                                          <td><?php echo $value['sa_last_login']; ?></td>
                                          <td><?php echo $value['sa_phonenumber']; ?></td>
                                          <td>
                                            <?php 
                                                if($value['sa_createdDate'] != '0000-00-00 00:00:00'){
                                                    echo date("m-d-Y H:i:s", strtotime($value['sa_createdDate']));
                                                }
                                            ?>
                                        </td>
                                          <td>
                                             <a data-toggle="modal" onclick="setAdminUserId('<?php echo base64_encode($value['sa_id']); ?>');" data-target="#sendPasswordClient">Resend Password</a> | 
                                            <a href="<?php echo base_url('dashboard/editSuperAdmin/' . base64_encode($value['sa_id'])); ?>"><i class="fa fa-pencil" data-toggle="tooltip" data-original-title="Edit User" data-placement="left" title=""></i></a> |
                                            <a data-toggle="modal" onclick="setDeletesuperAdminId('<?php echo base64_encode($value['sa_id']); ?>');" data-target="#deletesuperAdminModal"><i class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete User" data-placement="left" title=""></i></a>
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

<div class="modal fade issuerpopup" id="deletesuperAdminModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete User</h4>
            </div>
            <!-- Wait Alert -->
            <div id='deletesuperAdminwait_msg' class="alert alert-warning no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
            </div>
            <!-- Error Alert -->
            <div id='deletesuperAdminerror_msg' class="alert alert-danger no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Sorry! </b></span><span id="deletesuperAdminerror_content"></span>
            </div>
            <!-- Success Alert -->
            <div id='deletesuperAdminsuccess_msg' class="alert alert-success no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Success! </b></span><span id="deletesuperAdminsuccess_content"></span>
            </div>
            <form class="form-horizontal" method="post" name="deletesuperAdmin" id="deletesuperAdmin">
                <div class="modal-body">
                    <div class="popupcontentdiv">
                        <h4 class="text-center">Deleting this user will delete all the details.<br><br>Are you sure?<br><br></h4>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="col-sm-2"></div>
                                <input type="hidden" name="superAdminId" id="superAdminId" />
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
<div id="sendPasswordClient" class="modal fade in">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X</button>
                <h1 class="modal-title text-center">Send Password Set Up</h1>
            </div>
            <div class="modal-body">
                <div id='sendingPasswordWaitMsg' class="alert alert-warning no-border" style="display: none;">
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <div id='sendingPasswordErrorMsg' class="alert alert-danger no-border" style="display: none;">
                    <span class="text-semibold"><b>Sorry! </b></span><span id="sendingPasswordErrorContent"></span>
                </div>
                <div id='sendingPasswordSuccessMsg' class="alert alert-success no-border" style="display: none;">
                    <span class="text-semibold"><b>Success! </b></span><span id="sendingPasswordSuccessContent"></span>
                </div>
                <form name="sendingPassword" id="sendingPassword" method="post">
                    <p align="center">Sending password set up to the Admin user</p>
                    <input type="hidden" name="superadminId" id="superadminId" value="">
                    <div class="confirm-alert text-center">
                        <button type="submit" class="btn btn-lg btn-blue">Yes</button>
                        <div class="btn btn-lg btn-primary" data-dismiss="modal">No</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

