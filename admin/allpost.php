<?php
	include 'inc/header.php';
		Session::checkAdmin();
	include 'inc/sidebar.php';
 ?>
<div class="main-panel">
<?php
	include 'inc/topnav.php';
	include 'Admincontroller/Post.php';
?>

<?php
  $post = new Post();
  $alluser = $post->allpost();
  if (isset($_POST['id_post'])) {
    $post->acceptPost($_POST['id_post']);
    $post->acceptNotification($_POST['id_post']);
  }
  if (isset($_POST['id_del'])) {
    $post->declinePost($_POST['id_del']);
    $post->declineNotification($_POST['id_del']);

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
                    <th>Owner_ID</th>
                    <th>Type</th>
                    <th>Image</th>
                    <!-- <th>Number of House</th> -->
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
                    <td><?php echo $user['owner_id']; ?></td>
                    <td>
                    <?php  
                    if($user['house_type'] == 'phong_tro') 
                    {
                        echo 'Phòng trọ'; 
                    }
                    else if($user['house_type'] == 'chung_cu_mini') 
                    { 
                        echo "Chung cư mini" ;
                    }
                    else if($user['house_type'] == 'chung_cu_nguyen_can') 
                    { 
                        echo "Chung cư nguyên căn" ;
                    }
                    else if($user['house_type'] == 'nha_nguyen_can') 
                    { 
                        echo "Nhà nguyên căn" ; 
                    }

                    ?>
                    <td> <img width="80" height="100" src="../<?php echo $user['img_1']; ?>" alt=""></td>
                    <!-- <td style="padding-left:75px;"></td> -->
                    <!-- <td><a class="btn btn-info" href="ownerdetails.php?id=<?php echo $user['id']; ?>" >Accept</a> </td>
                    <td><a class="btn btn-danger" href="ownerdetails.php?id=<?php echo $user['id']; ?>" >Delete</a> </td> -->
                    <td>
                      <form class="" action="allpost.php" method="post">
							<input type="hidden" name="id_post" value="<?php echo $user['id_post']; ?>">
                        <input class="btn btn-info" type="submit" name="acc" value="Accept">
                      </form>
                    </td>
                    <td>
                      <form class="" action="allpost.php" method="post">
							<input type="hidden" name="id_del" value="<?php echo $user['id_post']; ?>">
                        <input class="btn btn-danger" type="submit" name="del" value="Decline">
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
