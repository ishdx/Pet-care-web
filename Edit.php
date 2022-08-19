<?php
session_start();

include_once("dbh.inc.php");

//getting id from url
$owner_id = $_SESSION["managerid"];
  $msg = "";
  $msg_class = "";

  $conn = mysqli_connect("localhost", "root", "", "petcare");

if(!$conn)
{
	die(mysqli_error());
}



if(isset($_POST['Edit']))
{
	$textareaValue = trim($_POST['aboutusE']);

    $sql = "UPDATE `clinic` SET `Description` = '".$textareaValue."' WHERE `clinic`.`Clinical_ID` = 1";
	$rs = mysqli_query($conn, $sql);
        // for the database
        $Loc = stripslashes($_POST['LocE']);
        $sql2 = "UPDATE `clinic` SET `Location` = '".$Loc."' WHERE `clinic`.`Clinical_ID` = 1";
        $rs2 = mysqli_query($conn, $sql2);

        // for the database
        $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
        // For image upload
        $target_dir = "images/";
        $target_file = $target_dir . basename($profileImageName);
        // VALIDATION
        // validate image size. Size is calculated in Bytes
        if($_FILES['profileImage']['size'] > 200000) {
          $msg = "Image size should not be greated than 200Kb";
          $msg_class = "alert-danger";
        }
        // check if file exists
        if(file_exists($target_file)) {
          $msg = "File already exists";
          $msg_class = "alert-danger";
        }
        // Upload image only if no errors
        if (empty($error)) {
          if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {

            $sql = "UPDATE `clinic` SET `Pic` = '".$profileImageName."' WHERE `clinic`.`Clinical_ID` = 1" ;
            if(mysqli_query($conn, $sql)){
              $msg = "Updated successfully";
              $msg_class = "alert-success";
            } else {
              $msg = "There was an error in the database";
              $msg_class = "alert-danger";
            }
          } else {
            $error = "There was an error uploading the file";
            $msg = "alert-danger";
          }
        }


}



?>
<!DOCTYPE html>
<html>
    <head>
        <link href="style1.css" rel="stylesheet"
        type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            body {
                background-image: url('Untitled.png');
                background-repeat: no-repeat;
                background-attachment: fixed;
  background-size: 100% 100%;


            }
            .Aboutus {
                margin-top: 50px;
                text-align: center;
                overflow-y: scroll;
                border: solid orange 2px;
                text-align: center;
                width: 70%;
                margin-left: 170px;
            }

        </style>



          <!--sol is here for editing button-->
          <!-- https://www.w3schools.com/icons/tryit.asp?filename=trybs_ref_glyph_edit -->
    </head>
    <body>
        <?php
        if(isset($successMsg))
        {
            echo "<div class='success-msg'>";
            print_r($successMsg);
            echo "</div>";
        }
    ?>
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
                        <a href="lgout.inc.php" class="nav-link">logout</a>
                    </li>
                    </ul>
                <img src="logo4.png" alt="profile picture" height="60" style="float:right">
                </div>
                </div>
              </nav>


        <div >
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post", enctype="multipart/form-data">
<h4 class="display-5 fw-bold">Add Picture:</h4>
<label for="fileField"><img src="about.jpg" alt="pet photo"   height="150" id="petPhoto" style="padding-left: 200%";   onclick="changeImage()"></label>
    <input type="file" id="fileField" onchange="displayImage(this)" name="profileImage" accept="image/*"  hidden="true">

<h4 style=" margin-left: 15%;">Write The about us that will Appear to all Website Users</h4>
<textarea id="abutusE" name="aboutusE" rows="13" cols="96" style="display: block; margin-left: auto; margin-right: auto; background-color: #e7dbc9; font-size: large;">Enter The New About Us</textarea>
<h4 style=" margin-left: 15%;">Change The location:</h4><textarea id="abutusE" style=" background-color: #e7dbc9; font-size:large; margin-left: 15%;" name="LocE" rows="2" cols="50" style="display: block;  background-color: #e7dbc9; font-size: large;">Enter The New Location</textarea>

            </div>

            <div style="text-align: center;">
            <input   type="submit" value="  Edit  " class="btn btn-info btn-lg"  name="Edit" >
            <a href="Show.php"  class="btn btn-info btn-lg"  name="DisplayE">Show</a>
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
        </div>

     </body>
</html >
