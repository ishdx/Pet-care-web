<?php

$host = "localhost";
$username = "root";
$password = "root";
$dbname = "petcare";

// Create connection
$conn = new mysqli('localhost', 'root', '', $dbname);

// Check connection
if ($conn->connect_error) {
     die("Connection failed: "
          . $conn->connect_error);
}
$photo = $_FILES['photo']['name'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

$sql = "INSERT INTO `service` (`Service_Photo`, `Service_Name`, `Description`, `Price`) VALUES ('".$photo."', '".$name."', '".$description."', '".$price."')";
$result = mysqli_query($conn,$sql);
header("Location: HomePage.php");
  ?>
