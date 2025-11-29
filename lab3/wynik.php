<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dane z formularza</title>
    <link rel="stylesheet" href="wynik.css">
</head>
<body>
      <a href="WojciechGuziewski.txt" >Plik z kodem php.</a> 
<?php 

   

    echo "<div>";
    
    if( isset($_POST["fname"]) and $_POST["fname"] != ""){
        $fname = $_POST["fname"];
        echo "<p><span>Imie: </span>$fname</p>";
    } 

    if( isset($_POST["surname"]) and $_POST["surname"] != ""){
        $surname = $_POST["surname"];
        echo "<p><span>Nazwisko: </span>$surname</p>";
    } 
        
      if( isset($_POST["date"]) and $_POST["date"] != ""){
        $date = $_POST["date"];
        echo "<p><span>Data urodzenia: </span>$date</p>";
    } 

       if( isset($_POST["password"]) and $_POST["password"] != ""){
        $password = $_POST["password"];
        echo "<p><span>Hasło: </span>$password</p>";
    } 

        if( isset($_POST["street"]) and $_POST["street"] != ""){
        $street = $_POST["street"];
        echo "<p><span>Ulica: </span>$street</p>";
    } 

          if( isset($_POST["city"]) and $_POST["city"] != ""){
        $city = $_POST["city"];
        echo "<p><span>Miasto: </span>$city</p>";
    } 

        if( isset($_POST["province"]) and $_POST["province"] != ""){
        $province = $_POST["province"];
        echo "<p><span>Województwo: </span>$province</p>";
    } 

     if( isset($_POST["email"]) and $_POST["email"] != ""){
        $email = $_POST["email"];
        echo "<p><span>Email: </span>$email</p>";
    } 

     if( isset($_POST["dlicence"]) and $_POST["dlicence"] == "on"){
        echo "<p><span>Prawo jazdy: </span>Tak</p>";
    }else{
        echo "<p><span>Prawo jazdy: </span>Nie</p>";
    }

    if( isset($_POST["gender"]) and $_POST["gender"] != ""){
        $gender = $_POST["gender"];
        echo "<p><span>Płeć: </span>$gender</p>";
    } 

     if( isset($_POST["phone"]) and $_POST["phone"] != ""){
        $phone = $_POST["phone"];
        echo "<p><span>Numer telefonu: </span>$phone</p>";
    } 

     if( isset($_POST["comment"]) and $_POST["comment"] != ""){
        $comment = $_POST["comment"];
        echo "<p><span>Uwagi: </span>$comment</p>";
    } 

    echo "</div>";
?>
</body>
</html>

