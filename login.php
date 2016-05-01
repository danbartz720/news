<?php

$fileContents = file_get_contents("users.json");
	$fileArray = json_decode($fileContents, true);
	$usersMap = $fileArray["users"];

	$user = $_POST["username"];
	$pass = $_POST["password"];


	if (array_key_exists($user, $usersMap)) {
		if($usersMap[$user]["password"] == $pass){

			$successArray = array('successText' => "Login successful.",
						      	  'successCode' => 1,
						      	  'username' => $user,
						      	  'favorites' => $usersMap[$user]["favorites"]);
			echo json_encode($successArray);
		} else {
			$errArray = array('errText' => "Incorrect username and password combination.",
						      'errCode' => 1);
			echo json_encode($errArray);
		}

	} else {

		$errArray = array('errText' => "No account found for this username.",
						  'errCode' => 2);

		echo json_encode($errArray);
	}


?>