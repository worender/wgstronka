<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lab7.css">
    <title>Baza danych</title>
</head>
<body>
  
<?php

$servername = "localhost";
$username = "root";
$password = "";

try { 
  $conn = new PDO("mysql:host=$servername; dbname=lab7", $username, $password);
} catch (PDOException $e) {
  echo "Połączenie nie mogło zostać utworzone: " . $e->getMessage();
}

if(isset($_POST['idUsun'])){
  $idUsun = $_POST['idUsun'];
  $query = $conn->prepare("DELETE FROM dane WHERE id = :id");
  $query->bindParam(':id', $idUsun, PDO::PARAM_INT);
  $query->execute();

  header("Location: lab7.php");
  exit();
}

 
if(isset($_POST['imie'])){
  $imie = $_POST['imie'];
  $nazwisko = $_POST['nazwisko'];
  $wiek = $_POST['wiek'];
  $email = $_POST['email'];
  $telefon = $_POST['telefon'];
  $plec = $_POST['plec'];

  $query = $conn->prepare("INSERT INTO dane (imie, nazwisko, wiek, email, `numer telefonu`, płeć) VALUES (:imie, :nazwisko, :wiek, :email, :telefon, :plec)");
  $query->bindParam(':imie', $imie, PDO::PARAM_STR);
  $query->bindParam(':nazwisko', $nazwisko, PDO::PARAM_STR);
  $query->bindParam(':wiek', $wiek, PDO::PARAM_INT);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':telefon', $telefon, PDO::PARAM_STR);
  $query->bindParam(':plec', $plec, PDO::PARAM_STR);
  $query->execute();

   header("Location: lab7.php");
  exit();
}

try{
  $query = $conn->prepare("SELECT * FROM dane");
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Błąd zapytania: " . $e->getMessage();
}

echo "<div class='gridc' id='dane'>";
echo "
<div class='rekord'>Id</div>
<div class='rekord'>Imię</div>
<div class='rekord'>Nazwisko</div>
<div class='rekord'>Wiek</div>
<div class='rekord'>Email</div>
<div class='rekord'>Numer telefonu</div>
<div class='rekord'>Płeć</div>
<div class='rekord'>Opcje</div>";

if(isset($_POST['idAnuluj'])){
  unset($_POST['idEdytuj']);
}

if(isset($_POST['idZapisz'])){
  $idZapisz = $_POST['idZapisz'];
  $imie = $_POST['imieEdycja'];
  $nazwisko = $_POST['nazwiskoEdycja'];
  $wiek = $_POST['wiekEdycja'];
  $email = $_POST['emailEdycja'];
  $telefon = $_POST['telefonEdycja'];
  $plec = $_POST['plecEdycja'];

  $query = $conn->prepare("UPDATE dane SET imie = :imie, nazwisko = :nazwisko, wiek = :wiek, email = :email, `numer telefonu` = :telefon, płeć = :plec WHERE id = :id");
  $query->bindParam(':imie', $imie, PDO::PARAM_STR);
  $query->bindParam(':nazwisko', $nazwisko, PDO::PARAM_STR);
  $query->bindParam(':wiek', $wiek, PDO::PARAM_INT);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':telefon', $telefon, PDO::PARAM_INT);
  $query->bindParam(':plec', $plec, PDO::PARAM_STR);
  $query->bindParam(':id', $idZapisz, PDO::PARAM_INT);
  $query->execute();

   header("Location: lab7.php");
  exit();
}

foreach ($results as $wiersz) {
  $id = $wiersz['id'];
  $imie = $wiersz['imie'];
  $nazwisko = $wiersz['nazwisko'];
  $wiek = $wiersz['wiek'];
  $email = $wiersz['email'];
  $telefon = $wiersz['numer telefonu'];
  $plec = $wiersz['płeć'];

  if(isset($_POST['idEdytuj']) && $_POST['idEdytuj'] == $id){
    echo "<div class='rekord'>$id</div>
          <div class='rekord'><input type='text' name='imieEdycja' form='form$id' value='$imie'></div>
          <div class='rekord'><input type='text' name='nazwiskoEdycja' form='form$id' value='$nazwisko'></div>
          <div class='rekord'><input type='number' name='wiekEdycja' form='form$id' value='$wiek'></div>
          <div class='rekord'><input type='email' name='emailEdycja' form='form$id' value='$email'></div>
          <div class='rekord'><input type='number' name='telefonEdycja' form='form$id' value='$telefon' pattern='[0-9]{9}'></div>
          <div class='rekord'>
            <select name='plecEdycja' form='form$id'>
              <option value='Mężczyzna'" . ($plec == 'Mężczyzna' ? ' selected' : '') . ">Mężczyzna</option>
              <option value='Kobieta'" . ($plec == 'Kobieta' ? ' selected' : '') . ">Kobieta</option>
            </select>
          </div>
          <div class='rekord'>
            <form method='post' action='lab7.php' id='form$id' style='margin: 0; padding: 0; display: inline;'>
              <input type='hidden' name='idZapisz' value='$id'>
              <button type='submit'>Zapisz</button>
            </form>
            <form method='post' action='lab7.php' style='margin: 0; padding: 0; display: inline;'>
              <input type='hidden' name='idAnuluj' value='$id'>
              <button type='submit'>Anuluj</button>
            </form>
          </div>";
  }else{

  echo "<div class='rekord'>$id</div>
        <div class='rekord'>$imie</div>
        <div class='rekord'>$nazwisko</div>
        <div class='rekord'>$wiek</div>
        <div class='rekord'>$email</div>
        <div class='rekord'>$telefon</div>
        <div class='rekord'>$plec</div>
          <div class='rekord'>
            <form method='post' action='lab7.php' style='margin: 0; padding: 0; display: inline;'>
              <input type='hidden' name='idUsun' value='$id'>
              <button type='submit'>Usuń</button>
            </form>
            <form method='post' action='lab7.php' style='margin: 0; padding: 0; display: inline;'>
              <input type='hidden' name='idEdytuj' value='$id'>
              <button type='submit'>Edytuj</button>
            </form>
          </div>";
}}



echo "</div>";

echo "<button onclick='pokazFormularz(this)'>Dodaj</button>";

echo "<script src='lab7.js'></script>";
?>
    <a href="WojciechGuziewski.txt" >Plik z kodem php.</a> 
</body>
</html>