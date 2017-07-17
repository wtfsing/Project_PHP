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

  $eventsql = "SELECT * FROM `event`";
  $eventresult = mysqli_query($connection, $eventsql);

  $racekitsql = "SELECT * FROM `racekitchoice`";
  $racekitresult = mysqli_query($connection, $racekitsql);
  echo "<h3>Event Registration:</h3>";

  if (mysqli_num_rows($eventresult)>0 && mysqli_num_rows($racekitresult)>0){
    echo "<form action=","EventRegister.php"," method=","post",">";
    echo "<fieldset>";
    echo "<legend>Informations:</legend>";
    echo "<div class=","container",">";
    echo "Event: ";
    echo "<select>";
  while ($eventRow = mysqli_fetch_assoc($eventresult)) {
    echo "<option id="."event"." value=",$eventRow['Name'],">",$eventRow['Name'],"</option>";
  }
  echo"</select><br><br>";
  echo "Racekit: ";
  echo"<select>";
  while ($racekitRow = mysqli_fetch_assoc($racekitresult)) {
    echo "<option id="."racekit"." value=",$racekitRow['Name'],">",$racekitRow['Name'],"</option>";
  }
  echo"</select>";
  echo "</div><br><br>";
  echo "<input type=","submit"," value=","Submit",">";
  echo " </form>";
  echo " </fieldset>";
  } else {
    echo "There is no event for you to participate!";
  }
  echo "<form action=","UpdateRunner(A).php",">";
  echo "<br><button>Return</button>";
  echo "</form>";
?>
