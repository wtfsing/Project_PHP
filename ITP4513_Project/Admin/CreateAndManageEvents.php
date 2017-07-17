<html>
<style>
fieldset {
    display: block;
    margin-left: 2px;
    margin-right: 2px;
    padding-top: 0.35em;
    padding-bottom: 0.625em;
    padding-left: 0.75em;
    padding-right: 0.75em;
    border: 2px groove (internal value);
    width: 500px;
    clear: both;
}
</style>
<style type="text/css">
.container {
    width: 500px;
    clear: both;
}
.container input {
    width: 100%;
    clear: both;
}

</style>
<head>
  <title>Create Events</title>
</head>
<body>
  <h3>Create Events</h3>
  <form action="CreateAndManageEvents.php" method="post">
    <fieldset>
      <legend>Event Informations:</legend>
      <div class="container">
    <input type="hidden" name="EventID" value="test" >
    Event Name
    <input type="text" name="Name" required="required" ><br><br>
    Total Distance
    <input type="number" name="Distance" required="required" ><br><br>
    Date of Event
    <input type="date" name="DateOfEvent" min="2015-01-02" required="required" ><br><br>
    Time Start
    <input type="time" name="TimeStart" required="required" ><br><br>
    Price
    <input type="number" name="Price" required="required" ><br><br>
      </div>
    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
  </form>
  <br><br>
  <form action="AdminFunctions.html">
  <button>Return</button>
    </fieldset>
  </form>

</body>
</html>


<?php
  require_once("../dbinfo.php");
  extract($_POST);


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
