<!-- Usuwanie istniejącej podstrony -->
<head>
	<link rel="stylesheet" href="../css/styleadmina.css">	
</head>

<?php
	// Rozpoczecie sesji
	session_start();
	

?>
	<a href="http://localhost/files/strona/html/paneladmina.php">
		<button class="backButton">Back</button>
	</a> 
	<div>
		<h1>Deleting page from database</h1>
		<form method="post" name="deleteForm" enctype="multipart/form-data" action="usun.php">
		  <label for="id">ID</label>
		  <input type="text" name="id" required>

		  <input type="submit" name="delete_submit" class="deleteInput" value="DELETE" />
		</form>
	</div>
	
	

<?php
		
		// Usuwanie podstrony z bazy danych
		if(isset($_POST['delete_submit'])){
		include("../cfg.php");
		
		$id=$_POST['id'];
		
		
		if (!empty($_POST['id']))
		{
		
			$ask=mysqli_query($link,"DELETE FROM page_list WHERE id='$id'");
			if(!$ask){
				echo "Błąd zapytania";
			};
			
			echo "Usunięto z bazy";
		}
		else
		{
			echo "Uzupełnij pole";
		}

		mysqli_close($link);
		
	};
	?>