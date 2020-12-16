<?php
include("config/config.php");
include('class/UserClass.php');
$userClass = new UserClass();

$errorMsgLogin = '';
$errorMsgReg = '';
if (!empty($_POST['loginSubmit'])) {
    $usernameEmail = $_POST['usernameEmail'];
    $password = $_POST['password'];
    if (strlen(trim($usernameEmail)) > 1 && strlen(trim($password)) > 1) {
        $id = $userClass->userLogin($usernameEmail, $password);
        if ($id) {
            $url = BASE_URL . 'index.html';
            
            header("Location: $url");
        } else {
            $errorMsgLogin = "Sai tài khoản hoặc mật khẩu.";
        }
    }
}

if (!empty($_POST['signupSubmit'])) {
    $username = $_POST['usernameReg'];
    $email = $_POST['emailReg'];
    $password = $_POST['passwordReg'];
    $name = $_POST['nameReg'];
    $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
    $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
    $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

    if ($username_check && $email_check && $password_check && strlen(trim($name)) > 0) {
        $id = $userClass->userRegistration($username, $password, $email, $name);
        if ($id) {
            $url = BASE_URL . 'home.php';
            header("Location: $url");
        } else {
            $errorMsgReg = "Tên người dùng hoặc Email đã tồn tại.";
        }
    } else {
        $errorMsgReg = "Vui lòng kiểm tra lại thông tin nhập vào.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">
<body>
<!--HTML FORM CODE HERE-->
    <div id="login" class="col-3 mt-3">
        <div class="card p-3">
            <h3>Form đăng nhập</h3>
            <form method="post" action="" name="login">
                <label>Username or Email</label>
                <input type="text" name="usernameEmail" class="form-control" autocomplete="off"/>
                <label>Mật khẩu</label>
                <input type="password" name="password" class="form-control" autocomplete="off"/>
                <div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
                <input type="submit" class="btn btn-primary" name="loginSubmit" value="Đăng nhập">
            </form>
        </div>
    </div>
</body>
</html>
