<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="UTF-8">
                <title> All Destinations </title>
                <link href="all_dest.css" rel="stylesheet">
                <link rel="stylesheet" href="leftnav.css">
                <link rel="icon" href="mini_logo.png">
        </head>
<body>
<div id="leftnav">
  <a href = "Passenger.html">
<img src="logo.png" alt="" width=200>
</a>
    <ul style="list-style-type:none; padding: 0;">
  <li><a href="Passenger.html">HOME</a></li>
  <li><a href="survey.html">DESTINATION SURVEY</a> </li>
  <li><a href="alldestinationspage2.php">ALL DESTINATIONS </a></li>
  <li><a href="forum.php">FORUM </a></li>
  <li> <a href="contactpage.html">CONTACT US</a></li>
</ul>  
</div>

<div id="content">
 <img src="otherpages_motto.png" alt="Passenger" width=90%>
 <h1>TOP DESTINATIONS</h1>
  <table id="destinations">
	<?php
	//use MySQL to get destinations
	$server = "spring-2021.cs.utexas.edu"; 
	$user   = "cs329e_bulko_aes4693";	
	$pwd    = "door4Along3Enough"; 
	$dbName = "cs329e_bulko_aes4693";  
	$mysqli = new mysqli ($server,$user,$pwd,$dbName);
	
	$command = "SELECT name, location, htmlPage, photo, rating FROM destinations";
	$result = $mysqli->query($command);
	$count = 0;
	echo "<table id='destinations'>";
	while ($row = $result->fetch_assoc()){
		$dest = $row["name"];
		$photo = $row["photo"];
		$page = $row["htmlPage"];
		$rating = $row['rating'];
		$ratingStr = str_repeat("&#9733;", intval($rating));	
	if ($count % 4 == 0){
		if ($count != 0){
			echo "</tr>";
		}
		echo "<tr>";
	}
	$count += 1;
	echo "<td><a href='$page'><img height='150' width='150' src='dest_images/$photo'><br>$dest</a><br><span style='font-size:20pt; color:#fcba03'>$ratingStr</span></td>";
	}
	echo "</table>";
	 ?>

</div>
</body>
</html>
