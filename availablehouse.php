<?php
  include 'inc/header.php';
  include 'inc/navbar.php';
  include_once 'Controller/Homecontroller.php';
 ?>


<?php
  $home = new Homecontroller();
  $data = $home->gethomeDetails();
  if(!$data){
    echo "<p>No data found</p>";
  }
?>

<?php
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search_house'])) {
     $arr = explode('-',$_POST['rental_value']);
     $range1 = substr($arr[0],1);
     $range2 = substr($arr[1],2);

     $data = $home->searchHome($range1,$range2,$_POST);
   }

   if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search_cover'])) {
     $arr = explode('-',$_GET['rental_value']);
     $range1 = substr($arr[0],1);
     $range2 = substr($arr[1],2);

     $data = $home->searchHome($range1,$range2,$_GET);
   }
?>
<div class="hero-wrap" style="background-image: url('images/background_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-3 bread">Available House</h1>
          </div>
        </div>
      </div>
</div>

<section class="ftco-search">
      <div class="container">
        <div class="row">
          <div class="col-md-12 search-wrap">
            <h2 class="heading h5 d-flex align-items-center pr-4"><span class="ion-ios-search mr-3"></span> Search House</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="search-property">
              <div class="row">
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Keyword</label>
                    <div class="form-field">
                      <div class="icon"><span class="icon-pencil"></span></div>
                      <input type="text" class="form-control" placeholder="Keyword">
                    </div>
                  </div>
                </div>
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Address</label>
                    <div class="form-field">
                      <div class="icon"><span class="icon-pencil"></span></div>
                      <input type="text" class="form-control" name="address" placeholder="Address" value="<?php if(isset($_POST['address'])){
                          echo $_POST['address'];
                      } ?>">
                    </div>
                  </div>
                </div>
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Rent Type</label>
                    <div class="form-field">
                      <div class="select-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="house_type" id="" class="form-control">
                          <option value="" selected disabled>Type</option>
                          <option value="1" <?php if(isset($_POST['house_type']) && $_POST['house_type']=='1'){
                              echo "selected";
                          } ?>
                          >Phong Tro</option>
                          <option value="2" <?php if(isset($_POST['house_type']) && $_POST['house_type']=='2'){
                              echo "selected";
                          } ?>
                          >Chung Cu Mini</option>
                          <option value="3" <?php if(isset($_POST['house_type']) && $_POST['house_type']=='3'){
                              echo "selected";
                          } ?>
                          >Chung Cu Nguyen Can</option>
                          <option value="4" <?php if(isset($_POST['house_type']) && $_POST['house_type']=='4'){
                              echo "selected";
                          } ?>
                          >Nha Nguyen Can</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Min Bedrooms</label>
                    <div class="form-field">
                      <div class="select-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="bedroom" id="" class="form-control">
                          <option value="" selected disabled>Bedroom</option>
                          <option value="">1</option>
                          <option value="">2</option>
                          <option value="">3</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Min Bathroom</label>
                    <div class="form-field">
                      <div class="select-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="bathroom" id="" class="form-control">
                          <option value="" selected disabled>Bathroom</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Min Price</label>
                    <div class="form-field">
                      <div class="select-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="min_price" id="" class="form-control">
                          <option value="" selected disabled="">Min Price</option>
                          <option value="">$1,000</option>
                          <option value="">$5,000</option>
                          <option value="">$10,000</option>
                          <option value="">$50,000</option>
                          <option value="">$100,000</option>
                          <option value="">$200,000</option>
                          <option value="">$300,000</option>
                          <option value="">$400,000</option>
                          <option value="">$500,000</option>
                          <option value="">$600,000</option>
                          <option value="">$700,000</option>
                          <option value="">$800,000</option>
                          <option value="">$900,000</option>
                          <option value="">10,000,000 VND</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Max Price</label>
                    <div class="form-field">
                      <div class="select-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="max_price" id="" class="form-control">
                          <option value="" selected disabled>Max Price</option>
                          <option value="">$5,000</option>
                          <option value="">$10,000</option>
                          <option value="">$50,000</option>
                          <option value="">$100,000</option>
                          <option value="">$200,000</option>
                          <option value="">$300,000</option>
                          <option value="">$400,000</option>
                          <option value="">$500,000</option>
                          <option value="">$600,000</option>
                          <option value="">$700,000</option>
                          <option value="">$800,000</option>
                          <option value="">$900,000</option>
                          <option value="">$1,000,000</option>
                          <option value="">$2,000,000</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Min Area <span>(m2)</span></label>
                    <div class="form-field">
                      <div class="icon"><span class="icon-pencil"></span></div>
                      <input type="text" class="form-control" placeholder="Min Area">
                    </div>
                  </div>
                </div>
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Max Area <span>(m2)</span></label>
                    <div class="form-field">
                      <div class="icon"><span class="icon-pencil"></span></div>
                      <input type="text" class="form-control" placeholder="Max Area">
                    </div>
                  </div>
                </div>
                <div class="col-md align-self-end">
                  <div class="form-group">
                    <div class="form-field">
                      <input type="submit" name="search_house" value="Search" class="form-control btn btn-primary">
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</section>

