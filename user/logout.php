<?php 
session_start();
if(isset($_COOKIE['userID'])){ 
$user_id = $_COOKIE['userID'];
setcookie('userID', '$user_id', 1, '/');
};
header('location:../home');
?>