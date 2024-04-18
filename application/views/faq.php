
<style type="text/css">
    .tooltip-inner {min-width:115px;}
    #all_tbl_container .table-responsive #users_tbl tr th{
        min-width: 0px !Important;
    }
    .serial_check{min-width: 0px !Important;}
    .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.turnbtn{
    padding-left: 7px;
    font-size: 16px;
    padding-top: 6px;
    position: relative;
    top: 8px;
}
.switchDiv{
  margin-top: 8px;
}
.content-header>h1{
    margin-top: 15px;
    margin-right: 10px;	
}
.snimgupcolor small{
    color:red;
    padding-left: 2%;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <?php if(!empty($offersecDetails)){
                foreach($offersecDetails as $key => $value){ 
                    if($value['defaultName'] == 'FAQ'){
                    ?>
                        <h1 class="contentheader_title"><?php echo $value['customName']; ?></h1>
                        <div class="pull-left editicon_header">
                           <a data-toggle="modal" data-target="#updateOfferingSectionDiv" 
                                                       onclick="updateOfferSection(
                                                         '<?php echo $value['defaultName']; ?>',
                                                        '<?php echo $value['customName']; ?>',
                                                        '<?php echo $value['id']; ?>',)"
                                                        ><i class="fa fa-pencil" data-toggle="tooltip" data-original-title="Edit Section" data-placement="top" title=""></i></a>
                        </div>
                                            <div class="switchDiv" id="">
                                                <label class="switch">
                                                  <input type="checkbox" class="offeringSectionoffOn" name="offeringSectionoffOn" <?php if($value['status'] == '1'){?> checked <?php } ?> data-id="<?php echo $value['id'] ?>">
                                                  <span class="slider round"></span>
                                                </label>
                                                <span class="turnbtn">
                                                
                                                 
                                                  <?php
												  
												  
												   if ($value['status'] == '1') {

                                                     echo "On";
                                                     }
                                                     else{ echo "Off";}
                                                    ?>

                                                </span>
                                            </div>
                               <?php } } } ?>
        <span class="tbltoprgt_btn"><a onclick="goBack();" class="btn btn-flat btn-sm btn-green">Back</a></span>
        <span class="tbltoprgt_btn"><a data-toggle="modal" data-target="#addFaqDiv" class="btn btn-flat btn-sm btn-primary margn-right-btn">Add FAQ</a></span>
    </section>

    <?php echo $subMenu; ?>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <?php if (isset($_GET['apierror'])) { ?>
                    <!-- API Error Alert -->
                    <div id='api_error_msg' class="alert alert-danger no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                        <span class="text-semibold"><b>Sorry! </b></span><span id="api_error_content"><?php echo $_GET['apierror']; ?></span>
                    </div>
                <?php } ?>
                <div class="innercontentdiv whitebg">
                    <div class="alldata_tbl">
                        <div id="all_tbl_container">
                            <div class="table-responsive"> 
                                <table id="faq_tbl" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="checkbox icheck">
                                                    <label><input type="checkbox">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>S.No</th>
                                            <th>FAQ Question</th>
                                            <th>Create Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sno = 1;
                                        foreach ($faqDetails as $value) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="checkbox icheck">
                                                        <label>
                                                            <input type="checkbox">&nbsp;
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><?php echo $sno++; ?></td>
                                                <td><?php echo $value['faqQuestion']; ?></td>
                                                <td><?php echo $value['faqcreatedDate']; ?></td>
                                                <td align="center" class="tbl_actionbtns">
                                                    <a data-toggle="modal" data-target="#viewFaqDiv" onclick="setViewFaqDetails('<?php echo base64_encode($value['faqQuestion']); ?>', '<?php echo base64_encode(stripslashes($value['faqAnswer'])); ?>');"><i class="fa fa-eye" data-toggle="tooltip" data-original-title="View FAQ" data-placement="left" title=""></i></a>
                                                    <a data-toggle="modal" data-target="#updateFaqDiv" onclick="setEditFaqId('<?php echo base64_encode($value['id']); ?>', '<?php echo base64_encode($value['faqQuestion']); ?>', '<?php echo base64_encode(stripslashes($value['faqAnswer'])); ?>');"><i class="fa fa-pencil" data-toggle="tooltip" data-original-title="Edit FAQ" data-placement="left" title=""></i></a>
                                                    <a data-toggle="modal" data-target="#deleteFaqDiv" onclick="setDeleteFaqId('<?php echo base64_encode($value['id']); ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete FAQ" data-placement="left" title=""></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

    <?php echo $subMenu; ?>

</div>

