<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/grey.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/skin-blue-light.css'); ?>">

<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/jquery.js"></script>
	<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/assets/bootstrap.js"></script> -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/jquery.json-2.4.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/jquery.blockUI.js"></script>
	<!-- <link rel='stylesheet' href='<?php  echo base_url(); ?>assets/bootstrap/css/assets/bootstrap.css'> -->
	<link rel='stylesheet' href='<?php  echo base_url(); ?>assets/bootstrap/css/global.css'>

	<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/submenu/dist/css/assets/bootstrap-submenu.min.css"> -->
	<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/submenu/docs.min.css"> -->
	<!-- <script src="<?php echo base_url(); ?>assets/bootstrap/submenu/dist/js/assets/bootstrap-submenu.min.js" defer></script> -->
	<!-- <script src="<?php echo base_url(); ?>assets/bootstrap/submenu/docs.js" defer></script> -->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/datatable/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/datatable/dataTables.tableTools.min.css">
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/bootstrap/datatable/jquery.dataTables.min.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/bootstrap/datatable/dataTables.tableTools.min.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/checktree/css/jquery-checktree.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/ui/jquery-ui.css" />
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/bootstrap/ui/jquery-ui.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/bootstrap/ui/jquery-ui.min.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/keyselection/style.css" />
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/bootstrap/keyselection/key.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/printstyle.css" />

	
    <script type="text/javascript">
        //high lighting selected row
        $("#tbl1 tr").on("click", highlightRow);
        function highlightRow()
        {
            var tableObject = $(this).parent();
            // if($(this).index() > 0)
            {
                var selected = $(this).hasClass("highlight");
                tableObject.children().removeClass("highlight");
                if(!selected)
                    $(this).addClass("highlight");
            }
        }

		</script>

<script type="text/javascript">
		var global_base_url='<?php echo base_url();?>';
	</script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/mylibrary.js"></script>
	<script src="<?php echo base_url('assets/js/adminlte.min.js'); ?>"></script>

	<style>
		/*table row selection*/
		.highlight
		{
			background-color: #337ab7 !important;
			color: white;
			/*font-weight: bold;*/
		}
		.highlightAlag
		{
			/*background-color: #337ab7 !important;*/
			/*color: white;*/
			font-weight: bold;
		}

		/*.ui-dialog .ui-dialog-titlebar .msgBoxTitleColor { background: yellow; }*/
	</style>

    
<script>
		
        // onerror = myError;
        // function myError(msg, url, line)
        // {
        //     alert(msg + "\n" + url + "\n" + line);
        //     return true;
        // }
        
        
        </script>
