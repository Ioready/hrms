<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Clients</h1>
        <span class="tbltoprgt_btn"><a href="<?php echo base_url('client/addClient'); ?>" class="btn btn-flat btn-sm btn-success margn-right-btn">Add New Client</a></span>   

    </section>

    <div class="innercontentdiv whitebg">
                    <div class="alldata_tbl">
                        <div id="all_tbl_container1">
                            <div class="table-responsive"> 
                                <table id="client_tbl" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th>Client</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php if(isset($getClient) && !empty($getClient)){ 
                                              foreach($getClient as $key=>$value){
                                        ?>
                                        <tr>
                                          <td><?php echo $value['ca_fname']; ?></td>
                                          <td><?php echo $value['ca_emailid']; ?></td>
										  <td>										  
                                            <a href="<?php echo base_url('client/editclient/' . base64_encode($value['ca_id'])); ?>"><i class="fa fa-pencil" data-toggle="tooltip" data-original-title="Edit User" data-placement="left" title=""></i></a> |
                                            <a data-toggle="modal" onclick="setDeleteClientId('<?php echo base64_encode($value['ca_id']); ?>');" data-target="#deleteClientModal"><i class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete User" data-placement="left" title=""></i></a>
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
                <h4 class="modal-title">Delete Clients</h4>
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
                        <h4 class="text-center">Delete !<br><br>Are you sure want to delete this "Client" ?<br><br></h4>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){    
        $("#deleteClient").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#deleteClientwait_msg').slideDown(1000);
        var data = $(this).serialize();
        $.ajax({
            url: baseURL + "client/deleteclient",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#deleteClientsuccess_content').html("Client deleted successfully");
                    $('#deleteClientwait_msg').slideUp(1000);
                    $('#deleteClientsuccess_msg').slideDown(1000);
                    setTimeout(function() {
                        window.location.href = baseURL + 'client';
                    }, 4000);
                } else {
                    window.scrollTo(0, 0);
                    $('#deleteClienterror_content').html(result);
                    $('#deleteClientwait_msg').slideUp(1000);
                    $('#deleteClienterror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#deleteClienterror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    });    
}); 
function setDeleteClientId(clientId) {
    $("#clientId").val(clientId);
}       
    </script>

