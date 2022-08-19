<?php
$id = intval($_GET['id']);
$host = "localhost";
$username = "root";
$password = "";
$dbname = "petcare";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
     die("Connection error" . mysqli_connect_error());
} else {


     $selectQuery = "SELECT * FROM `appointment` 
     WHERE Appointment_ID =$id ";

     $result = mysqli_query($conn, $selectQuery);
     if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
     } else {
          $msg = "No Record found";
     }


     //retrieve services names from service table 
     $selectQuery2 = "SELECT Service_Name FROM `service`";
     $result2 = mysqli_query($conn, $selectQuery2);
     if (mysqli_num_rows($result2) > 0) {
          $row2 = mysqli_fetch_assoc($result2);
     } else {
          echo "No Record found";
     }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <title>Edit Appointment</title>
     <link rel="stylesheet" href="style1.css">
     <link rel="stylesheet" href="add_set_Style.css">
</head>

<body>
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
                              <a href="logou.inc.php" class="nav-link">logout</a>
                         </li>
                    </ul>
                    <img src="logo4.png" alt="profile picture" height="60" style="float:right">
               </div>
          </div>
     </nav>

     <div class="Scontainer">
          <!-- Header -->
          <div class="title">
               <h1 id="h1addService">Edit An Appointment</h1>
          </div>

          <div class="form">
               <div class="inputfield">
                    <h1>Appointment's previous data:- </h1>
               </div>
               <?php
               if (mysqli_connect_errno()) {
                    die("Connection error" . mysqli_connect_error());
               } else {

                    $selectQuery = "SELECT * FROM `appointment` 
               WHERE Appointment_ID =$id ";

                    $result = mysqli_query($conn, $selectQuery);
                    if (mysqli_num_rows($result) > 0) {
                         $row = mysqli_fetch_assoc($result);
                    } else {
                         $msg = "No Record found";
                    }
               }

               ?>


               <!-- Service -->
               <div class="inputfield">
                    <label> Service: <?php echo $row['Service_Name']; ?> </label>
               </div>



               <!-- Date -->
               <div class="inputfield">
                    <label>Date: <?php echo $row['Appointment_Date']; ?> </label>
               </div>

               <!-- Time -->
               <div class="inputfield">
                    <label>Time: <?php echo $row['Start_Time']; ?> </label>
               </div>

               <hr>
               <hr>
               <br>
          </div>

          
          <!----------------------------------------------- form for setting the new data -->
          <form method="post" action="editAppointment.php?id=<?php echo $id; ?>" class="form">
               <div class="inputfield">
                    <h1>Appointment's new data:- </h1>
               </div>

               <!-- Select Service -->
               <div class="inputfield">
                    <label for="selectService">Select Service</label>
                    <div class="custom_select">
                    <select id="selectService" name="selectService">
                              <option value="Select">Select</option>

                              <?php
                              //display retrived services names as options in a select menu
                              while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                                   <option value="<?php echo $row2['Service_Name']; ?>"><?php echo $row2['Service_Name']; ?></option>

                              <?php } ?>

                         </select>
                    </div>
               </div>

               <!-- Select Date -->
               <div class="inputfield">
                    <label for="selectDate" class="">Select Date</label>
                    <input type="date" class="m-wrap" value="<?php echo $row2['Appointment_Date']; ?>" name="selectDate" />

               </div>

               <!-- Start Time -->
               <div class="inputfield">
                    <label for="startTime">Time</label>
                    <input type="time" id="startTime" name="startTime" value="<?php echo $row2['Start_Time']; ?>" />
               </div>


               <!-- set button (submit) -->
               <div class="inputfield">
                    <button type="submit" class="btn" name="editButton" id="setButton">Edit</button>
               </div>
          </form>


          <?php

          if (
               isset($_POST['selectService']) && isset($_POST['selectDate'])
               && isset($_POST['startTime'])
          ) {


               if (mysqli_connect_errno()) {
                    die("Connection error" . mysqli_connect_error());
               } else {
                    $id = intval($_GET['id']);
                    $selectService = $_POST['selectService'];
                    $selectDate = $_POST['selectDate'];
                    $startTime = $_POST['startTime'];
               }

               // edit appointment query 
               $setquery = "UPDATE `appointment` SET `Appointment_Date` = '$selectDate', `Start_Time` = '$startTime', `Service_Name` = '$selectService' WHERE `appointment`.`Appointment_ID` = $id;";

               $run = mysqli_query($conn, $setquery) or die(mysqli_error($conn));
               if ($run) { ?>

                    <div class="success-submission"><?php echo "Appintment edited successfully"; ?></div>

               <?php } else {
                    echo "an error occured, service is not added";
                    die(mysqli_error($conn));
               }
          } else { ?>
               <div class="required"><?php echo "*All fields are required"; ?></div>
          <?php } ?>


     </div>



</body>

</html>