<!-- <div class="container-fluid" style="width:60%;"> -->

                                       
<div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Customers</h1>

    </section>

    <div class="innercontentdiv whitebg">
                    <div class="alldata_tbl">
	<div class="all_tbl_container1">
		
			<div class="" style="margin-top:25px;">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<?php
						echo "<label style='color: black; font-weight: normal;'>Customer Name:</label>";
						echo form_input('txtCustomerName', '', "class='form-control' id='txtCustomerName' style='' autofocus maxlength=50 autocomplete='off'");
	              	?>
	          	</div>
			</div>

			<div class="" style="margin-top:10px;">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<?php
						echo "<label style='color: black; font-weight: normal;'>Address:</label>";
						echo form_textarea('txtAddress', '', "class='form-control' ' id='txtAddress'  value=''");
	              	?>
	          	</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<?php
						echo "<label style='color: black; font-weight: normal;'>Phone No.:</label>";
						echo form_input('txtMobile1', '', "class='form-control' id='txtMobile1' style='' maxlength=10 autocomplete='off'");
	              	?>
					<?php
						echo "<label style='color: black; font-weight: normal; margin-top:7px;'>Email:</label>";
						echo form_input('email', '', "class='form-control' id='email' style='' autocomplete='off'");
	              	?>
	          	</div>
			</div>
			
			<div class="" style="margin-top:10px;">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<?php
						echo "<label style='color: black; font-weight: normal;'>Remarks:</label>";
						echo form_input('txtRemarks', '', "class='form-control' id='txtRemarks' style='' maxlength=100 autocomplete='off'");
	              	?>
	          	</div>
			</div>
			<div class="" style="margin-top:10px;">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<?php
						echo "<label style='color: black; font-weight: normal;'>Remarks 2:</label>";
						echo form_input('txtRemarks2', '', "class='form-control' id='txtRemarks2' style='' maxlength=99 autocomplete='off'");
	              	?>
	          	</div>
			</div>


			<div class="" style="margin-top:15px;">
				<div class="col-md-8">
					
	          	</div>
				<div class="col-md-4 ">
					<?php
						echo "<label style='color: black; font-weight: normal;'>&nbsp;	</label>";
						echo "<input type='button' onclick='saveData();' value='Save' id='btnSave' class='btn btn-success form-control'>";
	              	?>
	          	</div>
			</div>
		</div>
		
	</div>

	<div class="" style="margin-top:20px;" >
		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-0">
		</div>

		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div id="divTable" class="divTable col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border:1px solid lightgray; padding: 10px;height:300px; overflow:auto;">
				<table class='table table-hover table-striped table-bordered' id='tbl1'>
				 <thead>
					 <tr>
					 	<th  width="50" class="editRecord text-center">Edit</th>
					 	<th  width="50" class="text-center">Delete</th>
						<th style='display:none;'>CustRowId</th>
						<th style='display:none1;'>Name</th>
					 	<th>Address</th>
						<th style='display:none1;'>Phone No.</th>
					 	<th>Email ID</th>
					 	<th>Remarks</th>
					 	<th>Remarks2</th>
					 </tr>
				 </thead>
				 <tbody>
					 <?php 
						foreach ($records as $row) 
						{
						 	$rowId = $row['customerRowId'];
						 	echo "<tr>";						//onClick="editThis(this);
							echo '<td style="color: lightgray;cursor: pointer;cursor: hand;" class="editRecord text-center" onmouseover="this.style.color=\'green\';"  onmouseout="this.style.color=\'lightgray\';"><span class="glyphicon glyphicon-pencil"></span></td>
								   <td style="color: lightgray;cursor: pointer;cursor: hand;" class="text-center" onclick="delrowid('.$rowId.');" data-toggle="modal" data-target="#myModal" onmouseover="this.style.color=\'red\';"  onmouseout="this.style.color=\'lightgray\';"><span class="glyphicon glyphicon-remove"></span></td>';
						 	echo "<td style='display:none;'>".$row['customerRowId']."</td>";
						 	echo "<td style='display:none1;'>".$row['customerName']."</td>";
						 	echo "<td>".$row['address']."</td>";
						 	echo "<td>".$row['mobile1']."</td>";
						 	echo "<td>".$row['email']."</td>";
						 	echo "<td>".$row['remarks']."</td>";
						 	echo "<td>".$row['remarks2']."</td>";
							echo "</tr>";
						}
					 ?>
				 </tbody>
				</table>
			</div>
		</div>

		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-0">
		</div>
	</div>

	<div class="row" style="margin-top:20px;" >
		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-0">
		</div>
		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-0" style="margin-top:20px;">
			<?php
				echo "<input type='button' onclick='exportData();' value='Export All Records' id='btnExportAll' class='btn form-control' style='background-color: lightgray;'>";
	      	?>
		</div>
		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-0" style="margin-top:20px;">
			<?php
				echo "<input type='button' onclick='exportDataMobile();' value='Export only Mobile No.' id='btnExportAll' class='btn form-control' style='background-color: lightgray;'>";
			?>
		</div>
		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-0">
		</div>
		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-0" style="margin-top:20px;">
			<?php
				echo "<input type='button' onclick='loadAllRecords();' value='Load All Records' id='btnLoadAll' class='btn form-control' style='background-color: lightgray;'>";
	      	?>
		</div>
		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-0">
		</div>

	</div>
</div>
</div>
</div>


