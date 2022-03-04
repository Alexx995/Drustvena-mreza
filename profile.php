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
    <h2><a href='profile.php'> " . $row['first_name'] . " " . $row['last_name'] .  "</a></h2></form>";


    ?>
    <form action="uploadslika.php" method='POST' enctype="multipart/form-data">
        Select image to upload
        <input type="hidden" name='size' value='100000'>

        <input type="file" name='image'>

        <input type='submit' name="upload" value='Upload image'>


    </form>

    <form action= "postovanjesaprofila.php" method="post">
        <h3>Create a new post</h3>
        <textarea name="post-profil" cols='60' rows='5' placeholder="Post content....."></textarea>
        <input type="submit" value="post" name="submit">

    </form>
<?php



$user_id="SELECT id FROM users WHERE active=1";
$userid=mysqli_query($konekcija, $user_id);

//if(mysql_num_rows($userid) <0){
//    echo "no results";
//}else{
$ovono = mysqli_fetch_assoc($userid);
$imence= implode($ovono);

$proba="SELECT users.profile_image, users.first_name, users.last_name, posts.content, posts.likes, posts.created_time, posts.id FROM users INNER JOIN posts ON users.id=posts.user_id WHERE users.id='$imence' ORDER BY posts.created_time  DESC";
$rezultat=mysqli_query($konekcija, $proba);



while(($row = mysqli_fetch_assoc($rezultat))) {
    $podaci[] = $row;
}



foreach($podaci as $row){



    echo "<p><img src='" . $row['profile_image'] . "' height=50 width=40  >
<a href='profile.php'> " . $row['first_name'] . " " . $row['last_name'] .  "</a></p>
<p>" . $row['content'] . "</p>
<p><i>Date: <b>" . $row['created_time'] . "</b></i></p>
<p>Likes: <b>" . $row['likes'] . "</b></p>
<form action='lajkovanje_sa_profila.php' method='post' name='lajk'><input value=".$row["id"]." name='id' hidden><button>Like</button></form>
<form action='brisanje_podataka.php' method='post'><input value=".$row["id"]." name='id' hidden><button>Delete</button></form>";
}


    ?>



<?php include "footer.php"; ?>