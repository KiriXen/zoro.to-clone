<?php 
require('../_config.php');
$id = $_GET['id'];

$json = file_get_contents("$api/vidcdn/watch/$id");
$json = json_decode($json, true);

if (!isset($json['sources']) || empty($json['sources'])) {
    if (isset($json['sources_bk']) && !empty($json['sources_bk'])) {
        $sources = $json['sources_bk'];
    } else {
        echo "No playable sources found.";
        exit;
    }
} else {
    $sources = $json['sources'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Adless Player</title>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
<script src='<?=$websiteUrl?>/files/js/jwplayer.js'></script>
<style type="text/css">
        body {background-color: #000;}
    </style>
</head>
<body>
<div id="myElement"></div>
<script type="text/javascript">
  var playerInstance = jwplayer("myElement");
  playerInstance.setup({
      sources: <?php echo json_encode($sources); ?>,  
      autostart: false,  
      image: "",

      abouttext: "<?=$websiteTitle?>",
      aboutlink: "<?=$websiteUrl?>"             
  });

</script>
</body>
</html>
