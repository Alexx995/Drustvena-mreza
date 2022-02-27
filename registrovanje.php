<?php
session_start();
 
require_once('db.php');
$konekcija=(new mysqlconnector())->connectToMysql();

$ime=$_POST["first_name"];
$prezime=$_POST["last_name"];
$username=$_POST["username"];
$mail=$_POST["email"];
$password=$_POST["password"];
$rpassword=$_POST["rpassword"];


 
//  //proba
 
 $_SESSION["error"]="";


//  if(empty($ime or $prezime or $username or $mail or $password or $rpassword)){
//     $_SESSION["error"]="Unesite sva polja";
//     header("Location: register.php"); 
//     return;

//  }


 if(empty($ime)){
   $_SESSION["ime"]="Unesite polje ime";
   header("Location: register.php"); 
   
 }
 if(empty($prezime)){
   $_SESSION["prezime"]="Unesite polje prezime";
   header("Location: register.php"); 
   
 }
 if(empty($username)){
   $_SESSION["username"]="Unesite polje username";
   header("Location: register.php"); 
 
 }
 if(empty($mail)){
   $_SESSION["email"]="Unesite polje email";
   header("Location: register.php"); 
   
 }
 if(empty($password)){
   $_SESSION["password"]="Unesite polje password";
   header("Location: register.php"); 
   
 }
 if(empty($rpassword)){
   $_SESSION["rpassword"]="Unesite polje rpassword";
   header("Location: register.php"); 
   }
   if(strlen($ime) < 4 ){
      $_SESSION["kratkoime"]="Kratko ime";
      header("Location: register.php"); 
       return;
   }
//  if(strlen($ime) < 3){
//     $_SESSION["error"]="Kratko ime";
//  }
//  if(strlen($prezime) < 3) {
//     $_SESSION["error"]="Kratko prezime";
//  }
//  if(strlen($username) < 3) {
//     $_SESSION["error"]="Kratko Username";
//  }
//  if(strlen($username) > 20) {
//     $_SESSION["error"]="Predugacko Username";
//  }
//  if(strlen($password) < 8) {
//     $_SESSION["error"]="Kratak password";
//  }
//  if($password != $rpassword){
//     $_SESSION["error"]="Sifre se ne podudaraju";
//  }else{

   if($password === $rpassword){
      $passwordhash=password_hash($password, PASSWORD_DEFAULT);
   
   }


// kraj probe

$sql_komanda="INSERT INTO users (first_name, last_name, username, profile_image, email, password, active)
 VALUES('$ime', '$prezime', '$username', 'slike/slicica.png',  '$mail', '$passwordhash', 1)";

 

// provera
if(mysqli_query($konekcija, $sql_komanda)) {
    $_SESSION["status"]="You have been successfuly registered, please log in";    
    header("Location: register.php");  
 }else {
    echo "Sql komanda nije uspela". mysqli_error($konekcija);
  } 

  
  