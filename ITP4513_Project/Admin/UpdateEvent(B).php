<?php
  require_once("../dbinfo.php");

  $sql="UPDATE `event`
        SET `Name` = '$_GET[Name]',
            `Distance` = '$_GET[Distance]',
            `DateOfEvent` = '$_GET[DateOfEvent]',
            `TimeStart` = '$_GET[TimeStart]',
            `Price` = '$_GET[Price]'
        WHERE `EventID` = '$_GET[EventID]'";

  $result = mysqli_query($connection, $sql);

  if (mysqli_affected_rows($connection)>0){
    echo "A record is updated successfully!";
  }else {
    echo "Error: failed to update a record!";
  }
?>
<br><br>
<form action="ManageEvents.php">
<button>Return</button>
</form>
