<?php
session_start();
// var_dump($_SESSION);
// return;
// if(!isset($_SESSION["email"])){
//     header("location: login.php");
// }
//session_start();
require_once('db.php');
$konekcija=(new mysqlconnector())->connectToMysql();
include "header.php";

?>

<?php

if(isset($_SESSION["email"])){
    $sesn=($_SESSION["email"]);
}


$sql = "SELECT profile_image, first_name, last_name FROM users WHERE email='$sesn'";

$rezultat = mysqli_query($konekcija, $sql);

$row = mysqli_fetch_assoc($rezultat);

echo "<p><img src='" . $row['profile_image'] . "' height=100 width=80  ></p>
    <h1><a href='profile.php'> " . $row['first_name'] . " " . $row['last_name'] . "</a></h1></form>";


?>
<br>


<form action="logout.php" name="logout">

<input type="submit" value="logout">

</form>



<form action= "postovanje.php" method="post">
    <h3>Create a new post</h3>
    <textarea name="post-status" cols='60' rows='10' placeholder="Post content....."></textarea>
    <input type="submit" value="post" name="submit">

</form>

<?php 

if(isset($_SESSION["posts"])){
    echo $_SESSION["posts"];
    unset($_SESSION["posts"]);
}
 ?>
 <br>
 <?php 

if(isset($_SESSION["dugackoime"])){
    echo $_SESSION["dugackoime"];
    unset($_SESSION["dugackoime"]);
}
 ?>

<?php
//$query="SELECT * FROM posts ORDER BY created_time  DESC ";

$proba="SELECT users.profile_image, users.first_name, users.last_name, posts.content, posts.likes, posts.created_time, users.id, posts.idp FROM users INNER JOIN posts ON users.id=posts.user_id ORDER BY posts.created_time  DESC";




$rezultat=mysqli_query($konekcija, $proba);



while(($row = mysqli_fetch_assoc($rezultat))) {
    $podaci[] = $row;
}



foreach($podaci as $row){



echo "<p><img src='" . $row['profile_image'] . "' height=50 width=40  >
<a href='tudjiprofil.php?id=".$row["id"]."''>" . $row['first_name'] . " " . $row['last_name'] .  "</a></p>
<p>" . $row['content'] . "</p>
<p><i>Date: <b>" . $row['created_time'] . "</b></i></p>
<p>Likes: <b>" . $row['likes'] . "</b></p>
<form action='lajkovanje.php' method='post' name='lajk'><input value=".$row['idp']." name='id' hidden><button>Like</button></form>";
}

?>
 

<?php include "footer.php"; ?>