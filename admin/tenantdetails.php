<?php
	include 'inc/header.php';
		Session::checkAdmin();
	include 'inc/sidebar.php';
 ?>
<div class="main-panel">
<?php
	include 'inc/topnav.php';
	include 'Admincontroller/Tenant.php';
?>

<?php
  $tenant = new Tenant();
  if(isset($_GET['id'])){
    $singleuser = $tenant->singletenant($_GET['id']);
  }
  if( isset($_POST['delete'])){
    $del = $tenant->deltenant($_GET['id']);
  }

 ?>

  <div class="content">
    <div class="container-fluid">
      <div class="card owner_details" style="padding: 20px 5px;">
        <div class="card-body">
          <div class="profile_pic">
            <img src="../assets/images/owner.png" alt="">
          </div>
          <table>
            <tr>
              <td>Name:</td>
              <td><?php echo $singleuser['fullname']; ?></td>
            </tr>
            <tr>
              <td>Gender:</td>
              <td><?php echo $singleuser['gender']; ?></td>
            </tr>
            <tr>
              <td>email:</td>
              <td><?php echo $singleuser['email']; ?></td>
            </tr>
            <tr>
              <td>address:</td>
              <td><?php echo $singleuser['address']; ?></td>
            </tr>
            <tr>
              <td>phone:</td>
              <td><?php echo $singleuser['phone']; ?></td>
            </tr>
            
          </table>
          <div class="action_btn">
            <!-- <form style="display:inline-block;" class="" action="ownerdetails.php?id=<?php echo $user['id']; ?>" method="post">
            <input type="hidden" name="delete" value="<?php echo $user['id']; ?>">
              <input type="submit" name="delete" class="btn btn-danger" value="delete">
            </form> -->
            <a href="alltenant.php" class="btn btn-default">Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>

 <?php
	include 'inc/footer.php';
 ?>
</div>
<?php
	include 'inc/jsarea.php';
 ?>
