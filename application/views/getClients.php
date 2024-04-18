
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="contentheader_title">Client Details</h1>
        <!-- <span class="tbltoprgt_btn"><a href="<?php //echo base_url('dashboard/webhooklink/'.$this->uri->segment(3)); ?>" class="btn btn-flat btn-sm btn-success margn-right-btn">Webhook Link</a></span> -->
<?php $value = reset($getClient); ?>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Wait Alert -->
                <div id="addClientwait_msg" class="alert alert-warning no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <!-- Error Alert -->
                <div id="addClienterror_msg" class="alert alert-danger no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! </b></span><span id="addClienterror_content"></span>
                </div>
                <!-- Success Alert -->
                <div id="addClientsuccess_msg" class="alert alert-success no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Success! </b></span><span id="addClientsuccess_content"></span>
                </div>
                <div class="frmdtls_center_700">
                    <!-- Horizontal Form -->
                    <div class="box box-info allfrmdtls_boxcontent">
                    	<!-- <h3 class="text-center pink-text font-bold py-4 mr-1 pdgn-top"><strong>Subscribe</strong></h3> -->
                        <form class="form-horizontal" name="editClient" id="editClient" method="post">
                           
                            <div class="box-body frm-bor-rad-nd">                              
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="">Client Name <span class="redtxt">*</span></label></div>
                                         <div class="col-sm-12"><?php echo $value['ca_username'];  ?>
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="">Firm Name <span class="redtxt">*</span></label></div>
                                         <div class="col-sm-12"><?php echo $value['ca_name'];  ?>
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="" data-toggle="tooltip" data-placement="top" title="If domain name not defined means client user name used instead of domain." >Custom Domain <span class="redtxt">*</span><i style="color: #1c2229;" class="fa fa-question-circle-o" aria-hidden="true"></i></label></div>
                                         <div class="col-sm-12"><?php echo $value['ca_user_unique_name'];  ?>
                                        </div>
                                    </div>
                                     <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="">Email Address <span class="redtxt">*</span></label></div>
                                         <div class="col-sm-12"><?php echo $value['ca_emailid'];  ?>
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="">Phone <span class="redtxt">*</span></label></div>
                                         <div class="col-sm-12"><?php echo $value['ca_phoneNumber'];  ?>
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="">MT-Maas Domain </label></div>
                                         <div class="col-sm-12"><?php echo $value['ca_domain'];  ?>
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                            <p class="">TAPI Details</p>                                           
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <div class="col-md-12">
                                            <label class="">Client ID <span class="redtxt">*</span></label></div>
                                            <div class="col-sm-12"><?php echo $value['ca_clinetId'];  ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="">Developer Key <span class="redtxt">*</span></label></div>
                                          <div class="col-sm-12"><?php echo $value['ca_developerKey'];  ?>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="popupsubtitle txt_center"><h5>Webhook Details</h5></div>
                                </div>
                               
                                <div id="addWebhookwait_msg" class="alert alert-warning no-border" style="display: none;">
                                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                                </div>
                                
                                <div id="accountInfo">
                                    <?php if(empty($webhookDetails)){ ?>
                                        <div class="form-group text-center">
                                            <button type="button" class="btn btn-flat btn-sm btn-success" onclick="addWebhook('<?php echo $this->uri->segment(3); ?>')">Add Webhook</button>
                                        </div>
                                    <?php } ?>
                                    <div id="all_tbl_container">
                                        <div class="table-responsive"> 
                                            <table id="partyDoc_tbl" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>S No</th>
                                                        <th>Methoad Name</th>
                                                        <th>URL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($webhookDetails as $key => $value) { ?>
                                                        <tr>
                                                            <td width="10%"><?php echo $key+1; ?></td>
                                                            <td width="10%"><?php echo $value['methodName']; ?></td>
                                                            <td><?php echo $value['webhookurl']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
