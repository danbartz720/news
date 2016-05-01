<?php 

	
	$fileContents = file_get_contents("users.json");
	$fileArray = json_decode($fileContents, true);
	$usersMap = $fileArray["users"];

	$user = $_POST["username"];
	$faves = $_POST["favorites"];


	if (array_key_exists($user, $usersMap)) {
		$fp = fopen('users.json', 'w');
		$usersMap[$user]["favorites"] = ($faves)["array"];
		$fileArray["users"] = $usersMap;
		fwrite($fp, json_encode($fileArray));
		fclose($fp);
	} else {
		//Something broke
		
	}
?>