<!-- Content Wrapper. Contains page content -->

                                       
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Quotes</h1>
        <span class="tbltoprgt_btn"><a href="<?php echo base_url('Quotes/addQuotes'); ?>" class="btn btn-flat btn-sm btn-success margn-right-btn">New Quote</a></span>   
        <span class="tbltoprgt_btn"><a href="<?php echo base_url('Quotes/exportCSV'); ?>" class="btn btn-flat btn-sm btn-success margn-right-btn">Export All</a></span>  

    </section>


    <div class="innercontentdiv whitebg">
                    <div class="alldata_tbl">
                        <div id="all_tbl_container1">
                            <div class="table-responsive"> 
                                <table id="client_tbl" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th>Client</th>
                                        <th>Quotes Date</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php if(isset($getAllQuotes) && !empty($getAllQuotes)){ 
                                              foreach($getAllQuotes as $key=>$value){
                                               
                                        ?>
                                        <tr>
                                          <td><?php echo $value['client_id']; ?></td>
                                          <td><?php echo $value['quotes_date']; ?></td>
                                          <td><?php echo $value['due_date']; ?></td>
                                          <td><?php echo $value['quotes_status']; ?></td>
                                        <td>
                                        <a data-toggle="modal" href= "<?php echo base_url('Quotes/editQuotes/').base64_encode($value['id']); ?>"> <i class="fa fa-pencil" data-toggle="tooltip"  data-original-title="Edit Quotes"></i></a> |
                                            <a data-toggle="modal" data-target="#deleteQuotesModal" onclick="setdeleteQuotesId('<?php echo $value['id']; ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Quotes" data-placement="left" title=""></i></a>
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
<div class="modal fade issuerpopup" id="deleteQuotesModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Invoice</h4>
            </div>
            <!-- Wait Alert -->
            <div id='deleteQuoteswait_msg' class="alert alert-warning no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
            </div>
            <!-- Error Alert -->
            <div id='deleteQuoteserror_msg' class="alert alert-danger no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Sorry! </b></span><span id="deleteQuoteserror_content"></span>
            </div>
            <!-- Success Alert -->
            <div id='deleteQuotessuccess_msg' class="alert alert-success no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Success! </b></span><span id="deleteQuotessuccess_content"></span>
            </div>
            <form class="form-horizontal" method="post" name="deleteQuotes" id="deleteQuotes">
                <div class="modal-body">
                    <div class="popupcontentdiv">
                        <h4 class="text-center">Delete !<br><br>Are you sure want to delete this "Quotes" ?</br></br></h4>
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
      $("#deleteQuotes").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#deleteQuotessuccess_msg ,#deleteQuoteserror_msg').slideUp(1000);
        $('#deleteQuoteswait_msg').slideDown(1000);
       
        var data = $(this).serialize();
                    $.ajax({
                        url: baseURL + "Quotes/deleteQuotes",
                        type: "POST",
                        data: data,
                        success: function(result) {
                            if(result==1) {
                                $('#deleteQuotessuccess_content').html('Quotes deleted successfully');
                                $('#deleteQuotessuccess_msg').slideDown(1000);
                                $('#deleteQuoteswait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'Quotes';
                                }, 4000);
                            } else if(result==0) {
                                window.scrollTo(0, 0);
                                $('#deleteQuoteserror_content').html("Not Deleted");
                                $('#deleteQuoteswait_msg').slideUp(1000);
                                $('#deleteQuoteserror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#deleteQuoteserror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });
                

    });

    
function setdeleteQuotesId(id,name) {
    $("#delete_cat_id").val(id);
    

}
    
</script>
