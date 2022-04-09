function creerEleve(nom, note, photo) {
    this.nom = nom;
    this.note = note;
    this.photo = photo;

}
var eleve = new Array();
//remplisage de tab 
eleve[0] = new creerEleve("tata", 8, "et.png");
eleve[1] = new creerEleve("tete", 12, "et0.jpg");
eleve[2] = new creerEleve("titi", 9, "et0.jpg");
eleve[3] = new creerEleve("toto", 12, "et0.jpg");
eleve[4] = new creerEleve("tutu", 17, "et.png");
eleve[5] = new creerEleve("tate", 18, "et.png");
eleve[6] = new creerEleve("tati", 15, "et0.jpg");
eleve[7] = new creerEleve("tato", 13, "et.png");
// affiche le tab non trie
function depart() {
    document.getElementById("tab").innerHTML = "<tr><th>prenome</th><th>notes</th><th>photo</th></tr>";
    eleve.forEach(function(element) {
        document.getElementById("tab").innerHTML += "<tr >" + "<th>" + element.nom + "</th>" + "<th>" + element.note + "</th>" + "<th><img src='" + element.photo + "'style='width:200px;height:100px;'></th>" + "</tr>";
    });


}
// affiche le tab trie par nom
function trinom() {
    document.getElementById("tab").innerHTML = "<tr><th>prenome</th><th>notes</th><th>photo</th></tr>";
    let tb = eleve.sort(function(a, b) {
        var nameA = a.nom.toUpperCase();
        var nameB = b.nom.toUpperCase();
        if (nameA < nameB) {
            return -1;
        }
        if (nameA > nameB) {
            return 1;
        }
        return 0;
    });
    tb.forEach(function(element) {
        document.getElementById("tab").innerHTML += "<tr >" + "<th>" + element.nom + "</th>" + "<th>" + element.note + "</th>" + "<th><img src='" + element.photo + "'style='width:200px;height:100px;'></th>" + "</tr>";
    });

}
// affiche le tab trie pa note
function trinote() {
    document.getElementById("tab").innerHTML = "<tr><th>prenome</th><th>notes</th><th>photo</th></tr>";
    let tr = eleve.sort((a, b) => a.note - b.note);
    tr.forEach(function(element) {
        document.getElementById("tab").innerHTML += "<tr >" + "<th>" + element.nom + "</th>" + "<th>" + element.note + "</th>" + "<th><img src='" + element.photo + "'style='width:200px;height:100px;'></th>" + "</tr>";
    });
};