<?php
header("X-Frame-Options: sameorigin");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$readJSON = file_get_contents('regexss.json');

if(strlen($readJSON) == 0){
	echo "[]";
}else{
	echo $readJSON;
}
?>