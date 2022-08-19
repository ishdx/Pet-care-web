<?php
session_start();
?>

<?php

include_once("dbh.inc.php");

//getting id from url
$id = $_SESSION["userid"];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM pet_owner WHERE Owner_ID=$id");

while($res = mysqli_fetch_array($result))
{
    $Fname = $res['F_name'];
    $lastname= $res['L_Name'];
    $email=$res['Email'];
    $phoneNumber=$res['Owner_Phone'];
    $password=$res['Pass'];
    $gender=$res['Gender'];
    $profileImageName =$res['Owner_Photo'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ManagePetOwnerProfile</title>
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
        </div>
        </div>
      </nav>
      <?php
//including the database connection file
//include_once("dbh.inc.php");
//fetching data in descending order (lastest entry first)
if(isset($_SESSION["userid"])){
    //$ID=$_SESSION["userid"];
//$result = mysqli_query($conn, "SELECT * FROM pet_owner WHERE Owner_ID = $ID  "); // using mysqli_query instead
}
?>
<!--Main content-->
<div class="p-5 mb-4 bg-light rounded-3">
<div class="container">
<div class="row">
<div class="col-12">
<h1 class="display-5 fw-bold"><?php echo $Fname;?></h1>
<p class="fs-4">Manage your profile.</p>
<?php
   if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput" ){
        echo "<p>Fill in all fields!</p>";
    }
    else if($_GET["error"] == "invalidemail"){
        echo "<p>Choose a proper email !</p>";
    }
    else if($_GET["error"] == "passwordsdontmatch"){
        echo "<p>Passwords doesn't match!</p>";
    }
    /*
    else if($_GET["error"] == "emailtaken"){
        echo "<p>Email already taken!</p>";
    }*/
   }
   ?>
</div>
<!--View profile & edit form -->
<form action="profileOwner.inc.php" method="post" >

<div class="col-12">
    
        <label for="fileField"><img src="<?php echo "images/".$profileImageName;?>" alt="petOwner photo"   height="150" id="petPhoto" style="padding-left: 660%;   onclick="changeImage()" ></label>
        <input type="file" id="fileField" onchange="displayImage(this)" name="profileImage" accept="image/*"  hidden="true">

<div class="row">
<div class="col">
<div class="mb-3">
<label for="firstname" class="form-label">First name</label>
<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $Fname;?>">
</div>
</div>
<div class="col">
<div class="mb-3">
<label for="lastname" class="form-label">Last name</label>
<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname;?>">
</div>
</div>
</div>
<div class="mb-3">
<label for="email" class="form-label">Email</label>
<input readonly type="text" class="form-control" id="email" name="email" value="<?php echo $email;?>">
</div>
<div class="mb-3">
    <label for="email" class="form-label">Phone number</label>
    <input type="text" class="form-control" id="email"name="phoneNumber" value="<?php echo $phoneNumber;?>">
</div>
<div class="row">
<div class="col">
<div class="mb-3">
<label for="password" class="form-label">Password</label>
<input type="password" class="form-control" id="password" name="password" value="<?php echo $password;?>">
</div>
</div>
<div class="col">
<div class="mb-3">
<label for="password_confirm" class="form-label">Confirm Password</label>
<input type="password" class="form-control" id="password_confirm" name="passwordRepeat" value="<?php echo $password;?>">
</div>
</div>
</div>
<div class="mb-3">
    <label for="email" class="form-label">Your Gender:</label>
    <input readonly type="text" class="form-control" id="email" name="gender" value="<?php echo $gender;?>">
</div>
    <button class="btn btn-primary btn-lg text-right" type="submit" name="update">Edit now</button>
<a href = "deleteOwnerProfile.php">
    <button class="btn btn-primary btn-lg text-right" type="button"> Delete now </button></a>
</form>
</div>
</div>
</div>
</div>
<script>
    function changeImg(){
    document.querySelector('#fileField').click();

}
function displayImage(e) {
    if (e.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
        document.querySelector('#petPhoto').setAttribute('src', e.target.result);

      }
      reader.readAsDataURL(e.files[0]);
    }
  }
</script>
</body>
</html>