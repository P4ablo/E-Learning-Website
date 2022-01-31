<!-- Dodawanie nowej podstrony  -->

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
		<h1>Adding page to the database:</h1>
		<form method="post" name="addForm" enctype="multipart/form-data" action="dodaj.php">
		  <label for="page_title">Page title</label>
		  <input type="text" name="page_title" required>

		  <label for="page_content">Page content</label>
		  <textarea type="text" name="page_content" required>Add text</textarea>
		  
		  
		  <label for="status">Status</label>
		   <input type="hidden" name="status" value="0">
		  <input type="checkbox" name="status" value="1">
		  
		  <input type="submit" name="add_submit" class="addInput" value="ADD">
		</form>
	</div>
	
	

<?php
		
		// Dodawanie podstrony do bazy danych
		if(isset($_POST['add_submit'])){
		include("../cfg.php");
		
		$page_title=$_POST['page_title'];
		$page_content=$_POST['page_content'];
		$status=$_POST['status'];
		
		if (!empty($_POST['page_title']) && !empty($_POST['page_content']))
		{
		
			$ask=mysqli_query($link,"INSERT INTO page_list(page_title, page_content, status) VALUES ('$page_title', '$page_content', '$status');");
			if(!$ask){
				echo "Błąd zapytania";
			};
			
			echo "Dodano do bazy";
		}
		else
		{
			echo "Uzupełnij wszystkie dane";
		}

		mysqli_close($link);
		
	};
	?>