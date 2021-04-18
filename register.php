<html lang="en">

<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="description" content="Register">
	<link href="commforum.css" rel="stylesheet">
	<link rel="icon" href="mini_logo.png">
</head>

<body>
	<h2>Create an account. It's free!</h2>

	<?php

	//check if the form is filled out
	if ($_POST["userName"]!=null and $_POST["password"]!=null) {

		//read file
		$myFile = fopen("passwd.txt", "r");

		//set to true
		$success = true;

		//check id matches the form
		while (!feof($myFile)) {
			$line = fgets($myFile);
			if (trim($line) != "") {
				$pieces = explode(":", $line);
				if (trim(explode(":", $line)[0]) == $_POST["userName"]) {

					//make sure id is unique
					$success = false;
				}
			}
		}
		//close 
		fclose($myFile);

		// if unique username
		if ($success == true) {
			// open file and append/write 
			$myFile = fopen("passwd.txt", "a");
			fwrite($myFile, $_POST["userName"] . ":" . $_POST["password"] . "\n");
			fclose($myFile);
			//set cookie and start
			setcookie("login", true, time()+ 1200, "/");
			session_start();
			//can set header location
			header("Location: ".$_SESSION["page"]);

		// alert the user that the id needs to be unique
		} else {
			echo "<script type='text/JavaScript'>
			alert('This username has been taken. Please choose another one!');
			</script>" ;
		}
	}
	?>

	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
<br>
	<table style="margin-left:auto;margin-right:auto;">
		<tr>
			<td>Username or Email: </td>
			<td> <input type="text" name="userName" /> </td>
		</tr>
		<tr><td><br /></td></tr>
		<tr>
			<td>Password: </td>
			<td> <input type="text" name="password" /> </td>
		</tr>

	</table>
			<p> <input type="submit" id="button" name="Register" /> <p>
	</form>
</body>
</html>