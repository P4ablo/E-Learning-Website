<head>
	<link rel="stylesheet" href="../css/styleadmina.css">	
</head>

<?php
	//Tworzy sesję lub wznawia bieżącą na podstawie aktualnego identyfikatora sesji przekazanego przy wywołaniu, poprzez metodę POST
	session_start();
	

?>
	<a href="http://localhost/files/strona/html/paneladmina.php">
		<button class="backButton">Back</button>
	</a> 
	
	<!-- Formularz dodawania rekordu do bazy danych -->
	<div>
		<h2>Adding row to database:</h2>
		<form method="post" name="addForm" enctype="multipart/form-data" action="dodajKategorie.php">
			<label for="matka">Mother</label>
			<input type="text" name="matka" required>

			<label for="nazwa">Name</label>
			<textarea type="text" name="nazwa"  required>Add text</textarea>


			<input type="submit" name="add_submit" class="addInput" value="Add">
		</form>
	</div>
	
	

<?php
	if(isset($_POST['add_submit'])){
		include("../cfg.php");
		
		//Odbieranie danych z formularza
		$matka=$_POST['matka'];
		$nazwa=$_POST['nazwa'];
		
		//Jeżeli pole formularza "matka" oraz "nazwa" zostały wypełnione, wstawiamy rekord do bazy danych
		if ((!empty($_POST['matka']) || $_POST['matka'] == '0') && !empty($_POST['nazwa']))
		{
			if (!is_numeric($_POST['matka']))
			{
				echo "<div id='wiadomosc'>";
				echo "Mother field must be a number!";
				echo "</div>";
			}
			else
			{
				
				//Dodanie rekordu do bazy danych
				//Wstawimy pobrane dane z formularza do bazy danych
				$ask=mysqli_query($link,"INSERT INTO kategorie(matka, nazwa) VALUES ('$matka', '$nazwa');");
				if(!$ask){
					echo "Błąd zapytania";
				};
				echo "<div id='wiadomosc'>";
				echo "Add to database";
				echo "</div>";
			}
		}
		else
		{
			echo "<div id='wiadomosc'>";
			echo "Make all the data";
			echo "</div>";
		}
		
		//Zakończenie połączenia z bazą danych
		mysqli_close($link);
		
	};
?>