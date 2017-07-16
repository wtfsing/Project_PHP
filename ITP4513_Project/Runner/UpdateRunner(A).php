


<script type="text/javascript">
  function setValue(value){
      document.getElementsById("RunnerID").value = value;
      
  }
</script>


<?php

  require_once("dbinfo.php");

  $connection=mysqli_connect($serverName,$userName,$password,$dbName);

  if(!$connection){
    die("connection fail".mysqli_connect_error());
  }

  $sql="SELECT * FROM `runner`";//change delete table name

  $result = mysqli_query($connection, $sql);

  //print_r(mysqli_fetch_assoc($result));


  if (mysqli_num_rows($result)>0){
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
          RunnerID
          <input type="text" name="RunnerID" id = "RunnerID" value="$RunnerID" readonly><br><br>
          VolunteerID
          <input type="text" name="VolunteerID" id="VolunteerID" value="$VolunteerID" readonly><br><br>
          Password
          <input type="text" name="Password" id="Password" value="$Password" ><br><br>
          FirstName
          <input type="text" name="FirstName" id="FirstName" value="$FirstName" ><br><br>
          LastName
          <input type="text" name="LastName" id="LastName" value="$LastName" ><br><br>
          Gender $radio<br><br>
          DateOfBirth
          <input type="text" name="DateOfBirth" id="DateOfBirth" value="$DateOfBirth" ><br><br>
          Email
          <input type="text" name="Email" id="Email" value="$Email" ><br><br>
          Country
          <input type="text" name="Country" id="Country" value="$Country" ><br><br>
          ProfilePicture
          <input type="text" name="ProfilePicture" id="ProfilePicture" value="$ProfilePicture"><br><br>
          <a href='UpdateRunner(B).php?$RunnerID=$row[RunnerID]'><button onclick=setValue('RunnerID')>Update Record</button></a>
          <input type="reset" onclick="window.location.href='UpdateRunner(A).php';" value="Cancel">
        </form>
EOF;
    echo $form;
  }

  function checkGender($Gender,$RunnerID){
    if ($Gender=="M"){
      return "<input type='radio' name='Gender' value='M' checked='checked'/>Male<input type='radio' name='Gender' value='F' />Female";
    }else{
      return "<input type='radio' name='Gender' value='M'/>Male<input type='radio' name='Gender' value='F' checked='checked'/>Female";
    }
  }




?>
