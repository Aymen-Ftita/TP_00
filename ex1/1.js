function f1() {
    let r = prompt("rayon=", 0);
    const pi = 3.14;
    let per = 2 * pi * r;
    console.log(per);
    alert(per);
    document.getElementById("res").innerHTML = per;

}

function f2() {
    let lar = prompt("larger=", 0);
    let lon = prompt("longer=", 0);

    let per = lar * lon;
    console.log(per);
    alert(per);
    document.getElementById("res").innerHTML = per;

}