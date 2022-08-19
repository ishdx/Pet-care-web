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
$APP =$_GET['APP'];
$sql = "SELECT * FROM `appointment` WHERE Appointment_ID = $APP";
$result = mysqli_query($conn,$sql);
$PNAME = "";

 ?>


            <?php

                if(isset($_POST['Accept']))
                    {
                        $Upcoming = trim("Upcoming");

                        $sql = "UPDATE `appointment` SET `Status` = '".$Upcoming."' WHERE `appointment`.Appointment_ID = $APP";
                        $rs = mysqli_query($conn, $sql);
                        $affectedRows = mysqli_affected_rows($conn);

                        if($affectedRows == 1  )
                        {
                            $successMsg = "successfully";
                        }

                        header("location:requestlist.php");
                    }
                    if(isset($_POST['Decline']))
                        {
                            $sql = "DELETE FROM `appointment` WHERE `appointment`.Appointment_ID = $APP";
                            $rs = mysqli_query($conn, $sql);
                            $affectedRows = mysqli_affected_rows($conn);

                            if($affectedRows == 1  )
                            {
                                $successMsg = "successfully";
                            }

                              header("location:requestlist.php");
                        }

            ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>requestDetails</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="add_set_Style.css"> </head>


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
                        <a href="lgout.inc.php" class="nav-link">logout</a>
                    </li>
                </ul>
                <img src="logo4.png" alt="profile picture" height="60" style="float:right">
            </div>
        </div>
    </nav>

    <div class="Scontainer">

        <!-- Header -->
        <div class="title">
            <h1>Request Details</h1>
        </div>

        <div class="form">
            <!-- Pet name -->
            <?php
            while($row = $result -> fetch_array(MYSQLI_ASSOC)){

              echo "Pet Name:  ".$row['Pet_Name']."<br>"."<br>";
              echo "Service:   ".$row['Service_Name']."<br>"."<br>";
              echo "Note:   ".$row['note']."<br>"."<br>";
              echo "Date:  ".$row['Appointment_Date']."<br>"."<br>";
              echo "Time:  ".$row['Start_Time']."<br>"."<br>";
              $phone = $row['Owner_Phone'];
              $mail = $row['Owner_Email'];
              $PNAME = $row['Pet_Name'];
            }
             ?>



            <!-- buttons-->
            <div class="inputfield container-1">
                <div class="box-1">
                  <?php echo '<a href="petprofile3.php?PETNAME='.$PNAME.'" > <button  name= "PetPro"class="btn">Pet profile</button></a>'; ?>
                </div>



                <div class="box-2">
                  <form action="<?php echo $_SERVER['PHP_SELF']."?APP=".$APP?>" method="post">
                  <input type="submit" name= "Accept" value = Accept class="btn">
                  </form>


            </div>

                <div class="box-3">
                  <form action="<?php echo $_SERVER['PHP_SELF']."?APP=".$APP?>" method="post">
                    <input type="submit" name= "Decline" value = Decline class="btn">
                    </form>
                </div>
                <div class="box-4">
                    <a href="mailto:<?php echo $mail; ?>"><button class="btn">Email</button></a>
                </div>
               <div class="box-5">
                    <a ref="Tel: <?php echo $phone; ?>"> <button class="btn">call</button></a>
                </div>

            </div>

        </div>
    </div>

</body>

</html>
