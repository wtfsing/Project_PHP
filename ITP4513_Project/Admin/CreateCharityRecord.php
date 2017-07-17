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
  <title>Create Charity Record</title>
</head>
<body>
  <h3>Create Charity Record</h3>
  <form action="CreateCharityRecord.php" method="post">
      <fieldset>
        <legend>Charity Informations:</legend>
        <div class="container">
    <input type="hidden" name="CharityID" value="test" >
    Charity Name
    <input type="text" name="Name" required="required" ><br><br>
    Charity Description
    <input type="text" name="Description" required="required" ><br><br>
    Charity WebsiteUrl
    <input type="url" name="WebsiteUrl" required="required" ><br><br>
    Charity Logo
    <input type="text" name="Logo" required="required" ><br><br>
      </div>
    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
  </form>
  <br><br>
  <form action="AdminFunctions.html">
  <button>Return</button>
    </fieldset>
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
