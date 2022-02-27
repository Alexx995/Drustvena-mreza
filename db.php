<?php

class mysqlconnector
{
    public function connectToMysql()
    {
        // parametri za vezu
        $server="localhost";
        $user="root";
        $password="";
        $baza="twiter";

        // ostvarivanje veze
        $konekcija=mysqli_connect($server, $user, $password, $baza);

        // sta ako dodje ili ne dodje do konekcije
////        if(!$konekcija) {
////            echo "Ovo ne radi";
////        } else {
////         echo "Ovo radi<br>";
//    }
        return $konekcija;  
    }
}
?>

<!-- require_once('mysqlconnector.php');
$konekcija=(new mysqlconnector())->connectToMysql(); -->
