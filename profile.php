<?php 
// if(!isset($_SESSION["email"])){
//     header("location: login.php");
//     }
require_once('db.php');
$konekcija=(new mysqlconnector())->connectToMysql();
session_start();
include "header.php";
?>

<?php //
//
//if(isset($_SESSION["picture"])){
//    echo $_SESSION["picture"];
//}
// ?>

<?php

    $sql="SELECT profile_image, first_name, last_name FROM users WHERE active=1";

    $rezultat=mysqli_query($konekcija, $sql);

    $row = mysqli_fetch_assoc($rezultat);

    echo "<p><img src='" . $row['profile_image'] . "' height=200 width=150  ></p>
    <p><a href='profile.php'> " . $row['first_name'] . " " . $row['last_name'] .  "</a></p></form>";


    ?>
    <form action="uploadslika.php" method='POST' enctype="multipart/form-data">
        Select image to upload
        <input type="hidden" name='size' value='100000'>

        <input type="file" name='image'>

        <input type='submit' name="upload" value='Upload image'>


    </form>

    <form action= "postovanje.php" method="post">
        <h3>Create a new post</h3>
        <textarea name="post-status" cols='60' rows='5' placeholder="Post content....."></textarea>
        <input type="submit" value="post" name="submit">

    </form>






<?php include "footer.php"; ?>