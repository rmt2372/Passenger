<?php
	$username = $_GET['username'];
	$password = $_GET['password'];
	$mysqli = new mysqli('spring-2021.cs.utexas.edu', 'cs329e_bulko_aes4693', 'door4Along3Enough', 'cs329e_bulko_aes4693');

	$command = "SELECT * FROM passengerLogin WHERE
		username = '$username'";
	$result = $mysqli->query($command);

	if ($result->num_rows === 0){
		//username and password not found in table - need to add
		$command = "INSERT INTO passengerLogin VALUES ('$username', '$password')";
		$result = $mysqli->query($command);
		setcookie("login", $username, time()+ 1200, "/");
		session_start();
		//can set header location
		echo "Success!";

	} else{
		//username already exists
		echo "This username has already been taken! Please choose another one.";
	}
?>
