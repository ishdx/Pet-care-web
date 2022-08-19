<?php

  $msg = "";
  $msg_class = "";
  
  $conn = mysqli_connect("localhost", "root", "", "petcare");
  if (isset($_POST['addService'])) {
    // for the database

    $ServiceImageName = time() . '-' . $_FILES["servicePhoto"]["name"];
    // For image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($ServiceImageName);

    $SerciceName = $_POST['serviceName'];
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['servicePhoto']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
    // check if file exists
    if(file_exists($target_file)) {
      $msg = "File already exists";
      $msg_class = "alert-danger";
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["servicePhoto"]["tmp_name"], $target_file)) {

          $serviceName = $_POST['serviceName'];
          $serviceDescription = $_POST['serviceDescription'];
          $servicePrice =  $_POST['servicePrice'];

          // insert query 
          $sql = "INSERT INTO service(Service_Photo,Service_Name, Description, Price ) VALUES ( $ServiceImageName, '$serviceName', '$serviceDescription', '$servicePrice')";

        #$sql = "Update service SET Service_Photo='".$ServiceImageName."'WHERE Service_Name =".$SerciceName;
        if(mysqli_query($conn, $sql)){
          $msg = "Service Added Successfully";
          $msg_class = "alert-success";
        } else {
          $msg = "There was an error in the database";
          $msg_class = "alert-danger";
        }
      } else {
        $error = "There was an error uploading the file";
        $msg = "alert-danger";
      }
    }
  }
?>