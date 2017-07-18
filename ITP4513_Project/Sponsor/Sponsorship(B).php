<?php

  require_once("../dbinfo.php");

  $sql="INSERT INTO sponsorrecord (SponsorID, CharityID, RegID, Amount) 
            VALUES ($_GET[SponsorID], $_GET[CharityID], $_GET[RegID], $_GET[Amount]";

  $result = mysqli_query($connection, $sql);

  if (mysqli_affected_rows($connection)>0){
    echo "A record is updated successfully!";
    header("Location: Sponsorship(A).php");
  }else {
    echo "Error: failed to update a record!";
  }


?>
