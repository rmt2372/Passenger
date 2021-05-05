<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="UTF-8">
                <title> Contact Us </title>
                <link href="contact.css" rel="stylesheet">
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
  <li><a href="alldestinationspage2.html">ALL DESTINATIONS </a></li>
  <li><a href="forum.php">FORUM </a></li>
  <li> <a href="contactpage.html">CONTACT US</a></li>
</ul>  
</div>

<div id="content">
 <img src="otherpages_motto.png" alt="Passenger" width=90%>
	<h1>Already signed up? Login!</h1>
<?php
	$username = $_POST['user'];
	$password = $_POST['pass'];
	 $mysqli = new mysqli('spring-2021.cs.utexas.edu', 'cs329e_bulko_aes4693', 'door4Along3Enough', 'cs329e_bulko_aes4693');

        $command = "SELECT * FROM passengerLogin WHERE
                username = '$username' AND password = '$password'";
        $result = $mysqli->query($command);

	if (strlen($username) != 0){
		//something  entered
	if ($result->num_rows === 0){
		//username and password not found in table
		echo '<span style="color:red">Invalid account. Please create an account to continue.</span>';

        } else {
		setcookie("login", true, time() + 1200, "/");
		session_start();
		//can set header location
		echo "kjsdjghsdkjgh";
		header('Location: forum.php');
	}
	}

?>
<form method="POST" action="login.php">
<table style = "text-align:left; margin:auto;">
	<tr>
		<td style = "padding:10px"> username: </td>
		<td><input name="user" id="user"></td>
	</tr>
	<tr>
		<td style = "padding:10px"> password:</td>
		<td><input name="pass" id="pass" type="password"></td>
	</tr>
</table>
<input type="submit" value="Login">
</form>
<a href="register.html"><input type="button" value="Create a new account"></a>
<p><b> Forgot your password?</b><br> <br>
	Send us an e-mail at <br><em> passenger-customerservice@gmail.com</em> </p>
</div>
</body>
</html>
