<?php
require_once('db.php');
$konekcija=(new mysqlconnector())->connectToMysql();
session_start();
include "../header.html";

$user_id="SELECT id FROM users WHERE active=1";
$userid=mysqli_query($konekcija, $user_id);
$ovono = mysqli_fetch_assoc($userid);
$imence= implode($ovono);

$posts_id=$_POST['post_id'];


$comment=$_POST['comment'];


$sql="INSERT INTO comment (user_id, comment, post_id) VALUES ('$imence', '$comment', '$posts_id')";




if(mysqli_query($konekcija, $sql)) {
    header("Location: views/comment.html?id=$posts_id");
}else {
    echo "Sql komanda nije uspela". mysqli_error($konekcija);
}




