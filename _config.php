<?php 
$conn = mysqli_connect("localhost", 'root' , '', "anime") or die("Connection fail");


$websiteTitle = "Zoro";
$websiteUrl = "//{$_SERVER['SERVER_NAME']}";
$websiteLogo = $websiteUrl . "/files/images/logo_zoro.png";
$contactEmail = "kirixenz@gmail.com";

$version = "0.1";

$discord = "https://dsc.gg/kirixen";
$github = "https://github.com/kirixen";
$twitter = "https://x.com/KiriX3n";
 
$disqus = "https://zorobysam.disqus.com/embed.js";
$api = "https://anime-api-3yi7.onrender.com"; 

$banner = $websiteUrl . "/files/images/banner.png";
?>
