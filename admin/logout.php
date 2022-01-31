<!-- Wylogowywanie z panelu admina  -->

<?php
	session_start();
	unset($_SESSION['przycisk']);
	session_destroy();
	// Przechodzi na strone glowna
	header("Location: http://localhost/files/strona/index.php");
?>