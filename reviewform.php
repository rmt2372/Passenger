<?php
    $server = "spring-2021.cs.utexas.edu";
    $user   = "cs329e_bulko_rmt2372";
    $pwd    = "Wash9runway*Organ";
    $dbName = "cs329e_bulko_rmt2372";
    $mysqli = new mysqli($server, $user, $pwd, $dbName);
    // if ($mysqli->connect_error) {
    //     die("Connection Failed " . $mysqli->connect_error);
    // } else {
    //     echo "<p>Connected</p>";
    // }
    //Select Database
    $mysqli->select_db($dbName) or die($mysqli->error);
    
    // Retrieve data from Query String
    $name = $_GET['name'];
    $text = $_GET['text'];
    $destination = $_GET['destination'];
    // echo "<p>" .$name . "</p>";
    // echo "<p>" .$text . "</p>";
    // echo "<p>" .$destination . "</p>";


    // Escape User Input to help prevent SQL Injection
    $name = $mysqli->real_escape_string($name);
    $text = $mysqli->real_escape_string($text);
    $destination = $mysqli->real_escape_string($destination);
    $query = "INSERT INTO reviews VALUES ('$name', '$destination', '$text')";       
    $result = $mysqli->query($query);
   
    // $display_string = "<table id = 'table2'>";
    $query = "SELECT * FROM reviews";
    $result = $mysqli->query($query);
    $display_string = "<table id = 'table2'>";
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $display_string .= "<tr><td id='dest'><h3>$row[destination]</h3><p>\"$row[text]\" &nbsp;&nbsp; - $row[reviewName]</p><tr><td><br /></td></tr>";
    }
    $display_string .= "</table>";
    echo "<!DOCTYPE html><html lang='en'><head><link href='commforum2.css' rel='stylesheet'></head><body>$display_string</body></html>";

?>