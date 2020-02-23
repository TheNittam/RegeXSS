<?php

header("X-Frame-Options: sameorigin");

$url = $_SERVER['HTTP_HOST'];
$req = file_get_contents('http://127.0.0.1:4040/api/tunnels');
$json = json_decode($req,true);
$ngrokURL = $json['tunnels'][0]['public_url'];

if($url !== "127.0.0.1:3333"){
  echo "You Cannot Access This Page!!!";
  header("LOCATION: ../error.php?error=1");
  die();
}elseif(strlen($ngrokURL) == 0){
  header("LOCATION: ../error.php?error=2");
  die();
}else{
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/theme.css" type="text/css">
  <link rel="stylesheet" href="css/custom.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/dataTables/dataTables.bootstrap4.min.css">
  <title>RegeXSS v1 (Beta) | TheNittam</title>
  <meta name="keywords">
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
    <div class="container"> 
      <a class="navbar-brand" href="/">
        <i class="fa fa-spinner fa-spin fa-fw margin-bottom fa-lg"></i>
        <b>RegeXSS </b><small style="color: #555;">By TheNittam</small>
      </a> 
      <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar10">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar10">
        <ul class="navbar-nav ml-auto">           
          <li class="nav-item"> 
            <a class="nav-link" href="regexssed.php">RegeXSS'ed <span id="triagger" class="badge badge-primary badge-pill" ></span></a> 
          </li>                
          <li class="nav-item"> 
            <a class="nav-link" href="payloads.php">Payloads</a> 
          </li>          
          <li class="nav-item"> 
            <a class="nav-link" target="_blank" href="http://127.0.0.1:4040/inspect/http">Ngrok Inspect</a> 
          </li>
        </ul>
      </div>

    </div>

  </nav>
  
<?php }?>