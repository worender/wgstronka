<?php


    session_start();

    if( isset($_POST['logout']) && $_POST['logout'] == 1 ){
        session_destroy();
        header("Location: logowanie.html");
        exit();
    }

    if( isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == 1 ){
        // Użytkownik jest zalogowany
    } else {
        header("Location: logowanie.html");
        exit();
    }
?>