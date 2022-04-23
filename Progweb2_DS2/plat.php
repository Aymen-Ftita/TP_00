<?php
 require "manager.class.php";
// $M = new manager();
// echo $M->header();
 require "joueur.class.php";
//  $host = "localhost";  
// $username = "root";  
// $password = "";  
// $database = "BD_Game";  
// $message = "";
// $con = new PDO("mysql:host=$host; 
// dbname=$database", $username, $password);
// $request=$con->query("SELECT * FROM joueur");
//  while($donnees=$request->fetch(PDO::FETCH_ASSOC)){
//   $J=new joueur($donnees);
//   echo $J->getPseudo();}

$J=new joueur(13,'aymen',10);
$M=new Manager();
$M->update($J);
echo $J->getnbrJ();
$J2=$M->get('aymen');
var_dump($J2); 
 
