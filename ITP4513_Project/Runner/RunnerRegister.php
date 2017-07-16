<html>
<head>
  <title>RunnerRegister</title>
</head>
<script>
function goBack() {
    window.history.back();
}
</script>
<body>
  <h3>Register Runner</h3>
  <form action="RunnerRegister.php" method="post">

    <input type="hidden" name="RunnerID" value="test" >
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
    Date Of Birth
    <input type="date" name="DOB" max="2000-01-02" min="1979-12-31"><br><br>
    Country
    <input type="text" name="country" required="required" ><br><br>
    Profile Picture
    <input type="text" name="ProfilePicture"><br><br>
    <input type="submit">
    <input type="reset" value="Reset">
    <button onclick="goBack()">Return</button>
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
