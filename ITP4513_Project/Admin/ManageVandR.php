<title>Manage</title>
<h3>Manage Runners and Volunteers</h3>
<?php
    require_once("../dbinfo.php");
    $sql="SELECT * FROM `runner` WHERE `VolunteerID` IS NULL";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result)>0){
      $table= <<< EOF
        <table border="1">
          <tr>
            <th>Action</th>
            <th>RunnerID</th>
            <th>VolunteerID</th>
            <th>Password</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Gender</th>
            <th>DateOfBirth</th>
            <th>Email</th>
            <th>Country</th>
            <th>ProfilePicture</th>
          </tr>
EOF;
    echo $table;

    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
              <td><a href='AssignVolunteers.php?RunnerID=$row[RunnerID]'>Update Record</a></td>
              <td>$row[RunnerID]</td>
              <td>$row[VolunteerID]</td>
              <td>$row[Password]</td>
              <td>$row[FirstName]</td>
              <td>$row[LastName]</td>
              <td>$row[Gender]</td>
              <td>$row[DateOfBirth]</td>
              <td>$row[Email]</td>
              <td>$row[Country]</td>
              <td>$row[ProfilePicture]</td>
            </tr>
            ";
          }
          echo "</table>";
          } else {
            echo "no runner left unassign yet!";
          }
 ?>
 <br><br><form action="AdminFunctions.html"><button>Return</button></form>
