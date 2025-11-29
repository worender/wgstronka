function pokazFormularz(button) {

    if(button.textContent == "Dodaj"){
        button.textContent = "Anuluj";

        document.getElementById("dane").innerHTML += `
    <div class="rekord8">
        <form method="post" action="lab7.php">
      <input type="text" name="id" placeholder="Id">
      <input type="text" name="imie" placeholder="Imię">
      <input type="text" name="nazwisko" placeholder="Nazwisko">
      <input type="number" name="wiek" placeholder="Wiek">
      <input type="email" name="email" placeholder="Email">
      <input type="text" name="telefon" placeholder="Numer telefonu">
      <input type="text" name="plec" placeholder="Płeć">
        <input type="submit" value="Zatwierdź">
      </form>
      </div>`;
    }else{
        button.textContent = "Dodaj";
        dane = document.getElementById("dane");
        inputs = dane.querySelectorAll("input");
        
        
        for(let i = 0; i < 7; i++){
           inputs[inputs.length - 1 - i].remove();
        }
    }

}
