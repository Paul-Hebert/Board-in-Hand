<!DOCTYPE html>

<html>
	<head>
    	<meta charset="utf-8"> 

		<title>Board In Hand</title>

		<?php 
			include('php/resources.php'); 
			include('../cheatsheet.php');

			$sql = "SELECT * FROM boards";
			$stmt = $db->prepare($sql);
			$stmt->execute();

			$results = $stmt->fetchAll();
		?>
	</head>

	<body>
		<?php include('php/header.php') ?>
		<div id="content" class="row">
			<?php
				foreach($results as $row){
					/*if ($row['id'] == 1){
						echo '<div class="col-6 laptop">
								<h1>About Us</h1>
								<p>Board in Hand is a small skate company based out of Chico, CA. We specialize in selling decks for art and transportation.</p>
								<p> All of our decks are unique and hand decorated. Most designs are done using a combination of spraypaint, stencils and markers. They are then covered with a protective glossy enamel.</p>
								<h1>Complete Decks</h1>
								<p>The prices shown on this page are for decks without gear. After adding one to your cart, click \'Upgrade\' to buy a complete deck that\'s ready to ride!</p>
							</div>';
					}*/

					echo '<a href="viewProduct.php?id=' . $row['id'] . '" class="col-3 deck">
						<img src="imgs/decks/thumb/' . $row['name'] . '.png"/>
							<span class="productName">
								' . preg_replace('/_/', ' ', $row['name']) . '
							</span>
							<span class="item_price">
								' . $row['price'] . '
							</span>
					</a>';
				}
			?>
		</div>
		<?php include('php/footer.php') ?>
	</body>
</html>