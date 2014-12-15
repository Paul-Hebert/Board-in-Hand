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
				foreach($results as $row)
				echo '<a href="viewProduct.php?id=' . $row['id'] . '" class="col-3 deck">
					<img src="imgs/' . $row['name'] . '.png"/>
						<span class="productName">
							' . $row['name'] . '
						</span>
						<span class="item_price">
							' . $row['price'] . '
						</span>
				</a>';
			?>
		</div>
		<?php include('php/footer.php') ?>
	</body>
</html>