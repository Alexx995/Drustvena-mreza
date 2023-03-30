<?php
session_start();
require_once('db.php');
$konekcija=(new mysqlconnector())->connectToMysql();


if (isset($_POST["submit"])) {
    if (empty($_POST["post-status"])) {
        $_SESSION["error"] = "Post content cannot be empty.";
        header("Location: views/main.html");
        exit;
    } else {
        // process the post if it's not empty
        $postr = $_POST["post-status"];
        // ...
    }
}

if(strlen($postr) > 100 ){
    $_SESSION["dugackoime"]="Post is to long";
    header("Location: views/main.html");
    return;
}


$user_id="SELECT id FROM users WHERE active=1";
    $userid=mysqli_query($konekcija, $user_id);
    $ovono = mysqli_fetch_assoc($userid);
    $imence= implode($ovono);

  // var_dump($imence);
  // return;


$sql_komanda="INSERT INTO posts (user_id, content)
VALUES ('$imence', '$postr')";


if(mysqli_query($konekcija, $sql_komanda)) {
   $_SESSION["posts"]="You added a post";    
    header("Location: views/main.html");
 }else {
    echo "Sql komanda nije uspela". mysqli_error($konekcija);
  } 





?>