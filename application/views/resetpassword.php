<div class="login-box">
    <div class="login-logo">
        <a href="#"><img src="<?php echo base_url('assets/img/io-removebg-preview.png'); ?>" style="width: 100%;" border="0" alt=""/></a>
    </div>
        
    <div class="loginheadbar"><div class="loginheader"><i class="fa fa-unlock-alt"></i></div></div>
    <div class="flip-container">
        <div class="flipper" id="flipper">
            <div class="front">
                <div class="login-box-body">
                    <div class="col-sm-12">
                        <div id='resetPwdwait_msg' class="alert alert-warning no-border" style="font-size: 16px;display:none;">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                            <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                        </div>
                        <!-- Error Alert -->
                        <div id='resetPwderror_msg' class="alert alert-danger no-border" style="font-size: 16px;display:none;">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                            <span class="text-semibold"><b>Sorry! </b></span><span id="resetPwderror_content"></span>
                        </div>
                        <div id='resetPwdsuccess_msg' class="alert alert-success no-border" style="font-size: 16px;display:none;">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                            <span class="text-semibold"><b>Success! </b>Password Updated Successfully</span>
                        </div>
                    </div>
                    <form name="resetAdminUserpwd" id="resetAdminUserpwd" role="form" >  
                <input class="form-control" name="userId" id="userId" value="<?php echo $this->uri->segment(3); ?>" type="hidden" required>
                <div class="form-group has-feedback frm-btm">
                    <div class="col-sm-12">
                        <div class="dfields_div dmrgntop_15 dmrgnbtm_15_480_320">
                            <div class="ca_mrgnbtm_10">
                                <input class="form-control" name="Password" id="Password" placeholder="Password" type="password" required>
								 <span class="glyphicon glyphicon-lock form-control-feedback"></span>
								 <span id="result"></span>
                                <span id="pwdValidate" style="display: none">Password should be minimum 8 characters with at least 1 Uppercase Alphabet, 1 Lowercase Alphabet, and 1 Number.</span>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="form-group has-feedback frm-btm">
                    <div class="col-sm-12">
                        <div class="dfields_div dmrgntop_15 dmrgnbtm_15_480_320">
                            <div class="ca_mrgnbtm_10">
                                <input class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" type="password" required>
								 <span class="glyphicon glyphicon-lock form-control-feedback"></span>
								 <span id="confirmresult"></span>
                                <span id="pwdMismatch"></span>
                            </div>
                        </div>
                    </div>
                </div>

                
                    <div align="center"><button name="resetPwdsubmit" id="resetPwdsubmit" type="submit" class="btn btn-primary btn-flat btn-green btn_mrgntop_20">Set Up Password</button></div>
                
            </form>
                </div>
            </div>
                      
        </div>
    </div>  
</div>
