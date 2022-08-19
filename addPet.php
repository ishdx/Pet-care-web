<?php include 'processPetProfile.php' ?>
<!DOCTYPE html>
<html lang= "en">
<head>
    <meta charset="utf-8">
    <title>Add Pet</title>
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
                    <a href="mailto:Pet_Care@hotmail.com" class="nav-link">Contact Us</a>
                  </li>
                </ul>
            <img src="logo4.png" alt="profile picture" height="60" style="float:right">
            </div>
            </div>
          </nav>
<!-- Main content -->
<?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
 <div class="p-5 mb-4 bg-light rounded-3">
 <div class="container">
 <div class="row">
<div class="col-12">
    <form action="addPet.php" method="post" enctype="multipart/form-data">
    <h1 class="display-5 fw-bold">Add A Pet:</h1>


    <label for="fileField"><img src="ruba.png" alt="pet photo"   height="150" id="petPhoto" style="padding-left: 660%";   onclick="changeImage()"></label>
    <input type="file" id="fileField" onchange="displayImage(this)" name="profileImage" accept="image/*"  hidden="true">
</div>

<!-- View profile & edit form -->
<div class="col-12">
<div class="row">
<div class="col">
<div class="mb-3">
<label for="Name" class="form-label">Name</label>
<input type="text" class="form-control" id="Name" name="Pet_Name" placeholder="Name" required>
</div>
</div>
<div class="col">
<div class="mb-3">
<label for="Birth" class="form-label">Date of Birth</label>
<input type="date" class="form-control" id="Birth" name="D_Birth" placeholder="00/00/0000" required>
</div>
</div>
</div>
<div class="mb-3">
    <label for="type" class="form-label">Gender:</label>
    <select id="type" name="Gender" class="form-select" required aria-label="Default select example">
    <option selected disabled>Gender</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    </select>
    </div>
<div class="mb-3">
    <label for="Breed" name="Breed"class="form-label">Breed</label>
    <input type="text" name='Breed' class="form-control" id="Breed" placeholder="xxxxx" required>
</div>
<div class="mb-3">
    <label for="status" name="Status"class="form-label">Status:</label>
    <select id="status" name="Status" class="form-select" required aria-label="Default select example">
    <option selected disabled>Status</option>
    <option value="Spayed">Spayed</option>
    <option value="Neutered">Neutered</option>
    </select>
    </div>
<div class="col">
<div class="mb-3">
<label for="Medical Record" class="form-label">Medical Record</label>
<textarea type="Medical" class="form-control" name="Medical_Records" id="Medical" placeholder="Your Pet Medical Record">Your Pet Medical Record</textarea>
</div>
</div>

<div >
    <div>
    <label for="Vaccine" class="form-label">Vaccine</label>
    <textarea type="Vaccine" class="form-control" id="Vaccine" name="Vaccine" placeholder="Your Pet Vaccine Record">Your Pet Vaccine Record</textarea>
    </div>
    </div>
    <button class="btn btn-primary btn-lg text-right" name="save_Pet" type="submit">Add</button>
</div>
</div>
</div>
</div>
</form>
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
