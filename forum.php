<html lang="en">

<head>
	<title>Community Forum</title>
	<meta charset="UTF-8">
	<meta name="description" content="Forum">
	<link href="commforum.css" rel="stylesheet">
	<link rel="icon" href="mini_logo.png">
</head>

<body>
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

<table id = "table2">
	<tr>
	<td id="dest">
		<h3> Bali, Indonesia </h3>
			<p> "Bali one of the best natural places in the world, I cant' explain Bali in a word. Bali is such a great place to visit and a bucket list destination. You will see the REAL nature here. And the 5 star hotels makes it more wonderful. Bali is covered with most amazing trees and and travelers from all over the world. Pack lots of light clothes it gets HOT. OH! and sunscreen of course." - John P. (Austin, TX) <p>
<tr><td><br /></td></tr>
<tr><td><br /></td></tr>
	<td id="dest">
		<h3> Machu Picchu, Peru </h3>
			<p> "There are three main routes to Machu Picchu. There's the popular Inca Trail, the lesser traveled Lares Trek, and the one we chose, The Salkantay Trek. Each of these has a variation of days and you basically just start further up in the trail, or make a shortcut to trim off one day. Can't go wrong with either honestly, it was beautiful!" - Alana S. (Brooklyn, NY) <p>
<tr><td><br /></td></tr>
<tr><td><br /></td></tr>
	<td id="dest">
		<h3> Santorini, Greece </h3>
			<p> "This place is totally awesome and is definitely a must see. Def one of the most beautiful places in Europe with cool White caldera views, amazing sunsets, great beaches and awesome food. Stay in or near Fira and rent a moto to get you round the island. Best swimming is at the amazing red beach or little known rock beach at the bottom of the cliff from Oia (some good cliff jumping here too). Parissa beach has loads of good bars and restaurants and watersports." - Sam N. (Brisbane, Australia)  <p>
<tr><td><br /></td></tr>
<tr><td><br /></td></tr>
	<td id="dest">
		<h3> Nosy Be, Madagascar</h3>
			<p> “Nosy Be?” Is that a typo for “Noisy Bee?” Nope. It means “big island” and it is just that; a large island off the northwest coast of Madagascar. Audiophiles should visit in May, to experience the four-day Donia Music Festival. IT'S AWESOME." - Drew J. (Palo Alto, CA)<p>
<tr><td><br /></td></tr>
<tr><td><br /></td></tr>
</table>


</body>
</html>

