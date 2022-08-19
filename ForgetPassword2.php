<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Forget Password</title>
    <link href="style1.css" rel="stylesheet">
    <style type="text/css">
        body {background-color :#e7dbc9;}
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a href="welcome.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="welcome.php#AboutUs" class="nav-link">About us</a>
            </li>
            <li class="nav-item">
                <span class="nav-link">Contact Us:</<span>
              </li>
            <li class="nav-item">
                <a href="mailto:Pet_Care@hotmail.com" class="nav-link">Email</a>
              </li>
            <li class="nav-item">
                <a href="mailto:Pet_Care@hotmail.com" class="nav-link">Phone Number</a>
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
        <h1 class="display-5 fw-bold">Forget Password!</h1>
        <p class="fs-4">please enter your email and new password.</p>
        <div style="color: red; font-size: 20px;" ><center>
    <?php
   if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput" ){
        echo "<p>Fill in all fields!</p>";
    }
    else if($_GET["error"] == "emaildoesntexists"){
        echo "<p>The Email doesn't Exists!</p>";
    }
    else if($_GET["error"] == "passwordinvalid"){
        echo "<p>The Passwords doesn't match!</p>";
    }
   }
   ?>
   </div></center>
        </div>
        <form id="form" action="ForgetPassword2.inc.php" method="post">

        <div class="mb-3">
            <label for="email" class="form-label">Your Email: </label>
            <input type="email" name="email" class="form-control" required id="email" placeholder="Enter your email ...">
            </div>
            <div class="mb-3">
            <label for="email" class="form-label">New Password: </label>
            <input type="password" name="Password" class="form-control" required id="email" placeholder="Enter New Password ...">
            </div>
            <div class="mb-3">
            <label for="email" class="form-label">Confirm Password: </label>
            <input type="password" name="ConfirmPassword" class="form-control" required id="email" placeholder="Enter Confirm Password ...">
            </div>
        </div></div></div>
        <p><center><button class="btn btn-primary btn-lg" type="submit" name="submit"> Reset Password </button></center></p>
</form>
</body>
</html>