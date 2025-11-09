var xhttp = new XMLHttpRequest();
xhttp.open("GET", "dane.xml", false);
xhttp.send();

var danexml = xhttp.responseXML;

pozycja = danexml.getElementsByTagName("pozycja");
suma = 0;

for (i = 0; i < pozycja.length; i++) {
    kwota = Number(pozycja[i].getElementsByTagName("wartoscBrutto")[0].firstChild.nodeValue);
    suma += kwota;
}
suma = Number(Math.round(suma + 'e+2') + 'e-2');
zlotowki = Math.trunc(suma);
grosze = Math.round(100*(suma - zlotowki));

document.getElementById("suma").innerHTML = zlotowki;
document.getElementById("suma2").innerHTML = grosze;



