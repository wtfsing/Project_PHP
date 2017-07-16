<?php

  require_once("../dbinfo.php");

  $connection=mysqli_connect($serverName,$userName,$password,$dbName);

  if(!$connection){
    die("connection fail".mysqli_connect_error());
  }

  $sql="SELECT * FROM `sponsorrecord`";//change delete table name

  $result = mysqli_query($connection, $sql);

  //print_r(mysqli_fetch_assoc($result));


  if (mysqli_num_rows($result)>0){
    $table= <<< EOF
      <table border="1">
        <tr>
          <th>Action</th>
          <th>SponsorID</th>
          <th>CharityID</th>
          <th>RegID</th>
          <th>Amount</th>
          <th>PaymentConfirmed</th>
        </tr>
EOF;
  echo $table;

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td><a href='DeleteSponsorRecord(B).php?SponsorID=$row[SponsorID]'>Delete Record</a></td>
            <td>$row[SponsorID]</td>
            <td>$row[CharityID]</td>
            <td>$row[RegID]</td>
            <td>$row[Amount]</td>
            <td>$row[PaymentConfirmed]</td>

          </tr>
    ";
  }
  echo "</table>";
  } else {
    echo "no result";
  }
?>
