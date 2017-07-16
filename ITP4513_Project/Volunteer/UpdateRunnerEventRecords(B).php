<?php

  require_once("dbinfo.php");

  $connection=mysqli_connect($serverName,$userName,$password,$dbName);

  if(!$connection){
    die("connection fail".mysqli_connect_error());
  }

  $sql="UPDATE `eventregister`
        SET `CheckInTime` = '$_GET[CheckInTime]',
            `FinishTime` = '$_GET[FinishTime]',
            `TopSpeed` = '$_GET[TopSpeed]'
        WHERE `RegID` = '$_GET[RegID]'";

  $result = mysqli_query($connection, $sql);

  if (mysqli_affected_rows($connection)>0){
    echo "A record is updated successfully!";
    header("Location: UpdateRunnerEventRecords(A).php");
  }else {
    echo "Error: failed to update a record!";
  }


?>
