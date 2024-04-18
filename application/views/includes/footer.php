<?php if ($menu == "Login" || $menu == "Reset Password") { ?>

<?php
} else {
    ?>
    <footer class="main-footer">
        <strong><?php echo COPYRIGHTS; ?></strong>
    </footer>
    <div class="control-sidebar-bg"></div>
    </div>

<?php } ?>

<script>
var baseURL = '<?php echo base_url(); ?>';
var wpURL = '<?php echo base_url(); ?>';

function newInvoice(){
    window.location = baseURL + '/Sale_Controller'; 
    
}

function newQuote(){
    window.location = baseURL + '/Sale_Controller/quote'; 
    
}

</script>

<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php if ($menu == "Offers Content" || $menu == "Maintenance") { }else{?>
<!-- <script src="<?php //echo base_url('assets/js/icheck.min.js'); ?>"></script> -->
<?php } ?>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/adminlte.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.mask.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.maskMoney.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jscolor.js'); ?>"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-filestyle/1.2.1/bootstrap-filestyle.min.js"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.slimscroll.min.js'); ?>"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.6/js/dataTables.rowReorder.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.19/sorting/datetime-moment.js"></script>

<script src="<?php echo base_url('assets/js/custom_scripts.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

<script>

<?php if ($menu == "Login") { ?>

        var loginButton = document.getElementById("forgotButton");
        var registerButton = document.getElementById("loginButton");
var registerButton1 = document.getElementById("loginButton1");

        loginButton.onclick = function () {
            document.querySelector("#flipper").classList.toggle("flip");
        }

        registerButton.onclick = function () {
            document.querySelector("#flipper").classList.toggle("flip");
        }
		registerButton1.onclick = function () {
            document.querySelector("#flipper").classList.toggle("flip");
        }
<?php } ?>
    
    $(window).on('load', function () {
        $(".offeringImgWait").css("display", "none");
        $(".offeringimgdiv").css("display", "block");
    });

</script>
    <?php if ($menu == "Master Password") { ?>

        
<script>

$( window ).on( "load", function() { 
// function checkPageFocus() {
   
    if (document.hasFocus()) {
     console.log( 'This document has the focus.');
     
    }
    else {
     console.log( 'This document does not have the focus.');
    }
//   }
  
})
  // Check page focus every 300 milliseconds
//   setInterval(checkPageFocus, 300);
</script>
<?php }  ?>
    


</body>
</html>











