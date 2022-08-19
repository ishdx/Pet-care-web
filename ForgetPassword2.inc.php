<?php

if(isset($_POST["submit"])){

    $email =$_POST['email'];
    $pass = $_POST['Password'];
    $passC = $_POST['ConfirmPassword'];

    require_once'dbh.inc.php';
    require_once'functions.inc.php';
    
    if(emptyInputPass($email,$pass,$passC) !== false){
        header("location: ForgetPassword2.php?error=emptyinput");
        exit();  
    }


UpdatePasswordFormanager($conn,$email,$pass,$passC);  
}
 else{
    header("location: ForgetPassword2.php");
    exit();
 }
