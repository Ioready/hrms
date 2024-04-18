<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Tax</h1>
        <span class="tbltoprgt_btn"><a data-toggle="modal"data-target="#addtax" class="btn btn-flat btn-sm btn-success margn-right-btn">Add New Tax</a></span>   

    </section>

    <div class="innercontentdiv whitebg">
                    <div class="alldata_tbl">
                        <div id="all_tbl_container1">
                            <div class="table-responsive"> 
                                <table id="client_tbl" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th>Name</th>
                                        <th>Value</th>
                                        <!-- <th>Default</th> -->
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php if(isset($getAllTax) && !empty($getAllTax)){ 
                                              foreach($getAllTax as $key=>$value){
                                        ?>
                                        <tr>
                                          <td><?php echo $value['name']; ?></td>
                                          <td><?php echo $value['tax'];?>%</td>
                                         
                                         <!-- <td><div class="form-group">
                                     <label class="switch">
                                        <input type="radio" data-id='<?php //echo base64_encode($value['id']); ?>' class="defaultTaxStatus" name="defaultTaxStatus" <?php if(!empty($value['isDefault'])) {if($value['isDefault'] == '1'){?> checked <?php }} ?>>
                                        <span class="slider round"></span>
                                    </label>
                                </div></td> -->

										
                                          <td>
                                            <a data-toggle="modal" onclick="setUpdateTaxId('<?php echo base64_encode($value['id']); ?>','<?php echo $value['name']; ?>','<?php echo $value['tax']; ?>','<?php echo $value['isDefault']; ?>');" data-target="#UpdateTaxModal">
                                            <i class="fa fa-edit" data-toggle="tooltip" data-original-title="Edit Tax" data-placement="left" title=""></i></a>
                                            <a data-toggle="modal" onclick="setDeleteTaxId('<?php echo base64_encode($value['id']); ?>');" data-target="#DeleteTaxModal"><i class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Tax" data-placement="left" title=""></i></a>
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



<!-- Status -->



<div id="addtax" class="modal fade in">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X</button>
                <h1 class="modal-title text-center">Add Tax</h1>
            </div>
            <div class="modal-body">
                <div id='addtaxform_wait' class="alert alert-warning no-border" style="display: none;">
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <div id='addtaxform_error' class="alert alert-danger no-border" style="display: none;">
                    <span class="text-semibold"><b>Sorry! </b></span><span id="addtaxform_econtent"></span>
                </div>
                <div id='addtaxform_success' class="alert alert-success no-border" style="display: none;">
                    <span class="text-semibold"><b>Success! </b></span><span id="addtaxform_scontent"></span>
                </div>
                <form name="addtaxform" id="addtaxform" method="post">
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        <label for="name" class="form-label required mb-3">Name:</label>
                        <input id="tax_name" class="form-control form-control-solid" required="" placeholder="Name" name="tax_name" type="text">
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        <label for="value" class="form-label required mb-3">Value:</label>
                        <input id="tax_value" class="form-control form-control-solid" oninput="validity.valid||(value=value.replace(/[e\+\-]/gi,''))" min="0" max="100" step=".01" required="" placeholder="Value" name="tax_value" type="number">
                    </div>
                    <!-- <div class="form-group col-sm-12 mb-5">
                        <label for="is_default" class="form-label mb-3">Is Default:</label>
                        <div class="form-check form-check-custom ">
                            <div class="btn-group">
                                <input id="is_default_yes" class="form-check-input me-2" type="radio" name="is_default" value="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                                <input id="is_default_no" class="form-check-input mx-2" type="radio" name="is_default" value="0" checked="">
                                <label class="form-check-label">
                                    No
                                </label>
                            </div>
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

<div id="UpdateTaxModal" class="modal fade in">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X</button>
                <h1 class="modal-title text-center">Edit Tax</h1>
            </div>
            <div class="modal-body">
                <div id='edittaxform_wait' class="alert alert-warning no-border" style="display: none;">
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <div id='edittaxform_error' class="alert alert-danger no-border" style="display: none;">
                    <span class="text-semibold"><b>Sorry! </b></span><span id="edittaxform_econtent"></span>
                </div>
                <div id='edittaxform_success' class="alert alert-success no-border" style="display: none;">
                    <span class="text-semibold"><b>Success! </b></span><span id="edittaxform_scontent"></span>
                </div>
                <form name="edittaxform" id="edittaxform" method="post">
                <div class="row">
                <input type="hidden" name="edit_taxId" id="edit_taxId" />

                    <div class="form-group col-sm-12 mb-5">
                        <label for="name" class="form-label required mb-3">Name:</label>
                        <input id="edit_tax_name" class="form-control form-control-solid" required="" placeholder="Name" name="edit_tax_name" type="text">
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        <label for="value" class="form-label required mb-3">Value:</label>
                        <input id="edit_tax_value" class="form-control form-control-solid" oninput="validity.valid||(value=value.replace(/[e\+\-]/gi,''))" min="0" max="100" step=".01" required="" placeholder="Value" name="edit_tax_value" type="number">
                    </div>
                    <!-- <div class="form-group col-sm-12 mb-5">
                        <label for="is_default" class="form-label mb-3">Is Default:</label>
                        <div class="form-check form-check-custom ">
                            <div class="btn-group">
                                <input id="edit_is_default_yes" class="form-check-input me-2" type="radio" name="edit_is_default" value="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                                <input id="edit_is_default_no" class="form-check-input mx-2" type="radio" name="edit_is_default" value="0" checked="">
                                <label class="form-check-label">
                                    No
                                </label>
                            </div>
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


<div class="modal fade issuerpopup" id="DeleteTaxModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Tax</h4>
            </div>
            <form class="form-horizontal" method="post" name="deletetaxform" id="deletetaxform">
                <div class="modal-body">
                        <div id='deletetaxform_wait' class="alert alert-warning no-border" style="display: none;">
                            <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                        </div>
                        <div id='deletetaxform_error' class="alert alert-danger no-border" style="display: none;">
                            <span class="text-semibold"><b>Sorry! </b></span><span id="deletetaxform_econtent"></span>
                        </div>
                        <div id='deletetaxform_success' class="alert alert-success no-border" style="display: none;">
                            <span class="text-semibold"><b>Success! </b></span><span id="deletetaxform_scontent"></span>
                        </div>
                    <div class="popupcontentdiv">
                        <h4 class="text-center">Delete !<br><br>Are you sure want to delete this 'Tax' ?<br><br></h4>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="col-sm-2"></div>
                                <input type="hidden" name="delete_taxId" id="delete_taxId" />
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>

    function setUpdateTaxId(taxId,name,value,isDefault){
        $('#edit_taxId').val(taxId);
        $('#edit_tax_name').val(name);
        $('#edit_tax_value').val(value);
        if(isDefault == '1'){
        $("#edit_is_default_yes").attr('checked', true);
        $("#edit_is_default_no").attr('checked', false);
        }else{
        $("#edit_is_default_no").attr('checked', true);
        $("#edit_is_default_yes").attr('checked', false);
        }

    }

    function setDeleteTaxId(taxId){
        $("#delete_taxId").val(taxId);
    }

$(document).ready(function(){
    
$("#addtaxform").submit(function(e) {
    e.preventDefault();
    window.scrollTo(0, 0);
    $('#addtaxform_wait').slideDown(1000);
    var data = $(this).serialize();
                $.ajax({
                    url: baseURL + "taxes/addtax",
                    type: "POST",
                    data: data,
                    success: function(result) {
                        if (result == 1) {
                            $('#addtaxform_scontent').html('Tax added successfully');
                            $('#addtaxform_success').slideDown(1000);
                            $('#addtaxform_wait').slideUp(1000);
                            setTimeout(function() {
                                window.location.href = baseURL + 'taxes/';
                            }, 4000);
                            return false;

                        }else if (result == 3) {
                            window.scrollTo(0, 0);
                            $('#addtaxform_econtent').html('The name has already been taken!');
                            $('#addtaxform_wait').slideUp(1000);
                            $('#addtaxform_error').slideDown(1000);
                            setTimeout(function() {
                                $('#addtaxform_econtent').slideUp(1000);
                            }, 4000);
                            return false;

                        } else {
                            window.scrollTo(0, 0);
                            $('#addtaxform_econtent').html('Something went wrong. Please try again!');
                            $('#addtaxform_wait').slideUp(1000);
                            $('#addtaxform_error').slideDown(1000);
                            setTimeout(function() {
                                $('#addtaxform_econtent').slideUp(1000);
                            }, 4000);
                            return false;

                        }
                    },
                });
            });
            
    $(".defaultTaxStatus").change(function () {
            var status = $(this).val();
            var taxId = $(this).attr("data-id")
            if ($(".defaultTaxStatus").is(":checked")) {
                status = "1";
            } else {
                status = "0";
            }
            var data = { status: status, taxId : taxId };
            $.ajax({
                url: baseURL + "taxes/updateDefaultTax",
                type: "POST",
                data: data,
                success: function (result) {
                    if (result) {
                    
                        setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                    }
                },
            });
        });
    $("#edittaxform").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#edittaxform_wait').slideDown(1000);
        var data = $(this).serialize();
                $.ajax({
                    url: baseURL + "taxes/updateTax",
                    type: "POST",
                    data: data,
                    success: function(result) {
                        if (result == 1) {
                            $('#edittaxform_scontent').html('Tax updated successfully');
                            $('#edittaxform_success').slideDown(1000);
                            $('#edittaxform_wait').slideUp(1000);
                            setTimeout(function() {
                                window.location.href = baseURL + 'taxes/';
                            }, 4000);
                            return false;
                        }else if (result == 3) {
                            window.scrollTo(0, 0);
                            $('#edittaxform_econtent').html('The name has already been taken!');
                            $('#edittaxform_wait').slideUp(1000);
                            $('#edittaxform_error').slideDown(1000);
                            setTimeout(function() {
                                $('#edittaxform_econtent').slideUp(1000);
                            }, 4000);
                            return false;

                        } else {
                            window.scrollTo(0, 0);
                            $('#edittaxform_econtent').html('Something went wrong. Please try again!');
                            $('#edittaxform_wait').slideUp(1000);
                            $('#edittaxform_error').slideDown(1000);
                            setTimeout(function() {
                                $('#edittaxform_econtent').slideUp(1000);
                            }, 4000);
                            return false;
                        }
                    },
                });
        });
 $("#deletetaxform").submit(function(e) {
    e.preventDefault();
    window.scrollTo(0, 0);
    $('#deletetaxform_wait').slideDown(1000);
    var data = $(this).serialize();
            $.ajax({
                url: baseURL + "taxes/deletetax",
                type: "POST",
                data: data,
                success: function(result) {
                    if (result == 1) {
                        $('#deletetaxform_scontent').html('Tax deleted successfully');
                        $('#deletetaxform_success').slideDown(1000);
                        $('#deletetaxform_wait').slideUp(1000);
                        setTimeout(function() {
                            window.location.href = baseURL + 'taxes/';
                        }, 4000);
                        return false;

                    } else {
                        window.scrollTo(0, 0);
                        $('#deletetaxform_econtent').html('Something went wrong. Please try again!');
                        $('#deletetaxform_wait').slideUp(1000);
                        $('#deletetaxform_error').slideDown(1000);
                        setTimeout(function() {
                            $('#deletetaxform_econtent').slideUp(1000);
                        }, 4000);
                        return false;

                    }
                },
            });
    });



    });
</script>
