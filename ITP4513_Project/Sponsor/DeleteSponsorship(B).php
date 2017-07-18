<?php

  require_once("../dbinfo.php");

  $sql="DELETE FROM sponsorrecord 
            WHERE $_GET[SponsorID] = SponsorID AND
                  $_GET[RegID] = RegID AND
                  $_GET[CharityID] = CharityID
                  $_GET[Amount] = Amount";

  $result = mysqli_query($connection, $sql);

  if (mysqli_affected_rows($connection)>0){
    echo "A record is updated successfully!";
    header("Location: UpdateSponsor(A).php");
  }else {
    echo "Error: failed to update a record!";
  }

    
?>
