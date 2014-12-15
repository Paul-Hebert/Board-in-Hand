<!DOCTYPE html>

<html>
	<head>
    	<meta charset="utf-8"> 

		<title>Your Cart</title>

		<?php include('php/resources.php'); ?>
	</head>

	<body>
		<?php include('php/header.php') ?>
		<div id="content">
			<div class="simpleCart_items stretch-12" id="item_holder">
			</div>

			<div id="checkoutHolder" class="stretch-12">
				Enter your ZIP code below:

				<span class="error" id="ZipError">*Please enter your zip code.</span>
				<input type="text" id="zip" value="&bull;&bull;&bull;&bull;&bull;" onclick="changeDefault('zip','&bull;&bull;&bull;&bull;&bull;');" onblur="resetDefault('zip','&bull;&bull;&bull;&bull;&bull;');"/>

				<br /> <br />

				<a href="javascript:checkZip();" class="checkoutLink big">Checkout</a>
			</div>
		</div>
		<?php include('php/footer.php') ?>
	</body>
</html>