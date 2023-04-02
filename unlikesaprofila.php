<?php

require_once('db.php');
$konekcija = (new mysqlconnector())->connectToMysql();

$post_id = $_POST["id"];

$user_id = "SELECT id FROM users WHERE active=1";
$userid = mysqli_query($konekcija, $user_id);
$ovono = mysqli_fetch_assoc($userid);
$loggedId = $ovono["id"];

$sql_check = "SELECT * FROM likes WHERE user_id = $loggedId AND post_id = $post_id";
$result_check = mysqli_query($konekcija, $sql_check);
if (mysqli_num_rows($result_check) > 0) {
    // The user has already liked the post, delete the like
    $sql_delete = "DELETE FROM likes WHERE user_id = $loggedId AND post_id = $post_id";
    mysqli_query($konekcija, $sql_delete);

    $sql_update = "UPDATE posts SET `likes` = `likes`-1 WHERE idp = $post_id";
    mysqli_query($konekcija, $sql_update);
}

header("Location: views/profile.html");