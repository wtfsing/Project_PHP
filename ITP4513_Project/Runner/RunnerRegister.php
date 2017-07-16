<html>
<head>
  <title>RunnerRegister</title>
</head>
<script>
function goBack() {
    window.history.back();
}
</script>
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
<body>
  <h3>Registration - Runner</h3>

  <form action="RunnerRegister.php" method="post">
    <fieldset>
      <legend>Informations:</legend>
      <div class="container">
    <input type="hidden" name="RunnerID" value="test" >
    Email:
    <input type="email" name="Email" required="required" ><br><br>
    Password:
    <input type="password" name="Password" required="required" ><br><br>
    First Name:
    <input type="text" name="FName" required="required" ><br><br>
    Last Name:
    <input type="text" name="LName" required="required" ><br><br>
    </div>
    Gender:
    <input type="radio" name="Gender" value="M" checked="checked">M
    <input type="radio" name="Gender" value="F">F
    <br><br>
    <div class="container">
    Date Of Birth:
    <input type="date" name="DOB" max="2000-01-02" min="1979-12-31"><br><br>
    Country:
    <input type="text" name="country" required="required" ><br><br>
    Profile Picture:
    <input type="text" name="ProfilePicture"><br><br>
    </div>
    <input type="submit" value="Register">
    <input type="reset" value="Reset">
    <br><br>
  </form>
  <form action="RunnerLogin.html">
  <button>Return</button>
    </fieldset>
  </form>



</body>
</html>


<?php
  require_once("../dbinfo.php");
  extract($_POST);



if(!empty($RunnerID)){
  $sqlCheckRunnerEmail="SELECT * From `runner` WHERE `Email`='$Email'";
  $resultCheckRunnerEmail=mysqli_query($connection,$sqlCheckRunnerEmail);

  if (mysqli_num_rows($resultCheckRunnerEmail) > 0){
    echo "<h3>Record already exist!</h3>";

  }else {
    $sqlNewRunner="INSERT INTO `runner`(`RunnerID`,`Password`,`FirstName`,`LastName`,`Gender`,`DateOfBirth`,`Email`,`Country`,`ProfilePicture`) VALUES
     ('$RunnerID','$Password','$FName','$LName','$Gender','$DOB','$Email','$country','$ProfilePicture')";
     echo "<h3>A record is added successfully</h3>";
    $resultNewRunner=mysqli_query($connection,$sqlNewRunner);
  }
}
 ?>
