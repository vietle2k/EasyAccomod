<?php
  include 'Controller/Homecontroller.php';
  $home = new Homecontroller();
  $data = $home->gethomeDetails();
  if(!$data){
    echo "<p>No data found</p>";
  }
?>

<section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url(images/background_1.jpg);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row align-items-center justify-content-center slider-text">

            <div class="col-md-12 text-center">
              <h1 class="mb-5 bread font-weight-bold" style="font-size: 50px; color: white;">Find Your Dream House</h1>
            </div>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(images/background_2.jpg);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row align-items-center justify-content-center slider-text">
            
            <div class="col-md-12 text-center">
              <h1 class="mb-5 bread font-weight-bold" style="font-size: 50px; color: white;">Become Our Member Today</h1>
            </div>
          </div>   
        </div>
        </div>
      </div>
</section>

<!--
<section class="ftco-search">
      <div class="container">
        <div class="row">
          <div class="col-md-12 search-wrap">
            <h2 class="heading h5 d-flex align-items-center pr-4"><span class="ion-ios-search mr-3"></span> Search Property</h2>
            <form action="#" class="search-property">
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
                    <label for="#">Location</label>
                    <div class="form-field">
                      <div class="icon"><span class="icon-pencil"></span></div>
                      <input type="text" class="form-control" placeholder="City/Locality Name">
                    </div>
                  </div>
                </div>
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Property Type</label>
                    <div class="form-field">
                      <div class="select-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="" id="" class="form-control">
                          <option value="">Type</option>
                          <option value="">Commercial</option>
                          <option value="">- Office</option>
                          <option value="">Residential</option>
                          <option value="">Villa</option>
                          <option value="">Condominium</option>
                          <option value="">Apartment</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Property Status</label>
                    <div class="form-field">
                      <div class="select-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="" id="" class="form-control">
                          <option value="">Type</option>
                          <option value="">Rent</option>
                          <option value="">Sale</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Min Beds</label>
                    <div class="form-field">
                      <div class="select-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="" id="" class="form-control">
                          <option value="">1</option>
                          <option value="">2</option>
                          <option value="">3</option>
                          <option value="">4</option>
                          <option value="">5</option>
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
                        <select name="" id="" class="form-control">
                          <option value="">1</option>
                          <option value="">2</option>
                          <option value="">3</option>
                          <option value="">4</option>
                          <option value="">5</option>
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
                        <select name="" id="" class="form-control">
                          <option value="">Min Price</option>
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
                          <option value="">$1,000,000</option>
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
                        <select name="" id="" class="form-control">
                          <option value="">Min Price</option>
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
                    <label for="#">Min Area <span>(sq ft)</span></label>
                    <div class="form-field">
                      <div class="icon"><span class="icon-pencil"></span></div>
                      <input type="text" class="form-control" placeholder="Min Area">
                    </div>
                  </div>
                </div>
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Max Area <span>(sq ft)</span></label>
                    <div class="form-field">
                      <div class="icon"><span class="icon-pencil"></span></div>
                      <input type="text" class="form-control" placeholder="Max Area">
                    </div>
                  </div>
                </div>
                <div class="col-md align-self-end">
                  <div class="form-group">
                    <div class="form-field">
                      <input type="submit" value="Search" class="form-control btn btn-primary">
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</section>
-->

<!--
<section class="ftco-section ftco-properties">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Recent Posts</span>
            <h2 class="mb-4">Recent Properties</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="properties-slider owl-carousel ftco-animate">
              <?php 
                foreach ($data as $value) { ?>                    
                      <div class="item">
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
                                <h3><a href="housedetails.php?house_id=<?php echo $value['id']; ?>"><?php echo $value['address']; ?></a></h3>
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
        </div>
      </div>
</section>
-->