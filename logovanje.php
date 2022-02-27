<?php

require_once('db.php');
$konekcija=(new mysqlconnector())->connectToMysql();




$email=$_POST["email"];
$password=$_POST["password"];




$sql_komanda="SELECT * FROM users WHERE email='$email'";


$rezultat=mysqli_query($konekcija, $sql_komanda);
while(($row = mysqli_fetch_assoc($rezultat))) {
    $podaci[] = $row;
}

// var_dump($podaci);
// return;


session_start();
$_SESSION["error"]="";


if(empty($podaci)){
  $_SESSION["error"]="Sva polja moraju biti popunjena";
  header("Location: login.php"); 
  return;
  }
//
//   $sql="SELECT first_name AND last_name FROM users WHERE email='$email'";
//   var_dump($sql);
//   return;
//
//   $sqlq=mysqli_query($sql, $konekcija);
//
//   var_dump($sqlq);
//   return;
//
//   $_SESSION["ispis"]=$sqlq;
//   header("location: main.php");
  


 

  

 // var_dump(password_verify($password, $podaci[0]["pasword"]), $password, $podaci[0]["pasword"]);

//if(password_verify($password, $podaci[0]["password"])){
  $kontakt="UPDATE users SET active=1 WHERE email='$email' ";
 if(mysqli_query($konekcija, $kontakt)){
  $_SESSION["email"] = $email;
  header("Location: main.php");
}else{
  $_SESSION["error"]="Ne postoji takav nalog";
  header("Location: login.php"); 
  return;
}





//var_dump((mysqli_query($konekcija, $sql_komanda)));

// provera
// if(mysqli_query($konekcija, $kontakt)){
//     header("Location: main.php");  
//  }else {
//     echo "Sql komanda nije uspela". mysqli_error($konekcija);
//   }

?>
