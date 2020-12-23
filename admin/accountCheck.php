<?php
	include 'inc/header.php';
		Session::checkAdmin();
	include 'inc/sidebar.php';
 ?>
<div class="main-panel">
<?php
	include 'inc/topnav.php';
	include_once 'admincontroller/Alluser.php';
?>

<?php
  $owner = new Alluser();
  $alluser = $owner->allowner();
  if (isset($_POST['id'])) {
    $owner->updateActive($_POST['id']);
  }
 ?>

  <div class="content">
    <div class="container-fluid">
      <div class="card" style="padding: 20px 5px;">
        <div class="card-body">
          <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Gmail</th>
                    <!-- <th>Number of House</th> -->
                    <th>View</th>
                    <th>Active</th>
                </tr>
            </thead>
            <tbody>
              <?php
                if($alluser){
                  $i = 0;
                  foreach($alluser as $user){
                    $i++;
               ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $user['fullname'] ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <!-- <td style="padding-left:75px;"></td> -->
                    <td> <a class="btn btn-info" href="ownerdetails.php?id=<?php echo $user['id']; ?>" >view</a> </td>
                    <td>
                    <form class="" action="accountCheck.php" method="post">
												<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                        <input class="btn btn-danger" type="submit" name="delmsg" value="Active">
                      </form>
                  </td>
                </tr>
              <?php } }else{ echo "<p>There is no user!</p>"; } ?>
            </tbody>
        </table>
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
