<?php
require_once("../dbinfo.php");

echo "<h3>Confirmation:</h3>";
echo "You will now modify event, EventID: $_GET[EventID]<br>";
echo "<br>Delete a event will also delete any related race kit!<br>";

$sql="SELECT * FROM `eventregister` where `EventID` = $_GET[EventID]";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result)>0){
  echo "Due to the modifation, following runners <br> attending or attended the event will be affected:<br>";
  $table= <<< EOF
    <br>
    <table border="1">
      <tr>
        <th>EventID</th>
        <th>RunnerID</th>
      </tr>
EOF;
  echo $table;

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>$row[EventID]</td>
            <td>$row[RunnerID]</td>
          </tr>
    ";
  }
  echo "</table>";
  echo "<br>Editing or Delete the event may cause data lost, proceed with caution.<br><br>";
  echo "<a href='DeleteEvent.php?EventID=$_GET[EventID]'>Proceed to delete record...</a><br><br>";
  echo "<a href='UpdateEvent.php?EventID=$_GET[EventID]'>Proceed to update record...</a><br>";
  echo "<br><form action="."ManageEvents.html"."><button>Return</button></form>";
  } else {
    echo "<br><a href='DeleteEvent.php?EventID=$_GET[EventID]'>Proceed to delete record...</a><br><br>";
    echo "<a href='UpdateEvent.php?EventID=$_GET[EventID]'>Proceed to update record...</a><br>";
    echo "<br><br><form action="."ManageEvents.php"."><button>Return</button></form>";
  }
?>
