<?php
session_start();

$app = $_SESSION['APP'];
$pet_name = $_POST['name'];
$note = $_POST['note'];



include_once("dbh.inc.php");

//getting id from url
$owner_id = $_SESSION["userid"];

 # sure will be changed
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petcare";
$email = '';
$phone = '';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{"Connected successfully";
}
$s = "SELECT Owner_ID, Owner_Phone, Email FROM `pet_owner` WHERE Owner_ID = ".$owner_id;
$r = mysqli_query($conn, $s);
while($row = $r -> fetch_array(MYSQLI_ASSOC)){
  $email = $row['Email'];
  $phone = $row['Owner_Phone'];
}

$sql = "UPDATE `Appointment` SET Pet_Name= '".$pet_name."', Note= '".$note."', Owner_Phone= '".$phone."', Owner_Email = '".$email."', Status = 'Requested' WHERE appointment_ID= '".$app."' " ;
$result = mysqli_query($conn,$sql);


header("Location: home.php");
 ?>
