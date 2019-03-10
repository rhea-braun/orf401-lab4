<?php  // Use the <?php command so the server realizes this is PHP code and not HTML

echo '
<html>
  <head>
    <title> ORF 401: Lab #2 - PHP - Spring 2018 </title>
  </head>
  <body bgcolor="white" text="black">
    <center>
';

  // Set the variable $q equal to whatever follows the "?query=" in the URL
  $q = $_GET["query"];

  if (!$q){  // If the "query" line is blank, display the search page

  echo '
    <table border="0" width="700" >
      <tr>
        <td>Join <I>The HandyRides</I> Community! <br> <a href="newMember.html"><b> Register </b></a></td>
        <td align="right">Already a Member? Sign In: </td>
        <td> </td>
        <td align="right">
          <form action="login.php" method="post">
            <p>
              <label for="email">Email:</label>
              <input type="text" name="Email"><br />
              <label for="pass">Password:</label>
              <input type="password" name="Pass"><br />
              <input type="submit" value="Sign In"> 
            </p>
          </form>
        </td>
      </tr>
    </table>
    <br />
    <h3>The HandyRides</h3>
    <img src ="logo.jpg", ALIGN = middle>
    <br /><br />
    <p>Search by origin/destination:<p/>
    <form action="isindexSearch.php" method="get">
      <input type="text" name="query" />
      <input type="submit"  value="Search" />
    </form>
  ';

  } else { // In this case, else means that there was some kind of data passed to the PHP script in the URL

        echo '
        <img src ="logo.jpg", align="middle" />
        ';

        // Connecting database
        include ("connectDb.php");

        $sqlt = "SELECT * FROM ridersdb WHERE Origin = '$q' OR Destination = '$q' ";
        $result = mysqli_query($conn, $sqlt);

        // See if we get an OK result
        if (!$result) {
            die("SQL Error Getting User Information: " . mysqli_error($conn));
        } else {
          $found = number_format(mysqli_num_rows($result));
        }

        if ($found>0) {
          echo '
            <h3>How about?</h3>
            <center>
              <table bgcolor="white" border="1" cellspacing="2" cellpadding="4" width="60%">
                <tr bgcolor="white">
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Origin</th>
                  <th>Destination</th>
                  <th>Departure Date</th>
                  <th>Departure Time</th>
                  <th>Has Car</th>
                  <th>Available Seats</th>
                </tr>
          ';

          while($row=mysqli_fetch_array($result)) {
            echo '
              <tr>
                <td align="center">' . $row["fName"] . '</td>
                <td align="center">' . $row["lName"] . '</td>
                <td align="center">' . $row["Origin"] . '</td>
                <td align="center">' . $row["Destination"] . '</td>
                <td align="center">' . $row["dDate"] . '</td>
                <td align="center">' . $row["dTime"] . '</td>
                <td align="center">' . $row["Hascar"] . '</td>
                <td align="center">' . $row["Seats"] . '</td>
              </tr>
            ';   
          }

          echo '
            </table>
          </center>
          <h3>Thanks for using <em>The HandyRides</em>!</h3>
          ';

        } else {
          echo '
          <h3>No related origin/destination found. Search again?</h3>
          ';
        }

        echo '
        <p>Didn\'t find what you were looking for? Try again:
        
        <br/>

        <form action="isindexSearch.php" method="get">
          <input type="text" name="query" />
          <input type="submit"  value="Search" />
          <br /><br />
          <a href="isindexSearch.php"> Return to Homepage </a>
        </form>
        ';

     }

echo '
    </center>
  </body>
</html>
';

