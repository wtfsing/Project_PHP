<title>Assign</title>
<h3>Assign Volunteers</h3>
<?php
require_once("../dbinfo.php");
$sql="SELECT * FROM `Volunteer`";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result)>0){
  $table= <<< EOF
    <table border="1">
      <tr>
        <th>VolunteerID</th>
        <th>Password</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Gender</th>
        <th>Email</th>
      </tr>
EOF;
echo $table;

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>
          <td>$row[VolunteerID]</td>
          <td>$row[Password]</td>
          <td>$row[FirstName]</td>
          <td>$row[LastName]</td>
          <td>$row[Gender]</td>
          <td>$row[Email]</td>
        </tr>
        ";
      }
      echo "</table>";
            echo "<br><form action='AssignVolunteers(B).php?' method='get'>";
            echo "<input type='number' required='required' name='VolunteerID'>";
            echo "<input type='hidden' name='RunnerID' value='$_GET[RunnerID]'>";
            echo "<br><br><input type='submit' value='Submit'>";
            echo "</form>";
      } else {
        echo "no Volunteer available!";
      }
 ?>
<br><form action="ManageVandR.php"><button>Return</button></form>
