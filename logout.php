<?php

include('config/config.php');
$session_userId = '';
$_SESSION['userId'] = '';
if (empty($session_userId) && empty($_SESSION['userId'])) {
    $url = BASE_URL . 'index.php';
    header("Location: $url");
}