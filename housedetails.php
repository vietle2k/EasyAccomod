<?php
  include 'inc/header.php';
  include 'inc/navbar.php';
  include 'Controller/Homecontroller.php';
?>

<div class="hero-wrap" style="background-image: url('images/background_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-3 bread">House Detail</h1>
          </div>
        </div>
      </div>
</div>


<?php
  $home = new Homecontroller();
  if(isset($_GET['house_id'])){
    $id = $_GET['house_id'];
  }
  $house = $home->gethomeDetails_obj($id);
  $houseid = $house['id_post'];

  $ownerid = $house['owner_id'];
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['free_home'])){
    $req = $home->freeHome($houseid);
    echo "<meta http-equiv='refresh' content='0'>";
  }
?>


<?php
  if(($_SERVER["REQUEST_METHOD"] === "POST") && isset($_POST['delhouse'])){
    $home->deletehouse($houseid,Session::get('user_id'));
  }
?>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <div class="single-slider owl-carousel">
              <?php 
                if ($house['img_1'] != '') { ?>
                  <div class="item">
                    <div class="properties-img" style="background-image: url(<?php echo $house['img_1']; ?>);"></div>
                  </div>
                <?php }
                if ($house['img_2'] != '') { ?>
                  <div class="item">
                    <div class="properties-img" style="background-image: url(<?php echo $house['img_2']; ?>);"></div>
                  </div>
                <?php }
                if ($house['img_3'] != '') { ?>
                  <div class="item">
                    <div class="properties-img" style="background-image: url(<?php echo $house['img_3']; ?>);"></div>
                  </div>
                <?php }
              ?> 
            </div>
          </div>
          <div class="col-md-12 Properties-single mt-4 mb-5 ftco-animate">
            <h2><?php echo $house['address']; ?></h2>
            <p class="rate mb-4">
              <span class="loc"><i class="icon-user"></i>Owner Name: <?php echo $house['owner_id']; ?></span>
            </p>
            <div class="d-md-flex mt-5 mb-5">
              <ul>
                  <li><span>Acreage: </span> <?php echo $house['dien_tich']; ?> m2</li>
                  <li><span>Price: </span> <?php echo $house['price']; ?> VND/month</li>
                  <li><span>Electricity Price: </span> <?php echo $house['tien_dien']; ?> VND/KWh</li>
                  <li><span>Price of Water: </span> <?php echo $house['tien_nuoc']; ?> VND/Cubic</li>
              </ul>
              <ul class="ml-md-5">
                  <li><span>Kitchen: </span> <?php echo $house['kitchen']; ?></li>
                  <li><span>Bed Rooms: </span> <?php echo $house['bedroom']; ?></li>
                  <li><span>Bath Rooms: </span> <?php echo $house['bathroom']; ?></li>
                  <li><span>Balconies: </span> <?php echo $house['balconies']; ?></li>
              </ul>
            </div>
            <p>Facilities:</p>
            <div class="d-md-flex mt-5 mb-5">
              <ul>
                  <li><span>Tankless Water Heater: </span> <?php echo $house['bathroom_nl']; ?></li>
                  <li><span>Air Condition: </span> <?php echo $house['air_condition']; ?> </li>
              </ul>
            </div>
            <p><?php echo $house['description']; ?></p>
          </div>
          <div class="col-md-12 properties-single ftco-animate mb-5 mt-4">
                <h4 class="mb-4">Review &amp; Ratings</h4>
                <div class="row">
                  <div class="col-md-6">
                    <form method="post" class="star-rating">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">
                          <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i> 100 Ratings</span></p>
                        </label>
                      </div>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">
                           <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i> 30 Ratings</span></p>
                        </label>
                      </div>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">
                          <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i> 5 Ratings</span></p>
                       </label>
                      </div>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">
                          <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i> 0 Ratings</span></p>
                        </label>
                      </div>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">
                          <p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i> 0 Ratings</span></p>
                        </label>
                      </div>
                    </form>
                  </div>
                </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 sidebar ftco-animate">
        <?php
            $total_req = $home->totalRequest($houseid);

            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accept'])) {
              $tenants_id = $_POST['tenant_id'];
              $req = $home->acceptrequest($houseid,$tenants_id);
              echo "<meta http-equiv='refresh' content='0'>";
              //echo $_SERVER['PHP_SELF'].'?house_id='.$house['id_post'];
            }
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reject'])) {
              $tenants_id = $_POST['tenant_id'];
              $req = $home->rejectrequest($houseid,$tenants_id);
              echo "<meta http-equiv='refresh' content='0'>";
            }
        ?>  
        <?php 
          if($house['owner_id'] == Session::get('user_id')) { ?>
            <div class="single_action">
              <?php
                if( $house['renter_id'] != 0) {
                  $tenant = $home->getUser($house['renter_id']);
                ?>
                <div class="dropdown">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="booked" aria-haspopup="true" aria-expanded="false">
                    Booked by <a href="tenant_profile.php?tenant_id=<?php echo $tenant->id; ?>" target="_blank" ><?php echo $tenant->fullname; ?></a>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="booked">
                    <!--
                    <form class="dropdown-item" action="<?php echo $_SERVER['PHP_SELF'].'?house_id='.$house['id_post'];?>" method="post">
                      <input style="cursor:pointer;" type="submit" class="btn btn-default" name="free_home" value="Free">
                    </form> -->
                    <a class="dropdown-item" action="<?php echo $_SERVER['PHP_SELF'].'?house_id='.$house['id_post'];?>" method="post"><input style="cursor:pointer;" type="submit" class="btn btn-default" name="free_home" value="Free"></a>
                    <a class="dropdown-item">abcd</a>
                  </div>
                </div>
                <?php }
                if ($house['renter_id'] == 0){ ?>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Booked request<span style="margin-left:5px;" class="badge badge-light"><?php if(is_array($total_req)){echo count($total_req);} ?></span>
                  </button>
                <?php } 
              ?>
              <form action="<?php echo $_SERVER['PHP_SELF'].'?house_id='.$houseid; ?>" method="post" style="margin-top:10px;">
                <input type="submit" class="btn btn-danger" onclick="return confirm('Are you Sure to Delete?');" name="delhouse" value="Delete This House">
              </form>

              <!-- The Modal -->
              <div style="top:200px;z-index:9999999999;" class="modal" id="myModal">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">All requested for this home.</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                      <?php
                        if (count($total_req)>0) {
                          foreach ($total_req as $request) {
                            $tenant = $home->getUser($request['renter_id']);
                          ?>
                            <form class="" action="<?php echo $_SERVER['PHP_SELF'].'?house_id='.$house['id_post'];?>" method="post">
                              <div class="row">
                                <p style="padding-top:5px;" class="col-sm-6"> <a href="tenant_profile.php?tenant_id=<?php echo $tenant->id; ?>" target="_blank" > <?php echo $tenant->fullname; ?></a></p>
                                <input type="hidden" name="tenant_id" value="<?php echo $tenant->id; ?>">
                                <div class="accept_btn col-sm-2 ">
                                  <input style="width:90%;" class="btn btn-success" type="submit" name="accept" value="Accept">
                                </div>
                                <div class="reject_btn col-sm-2">
                                  <input style="width:90%;" class="btn btn-danger" type="submit" name="reject" value="Reject">
                                </div>
                              </div>
                            </form>
                          <?php } 
                        }
                      ?>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } 
        ?>
      </div> 
    </div>
  </div>
