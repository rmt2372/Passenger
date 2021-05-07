<?php
	$mysqli = new mysqli('spring-2021.cs.utexas.edu', 'cs329e_bulko_aes4693', 'door4Along3Enough', 'cs329e_bulko_aes4693');	
	$new =  $_GET['new'];
	$dest = trim($_GET['dest']);
	if ($new == 'false'){
		//no new rating, don't need to update
		$command = "SELECT * from destinations WHERE name = '$dest'";
		$result = $mysqli->query($command);
		while ($row = $result->fetch_assoc()){
			echo $row['rating'];
		};
		
	}else{
		//need to update rating in destinations table
		$command = "SELECT *  from destRatings WHERE dest = '$dest'";
		$result = $mysqli->query($command);
		while ($row = $result->fetch_assoc()){
			$ratings[] = $row['stars'];	
		}
		$avgRating =  array_sum($ratings)/count($ratings);
		$command = "UPDATE destinations SET rating = $avgRating WHERE name='$dest'";
		$result = $mysqli->query($command);
		echo $avgRating;
		}
?>
