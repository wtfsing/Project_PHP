<?php

  require_once("../dbinfo.php");
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $sql="SELECT * FROM `EventRegister` WHERE `CheckInTime` IS NULL AND `RunnerID`='$_SESSION[RunnerID]'";//change delete table name
  $result = mysqli_query($connection, $sql);

  if (mysqli_num_rows($result)>0){
    $table= <<< EOF
      <table border="1">
        <tr>
          <th>Delete</th>
          <th>RegID</th>
          <th>RunnerID</th>
          <th>EventID</th>
          <th>RaceKitID</th>
        </tr>
EOF;
  echo $table;

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td><a href='EventDeRegister(B).php?RegID=$row[RegID]'>Delete Record</a></td>
            <td>$row[RegID]</td>
            <td>$row[RunnerID]</td>
            <td>$row[EventID]</td>
            <td>$row[RaceKitID]</td>
          </tr>
    ";
  }
  echo "</table>";
  } else {
    echo "You do not have any event record!";
  }
?>

<form action="UpdateRunner(A).php">
<br><button>Return</button>
</form>
