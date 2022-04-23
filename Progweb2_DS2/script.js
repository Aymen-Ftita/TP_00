 function clkhere1()
 {
     let name=document.getElementById("pseudo").value;
     let pass=document.getElementById("pass").value;

     if(!name || !pass){alert('Il y a quelque champ est vide , remplir tout les données')}
     if(pass<8){alert('Le mot de passe doit etre au moin 8 caractère ')}
    
 }