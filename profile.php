<?php 
// if(!isset($_SESSION["email"])){
//     header("location: login.php");
//     }
require_once('db.php');
$konekcija=(new mysqlconnector())->connectToMysql();
session_start();
include "header.php";
?>

<?php 

if(isset($_SESSION["picture"])){
    echo $_SESSION["picture"];
}
 ?>

<?php //echo "<img src="slika" height=500 width=400 />";  ?>

<form action="uploadslika.php" method='POST' enctype="multipart/form-data">
    Select image to upload
    <input type="hidden" name='size' value='100000'>

    <input type="file" name='image'>

    <input type='submit' name="upload" value='Upload image'>


</form>

<?php

    $sql="SELECT profile_image, first_name, last_name FROM users WHERE active=1";

    $rezultat=mysqli_query($konekcija, $sql);

    $row = mysqli_fetch_assoc($rezultat);


    while(($row = mysqli_fetch_assoc($rezultat))) {
    $podaci[] = $row;
    }


    var_dump($podaci);
    return;

    foreach($podaci as $row){



    echo "<p><img src='" . $row['profile_image'] . "' height=200 width=150  ></p>
    <p><a href='profil.php'> " . $row['first_name'] . " " . $row['last_name'] .  "</a></p></form>";
    }

    ?>




<?php include "footer.php"; ?>