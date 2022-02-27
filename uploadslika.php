<?php
session_start();
require_once('db.php');
$konekcija=(new mysqlconnector())->connectToMysql();


$image=$_FILES['image']["name"];
$tempname = $_FILES["image"]["tmp_name"]; 
$target = "slike/".$image;

$sql_komanda="INSERT INTO users (profile_image)
 VALUES('$image')";
 mysqli_query($konekcija, $sql_komanda);


if (move_uploaded_file($tempname, $target))  {
  //echo "<img src=".$target." height=500 width=400 />";
  $_SESSION["picture"]="<img src=".$target." height=200 width=150 />";
  header("Location: profile.php"); 
}else{
  echo "Failed to upload image";
}




// $sql_komanda="UPDATE users SET profile_image='$target' WHERE 






?>