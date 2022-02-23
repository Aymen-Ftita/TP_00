var  films =[];

var film = object.create(Film);
film.init("Ta'ang",2016);
films.push(film);

film=object.create(Film);
film.init("Divines",2016);
films.push(film);

film=object.create(Film);
film.init("Juste la fin du monde",2016);
films.push(film);

films.forEach(function(film){
        console.log(film.decrire());
})

r=prompt("tapez le nom du film",0);

let f = film.filter(x => x = r);
let d = document.getElementById("resultat");
d.innerHTML += "nom du film :" + f + "année :" + Film.annee; 


