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
  <title>SponsorRegister</title>
</head>
<body>
  <h3>Register Sponsor</h3>
  <form action="SponsorRegister.php" method="post">
    <fieldset>
      <legend>Informations:</legend>
      <div class="container">
    <input type="hidden" name="SponsorID" value="test" >
    Email
    <input type="email" name="Email" required="required" ><br><br>
    Password
    <input type="password" name="Password" required="required" ><br><br>
    First Name
    <input type="text" name="FName" required="required" ><br><br>
    Last Name
    <input type="text" name="LName" required="required" ><br><br>
    Company
    <input type="text" name="Company" required="required" ><br><br>
      </div>

    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
    <br><br>
  </form>
  </fieldset>
  <form action="SponsorLogin.html">
  <button> Return </button>
  </form>
</body>
</html>


<?php
  require_once("../dbinfo.php");
  extract($_POST);


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
