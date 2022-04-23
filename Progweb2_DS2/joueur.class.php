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


class joueur{

    protected $id;
    protected $Pseudo;
    protected $nbrJ ;
    
    
    public function __construct($id , $Pseudo , $nbrej )
	{
		$this->id=(int)$id;
		$this->Pseudo=(string)$Pseudo;
		$this->nbrJ=(int)$nbrej;
	}

    public function hydrate(array $donnees)
    {
        foreach($donnees as $key->$value)
        {
            $method='set'.ucfirst($key);
            if(methos_exists($this,$method))
            {
                $this->$method($value);
            }
        } 
    } 
    
    public function getId()
    {
        return $this->ID;
    }

    public function getPseudo()
    {
        return $this->Pseudo;
    }

    public function getnbrJ()
    {
        return $this->nbrJ;
    }

    
    public function setid($id){
        $this->id = $id;
    }
    
    public function setPseudo($pseudo){
        $this->Pseudo = $pseudo;
    }
    
    public function setnbrJ($nbrj){
        $this->nbrJ = (int)$nbrj;
    }
    
    
    public function __toString()
    {
        
        return 'joueur: id=' . $this->getId().', Pseudo='.$this->getPseudo() ;
    }
}

     

    

//   $j = new joueur(457,"Aymen");

//   echo $j->toString();
?>