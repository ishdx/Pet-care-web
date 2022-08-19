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
     $selectQuery = "SELECT * FROM `appointment` 
     WHERE Status='Available' 
     ORDER BY `Service_Name` ASC";

     $result = mysqli_query($conn, $selectQuery);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>manage appointments</title>
     <link rel="stylesheet" href="style1.css">
     <link rel="stylesheet" href="add_set_Style.css">
     <link rel="stylesheet" href="manageAppoints.css">
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


     <div id="AppList">
          <h1>Manage Available Appointments</h1>


          <table class="appointmentsTable">
               <thead>
                    <tr>
                         <th>Appointment date</th>
                         <th>Time</th>
                         <th>Service type</th>
                         <th></th>
                    </tr>
               </thead>


               <?php
               while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                         <td><?php echo $row['Appointment_Date']; ?></td>
                         <td><?php echo $row['Start_Time']; ?></td>
                         <td><?php echo $row['Service_Name']; ?></td>
                         <?php $id = $row['Appointment_ID'] ?>

                         <td class="tableLinks">
                              <a href="viewAppDetails.php?id=<?php echo $id; ?>">view</a>
                              <a href="editAppointment.php?id=<?php echo $id; ?>">edit </a>
                              <a href="delete.php?id=<?php echo $id; ?>">delete</a>
                         </td>

                    </tr>

               <?php } ?>


               </tbody>

          </table>
     </div>
</body>

</html>