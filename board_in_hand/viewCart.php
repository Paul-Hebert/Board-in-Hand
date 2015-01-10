<!DOCTYPE html>

<html>
	<head>
    	<meta charset="utf-8"> 

		<title>Your Cart</title>

		<?php include('php/resources.php'); ?>
		<script type="text/javascript">
			simpleCart.bind( "update" , function(){
				$(function (){
					if(simpleCart.items().length == 0){
						$('#content').html('<div class="col-3 laptop">&nbsp;</div><div class="col-6 stretch-12"><h1>Empty Cart?</h1><p>There appears to be nothing in your cart. Click below to keep shopping.</><br /><br /><br /><a href="index.php" class="item_add big">View Boards</a></div>');
					}
				});
			});
		</script>
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

				<br /> 
				<br />

				<a href="javascript:checkZip();" class="checkoutLink big">Check Out</a>
			</div>
		</div>
		<?php include('php/footer.php') ?>
	</body>
</html>