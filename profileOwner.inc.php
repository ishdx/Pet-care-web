<?php
// including the database connection file
$id = $_SESSION["userid"];
if(isset($_POST['update']))
{   
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$email=$_POST["email"];
$phoneNumber=$_POST["phoneNumber"];
$password=$_POST["password"];
$passwordRepeat=$_POST["passwordRepeat"];
$gender=$_POST["gender"];
$profileImageName =$_FILES["profileImage"]["name"];
$profileImageName2 =$_FILES["profileImage"]["tmp_name"];
require_once'dbh.inc.php';
require_once'functions.inc.php';
    // checking empty fields
    if(emptyInputSignup($firstname,$lastname,$email,$phoneNumber,$password,$passwordRepeat,$gender) !== false){
        header("location: ManagePetOwnerProfile.php?error=emptyinput");
        exit();  
    }
    //
    //
    else if(invalidEmail($email) !== false){
        header("location: ManagePetOwnerProfile.php?error=invalidemail");
        exit();  
    }
    else if(pwMatch($password,$passwordRepeat) !== false){
        header("location: ManagePetOwnerProfile.php?error=passwordsdontmatch");
        exit();  
    }
    /*
    else if(userExists($conn,$email) !== false){
        header("location: ManagePetOwnerProfile.php?error=emailtaken");
        exit();  
    }*/
    else { 
        try{ 
        //updating the table
        //$result = mysqli_query($conn, "UPDATE pet_owner SET F_name='$firstname', L_Name='$lastname', Email='$email',Owner_Phone='$phoneNumber' ,Pass='$password',Gender='$gender', Owner_Photo='$profileImageName' WHERE Owner_ID=$id");
        UploadImage($conn,$profileImageName,$email,$profileImageName2);
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $sqlUpdate = "UPDATE pet_owner SET F_name='$firstname', L_Name='$lastname', Email='$email',Owner_Phone='$phoneNumber' ,Pass='$hashedPwd',Gender='$gender', Owner_Photo='$profileImageName' WHERE Email='$email'";
            mysqli_query($conn, $sqlUpdate);
            //mysqli_close($conn); 
            header("location: ManagePetOwnerProfile.php?");
            exit();
        //redirectig to the display page. In our case, it is index.php
        //header("Location: home.php");
    }catch(PDOException $ex){
    }
    }

}else{
    header("Location: ManagePetOwnerProfile.php");
    exit(); 

}
