<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petcare";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{"Connected successfully";
}
$NameOfPet = $_GET['PETNAME'];
$sql = "SELECT * FROM `pet` WHERE  `pet`.Pet_Name = '".$NameOfPet."' ";
$result = mysqli_query($conn,$sql);


            while($row = $result -> fetch_array(MYSQLI_ASSOC)){

             $namePet = $row['Pet_Name'];
             $D_Birth = $row['D_Birth'];
             $Breed = $row['Breed'];
             $Gender = $row['Gender'];
             $StatusPet = $row['Status'];
             $M_Record = $row['Medical_Record'];
             $Vaccine = $row['Vaccine'];
             $Img =  $row['Pet_Photo'];

            }
            ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pet Profile</title>
    <link href="style2.css" rel="stylesheet">
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
                    <a href="HomePage.php" class="nav-link">Home</a>
                </li>
                  <li class="nav-item">
                    <a href="logout.inc.php" class="nav-link">logout</a>
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
            <img src="logo4.png" alt="profile picture" height="60" style="float:right">
            </div>
            </div>
          </nav>
<!-- Main content -->
 <div class="p-5 mb-4 bg-light rounded-3">
 <div class="container">
 <div class="row">
<div class="col-12">
<h1 class="display-5 fw-bold"><?php echo $namePet ?></h1>
<img src="<?php echo $Img ?>" alt="profile picture" height="150" style="float:right">
</div>
<!-- View profile & edit form -->
<div class="col-12">
<div class="row">
<div class="col">
<div class="mb-3">
<label for="Name" class="form-label">Name</label>
<input type="text" class="form-control" id="Name" value="<?php echo $namePet ?>" readonly>
</div>
</div>
<div class="col">
<div class="mb-3">
<label for="Birth" class="form-label">Date of Birth</label>
<input type="text" class="form-control" id="Birth" value="<?php echo $D_Birth ?>" readonly>
</div>
</div>
</div>
<div class="mb-3">
    <label for="type" class="form-label">Gender:</label>
    <input type="text" class="form-control" id="Gender" value="<?php echo $Gender ?>" readonly>

    </div>
<div class="mb-3">
    <label for="Breed" class="form-label">Breed</label>
    <input type="text" class="form-control" id="Breed" value="<?php echo $Breed ?>" readonly>
</div>
<div class="mb-3">
    <label for="status" class="form-label">Status:</label>
    <input type="text" class="form-control" id="Breed" value="<?php echo $StatusPet ?>" readonly>

    </div>
<div class="col">
<div class="mb-3">
<label for="Medical Record" class="form-label">Medical Record</label>
<input type="text" class="form-control" id="Medical" value="<?php echo $M_Record ?>" readonly>
</div>
</div>

<div >
    <div>
    <label for="Vaccine" class="form-label">Vaccine</label>
    <input type="text" class="form-control" id="Vaccine" value="<?php echo $Vaccine ?>" readonly>
    </div>
    </div>

</div>
</div>
</div>
</div>
</body>
</html>
