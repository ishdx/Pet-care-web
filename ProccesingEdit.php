<?php
session_start();


include_once("dbh.inc.php");

//getting id from url
$owner_id = $_SESSION["userid"];

 # sure will be changed
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
$sql = "SELECT * FROM `pet_owner` WHERE `pet_owner`.owner_id = '".$owner_id."' " ;
$result = mysqli_query($conn,$sql);


$frow = mysqli_fetch_assoc($result);
$owner_phone = $frow['Owner_Phone'];
$owner_Email = $frow['Email'];

$appID = $_GET['APP'];

$sql1 = "UPDATE `appointment` SET `Status` = 'Available' WHERE appointment_ID = '".$appID."'";
$result30 = mysqli_query($conn,$sql1);

$sql2= "UPDATE `appointment` SET `Owner_Email` = ''  WHERE appointment_ID = '".$appID."'";
$result40 = mysqli_query($conn,$sql2);

$sql3= "UPDATE `appointment` SET `Owner_Phone` = '', Pet_Name='',note='' WHERE appointment_ID = '".$appID."'";

$result50 = mysqli_query($conn,$sql3);


header('location: home.php?current=editable&#stt');
  ?>
