<!doctype html>
<html>
<head>
<title>
Recherche préparée d'une personne par ID
</title>
<meta charset="utf-8">
</head>
<body>
<?php $wanted=$_GET['ID'];
if (!empty($wanted)){
echo "<h1>Recherche de $wanted </h1>";
require_once('connect.php');

function connect_bd(){
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

$connexion=connect_bd();
$sql="SELECT * from CARNET where ID=:id";
$stmt=$connexion->prepare($sql);
$stmt->bindParam(':id', $_GET['ID']);
$stmt->execute();
if (!$stmt) echo "Pb d'accès au CARNET";
else{
if ($stmt->rowCount()==0) echo "Inconnu !<br/>";
else
foreach ($stmt as $row)
echo $row['PRENOM']." ".$row['NOM']." né(e) le ".$row['NAISSANCE']."<br/>";
}
}
?>
</body>
</html>