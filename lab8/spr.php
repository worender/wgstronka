<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Document</title>
</head>
<body>
    
<div id="info">
<?php
    session_start();
$_SESSION['zalogowany'] = 0;

$servername = "localhost";
$username = "root";
$password = "";

try{
    $conn = new PDO("mysql:host=$servername; dbname=log", $username, $password);
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

if( isset($_POST['username']) && isset($_POST['password']) ){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $random_salt = bin2hex(random_bytes(16));
    $password_with_salt = $password . $random_salt;
    $hash = password_hash($password_with_salt, PASSWORD_BCRYPT);
   
    $query = $conn->prepare("SELECT * FROM danelog WHERE login = :username");
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->execute();

    if($query->rowCount() == 1){
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $stored_hash = $row['hash'];
        $stored_salt = $row['salt'];

        $passwordSalt = $password . $stored_salt;

        if(password_verify($passwordSalt, $stored_hash)){
            echo "Logowanie udane!";
            $_SESSION['zalogowany'] = 1;
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        }else{
            echo "Nieprawidłowa nazwa użytkownika lub hasło.";
            session_destroy();
            echo '<meta http-equiv="refresh" content="2;url=logowanie.html">';
            exit();
        }
    }else{
        echo "Nieprawidłowa nazwa użytkownika lub hasło.";
        
    }
}else{

}

?>
</div>
</body>
</html>