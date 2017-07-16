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

  $sqlCheckRunner="SELECT * From `runner` WHERE
  `RunnerID`='$RunnerID' AND `Password`='$Password'";

  $result = mysqli_query($connection,$sqlCheckRunner);

  if (mysqli_num_rows($result) > 0){
    session_start();
    $_SESSION[RunnerID] = $RunnerID;
    $_SESSION[Password] = $Password;
    header('Location: UpdateRunner(A).php');
  }
  else {
      echo "<P>Wrong RunnerID or Password!</p>";
      ?><p><button onclick="goBack()">Return</button></p><?php
  }
?>
