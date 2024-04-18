<style>

.invoice-box {
  max-width: 1000px;
  margin: auto;
  padding: 30px;
  border: 1px solid #eee;
  box-shadow: 0 0 10px rgba(0, 0, 0, .15);
  font-size: 16px;
  line-height: 24px;
  font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
  color: #555;
}

.invoice-box table {
  width: 100%;
  line-height: inherit;
  text-align: left;
}

.invoice-box table td {
  padding: 5px;
  vertical-align: top;
}

.invoice-box table tr td:nth-child(n+2) {
  text-align: right;
}

.invoice-box table tr.top table td {
  padding-bottom: 20px;
}

.invoice-box table tr.top table td.title {
  font-size: 45px;
  line-height: 45px;
  color: #333;
}

.invoice-box table tr.information table td {
  padding-bottom: 40px;
}

.invoice-box table tr.heading td {
  background: #eee;
  border-bottom: 1px solid #ddd;
  font-weight: bold;
}

.invoice-box table tr.details td {
  padding-bottom: 20px;
}

.invoice-box table tr.item td{
  border-bottom: 1px solid #eee;
}

.invoice-box table tr.item.last td {
  border-bottom: none;
}

.invoice-box table tr.item input {
  padding-left: 5px;
}

.invoice-box table tr.item td:first-child input {
  margin-left: -5px;
  width: 100%;
}

.invoice-box table tr.total td:nth-child(2) {
  border-top: 2px solid #eee;
  font-weight: bold;
}

.invoice-box input[type=number] {
  width: 60px;
}

@media only screen and (max-width: 600px) {
  .invoice-box table tr.top table td {
      width: 100%;
      display: block;
      text-align: center;
  }
  
  .invoice-box table tr.information table td {
      width: 100%;
      display: block;
      text-align: center;
  }
}

/** RTL **/
.rtl {
  direction: rtl;
  font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
}

.rtl table {
  text-align: right;
}

.rtl table tr td:nth-child(2) {
  text-align: left;
}
    </style>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Add Quotes</h1>
                       

    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Wait Alert -->
                <div id="addQuoteswait_msg" class="alert alert-warning no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <!-- Error Alert -->
                <div id="addQuoteserror_msg" class="alert alert-danger no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Sorry! </b></span><span id="addQuoteserror_content"></span>
                </div>
                <!-- Success Alert -->
                <div id="addQuotessuccess_msg" class="alert alert-success no-border" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><b>Success! </b></span><span id="addQuotessuccess_content"></span>
                </div>
                <div class="frmdtls_center_900">
                    <!-- Horizontal Form -->
                    <div class="box box-info allfrmdtls_boxcontent">
                    	<!-- <h3 class="text-center pink-text font-bold py-4 mr-1 pdgn-top"><strong>Subscribe</strong></h3> -->
                        <form class="form-horizontal" name="addQuotes" id="addQuotes" method="post">
                           
                            <div class="box-body frm-bor-rad-nd">                              
                                                  
                            <div class="form-group">                                        
                                        <div class="col-md-12">
                                            <label for="name_client" class="control-label lab-nd">Client:<span class="redtxt">*</span></label>
                                        <select id="client" name="client" class="form-control frm-bor-rad">
                                    <option value="">---Select Client---</option>
                                    <?php
                                    $client = getAllClient();
                                     foreach ($client as $val) { ?>
                                        <option value="<?php echo $val['ca_id']; ?>" ><?php echo $val['ca_fname']; ?></option>
                                    <?php } ?>                      
                                </select>                                            
                            </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <div class="col-md-12">                                        
                                            <label for="quotes_id" class="control-label lab-nd">Quotes <span class="redtxt">#</span></label>
                                        
                                        <input id="quotes_name" class="form-control frm-bor-rad" placeholder="" readonly name="quotes_name" type="text" value="<?php echo generateRandomCode(6);?>">
                                         </div>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-12"> 
                                           <label for="price" class="control-label lab-nd">Quotes Date:<span class="redtxt">*</span></label>
                                        
                                        <input id="quotes_date" class="form-control frm-bor-rad" autocomplete="off" required data-focus="false"  type="text" name="quotes_date" type="text">
                                         </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <div class="col-md-12">                                        
                                            <label for="price" class="control-label lab-nd">Due Date:<span class="redtxt">*</span></label>
                                        
                                        <input id="due_date" class="form-control frm-bor-rad" autocomplete="off" required data-focus="false"  type="text" name="due_date" type="text">
                                         </div>
                                    </div>
                                    

                                    <div class="form-group">                                        
                                        <div class="col-md-12"> 
                                            <label for="status" class="control-label lab-nd">Status:</label>
                                          <select name="quotes_status" id="quotes_status" class="form-control frm-bor-rad">
                                              <option value="Draft">Draft</option>
                                            
                                          </select>
                                        </div>
                                </div>
 
                                   
                                <div class="form-group">                                        
                                        <div class="col-md-12"> 
                                            <label for="qr_code" class="control-label lab-nd">Payment QR Code:</label>
                                          <select name="qr_code_id" id="qr_code_id" class="form-control frm-bor-rad">
                                          <option value="">---Select QR Code---</option>
                                            <?php
                                            $qr_code = getAllQRCode();
                                            foreach ($qr_code as $val) { ?>
                                                <option value="<?php echo $val['id']; ?>" ><?php echo $val['name']; ?></option>
                                            <?php } ?>   
                                          </select>
                                        </div>
                                </div> 





                                <div class="invoice-box">
  <table cellpadding="0" cellspacing="0">
      <td>
        Item
      </td>

      <td>
        Unit Cost
      </td>

      <td>
        Quantity
      </td>

      <td>
        Price
      </td>
    </tr>

    <tr class="item">
      <td>
      <select name="itemnames[]" class="product-select">
                                    <option value="">---Select Product---</option>
                                    <?php
                                    $client = getAllProduct();
                                     foreach ($client as $val) { ?>
                                        <option value="<?php echo $val['id']; ?>"  data-price="<?php echo $val['unit_price']; ?>" ><?php echo $val['name']; ?></option>
                                    <?php } ?>                      
                                </select>      

        <!-- <input name="itemnames[]" value="" /> -->
      </td>

      <td>
      <!-- £<input name="unitcost[]" class="unit_price" type="number" value="" /> -->
      £<input name="unitcost[]" class="unit_price" type="number" value="10" />

      </td>

      <td>
        <input name="quantity[]" type="number" value="10" />
      </td>

      <td>

      </td>
    </tr>

    
    <tr>
      <td colspan="4">
        <button type="button" class="btn-add-row">Add row</button>
      </td>
    </tr>

    <tr name="total" class="total">
      <td colspan="3"></td>

      <td>
      </td>
    </tr>
  </table>
