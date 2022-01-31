
<?php 
	session_start(); 
	require("../cfg.php");

 
?> 
<html>
	<head> 
		<link rel="stylesheet" href="../css/styleadmina.css">
	 </head> 
	 
	<body> 
		<div id="header">
			<a  href="../html/paneladmina.php">
				<button class="backButton">Back</button>
			</a></br>
			<a  href="../admin/sklep.php">
				<button class="backButton">Shop</button>
			</a>
			<div id="cart_and_logout">
			<a  href="../admin/koszyk.php">
				<button class="backButton">Cart</button>
			</a>
			</div>
		</div>
		
		<div id='content'>
			<?php 
			if(isset($_GET['action']) && $_GET['action']=="add"){ 
				echo "Product added to the cart";
				$id=intval(htmlspecialchars($_GET['id'])); 
				if(isset($_SESSION['cart'][$id])){ 
					$_SESSION['cart'][$id]['quantity']++;  
				}
				else{ 
					 
					require("../cfg.php");
					$sql_s="SELECT * FROM produkty
						WHERE id={$id}"; 
					$query_s=mysqli_query($link,$sql_s); 
					if(mysqli_num_rows($query_s)!=0){ 
						$row_s=mysqli_fetch_array($query_s); 
						 
						$_SESSION['cart'][$row_s['id']]=array( 
								"quantity" => 1, 
								"price" => $row_s['cena_netto'] 
							);
					}else{ 
						 
						$message="This product is not valid!"; 
					} 
				} 
			} 
			?> 
			
			<h1>Product List</h1> 
			
			<?php 
				if(isset($message)){ 
					echo "<h2>$message</h2>"; 
				} 
			 
				require("../cfg.php");
				$sql="SELECT * FROM produkty ORDER BY tytul ASC"; 
				$query=mysqli_query($link,$sql); 
				 
				while ($row=mysqli_fetch_array($query)) {
					if($row['status']==1){
		 
			?> 
			
			<div>
			<form action="sklep.php?action=add&id=<?php echo $row['id'] ?>" method="post">
					<h4><?php echo $row['tytul'];?></h4>
					<h4><?php echo $row['cena_netto'] * ($row['podatek_vat']/100) + $row['cena_netto'];?> zł</h4>
					<input class="addInput" type="submit" name="add_to_cart" value="Add to cart">
				</form>
			</div>
		
			<?php 
					}
				} 
			?> 
		

		</div>
		
	</body> 
</html>