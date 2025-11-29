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
  $query = $conn->prepare("DELETE FROM dane WHERE id = '$idUsun'");
  $query->execute();
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


foreach ($results as $wiersz) {
  $id = $wiersz['id'];
  $imie = $wiersz['imie'];
  $nazwisko = $wiersz['nazwisko'];
  $wiek = $wiersz['wiek'];
  $email = $wiersz['email'];
  $telefon = $wiersz['numer telefonu'];
  $plec = $wiersz['płeć'];

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
          </div>";
}

echo "</div>";

echo "<button onclick='pokazFormularz(this)'>Dodaj</button>";

echo "<script src='lab7.js'></script>";
?>
    
</body>
</html>