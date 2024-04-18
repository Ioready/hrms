<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MaaS - <?php echo $menu; ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/img/favicon.png'); ?>"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css'); ?>">
        <!--<link rel="stylesheet" href="<?php // echo base_url('assets/cssLTE.min.css'); ?>">-->
        <!--<link rel="stylesheet" href="<?php // echo base_url('assets/css/grey.css'); ?>">-->
        <!--<link rel="stylesheet" href="<?php // echo base_url('assets/css/skin-blue-light.css'); ?>">-->
        <!--<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker.css'); ?>">-->
        <!--<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">-->
        <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">-->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/overview-jquery-ui.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/innerpages_customstyle.css'); ?>">
        <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-filestyle/1.2.1/bootstrap-filestyle.min.js"></script>
        <script src="<?php echo base_url('assets/js/sticky.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.diagram.js'); ?>"></script>        
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>

    </head>
    <body class="hold-transition <?php if ($menu == "Login") { ?> login-page <?php } else { ?> skin-blue-light sidebar-mini fixed <?php } ?>">