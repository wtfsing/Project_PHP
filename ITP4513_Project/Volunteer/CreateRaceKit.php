<html>
<head>
  <title>CreateRaceKit</title>
</head>
<body>
  <h3>CreateRaceKit</h3>
  <form action="CreateRaceKit.php" method="post">

    <input type="hidden" name="RaceKitID" value="test" >
    Name
    <input type="text" name="Name" required="required" ><br><br>
    Description
    <input type="text" name="Description" required="required" ><br><br>
    Price
    <input type="text" name="Price" required="required" ><br><br>
    Photo
    <input type="text" name="Photo" required="required" ><br><br>


    <input type="submit">
    <input type="reset" value="Reset">
  </form>

</body>
</html>


<?php
  require_once("../dbinfo.php");
  extract($_POST);
  $connection=mysqli_connect($serverName,$userName,$password,$dbName);

  if(!$connection){
    die("connection failed".mysqli_connect_error());
  }




if(!empty($RaceKitID)){
  $sqlCheckracekit="SELECT * From `racekitchoice` WHERE `Name`='$Name'";
  $resultCheckracekit=mysqli_query($connection,$sqlCheckracekit);

  if (mysqli_num_rows($resultCheckracekit) > 0){
    echo "<h3>Record already exist!</h3>";
  }else {
    $sqlCheckEventID="SELECT * From `event`";
    $resultCheckEventID=mysqli_query($connection,$sqlCheckEventID);

    $EventID = mysqli_num_rows($resultCheckEventID);
    $sqlNewEvent="INSERT INTO `racekitchoice`(`RaceKitID`,`Name`,`Description`,`Price`,`Photo`,`EventID`) VALUES
     ('$RaceKitID','$Name','$Description','$Price','$Photo','$EventID')";
     echo "<h3>A record is added successfully</h3>";
    $resultNewEvent=mysqli_query($connection,$sqlNewEvent);
  }
}
 ?>
