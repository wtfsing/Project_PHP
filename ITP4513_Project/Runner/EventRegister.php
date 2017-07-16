<?php

  require_once("../dbinfo.php");

  $sql = "SELECT * FROM `event`";
  $result = mysqli_query($connection, $sql);

  echo "<h3>Event Registration:</h3>";

  if (mysqli_num_rows($result)>0){
    echo"<select>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value=",$row['Name'],">",$row['Name'],"</option>";
  }
  echo"</select>";
  } else {
    echo "There is no event for you to participate!";
  }
?>
