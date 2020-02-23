<?php
if($_SERVER["REQUEST_METHOD"] == "GET"){
	$data = verify($_GET["error"]);
}

function verify($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = htmlentities($data);
	return $data;
}

if ($data == '1') {
	$error = "You Cannot Access To This Page!!!";
}elseif ($data == '2'){
	$error = "Seems Like Ngrok Server Is Down. Please run 'RegeXSS.sh' Again";
}else{
	header("LOCATION: https://nirmaldahal.com.np/");
	die();
}
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
            <a class="nav-link" href="https://nirmaldahal.com.np">#Nittam</a> 
          </li>          
          <li class="nav-item"> 
            <a class="nav-link" href="https://cryptogennepal.com">CryptoGenNepal</a> 
          </li>             
          <li class="nav-item"> 
            <a class="nav-link" href="https://infosec.cryptogennepal.com">InfoSec</a> 
          </li>                                
        </ul>
      </div>

    </div>

  </nav>
	<div class="text-center text-white h-100 align-items-center d-flex py-5" style="background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(&quot;img/cover.jpg&quot;); background-position: center center, center center; background-size: cover, cover; background-repeat: repeat, repeat; background-attachment: fixed;">
		<div class="container py-5">
			<div class="row" >
				<div class="mx-auto col-lg-5 col-md-7 col-10">
					<h4><?php echo $error;?></h4>
				</div>
			</div>
		</div>
	</div>
  <div class="py-3 bg-dark text-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-6 p-3">
          <h5> <b>Others</b> </h5>
          <ul class="list-unstyled">
            <li> <a href="https://nirmaldahal.com.np" target="_blank">#Nittam</a> </li>
            <li> <a href="https://cryptogennepal.com" target="_blank">CryptoGen Nepal</a> </li>
            <li> <a href="https://infosec.cryptogennepal.com" target="_blank">InfoSec - CryptoGen</a> </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 p-3">
          <h5> <b>About</b> </h5>
          <p class="mb-0">Inspired By <a href="https://xsshunter.com" target="_blank">XSSHunter</a><br/>#Made4Security<br/>Made In Nepal</p>
        </div>
        <div class="col-lg-3 col-md-6 p-3">
          <h5> <b>Follow Me</b> </h5>
          <div class="row">
            <div class="col-md-12 d-flex align-items-center justify-content-between my-2"> 
              <a href="https://facebook.com/TheNittam" target="_blank">
                <i class="d-block fa fa-facebook-official text-muted fa-lg mr-2"></i>
              </a> <a href="https://instagram.com/TheNittam" target="_blank">
                <i class="d-block fa fa-instagram text-muted fa-lg mx-2"></i>
              </a> <a href="https://twitter.com/TheNittam" target="_blank">
                <i class="d-block fa fa-twitter text-muted fa-lg ml-2"></i>
              </a> </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <p class="mb-0 mt-2">© <?php echo date("Y"); ?> - TheNittam | #Nittam . All rights reserved</p>
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
</body>
</html>