<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Payments</h1>
        <span class="tbltoprgt_btn"><a data-toggle="modal"data-target="#paymentModal" class="btn btn-flat btn-sm btn-success margn-right-btn">Add Payment</a></span>
        <span class="tbltoprgt_btn"><a href="<?php echo base_url('Payments/exportCSV'); ?>" class="btn btn-flat btn-sm btn-success margn-right-btn">Export All</a></span>  
    </section>

    <div class="innercontentdiv whitebg"> 
                    <div class="alldata_tbl">
                        <div id="all_tbl_container1">
                            <div class="table-responsive"> 
                                <table id="client_tbl" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th>Invoices</th>
                                        <th>Payment Date</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead> 
                                    <tbody>
                                      <?php if(isset($getAllPayment) && !empty($getAllPayment)){ 
                                        
                                              foreach($getAllPayment as $key=>$value){
                                        ?>
                                        <tr>
                                          <td><?php echo $value['InvoiceID']; ?></td>
                                          <td><?php echo $value['payment_date']; ?></td>
                                          <td><?php echo $value['amount']; ?></td>
                                          <td><?php echo $value['payment_method']; ?></td>
                                          <td><?php echo $value['notes']; ?></td>
										
                                          <td>
                                          <a data-toggle="modal" data-target="#updatepaymentModal" onclick="setUpdatePaymentId('<?php echo $value['paymentsid'];?>','<?php echo $value['dbRowId'];?>','<?php echo $value['payment_date'];?>','<?php echo $value['amount'];?>','<?php echo $value['payment_method'];?>','<?php echo $value['notes'];?>','<?php echo $value['dbDt'];?>','<?php echo $value['dueDate'];?>');"><i class="fa fa-pencil" data-toggle="tooltip"  data-original-title="Edit Payment"></i></a> | 
                                            <a data-toggle="modal" data-target="#deletepaymentModal" onclick="setdeletePaymentId('<?php echo $value['paymentsid']; ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Payment" data-placement="left" title=""></i></a>
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

<div id="paymentModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Add Payment</h2>
            </div>
            
            <div class="modal-body scroll-y">
            <div id='addClientwait_msg' class="alert alert-warning no-border" style="display: none;">
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <div id='addClienterror_msg' class="alert alert-danger no-border" style="display: none;">
                    <span class="text-semibold"><b>Sorry! </b></span><span id="addClienterror_content"></span>
                </div>
                <div id='addClientsuccess_msg' class="alert alert-success no-border" style="display: none;">
                    <span class="text-semibold"><b>Success! </b></span><span id="addClientsuccess_content"></span>
                </div>
                <form name="paymentForm" id="paymentForm" method="post">
                <div class="row">
                
                    <div class="form-group col-lg-4 col-sm-12 mb-5">
                        <label for="invoice" class="form-label required mb-3">Invoice:</label>
                        <select id="invoice_id" class="form-select  invoice " required data-control="select2" name="invoice_id">
                        <option value="">---Select Invoice---</option>
                                    <?php
                                    $invoice = getAllInvoice();
                                     foreach ($invoice as $val) { ?>
                                        <option value="<?php echo $val['dbRowId']; ?>" ><?php echo $val['InvoiceID']; ?></option>
                                    <?php } ?>   
                            
                    </select>
                    </div>
                    <div class="form-group col-lg-4 col-sm-12 mb-5 ">
                        <label for="due_amount" class="form-label mb-3">Due Amount:</label>
                        <div class="input-group">
                            <input id="due_amount" class="form-control " placeholder="Due Amount" readonly disabled name="due_amount" type="text">
                        </div>
                        <div class="input-group">
                            <a class="input-group-text bg-secondary border-0 text-decoration-none invoice-currency-code" id="autoCode" href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Currency Code">€</a>
                        </div>
                    </div>
                    <div class="form-group col-lg-4 col-sm-12 mb-5 ">
                        <label for="paid_amount" class="form-label mb-3">Paid Amount:</label>
                        <div class="input-group">
                            <input id="paid_amount" class="form-control " placeholder="Paid Amount" readonly disabled name="paid_amount" type="text">
                            <a class="input-group-text bg-secondary border-0 text-decoration-none invoice-currency-code" id="autoCode" href="javascript:void(0)"
                               data-toggle="tooltip"
                               data-placement="right" title="Currency Code">
                                €
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-4 col-sm-12 mb-5">
                        <label for="payment_date" class="form-label required mb-3">Payment Date:</label>
                        <input class="form-control  " id="payment_date" autocomplete="off" required data-focus="false" name="payment_date" type="text">
                        
                    </div>
                    <div class="form-group col-lg-4 col-sm-12 mb-5 ">
                        <label for="amount" class="form-label required mb-3">Amount:</label>
                        <div class="input-group">
                            <input id="amount" class="form-control  amount d-flex" step="any" oninput="validity.valid||(value=value.replace(/[e\+\-]/gi,&#039;&#039;))" min="0" pattern="^\d*(\.\d{0,2})?$" required placeholder="Amount" name="amount" type="number">
                            <a class="input-group-text bg-secondary border-0 text-decoration-none invoice-currency-code" id="autoCode" href="javascript:void(0)"
                               data-toggle="tooltip"
                               data-placement="right" title="Currency Code">
                                €
                            </a>
                        </div>
                    </div>
                    <div class="form-group col-lg-4 col-sm-12 mb-5">
                        <label for="payment_mode" class="form-label required mb-3">Payment Method:</label>
                        <input id="adminPaymentMode" readonly class="form-control  " name="payment_mode" type="text" value="Cash">
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        <label for="notes" class="form-label required mb-3">Note:</label>
                        <textarea id="payment_note" class="form-control " rows="5" required name="notes" cols="50"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                <button type="submit" class="btn btn-primary me-2" id="btnPay" data-loading-text="&lt;span class=&#039;spinner-border spinner-border-sm&#039;&gt;&lt;/span&gt; Processing..." data-new-text="Pay">Pay</button>
                <button type="button" class="btn btn-secondary btn-active-light-primary me-3"
                        data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- update -->

<div id="updatepaymentModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Update Payment</h2>
            </div>
            
            <div class="modal-body scroll-y">
            <div id='updatepaymentwait_msg' class="alert alert-warning no-border" style="display: none;">
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <div id='updatepaymenterror_msg' class="alert alert-danger no-border" style="display: none;">
                    <span class="text-semibold"><b>Sorry! </b></span><span id="updatepaymenterror_content"></span>
                </div>
                <div id='updatepaymentsuccess_msg' class="alert alert-success no-border" style="display: none;">
                    <span class="text-semibold"><b>Success! </b></span><span id="updatepaymentsuccess_content"></span>
                </div>
                <form name="update_paymentForm" id="update_paymentForm" method="post">
                <div class="row">
                
                <div class="form-group col-lg-4 col-sm-12 mb-5">
                    <input type="hidden" name="edit_pay_id" id="edit_pay_id" value=""/>
                        <label for="invoice_id" class="form-label mb-3">Invoice:</label>
                        <div class="input-group">
                            <input id="invoice_pay_id" class="form-control " placeholder=""  type="text" name="invoice_pay_id">
                        </div>
                    </div>

                    <div class="form-group col-lg-4 col-sm-12 mb-5 ">
                        <label for="due_amount" class="form-label mb-3">Due Amount:</label>
                        <div class="input-group">
                            <input id="payment_due_amount" class="form-control " placeholder="Due Amount" readonly disabled name="payment_due_amount" type="text">
                        </div>
                        <div class="input-group">
                            <a class="input-group-text bg-secondary border-0 text-decoration-none invoice-currency-code" id="autoCode" href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Currency Code">€</a>
                        </div>
                    </div>
                    <div class="form-group col-lg-4 col-sm-12 mb-5 ">
                        <label for="paid_amount" class="form-label mb-3">Paid Amount:</label>
                        <div class="input-group">
                            <input id="payment_paid_amount" class="form-control " placeholder="Paid Amount" readonly disabled name="payment_paid_amount" type="text">
                            <a class="input-group-text bg-secondary border-0 text-decoration-none invoice-currency-code" id="autoCode" href="javascript:void(0)"
                               data-toggle="tooltip"
                               data-placement="right" title="Currency Code">
                                €
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-4 col-sm-12 mb-5">
                        <label for="payment_date" class="form-label required mb-3">Payment Date:</label>
                        <input class="form-control  " id="update_payment_date" autocomplete="off" required data-focus="false" name="update_payment_date" type="text">
                        
                    </div>
                    <div class="form-group col-lg-4 col-sm-12 mb-5 ">
                        <label for="amount" class="form-label required mb-3">Amount:</label>
                        <div class="input-group">
                            <input id="payment_amount" class="form-control  amount d-flex" step="any" oninput="validity.valid||(value=value.replace(/[e\+\-]/gi,&#039;&#039;))" min="0" pattern="^\d*(\.\d{0,2})?$" required placeholder="Amount" name="payment_amount" type="number">
                            <a class="input-group-text bg-secondary border-0 text-decoration-none invoice-currency-code" id="autoCode" href="javascript:void(0)"
                               data-toggle="tooltip"
                               data-placement="right" title="Currency Code">
                                €
                            </a>
                        </div>
                    </div>
                    <div class="form-group col-lg-4 col-sm-12 mb-5">
                        <label for="payment_mode" class="form-label required mb-3">Payment Method:</label>
                        <input id="update_payment_mode" readonly class="form-control  " name="update_payment_mode" type="text" value="Cash">
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        <label for="notes" class="form-label required mb-3">Note:</label>
                        <textarea id="update_payment_note" class="form-control " rows="5" required name="update_payment_note" cols="50"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                <button type="submit" class="btn btn-primary me-2" id="btnPay" data-loading-text="&lt;span class=&#039;spinner-border spinner-border-sm&#039;&gt;&lt;/span&gt; Processing..." data-new-text="Pay">Pay</button>
                <button type="button" class="btn btn-secondary btn-active-light-primary me-3"
                        data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- delete -->
<div class="modal fade issuerpopup" id="deletepaymentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete User</h4>
            </div>
            <!-- Wait Alert -->
            <div id='deletepaymentwait_msg' class="alert alert-warning no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
            </div>
            <!-- Error Alert -->
            <div id='deletepaymenterror_msg' class="alert alert-danger no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Sorry! </b></span><span id="deletepaymenterror_content"></span>
            </div>
            <!-- Success Alert -->
            <div id='deletepaymentsuccess_msg' class="alert alert-success no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Success! </b></span><span id="deletepaymentsuccess_content"></span>
            </div>
            <form class="form-horizontal" method="post" name="deletepayment" id="deletepayment">
                <div class="modal-body">
                    <div class="popupcontentdiv">
                        <h4 class="text-center">Delete !<br><br>Are you sure want to delete this "Payment" ?</br></br></h4>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="col-sm-2"></div>
                                <input type="hidden" name="delete_cat_id" id="delete_cat_id" value=""/>
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






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $("#paymentForm").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#addClientwait_msg').slideDown(1000);
        var data = $(this).serialize();
                    $.ajax({
                        url: baseURL + "Payments/addPayment",
                        type: "POST",
                        data: data,
                        success: function(result) {
                            if(result==0) {
                                $('#addClientsuccess_content').html('Payment saved successfully');
                                $('#addClientsuccess_msg').slideDown(1000);
                                $('#addClientwait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'Payments';
                                }, 4000);
                            } else  {
                                window.scrollTo(0, 0);
                                $('#addClienterror_content').html("Something went wrong. Please try again");
                                $('#addClientwait_msg').slideUp(1000);
                                $('#addClienterror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#addClienterror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });
            
           
    $("#payment_date").datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: 0,
            format: "yyyy-mm-dd",
        });


        $("#update_paymentForm").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#updatepaymentsuccess_msg,#updatepaymenterror_msg').slideUp(1000);
        $('#updatepaymentwait_msg').slideDown(1000);
       
        var data = $(this).serialize();
                    $.ajax({
                        url: baseURL + "payments/updatepayment",
                        type: "POST",
                        data: data,
                        success: function(result) {
                            if(result==1) {
                                $('#updatepaymentsuccess_content').html('Payment updated successfully');
                                $('#updatepaymentsuccess_msg').slideDown(1000);
                                $('#updatepaymentwait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'payments';
                                }, 4000);
                            } else if(result==0) {
                                window.scrollTo(0, 0);
                                $('#updatepaymenterror_content').html("The name has already been taken.");
                                $('#updatepaymentwait_msg').slideUp(1000);
                                $('#updatepaymenterror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#updatepaymenterror_msg').slideUp(1000);
                                }, 4000);

                            }
                            else {
                                window.scrollTo(0, 0);
                                $('#updatepaymenterror_content').html("Not Updated");
                                $('#updatepaymentwait_msg').slideUp(1000);
                                $('#updatepaymenterror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#updatepaymenterror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });
            

                $("#invoice_id").on('change', function(ret) {  
                // console.log(ret.target.value)
                id=ret.target.value; 
                    $.ajax({
                        url: baseURL + "invoices/getInvoice",
                        type: "POST",
                        dataType: "json",
				data:{id:id },
				success:function (result) {
                console.log(result)
                 
                    $.each(result, function (index, value) {
                        if (result) {

                        $('#due_amount').val(value.dueDate); 
                        $('#paid_amount').val(value.dbDt); 
                        return true;
                        } else {
                                return false;
                            }
                    });
                        },
                    });
                    });
                    


                    $("#deletepayment").submit(function(e) {
                    e.preventDefault();
                    window.scrollTo(0, 0);
                    $('#deletepaymentsuccess_msg ,#deletepaymenterror_msg').slideUp(1000);
                    $('#deletepaymentwait_msg').slideDown(1000);
                
                var data = $(this).serialize();
                    $.ajax({
                        url: baseURL + "payments/deletePayment",
                        type: "POST",
                        data: data,
                        success: function(result) {
                            if(result==1) {
                                $('#deletepaymentsuccess_content').html('Payment deleted successfully');
                                $('#deletepaymentsuccess_msg').slideDown(1000);
                                $('#deletepaymentwait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'payments';
                                }, 4000);
                            } else if(result==0) {
                                window.scrollTo(0, 0);
                                $('#deletepaymenterror_content').html("Not Deleted");
                                $('#deletepaymentwait_msg').slideUp(1000);
                                $('#deletepaymenterror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#addpaymenterror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });
                

              
        });
        function setUpdatePaymentId(paymentsid,invoice,payment_date,amount,payment_method,notes,due_date,invoice_date) {
                   
            // console.log(invoice);
            // console.log(payment_date);
            // console.log(amount);
            // console.log(payment_method);
            // console.log(notes);
            // console.log(due_date);
            // console.log(invoice_date);
            // return false;
                $("#edit_pay_id").val(paymentsid);
                $("#invoice_pay_id").val(invoice);
                $("#payment_due_amount").val(due_date);
                $("#payment_paid_amount").val(invoice_date);
                $("#update_payment_date").val(payment_date);
                $("#payment_amount").val(amount);
                $("#update_payment_mode").val(payment_method);
                $("#update_payment_note").val(notes);
                

            }
            function setdeletePaymentId(paymentsid) {
            
    $("#delete_cat_id").val(paymentsid);
    

}
</script>
