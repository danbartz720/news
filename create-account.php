<?php 

	
	$fileContents = file_get_contents("users.json");
	$fileArray = json_decode($fileContents, true);
	$usersMap = $fileArray["users"];

	$user = $_POST["username"];
	$pass = $_POST["password"];


	if (array_key_exists($user, $usersMap)) {
		$errArray = array('errText' => "An account with this username already exists. Please try another username, or login to your existing account.",
						  'errCode' => 1);
		echo json_encode($errArray);
	} else {
		$fp = fopen('users.json', 'w');
		$newusr = array('username'=> $user, 'password'=> $pass);

		$usersMap[$user] = $newusr;
		$fileArray["users"] = $usersMap;
		fwrite($fp, json_encode($fileArray));
		fclose($fp);

		$succArray = array('successCode' => 1,
						   'successText' => "User account created, please login with your new username and password.");
		echo json_encode($succArray);
	}
?>