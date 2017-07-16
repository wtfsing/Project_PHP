<html>
<head>
  <title>Create And Manage Events</title>
</head>
<body>
  <h3>Create And ManageEvents</h3>
  <form action="CreateAndManageEvents.php" method="post">

    <input type="hidden" name="EventID" value="test" >
    Event Name
    <input type="text" name="Name" required="required" ><br><br>
    Total Distance
    <input type="number" name="Distance" required="required" ><br><br>
    Date of Event
    <input type="date" name="DateOfEvent" required="required" ><br><br>
    Time Start
    <input type="time" name="TimeStart" required="required" ><br><br>
    Price
    <input type="number" name="Price" required="required" ><br><br>

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


if(!empty($EventID)){
  $sqlCheckEventName="SELECT * From `event` WHERE `Name`='$Name'";
  $resultCheckEventName=mysqli_query($connection,$sqlCheckEventName);

  if (mysqli_num_rows($resultCheckEventName) > 0){
    echo "<h3>Record already exist!</h3>";
  }else {
    $sqlNewEvent="INSERT INTO `event`(`EventID`,`Name`,`Distance`,`DateOfEvent`,`TimeStart`,`Price`) VALUES
     ('$EventID','$Name','$Distance','$DateOfEvent','$TimeStart','$Price')";
     echo "<h3>A record is added successfully</h3>";
    $resultNewEvent=mysqli_query($connection,$sqlNewEvent);
  }
}
 ?>
