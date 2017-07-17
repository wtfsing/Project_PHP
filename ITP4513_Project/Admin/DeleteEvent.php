<?php

  require_once("../dbinfo.php");

  $eventregistersql="DELETE FROM `eventregister` WHERE `EventID`='$_GET[EventID]'";
  $eventregisterresult = mysqli_query($connection, $eventregistersql);

  $eventsql="DELETE FROM `event` WHERE `EventID`='$_GET[EventID]'";
  $eventresult = mysqli_query($connection, $eventsql);

  //print_r(mysqli_fetch_assoc($result));
  if (mysqli_affected_rows($connection) > 0 ) {
    echo "Event and EventRegister information deleted!";
  }else {
    echo "Error: Failed to remove record";
  }
?>
<p>Return to Manage Events:</p>
<form action="ManageEvents.php">
 <button>Return</button>
</form>
