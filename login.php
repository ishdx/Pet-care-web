<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="style1.css" rel="stylesheet">
    <style type="text/css">
        body {background-color :#e7dbc9;}
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
    <a href="welcome.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="welcome.php#AboutUs" class="nav-link">About us</a>
                </li>
    <li class="nav-item">
        <a href="signup.php" class="nav-link">Register</a>
    </li>
    <li class="nav-item">
        <a href="mailto:Pet_Care@hotmail.com" class="nav-link">Contact Us</a>
      </li>
</ul>
<img src="logo4.png" alt="profile picture" height="60" style="float:right">
</div>
</div>
</nav>
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container">
    <div class="row">
    <div class="col-12">
    <h1 class="display-5 fw-bold">Welcome to Pet Care website!</h1>
    <p class="fs-4">Please fill out the form below to access your account.</p>
    <div style="color: red; font-size: 20px;" ><center>
    <?php
   if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput" ){
        echo "<p>Fill in all fields!</p>";
    }
    else if($_GET["error"] == "wronglogin"){
        echo "<p>Icorrect login information!<br>Please try again<br>If you dont have acccount yet,REGISTER NOW!</p>";
    }
   }
   ?>
   </div></center>
    </div>
<!-- User sign in form -->
<form id="form" action="login.inc.php" method="post">
<div class="col-12">
<!--
<div class="col-12">
    <div class="col">  
    <div class="mb-3">
        <label for="type" class="form-label">Choose Account Type: </label>
        <select id="type" class="form-select" aria-label="Default select example" name="user_type">
                <option selected disabled>Your user type </option>
                <option value="pet_owner">Pet Owner</option>
                <option value="clinic">Manager</option>
        </select>
    </div></div>
    -->
    <div class="col">
    <div class="mb-3">
              <label for="username" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="username" required placeholder="Enter your username">
        </div></div>
        <div class="col">
        <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password" required placeholder="Enter your password">
        </div></div>
        <p><a href="ForgetPassword.php" >forget password</a></p><br><br>
        <p>Not Registered? <a href="signup.php" >Creat an account now</a></p><br><br>
        <p><center><button class="btn btn-primary btn-lg" type="submit" name="submit" id="signin">Login now</button></center></p>
    </form>
    </div>
    </div>
    </div>
</body>
</html>