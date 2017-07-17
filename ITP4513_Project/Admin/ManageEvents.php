<title>Manage</title>
<h3>Manage Events</h3>
<?php
  require_once("../dbinfo.php");

  $sql="SELECT * FROM `event`";
  $result = mysqli_query($connection, $sql);
  if (mysqli_num_rows($result)>0){
    $table= <<< EOF
      <table border="1">
        <tr>
          <th>Action</th>
          <th>EventID</th>
          <th>Name</th>
          <th>Distance</th>
          <th>DateOfEvent</th>
          <th>TimeStart</th>
          <th>Price</th>
        </tr>
EOF;
  echo $table;

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td><a href='ConfirmEvent.php?EventID=$row[EventID]'>Modify</a></td>
            <td>$row[EventID]</td>
            <td>$row[Name]</td>
            <td>$row[Distance]</td>
            <td>$row[DateOfEvent]</td>
            <td>$row[TimeStart]</td>
            <td>$row[Price]</td>
          </tr>
    ";
  }
  echo "</table>";
  echo "<br><br><form action="."AdminFunctions.html"."><button>Return</button></form>";
  } else {
    echo "<h3>There are no events here!</h3>";
    echo "<form action="."AdminFunctions.html"."><button>Return</button></form>";
  }
?>
