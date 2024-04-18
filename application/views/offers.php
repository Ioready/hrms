


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Offers to Customers</h1>
    </section>
    <section class="content container-fluid">
        
        <div class="row">
            <div class="col-sm-12">
                <!-- Wait Alert -->
                <div id="send_offerswait_msg" class="alert alert-warning no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <!-- Error Alert -->
                <div id="send_offerserror_msg" class="alert alert-danger no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! </b></span><span id="send_offerserror_content"></span>
                </div>
                <!-- Success Alert -->
                <div id="send_offerssuccess_msg" class="alert alert-success no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Success! </b></span><span id="send_offerssuccess_content"></span>
                </div>
<?php 
		$getSetting = getSetting();
        ?>
                    <form class="form-horizontal" name="send_offers" id="send_offers" method="post">
                            <div class="box-body frm-bor-rad-nd">                              

                            <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Subject</label>
                                          <input name="mail_subject" id="mail_subject" required placeholder="Enter your subject" value=" <?php echo contentDecode($getSetting['mail_subject']); ?>" class="form-control frm-bor-rad">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="control-label lab-nd">Mail Content</label>
                                          </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <textarea name="mail_content" id="mail_content" required placeholder="Please type your email content" class="form-control frm-bor-rad">
                                          <?php echo contentDecode($getSetting['mail_content']); ?>
                                          </textarea>
                                          </div>
                                    </div>

                                </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-green btn-flat">SEND E-MAIL</button>
                            </div>
                            <!-- /.box-footer -->
                            <?php //}?> 
                        </form>
    
    </section>               

<div class="innercontentdiv whitebg">
                    <div class="alldata_tbl">
                        <div id="all_tbl_container1">
                            <div class="table-responsive"> 
                                <table id="client_tbl" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th>Customer Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php if(isset($getClientList) && !empty($getClientList)){ 
                                              foreach($getClientList as $key=>$value){
                                        ?>
                                        <tr>
                                          <td><?php echo $value['customerName']; ?></td>
                                          <td><?php echo $value['email']; ?></td>
                                          <td>
                                          <div class="form-group">
                                    <label class="switch">
                                    <?php if(!empty($value['notify'])) {
                                        if($value['notify'] == 'yes'){?>
                                        <input type="checkbox" data-id='<?php echo $value['customerRowId']; ?>' value="yes" class="updateNotifyStatus" name="updateNotifyStatus" checked >
                                        <?php }else { ?>
                                        <input type="checkbox" data-id='<?php echo $value['customerRowId']; ?>' value="no" class="updateNotifyStatus" name="updateNotifyStatus">
                                        <?php }} ?>

                                        <span class="slider round"></span>
                                    </label>
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
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    
    function sendCommonFile(file, el) {
	var data = new FormData();
	data.append("file", file);
	console.log(data);

	$.ajax({
		data: data,
		type: "POST",
        url: baseURL + "offers/updateSummerNoteImages",
		cache: false,
		contentType: false,
		processData: false,
		success: function (imageUrl) {
			console.log(imageUrl);
// 			var obj = jQuery.parseJSON(imageUrl);
// 			console.log(obj);
			$(el).summernote("editor.insertImage", imageUrl);
		},
	});

}
$(document).ready(function() { 
    
    // $('#mail_content').summernote({
	// 	height: 300,

    // });
    $('#mail_content').summernote({
	height: 300,
    callbacks: {
        onImageUpload: function (files, editor, welEditable) {
				for (var i = files.length - 1; i >= 0; i--) {
					sendCommonFile(files[i], this);
				}
            }
        // onImageUpload: function(image) {
        //     uploadImage(image[0]);
        // }
    }
});

    
    $(".updateNotifyStatus").click(function () {
            var status = $(this).val();
            var ca_id = $(this).attr("data-id")
            if ($(this).is(":checked")) {
                status = "yes";
            } else {
                status = "no";
            }
            var data = { status: status, ca_id : ca_id };
           
            $.ajax({
                url: baseURL + "offers/updateNotify",
                type: "POST",
                data: data,
                success: function (result) {
                    if (result) {
                    
                        setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                    }
                },
            });
        });

    $("#send_offers").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#send_offerswait_msg').slideDown(1000);
        var data = $(this).serialize();
                    $.ajax({
                        url: baseURL + "offers/SendMailsToClient",
                        type: "POST",
                        data: data,
            success: function(result) {
                            if (result) {
                                $('#send_offerssuccess_content').html('Mail(s) sent successfully');
                                $('#send_offerssuccess_msg').slideDown(1000);
                                $('#send_offerswait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'offers';
                                }, 4000);
                            } else {
                                window.scrollTo(0, 0);
                                $('#send_offerserror_content').html('Something went wrong. Please try again!');
                                $('#send_offerswait_msg').slideUp(1000);
                                $('#send_offerserror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#send_offerserror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });
            });
           
    </script>