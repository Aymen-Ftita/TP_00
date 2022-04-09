//point 1
let vtab = ["lier", "chanter", "finir", "saisir", "aimer", "agir", "manger", "acheter", "payer", "accomplir", "réagir"];
//point 2
let pp = ["je", "tu", "il/elle/On", "Nous", "Vous", "ils/elles"];
//point 3
let c1 = ["e", "es", "e", "ons", "ez", "ent"];
let c2 = ["is", "is", "it", "issons", "issez", "issent"];
//point 4
function decide(a) {

    if (a.includes("er", a.length - 2)) {
        return 1;
    } else if (a.includes("ir", a.length - 2)) {
        return 2;
    } else {
        return 3;
    }
}
//point5
var verbe = vtab[1];
//point 6
if (decide(verbe) == 1) {
    pp.forEach(element => console.log(element + " " + verbe.replace("er", c1.at(pp.indexOf(element)))));
} else if (decide(verbe) == 2) { pp.forEach(element => console.log(element + " " + verbe.replace("ir", c2.at(pp.indexOf(element))))); }

//point 7
function afficheVerbe(v) {

    if (decide(v) == 1) {
        console.log("verbe:" + v + "de 1ere group");
        console.log("le " + v.replace("er", "eur") + " " + v.replace("er", "e"));
        pp.forEach(element => console.log(element + " " + v.replace("er", c1.at(pp.indexOf(element)))));

    } else if (decide(v) == 2) {
        console.log("verbe:" + v + "de 2eme group");
        pp.forEach(element => console.log(element + " " + verbe.replace("ir", c2.at(pp.indexOf(element)))));
    } else { console.log("saisi un verbe du 1ere ou 2eme group svp !") }

}