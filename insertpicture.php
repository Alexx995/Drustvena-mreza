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
$target = "views/slike/$image";
$description = $_POST["description"];



if (move_uploaded_file($tempname, $target)) {
    $sql_komanda = "INSERT INTO posts (user_id, content,description, likes) VALUES ('$loggedId', '$target','$description', 0)";
    mysqli_query($konekcija, $sql_komanda);
}
        header("Location: views/main.html");




