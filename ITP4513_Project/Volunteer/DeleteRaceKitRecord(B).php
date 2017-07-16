<?php

  require_once("../dbinfo.php");

  $sql="DELETE FROM `racekitchoice` WHERE `RaceKitID`='$_GET[RaceKitID]'";

  $result = mysqli_query($connection, $sql);

  //print_r(mysqli_fetch_assoc($result));
  if (mysqli_affected_rows($connection) > 0) {
    header("Location: DeleteRaceKitRecord(A).php");
  }else {
    echo "Error: Failed to remove record";
  }


?>
