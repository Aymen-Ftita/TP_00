<!doctype html>
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
Interrogation de la table carnet avec PDO
</h1>
<?php
require("connect.php");
// pour oracle: $dsn="oci:dbname=//serveur:1521/base
// pour sqlite: $dsn="sqlite:/tmp/base.sqlite"
$dsn="mysql:dbname=".BASE.";host=".SERVER;
try{
$connexion=new PDO($dsn,USER,PASSWD);
}
catch(PDOException $e){
printf("Échec de la connexion : %s\n", $e->getMessage());
exit();
}
$sql="SELECT * from carnet";
if(!$connexion->query($sql)) echo "Pb d'accès au CARNET";
else{
    ?>
<table class="centre" id="jolie">
<tr> <td> ID </td> <td> Nom </td> <td> Prénom </td> <td> Date_naissance </td></tr>
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