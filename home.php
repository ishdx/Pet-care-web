<?php
session_start();


include_once("dbh.inc.php");
$currentpage = '';
if(isset($_GET['current'])) {
  $currentpage= $_GET['current'];
}
//getting id from url
$owner_id = $_SESSION["userid"];
echo "ow";
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
$sql = "SELECT * FROM `pet` WHERE owner_id = '".$owner_id."'" ;
$result2 = mysqli_query($conn,$sql);

$frow = mysqli_fetch_assoc($result);
$name = $frow['F_name'];
$owner_photo = $frow['Owner_Photo'];
$owner_phone = $frow['Owner_Phone'];
$owner_Email = $frow['Email'];






 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link href="style2.css" rel="stylesheet" type="text/css">
        <style>
            .button1 {

                background-color: #C49856;
                border: none;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                font-size: 16px;
                font-weight: 900;
                display: inline-block;
                font-family: 'Courier New', Courier, monospace;
                margin-left: 500px;
            }

    </style>

    <script>function openCity(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
      }</script>
        <title>Pet Care</title>
    </head>





    <body style="background-image: url(Untitled.png); background-repeat: no-repeat; background-size: cover; overflow-x: hidden; display: block;">
    <br>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="welcome.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.inc.php" class="nav-link">logout</a>
                        </li>
                        <li class="nav-item">
                            <a href="mailto:Pet_Care@hotmail.com" class="nav-link">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="tel:0533559794" class="nav-link">Contact Us</a>
                        </li>
                        </ul>
                    <img src="logo4.png" alt="profile picture" height="60" style="float:right">
                    </div>
                    </div>
                </nav>
        </header>

        <section id="first">
            <div id="Welcome">

                <h1 class="display-5 fw-bold" style="margin-top: 7%; color: #C49856;"><center>Welcome <?php echo $name; ?>..</center></h1>
                <div> <a href="ManagePetOwnerProfile.php">
                    <img src="back4.png" alt="profile picture" height="250px" style="float:right"></a></div>
            </div>
        </section>

    <div id="second">
        <h1 style="margin: 2%; padding-left: 130px; text-align: center; color: #C49856;"  > Your Pets </h1>
        <a href="AddPet.php"><button class="button1">Add a pet</button></a>

        <div class="second-cards">
          <?php
            while($row = $result2 -> fetch_array(MYSQLI_ASSOC)){
              echo '<div class="card"><div class="circle"> <a href = "petprofile2.php?PETNAME=',urlencode($row['Pet_Name']),'">';
              echo '<img src="images/'.$row['Pet_Photo'].'" alt=""> </a> </div>';
              echo "</div>";
            }
           ?>

    </div>
    </div>
