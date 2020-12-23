<?php
  include_once 'Controller/Message.php';
?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.php">Easy<span>Accomod</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="availablehouse.php" class="nav-link">Available House</a></li> 
            <?php 
              $msg = new Message();
              $allmsg = $msg->getMessage(Session::get('user_id'));
              if (isset($_GET['logout']) && $_GET['logout']=='yes') {
                Session::sessionDestroy();
              }
            ?>  
            <?php
              if(($_SERVER["REQUEST_METHOD"] === "POST") && isset($_POST['delmsg']) && isset($_GET['id']) ) {
                $delmsg = $msg->tempDelmsg(Session::get('user_id'), $_GET['id']);
              }
            ?> 
            <?php   
            if(Session::get('login')==true && (Session::get('user') == 'owner' || Session::get('user') == 'renter')){ 
              ?>
              <li class="nav-item cta dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-ha>
                  Noti <span class="badge badge-light"><?php echo count($allmsg); ?></span>
                </a> 
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php 
                    if ($msg) {
                      foreach ($allmsg as $message) {
                        ?>
                          <a class="dropdown-item">
                            <p style="font-size: 10px;">
                            <?php echo $message['message']; ?>
                              <form class="" action="<?php echo $_SERVER['PHP_SELF'].'?id='.$message['id']; ?>" method="post">
                                <input onclick="<?php $url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                                Session::set('path',$url); ?> this.form.submit();" type="submit" name="delmsg" value="Delete">
                              </form>
                            </p> 
                          </a>
                        <?php }  
                    } else { ?>
                        <a class="dropdown-item">No new message</a> 
                    <?php }
                  ?>
                </div>
              </li>
              <?php }           
            ?> 
            <?php
              if(Session::get('login') == true && (Session::get('user') == 'owner')) { ?>
                <li class="nav-item cta"><a href="add_houserent.php" class="nav-link ml-lg-2"><span class="icon-upload"></span> Add For Rent </a></li>
                <li class="nav-item cta dropdown cta-colored">
                  <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-ha><span class="icon-user"></span> My Account </a>
                  <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="owner_profile.php?owner_id=<?php echo Session::get('user_id'); ?>">Profile</a>
                    <a class="dropdown-item" href="?logout=yes">Logout</a>
                  </div>
                </li>
                <?php
              }
              if(Session::get('login') == true && (Session::get('user') == 'renter')) { ?>
                <li class="nav-item cta dropdown cta-colored">
                  <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-ha><span class="icon-user"></span> My Account </a>
                  <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="tenant_profile.php?tenant_id=<?php echo Session::get('user_id'); ?>">Profile</a>
                    <a class="dropdown-item" href="?logout=yes">Logout</a>
                  </div>
                </li>    
                <?php
              }
              if(Session::get('login') == false) { ?>
                <li class="nav-item cta"><a href="user_login.php" class="nav-link ml-lg-2"><span class="icon-user"></span> Sign-In</a></li>
                <li class="nav-item cta cta-colored"><a href="user_register.php" class="nav-link"><span class="icon-pencil"></span> Register</a></li>
                <?php
              } 
              else if ((Session::get('login') == false && isset($_GET['logout']) && $_GET['logout']=='no') && (Session::get('login') == true && (Session::get('user') != 'owner' || Session::get('user') != 'renter') )) { ?>
                <?php Session::sessionDestroy(); ?>
                <li class="nav-item cta"><a href="user_login.php" class="nav-link ml-lg-2"><span class="icon-user"></span> Sign-In</a></li>
                <li class="nav-item cta cta-colored"><a href="user_register.php" class="nav-link"><span class="icon-pencil"></span> Register</a></li>
                <?php
              }
            ?>     
          </ul>
        </div>
      </div>
</nav>
