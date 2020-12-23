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
                    <h2 class="title">Edit Profile</h2>
                    <form action="<?php echo $_SERVER['PHP_SELF'].'?id='.$id; ?>" method="post" enctype="multipart/form-data">
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Update Your Profile Picture</label>
                                    <input type="file" class="form-control-file" name="profile_img" placeholder="Update Profile Image" style="float: left;margin-right: 20px;margin-top:20px;">
                                </div>
                            </div>   
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Fullname</label>
                                    <input class="input--style-4" type="text" name="fullname" value="<?php echo $user->fullname; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Address</label>
                                    <input class="input--style-4" type="text" name="address" value="<?php if(isset($user->address)) echo $user->address; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Phone</label>
                                    <input class="input--style-4" type="text" name="phone" value="<?php if(isset($user->phone)) echo $user->phone; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Your NID No</label>
                                    <input class="input--style-4" type="text" name="nid" value="<?php if(isset($user->nid))   echo $user->nid; ?>">
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
                                <textarea name="description" class="form-control" rows="8" cols="80" placeholder="Description(Optional)" value="<?php if(isset($user->description))  echo $user->description; ?>"></textarea>
                            </div>
                        </div>
                        <div class="p-t-15 text-center">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="editprofile">Update Profile
                            </button>
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