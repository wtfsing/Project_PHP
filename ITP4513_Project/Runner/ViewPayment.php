


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
  $sql="SELECT * FROM `eventregister` WHERE `PaymentConfirmed` = '0'
  AND `RunnerID`='$_SESSION[RunnerID]'";
  $result = mysqli_query($connection, $sql);

  echo "<h3>Payment Detail:</h3>";
  if (mysqli_num_rows($result)>0){
    $table= <<< EOF
      <table border="1">
        <tr>
        <th>Payment</th>
        <th>RegID</th>
          <th>RunnerID</th>
          <th>PaymentTotal</th>
        </tr>
EOF;
  echo $table;

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td><a href='MakePayment.php?RegID=$row[RegID]'>Make Payment</a></td>
            <td>$row[RegID]</td>
            <td>$row[RunnerID]</td>
            <td>$row[PaymentTotal]</td>
          </tr>
    ";
  }
  echo "</table>";
  } else {
    echo "You do not have any payment detail!";
  }
?>
<form action="UpdateRunner(A).php">
<br><button>Return</button>
</form>
