<html>
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
<head>
  <title>Registration - Volunteer</title>
</head>
<body>
  <h3>Registration - Volunteer</h3>
  <form action="VolunteerRegister.php" method="post">
    <fieldset>
      <legend>Informations:</legend>
      <div class="container">
    <input type="hidden" name="VolunteerID" value="test" >
    Email
    <input type="email" name="Email" required="required" ><br><br>
    Password
    <input type="password" name="Password" required="required" ><br><br>
    First Name
    <input type="text" name="FName" required="required" ><br><br>
    Last Name
    <input type="text" name="LName" required="required" ><br><br>
    </div>
    Gender
    <input type="radio" name="Gender" value="M" checked="checked">M
    <input type="radio" name="Gender" value="F">F
    <br><br>
    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
    <br><br>
  </form>
  <form action="VolunteerLogin.html">
  <button>Return</button>
    </fieldset>
  </form>

</body>
</html>


<?php
  require_once("../dbinfo.php");
  extract($_POST);


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
