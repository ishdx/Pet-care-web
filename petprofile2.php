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
                    <a href="home.php" class="nav-link">Home</a>
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
  <form class="" action="proccessingpp.php?PETNAME=<?php echo $NameOfPet; ?>" method="post">
    <h1 class="display-5 fw-bold"><?php echo $namePet ?></h1>
    
    <img src="<?php echo "images/".$Img;?>" alt="profile picture" height="150" style="float:right">
    </div>
    <!-- View profile & edit form -->
    <div class="col-12">
    <div class="row">
    <div class="col">
    <div class="mb-3">
    <label for="Name" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" id="Name" value="<?php echo $namePet ?>">
    </div>
    </div>
    <div class="col">
    <div class="mb-3">
    <label for="Birth" class="form-label">Date of Birth</label>
    <input type="text" class="form-control" name="birth" id="Birth" value="<?php echo $D_Birth ?>">
    </div>
    </div>
    </div>
    <div class="mb-3">
      <!--
        <label for="type" class="form-label">Gender:</label>
        <input type="text" class="form-control" name="gender" id="Gender" value="<?php //echo $Gender ?>">
          -->

        <label for="type" class="form-label">Gender:</label>
    <select id="type" name="Gender" class="form-select" required aria-label="Default select example">
    <option selected disabled><?php echo $Gender ?></option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    </select>
        </div>
    <div class="mb-3">
        <label for="Breed" class="form-label">Breed</label>
        <input type="text" class="form-control" name="breed" id="Breed" value="<?php echo $Breed ?>">
    </div>
    <div class="mb-3">
      <!--
        <label for="status" class="form-label">Status:</label>
        <input type="text" class="form-control" name="status" id="status" value="<?php //echo $StatusPet ?>">
          -->
<label for="status" name="Status"class="form-label">Status:</label>
    <select id="status" name="Status" class="form-select" required aria-label="Default select example">
    <option selected disabled><?php echo $StatusPet ?></option>
    <option value="Spayed">Spayed</option>
    <option value="Neutered">Neutered</option>
    </select>
        </div>
    <div class="col">
    <div class="mb-3">
    <label for="Medical Record" class="form-label">Medical Record</label>
    <input type="text" class="form-control" id="Medical" name="mrecord" value="<?php echo $M_Record ?>">
    </div>
    </div>

    <div >
        <div>
        <label for="Vaccine" class="form-label">Vaccine</label>
        <input type="text" class="form-control" id="Vaccine" name="vaccine" value="<?php echo $Vaccine ?>">
    </div>
        <button class="btn btn-primary btn-lg text-right" type="submit">Edit</button></a>
    </form>
    <a href = "proccessingPPD.php?PETNAME=<?php echo $NameOfPet;?>">
        <button class="btn btn-primary btn-lg text-right" type="button">Delete</button></a>
</div>
</div>
</div>
</div>
</body>
</html>
