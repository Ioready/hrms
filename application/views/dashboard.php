<style type="text/css">
    .tooltip-inner {min-width:115px;}
    #all_tbl_container .table-responsive #users_tbl tr th{
        min-width: 0px !Important;
    }
    .serial_check{min-width: 0px !Important;}
	.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
  top:-8px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.turnbtn{
	padding-left: 7px;
    font-size: 16px;
    padding-top: 6px;
    position: relative;
    top: 0px;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Dashboard</h1>
                       

    </section>
    <div class="dashboard-container">

      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
         <div class="topreportinfobox">
          <div class="info-box">
            <span class="dash-user-box-icon"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Clients</span>
              <span class="info-box-number"><?php echo $clients_count; ?></span>
            </div>
          </div>
         </div> 
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
         <div class="topreportinfobox">
          <div class="info-box">
            <span class="dash-user-box-icon"><i class="fa fa-cubes"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Products</span>
              <span class="info-box-number"><?php echo $product_count; ?></span>
            </div>
          </div>
         </div> 
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
         <div class="topreportinfobox">
          <div class="info-box">
            <span class="dash-user-box-icon"><i class="fa fa-file-text"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Invoices</span>
              <span class="info-box-number"><?php echo $total_invoice; ?></span>
            </div>
          </div>
         </div> 
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
         <div class="topreportinfobox">
          <div class="info-box">
            <span class="dash-user-box-icon"><i class="fa fa-file-text"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Quotes</span>
              <span class="info-box-number"><?php echo $total_quote; ?></span>
            </div>
          </div>
         </div> 
        </div>

      </div>

     <!-- <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
         <div class="topreportinfobox">
          <div class="info-box">
            <span class="dash-user-box-icon"><i class="fa fa-exclamation-triangle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Unpaid Invoices</span>
              <span class="info-box-number"><?php echo $total_unpaid_invoice; ?></span>
            </div>
          </div>
         </div> 
        </div>-->

      </div> 
     <!--  <div class="row">
        <div class="dashboard-box-content">

          <div class="col-md-4">
            <div class="trade-detail-box">

              <p class=""> <span> 100 </span> Clients Online </p> 

            </div>
          </div>

          <div class="col-md-4">
            <div class="trade-detail-box">

              <p class=""><span> 120 </span> Clients offline </p>

            </div>
          </div>

          <div class="col-md-4">
            <div class="trade-detail-box">
              <p class=""><span> 120 </span> Clients offline </p>   

            </div>
          </div>

        </div>               
      </div>  -->              
    </div>               
            
    
    <!-- /.content -->
</div>
