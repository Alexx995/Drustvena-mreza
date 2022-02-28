<?php
require_once('db.php');
$konekcija=(new mysqlconnector())->connectToMysql();


$lajk=$_POST["lajk"];



$sqlkomanda="UPDATE posts SET `likes` = `likes`+1 WHERE id={$_POST['id']}";


// provera
if(mysqli_query($konekcija, $sqlkomanda)) {
    header("Location: profile.php");
}else {
    echo "Sql komanda nije uspela". mysqli_error($konekcija);
}





?>