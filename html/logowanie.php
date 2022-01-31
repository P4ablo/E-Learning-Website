<!-- Logowanie użytkownika -->

<?php
    // Rozpoczęcie sesji
    session_start();
?>

<head>
    <link rel="stylesheet" href="./css/stylelog.css">
</head>

    <form class="box" action="./admin/login.php" method="post">
        <h1>Login</h1>
        <input type="text" name="login" placeholder="Username">
        <input type="password" name="haslo" placeholder="Password">
        <input type="submit" name="przycisk" value="Login">
        <a href="index.php?idp=rejestracja" class="signin">Dont' have an account? Register here!</a><br>
        <a href="http://localhost/files/strona/admin/remindpass.php" class="signin">Click here if you forgot your password</a>
    </form>

