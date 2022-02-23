var p = object.create(Personnage);
p.initPerso("David",120,35);
var J=oblect.create(Joueur);
J.XP=200;
var A=initAdversaire("John",100,38,0,0);


let C1=document.GetElementById("C1");
let C2=document.GetElementById("C2");
let personne=document.GetElementById("personne");
let Adversaire=document.GetElementById("adversaire"); 

function affiche(){
    if(personne.checked){
        C1.innerHTML += J.decrire() ;
    }
    else{
        C2.innerHTML += J.combattre() ;
    }
}