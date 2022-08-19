<?php
$app = $_GET['APP'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petcare";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{"Connected successfully";
}

$rev = $_POST['review'];
$rate = $_POST['rate'];

$sql = "UPDATE `appointment` SET review = '".$rev."', star = '".$rate."' WHERE Appointment_ID = ".$app;
$result = mysqli_query($conn, $sql);
header("location: home.php");
 ?>
