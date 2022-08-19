<?php
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

$petOrignalName = $_GET['PETNAME'];
$sql = "DELETE FROM `pet` WHERE `pet`.`Pet_Name` = '".$petOrignalName."'";
$result = mysqli_query($conn, $sql);
header("Location: home.php");

 ?>
