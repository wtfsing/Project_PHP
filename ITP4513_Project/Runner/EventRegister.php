<?php

  require_once("../dbinfo.php");

  $eventsql = "SELECT * FROM `event`";
  $eventresult = mysqli_query($connection, $eventsql);

  $racekitsql = "SELECT * FROM `racekitchoice`";
  $racekitresult = mysqli_query($connection, $racekitsql);

  echo "<h3>Event Registration:</h3>";
  if (mysqli_num_rows($eventresult)>0 && mysqli_num_rows($racekitresult)>0){
    echo "Event: ";
    echo"<select>";
  while ($row = mysqli_fetch_assoc($eventresult)) {
    echo "<option id="."event"." value=",$row['Name'],">",$row['Name'],"</option>";
  }
  echo"</select><br><br>";
  echo "Racekit: ";
  echo"<select>";
  while ($row = mysqli_fetch_assoc($racekitresult)) {
    echo "<option id="."racekit"." value=",$row['Name'],">",$row['Name'],"</option>";
  }
  echo"</select>";
  } else {
    echo "There is no event for you to participate!";
  }
?>
