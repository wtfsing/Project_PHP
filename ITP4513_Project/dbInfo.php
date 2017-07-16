<?php
//require, must use this connection
  $hostname = "127.0.0.1";
  $database = "projectDB";
  $username = "root";
  $password = "";

  $connection = mysqli_connect($hostname, $username, $password, $database);

  if(!$connection){
    die("Connection Fail.". mysqli_connect_error());
  }
  ?>
