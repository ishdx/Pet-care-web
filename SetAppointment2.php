<?php

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

     //retrieve services names from service table 
     $selectQuery = "SELECT Service_Name FROM `service`";
     $result = mysqli_query($conn, $selectQuery);
     if (mysqli_num_rows($result) > 0) {
     } else {
          echo "No Record found";
     }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <title>SetAvailableAppointment</title>
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
               <h1 id="h1addService">Set An Available Appointment</h1>
          </div>


          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form">

               <!-- Select Service -->
               <div class="inputfield">
                    <label for="selectService">Select Service</label>
                    <div class="custom_select">


                         <select id="selectService" name="selectService">

                              <option value="Select">Select</option>
                              <?php
                              //display retrived services names as options in a select menu
                              while ($row = mysqli_fetch_assoc($result)) { ?>
                                   <option value="<?php echo $row['Service_Name']; ?>"><?php echo $row['Service_Name']; ?></option>

                              <?php } ?>

                         </select>
                    </div>
               </div>

               <!-- Select Date -->
               <div class="inputfield">
                    <label for="selectDate" class="">Select Date</label>
                    <input type="date" name="selectDate" access="false" id="selectDate" />
               </div>

               <!-- Start Time -->
               <div class="inputfield">
                    <label for="startTime">Start Time</label>
                    <input type="time" id="startTime" name="startTime" />
               </div>

               <!-- set button (submit) -->
               <div class="inputfield">
                    <button type="submit" class="btn" name="setButton" id="setButton">Set</button>
               </div>
          </form>

          <?php
          if (
               isset($_POST['selectService']) && isset($_POST['selectDate'])
               && isset($_POST['startTime'])
          ) {

               $selectService = $_POST['selectService'];
               $selectDate = $_POST['selectDate'];
               $startTime = $_POST['startTime'];


               // insert appointment query 
               $setquery = "INSERT INTO appointment (Status ,Service_Name, Appointment_Date, Start_Time)
               VALUES ('Available','$selectService', '$selectDate', '$startTime')";

               $run = mysqli_query($conn, $setquery) or die(mysqli_error($conn));
               if ($run) { ?>

                    <div class="success-submission"><?php echo "Appintment added successfully"; ?></div>

          <?php } else {
                    echo "an error occured, service is not added";
                    die(mysqli_error($conn));
               }
          } else{?>
               <div class="required"><?php echo "*All fields are required"; ?></div>
         <?php } ?>

     </div>
</body>

</html>