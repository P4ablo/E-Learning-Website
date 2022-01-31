<!-- Funkcja pokazująca podstrony w panelu admina po zalogowaniu -->
<?php
	function PokazPodstrone($id)
	{
		// Include pliku z konfiguracją
		include("cfg.php");
		$id_clear = htmlspecialchars($id);
		
		// Zapytanie wyciągające podstrony z bazy
		$query = "SELECT * FROM page_list WHERE id='$id_clear' LIMIT 1";
		$result = mysqli_query($link,$query);
		$row = mysqli_fetch_array($result);
		
		if(empty($row['id']))
		{
			$web = '[nie_znaleziono_strony]';
		}
		else
		{
			$web = $row['page_content'];
		}
		return $web;
	}
?>
		