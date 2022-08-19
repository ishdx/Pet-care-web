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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>previousDetails</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="add_set_Style2.css">
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
            <h1>Previous Appointment Details</h1>
        </div>

        <div class="form">

            <!-- Pet name -->
            <div class="inputfield">
                <label> Pet: <?php echo $row['Pet_Name']; ?> </label>
            </div>

            <!-- Service -->
            <div class="inputfield">
                <label> Service: <?php echo $row['Service_Name']; ?> </label>
            </div>

            <!-- Note -->
            <div class="inputfield">
                <label>Note: <?php echo $row['note']; ?> </label>
            </div>

            <!-- Date -->
            <div class="inputfield">
                <label>Date: <?php echo $row['Appointment_Date']; ?> </label>
            </div>

            <!-- Time -->
            <div class="inputfield">
                <label>Time: <?php echo $row['Start_Time']; ?> </label>
            </div>

            <div class="inputfield">
                <label>Review rate out of 5: </label>
                <?php echo $row['star'];?>
            </div>

            <div class="inputfield">
                <label>Review comment: </label>
                <?php echo $row['review'];?>
            </div>
        </div>
    </div>

</body>

</html>