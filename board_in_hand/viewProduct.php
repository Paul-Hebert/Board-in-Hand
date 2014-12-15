<!DOCTYPE html>

<html>
	<head>
    	<meta charset="utf-8"> 

		<title>Custom Deck</title>

		<?php 
			include('php/resources.php'); 
			
			$id = $_GET['id'];

			include('../cheatsheet.php');

			$sql = "SELECT * FROM boards WHERE id = '" . $id . "'";
			$stmt = $db->prepare($sql);
			$stmt->execute();

			$row = $stmt->fetch();
		?>
	</head>

	<body>
		<?php include('php/header.php') ?>
		<div id="content" class="row">					
			<div class="col-6 laptop">
				<p class="productDescription">
					<?php echo $row['description']; ?> 
				</p>
			</div>
			
			<?php echo '<img class="col-2 laptop" src="imgs/' . $row['name'] . '.png" />'; ?>

			<div class="productInfo">
				<div class="simpleCart_shelfItem">
					<span class="productName item_name">
						<?php echo $row['name']; ?>
					</span>

					<br /><br />

			<?php if($row['price'] != 'Sold'){
					echo '<div id="mainAddedError" class="error">*This item\'s already in your cart.</div>

					<span class="item_price">
						' . $row['price'] . '
					</span>

					<a href="javascript:;" class="item_add">Add to Cart</a>
				</div>

				<br /> <br />

				<div class="simpleCart_shelfItem">
					<span class="withGear item_name">
						<span class="hidden">
							' . $row['name'] . '
						</span>
						 With Gear:
					</span>

					<br /><br />

					<span class="item_price ">
						' . $row['withGear'] . '
					</span>

					<a href="javascript:;" class="item_add">Add to Cart</a>
				</div>	

				<br /> <br />

				<a href="viewCart.php" class="checkoutLink big">View Cart</a>';
			} else{
				echo '<span class="item_price">
						Sold Out
					</span>
				</div>';
			}
			?>
			</div>	
		</div>
		<?php include('php/footer.php') ?>
	</body>
</html>