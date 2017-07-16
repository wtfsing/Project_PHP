<style>
fieldset {
    display: block;
    margin-left: 2px;
    margin-right: 2px;
    padding-top: 0.35em;
    padding-bottom: 0.625em;
    padding-left: 0.75em;
    padding-right: 0.75em;
    border: 2px groove (internal value);
    width: 500px;
    clear: both;
}
</style>
<style type="text/css">
.container {
    width: 500px;
    clear: both;
}
.container input {
    width: 100%;
    clear: both;
}

</style>


<script type="text/javascript">
  function setValue(value){
      document.getElementsById("RunnerID").value = value;

  }
  function goBack() {
      window.history.back();
  }
</script>


<?php

require_once("../dbinfo.php");
  session_start();
  $sql="SELECT * FROM `runner` WHERE `RunnerID`='$_SESSION[RunnerID]' AND `Password`='$_SESSION[Password]'";//change delete table name

  $result = mysqli_query($connection, $sql);

  //print_r(mysqli_fetch_assoc($result));


  if (mysqli_num_rows($result)>0){
    echo "<h3>Your Informations:</h3>";
    $table= <<< EOF
      <table border="1">
        <tr>
          <th>Action</th>
          <th>RunnerID</th>
          <th>VolunteerID</th>
          <th>Password</th>
          <th>FirstName</th>
          <th>LastName</th>
          <th>Gender</th>
          <th>DateOfBirth</th>
          <th>Email</th>
          <th>Country</th>
          <th>ProfilePicture</th>
        </tr>
EOF;
  echo $table;

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td><a href='UpdateRunner(A).php?RunnerID=$row[RunnerID]'>Update Record</a></td>
            <td>$row[RunnerID]</td>
            <td>$row[VolunteerID]</td>
            <td>$row[Password]</td>
            <td>$row[FirstName]</td>
            <td>$row[LastName]</td>
            <td>$row[Gender]</td>
            <td>$row[DateOfBirth]</td>
            <td>$row[Email]</td>
            <td>$row[Country]</td>
            <td>$row[ProfilePicture]</td>
          </tr>
    ";
  }
  echo "</table>";
  } else {
    echo "no result";
  }

  require_once("CheckEventRecord.php");
  echo"<br><br>";
  require_once("ViewPayment.php");

  if (isset($_GET["RunnerID"])){
      $sql="SELECT * FROM `runner` WHERE `RunnerID`='$_GET[RunnerID]'";

      $result = mysqli_query($connection, $sql);

      $row = mysqli_fetch_assoc($result);
      $RunnerID = $row['RunnerID'];
      $VolunteerID = $row['VolunteerID'];
      $Password = $row['Password'];
      $FirstName = $row['FirstName'];
      $LastName = $row['LastName'];
      $Gender = $row['Gender'];
      $radio = checkGender($Gender,$RunnerID);
      $DateOfBirth = $row['DateOfBirth'];
      $Email = $row['Email'];
      $Country = $row['Country'];
      $ProfilePicture = $row['ProfilePicture'];

      $form = <<< EOF
        <form action = "UpdateRunner(B).php" method = "GET">
          <br><br>
          <fieldset>
            <legend>Informations:</legend>
            <div class="container">
          RunnerID
          <input type="text" name="RunnerID" id = "RunnerID" value="$RunnerID" readonly><br><br>
          VolunteerID
          <input type="text" name="VolunteerID" id="VolunteerID" value="$VolunteerID" readonly><br><br>
          Password
          <input type="password" name="Password" id="Password" value="$Password" ><br><br>
          FirstName
          <input type="text" name="FirstName" id="FirstName" value="$FirstName" ><br><br>
          LastName
          <input type="text" name="LastName" id="LastName" value="$LastName" ><br><br>
          </div>
          Gender $radio<br><br>
          <div class="container">
          DateOfBirth
          <input type="text" name="DateOfBirth" id="DateOfBirth" value="$DateOfBirth" ><br><br>
          Email
          <input type="email" name="Email" id="Email" value="$Email" ><br><br>
          Country
          <input type="text" name="Country" id="Country" value="$Country" ><br><br>
          ProfilePicture
          <input type="text" name="ProfilePicture" id="ProfilePicture" value="$ProfilePicture"><br><br>
          </div>
          <a href='UpdateRunner(B).php?$RunnerID=$row[RunnerID]'><button onclick=setValue('RunnerID')>Update Record</button></a>
          <input type="reset" onclick="window.location.href='UpdateRunner(A).php';" value="Cancel"><br><br>
        </form>
          </fieldset>
EOF;
    echo $form;

  }
  ?><p><form action="RunnerLogin.html"><button>Logout</button></form></p><?php


  function checkGender($Gender,$RunnerID){
    if ($Gender=="M"){
      return "<input type='radio' name='Gender' value='M' checked='checked'/>Male<input type='radio' name='Gender' value='F' />Female";
    }else{
      return "<input type='radio' name='Gender' value='M'/>Male<input type='radio' name='Gender' value='F' checked='checked'/>Female";
    }
  }





?>
