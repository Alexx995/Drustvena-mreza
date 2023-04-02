<?php

require_once('db.php');
$konekcija = (new mysqlconnector())->connectToMysql();


$vari = $_POST['id'];


$elseId = "SELECT post_id FROM comment WHERE idc = {$_POST['id']}";
$result_elseId = mysqli_query($konekcija, $elseId);
$row_elseId = mysqli_fetch_assoc($result_elseId);
$user_id = $row_elseId["post_id"];


$sql = "DELETE FROM comment WHERE idc = $vari";


if (mysqli_query($konekcija, $sql)) {
    echo "Comment deleted successfully.";
} else {
    echo "Error deleting comment: " . mysqli_error($konekcija);
}


if (!empty($user_id)) {
    header("Location: views/comment.html?id=$user_id");
    exit;
} else {
    echo "Error : " . mysqli_error($konekcija);
}