<footer class="main-footer">
        <strong><?php echo COPYRIGHTS; ?></strong>
    </footer>
    <div class="control-sidebar-bg"></div>
    </div>


		  <div class="modal" id="myModal" role="dialog">
		    <div class="modal-dialog modal-sm">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">WSS</h4>
		        </div>
		        <div class="modal-body">
		          <p>Are you sure <br /> Delete this record..?</p>
		        </div>
		        <div class="modal-footer">
		          <button type="button" onclick="deleteRecord(globalrowid);" class="btn btn-danger" data-dismiss="modal">Yes</button>
		          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
		        </div>
		      </div>
		    </div>
		  </div>


<script type="text/javascript">
	var controller='Customers_Controller';
	var base_url='<?php echo site_url();?>';

	vModuleName = "Customers";


	function setTable(records)
	{
		 // alert(JSON.stringify(records));
		  $("#tbl1").empty();
	      var table = document.getElementById("tbl1");
	      for(i=0; i<records.length; i++)
	      {
	          newRowIndex = table.rows.length;
	          row = table.insertRow(newRowIndex);


	          var cell = row.insertCell(0);
	          cell.innerHTML = "<span class='glyphicon glyphicon-pencil'></span>";
	          cell.style.textAlign = "center";
	          cell.style.color='lightgray';
	          cell.setAttribute("onmouseover", "this.style.color='green'");
	          cell.setAttribute("onmouseout", "this.style.color='lightgray'");
	          cell.className = "editRecord";

	          var cell = row.insertCell(1);
				  cell.innerHTML = "<span class='glyphicon glyphicon-remove'></span>";
	          cell.style.textAlign = "center";
	          cell.style.color='lightgray';
	          cell.setAttribute("onmouseover", "this.style.color='red'");
	          cell.setAttribute("onmouseout", "this.style.color='lightgray'");
	          cell.setAttribute("onclick", "delrowid(" + records[i].customerRowId +")");
	          // data-toggle="modal" data-target="#myModal"
	          cell.setAttribute("data-toggle", "modal");
	          cell.setAttribute("data-target", "#myModal");

	          var cell = row.insertCell(2);
	          cell.style.display="none";
	          cell.innerHTML = records[i].customerRowId;
	          var cell = row.insertCell(3);
	          cell.innerHTML = records[i].customerName;
	          var cell = row.insertCell(4);
	          cell.innerHTML = records[i].address;
	          // cell.style.display="none";
	          var cell = row.insertCell(5);
	          cell.innerHTML = records[i].mobile1;
	          var cell = row.insertCell(6);
	          cell.innerHTML = records[i].email;
	          // cell.style.display="none";
	          var cell = row.insertCell(7);
	          cell.innerHTML = records[i].remarks;
	          var cell = row.insertCell(8);
	          cell.innerHTML = records[i].remarks2;
	  	  }


	  	$('.editRecord').bind('click', editThis);

		myDataTable.destroy();
		$(document).ready( function () {
	    myDataTable=$('#tbl1').DataTable({
		    paging: false,
		    iDisplayLength: -1,
		    aLengthMenu: [[5, 10, 25, -1], [5, 10, 25, "All"]],

		});
		} );

		$("#tbl1 tr").on("click", highlightRow);
			
	}
	function deleteRecord(rowId)
	{
		// alert(rowId);
		$.ajax({
				'url': base_url + '/' + controller + '/delete',
				'type': 'POST',
				'dataType': 'json',
				'data': {'rowId': rowId},
				'success': function(data){
					if(data)
					{
						if( data['dependent'] == "yes" )
						{
							alertPopup('Record can not be deleted... Dependent records exist...', 8000, 'red');
						}
						else
						{
							setTable(data['records'])
							alertPopup('Record deleted...', 4000);
							blankControls();
							// $("#txtTownName").focus();
						}
					}
				},
					'error': function(jqXHR, exception)
					{
						document.write(jqXHR.responseText);
					}
			});
	}
	
	function saveData()
	{	
		customerName = $("#txtCustomerName").val().trim();
		if(customerName == "")
		{
			alertPopup("Customer name can not be blank...", 8000, 'red');
			$("#txtCustomerName").focus();
			return;
		}
		address = $("#txtAddress").val().trim();
		mobile1 = $("#txtMobile1").val().trim();
		if(mobile1 != "")
		{
			if(mobile1.length<10 || mobile1.length>10)///mobile no. must be 10 digit
			{
				alertPopup("Enter valid mobile no.", 8000, 'red');
				$("#txtMobile1").focus();
				return;
			}
			if(isNaN(mobile1)==true)///mobile no. must be numeric
			{
				alertPopup("Enter valid mobile no.", 8000, 'red');
				$("#txtMobile1").focus();
				return;
			}
		}
		email = $("#email").val();
		if(email != "")
		{
			var valueToTest = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
			if (valueToTest.test(email) != true)
			{
				alertPopup("Enter valid Email ID", 8000, 'red');
				$("#email").focus();
				return;
			}
			
		}
		remarks = $("#txtRemarks").val().trim();
		remarks2 = $("#txtRemarks2").val().trim();

		if($("#btnSave").val() == "Save")
		{
			// alert("save");
			$.ajax({
					'url': base_url + '/' + controller + '/insert',
					'type': 'POST',
					'dataType': 'json',
					'data': {
								'customerName': customerName
								, 'address': address
								, 'mobile1': mobile1
								, 'email': email
								, 'remarks': remarks
								, 'remarks2': remarks2
							},
					'success': function(data)
					{
						if(data)
						{
							// alert(data);
							if(data == "Duplicate record...")
							{
								alertPopup("Duplicate record...", 4000, 'red');
								$("#txtCustomerName").focus();
							}
							else
							{
								setTable(data['records']) ///loading records in tbl1

								alertPopup('Record saved...', 4000);
								blankControls();
								$("#txtCustomerName").focus();
								// location.reload();
							}
						}
							
					},
					'error': function(jqXHR, exception)
					{
						document.write(jqXHR.responseText);
					}
			});
		}
		else if($("#btnSave").val() == "Update")
		{
			// alert("update");
			$.ajax({
					'url': base_url + '/' + controller + '/update',
					'type': 'POST',
					'dataType': 'json',
					'data': {'globalrowid': globalrowid
								, 'customerName': customerName
								, 'address': address
								, 'mobile1': mobile1
								, 'email': email
								, 'remarks': remarks
								, 'remarks2': remarks2
							},
					'success': function(data)
					{
						if(data)
						{
							// alert(data);
							if(data == "Duplicate record...")
							{
								alertPopup("Duplicate record...", 5000, 'red');
								$("#txtCustomerName").focus();
							}
							else
							{
								setTable(data['records']) ///loading records in tbl1
								alertPopup('Record updated...', 5000);
								blankControls();
								$("#txtCustomerName").focus();
								$("#btnSave").val("Save");
								// $("#txtTownName").focus();
							}
						}
							
					},
					'error': function(jqXHR, exception)
					{
						document.write(jqXHR.responseText);
					}
			});
		}
	}

	function loadAllRecords()
	{
		// alert(rowId);
		$.ajax({
				'url': base_url + '/' + controller + '/loadAllRecords',
				'type': 'POST',
				'dataType': 'json',
				'success': function(data)
				{
					if(data)
					{
						setTable(data['records'])
						alertPopup('Records loaded...', 4000);
						blankControls();
						// $("#txtTownName").focus();
					}
				},
					'error': function(jqXHR, exception)
					{
						document.write(jqXHR.responseText);
					}
			});
	}
