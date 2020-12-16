<?php

if (!empty($_SESSION['userId'])) {
    $session_userId = $_SESSION['userId'];
    include('class/UserClass.php');
    $userClass = new UserClass();
}

if (empty($session_userId)) {
    $url = BASE_URL . 'index.php';
    header("Location: $url");
}