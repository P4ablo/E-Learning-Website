<!-- Sprawdzenie logowania użytkownika (czy haslo i login sa poprawne) -->

<?php

	require_once('../cfg.php');

	session_start();
	
	if (!empty($_POST['login']) && !empty($_POST['haslo']))
	{
		if ($_POST['login'] == $login && $_POST['haslo'] == $pass)
		{
			
			$_SESSION['przycisk'] = htmlspecialchars($_POST['login']);  
			unset($_SESSION['blad']);
            

		}
		else
		{
			$_SESSION['blad'] = '<span style="color:red"> Nieprawidłowy login lub hasło!</span>';
		}
	}


	header("Location: http://localhost/files/strona/html/paneladmina.php");      
?>