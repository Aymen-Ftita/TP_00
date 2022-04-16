<?php
/** Classe Etudiant en PHP */
class Etudiant{
/** Identification unique d'un etudiant */
protected $etudiant_id;
/** Nom de l'etudiant */
protected $nom;
/** Date de naissance de l'etudiant */
protected $naissance;
public function __construct($id, $nom,$naissance){
$this->etudiant_id = (int)$id; // cast vers integer
$this->nom = (string)$nom; // cast vers string
$this->naissance= (int)$naissance; // cast vers date(timestamp)
}
/**
* Fonction de comparaison simplifiee entre etudiants
* == comparera id, nom et naissance
*/
public function equals(etudiant $etudiant){
return ($this->getId() == $etudiant->getId());
}
public function getId(){
return $this->etudiant_id;
}
public function getNom(){
return $this->nom;
}
public function getNaissance(){
return $this->naissance;
}
public function __toString(){
setlocale(LC_TIME, "fr_FR");
$ne=strftime('%A %d %B %Y',$this->naissance);
return 'etudiant: id=' . $this->getId().', nom='.$this->getNom()." $ne";
}
}
/* Test : */
date_default_timezone_set('Europe/Paris');
$etu=new Etudiant(234,"Talon",time());
var_dump($etu);
echo "<br/>";
echo $etu;
?>