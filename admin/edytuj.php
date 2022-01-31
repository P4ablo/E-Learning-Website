<!-- Edytowanie istniejącej podstrony -->

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
		<h1>Edit page in database:</h1>
		<form method="post" name="editForm" enctype="multipart/form-data" action="edytuj.php">
		  <label for="id">ID</label>
		  <input type="text" name="id" required>

		  <label for="page_title">Page title</label>
		  <input type="text" name="page_title" >
		  
		  <label for="page_content">Page content</label>
		  <textarea type="text" name="page_content" >Edit text</textarea>
		  
		  
		  <label for="status">Status</label>
		   <input type="hidden" name="status" value="0" >
		  <input type="checkbox" name="status" value="1">
		  
		  <input type="submit" name="edit_submit" class="editInput" value="EDIT">
		</form>
	</div>
	

<?php
		
		// Edytowanie podstrony znajdującej się w bazie danychs
		if(isset($_POST['edit_submit'])){
		include("../cfg.php");
		
		$id = $_POST['id'];
		$page_title=$_POST['page_title'];
		$page_content=$_POST['page_content'];
		$status=$_POST['status'];
		
		if (!empty($_POST['id']))
		{
		
			$ask=mysqli_query($link,"UPDATE page_list SET page_title='$page_title', page_content='$page_content', status='$status' WHERE id='$id';");
			if(!$ask){
				echo "Błąd zapytania";
			};
			
			echo "Zmodyfikowano dane";
		}
		else
		{
			echo "Uzupełnij wymagane pole id";
		}

		mysqli_close($link);
		
	};
	?>