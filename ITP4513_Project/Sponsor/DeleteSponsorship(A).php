
<script type="text/javascript">
  function setValue(value){
      document.getElementsById("SponsorID").value = value;
  }
</script>

<?php
    require_once("../dbinfo.php");
  session_start();
  $sql="SELECT * FROM sponsorrecord WHERE $_SESSION[SponsorID] AND PaymentConfirmed = 0";

  $result = mysqli_query($connection, $sql);
  //print_r(mysqli_fetch_assoc($result));

  if (mysqli_num_rows($result)>0){
    echo "<h3>Your sponsorship:</h3>";
    $table= <<< EOF
      <table border="1">
        <tr>
          <th>SponsorID</th>
          <th>CharityID</th>
          <th>RegID</th>
          <th>Amount</th>
        </tr>
EOF;
  echo $table;
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>$row[SponsorID]</td>
            <td>$row[CharityID]</td>
            <td>$row[RegID]</td>
            <td>$row[Amount]</td>
          </tr>
    ";
      $SponsorID = $row['SponsorID'];
      $CharityID = $row['CharityID'];
      $RegID = $row['RegID'];
      $Amount = $row['Amount'];
  }
  echo "</table>";
  } else {
    echo "no result";
  }

      


  $form = <<< EOF
        <form action = "DeleteSponsorship(B).php" method = "GET">
          <br><br>
          SponsorID
          <input type="text" name="SponsorID" id = "SponsorID" value="$SponsorID" readonly><br><br>
          CharityID
          <input type="text" name="CharityID" id="CharityID"><br><br>
          RegID
          <input type="text" name="RegID" id="RegID" ><br><br>
          Amount
          <input type="text" name="Amount" id="Amount"><br><br>
          
          <a href='DeleteSponsorship(B).php?$SponsorID=$row[SponsorID]'><button>Delete record</button></a>
          <input type="reset" onclick="window.location.href='UpdateSponsor(A).php';" value="Cancel">
        </form>
EOF;
    echo $form;
  

?>