<!--Modal - Create FAQ-->
<div class="modal fade" id="addFaqDiv">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add FAQ</h4>
            </div>
            <div class="modal-body">
                <!--                 Wait Alert -->
                <div id='addFaqwait_msg' class="alert alert-warning no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <!--                 Error Alert -->
                <div id='addFaqerror_msg' class="alert alert-danger no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! </b></span><span id="addFaqerror_content"></span>
                </div>
                <!--                 Success Alert -->
                <div id='addFaqsuccess_msg' class="alert alert-success no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Success! </b></span><span id="addFaqsuccess_content"></span>
                </div>
                <form class="form-horizontal" method="post" name="addFaq" id="addFaq">
                    <input type="hidden" name="offerId" id="offerId" value="<?php echo $this->uri->segment(3); ?>" />
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">FAQ <span class="redtxt">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="faqQuestion" id="faqQuestion" required="" value="" class="form-control" placeholder="FAQ">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Answer <span class="redtxt">*</span></label>                                    
                            <div class="col-sm-9">
                                <textarea class="form-control" id="faqAnswer" name="faqAnswer" required placeholder="Answer"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-flat btn-green">Submit</button>
                        <div class="btn btn-default btn-flat" data-dismiss="modal">Close</div>
                    </div>
                </form>
            </div>
        </div>
        <!--         /.modal-content -->
    </div>
    <!--     /.modal-dialog -->
</div>
<!-- /.modal -->

<!--Modal - View FAQ Details-->
<div class="modal fade" id="viewFaqDiv">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">View FAQ</h4>
            </div>
            <div class="modal-body">
                <div class="popupcontentdiv" id="viewFaqWaitDiv">
                    <h4 class="text-center fgreen">Please wait... Loading data...</h4>
                </div>
                <div class="popupcontentdiv" id="viewFaqContentDiv"> 
                    <div class="profileviewdtls_div">
                        <div class="profileviewdtls_name txt_left">
                            <h4 id="viewFaqQuestion"></h4>
                        </div>
                        <div class="profileviewdtls_desc" id="viewFaqAnswer"></div>
                    </div> 
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--Modal - Delete FAQ Details-->
<div class="modal fade" id="deleteFaqDiv">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete FAQ</h4>
            </div>
            <div class="modal-body">
                <!-- Wait Alert -->
                <div id='deleteFaqwait_msg' class="alert alert-warning no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <!-- Error Alert -->
                <div id='deleteFaqerror_msg' class="alert alert-danger no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! </b></span><span id="deleteFaqerror_content"></span>
                </div>
                <!-- Success Alert -->
                <div id='deleteFaqsuccess_msg' class="alert alert-success no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Success! </b></span><span id="deleteFaqsuccess_content"></span>
                </div>
                <form class="form-horizontal" method="post" name="deleteFaq" id="deleteFaq">
                    <div class="modal-body">
                        <div class="popupcontentdiv">
                            <h4 class="text-center">Are you sure?<br><br></h4>
                            <input type="hidden" name="faqId" id="deleteFaqId" />
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-flat btn-green">Submit</button>
                            <div class="btn btn-default btn-flat" data-dismiss="modal">Close</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--Modal - Update Faq Details-->
<div class="modal fade" id="updateFaqDiv">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update FAQ</h4>
            </div>
            <div class="modal-body">
                <!-- Wait Alert -->
                <div id='updateFaqwait_msg' class="alert alert-warning no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <!-- Error Alert -->
                <div id='updateFaqerror_msg' class="alert alert-danger no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! </b></span><span id="updateFaqerror_content"></span>
                </div>
                <!-- Success Alert -->
                <div id='updateFaqsuccess_msg' class="alert alert-success no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Success! </b></span><span id="updateFaqsuccess_content"></span>
                </div>
                <form class="form-horizontal" method="post" name="updateFaq" id="updateFaq">
                    <input type="hidden" name="offerId" id="offerId" value="<?php echo $this->uri->segment(3); ?>" />
                    <input type="hidden" name="faqId" id="faqId" value="" />
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">FAQ <span class="redtxt">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="faqQuestion" id="updateFaqQuestion" required="" value="" class="form-control" placeholder="FAQ">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Answer <span class="redtxt">*</span></label>                                    
                            <div class="col-sm-9">
                                <textarea class="form-control" id="updateFaqAnswer" name="faqAnswer" required placeholder="Answer"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-flat btn-green">Submit</button>
                        <div class="btn btn-default btn-flat" data-dismiss="modal">Close</div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--Modal - Update Team Member-->
<div class="modal fade mediumpopup" id="updateOfferingSectionDiv">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Offering Section</h4>
            </div>
            <div class="modal-body">
                <!-- Wait Alert -->
                <div id='updateOfferingSectionwait_msg' class="alert alert-warning no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <!-- Error Alert -->
                <div id='updateOfferingSectionerror_msg' class="alert alert-danger no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! </b></span><span id="updateOfferingSectionerror_content"></span>
                </div>
                <!-- Success Alert -->
                <div id='updateOfferingSectionsuccess_msg' class="alert alert-success no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Success! </b></span><span id="updateOfferingSectionsuccess_content"></span>
                </div>
                <form class="form-horizontal" method="post" name="updateOfferingSection" id="updateOfferingSection">
                    <input type="hidden" name="offerId" id="offerId" value="<?php echo $this->uri->segment(3); ?>" />
                    <input type="hidden" name="sectionId" id="sectionId" value="" />
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Default Name<span class="redtxt">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="defaultName" id="defaultName" required="" value="" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Custom Name <span class="redtxt">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="customName" id="customName" required="" value="" class="form-control" >
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-flat btn-green">Submit</button>
                        <div class="btn btn-default btn-flat" data-dismiss="modal">Close</div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
