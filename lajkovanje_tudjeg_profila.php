<?php
require_once('db.php');
$konekcija=(new mysqlconnector())->connectToMysql();

$post_id = $_POST["id"];

$elseId = "SELECT user_id FROM posts WHERE idp = $post_id";
$result_elseId = mysqli_query($konekcija, $elseId);
$row_elseId = mysqli_fetch_assoc($result_elseId);
$user_id_post = $row_elseId["user_id"];


$user_id = "SELECT id FROM users WHERE active=1";
$userid = mysqli_query($konekcija, $user_id);
$ovono = mysqli_fetch_assoc($userid);
$loggedId = $ovono["id"];

$sql_check = "SELECT * FROM likes WHERE user_id = $loggedId AND post_id = $post_id";
$result_check = mysqli_query($konekcija, $sql_check);
if (mysqli_num_rows($result_check) > 0) {
    // The user has already liked the post, do not add another like
    header("Location: views/tudjiprofil.html?id=$user_id_post");
    exit();
}

$sql = "INSERT INTO likes (user_id, post_id) VALUES ('$loggedId', '$post_id')";



if (mysqli_query($konekcija, $sql)) {
    $sql_update = "UPDATE posts SET `likes` = `likes`+1 WHERE idp = $post_id";
    mysqli_query($konekcija, $sql_update);
    header("Location: views/tudjiprofil.html?id=$user_id_post");
} else {
    echo "Error: " . mysqli_error($konekcija);
}





?>