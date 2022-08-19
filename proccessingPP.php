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
$name = $_POST['name'];
$birth = $_POST['birth'];
$gender = $_POST['gender'];
$status = $_POST['status'];
$mrecord = $_POST['mrecord'];
$breed = $_POST['breed'];
$vaccine = $_POST['vaccine'];

$sql = "UPDATE `pet` SET `Pet_Name` = '".$name."', `D_Birth` = DATE '".$birth."', `Gender` = '".$gender."', `Status` = '".$status."', `Medical_Record` = '".$mrecord."', `Breed` = '".$breed."', `Vaccine` = '".$vaccine."' WHERE `pet`.`Pet_Name` = '".$petOrignalName."'";
$result = mysqli_query($conn, $sql);
header("Location: home.php");

 ?>
