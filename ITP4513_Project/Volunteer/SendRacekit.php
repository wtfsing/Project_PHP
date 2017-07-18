<?php
    session_start();
  require_once("../dbinfo.php");
  $VolunteerID =  $_SESSION['VolunteerID'];

  $sql="SELECT * FROM `EventRegister` WHERE `RaceKitSent` = '0'";
  $result = mysqli_query($connection, $sql);
  if (mysqli_num_rows($result)>0){
    $table= <<< EOF
      <table border="1">
        <tr>
          <th>Action</th>
          <th>RaceKitID</th>
          <th>RunnerID</th>
          <th>RaceKitSent</th>
        </tr>
EOF;
  echo $table;

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td><a href='SendRacekit.php?RegID=$row[RegID]'>Set Send</a></td>
            <td>$row[RaceKitID]</td>
            <td>$row[RunnerID]</td>
            <td>$row[RaceKitSent]</td>
          </tr>
          ";
        }
        echo "</table>";
        } else {
          echo "All of the racekit has been sent!";
        }

    if (isset($_GET["RegID"])){
      $sql="UPDATE `eventregister` SET `RaceKitSent`='1' WHERE `RegID` = $_GET[RegID]";
      $result = mysqli_query($connection, $sql);
      if (mysqli_affected_rows($connection)>0){
        header("Location: SendRacekit.php");
        echo "A record is updated successfully!";
      }else {
        echo "Error: failed to update a record!";
      }
    }

 ?>
 <br><br><form action="VolunteerFunctions.html"><button>Return</button></form>
