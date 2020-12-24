<?php
session_start();
if(isset($_SESSION['username'])){
    $text = $_POST['text'];
     
    $fp = fopen("log.html", 'a');
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>Admin: ".$_SESSION['username']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fp);
}
?>