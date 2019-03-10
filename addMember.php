<?php

echo '
<html>
  <head>
    <title>Member Registration</title>
  </head>
  
  <body>
';

  //get variables
  $fname = $_POST["fName"];
  $lname = $_POST["lName"];
  $origin = $_POST["Origin"];
  $destination = $_POST["Destination"];
  $ddate = $_POST["dDate"];
  $dtime = $_POST["dTime"];
  $hascar = $_POST["Hascar"];
  $seats = $_POST["Seats"];
  $pass = $_POST["Pass"];
  $email = $_POST["Email"];

  //get variables from readDB.php
  include ("readDb.php");

  //add users now
  if ($found == 0) {

    if ($fname && $lname && $pass && $email){

      include ("connectDb.php");

      $sql = "INSERT INTO ridersdb (fName, lName, Origin, Destination, dDate, dTime, Hascar, Seats, Pass, Email) VALUES ('$fname' ,'$lname', '$origin','$destination', '$ddate', '$dtime', '$hascar', '$seats', '$pass', '$email')";

      $result = mysqli_query($conn, $sql);

      if ($result==1) {
        // login the user if just created
        include("login.php");
      } else {
 			  echo '
          <font color="#FF0000"><b><i> Error. Please Try Again.</b></i></font>
        ';
      }
               
      mysqli_close($conn);
    	
    } else {
      echo '
    		<p>You didn\'t include all the information. Please Try Again. Redirecting you to Registration. <p/>
        <meta http-equiv="refresh" content="3; URL=newMember.html">
      ';
    }

  } else {
    echo '
      <p>Email already exists. Please log-in. Redirecting you home <p/>
      <meta http-equiv="refresh" content="3; url=isindexSearch.php" />
    ';
  }

?>