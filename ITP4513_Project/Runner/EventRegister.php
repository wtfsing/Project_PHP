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

<?php
  require_once("../dbinfo.php");

  $eventsql = "SELECT * FROM `event`";
  $eventresult = mysqli_query($connection, $eventsql);

  $racekitsql = "SELECT * FROM `racekitchoice`";
  $racekitresult = mysqli_query($connection, $racekitsql);
  echo "<h3>Event Registration:</h3>";

  if (mysqli_num_rows($eventresult)>0 && mysqli_num_rows($racekitresult)>0){
    echo "<h3>Availble Event:</h3>";
    $table= <<< EOF
      <table border="1">
        <tr>
          <th>EventID</th>
          <th>Name</th>
          <th>Distance</th>
          <th>Date Of Event</th>
          <th>Start Time</th>
          <th>Price</th>
        </tr>
EOF;
  echo $table;
  while ($row = mysqli_fetch_assoc($eventresult)) {
    echo "<tr>
            <td>$row[EventID]</td>
            <td>$row[Name]</td>
            <td>$row[Distance]</td>
            <td>$row[DateOfEvent]</td>
            <td>$row[TimeStart]</td>
            <td>$row[Price]</td>
          </tr>
    ";
  }
echo "</table>";
 echo "<h3>Availble RaceKit:</h3>";
 $table= <<< EOF
   <table border="1">
     <tr>
        <th>EventID</th>
       <th>RaceKitID</th>
       <th>Name</th>
       <th>Description</th>
       <th>Price</th>
       <th>Photo</th>
     </tr>
EOF;
echo $table;
while ($row = mysqli_fetch_assoc($racekitresult)) {
 echo "<tr>
         <td>$row[EventID]</td>
         <td>$row[RaceKitID]</td>
         <td>$row[Name]</td>
         <td>$row[Description]</td>
         <td>$row[Price]</td>
         <td>$row[Photo]</td>
       </tr>
 ";
}
echo "</table>";
?>
  <p>You can only choose the racekit that corrspond with the event.(Same eventID)</p>

  <form action="EventRegister(B).php" method="post">
  <fieldset>
  <legend>Informations:</legend>
  <div class="container">
  <br>
  <input type="hidden" name="RegID" value="test" >
  Event ID:
  <br>
  <input type="number" name="EventID" required="required">
  <br><br>
  RaceKit ID:
  <br>
  <input type="number"  name="RaceKitID" required="required">
</div><br><br>
<input type="submit" value="Submit">
</form>
</fieldset>
<?php
  }else{
    echo "There is no event for you to participate!";
  }
  ?>
<form action="UpdateRunner(A).php">
<br><button>Return</button>
</form>
