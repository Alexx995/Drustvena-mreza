<?php

require_once('db.php');
$konekcija=(new mysqlconnector())->connectToMysql();

$sql_komanda="DELETE FROM posts WHERE idp={$_POST['id']}";


// provera

if(mysqli_query($konekcija, $sql_komanda)) {
    header("Location: profile.php");
}else {
    echo "Sql komanda nije uspela". mysqli_error($konekcija);
}


?>