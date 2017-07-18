<script type="text/javascript">
  function setValue(value){
      document.getElementsById("SponsorID").value = value;
  }
</script>

<?php

require_once("../dbinfo.php");
session_start();
  $sql="SELECT runner.RunnerID, runner.FirstName, runner.LastName, runner.Gender, runner.Country
            FROM runner, eventregister
            WHERE runner.RunnerID = eventregister.RunnerID
            ORDER BY eventregister.TopSpeed DESC";//runnner record table name

  $result = mysqli_query($connection, $sql);

  //print_r(mysqli_fetch_assoc($result));


  if (mysqli_num_rows($result)!=0){
    echo "<h3>Runner's Informations:</h3>";
    $table= <<< EOF
      <table border="1">
        <tr>
          <th>RunnerID</th>
          <th>FirstName</th>
          <th>LastName</th>
          <th>Gender</th>
          <th>Country</th>
        </tr>
EOF;
  echo $table;

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>$row[RunnerID]</td>
            <td>$row[FirstName]</td>
            <td>$row[LastName]</td>
            <td>$row[Gender]</td>
            <td>$row[Country]</td>
          </tr>
    ";
  }
  echo "</table>";
  } else {
    echo "no result";
  }

  $sql="SELECT `CharityID`, `Name` FROM `charity`";//runnner record table name

  $result = mysqli_query($connection, $sql);

  //print_r(mysqli_fetch_assoc($result));


  if (mysqli_num_rows($result)!=0){
    echo "<h3>Chrity Informations:</h3>";
    $table= <<< EOF
      <table border="1">
        <tr>
          <th>CharityID</th>
          <th>Name</th>
        </tr>
EOF;
  echo $table;

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>$row[CharityID]</td>
            <td>$row[Name]</td>
          </tr>
    ";
  }
  echo "</table>";
  } else {
    echo "no result";
  }
    //$SponsorID = $_SESSION['SponsorID'];


    $form = <<< EOF
        <form action = "Sponsorship(B).php" method = "GET">
          <br><br>
          SponsorID
          <input type="text" name="SponsorID" id = "SponsorID"><br><br>
          CharityID
          <input type="text" name="CharityID" id="CharityID"><br><br>
          RegID
          <input type="text" name="RegID" id="RegID" ><br><br>
          Amount
          <input type="text" name="Amount" id="Amount" ><br><br>
 

<a href='Sponsorship(B).php?$SponsorID'><button onclick=setValue('SponsorID')>Confirm</button></a>
          <input type="reset" onclick="window.location.href='Sponsorship(A).php';" value="Cancel">
        </form>
EOF;
    echo $form;
    
?>
