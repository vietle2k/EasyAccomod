<?php
  include 'inc/header.php';
  include 'inc/navbar.php';
  include 'Controller/Homecontroller.php';
  Session::checkSession();
?>
<?php
  $home = new Homecontroller();
  $id=0;
  if(isset($_GET['tenant_id'])){
    $id = $_GET['tenant_id'];
  }
  $user = $home->getUser($id);
?>

<div style="padding-top: 7rem; padding-bottom: 7rem;">
  <div class="profile_area">
    <div class="profile_main container">
      <div class="inner_profile row">
        <div class="left_profile col-sm-3">
          <div class="left_profile_inner">
            <div class="profile_title">
              <div class="profile_image">
                <img src="<?php if(isset($user->pic) && $user->pic != ''){echo $user->pic;}else{ echo 'assets/images/owner.png'; } ?>" 
                class="img-thumbnail" alt="Owner">
              </div>
              <p class="text-left"> <i class="fas fa-user" style="margin-right:5px;"></i>Name: <?php if(isset($user->fullname)) echo $user->fullname;?> </p>
            </div>
            <div class="profile_nav">
              <ul class="main_profile_nav">
                <li> <i class="fas fa-envelope"></i> <strong>Email:</strong> 
                  <?php if(isset($user->email)) echo $user->email; ?> 
                </li> 
                <li> <i class="fas fa-phone"></i> <strong>Phone:</strong> 
                  <?php if(isset($user->phone)) echo $user->phone; ?> 
                </li>
                <li> <i class="fas fa-address-card"></i> <strong>Address:</strong> 
                  <?php if(isset($user->address)) echo $user->address; ?> 
                </li>
                <li> <i class="fas fa-id-card-alt"></i> <strong>NID:</strong> 
                  <?php if(isset($user->nid)) echo $user->nid; ?> 
                </li>
                <li> <i class="fas fa-angle-double-right"></i> <strong>Description:</strong> <p class="text-justify">
                  <?php if(isset($user->description)) echo $user->description; ?></p> 
                </li>
              </ul> 
              <?php
                if(Session::get('user_id') == $id){
                ?>
                  <ul class="extra_nav">
                    <li> 
                      <a class="btn btn-primary" href="editprofile.php?id=<?php echo Session::get('user_id'); ?>">
                      Edit Profile</a> 
                    </li>
                  </ul>
                <?php } 
              ?>
            </div>
          </div> 
        </div> 
        <div class="right_profile col-sm-9">
          <div class="right_profile_inner">
            <div class="house_main">
              <div class="available_house col-sm-12">
                <h4>Your Current Booked Home</h4>
                <?php
                  $home = new Homecontroller();
                  $ava_home = $home->gethomeDetailsbyTenant($id);
                ?>
                <div class="all_house row">
                  <?php
                  if(count($ava_home) > 0) {
                    foreach ($ava_home as $house){
                      $houseid = $house['id_post'];
                      $total_req = $home->totalRequest($houseid);
                    ?>
                      <div class="single_house card">
                        <div class="single_house_inner card-body">
                          <div class="house_title">
                            <p style="font-weight:600;">  <i class="fas fa-map-marker-alt"></i> 
                              <?php echo $house['address']; ?> 
                            </p>
                            <p class="rent"> <i class="fas fa-money-check-alt"></i> 
                              <?php echo $house['price']; ?> 
                            </p>
                          </div>
                          <div class="house_img">
                            <?php 
                              if($house['img_1']) {$image = $house['img_1'];} 
                              else {$image = "assets/images/house/house29.png";}
                            ?>
                            <img src="<?php echo $image; ?>" alt="House" style="height: 150px;width: 250px;">
                          </div>
                          <!--
                          <?php
                            if ($house['renter_id'] != 0) {
                              $getuser = $home->getUser($house['renter_id']);
                            ?>
                              <p style="overflow:hidden;">Booked By 
                                <a href="tenant_profile.php?tenant_id=<?php echo $getuser->id; ?>" target="_blank" style="font-weight:strong;margin:0px;float:none;border:none;">
                                <?php echo $getuser->fullname; ?>
                                </a> 
                              </p>
                            <?php }
                            else if(is_array($total_req) && count($total_req) > 0) { ?>
                              <p style="display:inline-block;margin-top:10px;padding:4px 6px;color:#fff;border-radius:3px;background-color:cornflowerblue;"><span style="margin-left:5px;" class="badge badge-light"> <?php echo count($total_req); ?></span> request !
                              </p>
                            <?php } 
                          ?>-->
                          <a href="housedetails.php?house_id=<?php echo $house['id_post']; ?>">Details</a>
                        </div>
                      </div>
                    <?php } 
                  }
                  else { echo "You havn't any availabe/free room."; } 
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div> 
  </div> 
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