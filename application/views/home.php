<div class="login-box">
    <div class="login-logo">
        <?php 
        $setting = getSetting();
        ?>
        <a href="#"><img src="<?php echo base_url($setting['app_logo']); ?>" style="width: 50%;" border="0" alt=""/></a>
    </div>
    <!-- Wait Alert -->
    <div id='superAdminLoginwait_msg' class="alert alert-warning no-border" style="display:none;">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
        <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
    </div>
    <!-- Error Alert -->
    <div id='superAdminLoginerror_msg' class="alert alert-danger no-border" style="display:none;">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
        <span class="text-semibold"></span><span id="superAdminLoginerror_content"></span>
    </div>
    <!-- Success Alert -->
    <div id='superAdminLoginsuccess_msg' class="alert alert-success no-border" style="display:none;">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
        <span class="text-semibold"><b>Success! </b></span><span id="superAdminLoginsuccess_content"></span>
    </div>
    <div class="loginheadbar"><div class="loginheader"><i class="fa fa-unlock-alt"></i></div></div>
    <div class="flip-container">
        <div class="flipper" id="flipper">
            <div class="front">
                <div class="login-box-body bg-white">
                    <form name="superAdminLogin" id="superAdminLogin" method="post">
                        <div class="form-group has-feedback frm-btm">
                            <input type="text" required name="useremail" id="username" class="form-control" placeholder="Email">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback frm-btm">
                            <input type="password" required name="password" id="password" class="form-control" placeholder="Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="row signinchkbox signin_remfrgtpwd">
                            <div class="col-sm-6 pl-7">
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox" id="remember" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <span class="frmcnt_fgtpwd"><a class="flipbutton" id="forgotButton">Forgot Password?</a></span>
                            </div>
                            <div class="col-xs-12">
                                <div align="center"><button type="submit" class="btn btn-primary btn-lg btn-block  btn_mrgntop_20">LOGIN</button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                       <div class="back">
                <div class="login-box-body">
                 <div class="topcontent" id="topcontent" style="display:none;">
                <span style="font-size:15px;"> A password recovery has been sent to your email. If you don’t receive this email, contact Tech Support at <a href="mailto:techsupport@northcapital.com">techsupport@northcapital.com</a></span>
                 <div class="frm_bottomtxt"><a class="flipbutton" id="loginButton">Log In to my account</a></div>
                 </div>
                
                <div class="forcontentpwd" id="forcontentpwd">
                
                <div class="col-sm-12">
                <div id='forgotPwdwait_msg' class="alert alert-success no-border" style="font-size: 16px;display:none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <!-- Error Alert -->
                <div id='forgotPwderror_msg' class="alert alert-danger no-border" style="font-size: 16px;display:none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! </b></span><span id="forgotPwderror_content"></span>
                </div>
            </div>
                    <form method="post" method="post" id="superadminforgotpwd">
                        <div class="form-group has-feedback frm-btm">
                            <input type="email" name="email" id="email"  class="form-control" placeholder="Email" required>
                            <span class="glyphicon glyphicon-envelope form-control-feedback-1" ></span>
                        </div>
                        <div class="row signinchkbox signin_remfrgtpwd">
                            <div class="col-xs-12">
                                <div align="center"><button type="submit" class="btn btn-primary btn-flat btn-green btn_mrgntop_20">SUBMIT</button></div>
                            </div>
                        </div>
                        <div class="frm_bottomtxt"><a class="flipbutton" id="loginButton1">Log In to my account</a></div>
                    </form>
                    
                    
                    </div>
                    
                </div>	
            </div>
        </div>
    </div>  
</div>
