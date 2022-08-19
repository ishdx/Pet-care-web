

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


</body>
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
     $id = intval($_GET['id']);
     // sql to delete a record
     $sql = "DELETE FROM appointment WHERE `appointment`.`Appointment_ID` = $id ";

     if ($conn->query($sql) === TRUE) { ?>
          <div class="success-submission" style="margin-left:5%"><?php echo "Appintment deleted successfully"; ?></div>
    <?php } else {
          echo "Error deleting record: " . $conn->error;
     }
}
?>
</html>