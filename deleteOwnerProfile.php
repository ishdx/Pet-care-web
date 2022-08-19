<?php
session_start();
?>

<?php
//including the database connection file
include_once("dbh.inc.php");

//getting id from url
$id = $_SESSION["userid"];


//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM pet_owner WHERE Owner_ID=$id");

//redirecting to the display page
header("Location:welcome.php");
?>