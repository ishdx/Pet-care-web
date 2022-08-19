<?php
session_start();

include_once("dbh.inc.php");

//getting id from url
$owner_id = $_SESSION["userid"];
  $msg = "";
  $msg_class = "";

  $conn = mysqli_connect("localhost", "root", "", "petcare");
  if (isset($_POST['save_Pet'])) {
    // for the database

    $pet_Name = stripslashes($_POST['Pet_Name']);
    $D_Birth = stripslashes($_POST['D_Birth']);
    $Gender = stripslashes($_POST['Gender']);
    $Status = stripslashes($_POST['Status']);
    $Medical_Records = stripslashes($_POST['Medical_Records']);
    $Breed = stripslashes($_POST['Breed']);
    $Vaccine = stripslashes($_POST['Vaccine']);
    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
    // For image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['profileImage']['size'] > 200000) {
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
      if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {

        $sql = "INSERT INTO `pet` (`Pet_ID`, `Pet_Photo`, `Pet_Name`, `D_Birth`, `Gender`, `Status`, `Medical_Record`, `Breed`, `Vaccine`, `Owner_ID`) VALUES (NULL, '".$profileImageName."', '".$pet_Name."', DATE '".$D_Birth."', '".$Gender."', '".$Status."', '".$Medical_Records."', '".$Breed."', '".$Vaccine."', '".$owner_id."')";
        if(mysqli_query($conn, $sql)){
          $msg = "Pet Added Successfully";
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
