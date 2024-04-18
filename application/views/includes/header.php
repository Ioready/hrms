
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo"> 
        <?php 
        $setting = getSetting();
        ?>
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><img src="<?php echo base_url($setting['app_logo']); ?>" border="0" alt="<?php echo SITE_TITLE; ?>"/></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><img src="<?php echo base_url($setting['app_logo']); ?>" border="0" alt="<?php echo SITE_TITLE; ?>"/></span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="user user-menu">
                            <button class="btn btn-primary" onclick="newQuote();" style="margin-right: 25px;margin-top: 7px;"> New Quote</button>
                           <button class="btn btn-primary" onclick="newInvoice();" style="margin-right: 25px;margin-top: 7px;"> New Invoice</button>
                    </li>
                </ul>
                <ul class="nav navbar-nav">

                    <!-- User Account Menu -->
                  

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Super Admin
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <div class="text-center border-bottom pb-5" style="border-bottom: 1px solid #80808061;">
                        <div class="image image-circle image-tiny mb-5">
                            <!-- <img src="#" class="img-fluid" alt="profile image"> -->
                            <img src="<?php echo base_url('assets/img/io.png');?>"  border="0" alt="IOREADY" style="width: 300px;">
                        </div>
                        <h3 class="text-gray-900">Super Admin</h3>
                        <h5 class="mb-0 fw-400 fs-6"><?php echo $_SESSION['saUserEmail'];?></h5>
                        </div>   
                        <a class="dropdown-item" href="<?php echo base_url('dashboard/settings'); ?>"><i class="fa fa-user" style="margin-left: 15px;margin-right: 15px;"></i>Account Settings</a>
                        <!-- <a class="dropdown-item" href=""><i class="fa fa-lock" style="margin-left: 15px;margin-right: 15px;"></i>Change Password</a> -->
                        <!-- <a class="dropdown-item" href="#"><i class="fa fa-language" style="margin-left: 15px;margin-right: 15px;"></i>Change Language</a> -->
                        <a class="dropdown-item" href="<?php echo base_url('home/logout'); ?>"><i class="fa fa-sign-out" style="margin-left: 15px;margin-right: 15px;"></i>Sign Out</a>
                        </div>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">


            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">

                <!-- Optionally, you can add icons to the links -->

                <li <?php if ($menu == "Dashboard") { ?> class="active" <?php } ?>><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li <?php if ($menu == "Admin") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('dashboard/admin'); ?>"><i class="fa fa-user"></i> <span>Admin</span></a></li>
                <li <?php if ($menu == "Customers") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('Customers_Controller'); ?>"><i class="fa fa-users"></i> <span>Customers</span></a></li>
                <!-- <li <?php if ($menu == "Categories") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('categories'); ?>"><i class="fa fa-th-list"></i> <span>Categories</span></a></li> -->
                <li <?php if ($menu == "Taxes") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('taxes'); ?>"><i class="fa fa-percent"></i> <span>Taxes</span></a></li>
                <li <?php if ($menu == "Products") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('products'); ?>"><i class="fa fa-list"></i> <span>Products</span></a></li>
                <!-- <li <?php if ($menu == "Quotes") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('quotes'); ?>"><i class="fa fa-quote-left"></i> <span>Quotes</span></a></li> -->
                <li <?php if ($menu == "Invoice") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('Sale_Controller'); ?>"><i class="fa fa-file"></i> <span>Invoices</span></a></li>
                <li <?php if ($menu == "Quotes") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('Sale_Controller/quote'); ?>"><i class="fa fa-file"></i> <span>Quotes</span></a></li>
                <!-- <li <?php if ($menu == "Payment QR Codes") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('qr_codes'); ?>"><i class="fa fa-qrcode"></i> <span>Payment QR Codes</span></a></li> -->
                <!-- <li <?php //if ($menu == "Transactions") { ?> class="active" <?php //} ?> ><a href="<?php //echo base_url('transactions'); ?>"><i class="fa fa-list-ol"></i> <span>Transactions</span></a></li> -->
                <li <?php if ($menu == "Payments") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('payments'); ?>"><i class="fa fa-money"></i> <span>Payments</span></a></li>
                <!-- <li <?php //if ($menu == "Invoice Templates") { ?> class="active" <?php //} ?> ><a href="<?php //echo base_url('invoice_templates'); ?>"><i class="fa fa-copy"></i> <span>Invoice Templates</span></a></li> -->
                <li <?php if ($menu == "Settings") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('dashboard/settings'); ?>"><i class="fa fa-cogs"></i> <span>Settings</span></a></li>
                <li <?php if ($menu == "Offers") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('offers'); ?>"><i class="fa fa-handshake-o"></i> <span>Offer to Clients</span></a></li>
                <li <?php if ($menu == "Bulk Upload") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('Bulk_Upload'); ?>"><i class="fa fa-upload"></i> <span>Bulk Upload</span></a></li>
               
                
                <!-- <li <?php if ($menu == "Master Password") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('dashboard/masterPassword'); ?>"><i class="fa fa-lock"></i> <span>Master Password</span></a></li> -->
                <!-- <li <?php if ($menu == "Client Configurations") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('dashboard/clientconfiguration'); ?>"><i class="fa fa-user"></i> <span>Client Configurations</span></a></li> -->
                <!-- <li <?php if ($menu == "Client User") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('dashboard/clientUser'); ?>"><i class="fa fa-user"></i> <span>Client Admin Users</span></a></li> -->
                <!-- <li <?php if ($menu == "Activity Logs") { ?> class="active" <?php } ?> ><a href="#"><i class="fa fa-history"></i> <span>Activity Logs</span></a></li> -->
                <!-- <li <?php if ($menu == "IP Address") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('dashboard/ipAddress'); ?>"><i class="fa fa-address-book"></i> <span>IP Address</span></a></li> -->
                <!-- <li <?php if ($menu == "Offering Template") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('offerings'); ?>"><i class="fa fa-handshake-o"></i> <span>Sample Offering Template</span></a></li> -->
                <!-- <li <?php if ($menu == "Clients") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('client'); ?>"><i class="fa fa-users"></i> <span>Clients</span></a></li> -->
                
                <!-- <li <?php //if ($menu == "Add Clients") { ?> class="active" 
				<?php //} ?> ><a href="<?php //echo base_url('dashboard/addClient'); ?>">
				<i class="fa fa-user-plus"></i> <span>Add Client</span></a></li> -->
				

            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
