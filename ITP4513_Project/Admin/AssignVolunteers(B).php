<?php
  require_once("../dbinfo.php");

  $sql="UPDATE `runner`
        SET `VolunteerID` = '$_GET[VolunteerID]'
        WHERE `RunnerID` = '$_GET[RunnerID]'";
  $result = mysqli_query($connection, $sql);

  if (mysqli_affected_rows($connection)>0){
    echo "A record is updated successfully!";
  }else {
    echo "Error: failed to update a record!";
  }
  ?>
  <br><br><form action="ManageVandR.php"><button>Return</button></form>
