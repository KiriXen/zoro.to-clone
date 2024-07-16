<?php 
$conn = mysqli_connect("localhost", 'root' , '', "anime") or die("Connection fail");


$websiteTitle = "Your Site Name"; // Website Name
$websiteUrl = "//{$_SERVER['SERVER_NAME']}/newsite";  // Website URL
$websiteLogo = $websiteUrl . "/files/images/logo22.png"; // Logo
$contactEmail = "contact@codecheap.shop"; // Contact Email

$version = "0.3";

//Donate 
$donate = "your link";

// Socials 
$telegram = "your link"; // telegram
$discord = "your link"; // Discord
$redit = "your link"; // Reddit
$twitter = "your link"; // Twitter
 


$disqus = "https://aniwatchtv-1.disqus.com/embed.js"; // Disqus


// API URL
$api = "https://anime-api-3yi7.onrender.com"; // 


$banner = $websiteUrl . "/files/images/banner.png";  //Banner
?>
