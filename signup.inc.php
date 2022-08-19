<?php 

if(isset($_POST["submit"])){
//$photo=$_POST["profileImage"];   
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$email=$_POST["email"];
$phoneNumber=$_POST["phoneNumber"];
$password=$_POST["password"];
$passwordRepeat=$_POST["passwordRepeat"];
$gender=$_POST["gender"];
///////////////////////////////////////////////////////////////////
$profileImageName =$_FILES["profileImage"]["name"];
$profileImageName2 =$_FILES["profileImage"]["tmp_name"];
/*
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
      $sql = "INSERT INTO pet_owner SET Owner_Photo='$profileImageName', bio='$bio'";
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
  */
//////////////////////////////////////////////////////////////
require_once'dbh.inc.php';
require_once'functions.inc.php';

if(emptyInputSignup($firstname,$lastname,$email,$phoneNumber,$password,$passwordRepeat,$gender) !== false){
    header("location: signup.php?error=emptyinput");
    exit();  
}
//
//
if(invalidEmail($email) !== false){
    header("location: signup.php?error=invalidemail");
    exit();  
}
if(pwMatch($password,$passwordRepeat) !== false){
    header("location: signup.php?error=passwordsdontmatch");
    exit();  
}
if(userExists($conn,$email) !== false){
    header("location: signup.php?error=emailtaken");
    exit();  
}

createUser($conn,$email,$firstname,$gender,$lastname,$phoneNumber,$profileImageName,$password,$profileImageName2);
}
else{
    header("location: signup.php");
    exit(); 
}
