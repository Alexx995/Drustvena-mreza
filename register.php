<?php 
session_start();
include "header.php";
 ?>


<form  action= "registrovanje.php" method="post">
    <input type="text" name="first_name" placeholder="First name"><br>
    <?php if(isset($_SESSION["ime"])){echo $_SESSION["ime"];unset($_SESSION["ime"]);}?>
    <?php if(isset($_SESSION["kratkoime"])){echo $_SESSION["kratkoime"];unset($_SESSION["kratkoime"]);}?><br>

    <input type="text" name="last_name" placeholder="Last name"><br>
    <?php if(isset($_SESSION["prezime"])){echo $_SESSION["prezime"];unset($_SESSION["prezime"]);}?><br>
    
    
    <input type="text" name="username" placeholder="Username"><br>
    <?php if(isset($_SESSION["username"])){echo $_SESSION["username"];unset($_SESSION["username"]);}?><br>
    
    
    
    <input type="email" name="email" placeholder="Email"><br>
    <?php if(isset($_SESSION["email"])){echo $_SESSION["email"];unset($_SESSION["email"]);}?><br>
    
    
    
    <input type="password" name="password" placeholder="Password"><br>
    <?php if(isset($_SESSION["password"])){echo $_SESSION["password"];unset($_SESSION["password"]);}?><br>
    
    
    
    <input type="password" name="rpassword" placeholder="Confirm password"><br>
    <?php if(isset($_SESSION["rpassword"])){echo $_SESSION["rpassword"];unset($_SESSION["rpassword"]);}?><br>
    
    
    <input type="submit" name="submit" placeholder="Register Now">

</form>



<?php 

if(isset($_SESSION["status"])){
    echo $_SESSION["status"];
    unset($_SESSION["status"]);
}
 ?>

<?php 

if(isset($_SESSION["error"])){
    echo $_SESSION["error"];
    unset($_SESSION["error"]);
}
 ?>






<?php include "footer.php"; ?>