<?php 

include('../_config.php');

// Random Profile Picture
$profile = [
    'user-1.jpeg',
    'user-2.jpeg',
    'user-3.jpeg',
    'user-4.jpeg',
    'user-5.jpeg',
    'user-6.jpeg',
    'user-7.jpeg',
    'user-8.jpeg',
    'user-9.jpeg',
    'user-10.jpeg',
    'user-11.jpeg',
    'user-12.jpeg',
];
$randomNum = rand(0,10);


if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $image = $profile[$randomNum];
    $currentTimeStamp = time();

    function is_valid_username($name){
        // accepted username length between 5 and 20
            if (preg_match('/^[a-z](?=(?:[a-z]*\d){0,10}(?![a-z]*\d))(?=[a-z\d]{3,35}$)[a-z\d]+$/', $name))
                return true;
            else
                return false;
        }
 
    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE (name='$name' or email='$email')") or die('query failed');
    if(mysqli_num_rows($select) > 0){
        $row = mysqli_fetch_assoc($select);
        if($email==isset($row['email']))
        {
            $message[] = 'Email already exists';
        }
		if($name==isset($row['name']))
		{
			$message[] = 'Username already exists';
		}
		}
else{
     if(is_valid_username($name) === false){
        $message[] = "Username can't contain special and uppercase character";
     }
       elseif($pass != $cpass){
          $message[] = 'confirm password not matched!';
       }else{
          $insert = mysqli_query($conn, "INSERT INTO `user_form`(`name`, email, `password`, `image`, `date`) VALUES('$name', '$email', '$pass', '$image','$currentTimeStamp')") or die('query failed');
 
          if($insert){
             move_uploaded_file($image_tmp_name, $image_folder);
             $message[] = 'registered successfully!';
             header('location:login.php');
          }else{
             $message[] = 'registeration failed!';
          }
       }
    }
 
 }

?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Register - <?=$websiteTitle?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="title" content="Register - <?=$websiteTitle?>">
    <meta name="description" content="Anime in HD with No Ads. Watch anime online">
    <meta name="keywords" content="<?=$websiteTitle?>, watch anime online, free anime, anime stream, anime hd, english sub, kissanime, gogoanime, animeultima, 9anime, 123animes, <?=$websiteTitle?>, vidstreaming, gogo-stream, animekisa, zoro.to, gogoanime.run, animefrenzy, animekisa">
    <meta name="charset" content="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="revisit-after" content="1 days">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Language" content="en">
    <meta property="og:title" content="Register - <?=$websiteTitle?>">
    <meta property="og:description" content="Anime on <?=$websiteTitle?> in HD with No Ads. Watch anime online">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?=$websiteTitle?>">
    <link rel="canonical" href="<?=$websiteUrl?>">
    <link rel="alternate" hreflang="en" href="<?=$websiteUrl?>">
    <link rel="apple-touch-icon" href="<?=$websiteUrl?>/favicon.png?v=<?=$version?>" />
    <link rel="shortcut icon" href="<?=$websiteUrl?>/favicon.png?v=<?=$version?>" type="image/x-icon"/>
    <link rel="apple-touch-icon" sizes="180x180" href="<?=$websiteUrl?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=$websiteUrl?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=$websiteUrl?>/favicon-16x16.png">
    <link rel="mask-icon" href="<?=$websiteUrl?>/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="icon" sizes="192x192" href="<?=$websiteUrl?>/files/images/touch-icon-192x192.png?v=<?=$version?>">
    <link rel="stylesheet" href="<?=$websiteUrl?>/files/css/style.css?v=<?=$version?>">
    
    <link rel="stylesheet" href="<?=$websiteUrl?>/files/css/min.css?v=<?=$version?>">
    <script type="text/javascript">
        setTimeout(function () {
            var wpse326013 = document.createElement('link');
            wpse326013.rel = 'stylesheet';
            wpse326013.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css?v=<?=$version?>';
            wpse326013.type = 'text/css';
            var godefer = document.getElementsByTagName('link')[0];
            godefer.parentNode.insertBefore(wpse326013, godefer);
            var wpse326013_2 = document.createElement('link');
            wpse326013_2.rel = 'stylesheet';
            wpse326013_2.href = 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css?v=<?=$version?>';
            wpse326013_2.type = 'text/css';
            var godefer2 = document.getElementsByTagName('link')[0];
            godefer2.parentNode.insertBefore(wpse326013_2, godefer2);
        }, 500);
    </script>
    <noscript>
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css?v=<?=$version?>" />
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css?v=<?=$version?>" />
    </noscript>
    <scripts></scripts>
</head>

<body data-page="page_register">
    <div id="sidebar_menu_bg"></div>
    <div id="wrapper" data-page="page_home">
        <?php include('../_php/header.php'); ?>
        <div class="clearfix"></div>
        <div id="main-wrapper" class="layout-page layout-page-404">
            <div class="container">
                <div class="container-404 text-center">
                    <div class="c4-medium">Register Your Account</div>
                    <div class="c4-big-img">
                        <form class="preform" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                                <label class="prelabel" for="re-username">Username</label>
                                <div class="col-sm-6" style="float:none;margin:auto;">
                                    <input type="text" class="form-control" name="name" placeholder="Username"
                                     required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="prelabel" for="email">Email address</label>
                                <div class="col-sm-6" style="float:none;margin:auto;">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="name@email.com" required="">
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="prelabel" for="password">Password</label>
                                <div class="col-sm-6" style="float:none;margin:auto;">
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Password" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="prelabel" for="password">Confirm Password</label>
                                <div class="col-sm-6" style="float:none;margin:auto;">
                                    <input type="password" class="form-control" name="cpassword"
                                        placeholder="Password" required="">
                                </div>
                            </div>
                            <div class="mt-4">&nbsp;</div>
                            <div class="form-group login-btn mb-0">
                                <div class="col-sm-6" style="float:none;margin:auto;">
                                    <button id="btn-login" name="submit"
                                        class="btn btn-primary btn-block">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="c4-small">You already have an account? <a href="<?=$websiteUrl?>/user/login"
                            class="link-highlight register-tab-link" title="Login">Login</a></div>
                    <div class="c4-button">
                        <a href="<?=$websiteUrl?>" class="btn btn-radius btn-focus"><i class="fa fa-chevron-circle-left mr-2"></i>Back
                            to <?=$websiteTitle?></a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <?php require('../_php/footer.php') ?>
        <div id="mask-overlay"></div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js?v=<?=$version?>"></script>
        
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js?v=<?=$version?>"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
        <script type="text/javascript" src="<?=$websiteUrl?>/files/js/app.js?v=<?=$version?>"></script>
        <script type="text/javascript" src="<?=$websiteUrl?>/files/js/comman.js?v=<?=$version?>"></script>
        <script type="text/javascript" src="<?=$websiteUrl?>/files/js/movie.js?v=<?=$version?>"></script>
        <link rel="stylesheet" href="<?=$websiteUrl?>/files/css/jquery-ui.css?v=<?=$version?>">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js?v=<?=$version?>"></script>
        <script type="text/javascript" src="<?=$websiteUrl?>/files/js/function.js?v=<?=$version?>"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js?v=<?=$version?>"></script>
        <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<script type="text/javascript">swal({title: "Error!",text: "'.$message.'",icon: "warning",button: "Close",})</script>;';
         }
      }
      ?>
        <!----<script type="text/javascript">
            swal({
                title: "Error!",
                text: "Username must be atleast 6 characters",
                icon: "warning",
                button: "Close",
            });
        </script>---->
        <div style="display:none;">
        </div>
    </div>
</body>

</html>