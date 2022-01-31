<head>
	<link rel="stylesheet" href="../css/styleadmina.css">	
</head>
<?php
	//Tworzy sesję lub wznawia bieżącą na podstawie aktualnego identyfikatora sesji przekazanego przy wywołaniu, poprzez metodę POST
	session_start();
	include("../cfg.php");
	$id = "";


	if(isset($_GET['id']))
	{
		$id= $_GET['id'];
	}

	if(isset($_POST['delete_submit'])){
		$ask=mysqli_query($link,"DELETE FROM produkty WHERE id=$id");
		if(!$ask){
			echo "Błąd zapytania";
		}
		
		//Zakończenie połączenia z bazą danych
		mysqli_close($link);
		
		$_SESSION['message'] = "Row has been deleted!"; 
		header("Location: ../html/paneladmina.php");
	
	}
	

?>

<div>
	<p>Do you want to delete?</p>
	<form method="post" name="deleteForm" enctype="multipart/form-data" action="">
		<a href="../html/paneladmina.php"><input type="button" class="deleteInput" value="NO"></a>

		<input type="submit" name="delete_submit" class="addInput" value="YES">
	</form>
</div>