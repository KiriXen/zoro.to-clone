<?php 

include '../_config.php';
session_start();

if(isset($_COOKIE['userID'])){
  header('location:../home.php');
};


if(isset($_POST['submit'])){


   $login = mysqli_real_escape_string($conn, $_POST['login']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE (name = '$login' OR email= '$login') AND password = '$pass'") or die('query failed');
   

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['userID'] = $row['id'];
      setcookie('userID',$row['id'],time()+60*60*24*30*12,'/');
      if(isset($_GET['animeId'])){
        $animeId = $_GET['animeId'];
        header('location:../anime/'.$animeId.'');
      }else{
      header('location:../home.php');
      }
   }else{
      $message[] = 'Incorrect username/email or password!';
   }

}
?>


<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title>Login - <?=$websiteTitle?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="title" content="Login - <?=$websiteTitle?>">
  <meta name="description" content="Anime in HD with No Ads. Watch anime online">
  <meta name="keywords"
    content="<?=$websiteTitle?>, watch anime online, free anime, anime stream, anime hd, english sub, kissanime, gogoanime, animeultima, 9anime, 123animes, <?=$websiteTitle?>, vidstreaming, gogo-stream, animekisa, zoro.to, gogoanime.run, animefrenzy, animekisa">
  <meta name="charset" content="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta http-equiv="Content-Language" content="en">
  <meta property="og:title" content="Login - <?=$websiteTitle?>">
  <meta property="og:description" content="Anime on <?=$websiteTitle?> in HD with No Ads. Watch anime online">
  <meta property="og:locale" content="en_US">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?=$websiteTitle?>">
  <meta itemprop="image" content="<?=$banner?>">
  <meta property="og:image" content="<?=$banner?>">
  <link rel="canonical" href="<?=$websiteUrl?>">
  <link rel="alternate" hreflang="en" href="<?=$websiteUrl?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css?v=<?=$version?>" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css?v=<?=$version?>" type="text/css">
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

<body data-page="page_login">
  <div id="sidebar_menu_bg"></div>
  <div id="wrapper" data-page="page_home">
    <?php include('../_php/header.php')?>
    <div class="clearfix"></div>
    <div id="main-wrapper" class="layout-page layout-page-404">
      <div class="container">
        <div class="container-404 text-center">
          <div class="c4-medium">Login Your Account</div>
          <div class="c4-big-img">
            <form class="preform" method="post" action="">
              <div class="form-group">
                <label class="prelabel" for="email">Username Or Email address</label>
                <div class="col-sm-6" style="float:none;margin:auto;">
                  <input type="text" class="form-control" name="login"
                    placeholder="user69 or name@email.com" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="prelabel" for="password">Password</label>
                <div class="col-sm-6" style="float:none;margin:auto;">
                  <input type="password" class="form-control" name="password" placeholder="Password"
                    required="">
                </div>
              </div>
              <div class="mt-4">&nbsp;</div>
              <div class="form-group login-btn mb-0">
                <div class="col-sm-6" style="float:none;margin:auto;">
                  <button id="btn-login" name="submit" class="btn btn-primary btn-block">Login</button>
                </div>
              </div>
            </form>
          </div>
          <div class="c4-small">Don't have an account? <a href="<?=$websiteUrl?>/user/register" class="link-highlight register-tab-link"
              title="Register">Register</a></div>
          <div class="c4-button">
            <a href="/" class="btn btn-radius btn-focus"><i class="fa fa-chevron-circle-left mr-2"></i>Back to
              <?=$websiteTitle?></a>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <?php include '../_php/footer.php'; ?>
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
            echo '<script type="text/javascript">swal({title: "Error!",text: "Incorrect Email or Password!",icon: "warning",button: "Close",})</script>;';
         }
      }
      ?>
   <!--- <script type="text/javascript">
            swal({
                title: "Error!",
                text: "Username must be atleast 6 characters",
                icon: "warning",
                button: "Close",
            });
    </script>-->
    <div style="display:none;">
    </div>
  </div>
</body>

</html>