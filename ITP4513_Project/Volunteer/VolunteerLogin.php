<script>
function goBack() {
    window.history.back();
}
</script>
<style>
p{
  text-align:center;
}

</style>
<?php
require_once("../dbinfo.php");
extract($_POST);

  $sql="SELECT * From `volunteer` WHERE
  `VolunteerID`='$VolunteerID' AND `Password`='$Password'";

  $result = mysqli_query($connection,$sql);

  if (mysqli_num_rows($result) > 0){
    session_start();
    $_SESSION[VolunteerID] = $VolunteerID;
    $_SESSION[Password] = $Password;
    header('Location: VolunteerFunctions.html');
  }
  else {
      echo "<P>Wrong VolunteerID or Password!</p>";
      ?><p><button onclick="goBack()">Return</button></p><?php
  }
?>
