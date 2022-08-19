<?php
$app = $_GET['APP'];
  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Review</title>
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
<h1 class="display-5 fw-bold">Appointment Details:</h1>
<img src="dog.jpeg" alt="profile picture" height="150" style="float:right">
</div>
<!-- Review -->
<form class="" action="processingReview.php?APP=<?php echo $app; ?>" method="post">
<label for="Service" class="form-label">Write Your Review:</label>
<textarea type="Review" name="review" class="form-control" id="Service" value="Review">Help Us Improve Our Service</textarea>

<div class="rate">
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
</div>

    <button class="btn btn-primary btn-lg text-right" type="submit">Done</button></a>
    </form>
</div>
</div>
</div>
</div>
</body>
</html>
