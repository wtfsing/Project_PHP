<style>
fieldset {
    display: block;
    margin:auto;

    padding-top: 0.35em;
    padding-bottom: 0.625em;
    padding-left: 0.75em;
    padding-right: 0.75em;
    border: 2px groove (internal value);
    width: 200px;
    clear: both;
    align-self: center;
}
p{text-align:center;}
h3{text-align:center;}
form{text-align:center;}
</style>
<?php
  require_once("../dbinfo.php");

  $sql="SELECT * FROM `EventRegister` WHERE `RegID`='$_GET[RegID]'";
  $result = mysqli_query($connection, $sql);

  if (mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);
    $RegID = $row['RegID'];
    $form = <<< EOF
      <form action = "MakePayment.php" method = "GET">
        <br><br>
        <fieldset>
          <legend>Informations:</legend>
          <div class="container">
        <input type="hidden" name="PaymentConfirmed" id="PaymentConfirmed" value="1" readonly>
        RegID
        <input type="text" name="RegID" id = "RegID" value="$RegID" readonly><br><br>
        Credit Card Number
        <input type="number" name="CreditCardNumber" id="CreditCardNumber"><br><br>
        Security Pin
        <input type="number" name="Pin" id="Pin"><br><br>
        </div>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset"><br><br>
      </form>
        </fieldset>
EOF;
    echo $form;
    }

if (isset($_GET["RegID"]) && isset($_GET["CreditCardNumber"]) && isset($_GET["Pin"]) ){
  $sql="UPDATE `eventregister` SET `PaymentConfirmed` = '1' WHERE `RegID`='$_GET[RegID]'";
  $result = mysqli_query($connection, $sql);
  if (mysqli_affected_rows($connection)>0){
    echo "<p>A record is updated successfully!</p>";
  }else {
    echo "<p>Error: failed to update a record!</p>";
  }
}
?>
<form action="ViewPayment.php">
<br><button>Return</button>
</form>
