<!DOCTYPE html>
<html style="height: auto; min-height: 100%;">
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo SITE_TITLE.' - '.$menu;?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/img/logo_mini.png'); ?>"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/grey.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/skin-blue-light.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker.css'); ?>">
        <?php if($menu == 'Preview Offers'){ ?>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/innerpages_customstyle.css'); ?>">        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/overview-jquery-ui.css'); ?>" />
        <?php }else{ ?>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/customstyle.css'); ?>">
        <!-- <link rel="stylesheet" href="<?php //echo base_url('assets/css/style.css'); ?>"> -->
        <?php } ?>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">
    </head>
    <script>
       function getCurrencyFormat(amount) {
           return amount.toLocaleString('en-US', {style: 'currency', currency: 'USD'});
       }
   </script>
    <body class="hold-transition <?php if ($menu == "Login" || $menu == "Reset Password" ) { ?> login-page <?php } else { ?> skin-blue-light sidebar-mini fixed <?php } ?>">
