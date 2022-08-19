<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>welcome</title>
    <link href="style1.css" rel="stylesheet">
    <style type="text/css">
        body {background-color :#c9d9e7;
              background-image: url(pet2.png);}
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
                <a href="login.php" class="nav-link">Login as Pet Owner</a>
              </li>
              <li class="nav-item">
                <a href="login2.php" class="nav-link">Login as Manager</a>
              </li>
            <li class="nav-item">
                <span class="nav-link">Contact Us:</<span>
              </li>
            <li class="nav-item">
                <a href="mailto:Pet_Care@hotmail.com" class="nav-link">Email</a>
              </li>
            <li class="nav-item">
                <a href="Tel:0533559794" class="nav-link">Phone Number</a>
              </li>
            </ul>
        </div>
        </div>
      </nav>
<div class="p-5 mb-4 bg-light rounded-3">
<div class="container py-5">
<div class="row">
<div class="col-8">
    <img src="logo4.png" alt="profile picture" height="150" style="float:right">
<h1 class="display-5 fw-bold"><center>Welcome to Pet Care website</center></h1><br>
<h3><center>Where pets go to get well</center></h3><br><br>
<?php
require_once'dbh.inc.php';
require_once'functions.inc.php';
$email="sara@hotmail.com";
$Des= img($conn,$email);
echo $Des;

?>
<div class="three-dimensions-card">
<h2 id="AboutUs">About Us:</h2>
<p class="fs-4">
<?php
 require_once'dbh.inc.php';
 require_once'functions.inc.php';

        $email="sara@hotmail.com";
        $Des=AboutAs($conn,$email);
        echo $Des;
?>
<!--Your pet deserves the best care even when youre not around.
Will that be possible? Of course, it will be! With the<em style="color:rgb(38, 41, 239)"> Pet Care</em>
that offer such services, you can expect your pet to be comfortable and secure.
We work to ensure that the pets will be cared for to the high standards the client expects.
The <em style="color:rgb(38, 41, 239)"> Pet Care</em> website will shine in the field.
Here <em style="color:rgb(38, 41, 239)"> Pet Care</em>, premier full-service pet care facility that
offers daycare, walking, grooming, and training.As website can help spread awesome services,
<em style="color:rgb(38, 41, 239)"> Pet Care</em>crafted a simple but professionally designed website.</h4> --></p>
<p><center><a href="https://goo.gl/maps/DeA9xfiSHiuTja2Y8">Our location</button></a></center></p>
</div>
<br><br>
</div>
</div>
</div>
</div>
</body>
</html>
