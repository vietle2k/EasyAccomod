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
            <li class="nav-item"><a href="index.php#property" class="nav-link">Property</a></li>
            <li class="nav-item"><a href="index.php#about" class="nav-link">About</a></li>
            <?php 
              $msg = new Message();
              $allmsg = $msg->getMessage(Session::get('user_id'));
              if (isset($_GET['logout']) && $_GET['logout']=='yes') {
                Session::sessionDestroy();
              }
            ?>  
            <?php
              if(Session::get('login') == true && (Session::get('user') == 'owner')) { ?>
                <li class="nav-item cta"><a href="add_houserent.php" class="nav-link ml-lg-2"><span class="icon-user"></span> Add For Rent </a></li>
                <li class="nav-item cta cta-colored"><a href="owner_profile.php?owner_id=<?php echo Session::get('user_id'); ?>" class="nav-link"><span class="icon-user"></span> Profile </a></li>
                <?php
              }
              if(Session::get('login') == true && (Session::get('user') == 'renter')) { ?>
                  <li class="nav-item cta cta-colored"><a class="nav-link"><span class="icon-user"></span> Profile </a></li>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="?logout=yes">Logout</a>
                  </div>
                <?php
              }
              if(Session::get('login') == false) { ?>
                <li class="nav-item cta"><a href="user_login.php" class="nav-link ml-lg-2"><span class="icon-user"></span> Sign-In</a></li>
                <li class="nav-item cta cta-colored"><a href="user_register.php" class="nav-link"><span class="icon-pencil"></span> Register</a></li>
                <?php
              }
            ?> 
            <?php
              if(($_SERVER["REQUEST_METHOD"] === "POST") && isset($_POST['delmsg']) && isset($_GET['id']) ) {
                $delmsg = $msg->tempDelmsg(Session::get('user_id'), $_GET['id']);
              }
              if(Session::get('login')==true && (Session::get('user') == 'owner' || Session::get('user') == 'renter')) {

              }              
            ?>       
          </ul>
        </div>
      </div>
</nav>
