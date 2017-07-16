


<script type="text/javascript">
  function setValue(value){
      document.getElementsById("RegID").value = value;
  }
</script>


<?php

  require_once("../dbinfo.php");

  $sql="SELECT * FROM `eventregister`";//change delete table name

  $result = mysqli_query($connection, $sql);

  //print_r(mysqli_fetch_assoc($result));


  if (mysqli_num_rows($result)>0){
    $table= <<< EOF
      <table border="1">
        <tr>
          <th>RegID</th>
          <th>RunnerID</th>
          <th>EventID</th>
          <th>CheckInTime</th>
          <th>FinishTime</th>
          <th>TopSpeed</th>
          <th>PaymentConfirmed</th>
          <th>PaymentTotal</th>
          <th>RaceKitID</th>
          <th>RaceKitSent</th>
        </tr>
EOF;
  echo $table;

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td><a href='UpdateRunnerEventRecords(A).php?RegID=$row[RegID]'>Update Record</a></td>
            <td>$row[RunnerID]</td>
            <td>$row[EventID]</td>
            <td>$row[CheckInTime]</td>
            <td>$row[FinishTime]</td>
            <td>$row[TopSpeed]</td>
            <td>$row[PaymentConfirmed]</td>
            <td>$row[PaymentTotal]</td>
            <td>$row[RaceKitID]</td>
            <td>$row[RaceKitSent]</td>
          </tr>
    ";
  }
  echo "</table>";
  } else {
    echo "No Runners has been assign to you yet!<br><br>";
    echo "<form action="."VolunteerFunctions.html"."><button>Return</button></form>";
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
        <form action = "UpdateRunnerEventRecords(B).php" method = "GET">
          <br><br>
          RegID
          <input type="text" name="RegID" id = "RegID" value="$RegID" readonly><br><br>
          RunnerID
          <input type="text" name="RunnerID" id="RunnerID" value="$RunnerID" readonly><br><br>
          EventID
          <input type="text" name="EventID" id="EventID" value="$EventID" readonly><br><br>
          CheckInTime
          <input type="text" name="CheckInTime" id="CheckInTime" value="$CheckInTime" ><br><br>
          FinishTime
          <input type="text" name="FinishTime" id="FinishTime" value="$FinishTime" ><br><br>
          TopSpeed
          <input type="text" name="TopSpeed" id="TopSpeed" value="$TopSpeed" ><br><br>
          PaymentConfirmed
          <input type="text" name="PaymentConfirmed" id="PaymentConfirmed" value="$PaymentConfirmed" readonly><br><br>
          PaymentTotal
          <input type="text" name="PaymentTotal" id="PaymentTotal" value="$PaymentTotal" readonly><br><br>
          RaceKitID
          <input type="text" name="RaceKitID" id="RaceKitID" value="$RaceKitID" readonly><br><br>
          RaceKitSent
          <input type="text" name="RaceKitSent" id="RaceKitSent" value="$RaceKitSent" readonly><br><br>


          <a href='UpdateRunnerEventRecords(B).php?$RegID=$row[RegID]'><button onclick=setValue('RegID')>Update Record</button></a>
          <input type="reset" onclick="window.location.href='UpdateRunnerEventRecords(A).php';" value="Cancel">
        </form>
EOF;
    echo $form;
  }


?>
