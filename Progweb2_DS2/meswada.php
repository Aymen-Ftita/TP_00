<?php
session_start();
require("connect.php");
$dsn="mysql:dbname=".BASE.";host=".SERVER;
try{
$connexion=new PDO($dsn,USER,PASSWD);
}
catch(PDOException $e){
printf("Échec de la connexion : %s\n", $e->getMessage());
exit();
}
$p=$_SESSION['perso'];
$sql="SELECT * from joueur WHERE Pseudo ='".$p."'";
foreach ($connexion->query($sql) as $row)
    echo $row['pari']."</br>\n";
// if($pair % 2 == 0){
//         echo "True , you win" ;
//     }


