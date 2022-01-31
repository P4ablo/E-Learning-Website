<head>
        <link rel="stylesheet" href="../css/styleadmina.css">
</head>

<?php
	//Tworzy sesję lub wznawia bieżącą na podstawie aktualnego identyfikatora sesji przekazanego przy wywołaniu, poprzez metodę POST
	session_start();
	

?>
	<a class="wstecz" href="../html/paneladmina.php">
		<button class="backButton">Back</button>
	</a> 
	
	<!-- Formularz dodawania rekordu do bazy danych -->
	<div>
		<h2>Adding row to database:</h2>
		<form method="post" name="addForm" enctype="multipart/form-data" action="dodajProdukt.php">
			
			<label for="tytul">Title</label>
			<input type="text" name="tytul"  required>
			
			<label for="opis">Description</label>
			<textarea type="text" name="opis"  rows="5" cols="30" placeholder="Dodaj opis" required></textarea>

			<label for="data_utworzenia">Creation Date</label>
			<input type="date" name="data_utworzenia"  required>
			
			<label for="data_modyfikacji">Modify Date</label>
			<input type="date" name="data_modyfikacji" >
			
			<label for="data_wygasniecia">End Date</label>
			<input type="date" name="data_wygasniecia"  required>
			
			<label for="cena_netto">Netto Price</label>
			<input type="text" name="cena_netto"  required>
			
			<label for="podatek_VAT">VAT Tax</label>
			<input type="text" name="podatek_vat"  required>
			
			<label for="ilosc_sztuk_na_magazynie">Quantity</label>
			<input type="text" name="ilosc"  required>
			
			<label for="status_dostepnosci">Availability Status</label>
			<input type="hidden" name="status" value="0" >
			<input type="checkbox" name="status" value="1" >
			
			<label for="kategoria">Category</label>
			<input type="text" name="kategoria"  required>
			
			<label for="gabaryt_produktu">Gauge</label>
			<input type="text" name="gabaryt"  required>
			
			<label for="zdjecie">Photo</label>
			<input type="text" name="zdjecie"  />
			
			


			<input type="submit" name="add_submit" class="addButton" value="ADD">
		</form>
	</div>
	
	

<?php
	if(isset($_POST['add_submit'])){
		include("../cfg.php");
		
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
		$zdjecie=$_POST['zdjecie'];
		// //$zdjecie = addslashes($_FILES['zdjecie']['tmp_name']);
		
		// $zdjecie = $_FILES['zdjecie']['tmp_name'];
		// //$name = $_FILES['zdjecie']['name'];
		// if(!empty($zdjecie)){
		// 	$zdjecie = base64_encode(file_get_contents(addslashes($zdjecie)));
		// }
		

		
		$data_utworzenia2 = date('Y-m-d', strtotime($_POST['data_utworzenia']));
		$data_modyfikacji2 = date('Y-m-d', strtotime($_POST['data_modyfikacji']));
		$data_wygasniecia2 = date('Y-m-d', strtotime($_POST['data_wygasniecia']));
		
		
		//Jeżeli pole formularza "matka" oraz "nazwa" zostały wypełnione, wstawiamy rekord do bazy danych
		if ((!empty($_POST['kategoria']) || $_POST['kategoria'] == '0') && !empty($_POST['tytul']))
		{
			
			//Dodanie rekordu do bazy danych
			//Wstawimy pobrane dane z formularza do bazy danych
			$ask=mysqli_query($link,"INSERT INTO produkty(tytul, opis, data_utworzenia, data_modyfikacji, data_wygasniecia, 
			cena_netto, podatek_vat, ilosc, status, kategoria, gabaryt, zdjecie) 
			VALUES ('$tytul', '$opis', '$data_utworzenia2', '$data_modyfikacji2', '$data_wygasniecia2', 
			'$cena_netto', '$podatek_VAT', '$ilosc_sztuk_na_magazynie', '$status_dostepnosci', '$kategoria', '$gabaryt', '$zdjecie');");
	
			
			
			
			
			if(!$ask){
				echo "Błąd zapytania";
			};
			echo "<div id='wiadomosc'>";
			echo "Dodano do bazy";
			echo "</div>";
		}
		else
		{
			echo "<div id='wiadomosc'>";
			echo "Uzupełnij wszystkie dane";
			echo "</div>";
		}
		
		//Zakończenie połączenia z bazą danych
		mysqli_close($link);
		
	};
?>