
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<style>
.newpaytooltip .toolHints{
	position:relative !important;
	top:0px !important;
}
</style>
<style type="text/css">
    .tooltip-inner {min-width:115px;}
    #all_tbl_container .table-responsive #users_tbl tr th{
        min-width: 0px !Important;
    }
    .serial_check{min-width: 0px !Important;}
    .switch {
  position: relative;
  display: inline-block;
  width: 54px;
  height: 27px;
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
  height: 20px;
  width: 20px;
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
.snimgupcolor small{
    color:red;
    padding-left: 2%;
}
.eye_padd{
	margin-left: 24px;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="contentheader_title">Edit Offer</h1>
        <span class="tbltoprgt_btn"><a onclick="goBack();" class="btn btn-flat btn-sm btn-green">Back</a></span>
       <?php  if(empty($offerDetails)){ ?>
        <span class="tbltoprgt_btn"><a data-toggle="modal" data-target="#ReopenUpdateModal" class="btn btn-flat btn-sm btn-primary margn-right-btn">Reopen Offer</a></span>
        <?php } ?>
    </section>

    <?php echo $subMenu; ?>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Wait Alert -->
                <div id='editOfferwait_msg' class="alert alert-warning no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <!-- Error Alert -->
                <div id='editOffererror_msg' class="alert alert-danger no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! </b></span><span id="editOffererror_content"></span>
                </div>
                <!-- Success Alert -->
                <div id='editOffersuccess_msg' class="alert alert-success no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Success! </b></span><span id="editOffersuccess_content"></span>
                </div>
                  <?php  if(empty($offerDetails)){ ?>
                    <div id='' class="alert alert-danger no-border" >
                        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                        <span class="text-semibold"><b>Sorry! </b></span><span id="">This offering is closed.</span>
                    </div>
                <?php } ?>
                <div class="frmdtls_center_700">
                    <!-- Horizontal Form -->
                    <div class="box box-info allfrmdtls_boxcontent">
                        <?php if(empty($offerDetails)){
                                $offerDetails = $localOfferDetails;
                            } if(!empty($offerDetails)){ foreach ($offerDetails as $key => $details) { ?>
                            <!-- form start -->
                            <form class="form-horizontal" name="editOffer" id="editOffer" method="post">
                            <input type="hidden" name="offerId" id="offerId" value="<?php echo $this->uri->segment(4); ?>" />
                                <div class="box-body">
                                <span id="showpaymeterr"></span><br>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Offering Id <span class="redtxt">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="offeringId" id="offeringId" readonly required="" value="<?php echo $details['id']; ?>" class="form-control" placeholder="Percentage Raised">
                                        </div>
                                    </div>
                                    <input type="hidden" name="issuerId" id="issuerId" value="<?php echo base64_encode($details['issuerId']); ?>" />
                                    

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Offering Name <span class="redtxt">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="offerName" id="offerName" required="" value="<?php echo $details['issueName']; ?>" class="form-control" placeholder="Offering Name">
                                        </div>
                                    </div>
                                    <?php foreach ($localOfferDetails as $key => $offer) { ?>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Offering Exemption <span class="redtxt">*</span></label>
                                            <div class="col-sm-8">
                                                <div class="select_style">
                                                    <select name="typeOffering" id="typeOffering" required>
                                                        <option value="">--- Select ---</option>
                                                        <option value="506B" <?php if ($offer['offering_types'] == '506B') { ?> selected="" <?php } ?>>506B</option>
                                                        <option value="506C" <?php if ($offer['offering_types'] == '506C') { ?> selected="" <?php } ?>>506C</option>
                                                        <option value="Regulation CF" <?php if ($offer['offering_types'] == 'Regulation CF') { ?> selected="" <?php } ?>>Regulation CF</option>
                                                        <option value="Reg A+" <?php if ($offer['offering_types'] == 'Reg A+') { ?> selected="" <?php } ?>>Reg A+</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="form-group">
                                            <label class="col-sm-4 control-label">Preview on Home page <span class="redtxt">*</span></label>
                                            <div class="col-sm-8">
                                                <div class="radio icheck">
                                                    <label>
                                                        <span><input type="radio" name="previewHomePage" id="previewHomePageYes" value="Yes" <?php if ($offer['home'] == 'Yes') { ?> checked="" <?php } ?>><span class="rdoptntxt"> Yes</span></span>
                                                        <span><input type="radio" name="previewHomePage" id="previewHomePageNo" value="No" <?php if ($offer['home'] == 'No') { ?> checked="" <?php } ?>><span class="rdoptntxt"> No</span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Display in Marketplace <span class="redtxt">*</span></label>
                                            <div class="col-sm-8">
                                                <div class="radio icheck">
                                                    <label>

                                                    <?php foreach ($localOfferDetails as $key => $offer) { 
                                                       if ($offer['dealType'] == 'Demo') { ?> 
                                                        <span class="marketYes eye_padd"><input type="radio" name="displayMarket" id="displayMarketYes" value="Yes"><span class="rdoptntxt"> Yes</span></span>
                                                        <span class="marketNo eye_padd"><input type="radio" name="displayMarket" id="displayMarketNo" value="No" <?php if ($offer['marketplace'] == 'No'|| $offer['marketplace'] == 'Yes') { ?> checked="" <?php } ?>><span class="rdoptntxt"> No</span></span>
                                                       <?php }else{ ?>
                                                        <span class="marketYes eye_padd"><input type="radio" name="displayMarket" id="displayMarketYes" value="Yes" <?php if ($offer['marketplace'] == 'Yes') { ?> checked="" <?php } ?>><span class="rdoptntxt"> Yes</span></span>
                                                        <span class="marketNo eye_padd"><input type="radio" name="displayMarket" id="displayMarketNo" value="No" <?php if ($offer['marketplace'] == 'No') { ?> checked="" <?php } ?>><span class="rdoptntxt"> No</span></span>
                                                    <?php }} ?> 


                                                       </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Accreditation Verification <span class="redtxt">*</span></label>
                                            <div class="col-sm-8">
                                                <div class="radio icheck">
                                                    <label>
                                                        <span class="eye_padd"><input type="radio" name="aiVerification" id="aiVerificationYes" value="1" <?php if ($offer['aiStatus'] == '1') { ?> checked="" <?php } ?>><span class="rdoptntxt"> On</span></span>
                                                        <span class="eye_padd"><input type="radio" name="aiVerification" id="aiVerificationNo" value="0" <?php if ($offer['aiStatus'] == '0') { ?> checked="" <?php } ?>><span class="rdoptntxt"> Off</span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label class="col-sm-4 control-label">Type<span class="redtxt">*</span></label>
                                            <div class="col-sm-8">
                                                <div class="radio icheck">
                                                    <label>
                                                        <span class="eye_padd"><input type="radio" name="sharestype" id="sharestype" value="0" <?php if ($offer['sharetype'] == '0') { ?> checked="" <?php } ?>><span class="rdoptntxt"> Shares</span></span>
  <span class="eye_padd"><input type="radio" name="sharestype" id="sharestype" value="1" <?php if($offer['sharetype'] == '1') { ?> checked="" <?php } ?>><span class="rdoptntxt"> Dollar Amount</span></span>
   
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Allow fractional units? <span class="redtxt">*</span></label>
                                            <div class="col-sm-8">
                                                <div class="radio icheck">
                                                    <label>
                                                        <span class="eye_padd"><input type="radio" name="fractionaltypes" id="fractionaltypes" value="0" <?php if ($offer['fractionaltypes'] == '0') { ?> checked="" <?php } ?>><span class="rdoptntxt"> Yes</span></span>
  <span class="eye_padd"><input type="radio" name="fractionaltypes" id="fractionaltypes" value="1" <?php if($offer['fractionaltypes'] == '1') { ?> checked="" <?php } ?>><span class="rdoptntxt"> No</span></span>
   
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Offering Type <span class="redtxt">*</span></label>
                                        <div class="col-sm-8">
                                            <div class="select_style">
                                                <select name="offeringType" id="offeringType" required>
                                                    <option value="">--- Select Offering Type ---</option>
                                                    <option value="Equity" <?php if ($details['issueType'] == 'Equity') { ?> selected="" <?php } ?>>Equity</option>
                                                    <option value="Debt" <?php if ($details['issueType'] == 'Debt') { ?> selected="" <?php } ?>>Debt</option>
                                                    <option value="Hybrid" <?php if ($details['issueType'] == 'Hybrid') { ?> selected="" <?php } ?>>Hybrid</option>
                                                    <option value="Fund" <?php if ($details['issueType'] == 'Fund') { ?> selected="" <?php } ?>>Fund</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <?php foreach ($localOfferDetails as $key => $offer) { ?>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Offering Stage <span class="redtxt">*</span></label>
                                            <div class="col-sm-8">
                                                <div class="select_style">
                                                    <select name="dealType" id="dealType" required>
                                                        <option value="">--- Select ---</option>
                                                        <option class="stageYes" value="Accepting Investment" <?php if ($offer['dealType'] == 'Accepting Investment') { ?> selected <?php } ?>>Accepting Investment</option>
                                                         <option class="stageYes" value="Sample" <?php if ($offer['dealType'] == 'Sample') { ?> selected <?php } ?>>View Only</option>
                                                        <option class="stageYes" value="Indications of Interest" <?php if ($offer['dealType'] == 'Indications of Interest') { ?> selected <?php } ?>>Indications of Interest</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                       


                                    <div class="form-group">
                                    <label class="col-sm-4 control-label">Progress Display</label>
                                    <div class="col-sm-8">
                                        <div class="switchDiv" id="">
                                                <label class="switch">
                                                  <input type="checkbox" id="progressStatus" name="progressStatus" <?php if($offer['progressonOff'] == '1'){?> checked <?php } ?>>
                                                  <span class="slider round"></span>
                                                </label>
                                                
                                            </div> 
                                    </div>
                                </div>
                                <div class="form-group" id="pergrepercent" <?php if($offer['progressonOff'] == '1'){?> style="display:block;" <?php }else{ ?>style="display:none;"<?php } ?>>
                                    <label class="col-sm-4 control-label"></label>
                                    <div class="col-sm-8">
                                        <div class="radio icheck" style="padding-top: 0px;">
                                            <label>
                                                <span class="eye_padd"><input  type="radio" name="progressvalues" id="progressvalues" value="0" <?php if ($offer['progressbar_values'] == '0') { ?> checked="" <?php } ?>><span class="rdoptntxt"> Dollar Amount</span></span>
                                                <span class="eye_padd"><input type="radio" name="progressvalues" id="progressvalues" value="1" <?php if ($offer['progressbar_values'] == '1') { ?> checked="" <?php } ?>><span class="rdoptntxt"> Percentage</span></span>
                                                     
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Target Amount <span class="redtxt">*</span>
    <!--                                            <a class="toolHints" data-toggle="tooltip" title="" data-original-title="Target amount for offering. Amount Would be in dollars($)"><i class="fa fa-question-circle"></i></a>-->
                                            <a class="toolHints" data-toggle="tooltip" title="" data-original-title="Total amount to be raised."><i class="fa fa-question-circle"></i></a>
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="input-icon">
                                                <i>$</i>
                                                <input type="text" name="targetAmount" id="targetAmount" required="" value="<?php echo number_format((float)$details['targetAmount'], 2, '.', ''); ?>" class="form-control" placeholder="Target Amount">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Maximum Amount <span class="redtxt">*</span>
                                            <a class="toolHints" data-toggle="tooltip" title="" data-original-title="Maximum amount that could be raised."><i class="fa fa-question-circle"></i></a>
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="input-icon">
                                                <i>$</i>
                                                <input type="text" name="maxAmount" id="maxAmount" required="" value="<?php echo number_format((float)$details['maxAmount'], 2, '.', ''); ?>" class="form-control" placeholder="Maximum Amount">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Unit Price <span class="redtxt">*</span></label>
                                        <div class="col-sm-8">
                                            <div class="input-icon">
                                                <i>$</i>
                                                <input type="text" name="unitPrice" id="unitPrice" required="" value="<?php echo number_format((float)$details['unitPrice'], 2, '.', ''); ?>" class="form-control" placeholder="Unit Price">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Minimum Subscription Amount <span class="redtxt">*</span>
    <!--                                            <a class="toolHints" data-toggle="tooltip" title="" data-original-title="Minimum subscription offering amount. Amount Would be in dollars($)"><i class="fa fa-question-circle"></i></a>-->
                                            <a class="toolHints" data-toggle="tooltip" title="" data-original-title="Minimum amount that a person can invest."><i class="fa fa-question-circle"></i></a>
                                        </label> 
                                        <div class="col-sm-8"></div>
                                        <div class="col-sm-8">
                                            <div class="input-icon">
                                                <i>$</i>
                                                <input type="text" name="minSubAmount" id="minSubAmount" required="" value="<?php echo number_format((float)$details['minAmount'], 2, '.', ''); ?>" class="form-control" placeholder="Minimum Subscription Amount">
                                            </div>
                                        </div>
                                    </div>
                                    
                                      <div class="form-group">
                                    <label class="col-sm-4 control-label">Payment Methods<span class="redtxt">*</span>
<!--                                        <a class="toolHints" data-toggle="tooltip" title="" data-original-title="Minimum subscription offering amount.Amount would be in dollars ($)"><i class="fa fa-question-circle"></i></a>-->
                                     
                                    </label>
                                   <div class="col-sm-8">
                                        <div class="input-icon newpaytooltip">
                                         
                                          <div class="checkbox icheck options">
                                                 <?php 
												 $payoption=$localOfferDetails[0]['payment_type'];
												 $paysepray=explode(',', $payoption);
												
												  ?> 
             <span class="eye_padd"> <input class="groupschecked " type="checkbox" name="payemntoption[]" id="Achtranfer" value="ACH Transfer" <?php echo (in_array('ACH Transfer', $paysepray)) ? 'checked' : '' ?>> ACH Transfer<br><br></span>
                 
             <span class="eye_padd"> <input class="groupschecked" type="checkbox" name="payemntoption[]" id="wiretranfer" value="Wire" <?php echo (in_array('Wire', $paysepray)) ? 'checked' : '' ?>> Wire<br><br>  </span>
				
             <span class="eye_padd"><input class="groupschecked" type="checkbox" name="payemntoption[]" id="checktranfer" value="Check" <?php echo (in_array('Check', $paysepray)) ? 'checked' : '' ?>> Check<br><br></span>
                    
                   
                       <span id="credit_card1" class="eye_padd" <?php if(in_array('Credit Card Fee', $paysepray)){?> style="display:none;" <?php } ?>><input class="groupschecked" type="checkbox" name="payemntoption[]" id="credittranfer1" value="Credit Card" <?php echo (in_array('Credit Card', $paysepray)) ? 'checked' : '' ?>> Credit Card<br><br></span>
                   
                      <span id="credit_card" class="eye_padd" <?php if(in_array('Credit Card', $paysepray)){?> style="display:none;" <?php } ?>><input class="groupschecked" type="checkbox" name="payemntoption[]"  id="credittranfer" value="Credit Card Fee" <?php echo (in_array('Credit Card Fee', $paysepray)) ? 'checked' : '' ?>> Credit Card (passthrough fees to investor)   <a class="toolHints" data-toggle="tooltip" title="" data-original-title="Credit card transaction fees will be added to the investor's purchase amount."><i class="fa fa-info-circle"></i></a></span><br>
									
                      
                                                           
                                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Start Date <span class="redtxt">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="startDate" id="startDate" required="" value="<?php echo $details['startDate']; ?>" class="form-control" placeholder="Start Date">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">End Date <span class="redtxt">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="endDate" id="endDate" required="" value="<?php echo $details['endDate']; ?>" class="form-control" placeholder="End Date">
                                        </div>
                                    </div>

                                    <div class="form-group" style="display:none;">
                                        <label class="col-sm-4 control-label">Offering Status <span class="redtxt">*</span></label>
                                        <div class="col-sm-8">
                                            <div class="select_style">
                                                <input type="text" name="offeringStatus" id="offeringStatus" required="" value="Approved" class="form-control" placeholder="End Date">
    <!--                                                <select name="offeringStatus" id="offeringStatus" required>
                                                    <option value="">--- Select Offering Status ---</option>
                                                    <option value="Approved" <?php // if ($details['offeringStatus'] == 'Approved') {  ?> selected="" <?php // }  ?>>Approved</option>
                                                    <option value="Pending" <?php // if ($details['offeringStatus'] == 'Pending') {  ?> selected="" <?php // }  ?>>Pending</option>
                                                    <option value="Denied" <?php // if ($details['offeringStatus'] == 'Denied') {  ?> selected="" <?php // }  ?>>Denied</option>
                                                </select>-->
                                            </div>
                                        </div>
                                    </div>

                                    <?php foreach ($localOfferDetails as $key => $offer) { ?>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Number of Units <span class="redtxt">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="noUnits" id="noUnits" readonly required="" value="<?php echo $offer['number_units']; ?>" class="form-control" placeholder="Number of Units">
                                            </div>
                                        </div>
                                         <?php $tags = explode("," , $offer['offeringtags']);
                                            foreach($tags as $key => $value){
                                         ?>
                                    
                                        <div class="form-group append_fileclass" id="append_file_<?php echo $key; ?>">
                                            <label class="col-sm-4 control-label">Tags <!-- <span class="redtxt">*</span> --></label>
                                            <div class="col-sm-7">
                                                <input type="text" name="offeringtags[]" id="offeringtags"  class="form-control" placeholder="Tags" value="<?php echo $value ; ?>">
                                            </div>
                                            <?php if($key == 0){ ?>
                                            <div class="col-sm-1">
                                                <div class="input-group-addon" id="addDoc">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                            </div>
                                            <?php }else{ ?>
                                                <div class="col-sm-1">
                                                    <div class="input-group-addon remove_doc" data-id='<?php echo $key; ?>'> <i class="fa fa-times"></i></div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <?php } ?>

<!-- Social media links -->
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">LinkedIn URL <span class="redtxt"></span></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="linkedinurl" id="linkedinurl"  value="<?php echo $offer['linkedinurl']; ?>" class="form-control" placeholder="LinkedIn">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Facebook URL <span class="redtxt"></span></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="fburl" id="fburl"  value="<?php echo $offer['fburl']; ?>" class="form-control" placeholder="Facebook">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Instagram URL <span class="redtxt"></span></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="instaurl" id="instaurl"  value="<?php echo $offer['instaurl']; ?>" class="form-control" placeholder="Instagram">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Twitter URL <span class="redtxt"></span></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="tweeturl" id="tweeturl"  value="<?php echo $offer['tweeturl']; ?>" class="form-control" placeholder="Twitter">
                                        </div>
                                    </div>

<!-- Social media links -->


                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Preview Text <span class="redtxt">*</span></label>                                    
                                        <div class="col-sm-8">
                                            <textarea class="form-control" required id="previewText" name="previewText" placeholder="Preview Text"><?php echo $offer['previewText']; ?></textarea>
                                            <p style="text-align:right;"><span class="maxTextEr">200 Character Limit</span></p>
                                        </div>
                                    </div>
<?php } ?>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Document Watermark <span class="redtxt">*</span>
    <!--                                        <a class="toolHints" data-toggle="tooltip" title="" data-original-title="A Stamp text is a watermark that is placed over the offering documents"><i class="fa fa-question-circle"></i></a>-->
                                            <a class="toolHints" data-toggle="tooltip" title="" data-original-title="Watermark text that is placed over offering documents."><i class="fa fa-question-circle"></i></a>
                                        </label>                                    
                                        <div class="col-sm-8">
                                            <textarea class="form-control" required id="stampingText" name="stampingText" placeholder="Watermark"><?php echo $details['stampingText']; ?></textarea>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-sm-4 control-label">Discussion Forum
    <!--                                        <a class="toolHints" data-toggle="tooltip" title="" data-original-title="A Stamp text is a watermark that is placed over the offering documents"><i class="fa fa-question-circle"></i></a>-->
                                           
                                        </label>                                    
                                        <div class="col-sm-8">
                                            <div class="switchDiv" id="">
                                                <label class="switch">
                                                  <input type="checkbox" id="forumsStatus" name="forumsStatus" <?php if($contentDetails[0]['forums_seciton_Status'] == '1'){?> checked <?php } ?>>
                                                  <span class="slider round"></span>
                                                </label>
                                                <span class="turnbtn">
                                                  <?php if ($contentDetails[0]['forums_seciton_Status'] == '1') {

                                                     echo "On";
                                                      }
                                                     else{ echo "Off";}
                                                    ?>

                                                </span>
                                            </div> 
                                        </div>
                                    </div>
                                    
                                    <?php foreach ($localOfferDetails as $key => $offer) { ?>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">ACH/Wire Instructions</label>                                    
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="AchWireInstruction" name="AchWireInstruction"><?php echo stripslashes($offer['AchWireInstruction']); ?></textarea>
                                        
                                        
                                        
                                        </div>
                                    </div>
                           
                                     <div class="form-group">
                                        <label class="col-sm-4 control-label">Investment Page Disclaimer</label>                                    
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="investpageDisclimaer" name="investpageDisclimaer"><?php echo stripslashes($offer['investpageDisclimaer']); ?></textarea>
                                    
                                    

                                </div>
                                    </div>
                                    
                                    
<?php }?>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" id="submitcont" class="btn btn-green btn-flat pull-right">Save Changes</button>
                                </div>
                                <!-- /.box-footer -->
                            </form>
                             <?php }}else{ ?>
                                 <div class="box-body" style="padding: 100px 0px 240px">
                                    <h2 class="text-center">This offer is closed.</h2>
                                 </div>
                        <?php } ?>
                    </div>
                    <!-- /.box -->
                </div>   
            </div>
        </div>
    </section>
    <!-- /.content -->

    <?php echo $subMenu; ?>

</div>
<div class="modal fade" id="ReopenUpdateModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Reopen Offer</h4>
            </div>
            <!-- Wait Alert -->
            <div id='reopenOfferwait_msg' class="alert alert-warning no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
            </div>
            <!-- Error Alert -->
            <div id='reopenOffererror_msg' class="alert alert-danger no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Sorry! </b></span><span id="reopenOffererror_content"></span>
            </div>
            <!-- Success Alert -->
            <div id='reopenOffersuccess_msg' class="alert alert-success no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Success! </b></span><span id="reopenOffersuccess_content"></span>
            </div>
            <form class="form-horizontal" method="post" name="reopenOffer" id="reopenOffer">
                <div class="modal-body">
                    <div class="popupcontentdiv">
                        <h4 class="text-center">Are you sure you want to reopen the<br>selected offers?<br><br></h4>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                <input type="hidden" name="reopenOfferId" id="reopenOfferId" value="<?php echo $this->uri->segment(4); ?>" />
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-green">Yes</button>
                        <div class="btn btn-default btn-flat" data-dismiss="modal">Cancel</div>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
