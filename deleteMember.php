<?php

echo '
<html>
  <head>
    <title>Unregister from The HandyRides</title>
  </head>

  <body>
    <center>
';

  //get variables
  $email = $_POST["Email"];
  $pass = $_POST["Pass"];

  if(!$pass){
    echo '
      <p>Are you sure you wish to leave The HandyRides Community?</p>
      <p>Please confirm your password below:</p>
      <form action="deleteMember.php" method="post">
        <label for="pass">Password: </label>
        <input type="password" name="Pass" />
        <br />
        <input type="hidden" name="Email" value=' . $email . ' />
        <br />
        <input type="submit" value="Unsubscribe" /> 
      </form>
      <br />
      <a href="isindexSearch.php"> Return to Homepage </a>
    ';
  } else {
    include ("readDb.php");

    if ($pass == $passdB) {
      include ("connectDb.php");

      $sql = "DELETE FROM ridersdb WHERE Email = '$email'";
      $result = mysqli_query($conn, $sql);

      if (!result) {
        echo '
        <font color="#FF0000"> <b><i> Error. Please Try Again. </b></i></font>
        ';
      } else {
        echo '
        <font color="#00FF00"> Unregistered from The HandyRides. We hope you will reconsider us in the future.</font>
        <meta http-equiv="refresh" content="3; url=isindexSearch.php" />
        ';
      }

      mysqli_close($conn);

    } else {
      // login the user
      include("login.php");
    }
  }

echo '
    </center>
  </body>
</html>
';

?>