
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Bulk Upload</h1>
                       

    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Wait Alert -->
                <div id="bulkUploadwait_msg" class="alert alert-warning no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <!-- Error Alert -->
                <div id="bulkUploaderror_msg" class="alert alert-danger no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! </b></span><span id="bulkUploaderror_content"></span>
                </div>
                <!-- Success Alert -->
                <div id="bulkUploadsuccess_msg" class="alert alert-success no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Success! </b></span><span id="bulkUploadsuccess_content"></span>
                </div>
                <div class="frmdtls_center_500">
                    <!-- Horizontal Form -->
                    <div class="box box-info allfrmdtls_boxcontent">
                <div class="modal-body scroll-y">
                        <form class="form-horizontal" name="bulkUpload" id="bulkUpload" method="post" enctype="multipart/form-data">
                           
                                    <div class="form-group col-lg-4 col-sm-12 mb-5 ">
                                        <label for="name_product" class="form-label mb-3">Please Upload Your File Here:<span class="redtxt">*</span></label>
                                        <div class="input-group">
                                        <input id="bulkfile" class="form-control" required placeholder="" name="file" type="file">
                                         </div>
                                    </div>
                                  
                                </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-green btn-flat">Save</button>
                                <a href= "<?php echo base_url('Bulk_Upload/');?>"><button type="button" class="btn btn-green btn-flat" >Discard</button></a>

                            </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() { 

    $("#bulkUpload").submit(function(e) {
        e.preventDefault();

        window.scrollTo(0, 0);
        $('#bulkUploadwait_msg').slideDown(1000);
        var file_data = $('#bulkfile').prop('files')[0];   
        var other_data = $('#bulkUpload').serializeArray();
        var form_data = new FormData();  
        form_data.append('file', file_data);
        $.each(other_data, function (key, input) {
            form_data.append(input.name, input.value);
        });       
       
                    $.ajax({
                        url: baseURL + "Bulk_Upload/upload_data",
                        type: "POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function(result) {
                            if (result) {
                                $('#bulkUploadsuccess_content').html('File uploaded successfully');
                                $('#bulkUploadsuccess_msg').slideDown(1000);
                                $('#bulkUploadwait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'Bulk_Upload';
                                }, 4000);
                            } else {
                                window.scrollTo(0, 0);
                                $('#bulkUploaderror_content').html(result);
                                $('#bulkUploadwait_msg').slideUp(1000);
                                $('#bulkUploaderror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#bulkUploaderror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });
            });
    </script>