<!DOCTYPE html>
<html>
<head>
  <title>Posting</title>
</head>
<body>

<?php
 require 'connect.php';

 if (isset ($_POST['rank'])) {
$conn = mysqli_connect ($HOST, $USER, $PASS, $DB) or die (mysqli_connect_error());


    $givenname = mysqli_real_escape_string ($conn, $_POST ['givenname']);
    $surname = mysqli_real_escape_string ($conn, $_POST['surname']);
    $sn = mysqli_real_escape_string($conn, $_POST['sn']);
    $rank = mysqli_real_escape_string ($conn,$_POST['rank']);
    $unit = mysqli_real_escape_string ($conn,$_POST['unit']);

    $query = "INSERT INTO member(`sn`,`rank`,`surname`,`givenname`) VALUES ('$sn','$rank','$surname','$givenname') ; INSERT INTO post(`sn`,`unit`) VALUES ('$sn', '$unit')";
    $result = mysqli_multi_query ($conn, $query) or die(mysqli_connect_error());

    echo "<p>$rank $givenname $surname posted to $unit</p>\n";

    mysqli_close ($conn);
 }
?>

<form method="post" action="">
 Given Name: <input type="text" name="givenname"><br>
 Family Name: <input type="text" name="surname"><br>
 Service Number: <input type="text" name="sn"><br>
 NATO Rank Code: <input type="text" name="rank"><br>
 Unit: <input type="text" name="unit"><br>
 <input type="submit">
</form>

</body>
</html>
