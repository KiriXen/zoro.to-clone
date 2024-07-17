<?php 
$conn = mysqli_connect("localhost", 'root' , '', "anime") or die("Connection fail");


$websiteTitle = "Zoro"; // Website Name
$websiteUrl = "//{$_SERVER['SERVER_NAME']}/newsite";  // Website URL
$websiteLogo = $websiteUrl . "/files/images/logo_zoro.png"; // Logo
$contactEmail = "contact@codecheap.shop"; // Contact Email

$version = "0.5";

// Socials 
$discord = "your link"; // Discord
$github = "your link"; // Reddit
$twitter = "your link"; // Twitter
 


$disqus = "https://aniwatchtv-1.disqus.com/embed.js"; // Disqus


// API URL
$api = "https://anime-api-3yi7.onrender.com"; // 


$banner = $websiteUrl . "/files/images/banner.png";  //Banner
?>
