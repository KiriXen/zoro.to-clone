[![Join our Discord server!](https://invidget.switchblade.xyz/VsPXjNRcbw)](https://discord.com/invite/VsPXjNRcbw)
<hr/>

## Acknowledgements

[anime-api](https://github.com/kirixen/gogo-api) The api used for the need of this website. 

## Requirements
--> Php environment (use .htaccess must be enabled in localhost) or Directly Upload the code on php supported hosting (No editing Required Just Upload and Enjoy)

_config.php
```
<?php 
$conn = mysqli_connect("localhost", 'root' , '', "anime") or die("Connection fail"); // mysql database

`localhost` - host name, `root` - Mysql username, and leave it root if u're on localhost , `` - it's the password of the mysql and leave it empty if you're on localhost, 'anime' - It's the database name inside of the mysql, u can give it any name u want ~

$websiteTitle = "Zoro"; // website's name
$websiteUrl = "//{$_SERVER['SERVER_NAME']}";  // if on local then after the `}` add a slash and `/name_of_the_folder`
$websiteLogo = $websiteUrl . "/files/images/logo_zoro.png";
$contactEmail = "@gmail.com"; // ur email

$version = "0.1"; // website version 

$discord = "https://dsc.gg/kirixen"; // discord
$github = "https://github.com/kirixen"; // github
$twitter = "https://x.com/KiriX3n"; // twitter
 
$disqus = "https://your_disqus_shortname_here.disqus.com/embed.js"; // your disqus shortname
$api = ""; // api here without the '/' at the end

$banner = $websiteUrl . "/files/images/banner.png";
?>

```

The table for the database is on the `AutoAnime.sql`

## Local Deployment

You need to have `xampp` installed on your pc for following the intructions

Go check out on yt on how to install n use it yeah !

Make Sure You Edit $websiteUrl in _config.php before starting in localhost.. <br>
And Enable the use of .htaccess in PHP enviornment
