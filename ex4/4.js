var i = 0;
document.getElementById("nb").innerHTML = 0;
document.getElementById("ck").onclick = function() {
    i++;
    document.getElementById("nb").innerHTML = i;
}

function reset() {
    i = 0

    document.getElementById("nb").innerHTML = 0;
}