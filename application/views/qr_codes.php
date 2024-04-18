<!-- Content Wrapper. Contains page content -->

<style>
    .file-upload {
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 150px;
  padding: 30px;
  border: 1px dashed silver;
  border-radius: 8px;
}

.file-upload input {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  cursor: pointer;
  opacity: 0;
}

.preview_img {
  height: 80px;
  width: 80px;
  border: 4px solid silver;
  border-radius: 100%;
  object-fit: cover;
}
.edit_preview_img {
  height: 80px;
  width: 80px;
  border: 4px solid silver;
  border-radius: 100%;
  object-fit: cover;
}
</style>                                      
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Add QR Code</h1>
        <span class="tbltoprgt_btn"><a data-toggle="modal"data-target="#addQRcode" class="btn btn-flat btn-sm btn-success margn-right-btn">Add QR Code</a></span>   

    </section>

    <div class="innercontentdiv whitebg">
                    <div class="alldata_tbl">
                        <div id="all_tbl_container1">
                            <div class="table-responsive"> 
                                <table id="client_tbl" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th>Title</th>
                                        <th>QR Image</th>
                                        <th>Default</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php if(isset($getAllqrcodes) && !empty($getAllqrcodes)){ 
                                              foreach($getAllqrcodes as $key=>$value){
                                                
                                        ?>
                                        
                                        <tr>
                                          <td><?php echo $value['name']; ?></td>

                                          <td>
                                          <div class="d-flex align-items-center">
                                            <a href="#">
                                                <div class="image image-mini me-3">
                                                    <img src="<?php echo base_url($value['qr_code']); ?>" alt="qr_code" class="user-img">
                                                </div>
                                            </a>
                                        </div>
                                          <td><div class="form-group">
                                    <label class="switch">
                                        <input type="radio" data-id='<?php echo base64_encode($value['id']); ?>' class="defaultQRStatus" name="defaultQRStatus" <?php if(!empty($value['isDefault'])) {if($value['isDefault'] == '1'){?> checked <?php }} ?>>
                                        <span class="slider round"></span>
                                    </label>
                                </div></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#updateQRcode" onclick="setUpdateQRcodeId('<?php echo $value['id'];?>','<?php echo $value['name'];?>','<?php echo base_url($value['qr_code']); ?>');"><i class="fa fa-pencil" data-toggle="tooltip"  data-original-title="Edit QR Code"></i></a> | 

                                            <a data-toggle="modal" data-target="#deleteQRcode" onclick="setdeleteQRcodeId('<?php echo $value['id']; ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-original-title="Edit QR Code" data-placement="left" title=""></i></a>
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


<!-- add category -->
<div id="addQRcode" class="modal fade in">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X</button>
                <h1 class="modal-title text-center">Add QR Code</h1>
            </div>
            <div class="modal-body">
                <div id='addQRcodeWaitMsg' class="alert alert-warning no-border" style="display: none;">
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <div id='addQRcodeErrorMsg' class="alert alert-danger no-border" style="display: none;">
                    <span class="text-semibold"><b>Sorry! </b></span><span id="addQRcodeerror_content"></span>
                </div>
                <div id='addQRcodeSuccessMsg' class="alert alert-success no-border" style="display: none;">
                    <span class="text-semibold"><b>Success! </b></span><span id="addQRcodesuccess_content"></span>
                </div>
                <form name="addQRcodeform" id="addQRcodeform" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        <label for="name" class="form-label required mb-3">Title:</label>
                        <input id="qr_name" class="form-control form-control-solid" required="" placeholder="Title" name="qr_name" type="text">
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        <label for="value" class="form-label required mb-3">QR Image:</label>
                        <div class="form-group col-sm-12 mb-5">
                        <img class="preview_img" src="<?php echo base_url('assets/img/avatar.png'); ?>"> 
                        <input type="file" class="image"  name="addimage" required id="addimage" accept="image/*" >
                        </div>
                    </div>
                    </div>
                </div>
                <div class="modal-footer pt-0">
                <button type="submit" class="btn btn-primary me-2" id="btnSave" data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing...">Save</button>
                <button type="button" class="btn btn-secondary btn-active-light-primary me-3" data-dismiss="modal">Cancel</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div> 
<!-- update category -->
<div id="updateQRcode" class="modal fade in">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X</button>
                <h1 class="modal-title text-center">Update QR Code</h1>
            </div>
            <div class="modal-body">
                <div id='updateQRcodewait_msg' class="alert alert-warning no-border" style="display: none;">
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <div id='updateQRcodeerror_msg' class="alert alert-danger no-border" style="display: none;">
                    <span class="text-semibold"><b>Sorry! </b></span><span id="updateQRcodeerror_content"></span>
                </div>
                <div id='updateQRcodesuccess_msg' class="alert alert-success no-border" style="display: none;">
                    <span class="text-semibold"><b>Success! </b></span><span id="updateQRcodesuccess_content"></span>
                </div>
                
               
                <form name="updateQRcodeform" id="updateQRcodeform" method="post">
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                    <input type="hidden" name="edit_qr_id" id="edit_qr_id" value=""/>
                        <label for="name" class="form-label required mb-3">Title:</label>
                        <input id="edit_qr_name" class="form-control form-control-solid" required="" placeholder="Title" name="edit_qr_name" type="text" value=""/>
                                               
                    </div>
                    <!-- <div class="form-group col-sm-12 mb-5">
                        <label for="value" class="form-label required mb-3">QR Image:</label>
                        <div class="form-group col-sm-12 mb-5">
                        <img class="edit_preview_img" src="<?php //echo base_url('assets/img/avatar.png'); ?>"> 
                        <input type="file" class="edit_image" required name="edit_image" id="edit_image" accept="image/*" >
                        </div>

                    </div> -->
                </div>
               
                <div class="modal-footer pt-0">
                <button type="submit" class="btn btn-primary me-2" id="btnSave" data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing...">Save</button>
                <button type="button" class="btn btn-secondary btn-active-light-primary me-3" data-dismiss="modal">Cancel</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- delete Category -->
<div class="modal fade issuerpopup" id="deleteQRcode">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete QR Code</h4>
            </div>
            <!-- Wait Alert -->
            <div id='deleteQrcodewait_msg' class="alert alert-warning no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
            </div>
            <!-- Error Alert -->
            <div id='deleteQrcodeerror_msg' class="alert alert-danger no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Sorry! </b></span><span id="deleteClienterror_content"></span>
            </div>
            <!-- Success Alert -->
            <div id='deleteQrcodesuccess_msg' class="alert alert-success no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Success! </b></span><span id="deleteQrcodesuccess_content"></span>
            </div>
            <form class="form-horizontal" method="post" name="deleteQrcode" id="deleteQrcode">
                <div class="modal-body">
                    <div class="popupcontentdiv">
                        <h4 class="text-center">Delete !<br><br>Are you sure want to delete this "Payment QR Code" ?</br></br></h4>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="col-sm-2"></div>
                                <input type="hidden" name="delete_qr_id" id="delete_qr_id" value=""/>
                                <div class="col-sm-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-flat btn-green">Yes,Delete!</button>
                        <div class="btn btn-default btn-flat" data-dismiss="modal">No,Cancel</div>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>


<!-- add category -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
     function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#preview_img')
                  .attr('src', e.target.result);
          };

          reader.readAsDataURL(input.files[0]);
      }
  }
  
  $(document).ready(function() {
    $('#addQRcodeform').submit(function(e){
        e.preventDefault();
        window.scrollTo(0, 0);
        var file_data = $('#addimage').prop('files')[0];   
        $('#addQRcodeSuccessMsg,#addQRcodeErrorMsg').slideUp(1000);
        $('#addQRcodeWaitMsg').slideDown(1000);
        var other_data = $('#addQRcodeform').serializeArray();
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        $.each(other_data, function (key, input) {
            form_data.append(input.name, input.value);
        });

        $.ajax({
            url: baseURL + "Qr_codes/addQrcodes",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            success: function(result) {
                if(result == '1') {
                    $('#addQRcodesuccess_content').html('QR Code added successfully');
                    $('#addQRcodeSuccessMsg').slideDown(1000);
                    $('#addQRcodeWaitMsg').slideUp(1000);
                    setTimeout(function() {
                        window.location.href = baseURL + 'Qr_codes';
                    }, 4000);
                    return false;
                }else if (result == '3') {
                    window.scrollTo(0, 0);
                    $('#addQRcodeerror_content').html("The name has already been taken!");
                    $('#addQRcodeErrorMsg').slideUp(1000);
                    $('#addQRcodeWaitMsg').slideDown(1000);
                    setTimeout(function() {
                        $('#addQRcodeErrorMsg').slideUp(1000);
                    }, 4000);
                    return false;

                } else {
                    window.scrollTo(0, 0);
                    $('#addQRcodeerror_content').html("Something went wrong. Please try again.");
                    $('#addQRcodeErrorMsg').slideUp(1000);
                    $('#addQRcodeWaitMsg').slideDown(1000);
                    setTimeout(function() {
                        $('#addQRcodeErrorMsg').slideUp(1000);
                    }, 4000);
                    return false;

                            }
                        },
            
        });
    });
});
    $(document).ready(function(){
        
    $("#addQRcodeform1").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#addQRcodeSuccessMsg,#addQRcodeErrorMsg').slideUp(1000);
        $('#addQRcodeWaitMsg').slideDown(1000);
        var data = $('#addQRcodeform').serialize();

        console.log(data)
                    $.ajax({
                        url: baseURL + "Qr_codes/addQrcodes",
                        type: "POST",
                        data: data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(result) {
                            if(result>1) {
                                $('#addQRcodesuccess_content').html('QR Code saved successfully');
                                $('#addQRcodeSuccessMsg').slideDown(1000);
                                $('#addQRcodeWaitMsg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'Qr_codes';
                                }, 4000);
                            } else if(result==0) {
                                window.scrollTo(0, 0);
                                $('#addQRcodeerror_content').html("Something went wrong.Please try again.");
                                $('#addQRcodeErrorMsg').slideUp(1000);
                                $('#addQRcodeWaitMsg').slideDown(1000);addQRcodeErrorMsg
                                setTimeout(function() {
                                    $('#addQRcodeErrorMsg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });

        //  update
         $("#updateQRcodeform").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#updateQRcodesuccess_msg,#updateQRcodeerror_msg').slideUp(1000);
        $('#updateQRcodewait_msg').slideDown(1000);
       
        var data = $(this).serialize();
                    $.ajax({
                        url: baseURL + "Qr_codes/updateQrcode",
                        type: "POST",
                        data: data,
                        success: function(result) {
                            if(result== '1') {
                                $('#updateQRcodesuccess_content').html('Payment QR Code updated successfully');
                                $('#updateQRcodesuccess_msg').slideDown(1000);
                                $('#updateQRcodewait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'Qr_codes';
                                }, 4000);
                            }else if (result == '3') {
                                window.scrollTo(0, 0);
                                $('#updateQRcodeerror_content').html("The name has already been taken!");
                                $('#updateQRcodewait_msg').slideUp(1000);
                                $('#updateQRcodeerror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#updateQRcodeerror_msg').slideUp(1000);
                                }, 4000);  

                            } 
                            else { 
                                window.scrollTo(0, 0);
                                $('#updateQRcodeerror_content').html("Something went wrong.Please try again");
                                $('#updateQRcodewait_msg').slideUp(1000);
                                $('#updateQRcodeerror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#updateQRcodeerror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });
            


            
      $("#deleteQrcode").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#deleteQrcodesuccess_msg ,#deleteQrcodeerror_msg').slideUp(1000);
        $('#deleteQrcodewait_msg').slideDown(1000);
       
        var data = $(this).serialize();
                    $.ajax({
                        url: baseURL + "Qr_codes/deleteQrcode",
                        type: "POST",
                        data: data,
                        success: function(result) {
                            if(result==1) {
                                $('#deleteQrcodesuccess_content').html('Payment QR Code deleted successfully');
                                $('#deleteQrcodesuccess_msg').slideDown(1000);
                                $('#deleteQrcodewait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'Qr_codes';
                                }, 4000);
                            } else  {
                                window.scrollTo(0, 0);
                                $('#deleteQrcodeerror_content').html("Something went wrong. Please try again");
                                $('#deleteQrcodewait_msg').slideUp(1000);
                                $('#deleteQrcodeerror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#deleteQrcodeerror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });
            $(".defaultQRStatus").change(function () {
            var status = $(this).val();
            var qr_id = $(this).attr("data-id")
            if ($(".defaultQRStatus").is(":checked")) {
                status = "1";
            } else {
                status = "0";
            }
            var data = { status: status, qr_id : qr_id };
            $.ajax({
                url: baseURL + "Qr_codes/updateDefaultQR",
                type: "POST",
                data: data,
                success: function (result) {
                    if (result) {
                    
                        setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                    }
                },
            });
        });
$("input.image").change(function() {
    var file = this.files[0];
    var url = URL.createObjectURL(file);
    $(this).closest(".row").find(".preview_img").attr("src", url);
  });
  $("input.edit_image").change(function() {
    var file = this.files[0];
    var url = URL.createObjectURL(file);
    $(this).closest(".row").find(".edit_preview_img").attr("src", url);
  });
  });
    
    function setUpdateQRcodeId(id,name,url) {
    $("#edit_qr_id").val(id);
    $("#edit_qr_name").val(name);
    $(".edit_preview_img").attr("src", url);


}
function setdeleteQRcodeId(id,name) {
    $("#delete_qr_id").val(id);
    

}

    
</script>
