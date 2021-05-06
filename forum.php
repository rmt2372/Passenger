<html lang="en">

<head>
	<title>Community Forum</title>
	<meta charset="UTF-8">
	<meta name="description" content="Forum">
	<link href="commforum2.css" rel="stylesheet">
	<link rel="stylesheet" href="leftnav.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
	<link rel="icon" href="mini_logo.png">
</head>
<body>
	<script language = "javascript" type = "text/javascript">
		//Browser Support Code
		function ajaxFunction(server,user,pwd,dbName){
		var ajaxRequest;  // The variable that makes Ajax possible!
		
		ajaxRequest = new XMLHttpRequest();
				
		ajaxRequest.onreadystatechange = function(){
			if(ajaxRequest.readyState == 4){
				var ajaxDisplay = document.getElementById('table2');
				ajaxDisplay.innerHTML = ajaxRequest.responseText;
			} 
		}
						
		var name = document.getElementById('name').value;
		var destination = document.getElementById('destination').value;
		var text = document.getElementById('text').value;
		var queryString = "?name=" + name ;

		queryString +=  "&destination=" + destination + "&text=" + text;
		console.log(queryString);
		ajaxRequest.open("GET", "reviewform.php" + queryString, true);
		ajaxRequest.send(null);
		}

	</script>
	</div>
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

	<?php
		if (!isset ($_COOKIE["login"])) {
			session_start();
			$_SESSION["page"]="forum.php";
			//can set header location
			header("Location: login.php");
		} else {
			session_destroy();
		}
	?>
		<h2>Welcome to Passenger's Community Forum </h2>

	<br><p>Here's some of our Passengers' travel tips they have shared with us!<br><br> Have some advice to share?<br> <b>Send us an email</b> at <br> <em>passenger-advice@gmail.com!</em></p>
	<h2> REVIEW FORM </h2>
	<table style="margin-left:500px; "width = "50%">
		<form method = "POST">
			<?php
				$server = "spring-2021.cs.utexas.edu";
				$user   = "cs329e_bulko_rmt2372";
				$pwd    = "Wash9runway*Organ";
				$dbName = "cs329e_bulko_rmt2372";
				
				$mysqli = new mysqli($server, $user, $pwd, $dbName);
				$mysqli->select_db($dbName) or die($mysqli->error);
				$query = "SELECT * FROM reviews";
				$result = $mysqli->query($query);
				$display_string = "<table id = 'table2'>";
				while($row = $result->fetch_array(MYSQLI_ASSOC)) {
					$display_string .= "<tr><td id='dest'><h3>$row[destination]</h3><p>\"$row[text]\" &nbsp;&nbsp; - $row[reviewName]</p><tr><td><br /></td></tr>";
				}
				$display_string .= "</table>";
				echo "<tr><td> Enter name </td><td> <input type = 'text' name = 'name' id = 'name' size = '30' /></td></tr>";
				echo "<tr><td> Destination </td><td> <input type = 'text' name = 'destination' id = 'destination' size = '30' /></td></tr>";
				echo "<tr><td> Review </td><td>  <textarea name = 'text' id = 'text' rows = '4' cols = '36' placeholder='Write something..'></textarea></td></tr>";
				echo "<tr><td> &nbsp; </td> <td> &nbsp; </td></tr>";
				echo "<tr><td></td><td><input type = \"button\" value = 'Submit' onclick = \"ajaxFunction('$server','$user','$pwd','$dbName')\" />&nbsp;&nbsp;&nbsp;&nbsp;<input type = \"reset\" value = 'Reset' /></td></tr>";
				echo "<!DOCTYPE html><html lang='en'><head><link href='commforum2.css' rel='stylesheet'></head><body>$display_string</body></html>";
			?>

		</form>
	</table>
	<div id = 'ajaxDiv'></div>

</body>
</html>

