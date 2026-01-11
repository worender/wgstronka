<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<div id="info">
<?php

$servername = "localhost";
$username = "root";
$password = "";

try{
    $conn = new PDO("mysql:host=$servername; dbname=log", $username, $password);
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

if( isset($_POST['new_username']) && isset($_POST['new_password']) && isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['email']) ){
    $username = $_POST['new_username'];
    $password = $_POST['new_password'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['email'];

    $random_salt = bin2hex(random_bytes(16));
    $password_with_salt = $password . $random_salt;

    $query = $conn->prepare("SELECT * FROM danelog WHERE login = :username");
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->execute();

    if($query->rowCount() > 0){
        echo "Nazwa użytkownika już istnieje. Wybierz inną.";
        echo '<meta http-equiv="refresh" content="2;url=logowanie.html">';
        exit();
    }

    $hash = password_hash($password_with_salt, PASSWORD_BCRYPT);
    $query = $conn->prepare("INSERT INTO danelog (login, hash, salt, imie, nazwisko, email) VALUES (:username, :hash,:salt, :imie, :nazwisko, :email)");
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':hash', $hash, PDO::PARAM_STR);
    $query->bindParam(':salt', $random_salt, PDO::PARAM_STR);
    $query->bindParam(':imie', $imie, PDO::PARAM_STR);
    $query->bindParam(':nazwisko', $nazwisko, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);

    try{
        $query->execute();
        echo "Rejestracja udana!";
        echo '<meta http-equiv="refresh" content="2;url=logowanie.html">';
            exit();
    }
    catch(PDOException $e){
        echo "Błąd rejestracji: " . $e->getMessage();
        echo '<meta http-equiv="refresh" content="2;url=logowanie.html">';
            exit();
    }

}else{
    echo "Proszę wypełnić wszystkie pola.";
    echo '<meta http-equiv="refresh" content="2;url=logowanie.html">';
            exit();
}
?>
</div>
</body>
</html>