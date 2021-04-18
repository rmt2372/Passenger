<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="description" content="Login">
	<link href="commforum.css" rel="stylesheet">
	<link rel="icon" href="mini_logo.png">
</head>

<body>

	<h2>Already Signed Up? Login!</h2>

	<?php
		//open file 
		//intialize success to false
		$myFile = fopen("passwd.txt", "r");
		$success = false;
		while (!feof($myFile)) {
			$line = fgets($myFile);
			if (trim($line) != "") {

				//get id and pw
				//does file match form
				$pieces = explode(":", $line);
				if (trim(explode(":", $line)[0]) == $_POST["userName"]
					&& trim(explode(":", $line)[1]) == $_POST["password"]) {

					// if the id and password match what was submitted in the form, login successful
					$success = true;
				}
			}
		}
		//close file
		fclose("myFile");

		//login
		if ($success == true) {
			// set cookie, the timer at 20 minute
			setcookie("login", true, time() + 1200, "/");
			session_start();
			//can set header location
			header("Location: ".$_SESSION["page"]);

		//check validity of login
		} else if ($_POST["userName"] != null and $_POST["password"] != null) {
			echo '<script type="text/JavaScript"> alert("Invalid Account. Please create an account to continue!") </script>';
		}
	?>

	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
<br>
	<table style="margin-left:auto;margin-right:auto;">

		
		<tr>
			<td>Username or Email: </td>
			<td> <input type="text" name="userName"/></td>
		</tr>

		<tr><td><br /></td></tr>

		<tr>
			<td>Password: </td>
			<td> <input type="text" name="password"/></td>
		</tr>

	</table>
			<div>
			<p> <input type="submit" id="button" value="Login"/></p>
			<p> <a href="register.php">Create an account</a></p>
		</div>
	</form>
	<p><b> Forgot your password?</b><br> <br>
	Send us an e-mail at <br><em> passenger-customerservice@gmail.com</em> </p>
</body>
</html>