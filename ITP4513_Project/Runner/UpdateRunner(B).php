<?php

  require_once("dbinfo.php");

  $connection=mysqli_connect($serverName,$userName,$password,$dbName);

  if(!$connection){
    die("connection fail".mysqli_connect_error());
  }

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
    header("Location: UpdateRunner(A).php");
  }else {
    echo "Error: failed to update a record!";
  }


?>