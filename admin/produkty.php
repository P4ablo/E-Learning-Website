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
        

        function ListaProduktow()
        {
            include("../cfg.php");
            
            //Zapytanie do bazy danych
            $query = "SELECT * FROM produkty LIMIT 30";
            $result = mysqli_query($link, $query);
            
            //wyświetlenie dancyh z bazy z użyciem peegli while
            while($row = mysqli_fetch_array($result))
            {
                echo '<tr>';
                echo '<td>'. $row['id'] . '</td>';
                echo '<td>'. $row['tytul'] . '</td>';
                echo '<td>'. $row['opis'] . '</td>';
                echo '<td>'. $row['data_utworzenia'] . '</td>';
                echo '<td>'. $row['data_modyfikacji'] . '</td>';
                echo '<td>'. $row['data_wygasniecia'] . '</td>';
                echo '<td>'. $row['cena_netto'] . '</td>';
                echo '<td>'. $row['podatek_vat'] . '</td>';
                echo '<td>'. $row['ilosc'] . '</td>';
                echo '<td>'. $row['status'] . '</td>';
                echo '<td>'. $row['kategoria'] . '</td>';
                echo '<td>'. $row['gabaryt'] . '</td>';
                echo '<td>'. $row['zdjecie'] . '</td>';
                echo '<td><a class="deleteInput" href="../admin/usunProdukt.php?id='.$row['id'].'">Delete</a></td>';
                echo '<td><a class="editInput" href="../admin/edytujProdukt.php?id='.$row['id'].'">Edit</a></td>';
                echo '</tr>';

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

        
        <div id='content'>
            <div id="scrollable-content">
                <a href="http://localhost/files/strona/html/paneladmina.php">
		            <button class="backButton">Back</button>
	            </a> 
                <h2>List of products</h2>
                <a href="../admin/dodajProdukt.php">
                    <button class="addButton">Add Product</button>
                </a>
                
                <table id='table2' class='tabela' border=1>
                    
                    <tr>
                        <th>Id</td>
                        <th>Tytuł</th>
                        <th>Opis</th>
                        <th>Data utworzenia</td>
                        <th>Data modyfikacji</td>
                        <th>Data wygaśnięcia</td>
                        <th>Cena netto</td>
                        <th>Podatek VAT</td>
                        <th>Ilość sztuk na magazynie</td>
                        <th>Status dostępności</td>
                        <th>Kategoria</td>
                        <th>Gabaryt produktu</td>
                        <th>Zdjęcie</td>
                        <th colspan='2'>Akcja</th>
                    </tr>

                    <?php echo ListaProduktow(); ?>
                </table>
            </div>
        </div>
        

	</body>
</html>