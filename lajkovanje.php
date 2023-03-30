<?php
require_once('db.php');
$konekcija = (new mysqlconnector())->connectToMysql();

//$post_id = $_POST["id"];
//
//
//
//$user_id = "SELECT id FROM users WHERE active=1";
//$userid = mysqli_query($konekcija, $user_id);
//$ovono = mysqli_fetch_assoc($userid);
//$imence = $ovono["id"];
//
//$sql_check = "SELECT * FROM likes WHERE user_id = $imence AND post_id = $post_id";
//$result_check = mysqli_query($konekcija, $sql_check);
//if (mysqli_num_rows($result_check) > 0) {
//    // The user has already liked the post, do not add another like
//    header("Location: views/main.html");
//    exit();
//}
//
//$sql = "INSERT INTO likes (user_id, post_id) VALUES ('$imence', '$post_id')";
//
//
//if (mysqli_query($konekcija, $sql)) {
//    $sql_update = "UPDATE posts SET `likes` = `likes`+1 WHERE idp = $post_id";
//    mysqli_query($konekcija, $sql_update);
//    header("Location: views/main.html");
//} else {
//    echo "Error: " . mysqli_error($konekcija);
//}

$post_id = $_POST["id"];

$user_id = "SELECT id FROM users WHERE active=1";
$userid = mysqli_query($konekcija, $user_id);
$ovono = mysqli_fetch_assoc($userid);
$imence = $ovono["id"];

$sql_check = "SELECT * FROM likes WHERE user_id = ? AND post_id = ?";
$stmt_check = mysqli_prepare($konekcija, $sql_check);
mysqli_stmt_bind_param($stmt_check, "ii", $imence, $post_id);
mysqli_stmt_execute($stmt_check);
$result_check = mysqli_stmt_get_result($stmt_check);

if (mysqli_num_rows($result_check) > 0) {
    // The user has already liked the post, do not add another like
    header("Location: views/main.html");
    exit();
}

$sql = "INSERT INTO likes (user_id, post_id) VALUES (?, ?)";
$stmt = mysqli_prepare($konekcija, $sql);
mysqli_stmt_bind_param($stmt, "ii", $imence, $post_id);

if (mysqli_stmt_execute($stmt)) {
    $sql_update = "UPDATE posts SET `likes` = `likes`+1 WHERE idp = ?";
    $stmt_update = mysqli_prepare($konekcija, $sql_update);
    mysqli_stmt_bind_param($stmt_update, "i", $post_id);
    mysqli_stmt_execute($stmt_update);
    header("Location: views/main.html");
} else {
    echo "Error: " . mysqli_error($konekcija);
}





?>