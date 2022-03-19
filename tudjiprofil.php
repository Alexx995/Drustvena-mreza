<?php
require_once('db.php');
$konekcija=(new mysqlconnector())->connectToMysql();
session_start();
include "header.php";



$id=$_GET["id"];



$sql="SELECT profile_image, first_name, last_name, id FROM users WHERE id='$id'";

$rezultat=mysqli_query($konekcija, $sql);
$row = mysqli_fetch_assoc($rezultat);


echo "<p><img src='" . $row['profile_image'] . "' height=200 width=150  ></p>
    <p><a href='tudjiprofil.php?id=".$row["id"]."''>" . $row['first_name'] . " " . $row['last_name'] .  "</a></p></form>";

$proba="SELECT users.profile_image, users.first_name, users.last_name, posts.content, posts.likes, posts.created_time, posts.idp, users.id FROM users INNER JOIN posts ON users.id=posts.user_id WHERE users.id='$id' ORDER BY posts.created_time  DESC";
$rezultat=mysqli_query($konekcija, $proba);



while(($row = mysqli_fetch_assoc($rezultat))) {
    $podaci[] = $row;
}



foreach($podaci as $row) {


    echo "<p><img src='" . $row['profile_image'] . "' height=50 width=40  >
<a href='tudjiprofil.php?id=".$row["id"]."''>" . $row['first_name'] . " " . $row['last_name'] . "</a></p>
<p>" . $row['content'] . "</p>
<p><i>Date: <b>" . $row['created_time'] . "</b></i></p>
<p>Likes: <b>" . $row['likes'] . "</b></p>
<form action='lajkovanje_tudjeg_profila.php' method='post' name='lajk'><input value=" . $row["idp"] . " name='id' hidden><button>Like</button></form>";

}

?>
