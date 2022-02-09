function jour() {
    let d = new Date();
    let day = d.getDay();
    switch (day) {
        case 0:
            day = "dimanch";
            break;
        case 1:
            day = "lundi";
            break;
        case 2:
            day = "mardi";
            break;
        case 3:
            day = "mercredi";
            break;
        case 4:
            day = "jeudi";
            break;
        case 5:
            day = "vendredi";
            break;
        case 6:
            day = "samedi";
            break;

    }
    document.getElementById("jour").innerHTML = day;
}