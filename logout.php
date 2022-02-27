<?php 

require_once('db.php');
$konekcija=(new mysqlconnector())->connectToMysql();


$sql_komanda="UPDATE users SET active=0 WHERE active=1";



// provera
if(mysqli_query($konekcija, $sql_komanda)) {
    header("Location: index.php");  
 }else {
    echo "Sql komanda nije uspela". mysqli_error($konekcija);
  }
  


?>