<?php

if(isset($_POST["submit"])){

    $email =$_POST['email'];
    $pass = $_POST['password'];

    require_once'dbh.inc.php';
    require_once'functions.inc.php';
    
    if(emptyInputLogin($email,$pass) !== false){
        header("location: login.php?error=emptyinput");
        exit();  
    }


loginManager($conn,$email,$pass);  
}
 else{
    header("location: login2.php");
    exit();
 }

 