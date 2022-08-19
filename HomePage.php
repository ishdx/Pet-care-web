<?php
session_start();


include_once("dbh.inc.php");

//getting id from url
$manager_id = $_SESSION["managerid"];

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
$sql = "SELECT * FROM `Clinic` WHERE Clinical_ID = '".$manager_id."'";
$result = mysqli_query($conn,$sql);

 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link href="style1.css" rel="stylesheet"
    type="text/css">
    <style>
        body {
            background-image: url("back2.png");
            background-repeat: no-repeat;
            overflow: hidden;
            background-size: cover;

        }

        .dropbtn {
        padding: 16px;
        font-size: 16px;
        border: none;
        }
        .textfont {
            color: #0000fff3;
        }

        .dropdown {
        position: relative;
        display: inline-block;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }
        .block {
        margin-bottom: 4px;
        width: 100%;
        border: none;
        padding: 14px 28px;
        font-size: 16px;
        cursor: pointer;
        text-align: center;
        }

        .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        }
        table {

            margin-top: 40px;
            margin-left: 260px;
            color: black;
        }
        th,td{
            padding-left: 7px;
        }



        </style>
</head>
<body >
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a href="HomePage.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="Show.php" class="nav-link">About us</a>
            </li>
              <li class="nav-item">
                <a href="logout.inc.php" class="nav-link">logout</a>
            </li>
            </ul>
        <img src="logo4.png" alt="profile picture" height="60" style="float:right">
        </div>
        </div>
      </nav>
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
        <div class="row">
        <div class="col-8" style="margin-left: 510px ;">
            <img src="logo4.png" alt="profile picture" height="150" style="float:top" ></div></div></div>
    <?php
    while($row = $result -> fetch_array(MYSQLI_ASSOC)){
        echo "<h1 class=]display-5 fw-bold'  style='margin-top:80px;'>";
        echo "<center>Welcome back  ". $row['Name'];
        echo ".."." </center></h1>";
        }
        ?>


    <table style="margin-left: auto; margin-right: auto;">
        <tr >
            <th rowspan="2"> <a href = "Edit.php">
                <button style="size: 100%; height: 107px;" class="block btn btn-primary btn-lg text-right" type="button">About Us    </button></a> </th>
            <th rowspan="2"><a href = "addService.php">
                <button class="block btn btn-primary btn-lg text-right" style="height: 107px;" type="button">Add Service</button></a></th>
            <th rowspan="2"><a href = "RequestList.php">
                <button class="block btn btn-primary btn-lg text-right" style="height: 107px;" type="button">Request List</button></a> </th>



            <th style="margin-top: 70px;" rowspan="2"><a href = "manageAppointments.php">
                <button class="btn btn-primary btn-lg text-right"  style="height: 107px; " type="button">Manage Available Appointments</button></a></th>


            <th rowspan="2"><a href = "Upcoming.php">
                <button  class="btn btn-primary btn-lg text-right"  style="height: 107px;" type="button" >View Upcoming Appointments</button></a></th>
            <th rowspan="2"> <a href = "Previous.php">
                <button class="btn btn-primary btn-lg text-right" style="height: 107px;" type="button">View Previous Appointments</button></a> </th>
            <th rowspan="2"> <a href = "setAppointment2.php">
                <button class="btn btn-primary btn-lg text-right" style="height: 107px;" type="button">Set Available Appointments</button></a> </th>


        </tr>


    </table>
</body>
</html>
