<?php 
session_start();
	if(isset($_POST['submit'])){  
		foreach($_POST['quantity'] as $key => $val) { 
			if($val==0) { 
				unset($_SESSION['cart'][$key]); 
			}
			else{ 
				$_SESSION['cart'][$key]['quantity']=$val; 
			} 
		}  
	} 
 
	if(isset($_GET['action']) && $_GET['action']=="add"){ 
		$id=intval(htmlspecialchars($_GET['id'])); 
		 
		if(isset($_SESSION['cart'][$id])){ 
			$_SESSION['cart'][$id]['quantity']++; 
		}
		else{ 
			require("../cfg.php");
			$sql_s="SELECT * FROM produkty WHERE id={$id}"; 
			$query_s=mysqli_query($link,$sql_s); 
			if(mysqli_num_rows($query_s)!=0){ 
				$row_s=mysqli_fetch_array($query_s); 
				$_SESSION['cart'][$row_s['id']]=array( 
						"quantity" => 1, 
						"price" => ($row_s['cena_netto']* ($row_s['podatek_vat'] / 100))
					); 
			}
			else{ 
				$message="Id product is not valid!";  
			} 
		} 
	} 
?> 

<html>
	<head> 
		<link rel="stylesheet" href="../css/styleadmina.css">
	</head> 
	 
	<body> 
		<div id="header">
			<a  href="../html/paneladmina.php">
				<button class="backButton">Back</button>
			</a><br>
			<a  href="../admin/sklep.php">
				<button class="backButton">Shop</button>
			</a>
			<div id="cart_and_logout"> 
				<a class='cart' href="../admin/koszyk.php">
			
				</a>
			</div>
		</div>
		
		<div id='content'>
			<div id="content_cart">
				<h1>Your Cart</h1> 

				<?php
					if(!isset($_SESSION['cart'])){
						echo "Your cart is empty";
					}
					else{
					$idd = 0;
					foreach($_SESSION['cart'] as $id => $value) { 
						$idd=$id; 
					}
					
					if(!isset($_SESSION['cart'][$idd])){
						echo "Your cart is empty";
					}
					else{
				?>
		
				<form method="post" action="../admin/koszyk.php"> 
					<table> 
						<tr>
							<th>Action</th> 
							<th>Name</th> 
							<th>Quantity</th> 
							<th>Price</th> 
							<th>Total Price</th> 	
						</tr> 	
						
						<?php 
							require("../cfg.php");
							$sql="SELECT * FROM produkty WHERE id IN ("; 
							foreach($_SESSION['cart'] as $id => $value) { 
								$sql.=$id.","; 
							} 
							
							$sql=substr($sql, 0, -1).") ORDER BY tytul ASC"; 
							$query=mysqli_query($link,$sql); 
							$totalprice=0; 
							while($row=mysqli_fetch_array($query)){ 
								$subtotal=$_SESSION['cart'][$row['id']]['quantity']*($row['cena_netto']* ($row['podatek_vat'] / 100) + ($row['cena_netto'])); 
								$totalprice+=$subtotal;  
						?> 
					
						<tr> 
						<td>
							<a class="deleteInput" href="usunProduktZKoszyka.php?id=<?php echo $row['id']; ?>" name="submit">Delete</a>
						</td>
						<td><?php echo $row['tytul'] ?></td> 		
											
						<td><input type="text" name="quantity[<?php echo $row['id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id']]['quantity'] ?>" /></td> 
						<td><?php echo $_SESSION['cart'][$row['id']]['quantity']*($row['cena_netto']* ($row['podatek_vat'] / 100)+ ($row['cena_netto'])) ?> zł</td>				
						</tr> 
					
						<?php 	 
							} 
						?> 
					
						<tr> 
							<td colspan="5"><b>Total: <b/></td>
							<td><b><?php echo $totalprice ?> zł</b></td>
						</tr> 
					</table> 
					<br /> 
					<button class="addInput" type="submit" name="submit">Update</button>
					<a  href="../admin/czyscKoszyk.php" class="deleteInput"><span class="glyphicon glyphicon-trash"></span>Clear Cart</a>	
				</form> 
				<?php
					}
					}
				?>
			</div>
		</div>
	</body> 
</html>
