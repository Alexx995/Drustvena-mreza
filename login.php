<?php 
session_start();
include "header.php";?>

<form  action= "logovanje.php" method="post">
    <input type="text" name="email" placeholder="E-mail"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>
   <input type="submit" name="submit" placeholder="Register Now">

</form>


<?php 

if(isset($_SESSION["error"])){
    echo $_SESSION["error"];
    unset($_SESSION["error"]);
}
 ?>

 




<?php include "footer.php"; ?>
