<?php

if(isset($_POST["submit"])){

    $email =$_POST['email'];
    $pass = $_POST['Password'];
    $passC = $_POST['ConfirmPassword'];

    require_once'dbh.inc.php';
    require_once'functions.inc.php';
    
    if(emptyInputPass($email,$pass,$passC) !== false){
        header("location: ForgetPassword.php?error=emptyinput");
        exit();  
    }


UpdatePassword($conn,$email,$pass,$passC);  
}
 else{
    header("location: ForgetPassword.php");
    exit();
 }
