<?php
include('../../_config.php');
session_start();
if(isset($_COOKIE['userID'])){
    $user_id = $_COOKIE['userID'];
  };
include '../../_config.php';
$animeID = $_POST['btnValue'];

$query = mysqli_query($conn, "SELECT * FROM `watch_later` WHERE (user_id ,anime_id) = ('$user_id', '$animeID')"); 
$query = mysqli_fetch_array($query); 
if(isset($query['id'])){
    $id = $query['id'];
    mysqli_query($conn,"DELETE FROM `watch_later` WHERE id = $id"); 
    echo " &nbsp;<i class='fas fa-plus mr-2'></i>&nbsp;Add to List&nbsp;";
}else{
    $getAnime = file_get_contents("$api/getAnime/$animeID");
    $getAnime = json_decode($getAnime, true);
    $name = $getAnime['name'];
    $type = $getAnime['type'];
    $image = $getAnime['imageUrl'];
    $release = $getAnime['released'];
    mysqli_query($conn,"INSERT INTO `watch_later` (user_id,name,anime_id,image,type,released) VALUES('$user_id','$name','$animeID','$image', '$type', '$release')"); 
    echo " &nbsp;<i class='fas fa-minus mr-2'></i>&nbsp;Remove from List&nbsp;";
}

?>