<?php
header("X-Frame-Options: sameorigin");

$payload = $action = "";

// Create Files
$backendJSpayload = "../payback/sender.js";
$regexssJSON = "../triage/regexss.json";

// Action Method
$action = $_REQUEST["action"];
$payload = $_REQUEST["payload"];

if($action == "json"){
	header("Content-Type: application/json");
	header("Access-Control-Allow-Origin: *");

	if(!file_exists($regexssJSON)){
		$regJSON = fopen($regexssJSON, "w");
		fwrite($regJSON, "[]");
		fclose($regJSON);
	}

	$readJSON = file_get_contents($regexssJSON);
	if(strlen($readJSON) == 0){
		echo "[]";
	}else{
		echo $readJSON;
	}
}

if($action == "clearlog"){
	$jsonFile = @fopen($regexssJSON, "r+");
	if ($jsonFile !== false){
		ftruncate($jsonFile, 0);
		fclose($jsonFile);
	}
}

if($action == "backendpayload"){
	if(!file_exists($backendJSpayload)){
		$senderJS = fopen($backendJSpayload, "w");
		fwrite($senderJS, "");
		fclose($senderJS);
	}
	
	if(file_exists($backendJSpayload)){
		file_put_contents($backendJSpayload, $payload);
		echo "Successful !!!";
	}else{
		echo "Something Went Wrong !!!";
	}
}?>
