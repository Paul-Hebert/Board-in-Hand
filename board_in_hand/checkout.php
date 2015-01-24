<!DOCTYPE html>

<html>
	<head>
    	<meta charset="utf-8"> 

		<title>Check Out</title>

		<?php include('php/resources.php'); 

			require_once('php/lib/Postmaster.php');
			Postmaster::setApiKey("tt_MTE4NzEwMDE6WDMtenlfVVlRZFZMemNlMHZsU3hhZkh3MWlZ");
			 
			$fromZip = "95928";
			$toZip = $_GET['zip'];
			$weight = $_GET['weight'];
			$carrier = "USPS";

			if ( ctype_digit($toZip) ){
				$result = Postmaster_Rates::get(array(
				"from_zip" => $fromZip,
				"to_zip" => $toZip,
				"weight" => $weight,
				"carrier" => $carrier
				));
			} else{
				$result = Postmaster_Rates::get(array(
				"from_zip" => $fromZip,
				"to_zip" => $toZip,
				"from_country" => 'US',
				"to_country" => $toZip,
				"weight" => $weight,
				"carrier" => $carrier
				));				
			}

			$splitResult = explode(':',$result);

			$splitResult = explode(',',$splitResult[2]);

			$splitResult[0] =  $splitResult[0]/100;

			echo '<script type="text/javascript">
				    simpleCart({
				  		shippingFlatRate : ' . $splitResult[0] . '
				    });

					simpleCart.bind( "load" , function(){
						$(function (){
							setTotals(' . $splitResult[0] . ');
						});
					});
				</script>';

		?>
	</head>

	<body>
		<?php 
			include('php/header.php');
		?>

		<div id="content">
			<div id="item_holder" class="stretch-12">
				<div class="simpleCart_items checkout"></div>
				<div id="shipping">$<?php echo $splitResult[0] ?></div>
				<div id="total"></div>
			</div>

			<div id="checkoutHolder" class="stretch-12">
				<a href="javascript:;" class="simpleCart_checkout big">Check Out</a>	
			</div>
		</div>

		<?php include('php/footer.php') ?>
	</body>
</html>