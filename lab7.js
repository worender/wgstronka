function pokazFormularz(button) {
  dane = document.getElementById("dane");

    if(button.textContent == "Dodaj"){
        button.textContent = "Anuluj";

        document.getElementById("dane").innerHTML += `
      <input type="number" name="idDodaj" placeholder="Id (Automatycznie)"  form="formDodaj" disabled >
      <input type="text" name="imie" placeholder="Imię" form="formDodaj" required>
      <input type="text" name="nazwisko" placeholder="Nazwisko" form="formDodaj" required>
      <input type="number" name="wiek" placeholder="Wiek" form="formDodaj"  max="150" min="0" required>
      <input type="email" name="email" placeholder="Email" form="formDodaj" required>
      <input type="number" name="telefon" placeholder="Numer telefonu" form="formDodaj" pattern="[0-9]{9}" required >
      <select name="plec" id='plec' form="formDodaj" required>
        <option value="Mężczyzna">Mężczyzna</option>
        <option value="Kobieta">Kobieta</option>
      </select>
      <form method="post" action="lab7.php" id="formDodaj">
        <input type="submit" value="Zatwierdź">
      </form>`;
    }else{
        button.textContent = "Dodaj";
        dane = document.getElementById("dane");
        inputs = dane.querySelectorAll("input");
        
        
        for(let i = 0; i < 7; i++){
           inputs[inputs.length - 1 - i].remove();
        }
        dane.querySelector("select").remove();
        dane.querySelector("#formDodaj").remove();
        

        
    }

}
