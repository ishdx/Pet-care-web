<?php
     $id = '1';
     $host = "localhost";
     $username = "root";
     $password = "root";
     $dbname = "petcare";

     // Create connection
     $conn = new mysqli('localhost', 'root', '', $dbname);

     // Check connection
     if ($conn->connect_error) {
          die("Connection failed: "
               . $conn->connect_error);
     }

      ?>


     <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AddService</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="add_set_Style.css"> </head>


<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="HomePage.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="Show.php" class="nav-link">About us</a>
                </li>
                  <li class="nav-item">
                    <a href="logou.inc.php" class="nav-link">logout</a>
                </li>
                </ul>
            <img src="logo4.png" alt="profile picture" height="60" style="float:right">
            </div>
            </div>
          </nav>
    <div class="Scontainer">
        <!-- Header -->
        <div class="title">
            <h1 id="h1addService">Add A Service</h1>
        </div>

        <form method="post" action="processaddService.php" class="form" enctype="multipart/form-data">

            <!-- Service name -->
            <div class="inputfield">
                <label for="serviceName" class="">Service Name</label>
                <input type="text" name="name" placeholder="Enter the service name" id="serviceName">
            </div>

            <!-- Upload photo -->
            <div class="inputfield">
                <label for="servicePhoto" class="">Service Photo </label>
                <input type="file" name="photo" id="servicePhoto">
            </div>

            <!-- Service description -->
            <div class="inputfield">
                <label for="serviceDescription" class="">Service Description</label>
                <textarea type="textarea" name="description" id="serviceDescription" placeholder="Enter the service description"></textarea>
            </div>

            <!-- Price -->
            <div class="inputfield">
                <label for="servicePrice" class="">Price</label>
                <input type="text" name="price" placeholder="Enter the price in Riyals" id="Price">
            </div>

            <!-- Add button (submit) -->
            <div class="inputfield">
                <button type="submit" class="btn" name="addService" id="addButton">Add</button>
            </div>

        </form>

    </div>

</body>

</html>
