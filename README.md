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

$websiteTitle = "Zoro"; // website's name
$websiteUrl = "//{$_SERVER['SERVER_NAME']}";
$websiteLogo = $websiteUrl . "/files/images/logo_zoro.png";
$contactEmail = "@gmail.com"; // ur email

$version = "0.1"; // website version 

$discord = "https://dsc.gg/kirixen"; // discord
$github = "https://github.com/kirixen"; // github
$twitter = "https://x.com/KiriX3n"; // twitter
 
$disqus = "https://----.disqus.com/embed.js"; // your disqus shortname
$api = ""; // the api here 

$banner = $websiteUrl . "/files/images/banner.png";
?>

```

## Local Deployment

You need to have `php` installed on your pc for following the intructions

First download the repository using
```
git clone https://github.com/Kirixen/zoro.to-clone
```

Now start the production build of the site using
```
php -S localhost:8888
```

This will start the app on http://localhost:8888 <br>
Make Sure You Edit $websiteUrl in _config.php before starting in localhost.. <br>
And Enable the use of .htaccess in PHP enviornment
