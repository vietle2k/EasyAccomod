<?php
  include 'inc/header.php';
  include 'inc/navbar.php';
  include 'Controller/Homerent.php';
  Session::checkSession();
  if(Session::get('user') !== 'owner'){
    Header('Location:index.php');
  }
?>
<div class="hero-wrap" style="background-image: url('images/background_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-3 bread" style="color: white;">Add House</h1>
          </div>
        </div>
      </div>
</div>

<?php
      $homecon = new Homerent();
      if(($_SERVER["REQUEST_METHOD"] === "POST") && isset($_POST['fam_add_rent']) ){
        $result = $homecon->addRent($_POST,$_FILES);
      }

      if((isset($result)) && ($result=='success')){
        echo "<p class='alert alert-success alert-dismissible'>New House added successfully!</p>";
        $result = null;
      }
      else if((isset($result)) && ($result=='fail')){
        echo "<p class='alert alert-danger alert-dismissible'>There are problem to add this house now!</p>";
        $result = null;
      }
      else if((isset($result)) && ($result=='notfill')){
        echo "<p class='alert alert-danger alert-dismissible'>House address, House type and Rental value must be required!</p>";
        $result = null;
      }

      if(isset($_SESSION['extnum']) && $_SESSION['extnum'] > 0){
        if ($_SESSION['extnum'] == 1) {
          $img = 'image';
        }else{
          $img = 'images';
        }
        echo "<p class='alert alert-danger alert-dismissible'>".$_SESSION['extnum']."   ".$img." failed to add due to invalid extension ( use <strong>jpg, jpeg, gif or png</strong> file format. )!</p>";
        unset($_SESSION['extnum']);
        unset($_SESSION['sizenum']);
      }
      else if(isset($_SESSION['sizenum']) && $_SESSION['sizenum'] > 0){
        if ($_SESSION['sizenum'] == 1) {
          $imgs = 'image';
        }else{
          $imgs = 'images';
        }
        echo "<p class='alert alert-danger alert-dismissible'>".$_SESSION['sizenum']."   ".$imgs." failed to add due to the size.( use <strong>less than 10MB</strong> file format. )!</p>";
        unset($_SESSION['sizenum']);
        unset($_SESSION['extnum']);
      }
?>
<div style="padding-top: 7rem; padding-bottom: 7rem;">
  <?php 
    include 'inc/add_houserent_cover.php'
  ?>
</div>

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