<!--
<div class="available_page_area">
  <div class="available_page_main container">
    <div class="search_house">
      <div class="search_house_inner card">
        <div class="well search_card card-body">
          <form class="search_house_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="address" class="form-control" value="<?php if(isset($_POST['address'])){
              echo $_POST['address'];
            } ?>" placeholder="Address">
            <select class="form-control" style="background-color:lavender;" name="house_type">
              <option value="" selected disabled>Rent Type</option>
              <option value="Family"
              <?php if(isset($_POST['house_type']) && $_POST['house_type']=='Family'){
                echo "selected";
              } ?>
              >Family</option>
              <option value="Bachelor"
              <?php if(isset($_POST['house_type']) && $_POST['house_type']=='Bachelor'){
                echo "selected";
              } ?>
              >Bachelor</option>
              <option value="Sublet"
              <?php if(isset($_POST['house_type']) && $_POST['house_type']=='Sublet'){
                echo "selected";
              } ?>
              >Sub-Let</option>
              <option value="Mess/Hostel"
              <?php if(isset($_POST['house_type']) && $_POST['house_type']=='Mess/Hostel'){
                echo "selected";
              } ?>
              >Hostel/Mess</option>
            </select>
            <div id="range">
              <label for="input_range">Price range:</label>
              <input type="text" id="input_range" name="rental_value" readonly style="border:0; color:#f6931f; font-weight:bold;">
              <div id="main_range" class="myrange" title="Tap left or right button to set more precise value."></div>
            </div>

            <input type="submit" name="search_house" class="btn btn-info" value="Search house">
          </form>
        </div>
      </div>
    </div>

    <div class="all_houses row">
-->

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row">
      <?php 
        foreach ($data as $value) { ?>
          <div class="col-md-4 ftco-animate" style="border">
            <div class="properties">
              <?php 
                if (!$value['img_1']) {
                  $image = 'assets/images/house/house29.png';
                }
                else {
                  $image = $value['img_1'];  
                }
              ?>
              <a href="housedetails.php?house_id=<?php echo $value['id']; ?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo $image; ?>);">
                <div class="icon d-flex justify-content-center align-items-center">
                  <span class="icon-search2"></span>
                </div>
              </a>
              <div class="text p-3">
                <div class="d-flex">
                  <div class="one">
                    <h3><a href="housedetails.php?house_id=<?php echo $value['id_post']; ?>"><?php echo $value['address']; ?></a></h3>
                    <p><?php echo $value['house_type']; ?></p>
                  </div>
                  <div class="two">
                    <span class="price"><?php echo $value['price']; ?> VND</span>
                  </div>
                </div>
                <hr>
                <p class="bottom-area d-flex">
                  <span><i class="flaticon-selection"></i> <?php echo $value['dien_tich']; ?> m2</span>
                  <span class="ml-auto"><i class="flaticon-bathtub"></i> <?php echo $value['bathroom']; ?></span>
                  <span><i class="flaticon-bed"></i> <?php echo $value['bedroom']; ?></span>
                </p>
              </div>
            </div>
          </div> 
        <?php }
      ?>
    </div>
  </div>
</section>

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
<script>
 $(function(){
   $( "#main_range" ).slider({
         range: true,
         min: 100,
         max: 100000,
         values: [<?php if(isset($range1) && isset($range2)){
           echo $range1.','.$range2;}
           else{?> 100,100000 <?php } ?>],
         slide: function( event, ui ) {
           $( "#input_range" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
         }
    });
    $( "#input_range" ).val( "$" + $( "#main_range" ).slider( "values", 0 ) +
     " - $" + $( "#main_range" ).slider( "values", 1 ) );
   });
</script>