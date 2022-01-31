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
	
	
	$query = "SELECT * FROM produkty WHERE id='$id'";
	$result = mysqli_query($link, $query);

	//wyświetlenie danych z bazy z użyciem pętli while
	while($row = mysqli_fetch_array($result)){
		$tytul=$row['tytul'];
		$opis=$row['opis'];
		$data_utworzenia=$row['data_utworzenia'];
		$data_modyfikacji=$row['data_modyfikacji'];
		$data_wygasniecia=$row['data_wygasniecia'];
		$cena_netto=$row['cena_netto'];
		$podatek_VAT=$row['podatek_vat'];
		$ilosc_sztuk_na_magazynie=$row['ilosc'];
		$status_dostepnosci=$row['status'];
		$kategoria=$row['kategoria'];
		$gabaryt=$row['gabaryt'];
		//$zdjecie = '<img src="data:image;base64,'.$row['zdjecie'].'"/>;'
		$zdjecie=$row['zdjecie'];
		

	}

	if(isset($_POST['edit_submit'])){

		//Odbieranie danych z formularza
		$tytul=$_POST['tytul'];
		$opis=$_POST['opis'];
		$data_utworzenia=$_POST['data_utworzenia'];
		$data_modyfikacji=$_POST['data_modyfikacji'];
		$data_wygasniecia=$_POST['data_wygasniecia'];
		$cena_netto=$_POST['cena_netto'];
		$podatek_VAT=$_POST['podatek_vat'];
		$ilosc_sztuk_na_magazynie=$_POST['ilosc'];
		$status_dostepnosci=$_POST['status'];
		$kategoria=$_POST['kategoria'];
		$gabaryt=$_POST['gabaryt'];
		$zdjecie = $_POST['zdjecie'];
		
		if(!empty($zdjecie)){
			$zdjecie = base64_encode(file_get_contents(addslashes($zdjecie)));
		}
		
		$data_utworzenia2 = date('Y-m-d', strtotime($data_utworzenia));
		$data_modyfikacji2 = date('Y-m-d', strtotime($data_modyfikacji));
		$data_wygasniecia2 = date('Y-m-d', strtotime($data_wygasniecia));
		
		

		//Modyfikacja rekordu w bazie danych
		//Edytujemy dane w bazie danych, zgodnie z wypełnionym formularzem
		
		if(!empty($zdjecie)){
		
			$ask=mysqli_query($link,"UPDATE produkty SET tytul='$tytul', opis='$opis', data_utworzenia='$data_utworzenia2', data_modyfikacji='$data_modyfikacji2',
			data_wygasniecia='$data_wygasniecia2', cena_netto='$cena_netto', podatek_vat='$podatek_VAT', ilosc='$ilosc_sztuk_na_magazynie',
			status='$status_dostepnosci', kategoria='$kategoria', gabaryt='$gabaryt', zdjecie='$zdjecie' WHERE id='$id'");
		}
		else
		{
			$ask=mysqli_query($link,"UPDATE produkty SET tytul='$tytul', opis='$opis', data_utworzenia='$data_utworzenia2', data_modyfikacji='$data_modyfikacji2',
			data_wygasniecia='$data_wygasniecia2', cena_netto='$cena_netto', podatek_vat='$podatek_VAT', ilosc='$ilosc_sztuk_na_magazynie',
			status='$status_dostepnosci', kategoria='$kategoria', gabaryt='$gabaryt', zdjecie='$zdjecie' WHERE id='$id'");
		}
	
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
<div >
<a  href="../html/paneladmina.php">
	<button class="backButton">Back</button>
</a> 
	<h2 >Edit row in database:</h2>
	<form method="post" name="editForm" enctype="multipart/form-data" action="">


	    <label for="tytul">Title</label>
		<input type="text" name="tytul"  value="<?php echo $tytul  ?>">
		
		<label for="opis">Description</label>
		<textarea type="text" name="opis" rows="5" cols="30" placeholder="Dodaj opis"> <?php echo $opis  ?></textarea>

		<label for="data_utworzenia">Creation Date</label>
		<input type="date" name="data_utworzenia" value="<?php echo $data_utworzenia  ?>">
		
		<label for="data_modyfikacji">Modify Date</label>
		<input type="date" name="data_modyfikacji"  value="<?php echo $data_modyfikacji  ?>">
		
		<label for="data_wygasniecia">End Day</label>
		<input type="date" name="data_wygasniecia"  value="<?php echo $data_wygasniecia  ?>">
		
		<label for="cena_netto">Netto Price</label>
		<input type="text" name="cena_netto"  value="<?php echo $cena_netto  ?>">
		
		<label for="podatek_VAT">VAT Tax</label>
		<input type="text" name="podatek_vat"  value="<?php echo $podatek_VAT  ?>">
		
		<label for="ilosc_sztuk_na_magazynie">Quantity</label>
		<input type="text" name="ilosc"  value="<?php echo $ilosc_sztuk_na_magazynie  ?>">
		
		<label for="status_dostepnosci">Availability Status</label>
		<input type="hidden" name="status_dostepnosci" value="0" >
		<input type="checkbox" name="status" value="1" 
		<?php
		if($status_dostepnosci == 1){
			echo "checked";
		}
		?>
		>
		
		
		<label for="kategoria">Category</label>
		<input type="text" name="kategoria" class="dodaj" class="edytuj" value="<?php echo $kategoria  ?>">
		
		<label for="gabaryt_produktu">Gauge</label>
		<input type="text" name="gabaryt" class="edytuj" value="<?php echo $gabaryt  ?>">
		
		
		<label for="zdjecie">Photo</label>
		<input type="text" name="zdjecie" class="edytuj">




		<input type="submit" name="edit_submit" class="editInput" value="Edit">
	</form>
</div>