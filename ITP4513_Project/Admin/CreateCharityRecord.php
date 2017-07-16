<html>
<head>
  <title>Create Charity Record</title>
</head>
<body>
  <h3>Create Charity Record</h3>
  <form action="CreateCharityRecord.php" method="post">

    <input type="hidden" name="CharityID" value="test" >
    Charity Name
    <input type="text" name="Name" required="required" ><br><br>
    Charity Description
    <input type="text" name="Description" required="required" ><br><br>
    Charity WebsiteUrl
    <input type="text" name="WebsiteUrl" required="required" ><br><br>
    Charity Logo
    <input type="text" name="Logo" required="required" ><br><br>

    <input type="submit">
    <input type="reset" value="Reset">
  </form>

</body>
</html>

<?php
  require_once("../dbinfo.php");
  extract($_POST);


if(!empty($CharityID)){
  $sqlCheckCharityName="SELECT * From `charity` WHERE `Name`='$Name'";
  $resultCheckCharityName=mysqli_query($connection,$sqlCheckCharityName);

  if (mysqli_num_rows($resultCheckCharityName) > 0){
    echo "<h3>Record already exist!</h3>";
  }else {
    $sqlNewCharity="INSERT INTO `charity`(`CharityID`,`Name`,`Description`,`WebsiteUrl`,`Logo`) VALUES
     ('$CharityID','$Name','$Description','$WebsiteUrl','$Logo')";
     echo "<h3>A record is added successfully</h3>";
    $resultNewCharity=mysqli_query($connection,$sqlNewCharity);
  }
}
 ?>
