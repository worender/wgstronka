function kliknietoCyfreDzialanie(button) {
    
    const display = document.getElementById('cDisplay');
    const displayVL = display.value.length;
    
    if (button.id == 'c=' && !(display.value.charAt(displayVL - 1) == '+' || 
    display.value.charAt(displayVL -1) == '-' || 
    display.value.charAt(displayVL - 1) == '*' ||
    display.value.charAt(displayVL - 1) == '/' ||
    display.value.charAt(displayVL - 1) == '.')) {

        display.value = eval(display.value);
        return;
    }

    if (button.id == 'bC') {
        display.value = '';
        return;
    }

   
   if (displayVL == 0) {

         if (!(button.innerText == '.' || button.innerText == '+' || button.innerText == '*' || button.innerText == '/')) {
            display.value += button.innerText;
            return;
         }
        }

    if (button.innerText == '.' && display.value.includes('.')) {
        ostatnieDzialaniIndex = 0;
        for (let i=0; i < display.value.length; i++) {
            if (display.value.charAt(i) == '+' || display.value.charAt(i) == '-' || display.value.charAt(i) == '*' || display.value.charAt(i) == '/') {
                if(ostatnieDzialaniIndex < i) ostatnieDzialaniIndex = i;
            }
        }

        let nowy_wycinek = display.value.slice(ostatnieDzialaniIndex + 1);
        if (nowy_wycinek.includes('.')) {
            return;
        }else{
            display.value += button.innerText;
            return;
        }

    }


   if (displayVL > 0 ) {
         if (  
             !(
                (display.value.charAt(displayVL - 1) == '+' || 
                display.value.charAt(displayVL -1) == '-' || 
                display.value.charAt(displayVL - 1) == '*' ||
                display.value.charAt(displayVL - 1) == '/' ||
                display.value.charAt(displayVL - 1) == '.')
            &&
                (button.innerText == '+' || 
                button.innerText == '-' || 
                button.innerText == '*' || 
                button.innerText == '/' ||
                button.innerText == '.' ||
                button.innerText == '=')
            )
         ){
            display.value += button.innerText;
            return;
        }  }


}


// TESTOWANIE KALKULATORA

// function poczekaj(ms) {
//     return new Promise(resolve => setTimeout(resolve, ms));
// }

// async function testCal(ile){
//     console.log("Test cal:");
//     display = document.getElementById('cDisplay');

//     for (let i = 0; i < ile; i++){
//         liczba1 = (Math.random() * 100);
//         liczba2 = (Math.random() * 100);
//         liczba3 = (Math.random() * 10);
//         dzialanie1 = ['+', '-', '*', '/'][Math.floor(Math.random() * 4)];
//         dzialanie2 = ['+', '-', '*', '/'][Math.floor(Math.random() * 4)];
//     display.value = liczba1 + dzialanie1 + liczba2 + dzialanie2 + liczba3;
//     policzone = eval(display.value);
//     await poczekaj(100);
//     kliknietoCyfreDzialanie(document.getElementById('c='));
//     await poczekaj(100);
//     wynik_testu = policzone == display.value;
//     console.log("Wynik testu: " + wynik_testu);
//     }

// }


function opencloseMENU(){
     const menu = document.querySelector('.menu');

    if (menu.style.display != "none") {
        menu.style.display = "none";
        document.getElementById("OpenCloseMenu").value = "☰";
        document.querySelector(".main").style.paddingTop = "20px";
        document.querySelector(".main").style.width = "100%";
    } else {
        menu.style.display = "block";
        document.getElementById("OpenCloseMenu").value = "<";
        document.querySelector(".main").style.paddingTop = "0px";
        document.querySelector(".main").style.width = "60%";


    }

    


}