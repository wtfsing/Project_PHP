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

<?php
require_once("../dbinfo.php");

if (isset($_GET["EventID"])){
$sql="SELECT * FROM `event` WHERE `EventID`='$_GET[EventID]'";
$result = mysqli_query($connection, $sql);
echo "<h3>Event Informations:</h3>";

$row = mysqli_fetch_assoc($result);
$EventID = $row['EventID'];
$Name = $row['Name'];
$Distance = $row['Distance'];
$DateOfEvent = $row['DateOfEvent'];
$TimeStart = $row['TimeStart'];
$Price = $row['Price'];

$form = <<< EOF
<form action = "UpdateEvent(B).php" method = "GET">

<fieldset>
<legend>Informations:</legend>
<div class="container">
EventID
<input type="text" name="EventID" id = "EventID" value="$_GET[EventID]" readonly><br><br>
Event Name
<input type="text" name="Name" value="$Name" required="required" ><br><br>
Total Distance
<input type="number" name="Distance" value="$Distance" required="required" ><br><br>
Date of Event
<input type="date" name="DateOfEvent" min="2015-01-02" value="$DateOfEvent" required="required" ><br><br>
Time Start
<input type="time" name="TimeStart" value="$TimeStart" required="required" ><br><br>
Price
<input type="number" name="Price" value="$Price" required="required" ><br><br>
  </div>
<input type="submit" value="Submit">
<input type="reset" value="Reset">
</form>
<br><br>
<form action="ManageEvents.php">
<button>Return</button>
  </fieldset>
</form>


EOF;
echo $form;




}

?>
