<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="UTF-8">
                <title> Destination Survey </title>
                <link href="all_dest.css" rel="stylesheet">
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
<h2>DESTINATIONS FOR YOU</h2>
<?php
	$location =  $_POST["location"];
	$coast = $_POST["coast"];
	$activities = $_POST["activities"];
	$risk =  $_POST["risk"];
	
	echo '<p>For ';
	if ($risk == "yes"){
		echo "a risk-taker ";
	} else{
		echo "an easygoing traveler ";
	}
	echo "that loves ";
	if (count($activities) >1){
		for ($i = 0; $i<count($activities); $i++){
			if ($i == (count($activities) - 2)){
				echo "$activities[$i] and ";
			}else{
				echo $activities[$i].", ";
			}
		}
	}
	else{
		echo $activities[0].", ";
	}
	
	echo "we recommend these ";
	echo $location." destinations";
	if ($coast == "yes"){
		echo " near the coast:</p>";
	}else{
		echo ":</p>";
	}
	
##########
//use MySQL to get destinations
$server = "spring-2021.cs.utexas.edu"; 
$user   = "cs329e_bulko_aes4693";
$pwd    = "door4Along3Enough"; 
$dbName = "cs329e_bulko_aes4693";  
$mysqli = new mysqli ($server,$user,$pwd,$dbName);

// If it returns a non-zero error number, print a
// message and stop execution immediately
if ($mysqli->connect_errno) {
	die('Connect Error: ' . $mysqli->connect_errno .
		": " . $mysqli->connect_error);
}
//choose destinations by location
if ($location == "USA"){
	$command = "SELECT * FROM destinations WHERE 
		location = \"US\"";
}else{
	$command = "SELECT * FROM destinations WHERE 
		location = \"Non-US\"";
}
//choose coast preference
if ($coast == "yes"){
	$command = $command." AND coast = \"y\"";
} else{
	$command = $command." AND coast = \"n\"";
}

// check for activity preference
$act = "";
for ($i=0; $i<count($activities); $i++){
	$a = "";
	if ($i != 0){
	$a = $a." OR ";	
	}
	if ($activities[$i] == "city touring"){
		$a = $a."city_touring = \"y\"";
	} else {
		$a = $a.$activities[$i]."=\"y\"";
	}
	$act = $act.$a;
}
$command = $command." AND (".$act.")";

//risk-taker
if ($risk == "yes"){
	$command = $command." AND risk = \"y\"";
} else{
	$command = $command." AND risk = \"n\"";
}


$result = $mysqli->query($command);

//if no answers available
if ($result->num_rows === 0){
	echo "<span style='color:blue'>There are no destinations currently available that fit your preference. <a href='survey.html'> Take the survey again?</a></span>";
}
//show results
echo "<table id='destinations'> <tr>";
while ($row = $result->fetch_assoc()) {
	$dest = $row["name"];
	$photo = $row["photo"];
	$page = $row["htmlPage"];
print <<<TR
	<td><a href='$page'><img height='150' width='150' src='dest_images/$photo'><br>$dest</a></td>
TR;

}
echo "</tr></table>";
?>
</div>
</body>
</html>
