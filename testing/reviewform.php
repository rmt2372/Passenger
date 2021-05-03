

<?php

 error_reporting(E_ALL);
   ini_set("display_errors", "on");

  // Optionally store the parameters in variables
  $user   = $_GET["user"];
  $review    = $_GET["review"];
$destination    = $_GET["destination"];

  // For debugging only
   echo "User: <code>".$user."</code><br>";
   echo "Review: <code>".$review."</code><br>";
   echo "Destination <code>".$destination."</code><br><br>";

?>
