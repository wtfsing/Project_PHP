


<script type="text/javascript">
  function setValue(value){
      document.getElementsById("SponsorID").value = value;
  }
</script>


<?php

  require_once("../dbinfo.php");
  session_start();
  $sql="SELECT * FROM `sponsor` WHERE '$_SESSION[SponsorID]' AND `Password`='$_SESSION[Password]'";//change delete table name

  $result = mysqli_query($connection, $sql);
  //print_r(mysqli_fetch_assoc($result));

  if (mysqli_num_rows($result)>0){
    $table= <<< EOF
      <table border="1">
        <tr>
          <th>Action</th>
          <th>SponsorID</th>
          <th>Password</th>
          <th>FirstName</th>
          <th>LastName</th>
          <th>Company</th>
          <th>Email</th>
        </tr>
EOF;
  echo $table;

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td><a href='UpdateSponsor(A).php?SponsorID=$row[SponsorID]'>Update Record</a></td>
            <td>$row[SponsorID]</td>
            <td>$row[Password]</td>
            <td>$row[FirstName]</td>
            <td>$row[LastName]</td>
            <td>$row[Company]</td>
            <td>$row[Email]</td>
          </tr>
    ";
  }
  echo "</table>";
  } else {
    echo "no result";
  }

  if (isset($_GET["SponsorID"])){
      $sql="SELECT * FROM `sponsor` WHERE `SponsorID`='$_GET[SponsorID]'";

      $result = mysqli_query($connection, $sql);

      $row = mysqli_fetch_assoc($result);
      $SponsorID = $row['SponsorID'];
      $Password = $row['Password'];
      $FirstName = $row['FirstName'];
      $LastName = $row['LastName'];
      $Company = $row['Company'];
      $Email = $row['Email'];



      $form = <<< EOF
        <form action = "UpdateSponsor(B).php" method = "GET">
          <br><br>
          SponsorID
          <input type="text" name="SponsorID" id = "SponsorID" value="$SponsorID" readonly><br><br>
          Password
          <input type="text" name="Password" id="Password" value="$Password"><br><br>
          FirstName
          <input type="text" name="FirstName" id="FirstName" value="$FirstName" ><br><br>
          LastName
          <input type="text" name="LastName" id="LastName" value="$LastName" ><br><br>
          Company
          <input type="text" name="Company" id="Company" value="$Company" ><br><br>
          Email
          <input type="text" name="Email" id="Email" value="$Email" ><br><br>

          <a href='UpdateSponsor(B).php?$SponsorID=$row[SponsorID]'><button onclick=setValue('SponsorID')>Update Record</button></a>
          <input type="reset" onclick="window.location.href='UpdateSponsor(A).php';" value="Cancel">
        </form>
EOF;
    echo $form;
  }


?>
