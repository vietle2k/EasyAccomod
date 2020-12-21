<?php
  include 'inc/header.php';
  include 'inc/navbar.php';
  include 'Controller/Register.php';
?>
<div class="hero-wrap" style="background-image: url('images/background_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-3 bread" style="color: white;">Register</h1>
          </div>
        </div>
      </div>
</div>
<div style="padding-top: 7rem; padding-bottom: 7rem;">
  <?php 
    $reg = new Register();
    if(($_SERVER["REQUEST_METHOD"] === "POST") && isset($_POST['register'])) {
      $msg = $reg->register($_POST);
    }

    if((isset($msg)) && ($msg=='success')){
      echo "<p class='alert alert-success'>You registered Successfully!</p>";
      $msg = null;
    }
    else if((isset($msg)) && ($msg=='fail')){
      echo "<p class='alert alert-danger'>Unfortunately Not Registered!</p>";
      $msg = null;
    }
    else if((isset($msg)) && ($msg=='empty')){
      echo "<p class='alert alert-danger'>Fill all the Field please!</p>";
      $msg = null;
    }
    else if((isset($msg)) && ($msg=='smallpass')){
      echo "<p class='alert alert-danger'>Password length must be 6 or more characters!</p>";
      $msg = null;
    }
    else if((isset($msg)) && ($msg=='emailprob')){
      echo "<p class='alert alert-danger'>Email Format is Invalid!</p>";
      $msg = null;
    }
  ?>
  <?php 
    include 'inc/register_cover.php';
  ?>
<?php
  include 'inc/footer.php';
?>
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!-- UI JS -->
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
  


  