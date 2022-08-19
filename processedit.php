<?php
          if (
               isset($POST_['editButton']) && isset($_POST['selectService']) && isset($_POST['selectDate'])
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
              
               // insert appointment query 
               $setquery = "UPDATE `appointment` SET `Appointment_Date` = '$selectDate', `Start_Time` = '$startTime', `Service_Name` = '$selectService' WHERE `appointment`.`Appointment_ID` = $id;";
               
               $run = mysqli_query($conn, $setquery) or die(mysqli_error($conn));
               if ($run) 

                   echo "Appintment edited successfully"; 

           else {
                    echo "an error occured, service is not added";
                    die(mysqli_error($conn));
               }
          }  ?>