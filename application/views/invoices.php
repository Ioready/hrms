<!-- Content Wrapper. Contains page content -->

                                       
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Invoices</h1>
        <span class="tbltoprgt_btn"><a href="<?php echo base_url('Invoices/addInvoices'); ?>" class="btn btn-flat btn-sm btn-success margn-right-btn">New Invoice</a></span>   
        <span class="tbltoprgt_btn"><a href="<?php echo base_url('Invoices/exportCSV'); ?>" class="btn btn-flat btn-sm btn-success margn-right-btn">Export All</a></span>   

    </section>


    <div class="innercontentdiv whitebg">
                    <div class="alldata_tbl">
                        <div id="all_tbl_container1">
                            <div class="table-responsive"> 
                                <table id="client_tbl" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th>Client</th>
                                        <th>Invoice Date</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php if(isset($getAllInvoice) && !empty($getAllInvoice)){ 
                                              foreach($getAllInvoice as $key=>$value){
                                               
                                        ?>
                                        <tr>
                                          <td><?php echo $value['client_id']; ?></td>
                                          <td><?php echo $value['invoice_date']; ?></td>
                                          <td><?php echo $value['due_date']; ?></td>
                                          <td><?php echo $value['invoice_status']; ?></td>
                                        <td>
                                        <a data-toggle="modal" href= "<?php echo base_url('Invoices/editInvoices/').base64_encode($value['id']); ?>"> <i class="fa fa-pencil" data-toggle="tooltip"  data-original-title="Edit Product"></i></a> |
                                            <a data-toggle="modal" data-target="#deleteInvoiceModal" onclick="setdeleteInvoiceId('<?php echo $value['id']; ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Invoice" data-placement="left" title=""></i></a>
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


<!-- delete Category -->
<div class="modal fade issuerpopup" id="deleteInvoiceModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Invoice</h4>
            </div>
            <!-- Wait Alert -->
            <div id='deleteProductwait_msg' class="alert alert-warning no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
            </div>
            <!-- Error Alert -->
            <div id='deleteInvoiceerror_msg' class="alert alert-danger no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Sorry! </b></span><span id="deleteInvoiceerror_content"></span>
            </div>
            <!-- Success Alert -->
            <div id='deleteInvoicesuccess_msg' class="alert alert-success no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Success! </b></span><span id="deleteInvoicesuccess_content"></span>
            </div>
            <form class="form-horizontal" method="post" name="deleteInvoice" id="deleteInvoice">
                <div class="modal-body">
                    <div class="popupcontentdiv">
                        <h4 class="text-center">Delete !<br><br>Are you sure want to delete this "Category" ?</br></br></h4>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="col-sm-2"></div>
                                <input type="hidden" name="delete_cat_id" id="delete_cat_id" value="<?php echo ($value['id']); ?>"/>
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
    $(document).ready(function(){
      $("#deleteInvoice").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#deleteInvoicesuccess_msg ,#deleteInvoiceerror_msg').slideUp(1000);
        $('#deleteInvoicewait_msg').slideDown(1000);
       
        var data = $(this).serialize();
                    $.ajax({
                        url: baseURL + "Invoices/deleteInvoice",
                        type: "POST",
                        data: data,
                        success: function(result) {
                            if(result==1) {
                                $('#deleteInvoicesuccess_content').html('Invoice deleted successfully');
                                $('#deleteInvoicesuccess_msg').slideDown(1000);
                                $('#deleteInvoicewait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'Invoices';
                                }, 4000);
                            } else if(result==0) {
                                window.scrollTo(0, 0);
                                $('#deleteInvoiceerror_content').html("Not Deleted");
                                $('#deleteInvoicewait_msg').slideUp(1000);
                                $('#deleteInvoiceerror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#deleteInvoiceerror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });
                

    });

    
function setdeleteInvoiceId(id,name) {
    $("#delete_cat_id").val(id);
    

}
    
</script>
