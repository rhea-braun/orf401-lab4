<?php

  // Connect to the database for the entry of the CSV stuff into the database.
  $dbhost = "localhost";
  $dbuser = "twv_travisv";     // CHANGE IT TO YOUR DATABASE USER NAME
  $dbpass = "twv_password";            // CHANGE IT TO YOUR DATABASE PASSWORD
  $dbname = "twv_lab2";     // CHANGE IT TO YOUR DATABASE NAME
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ("Error connecting to mysql");
      
?>
