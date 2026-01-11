<?php
    // Dołączamy skrypt sprawdzający czy użytkownik jest zalogowany
    require_once('spr_sesje.php');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Panel Użytkownika</title>
</head>
<body>
    <div class="container" style="display: block; text-align: center; max-width: 500px;">
        <h1>Witaj w systemie!</h1>
        <p>Zostałeś pomyślnie zalogowany jako: <strong><?php echo $_SESSION['username']; ?></strong></p>
        
        <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">
        
        <form action="spr_sesje.php" method="post">
            <input type="hidden" name="logout" value="1">
            <input type="submit" value="Wyloguj się" style="background: #e53e3e;">
        </form>
    </div>
</body>
</html>