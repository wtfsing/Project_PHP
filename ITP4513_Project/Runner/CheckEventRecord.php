


<script type="text/javascript">
  function setValue(value){
      document.getElementsById("RegID").value = value;
  }
</script>


<?php

require_once("../dbinfo.php");
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
  $sql="SELECT * FROM `eventregister` WHERE `RunnerID`='$_SESSION[RunnerID]'";//change delete table name

  $result = mysqli_query($connection, $sql);

  //print_r(mysqli_fetch_assoc($result));


  if (mysqli_num_rows($result)>0){
    echo "<h3>Event Record:</h3>";
    $table= <<< EOF
      <table border="1">
        <tr>
          <th>RunnerID</th>
          <th>CheckInTime</th>
          <th>FinishTime</th>
          <th>TopSpeed</th>
        </tr>
EOF;
  echo $table;

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>$row[RunnerID]</td>
            <td>$row[CheckInTime]</td>
            <td>$row[FinishTime]</td>
            <td>$row[TopSpeed]</td>

          </tr>
    ";
  }
  echo "</table>";
  } else {
    echo "<h3>Event Record:</h3>";
    echo "You do not any event record!";
  }

  if (isset($_GET["RegID"])){
      $sql="SELECT * FROM `eventregister` WHERE `RegID`='$_GET[RegID]'";

      $result = mysqli_query($connection, $sql);
      $row = mysqli_fetch_assoc($result);

      $RegID = $row['RegID'];
      $RunnerID = $row['RunnerID'];
      $EventID = $row['EventID'];
      $CheckInTime = $row['CheckInTime'];
      $FinishTime = $row['FinishTime'];
      $TopSpeed = $row['TopSpeed'];
      $PaymentConfirmed = $row['PaymentConfirmed'];
      $PaymentTotal = $row['PaymentTotal'];
      $RaceKitID = $row['RaceKitID'];
      $RaceKitSent = $row['RaceKitSent'];




      $form = <<< EOF
        <form method = "GET">
          <br><br>
          RunnerID
          <input type="text" name="RunnerID" id="RunnerID" value="$RunnerID" readonly><br><br>
          CheckInTime
          <input type="text" name="CheckInTime" id="CheckInTime" value="$CheckInTime" ><br><br>
          FinishTime
          <input type="text" name="FinishTime" id="FinishTime" value="$FinishTime" ><br><br>
          TopSpeed
          <input type="text" name="TopSpeed" id="TopSpeed" value="$TopSpeed" ><br><br>

        </form>
EOF;
    echo $form;
  }


?>
