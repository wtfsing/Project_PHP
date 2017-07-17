<script>
function goBack() {
    window.history.back();
}
</script>
<?php

  require_once("../dbinfo.php");

  $sql="UPDATE `runner`
        SET `Password` = '$_GET[Password]',
            `FirstName` = '$_GET[FirstName]',
            `LastName` = '$_GET[LastName]',
            `Gender` = '$_GET[Gender]',
            `DateOfBirth` = '$_GET[DateOfBirth]',
            `Email` = '$_GET[Email]',
            `Country` = '$_GET[Country]',
            `ProfilePicture` = '$_GET[ProfilePicture]'
        WHERE `RunnerID` = '$_GET[RunnerID]'";

  $result = mysqli_query($connection, $sql);

  if (mysqli_affected_rows($connection)>0){
    echo "A record is updated successfully!";
    ?><p><button onclick="goBack()">Return</button></p><?php
    header("Location: UpdateRunner(A).php");
  }else {
    echo "Error: failed to update a record!";
  }

?>
