<!doctype html>
<html>
<head>
<title>
Recherche simple d'une personne par ID
</title>
<meta charset="utf-8">
</head>
<body>
<?php $wanted=$_GET['ID'];
if (!empty($wanted)){
echo "<h1>Recherche de $wanted </h1>";
require_once('connect.php');
function connexion_bd(){
    $dsn="mysql:dbname=".BASE.";host=".SERVER;
    try{
    $connexion=new PDO($dsn,USER,PASSWD);
    }
    catch(PDOException $e){
    printf("Échec de la connexion : %s\n", $e->getMessage());
    exit();
    }
    return $connexion;
    }
    
$connexion=connexion_bd();

$sql="SELECT * from CARNET where ID='".$wanted."'";
if(!$connexion->query($sql))
echo "Pb de requete";
else{
foreach ($connexion->query($sql) as $row)
echo $row['NOM']." ".$row['PRENOM']."</br>\n";
}
}
?>
</body>
</html>