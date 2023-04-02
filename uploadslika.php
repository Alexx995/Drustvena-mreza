<?php
session_start();
require_once('db.php');
$konekcija=(new mysqlconnector())->connectToMysql();

$user_id="SELECT id FROM users WHERE active=1";
$userid=mysqli_query($konekcija, $user_id);
$ovono = mysqli_fetch_assoc($userid);
$loggedId= implode($ovono);


$image=$_FILES['image']["name"];
$tempname = $_FILES["image"]["tmp_name"]; 
$target = "slike/$image";

//$sql_komanda="INSERT INTO users (profile_image)
// VALUES('$image')";
// mysqli_query($konekcija, $sql_komanda);

$sql_komanda="UPDATE users SET  profile_image='$target' WHERE id='$loggedId' ";
mysqli_query($konekcija, $sql_komanda);

header("Location: views/profile.html");







?>