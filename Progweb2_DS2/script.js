function clkhere1()
 {
     let name=document.getElementById("pseudo").value;
     let pass=document.getElementById("pass").value;

     if(!name || !pass){alert('Il y a quelque champ est vide , remplir tout les données')}
     if(pass<8){alert('Le mot de passe doit etre au moin 8 caractère ')}
    
 }

// function clkhere1()
// {
//     let name=document.getElementById("pseudo").value;
//     //let pass=document.getElementById("pass").value;
//     let field=document.getElementById("field").value;
//     field.innerHTML = 'All fields are required';
//     if(name==false){alert('Il y a quelque champ est vide , remplir tout les données')}
//     else {alert('NiiiiiiCE ;)')}
   
// }

 function clkhere2(){
    let nameI=document.getElementById("nameI").value;
     let passI=document.getElementById("passI").value;
     let emailI=document.getElementById("emailI").value;
    if(!nameI || !passI || !emailI){alert('Il y a quelque champ est vide , remplir tout les données')}
     else if(passI<8 || emailI.includes('@')==false){alert('Le mot de passe doit etre au moin 8 caractère ou email doit contient @ ')}
     else{alert('Data inserted successfully')}
 }

// function clkhere(){
//     let txt=document.getElementById("text").value
//     if(!txt){alert('Please enter the city name')}
//     else if(ville.includes(txt.toUpperCase())===false){alert('CITY NOT FOUND')}
//     else{
//     text = document.getElementById("text").value;
//     geolocation();
//     let art = document.getElementById("art");
//     art.innerHTML ="<i>"+ "<h1>" + text.toUpperCase() +  "</h1>" + "</i>";
//     }
// }