</div>
                                    
                                         
                                    <!-- <input type="text" class="control-label frm-bor-rad col-lg-3 col-sm-12"  name="items[]" > -->
                                 
                                
                                <div class="form-group">                                        
                                        <div class="col-md-12"> 
                                        <div class="col-md-6" id="discount_div">
                                        <label for="quotes_id" class="control-label col-md-3" style="padding: 2%;">Discount:</label>
                                        
                                        <input id="fixed_or_percentage" disabled name="fixed_or_percentage" pattern="^\d*(\.\d{0,2})?$" style="width:80px;float: left;margin-right: 10px;" value="0" class="form-control frm-bor-rad" type="number">
</div>
                                    <div class="col-md-6">
                                        <select name="fixed_or_percentage1" id="fixed_or_percentage1" class="form-control frm-bor-rad" style="float:left; width: 200px;">
                                              <option value="">--Select Discount Type--</option>
                                              <option value="fixed">Fixed</option>
                                              <option value="percent">Percentage</option>
                                               
                                          </option></select>
</div>
                                         </div>
                                    </div>

                    <table class="table table-borderless box-shadow-none mb-0 mt-5">
                        <tbody>
                        <tr>
                            <td class="ps-0">Sub Total:</td>
                            <td class="text-gray-900 text-end pe-0">
                                <span>&pound;</span> <span id="sub_total" class="price">0.00</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-0">Discount:</td>
                            <td class="text-gray-900 text-end pe-0">
                                <span>&pound;</span> <span id="discount">0.00</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-0">Total:</td>
                            <td class="text-gray-900 text-end pe-0">
                                <span>&pound;</span> <span id="total">0.00</span>
                            </td>
                        </tr>
                        </tbody>
                    </table> 

                   
                                    </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-green btn-flat">Save</button>
                                <a href= "<?php echo base_url('quotes/');?>"><button type="button" class="btn btn-green btn-flat" >Discard</button></a>

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


