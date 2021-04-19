<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="UTF-8">
                <title> Destination Survey </title>
                <link href="all_dest.css" rel="stylesheet">
                <link rel="icon" href="mini_logo.png">
                <script src="https://ajax.googleapis.com/ajax/libs/
				jquery/3.6.0/jquery.min.js"></script>
				<script src="survey.js"></script>
        </head>
<body>
<div id="leftnav">
  <a href = "Passenger.html">
<img src="logo.png" alt="" width=200>
</a>
    <ul style="list-style-type:none; padding: 0;">
  <li><a href="Passenger.html">HOME</a></li>
  <li><a href="survey.html">DESTINATION SURVEY</a> </li>
  <li><a href="alldestinationspage2.html">ALL DESTINATIONS </a></li>
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
	
?>

<p style = "font-size:8pt">Passenger is still under construction. In the meantime, here are some of our most popular destinations!</p>
  <table id="destinations">
    <tr>
      <td><a href="Anchorage.html"><img height="150" width="150" src="dest_images/anchorage.jpeg"><br>Anchorage, Alaska</a></td>
      <td><a href="Andaman.html"><img height="150" width="150" src="dest_images/andaman-2.jpeg"><br>Andaman Islands, India</a></td>
      <td><a href="Bali.html"><img height="150" width="150" src="dest_images/adLRxQj_700b.jpg"><br>Bali, Indonesia</a></td>
      <td><a href="Edinburgh.html"><img height="150" width="150" src="dest_images/edinburgh.jpeg"><br>Edinburgh, Scotland</a></td>
    </tr><tr>
</table>
</div>
<div id="footer">
Page last updated 04/04/2021
</div>
</div>
</body>
</html>
