


<script type="text/javascript">
  function setValue(value){
      document.getElementsById("RegID").value = value;
  }
</script>


<?php

  require_once("dbinfo.php");

  $connection=mysqli_connect($serverName,$userName,$password,$dbName);

  if(!$connection){
    die("connection fail".mysqli_connect_error());
  }

  $sql="SELECT * FROM `eventregister`";//change delete table name

  $result = mysqli_query($connection, $sql);

  //print_r(mysqli_fetch_assoc($result));


  if (mysqli_num_rows($result)>0){
    $table= <<< EOF
      <table border="1">
        <tr>
          <th>RunnerID</th>
          <th>PaymentTotal</th>
        </tr>
EOF;
  echo $table;

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>$row[RunnerID]</td>
            <td>$row[PaymentTotal]</td>


          </tr>
    ";
  }
  echo "</table>";
  } else {
    echo "no result";
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
          PaymentTotal
          <input type="text" name="PaymentTotal" id="PaymentTotal" value="$PaymentTotal" readonly><br><br>
        </form>
EOF;
    echo $form;
  }


?>
