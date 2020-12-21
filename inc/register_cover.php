<!DOCTYPE html>
<html lang="en">
<head>
    <title>EasyAccomod</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Icons font CSS
    <link href="pages component/sign up/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all"> 
    <link href="pages component/sign up/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    -->
    <!-- Font special for pages
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    -->
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
                    <h2 class="title">Registration</h2>
                    <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Full Name</label>
                                    <input class="input--style-4" type="text" name="fullname">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <!--
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Birthday</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="birthday">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            -->
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" checked="checked" name="gender" value="1">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" value="2">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>                           
                        </div>
                        <!--
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Identity Card Number</label>
                                    <input class="input--style-4" type="text" name="cmnd">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Address</label>
                                    <input class="input--style-4" type="text" name="address">
                                </div>
                            </div>
                        </div>
                        -->
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                            <!--
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone">
                                </div>
                            </div>
                            -->
                        </div>
                        <div class = "row row-space"> 
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" name="password">
                                </div>
                            </div>
                        </div>
                        <div class = "row row-space"> 
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Register As</label>
                                </div>
                            </div>
                        </div>
                        <div class ="row row-space">
                            <div class="col-1">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="user" id="reg_as" required="true">
                                        <option disabled="disabled" selected="selected" value="">Register As</option>
                                        <option value="1">Renter</option>
                                        <option value="2">Owner</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="register">Submit</button>
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