</br><br>


    <div class="tab">
        <button style="color: #C49856;" id="tstt" class="tablinks" onclick="openCity(event, 'Request')">Request Appointment</button>
        <button style="color: #C49856;" class="tablinks" onclick="openCity(event, 'Upcoming')">Upcoming Appointment</button>
        <button style="color: #C49856;" class="tablinks" onclick="openCity(event, 'Previous')">Previous Appointment</button>
      </div>

      <!-- Tab content -->
      <div id="Request" class="tabcontent">
        <?php if($currentpage == 'editable'){
          echo '<script type="text/javascript">';
          echo "window.onload = function(){";
          echo " document.getElementById('tstt').click();}";
          echo "</script>";
          echo "<h1> choose Another Appointment:</h1>";

        }  ?>
        <?php
        $time =date("Y-m-d", time());
        $sql = "SELECT * FROM `appointment` WHERE Appointment_Date > DATE '".$time."'" ;
        $result3 = mysqli_query($conn,$sql);

          while($row = $result3 -> fetch_array(MYSQLI_ASSOC)){
            $sql = "SELECT Pet_Name FROM `pet` WHERE owner_id = ".$owner_id;
            $result_names = mysqli_query($conn,$sql);
            if($row['Status']=='Available'){
              $_SESSION['APP'] = $row['Appointment_ID'];
              echo ' <div class="card">';
              echo '<div class="title">';
              echo "<h3>Appointment</h3>";
              echo "</div>";
              echo '<div class="form">';
              echo '<div class="inputfield">';
              echo "<label> Pet: </label>";
              echo '<form action="ProcessingReseve2.php" method="post">';
              echo '<select name="name" id="name">';
              while($row2 = $result_names -> fetch_array(MYSQLI_ASSOC)){
                echo '<option value="'.$row2['Pet_Name'].'">'.$row2['Pet_Name'].'</option>';
              }
              echo "</select>";
              echo "</div>";
              echo ' <div class="inputfield">';
              echo "<label> Service: ".$row['Service_Name']."    </label>";
              echo "  </div>";
              echo '<div class="inputfield">';
              echo '<label>Note: </label>';
              echo '<input type="text" name="note" value="'.$row['note'].'">';
              echo "</div>";
              echo '  <div class="inputfield">';
              echo "<label>Date: ".$row['Appointment_Date']."</label>";
              echo "</div>";
              echo '  <div class="inputfield">';
              echo "<label>Time: ".$row['Start_Time']."</label>";
              echo "</div>";
              echo '  <div class="inputfield">';
              echo "  <label>Status: ".$row['Status']."</label>";
              echo "</div>";
              echo '<br>   <div class="inputfield container-1"> ';
              echo '<button  style=" background-color: #f78f07 !important;';
              echo 'border-color: #f78f07 !important;"class="bttn bttn-primary bttn-lg text-right" type="submit">Reseve</button>';
              echo "</form>";
              echo "</div> </div> </div>";

            }

          }
        ?>
           </div>

      <div id="Upcoming" class="tabcontent">
        <?php
        $time =date("Y-m-d", time());
        $sql = "SELECT * FROM `appointment` WHERE   Owner_Email = '".$owner_Email."' AND Appointment_Date > DATE '".$time."'" ;
        $result5 = mysqli_query($conn,$sql);
          while($row = $result5 -> fetch_array(MYSQLI_ASSOC)){
            if($row['Status']=='Upcoming'){
              echo ' <div class="card">';
              echo '<div class="title">';
              echo "<h3>Appointment</h3>";
              echo "</div>";
              echo '<div class="form">';
              echo '<div class="inputfield">';
              echo "<label> Pet: ".$row['Pet_Name']."</label>";
              echo "</div>";
              echo ' <div class="inputfield">';
              echo "<label> Service: ".$row['Service_Name']."    </label>";
              echo "  </div>";
              echo '<div class="inputfield">';
              echo "<label>Note: ".$row['note']."</label>";
              echo "</div>";
              echo '  <div class="inputfield">';
              echo "<label>Date: ".$row['Appointment_Date']."</label>";
              echo "</div>";
              echo '  <div class="inputfield">';
              echo "<label>Time: ".$row['Start_Time']."</label>";
              echo "</div>";
              echo '  <div class="inputfield">';
              echo "  <label>Status: ".$row['Status']."</label>";
              echo "</div>";
              echo '<br>   <div class="inputfield container-1"> ';
              echo "</div> </div> </div>";
            }
          }
        ?>
      </div>

      <div id="Previous" class="tabcontent">
        <?php
        $time =date("Y-m-d", time());
        $sql = "SELECT * FROM `appointment` WHERE Owner_Email = '".$owner_Email."' AND Appointment_Date < DATE '".$time."'" ;
        $result5 = mysqli_query($conn,$sql);
        $rowCount = $result5->num_rows;
        if ($rowCount > 0) {
          while($row = $result5 -> fetch_array(MYSQLI_ASSOC)){
            if($row['Status']=='Previous'){

              echo ' <div class="card">';
              echo '<div class="title">';
              echo "<h3>Appointment</h3>";
              echo "</div>";
              echo '<div class="form">';
              echo '<div class="inputfield">';
              echo "<label> Pet: ".$row['Pet_Name']."</label>";
              echo "</div>";
              echo ' <div class="inputfield">';
              echo "<label> Service: ".$row['Service_Name']."    </label>";
              echo "  </div>";
              echo '<div class="inputfield">';
              echo "<label>Note: ".$row['note']."</label>";
              echo "</div>";
              echo '  <div class="inputfield">';
              echo "<label>Date: ".$row['Appointment_Date']."</label>";
              echo "</div>";
              echo '  <div class="inputfield">';
              echo "<label>Time: ".$row['Start_Time']."</label>";
              echo "</div>";
              echo '  <div class="inputfield">';
              echo "  <label>Status: ".$row['Status']."</label>";
              echo "</div>";
              echo '<br>   <div class="inputfield container-1"> ';
              echo '<button  style=" background-color: #f78f07 !important;';
              echo '  border-color: #f78f07 !important;"class="bttn bttn-primary bttn-lg text-right" type="button"><a href = "Rate.php?APP='.$row['Appointment_ID'].'"> Review</a></button>';
              echo "</div> </div> </div>";
            }
          }
        }
        ?>
            <!-- First service appointments -->


    </div>
        <div class="fifth">
            <h2 style="color: #C49856;"><center>Requested Appointments</center> </h2>
            <div class="row">
                <div class="column">
                  <?php
                  $time =date("Y-m-d", time());
                  $sql = "SELECT * FROM `appointment` WHERE   Owner_Email = '".$owner_Email."' AND Appointment_Date > DATE '".$time."'" ;
                  $result4 = mysqli_query($conn,$sql);
                    while($row = $result4 -> fetch_array(MYSQLI_ASSOC)){
                      if($row['Status']=='Requested'){
                        echo ' <div class="card">';
                        echo '<div class="title">';
                        echo "<h3>Appointment</h3>";
                        echo "</div>";
                        echo '<div class="form">';
                        echo '<div class="inputfield">';
                        echo "<label> Pet: ".$row['Pet_Name']."</label>";
                        echo "</div>";
                        echo ' <div class="inputfield">';
                        echo "<label> Service: ".$row['Service_Name']."    </label>";
                        echo "  </div>";
                        echo '<div class="inputfield">';
                        echo "<label>Note: ".$row['note']."</label>";
                        echo "</div>";
                        echo '  <div class="inputfield">';
                        echo "<label>Date: ".$row['Appointment_Date']."</label>";
                        echo "</div>";
                        echo '  <div class="inputfield">';
                        echo "<label>Time: ".$row['Start_Time']."</label>";
                        echo "</div>";
                        echo '  <div class="inputfield">';
                        echo "  <label>Status: ".$row['Status']."</label>";
                        echo "</div>";
                        echo '<br>   <div class="inputfield container-1"> ';
                        echo '<a href="processingCancel.php?APP='.$row['Appointment_ID'].'">';
                        echo '<button  style=" background-color: #f78f07 !important;';
                        echo 'border-color: #f78f07 !important;"class="bttn bttn-primary bttn-lg text-right" type="button">Cancel</button></a>';
                        echo '<a href="proccesingEdit.php?APP='.$row['Appointment_ID'].'">';
                        echo '<button  style=" background-color: #f78f07 !important;';
                        echo 'border-color: #f78f07 !important;"class="bttn bttn-primary bttn-lg text-right" type="button">Edit</button></a>';
                        echo "</div> </div> </div>";
                      }
                    }
                  ?>
</div>
</div>
</div>




    </body>
