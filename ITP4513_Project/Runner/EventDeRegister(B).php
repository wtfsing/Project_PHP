
<?php
  require_once("../dbinfo.php");

  $sql="DELETE FROM `EventRegister` WHERE `RegID`='$_GET[RegID]'";
  $result = mysqli_query($connection, $sql);

  //print_r(mysqli_fetch_assoc($result));
  if (mysqli_affected_rows($connection) > 0) {
    header("Location: EventDeRegister.php");
  }else {
    echo "Error: Failed to remove record";
  }
?>
<form action="EventDeRegister.php">
<br><button>Return</button>
</form>
