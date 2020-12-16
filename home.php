<?php
include('config/config.php');
include('session.php');
$userDetails = $userClass->userDetails($session_userId);
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h1>Xin chào: <?php echo $userDetails->name; ?></h1>

<h4><a href="<?php echo BASE_URL; ?>logout.php">Đăng xuất</a></h4>
</body>
</html>
