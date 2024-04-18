<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Tax</h1>
        <span class="tbltoprgt_btn"><a data-toggle="modal"data-target="#addtax" class="btn btn-flat btn-sm btn-success margn-right-btn">Add New Tax</a></span>   

    </section>

    <div class="innercontentdiv whitebg">
                    <div class="alldata_tbl">
                        <div id="all_tbl_container1">
                            <div class="table-responsive"> 
                                <table id="client_tbl" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th>Name</th>
                                        <th>Value</th>
                                        <th>Default</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php if(isset($getAllTax) && !empty($getAllTax)){ 
                                              foreach($getAllTax as $key=>$value){
                                        ?>
                                        <tr>
                                          <td><?php echo $value['name']; ?></td>
                                          <td><?php echo $value['tax']; ?></td>
                                          <td><div class="form-group">
                                    <!-- <label class="col-sm-4 control-label">Progress Display</label> -->
                                    <label class="switch">
                                        <input type="checkbox" id="tradefrontedstatus" name="tradefrontedstatus" <?php if(!empty($value['isDefault'])) {if($value['isDefault'] == '1'){?> checked <?php }} ?>>
                                        <span class="slider round"></span>
                                    </label>
                                </div></td>
										
                                          <td>
                                            <a href="<?php echo base_url('dashboard/editclient/' . base64_encode($value['id'])); ?>"><i class="fa fa-pencil" data-toggle="tooltip" data-original-title="Edit User" data-placement="left" title=""></i></a> | 
                                            <a data-toggle="modal" onclick="setDeleteClientId('<?php echo base64_encode($value['id']); ?>');" data-target="#deleteClientModal"><i class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete User" data-placement="left" title=""></i></a>
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

<div class="modal fade issuerpopup" id="deleteClientModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete User</h4>
            </div>
            <!-- Wait Alert -->
            <div id='deleteClientwait_msg' class="alert alert-warning no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
            </div>
            <!-- Error Alert -->
            <div id='deleteClienterror_msg' class="alert alert-danger no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Sorry! </b></span><span id="deleteClienterror_content"></span>
            </div>
            <!-- Success Alert -->
            <div id='deleteClientsuccess_msg' class="alert alert-success no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Success! </b></span><span id="deleteClientsuccess_content"></span>
            </div>
            <form class="form-horizontal" method="post" name="deleteClient" id="deleteClient">
                <div class="modal-body">
                    <div class="popupcontentdiv">
                        <h4 class="text-center">Deleting this user will delete all the details.<br><br>Are you sure?<br><br></h4>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="col-sm-2"></div>
                                <input type="hidden" name="clientId" id="clientId" />
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



<!-- Status -->

<div class="modal fade issuerpopup" id="verificationModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Domain Verification</h4>
            </div>
             <!-- Wait Alert -->
             <div id='Clientwait_msg' class="alert alert-warning no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
            </div>
            <!-- Error Alert -->
            <div id='Clienterror_msg' class="alert alert-danger no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Sorry! </b></span><span id="Clienterror_content"></span>
            </div>
            <!-- Success Alert -->
            <div id='Clientsuccess_msg' class="alert alert-success no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Success! </b></span><span id="Clientsuccess_content"></span>
            </div>                   

            <form class="form-horizontal"  >
                <div class="modal-body">
                    <div class="popupcontentdiv">
                        <h4 class="text-center"><br>Are you sure you want to verify the domain?<br><br></h4>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="dmain_verifyId" id="dmain_verifyId" value="" />
                        <a href="javascript:void(0);" data-ca-id="<?php echo $value['ca_id']; ?>" class="btn btn-flat btn-green domain_verification" >Submit</a>
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
                <div id='sendInvitationWaitMsg' class="alert alert-warning no-border" style="display: none;">
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <div id='sendInvitationErrorMsg' class="alert alert-danger no-border" style="display: none;">
                    <span class="text-semibold"><b>Sorry! </b></span><span id="sendInvitationErrorContent"></span>
                </div>
                <div id='sendInvitationSuccessMsg' class="alert alert-success no-border" style="display: none;">
                    <span class="text-semibold"><b>Success! </b></span><span id="sendInvitationSuccessContent"></span>
                </div>
                <form method="post">
                    <p align="center">Sending invitation set up to the Client Admin</p>
                    <div class="confirm-alert text-center">
                        <a href="" id="sendInvitation" data-client_id="<?php echo $value['ca_id']; ?>"
                         data-client_uname="<?php echo $value['ca_username']; ?>" class="btn btn-lg btn-blue">Yes</a>
                        <div class="btn btn-lg btn-primary" data-dismiss="modal">No</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="addtax" class="modal fade in">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X</button>
                <h1 class="modal-title text-center">Add Tax</h1>
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
                <form name="addtaxform" id="addtaxform" method="post">
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        <label for="name" class="form-label required mb-3">Name:</label>
                        <input id="tax_name" class="form-control form-control-solid" required="" placeholder="Name" name="tax_name" type="text">
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        <label for="value" class="form-label required mb-3">Value:</label>
                        <input id="tax_value" class="form-control form-control-solid" oninput="validity.valid||(value=value.replace(/[e\+\-]/gi,''))" min="0" max="100" step=".01" required="" placeholder="Value" name="tax_value" type="number">
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        <label for="is_default" class="form-label mb-3">Is Default:</label>
                        <div class="form-check form-check-custom ">
                            <div class="btn-group">
                                <input id="is_default_yes" class="form-check-input me-2" type="radio" name="is_default" value="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                                <input id="is_default_no" class="form-check-input mx-2" type="radio" name="is_default" value="0" checked="">
                                <label class="form-check-label">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pt-0">
                <button type="submit" class="btn btn-primary me-2" id="btnSave" data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing...">Save</button>
                <button type="button" class="btn btn-secondary btn-active-light-primary me-3" data-bs-dismiss="modal">Cancel</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $("#addtaxform").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#addClientwait_msg').slideDown(1000);
        var data = $(this).serialize();
                    $.ajax({
                        url: baseURL + "taxes/addtax",
                        type: "POST",
                        data: data,
                        success: function(result) {
                            if (result == 1) {
                                $('#addClientsuccess_content').html('Client added successfully');
                                $('#addClientsuccess_msg').slideDown(1000);
                                $('#addClientwait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'dashboard/clients';
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
            
            $("#tradefrontedstatus").change(function () {
                    var status = $(this).val();

                    if ($("#tradefrontedstatus").is(":checked")) {
                        status = "1";
                    } else {
                        status = "0";
                    }
                    var data = { status: status };
                    $.ajax({
                        url: baseURL + "taxes/updateDefaultTax",
                        type: "POST",
                        data: data,
                        success: function (result) {
                            if (result) {
                            
                                setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                            }
                        },
                    });
                });

        });
</script>
