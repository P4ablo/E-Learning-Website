<!-- Ustalenie informacji o bazie danych oraz loginu oraz hasla do logowania -->
<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$baza = 'moja_strona';

	$login = 'admin';
	$pass = 'admin';
	
	$link = mysqli_connect($dbhost, $dbuser, $dbpass, $baza);

	// Sprawdzanie połączenia
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
?>


