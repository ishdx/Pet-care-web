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

$sql = "SELECT * FROM `appointment` WHERE Status = 'Requested'";
$result = mysqli_query($conn,$sql);

 ?>

<!DOCTYPE html>
<html>
<head>
    <link href="style1.css" rel="stylesheet"
    type="text/css">
    <style>
                body {
            background-image: url("back2.png");
            background-repeat: no-repeat;
            overflow: hidden;
            background-size: cover;

        }
        td{
        border:3px solid orange;
        padding: 8px;
        text-align: center;
        }
        th{
            border:3px solid orange;
        padding: 8px;
        text-align: center;
            color: rgb(241, 159, 7);
            font-size: larger;
        }
        body {background-color :#e7dbc9;
        }
        table {


        border:1px solid rgb(230, 152, 8);
        border-collapse: collapse;
        width: 80%;
        margin: auto;
        }
        tr.hovertr:hover {background-color: rgb(230, 152, 8);}
    </style>
    <title>Request List</title>
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

        <table >
            <tr>

                    <th colspan="2" >Request list</th>

            </tr>
            <?php
            while($row = $result -> fetch_array(MYSQLI_ASSOC)){

              echo '<tr class="hovertr">';
              echo '<td > Request No.  '.$row['Appointment_ID'].'</td>';
              echo '<td><a href=requestDetails.php?APP=',urlencode($row['Appointment_ID']),'>View Details</a></td>';
              echo "</tr>";
            }
             ?>
        </table>

</body>
</html>
