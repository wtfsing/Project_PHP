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
  <title>CreateRaceKit</title>
</head>
<body>
  <h3>Create Race Kit</h3>
  <form action="CreateRaceKit.php" method="post">
    <fieldset>
      <legend>Racekit Informations:</legend>
      <div class="container">
    <input type="hidden" name="RaceKitID" value="test" >
    Name
    <input type="text" name="Name" required="required" ><br><br>
    Description
    <input type="text" name="Description" required="required" ><br><br>
    Price
    <input type="number" name="Price" required="required" ><br><br>
    Photo
    <input type="text" name="Photo" required="required" ><br><br>
    EventID
    <input type="text" name="EventID" required="required" ><br><br>

    </div>
    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
    <br><br>
  </form>
  <form action="VolunteerFunctions.html">
  <button>Return</button>
    </fieldset>
  </form>
</body>
</html>


<?php
  require_once("../dbinfo.php");
  extract($_POST);





if(!empty($RaceKitID)){
  $sqlCheckracekit="SELECT * From `racekitchoice` WHERE `Name`='$Name'";
  $resultCheckracekit=mysqli_query($connection,$sqlCheckracekit);

  $sqlCheckEventID="SELECT * From `event` WHERE `EventID` = $EventID";
  $resultCheckEventID=mysqli_query($connection,$sqlCheckEventID);

  if (mysqli_num_rows($resultCheckracekit) > 0){
    echo "<h3>Record already exist!</h3>";
  }else if(mysqli_num_rows($resultCheckEventID) > 0){
    $sqlNewEvent="INSERT INTO `racekitchoice`(`RaceKitID`,`Name`,`Description`,`Price`,`Photo`,`EventID`) VALUES
     ('$RaceKitID','$Name','$Description','$Price','$Photo','$EventID')";
    $resultNewEvent=mysqli_query($connection,$sqlNewEvent);
     echo "<h3>A record is added successfully</h3>";
  }else
    {
    echo "<h3>EventID does not exist!</h3>";
  }
}
 ?>