</section>

<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['request'])) {
    $req = $home->sendrequest($houseid,$ownerid);
    echo "<p>request roi!</p>";
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cancel'])) {
    $cancel = $home->cancelrequest($houseid,$ownerid);
  }
  $check = $home->checkrequest($houseid);
?>


<?php if(Session::get('user') == 'renter'){ ?>
          <div class="single_action">
            <form class="" action="<?php echo $_SERVER['PHP_SELF'].'?house_id='.$house['id_post'];?>" method="post">
              <?php
                if ($check=='no') { ?>
                  <input type="submit" class="btn btn-primary" name="request" value="Request for rent">
                <?php }
                else if($check=='yes') { ?>
                  <input type="submit" class="btn btn-danger" name="cancel" value="Cancel Booked">
                <?php }
                else if($check=='booked') { ?>
                  <p class="btn btn-primary">Booked by You</p>
                <?php } 
              ?>
            </form>
          </div>

          <div class="single_action">
            <a class="btn btn-info" href="owner_profile.php?owner_id=<?php echo $house['owner_id']; ?>">Contact to owner</a>
          </div>
<?php } else if(!Session::get('user') == 'owner'){ ?>

  <div class="single_action">
    <a class="btn btn-info" onclick="loginpage(<?php echo $house['id']; ?>);">Contact to owner</a>
  </div>
<?php } ?>
<script>
  function loginpage($id){
    <?php
        Session::set('path',"housedetails.php?house_id=".$id);
     ?>
     window.location = "user_login.php";

  }
</script>

<?php
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