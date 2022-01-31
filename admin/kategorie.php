<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../css/styleadmina.css">	
	</head>
<body>

<?php
	session_start();	
	
	include("../cfg.php");
	global $link;
	
	

	function ListaKategorii($parent_id=0, $sub_mark='')
	{
		include("../cfg.php");
		$query = "SELECT * FROM kategorie WHERE matka=$parent_id ORDER BY nazwa ASC LIMIT 50";
		$result = mysqli_query($link, $query);
		
		//wyświetlenie danych z bazy z użyciem pętli while
		while($row = mysqli_fetch_array($result))
		{
			echo '<tr>';
			echo '<td>'. $row['id'] . '</td>';
			echo '<td>'. $sub_mark.$row['nazwa'] . '</td>';
			echo '<td><a class="editInput" href="../admin/edytujKategorie.php?id='.$row['id'].'">Edit</a></td>';
			echo '<td><a class="deleteInput" href="../admin/usunKategorie.php?id='.$row['id'].'">Delete</a></td>';
			echo '</tr>';
			ListaKategorii($row['id'], $sub_mark.'------');
		}
	}
	
	
	

	if (isset($_SESSION['message'])){ ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
	
	<?php 
		} 
	?>

	<a href="http://localhost/files/strona/html/paneladmina.php">
		<button class="backButton">Back</button>
	</a> 
	<h2>Categories of products</h2>
		<a href="../admin/dodajKategorie.php">
			<button class="addButton">Add Categorie</button>
		</a>
			
		<table id='table1' class='tabela' border=1>
			<tr><th>Id</td><th>Categorie</th><th colspan='2'>Action</th></tr>
				<?php echo ListaKategorii(); ?>
			</table>
		</div>
	</div>
	
	</body>
</html>