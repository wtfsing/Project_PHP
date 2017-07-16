<?php

  require_once("../dbinfo.php");

  $sql="SELECT * FROM `racekitchoice`";//change delete table name

  $result = mysqli_query($connection, $sql);

  //print_r(mysqli_fetch_assoc($result));


  if (mysqli_num_rows($result)>0){
    $table= <<< EOF
      <table border="1">
        <tr>
          <th>Action</th>
          <th>RaceKitID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Photo</th>
          <th>EventID</th>
        </tr>
EOF;
  echo $table;

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td><a href='DeleteRaceKitRecord(B).php?RaceKitID=$row[RaceKitID]'>Delete Record</a></td>
            <td>$row[RaceKitID]</td>
            <td>$row[Name]</td>
            <td>$row[Description]</td>
            <td>$row[Price]</td>
            <td>$row[Photo]</td>
            <td>$row[EventID]</td>
          </tr>
    ";
  }
  echo "</table>";
  echo "<br><br><form action="."VolunteerFunctions.html"."><button>Return</button></form>";
  } else {
    echo "<h3>Warning</h3>";
    echo "There is no Racekit here!<br><br>";
    echo "<a href='CreateRaceKit.php'>Create one!</a><br><br>";
    echo "<form action="."VolunteerFunctions.html"."><button>Return</button></form>";


  }
?>
