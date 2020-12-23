<!DOCTYPE html>
<html lang="en">
<head>
    <title>EasyAccomod</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Vendor CSS-->
    <link href="pages component/sign up/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="pages component/sign up/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="pages component/sign up/css/main.css" rel="stylesheet" media="all">
</head>
<body>
  <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Add House</h2>
                    <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="row row-space">
                            <div class="col-12">
                                <select class="form-control" id="select_type" style="background-color:lavender;" name="house_type" required>
                                    <option value="" selected disabled>Rent Type</option>
                                    <option value="1">Phong Tro</option>
                                    <option value="2">Chung Cu Mini</option>
                                    <option value="3">Chung Cu Nguyen Can</option>
                                    <option value="4">Nha Nguyen Can</option>
                                </select>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">House Address</label>
                                    <input class="input--style-4" type="text" name="address">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Acreage (m2)</label>
                                    <input class="input--style-4" type="number" min="15" max="2000" name="dien_tich">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Rental Value per Month (VND)</label>
                                    <input class="input--style-4" type="range" value="0" min="0" max="50000000" step="50000" name="rental_value" oninput="this.nextElementSibling.value = this.value">
                                    <output>0</output><a> VND</a>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Electricity Price per KWh (VND)</label>
                                    <input class="input--style-4" type="number" min="3000" max="15000" step="500" name="tien_dien">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Price of Water per Cubic (VND)</label>
                                    <input class="input--style-4" type="number" min="3000" max="15000" step="500" name="tien_nuoc">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <label class="label">Bedroom</label>
                                <select class="form-control" id="select_type" style="background-color:lavender;" name="bedroom" required>
                                    <option value="" selected disabled>Number of Bedrooms</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <label class="label">Bathroom</label>
                                <select class="form-control" id="select_type" style="background-color:lavender;" name="bathroom" required>
                                    <option value="" selected disabled>Number of Bathrooms</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="2">3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <label class="label"></label>
                                <select class="form-control" id="select_type" style="background-color:lavender;" name="bathroom_nl" required>
                                    <option value="" selected disabled>Tankless Water Heater</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <label class="label">Kitchen</label>
                                <select class="form-control" id="select_type" style="background-color:lavender;" name="kitchen" required>
                                    <option value="" selected disabled>Kitchen</option>
                                    <option value="1">Rieng</option>
                                    <option value="2">Chung</option>
                                    <option value="3">Tu Tuc</option>
                                </select>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <label class="label"></label>
                                <select class="form-control" id="select_type" style="background-color:lavender;" name="air_condition" required>
                                    <option value="" selected disabled>Air Condition</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <label class="label">Balconies</label>
                                <select class="form-control" id="select_type" style="background-color:lavender;" name="balconies" required>
                                    <option value="" selected disabled>Balconies</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Add image of your house:</label> 
                                    <input type="file" style="float:left;" class="form-control-file" name="img_1" placeholder="Add Image"> 
                                </div> 
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Descripton</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <textarea name="description" class="form-control" rows="8" cols="80" placeholder="Description(Optional)"></textarea>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="fam_add_rent">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
     
  <!-- sign up component script -->
  <!-- Jquery JS-->
  <script src="pages component/sign up/vendor/jquery/jquery.min.js"></script>
  <!-- Vendor JS-->
  <script src="pages component/sign up/vendor/select2/select2.min.js"></script>
  <script src="pages component/sign up/vendor/datepicker/moment.min.js"></script>
  <script src="pages component/sign up/vendor/datepicker/daterangepicker.js"></script>

  <!-- Main JS-->
  <script src="pages component/sign up/vendor/datepicker/js/global.js"></script>  
  
</body>
</html>