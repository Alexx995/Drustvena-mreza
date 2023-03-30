<?php
session_start();
require_once('db.php');
$konekcija=(new mysqlconnector())->connectToMysql();


$postr=$_POST["post-profil"];



if(strlen($postr) > 100 ){
    $_SESSION["dugackoime"]="Post is to long";
    header("Location: views/profile.html");
    return;
}


$user_id="SELECT id FROM users WHERE active=1";
$userid=mysqli_query($konekcija, $user_id);
$ovono = mysqli_fetch_assoc($userid);
$imence= implode($ovono);

// var_dump($imence);
// return;


$sql_komanda="INSERT INTO posts (user_id, content, likes)
VALUES ('$imence', '$postr', 0)";


if(mysqli_query($konekcija, $sql_komanda)) {
    $_SESSION["posts"]="You added a post";
    header("Location: views/profile.html");
}else {
    echo "Sql komanda nije uspela". mysqli_error($konekcija);
}





?>