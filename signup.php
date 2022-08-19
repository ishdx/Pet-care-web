<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
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
                <a href="welcome.phpAboutUs" class="nav-link">About us</a>
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
    <h1 class="display-5 fw-bold">Welcome to our website!</h1>
    <p class="fs-4">Create a pet owner account in a few seconds.</p>
    <div style="color: red; font-size: 20px;" ><center>
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
    else if($_GET["error"] == "stmtfailed"){
        echo "<p>Something went wrong, try again!</p>";
    }
    else if($_GET["error"] == "emailtaken"){
        echo "<p>Email already taken!</p>";
    }
    else if($_GET["error"] == "none"){
        echo "<p>You have Sign up</p>";
    }
   }
   ?>
   </div></center>
    </div>
    <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
    <!-- Sign up as customer form -->
    <form action="signup.inc.php" method="post" enctype="multipart/form-data">
    <div class="col-12">
    <div class="col-12">
        <div class="mb-3">
        <label for="fileField"><img src="ruba.png" alt="petOwner photo"   height="150" id="petPhoto" style="padding-left: 660%;"   onclick="changeImage()" ></label>
        <input type="file" id="fileField" onchange="displayImage(this)" name="profileImage" accept="image/*"  hidden="true">
        </div>
    <div class="row">
    <div class="col">
    <div class="mb-3">
    <label for="firstname" class="form-label">First name</label>
    <input type="text" name="firstname" class="form-control" required id="firstname" placeholder="Enter your first name">
    </div>
    </div>
    <div class="col">
    <div class="mb-3">
    <label for="lastname" class="form-label">Last name</label>
    <input type="text" name="lastname" class="form-control" required id="lastname" placeholder="Enter your last name">
    </div>
    </div>
    </div>
    <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" name="email" class="form-control" required id="email" placeholder="Enter your email">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="tel" name="phoneNumber" class="form-control" required id="phone" placeholder="Enter your phone number">
    </div>
    <div class="row">
    <div class="col">
    <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" required id="password" placeholder="Enter your password">
    </div>
    </div>
    <div class="col">
    <div class="mb-3">
    <label for="password_confirm" class="form-label">Confirm Password</label>
    <input type="password" name="passwordRepeat"class="form-control" required id="password_confirm" placeholder="Confirm your password">
    </div>
    </div>
    </div>
    <div class="mb-3">
    <label for="type" class="form-label">Gender:</label>
    <select id="type" name="gender" class="form-select" required aria-label="Default select example">
        <option selected disabled>--Select Your gender--</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
    </div>
    <a href="home.php" ><button class="btn btn-primary btn-lg text-right" type="submit" name="submit">Sign Up</button></a>
    </div>
    </form>
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