</script>
































<script type="text/javascript">
	var globalrowid;
	function delrowid(rowid)
	{
		globalrowid = rowid;
	}

	$('.editRecord').bind('click', editThis);
	function editThis(jhanda)
	{
		rowIndex = $(this).parent().index();
		colIndex = $(this).index();
		globalrowid = $(this).closest('tr').children('td:eq(2)').text();

		$("#txtCustomerName").val( $(this).closest('tr').children('td:eq(3)').text() );
		$("#txtAddress").val( $(this).closest('tr').children('td:eq(4)').text() );
		$("#txtMobile1").val( $(this).closest('tr').children('td:eq(5)').text() );
		$("#email").val( $(this).closest('tr').children('td:eq(6)').text() );
		$("#txtRemarks").val( $(this).closest('tr').children('td:eq(7)').text() );
		$("#txtRemarks2").val( $(this).closest('tr').children('td:eq(8)').text() );
		$("#txtCustomerName").focus();
		$("#btnSave").val("Update");
	}


		$(document).ready( function () {
		    myDataTable = $('#tbl1').DataTable({
			    paging: false,
			    iDisplayLength: -1,
			    aLengthMenu: [[5, 10, 25, -1], [5, 10, 25, "All"]],

			});
		} );




	var tblRowsCount;
	function storeTblValues()
	{
	    var TableData = new Array();
	    var i=0;
	    $('#tbl1 tr').each(function(row, tr)
	    {
	    	if( $(tr).find('td:eq(3)').text().length > 0 )
	    	{
	        	TableData[i]=
	        	{
		             "name" : $(tr).find('td:eq(3)').text()
		            // , "address" :$(tr).find('td:eq(4)').text()
		            , "mobile1" :$(tr).find('td:eq(5)').text()
		            , "email" :$(tr).find('td:eq(6)').text()
		            // , "remarks" :$(tr).find('td:eq(7)').text()
	        	}   
	        	i++; 
	        }
	    }); 
	    // TableData.shift();  // NOT first row will be heading - so remove COZ its dataTable
	    tblRowsCount = i-1;
	    return TableData;
	}


	function exportData()
	{	
		// alert();
		var TableData;
		TableData = storeTblValues();
		TableData = JSON.stringify(TableData);
		// alert(JSON.stringify(TableData));
		// return;
		// if(tblRowsCount == 0)
		// {
		// 	alertPopup("No product selected...", 8000);
		// 	$("#cboProducts").focus();
		// 	return;
		// }


		$.ajax({
				'url': base_url + '/' + controller + '/exportData',
				'type': 'POST',
				// 'dataType': 'json',
				'data': {
							'TableData': TableData
						},
				'success': function(data)
				{
					if(data)
					{
						window.location.href=data;
					}
				},
					'error': function(jqXHR, exception)
					{
						document.write(jqXHR.responseText);
					}
		});
		
	}

	function storeTblValuesMobile()
	{
	    var TableData = new Array();
	    var i=0;
	    $('#tbl1 tr').each(function(row, tr)
	    {
	    	if( $(tr).find('td:eq(5)').text().length > 0 && $(tr).find('td:eq(5)').text() > 1 )
	    	{
	        	TableData[i]=
	        	{
		            "mobile" :$(tr).find('td:eq(5)').text().substr(0, 10)
	        	}   
	        	i++; 
	        }
	    }); 
	    // TableData.shift();  // NOT first row will be heading - so remove COZ its dataTable
	    tblRowsCount = i-1;
	    return TableData;
	}
	function exportDataMobile()
	{	
		// alert();
		var TableData;
		TableData = storeTblValuesMobile();
		TableData = JSON.stringify(TableData);
		// alert(JSON.stringify(TableData));
		// return;
		if(tblRowsCount == 0)
		{
			alertPopup("No product selected...", 8000);
			$("#cboProducts").focus();
			return;
		}


		$.ajax({
				'url': base_url + '/' + controller + '/exportDataMobile',
				'type': 'POST',
				// 'dataType': 'json',
				'data': {
							'TableData': TableData
						},
				'success': function(data)
				{
					if(data)
					{
						window.location.href=data;
					}
				},
					'error': function(jqXHR, exception)
					{
						document.write(jqXHR.responseText);
					}
		});
		
	}	
</script>
<script>

function newInvoice(){
    window.location = base_url + '/Sale_Controller'; 
    
}

function newQuote(){
    window.location = base_url + '/Sale_Controller/quote'; 
    
}

</script>