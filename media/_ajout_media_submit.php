<?php
	include("../chromephp-master/ChromePhp.php"); 
	ChromePhp::log('Hello console!');


	$media_type = $_POST["media_type"];
	echo $media_type;

	if ($media_type == "0") {
		ChromePhp::log("media_type = 0");
	}
	elseif ($media_type == "1") {
		ChromePhp::log("media_type = 1");
	}
	elseif ($media_type == "2") {
		ChromePhp::log("media_type = 2");
	}
	elseif  ($media_type == "3") {
		ChromePhp::log("media_type = 3");
	}
	else {
		ChromePhp::log("media_type = erreur");
	}
?>