function calculateTotals() {
  const subtotals = $('.item').map((idx, val) => calculateSubtotal(val)).get();
  const total = subtotals.reduce((a, v) => a + Number(v), 0);
  $('.total td:eq(1)').text(formatAsCurrency(total));
$('#sub_total').text(total);
discount_cal();

}

function calculateSubtotal(row) {
  const $row = $(row);
  const inputs = $row.find('input');
  const subtotal = inputs[0].value * inputs[1].value;
  $row.find('td:last').text(formatAsCurrency(subtotal));

  return subtotal;
}
function newtest(row){
  var values = $(".product-select>option:selected").map(function() { 
    alert($(this).val());
    return $(this).val(); 
  });

alert(inputs)
}
function itemPrice(){
  const subtotals = $('.item').map((idx, val) => newtest(val)).get();

  // $(this).parent().next().find('.unit_price').val($(this).find("option:selected").data("price"));
}


function formatAsCurrency(amount) {
  return `£${Number(amount).toFixed(2)}`;
}


$(document).ready(function() {  
  // $('.product-select').on('change', function() {
  //   alert($(this).find("option:selected").data("price"))

  // $(this).parent().next().find('.unit_price').val($(this).find("option:selected").data("price"));
  // });



$('table').on('mouseup keyup', 'input[type=number]', () => calculateTotals());
$('table').on('change', '.product-select', () => itemPrice());

$('.btn-add-row').on('click', () => {
  const $lastRow = $('.item:last');
  const $newRow = $lastRow.clone();

  $newRow.find('input').val('');
  $newRow.find('td:last').text('£0.00');
  $newRow.insertAfter($lastRow);

  $newRow.find('input:first').focus();
});


    $("#addQuotes").submit(function(e) {
        e.preventDefault();

        window.scrollTo(0, 0);
        $('#addQuoteswait_msg').slideDown(1000);
        var data = $(this).serialize();
       
                    $.ajax({
                        url: baseURL + "Quotes/addQuotes_ctrl",
                        type: "POST",
                        data: data,
                        success: function(result) {
                            if (result >= 1) {
                                $('#addQuotessuccess_content').html('Quotes updated successfully');
                                $('#addQuotessuccess_msg').slideDown(1000);
                                $('#addQuoteswait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'Quotes';
                                }, 4000);
                            } else {
                                window.scrollTo(0, 0);
                                $('#addQuoteserror_content').html(result);
                                $('#addQuoteswait_msg').slideUp(1000);
                                $('#addQuoteserror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#addQuoteserror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });



        $("#quotes_date,#due_date").datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: 0,
            format: "yyyy-mm-dd",
        });
            });
$(document).ready(()=>{
    
    $("#add").on("click", ()=>{
        $(".items").append(template);
    })
    $("body").on("click", ".remove", (e)=>{
        $(e.target).parent("div").remove();
    })

    $("#sub_total").html('0.00');
    $("#discount").html('0.00');
    $("#total").html('0.00');
});

$(function() {     
    $('#fixed_or_percentage1').change(function(){
        if($('#fixed_or_percentage1').val() == 'fixed') {          
      $("#fixed_or_percentage").prop('disabled', false);
      $("#fixed_or_percentage").val('');
        }else if($('#fixed_or_percentage1').val() == 'percent') {        
            $("#fixed_or_percentage").prop('disabled', false);
            $("#fixed_or_percentage").val('');
        } else {
          $("#fixed_or_percentage").prop('disabled', true);
          $("#fixed_or_percentage").val('0');
        } 
    });
});

$(document).on("change keyup blur", "#fixed_or_percentage", function() {
  discount_cal();
});
$(document).on("change keyup blur", "#fixed_or_percentage1", function() {
  discount_cal();
});


function discount_cal(){
          var disc_type = $('#fixed_or_percentage1').val();
          if(disc_type == 'fixed'){
            var main = $('#sub_total').text();
            var disc = $('#fixed_or_percentage').val();
            var dec = disc; //its convert 10 into 0.10
            var discount = main - disc;
            $('#total').text(discount);
          }else if(disc_type == 'percent'){
            var main = $('#sub_total').text();
            var disc = $('#fixed_or_percentage').val();
            var dec = (disc / 100).toFixed(2); //its convert 10 into 0.10
            var mult = main * dec; // gives the value for subtract from main value
            var discount = main - mult;
            $('#total').text(discount);
          }else{
            var main = $('#sub_total').text();
            $('#total').text(main);

          }
        }


    </script>