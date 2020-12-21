<?php

  include 'inc/header.php';
  include 'Controller/Message.php';
  $msg = new Message();

  if(isset($_POST['sendmsg'])){
    $result = $msg->adminmsg($_POST);
  }

  include 'inc/navbar.php';
  include 'inc/cover.php';
  include 'inc/footer.php';
?>
<!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

<script>
 $(function(){
   $( "#main_range_cover" ).slider({
         range: true,
         min: 100,
         max: 100000,
         values: [<?php if(isset($range1) && isset($range2)){
           echo $range1.','.$range2;}
           else{?> 100,100000 <?php } ?>],
         slide: function( event, ui ) {
           $( "#input_range_cover" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
         }
    });
    $( "#input_range_cover" ).val( "$" + $( "#main_range_cover" ).slider( "values", 0 ) +
     " - $" + $( "#main_range_cover" ).slider( "values", 1 ) );
   });
</script>