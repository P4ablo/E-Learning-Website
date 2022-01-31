<!-- Panel Administratora -->

<head>
	<link rel="stylesheet" href="../css/paneladmina.css">
</head>
<?php
    
    session_start();
	// Funkcja do wypisania podstron 
	function ListaPodstron()
	{
		include("../cfg.php");
		$query = "SELECT * FROM page_list WHERE 1 ORDER BY id ASC LIMIT 100";
		$result = mysqli_query($link, $query);
		
		while($row = mysqli_fetch_array($result))
		{
			$id = $row['id'];
			$page_title = $row['page_title'];
			
			echo "<tr><td>$id</td><td>$page_title</td></tr>";
		}
	}

	

	
    if(isSet($_SESSION['przycisk']))
	{
		// Menu działania dla Admina
	  echo "<h1>Welcome: </h1>".$_SESSION['przycisk'];
	  echo "<br/><br/>";
	  echo "<a href=\"../admin/logout.php\">Log out</a><br/>";
	  echo "<a href=\"../admin/dodaj.php\">Add page</a><br/>";
	  echo "<a href=\"../admin/usun.php\">Delete page</a><br/>";
	  echo "<a href=\"../admin/edytuj.php\">Edit page</a><br/>";
	  echo "<a href=\"../admin/contact.php\">Send E-mail</a><br/>";
	  echo "<br/><br/>";
	  echo "<table border=1 class='tabela1'>";
	  echo "<tr><th>id</td><th>Page Title</th></tr>";
	  echo ListaPodstron();
	  echo "</table>";

	 
		echo '<ul class ="lista">';
			  echo '<li><a href="../admin/kategorie.php">Categories</a></li>';
			  echo '<li><a href="../admin/produkty.php">Products</a></li>';
			  echo '<li><a href="../admin/sklep.php">Shop</a></li>';
		echo '</ul>';
	
	  
	}
	else{
		if(isset ($_SESSION['blad'])) 
		{
			echo $_SESSION['blad'];
		}
		
	}

	
?>


