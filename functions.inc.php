<?php
function emptyInputSignup($firstname,$lastname,$email,$phoneNumber,$password,$passwordRepeat,$gender){
$result;

if(empty($firstname) || empty($lastname) || empty($email) || empty($phoneNumber) || empty($password) || empty($passwordRepeat) || empty($gender) ){
    $result=true;
}
else {
    $result=false;
}
return $result;
}

//
//
//
//
//
//
//
//
//
//

function invalidEmail($email){
    $result;
    if(!filter_var($email,FILTER_SANITIZE_ADD_SLASHES)){
        $result=true;
    }
    else {
        $result=false;
    }
    return $result;
    }

function pwMatch($password,$passwordRepeat){
        $result;
        if($password!==$passwordRepeat){
            $result=true;
        }
        else {
            $result=false;
        }
        return $result;
        }

function userExists($conn,$email){
            $sql = "SELECT * FROM pet_owner WHERE Email=?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
              header("location: signup.php?error=stmtfailed");
              exit();
            }

            mysqli_stmt_bind_param($stmt,"s",$email);
            mysqli_stmt_execute($stmt);

            $resultData = mysqli_stmt_get_result($stmt);

            if($row=mysqli_fetch_assoc($resultData)){
                return $row;
            }
            else{
                $result = false;
                return $result;
            }

            mysqli_stmt_close($stmt);
            }
function createUser($conn,$email,$firstname,$gender,$lastname,$phoneNumber,$profileImageName,$password,$profileImageName2){
            $sql = "INSERT INTO pet_owner (Email,F_name,Gender,L_name,Owner_Phone,Owner_Photo,Pass)VALUES(?,?,?,?,?,?,?);";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
              header("location: signup.php?error=stmtfailed");
              exit();
            }

            //
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            //
            mysqli_stmt_bind_param($stmt,"sssssss",$email,$firstname,$gender,$lastname,$phoneNumber,$photo,$hashedPwd);
            mysqli_stmt_execute($stmt);
            UploadImage($conn,$profileImageName,$email,$profileImageName2);
            mysqli_stmt_close($stmt);
            ////////////////////////////////////
            header("location: login.php");
////////////////////////////////////////////////////////////
            exit();

        }
function emptyInputLogin($email,$pass){
    $result;
    if(empty($email) || empty($pass) ){
        $result=true;
    }
    else {
        $result=false;
    }
    return $result;
}

function loginUser($conn,$email,$pass){
    $emailExists=userExists($conn,$email);

    if($emailExists === false){
        header("location: login.php?error=wronglogin");
        exit();
    }

    $pwdHashed =   $emailExists["Pass"];
    $checkPwd =    password_verify($pass,$pwdHashed);

    if($checkPwd === false){
        header("location: login.php?error=wronglogin");
        exit();
    }
    else if($checkPwd === true){
       session_start();
       $_SESSION["userid"] = $emailExists["Owner_ID"];
       $_SESSION["useremail"] = $emailExists["Email"];
       header("location: home.php?");
       exit();

    }
}

function managerExists($conn,$email){
        $sql = "SELECT * FROM clinic WHERE Email=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          header("location: login2.php?error=stmtfailed");
          exit();
        }
        mysqli_stmt_bind_param($stmt,"s",$email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row=mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
        }


function loginManager($conn,$email,$pass){
    $emailExists=managerExists($conn,$email);

        if($emailExists === false){
            header("location: login2.php?error=wronglogin");
            exit();
        }

        $pwd =   $emailExists["Pass"];
        $pwdHashed =   $emailExists["Pass"];
    $checkPwd =    password_verify($pass,$pwdHashed);
        /*$checkPwd;
        if($pass === $pwd){
            $checkPwd =  true;
        }else{
            $checkPwd = false;
        }*/

        if($checkPwd === false){
            header("location: login2.php?error=wronglogin");
            exit();
        }
        else if($checkPwd === true){
           session_start();
           $_SESSION["managerid"] = $emailExists["Clinical_ID"];
           $_SESSION["useremail"] = $emailExists["Email"];
           header("location: HomePage.php?");
           exit();

        }
    }

