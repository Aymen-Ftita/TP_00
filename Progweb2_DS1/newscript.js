const CLEFAPI = '0f629a889c1f0dab2187a09af8b39cbd';
let resultatsAPI;

function geolocation(){
    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
    
            
            let long = position.coords.longitude;
            let lat = position.coords.latitude;
            
            AppelAPI(text);
            AppelAPI2(long, lat);
    
        }, () => {
            alert(`Vous avez refusé la géolocalisation, l'application ne peut pas fonctionner, veuillez l'activer.!`)
        })
    }}

    // recuperation des données (fetch()) par nom de ville

    function AppelAPI(text){
        
        fetch(`https://api.openweathermap.org/data/2.5/weather?q=${text}&exclude=minutely&units=metric&appid=${CLEFAPI}`)

        .then((reponse) => {
            return reponse.json();
        })
        .then((data) => {

             console.log(data);
             
             
             // affichage des données meteo actuelles
            
             document.getElementById("container1").innerHTML = "<h1>"+"&bull; "+"city :"+" " + data.name+"</h1>"+"<br>" + "<h1 >"+"&bull; "+
             "Current Temperature :"+ Math.trunc(data.main.temp) +" "+"°"+
             "</h1>" + "<br>" + "<h1>"+"&bull; "+"wind speed :"+" "+data.wind.speed+" "+"k/h"+"</h1>"+"<br>"
             + "<h1>"+"&bull; "+"Humidity :"+data.main.humidity+"%"+"</h1>"+"<br>"+
             "<h1>"+"&bull; "+"Current clouds :"+" "+data.weather[0].description +"</h1>"+"<br>"+"<h1>"+"&bull; "+"Pressure :"+" " + data.main.pressure+"</h1>";})
             
                   
    }

    // recuperation des données (fetch()) par latitude et longitude

    function AppelAPI2(long, lat) {

        fetch(`https://api.openweathermap.org/data/2.5/onecall?lat=${lat}&lon=${long}&exclude=minutely&units=metric&lang=fr&appid=${CLEFAPI}`)
        .then((reponse) => {
            return reponse.json();
        })
        .then((data) => {

            console.log(data);

             //affichage de la prevision de la semaine

             let d = new Date();
             let day = d.getDay();
             let days = ["DIM","LUN","MAR","MER","JEU","VEN","SAM"];

             let dail = "<tr>";
             let i=0;
             while(i<=6)
             {   
                 if(day<=6){
                    dail += "<th>"+ days[day] + "</th>";
                    i++;
                    day++;
                 }
                 else{day=0;}
             }
             dail +="</tr>";
             
             
             
             
             //affichage du temperatue maximale et minimale de tous le jours
             
             document.getElementById("container2").innerHTML = "<table border='1' >"+dail+"<tr>"+"<th>"+"Max:"+Math.trunc(data.daily[0].temp.max)+" °"+" Min:"+Math.trunc(data.daily[0].temp.min)+" °"+"</th>"+
             "<th>"+"Max:"+Math.trunc(data.daily[1].temp.max)+" °" +"  Min:"+Math.trunc(data.daily[1].temp.min)+" °" +"</th>"+"<th>"+"Max:"+Math.trunc(data.daily[2].temp.max)+" °"+" Min:"+Math.trunc(data.daily[2].temp.min)+" °" +"</th>"+"<th>"+"Max:"+Math.trunc(data.daily[3].temp.max)+" °"+" Min:"+Math.trunc(data.daily[3].temp.min)+" °" +"</th>"+
             "</th>"+"<th>"+"Max:"+Math.trunc(data.daily[4].temp.max)+" °"+" Min:"+Math.trunc(data.daily[4].temp.min)+" °" +"</th>"+"</th>"+"<th>"+"Max:"+Math.trunc(data.daily[5].temp.max)+" °"+" Min:"+Math.trunc(data.daily[5].temp.min)+" °" +"</th>"+"</th>"+"<th>"+"Max:"+Math.trunc(data.daily[6].temp.max)+" °"+" Min:"+Math.trunc(data.daily[6].temp.min)+" °" +"</th>"+
             "</tr>"+"</table>" 

             //affichage la prevision de la journée chaque 3 heures
             let CurrentH = new Date().getHours();
             //console.log(CurrentH);

             houly = "<tr>" + "<th>"+ CurrentH +" h" +"</th>";
             hour = CurrentH;
             j=0;
             for(let j = 0; j < 7;j++)
             {
                    houly +=  "<th>";
                    hour = hour + 3;
                if (hour < 24){
                    
                    houly += hour+" h" + "</th>";
                }/*else if(hour === 24){
                    hour = "00h";
                    houly += hour + "</th>";
                    
                }*/else if(hour >= 24){
                    
                    hour -= 24 ;
                    houly += "0"+hour+" h" +"</th>" ;
                }

            }
            houly +=  "</tr>";
            console.log(houly);
            document.getElementById("container3").innerHTML  = "<table border='1' >"+ houly +"<tr>"+"<th>"+Math.trunc(data.hourly[0].temp)+" °"+"</th>" +"<th>"+Math.trunc(data.hourly[3].temp)+" °"+"</th>"+"<th>"+Math.trunc(data.hourly[6].temp)+" °"+"</th>"+"<th>"+Math.trunc(data.hourly[9].temp)+" °"+"</th>"+"<th>"+Math.trunc(data.hourly[12].temp)+" °"+"</th>"+"<th>"+Math.trunc(data.hourly[15].temp)+" °"+"</th>"+"<th>"+Math.trunc(data.hourly[18].temp)+" °"+"</th>"+"<th>"+Math.trunc(data.hourly[21].temp)+" °"+"</th>"+"</tr>" +"</table>"; ;
            }
            
            ) }
    // dés on clique sur le boutton
    let ville = ["TUNIS","TATAOUINE","KASSERINE","MEDENINE","NABEUL","GAFSA","GABES","MAHDIA","SOUSSE","MONASTIR","JENDOUBA","SIDI BOU ZID","ARIANA",
                    "ARYANAH","MANOUBA","BEJA","KEF","TOZEUR","KEBILI","SFAX","BIZERTE","BEN AROUS","ZAGHOUAN","KAIROUAN","SILIANA","DJERBA"];
    function clkhere(){
        let txt=document.getElementById("text").value
        if(!txt){alert('Please enter the city name')}
        else if(ville.includes(txt.toUpperCase())===false){alert('CITY NOT FOUND')}
        else{
        text = document.getElementById("text").value;
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + text.toUpperCase() +  "</h1>" + "</i>";
        }
    }
    // dés on clique sur les villes sur le map
    function afficheTataouine(){
        text="Tataouine";
        geolocation();
        
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + text +  "</h1>" + "</i>";
    }

    function afficheTunis(){
        text="Tunis";
        geolocation();
        
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + Tunis.id + "</h1>" + "</i>";
        
    }

    function afficheMednine(){
        text="Medenine";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + text + "</h1>" + "</i>";
    }

    function afficheTouzeur(){
        text="Tozeur";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + text + "</h1>" + "</i>";
    }

    function afficheKebili(){
        text="Kebili";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + Kebili.id + "</h1>" + "</i>";
    }

    function afficheJendouba(){
        text="Jendouba";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + text + "</h1>" + "</i>";
    }

    function afficheGafsa(){
        text="Gafsa";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + Gafsa.id + "</h1>" + "</i>";
    }

    function afficheKasserine(){
        text="Kasserine";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + Kasserine.id + "</h1>" + "</i>";
    }
    
    function afficheKef(){
        text="Kef";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + Kef.id + "</h1>" + "</i>";
    }

    function afficheGabes(){
        text="Gabes";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + Gabes.id + "</h1>" + "</i>";
    }

    function afficheSfax(){
        text="Sfax";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + Sfax.id + "</h1>" + "</i>";
    }

    function afficheMahdia(){
        text="Mahdia";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + Mahdia.id + "</h1>" + "</i>";
    }

    function afficheMonastir(){
        text="Monastir";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + Monastir.id + "</h1>" + "</i>";
    }

    function afficheSousse(){
        text="Sousse";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + Sousse.id + "</h1>" + "</i>";
    }

    function afficheNabeul(){
        text="Nabeul";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + Nabeul.id + "</h1>" + "</i>";
    }

    function afficheBen_arous(){
        text="Ben arous";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + Ben_arous.id + "</h1>" + "</i>";
    }
    
    function afficheAriana(){
        text="Aryanah";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + Ariana.id + "</h1>" + "</i>";
    }

    function afficheBizerte(){
        text="Bizerte";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + Bizerte.id + "</h1>" + "</i>";
    }

    function afficheBeja(){
        text="Beja";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + Beja.id + "</h1>" + "</i>";
    }
    
    function afficheSiliana(){
        text="Siliana";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + Siliana.id + "</h1>" + "</i>";
    }
    
    function afficheSidi_Bou_Zid(){
        text="Sidi bou zid";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + Sidi_Bou_Zid.id + "</h1>" + "</i>";
    }
    
    function afficheKairouan(){
        text="Kairouan";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + Kairouan.id + "</h1>" + "</i>";
    }

    function afficheZaghouan(){
        text="Zaghouan";
        geolocation();
        let art = document.getElementById("art");
        art.innerHTML ="<i>"+ "<h1>" + Zaghouan.id + "</h1>" + "</i>";
    }
