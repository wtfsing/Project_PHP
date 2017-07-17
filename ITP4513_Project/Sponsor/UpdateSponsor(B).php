<?php

  require_once("../dbinfo.php");

  $sql="UPDATE `sponsor`
        SET `Password` = '$_GET[Password]',
            `FirstName` = '$_GET[FirstName]',
            `LastName` = '$_GET[LastName]',
            `Company` = '$_GET[Company]',
            `Email` = '$_GET[Email]'
        WHERE `SponsorID` = '$_GET[SponsorID]'";

  $result = mysqli_query($connection, $sql);

  if (mysqli_affected_rows($connection)>0){
    echo "A record is updated successfully!";
    header("Location: UpdateSponsor(A).php");
  }else {
    echo "Error: failed to update a record!";
  }


?>
