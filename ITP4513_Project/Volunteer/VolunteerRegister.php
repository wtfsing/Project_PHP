<html>
<head>
  <title>VolunteerRegister</title>
</head>
<body>
  <h3>Register Volunteer</h3>
  <form action="VolunteerRegister.php" method="post">

    <input type="hidden" name="VolunteerID" value="test" >
    Email
    <input type="text" name="Email" required="required" ><br><br>
    Password
    <input type="text" name="Password" required="required" ><br><br>
    First Name
    <input type="text" name="FName" required="required" ><br><br>
    Last Name
    <input type="text" name="LName" required="required" ><br><br>
    Gender
    <input type="radio" name="Gender" value="M" checked="checked">M
    <input type="radio" name="Gender" value="F">F
    <br><br>
    <input type="submit">
    <input type="reset" value="Reset">
  </form>

</body>
</html>


<?php
  require_once("../dbinfo.php");
  extract($_POST);
  $connection=mysqli_connect($serverName,$userName,$password,$dbName);

  if(!$connection){
    die("connection failed".mysqli_connect_error());
  }


if(!empty($VolunteerID)){
  $sqlCheckVolunteerEmail="SELECT * From `volunteer` WHERE `Email`='$Email'";
  $resultCheckVolunteerEmail=mysqli_query($connection,$sqlCheckVolunteerEmail);

  if (mysqli_num_rows($resultCheckVolunteerEmail) > 0){
    echo "<h3>Record already exist!</h3>";
  }else {
    $sqlNewVolunteer="INSERT INTO `volunteer`(`VolunteerID`,`Password`,`FirstName`,`LastName`,`Gender`,`Email`) VALUES
     ('$VolunteerID','$Password','$FName','$LName','$Gender','$Email')";
     echo "<h3>A record is added successfully</h3>";
    $resultNewVolunteer=mysqli_query($connection,$sqlNewVolunteer);
  }
}
 ?>
