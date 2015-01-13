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
		
			echo '<script type="text/javascript">
					itemName = "' . $row['name'] . '";
				</script>';
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
			
			<?php 
				echo '<div class="col-2 laptop"> 
					<img src="imgs/decks/thumb/' . $row['name'] . '.png" class="lightBox"/>
				</div>'; 
			?>

			<div class="productInfo">
				<div class="simpleCart_shelfItem stretch-12">
					<h1 class="item_name">
						<?php echo preg_replace('/_/', ' ', $row['name']); ?>
					</h1>

			<?php if($row['price'] != 'Sold'){
					echo '<br /><br />
					<span class="item_price">
						' . $row['price'] . '*
					</span>

					<a href="javascript:;" class="item_add">Add to Cart</a>

					<br /><br />

					<p>*This deck comes without gear. To buy a complete deck click \'Add to Cart\' and then click \'Upgrade.\'</p>
				</div>

				<div class="simpleCart_shelfItem stretch-12 gear hidden">
					<span class="withGear item_name hidden">
						' . $row['name'] . '
						 Gear:
					</span>
					<h1>Need Gear?</h1>
					<p>This deck comes without gear. Click below to upgrade to a complete deck that\'s ready to ride!</p>

					<br />

					<span class="item_price ">
						$19.99
					</span>

					<a href="javascript:;" class="item_add">Upgrade</a>

					<br /><br />

					<p>Or click below to check out and enjoy your new deck!</p>
				</div>	

				<div class="simpleCart_shelfItem stretch-12 thanks hidden">
					<h1>Thanks!</h1>
					<p>This item has been added to your cart. Click below to check out and enjoy your new ride!</p>
				</div>


				<a href="viewCart.php" class="checkoutLink big">View Cart</a>';
			} else{
				echo '
					<h2>Sold out!</h2>
					<p>
						Sorry, we\'re sold out of this deck. Click below to request a similar deck.
					</p>

					<br /> 

					<a class="button" href="custom.php?deck=' . $row['name'] . '">
						Request a Deck
					</a>

					<br /> <br /> 

					<p> 
						Or click below to view other decks.
					</p>

					<br /> 

					<a class="button" href="index.php">
						Other Decks
					</a>
				</div>';
			}
			?>
			</div>	
		</div>
		<?php include('php/footer.php') ?>
	</body>
</html>