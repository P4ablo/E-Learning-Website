<head>
	<link rel="stylesheet" href="../css/styleadmina.css">	
</head>


<?php
	//Tworzy sesję lub wznawia bieżącą na podstawie aktualnego identyfikatora sesji przekazanego przy wywołaniu, poprzez metodę POST
	session_start();
	include("../cfg.php");
	$id = "";
	
	//sprawdzenie czy zmienna $_GET['edit'] istnieje, jeśli tak, to do zmiennej $id jest przypisywana aktualna wartość tej zmiennej (tutaj będzie to id)
	if(isset($_GET['id']))
	{
	  $id = $_GET['id']; 
	}
	
	
	$query = "SELECT * FROM kategorie WHERE id='$id'";
	$result = mysqli_query($link, $query);

	//wyświetlenie danych z bazy z użyciem pętli while
	while($row = mysqli_fetch_array($result)){
		$matka=$row['matka'];
		$nazwa=$row['nazwa'];

	}

	if(isset($_POST['edit_submit'])){

		//Odbieranie danych z formularza
		$matka=$_POST['matka'];
		$nazwa=$_POST['nazwa'];
		
		
		

		//Modyfikacja rekordu w bazie danych
		//Edytujemy dane w bazie danych, zgodnie z wypełnionym formularzem
		$ask=mysqli_query($link,"UPDATE kategorie SET matka='$matka', nazwa='$nazwa' WHERE id='$id'");
		if(!$ask){
			echo "Błąd zapytania";
		}
	
		echo "<div id='wiadomosc'>";
		echo "Modified data";
		echo "</div>";


	
		//Zakończenie połączenia z bazą danych
		mysqli_close($link);
	}
?>

<!-- Formularz do edycji rekordu w bazie danych -->
<a href="http://localhost/files/strona/html/paneladmina.php">
		<button class="backButton">Back</button>
</a> 
<div>
	<h2>Edit row in database:</h2>
	<form method="post" name="editForm" enctype="multipart/form-data" action="">


		<label for="matka">Mother</label>
		<input type="text" name="matka" value="<?php echo $matka  ?>">

		<label for="nazwa">Name</label>
		<textarea type="text" name="nazwa" ><?php echo $nazwa  ?></textarea>


		<input type="submit" name="edit_submit" class="editInput" value="Edit">
	</form>
</div>