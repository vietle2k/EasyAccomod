<?php
    $User = $Pass = '';
    if(isset($_POST['UserName'])){
        $User = $_POST['UserName'];
    }
    if(isset($_POST['Password'])){
        $Pass = $_POST['Password'];
    }
    if($User !='' && $Pass !=''){
        header('Location: index.html');
    }
?>
<html>

<body>
    <form action='dangnhap.php' method="post">
        UserName <input type=text name='UserName'> Password <input type='text' name='Password'>
        <input type='submit' name='login'></button>
    </form>
</body>

</html>