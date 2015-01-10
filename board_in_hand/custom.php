<!DOCTYPE html>

<html>
	<head>
    	<meta charset="utf-8"> 

		<title>Custom Decks</title>

		<?php include('php/resources.php'); ?>
	</head>

	<body>
		<?php include('php/header.php') ?>
		<div id="content">
			<div class="col-4 stretch-12">
				<h1>Custom Decks</h1>
				<p>Interested in a custom board?</p>
				<p>We would be happy to design and illustrate a deck just to your liking. </p>
				<p>Fill out our contact form with a description of your design or an attached image file. </p>
				<p>We'll get back to you as soon as possible with a price and delivery date.</p>

			</div>
			<?php 
				include('php/contact_form.php'); 

				if($_GET['deck']){
					echo '<script type="text/javascript">
					$("#subject").val("Request for deck similar to ' . $_GET['deck'] . '");
					</script>';
				}
			?>

		</div>

		<?php include('php/footer.php') ?>
	</body>
</html>