let tab = ["lire", "chanter", "aimer ", "manger", "acheter", "payer"];
tab.forEach(function(Element) {
    console.log(verbe(Element));
});



function verbe(vr) {


    let nd = vr.replace("er", "eur");
    let text = vr + ": le " + nd + " " + vr.replace("er", "e");
    return text;

}