var Personnage = {

    initPerso : function ( nom , sante , force )
    {
        this.nom=nom;
        this.sante=sante;
        this.force=force;
    },

    decrire : function()
    {
        var decription ="nom : "+this.nom+"<br>"+"sante : "+this.sante+"<br>"+"Force :"+this.force+"<br>";
        return description;
    }

};

class Joueur extends Personnage {
       
    initJoueur(nom,sante,force)
    {
        super(nom,sante,force);
        this.XP=0;
    }
    
    decrire()
    {
        super(decrire) + "XP :"+ this.XP;
    }

    combattre(Adversaire)
    {return Adversaire.nom;}
}

class Adversaire extends Personnage 
{
    initAdversaire(nom,sante,force,race,valeur)
    {
        super(nom,sante,force)
        this.race="";
        this.valeur=0;
    }
}
