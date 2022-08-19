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


loginUser($conn,$email,$pass);  
}
 else{
    header("location: login.php");
    exit();
 }

    //$user_type = $_POST['user_type'];
    /*

    $select = " SELECT * FROM $user_type WHERE Email = '$email' && Pass = '$pass' ";
 
    $result = mysqli_query($conn, $select);
 
    if(mysqli_num_rows($result) > 0){
 
       //$row = mysqli_fetch_array($result);
 
       if($user_type == 'pet_owner'){
 
          //$_SESSION['admin_name'] = $row['name'];
          header('location: home.php');
 
       }elseif($user_type == 'clinic'){
 
          //$_SESSION['user_name'] = $row['name'];
          header('location: HomePage.php');
 
       }
      
    }else{
       $error[] = 'incorrect email or password!';
    }
 
 }
 */
 