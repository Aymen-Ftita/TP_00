<?php
class Personnage
{
private $_degats,
$_id,
$_nom;

const CEST_MOI = 1; 

const PERSONNAGE_TUE = 2; 
const PERSONNAGE_FRAPPE = 3; 

public function __construct(array $donnees)
{
$this->hydrate($donnees);
}
public function frapper(Personnage $perso)
{
if ($perso->id() == $this->_id)
{
return self::CEST_MOI;
}
// On indique au personnage qu'il doit recevoir des dégâts.
// Puis on retourne la valeur renvoyée par la méthode : self::PERSONNAGE_TUE ou
self::PERSONNAGE_FRAPPE
return $perso->recevoirDegats();
}
public function hydrate(array $donnees)
{
foreach ($donnees as $key => $value)
{
$method = 'set'.ucfirst($key);
if (method_exists($this, $method))
{
$this->$method($value);
}
}
}
public function recevoirDegats()
{
$this->_degats += 5;
// Si on a 100 de dégâts ou plus, on dit que le personnage a été tué.
if ($this->_degats >= 100)
{
return self::PERSONNAGE_TUE;
}
// Sinon, on se contente de dire que le personnage a bien été frappé.
return self::PERSONNAGE_FRAPPE;
const PERSONNAGE_FRAPPE = 3; 

public function __construct(array $donnees)
{
$this->hydrate($donnees);
}
public function frapper(Personnage $perso)
{
if ($perso->id() == $this->_id)
{
return self::CEST_MOI;
}
// On indique au personnage qu'il doit recevoir des dégâts.
// Puis on retourne la valeur renvoyée par la méthode : self::PERSONNAGE_TUE ou
self::PERSONNAGE_FRAPPE
return $perso->recevoirDegats();
}
public function hydrate(array $donnees)
{
foreach ($donnees as $key => $value)
{
$method = 'set'.ucfirst($key);
if (method_exists($this, $method))
{
$this->$method($value);
}
}
}
public function recevoirDegats()
{
$this->_degats += 5;
// Si on a 100 de dégâts ou plus, on dit que le personnage a été tué.
if ($this->_degats >= 100)
{
return self::PERSONNAGE_TUE;
}
// Sinon, on se contente de dire que le personnage a bien été frappé.
return self::PERSONNAGE_FRAPPE;
const PERSONNAGE_FRAPPE = 3; 

public function __construct(array $donnees)
{
$this->hydrate($donnees);
}
public function frapper(Personnage $perso)
{
if ($perso->id() == $this->_id)
{
return self::CEST_MOI;
}
// On indique au personnage qu'il doit recevoir des dégâts.
// Puis on retourne la valeur renvoyée par la méthode : self::PERSONNAGE_TUE ou
self::PERSONNAGE_FRAPPE
return $perso->recevoirDegats();
}
public function hydrate(array $donnees)
{
foreach ($donnees as $key => $value)
{
$method = 'set'.ucfirst($key);
if (method_exists($this, $method))
{
$this->$method($value);
}
}
}
public function recevoirDegats()
{
$this->_degats += 5;
// Si on a 100 de dégâts ou plus, on dit que le personnage a été tué.
if ($this->_degats >= 100)
{
return self::PERSONNAGE_TUE;
}
// Sinon, on se contente de dire que le personnage a bien été frappé.
return self::PERSONNAGE_FRAPPE;