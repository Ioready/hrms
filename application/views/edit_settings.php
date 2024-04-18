
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Settings</h1>
                       

    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Wait Alert -->
                <div id="updateSettingwait_msg" class="alert alert-warning no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <!-- Error Alert -->
                <div id="updateSettingerror_msg" class="alert alert-danger no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! </b></span><span id="updateSettingerror_content"></span>
                </div>
                <!-- Success Alert -->
                <div id="updateSettingsuccess_msg" class="alert alert-success no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Success! </b></span><span id="updateSettingsuccess_content"></span>
                </div>
                <div class="frmdtls_center_700">
                    <!-- Horizontal Form -->
                    <div class="box box-info allfrmdtls_boxcontent">
                    	<!-- <h3 class="text-center pink-text font-bold py-4 mr-1 pdgn-top"><strong>Subscribe</strong></h3> -->
                        <form class="form-horizontal" name="editSetting" id="editSetting" method="post">
                                <?php
                                    foreach ($getAllSetting as $key=>$value) {
                                        
                                        ?> 
                            <div class="box-body frm-bor-rad-nd">                              

                            <div class="form-group">                                        
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">App Name:</label>
                                          <input name="app_name" id="app_name" value="<?php echo $value['app_name']; ?>" type="text" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Company Name:</label>
                                          <input name="company_name" id="company_name" value="<?php echo $value['company_name']; ?>" type="text" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Phone No.:</label>
                                          <input name="phone" id="phone" value="<?php echo $value['phone']; ?>" type="text" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Email:</label>
                                          <input name="Email" id="Email" placeholder="" class="form-control frm-bor-rad" value="<?php echo $value['Email']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Address:</label>
                                          <textarea name="address" id="address" placeholder="" class="form-control frm-bor-rad"><?php echo $value['address']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Rep Name:</label>
                                          <input name="RepName" id="RepName" placeholder="" class="form-control frm-bor-rad" value="<?php echo $value['RepName']; ?>">
                                        </div>
                                    </div>

                                 
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Red Line:</label>
                                          <input name="Direct_Line" id="Direct_Line" placeholder="" class="form-control frm-bor-rad" value="<?php echo $value['Direct_Line']; ?>" >
                                        </div>
                                    </div>
                                       <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">FSC Certificate:</label>
                                          <textarea name="fsc_certificate" id="fsc_certificate" placeholder="" class="form-control frm-bor-rad"><?php echo $value['fsc_certificate']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Invoice No:</label>
                                          <input name="invoice_no" id="invoice_no" placeholder="" class="form-control frm-bor-rad" value="<?php echo $value['invoice_no']; ?>">
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Terms & Condition:</label>
                                          <textarea name="terms_condition" id="terms_condition" placeholder="" class="form-control frm-bor-rad"><?php echo $value['terms_condition']; ?></textarea>
                                        </div>
                                    </div>
                                    

                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">App Logo:</label>
                                        <div class="d-flex align-items-center">
                                            <a href="#">
                                                <div class="image image-mini">
                                                    <img src="<?php echo base_url($value['app_logo']); ?>" alt="app" class="user-img">
                                                </div>
                                            </a>
                                        </div>

                                          <input name="app" id="app" value="" type="file" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div>


                                    
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Invoice Logo:</label>
                                          <div class="d-flex align-items-center">
                                            <a href="#">
                                                <div class="image image-mini">
                                                    <img src="<?php echo base_url($value['invoice_logo']); ?>" alt="email" class="user-img">
                                                </div>
                                            </a>
                                        </div>
                                          <input name="invoice" id="invoice" value="" type="file" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Email Logo:</label>
                                          <div class="d-flex align-items-center">
                                            <a href="#">
                                                <div class="image image-mini">
                                                    <img src="<?php echo base_url($value['email_logo']); ?>" alt="email" class="user-img">
                                                </div>
                                            </a>
                                        </div>
                                          <input name="email" id="email" value="" type="file" placeholder="" class="form-control frm-bor-rad">
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">SMTP HOST:</label>
                                          <input name="SMTPHOST" id="SMTPHOST"  type="text" placeholder="" class="form-control frm-bor-rad" value="<?php echo $value['SMTPHOST']; ?>" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">SMTP FROM NAME:</label>
                                          <input name="SMTPFROMNAME" id="SMTPFROMNAME"  type="text" placeholder="" class="form-control frm-bor-rad" value="<?php echo $value['SMTPFROMNAME']; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">SMTP FROM EMAIL:</label>
                                          <input name="SMTPFROMEMAIL" id="SMTPFROMEMAIL"  type="email" placeholder="" class="form-control frm-bor-rad" value="<?php echo $value['SMTPFROMEMAIL']; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">SMTP PASSWORD:</label>
                                          <input name="SMTPPASSWORD" type="password" id="SMTPPASSWORD" placeholder="" class="form-control frm-bor-rad" value="<?php echo $value['SMTPPASSWORD']; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">SMTP USERNAME:</label>
                                          <input name="SMTPUSERNAME"  type="text" id="SMTPUSERNAME" placeholder="" class="form-control frm-bor-rad" value="<?php echo $value['SMTPUSERNAME']; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">SMTP PORT:</label>
                                          <input name="SMTPPORT"  type="text" id="SMTPPORT" placeholder="" class="form-control frm-bor-rad" value="<?php echo $value['SMTPPORT']; ?>" >
                                        </div>
                                    </div>


                                  
                                </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-green btn-flat">Save</button>
                                <a href= "<?php echo base_url('dashboard/settings');?>"><button type="button" class="btn btn-green btn-flat" >Discard</button></a>
                            </div>
                            <!-- /.box-footer -->
                            <?php }?> 
                        </form>
                    </div>
                    <!-- /.box -->
            </div>
        </div>
    </section>               
            
    
    <!-- /.content -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() { 

    $("#editSetting").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        var file_data = $('#app').prop('files')[0];   
        // var file_data1 = $('#email').prop('files')[0];   
        var file_data2 = $('#invoice').prop('files')[0];   
        $('#updateSettingwait_msg').slideDown(1000);
        var other_data = $('#editSetting').serializeArray();
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        // form_data.append('file1', file_data1);
        form_data.append('file2', file_data2);
        $.each(other_data, function (key, input) {
            form_data.append(input.name, input.value);
        });
        console.log(file_data)
        $.ajax({
            url: baseURL + "dashboard/updateSetting",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            success: function(result) {
                            if (result >= 1) {
                                $('#updateSettingsuccess_content').html('Setting updated successfully');
                                $('#updateSettingsuccess_msg').slideDown(1000);
                                $('#updateSettingwait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'dashboard/settings';
                                }, 4000);
                            } else {
                                window.scrollTo(0, 0);
                                $('#updateSettingerror_content').html(result);
                                $('#updateSettingwait_msg').slideUp(1000);
                                $('#updateSettingerror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#updateSettingerror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });
            });
           
    </script>