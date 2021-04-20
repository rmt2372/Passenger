<?php
  # get the incoming information
  $name = $_POST["name"];
  $review = $_POST["review"];

  # Write thank you page
  print <<<REGISTRATION_RESULT
  <html>
  <head>
  <title> THANK YOU FOR YOUR REVIEW  </title>
  </head>
  <body>
  <h1> Thank You for Reviewing </h1>
  <h2> An e-mail confirmation will be sent to you. </h2>
<a href='Passenger.html'><button>Homepage</button></a>

  </body>
  </html>
REGISTRATION_RESULT;

?>