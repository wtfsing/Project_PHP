<?php
require_once("../dbinfo.php");
extract($_POST);
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$eventsql="SELECT * From `event` WHERE `EventID`='$EventID'";
$eventresult=mysqli_query($connection,$eventsql);

$racekitsql="SELECT * From `RaceKitChoice` WHERE `RaceKitID`='$RaceKitID'";
$racekitresult=mysqli_query($connection,$racekitsql);

if (mysqli_num_rows($eventresult) > 0){
    while ($row = mysqli_fetch_assoc($eventresult)) {
      $eventPrice = $row['Price'];
      $checkIDEvent = $row['EventID'];
    }
if (mysqli_num_rows($racekitresult) > 0){
    while ($row = mysqli_fetch_assoc($racekitresult)) {
      $racekitPrice = $row['Price'];
      $checkIDRaceKit = $row['EventID'];
    }
    $totalPrice = $eventPrice + $racekitPrice;
    if($checkIDRaceKit == $checkIDEvent){
      $sqlNewEventReg = "INSERT INTO `EventRegister`(`RegID`,`RunnerID`,`EventID`,`RaceKitID`,`PaymentTotal`) VALUES
     ('$RegID','$_SESSION[RunnerID]','$EventID','$RaceKitID','$totalPrice')";
     $NewEventRegRes=mysqli_query($connection,$sqlNewEventReg);
     echo "<h3>A record is added successfully</h3>";
   }else{
     echo "EventID does not match!";
   }
  }
}else{
  echo "No such Event ID or RaceKit ID!";
}
?>
<form action="EventRegister.php">
<br><button>Return</button>
</form>
