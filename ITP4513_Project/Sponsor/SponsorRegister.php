<html>
<head>
  <title>SponsorRegister</title>
</head>
<body>
  <h3>Register Sponsor</h3>
  <form action="SponsorRegister.php" method="post">

    <input type="hidden" name="SponsorID" value="test" >
    Email
    <input type="text" name="Email" required="required" ><br><br>
    Password
    <input type="text" name="Password" required="required" ><br><br>
    First Name
    <input type="text" name="FName" required="required" ><br><br>
    Last Name
    <input type="text" name="LName" required="required" ><br><br>
    Company
    <input type="text" name="Company" required="required" ><br><br>


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


if(!empty($SponsorID)){
  $sqlCheckSponsorEmail="SELECT * From `sponsor` WHERE `Email`='$Email'";
  $resultCheckSponsorEmail=mysqli_query($connection,$sqlCheckSponsorEmail);

  if (mysqli_num_rows($resultCheckSponsorEmail) > 0){
    echo "<h3>Record already exist!</h3>";
  }else {
    $sqlNewSponsor="INSERT INTO `sponsor`(`SponsorID`,`Password`,`FirstName`,`LastName`,`Email`,`Company`) VALUES
     ('$SponsorID','$Password','$FName','$LName','$Email','$Company')";
     echo "<h3>A record is added successfully</h3>";
    $resultNewSponsor=mysqli_query($connection,$sqlNewSponsor);
  }
}
 ?>
