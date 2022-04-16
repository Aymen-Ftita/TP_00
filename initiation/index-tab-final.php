<html>
<head>
<title>
Connexion à MySQL avec PDO
</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>
Interrogation de la table CARNET avec PDO
</h1>
<?php
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
$sql="SELECT * from CARNET";
if(!$connexion->query($sql)) echo "Pb d'accès au CARNET";
else{
?>
<table class="centre" id="jolie">
<tr> <td> ID </td> <td> Prénom </td> <td> Nom </td><td> Naissance </td> </tr>
<?php
foreach ($connexion->query($sql) as $row)
echo "<tr><td>".$row['ID']."</td>
<td>".$row['PRENOM']."</td>
<td>".$row['NOM']."</td>
<td>".$row['NAISSANCE']."</td></tr><br/>\n";
?>
</table>
<?php } ?>
</body>
</html>