function emptyInputPass($email,$pass,$passC){
        $result;
        if(empty($email) || empty($pass) || empty($passC) ){
            $result=true;
        }
        else {
            $result=false;
        }
        return $result;
    }

function UpdatePassword($conn,$email,$pass,$passC){
    $emailExists=userExists($conn,$email);
    if($emailExists === false){
        header("location: ForgetPassword.php?error=emaildoesntexists");
        exit();
    }
    $checkPwd = pwMatch($pass,$passC);
    if($checkPwd === true){
        header("location: ForgetPassword.php?error=passwordinvalid");
        exit();
    }
    ///////
    else if($checkPwd === false){
        try{
            //hashed the password
            $hashedPwd = password_hash($pass, PASSWORD_DEFAULT);
            //SQL statment
            $sqlUpdate = "UPDATE pet_owner SET Pass='$hashedPwd'  WHERE Email='$email'";
            mysqli_query($conn, $sqlUpdate);
            mysqli_close($conn);
             /*
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
              header("location: ForgetPassword.php?error=stmtfailed");
              exit();
            }
            //mysqli_stmt_bind_param($stmt,"sssssss",$email,$firstname,$gender,$lastname,$phoneNumber,$photo,$hashedPwd);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            //$statment = $db->prepare($sqlUpdate);
            //$statment->execute(array(':Pass '=> $hashedPwd , ':Email' => $email));
            */
            header("location: login.php?");
            exit();
        }catch(PDOException $ex){
        }


    }
}

function UpdatePasswordFormanager($conn,$email,$pass,$passC){
    $emailExists=managerExists($conn,$email);

    if($emailExists === false){
        header("location: ForgetPassword2.php?error=emaildoesntexists");
        exit();
    }
    $checkPwd = pwMatch($pass,$passC);
    if($checkPwd === true){
        header("location: ForgetPassword2.php?error=passwordinvalid");
        exit();
    }
    ///////
    else if($checkPwd === false){
        try{
            //hashed the password
            $hashedPwd = password_hash($pass, PASSWORD_DEFAULT);
            //SQL statment
            $sqlUpdate = "UPDATE clinic SET Pass='$hashedPwd'  WHERE Email='$email'";
            mysqli_query($conn, $sqlUpdate);
            mysqli_close($conn);
            header("location: login2.php?");
            exit();
        }catch(PDOException $ex){
        }
}

}
function AboutAs($conn,$email){
    $emailExists=managerExists($conn,$email);

        if($emailExists === false){
            header("location: welcome.php?error=wrong");
            exit();
        }

        $description =   $emailExists["Description"];
        return $description;

    }
function img($conn, $email){
  $emailExists=managerExists($conn,$email);

      if($emailExists === false){
          header("location: welcome.php?error=wrong");
          exit();
      }

      $img =   $emailExists["pic"];
      return '<img src="'.$img.'" alt="">';
}

function UploadImage($conn,$profileImageName,$email,$profileImageName2){
    $msg = "";
    $msg_class = "";
    // For image upload
$target_dir = "images/";
$target_file = $target_dir . basename($profileImageName);
move_uploaded_file($profileImageName2, $target_file);
$sqlUpdate = "UPDATE pet_owner SET  Owner_Photo='$profileImageName'  WHERE Email='$email'";
            mysqli_query($conn, $sqlUpdate);
// VALIDATION
// validate image size. Size is calculated in Bytes
/*
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
 //if (empty($error)) {
    //if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
      $sql = "UPDATE pet_owner SET Owner_Photo='$profileImageName' WHERE Email='$email'";
      if(mysqli_query($conn, $sql)){
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
}
