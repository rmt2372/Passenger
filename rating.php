<?php
	$dest =  trim($_GET['dest']);
	$stars = trim($_GET['stars']);
if ($_COOKIE['login'] == ''){
		echo "Thank you for your feedback! Please <a href='login.php'>log in</a> or <a href = 'register.html'> create a new account </a> to save your rating.";
	}else {

		$username = $_COOKIE['login'];
		$mysqli = new mysqli('spring-2021.cs.utexas.edu', 'cs329e_bulko_aes4693', 'door4Along3Enough', 'cs329e_bulko_aes4693');
		
		// check if user has already left a rating for this destination
		$command = "SELECT * FROM destRatings WHERE username='$username' AND dest='$dest'";
		$result = $mysqli->query($command);
		
		if ($result->num_rows === 0){
			// user has not already left a rating here!
			$command = "INSERT INTO destRatings(username, dest, stars) VALUES ('$username', '$dest', $stars)";
			$result = $mysqli->query($command);
			if ($stars <=3){
				echo "Thank you for your rating $username! Your feedback helps make our content better!";
			} else{
			echo "Thank you for your rating, $username! We're glad you enjoyed $dest!";
			}
		} else{
			// user has already left a rating here
			$command = "UPDATE destRatings SET stars=$stars WHERE username='$username' AND dest = '$dest'";
			$result = $mysqli->query($command);
			if ($stars <=3){
				echo "Your rating has been updated. Thank you for your continued feedback, $username! Your responses help make our content better.";
			}
			else{
				echo "Your rating has been updated. Thank you for your feedback, $username! We're glad you enjoyed $dest!";
			}
		}	
		
}
?>
