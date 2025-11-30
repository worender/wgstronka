function pokazFormularz(button) {
  dane = document.getElementById("dane");

    if(button.textContent == "Dodaj"){
        button.textContent = "Anuluj";

        document.getElementById("dane").innerHTML += `
    <div class="rekord8">
        <form method="post" action="lab7.php">
      <input type="number" name="idDodaj" placeholder="Id (Automatycznie)" disabled>
      <input type="text" name="imie" placeholder="Imię" required>
      <input type="text" name="nazwisko" placeholder="Nazwisko" required>
      <input type="number" name="wiek" placeholder="Wiek" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="text" name="telefon" placeholder="Numer telefonu" required >
      <select name="plec" id='plec' required>
        <option value="Mężczyzna">Mężczyzna</option>
        <option value="Kobieta">Kobieta</option>
      </select>
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
        dane.querySelector("select").remove();
        

        
    }

}
