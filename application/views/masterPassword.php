<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
         <h1 class="contentheader_title">Master Password </h1>  
        
                                        <a href="#" data-toggle="tooltip" title=" This password can be accessible for all Client Admin Logins." class="ai_tip_anchor fa fa-info-circle" style="left:0px;"></a>

        <span class="tbltoprgt_btn"><a onclick="goBack();" class="btn btn-flat btn-sm btn-green">Back</a></span>

    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="frmdtls_center_700">
                    <!-- Horizontal Form -->
                    <div class="box box-info allfrmdtls_boxcontent">
                        <!-- form start -->
                        <form class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-4 control-label">Password</label>
                                        <div class="col-sm-8">
                                            <div class="viewcnttxt fgreen"><?php if(isset($clientPass[0]['samp_masterPassword'])){ echo $clientPass[0]['samp_masterPassword']; } ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <a data-toggle="modal" data-target="#superAdminPWD" class="btn btn-green btn-flat pull-right">Edit</a>
                            </div>
                        </form>
                    </div>
                </div>   
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<div class="modal fade issuerpopup" id="superAdminPWD">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Admin Password</h4>
            </div>
            <!-- Wait Alert -->
            <div id='updateSuperAdminPwdwait_msg' class="alert alert-warning no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
            </div>
            <!-- Error Alert -->
            <div id='updateSuperAdminPwderror_msg' class="alert alert-danger no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                <span class="text-semibold"><b>Sorry! </b></span><span id="updateSuperAdminPwderror_content"></span>
            </div>
            <!-- Success Alert -->
            <div id='updateSuperAdminPwdsuccess_msg' class="alert alert-success no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                <span class="text-semibold"><b>Success! </b></span><span id="updateSuperAdminPwdsuccess_content"></span>
            </div>
            <form class="form-horizontal" method="post" name="updateSuperAdminPwd" id="updateSuperAdminPwd">
                <div class="modal-body">
                    <div class="popupcontentdiv">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Password <span class="redtxt">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" name="adminPWD" id="adminPWD" required="" class="form-control" value="<?php if(isset($clientPass[0]['samp_masterPassword'])){ echo $clientPass[0]['samp_masterPassword']; } ?>" placeholder="Admin Password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-flat btn-green">Update</button>
                        <div class="btn btn-default btn-flat" data-dismiss="modal">Close</div>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
