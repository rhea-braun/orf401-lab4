<?php

echo '
<html>
  <head>
    <title>Member Registration</title>
  </head>
    <body>
';

  //get variables
  $origin = $_POST["Origin"];
  $destination = $_POST["Destination"];
  $ddate = $_POST["dDate"];
  $dtime = $_POST["dTime"];
  $hascar = $_POST["Hascar"];
  $seats = $_POST["Seats"];
  $email = $_POST["Email"];

  include ("readDb.php");

  // This is needed for the login.php
  $pass = $passdB;

  include ("connectDb.php");

  $sql = "UPDATE ridersdb SET Origin='$origin', Destination='$destination', dDate='$ddate', dTime='$dtime', Hascar='$hascar', Seats='$seats' WHERE Email = '$email' ";

  $result = mysqli_query($conn, $sql);

  if ($result==1) { 
    // Login the user
    include("login.php");
  } else {
    echo '
   	<font color="#FF0000"> <b><i>Error. Please Try Again.</b></i></font> 
    ';
  }

  mysqli_close($conn);

?>

