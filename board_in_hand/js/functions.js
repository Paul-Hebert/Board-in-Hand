toggleVal = false;

function changeDefault(id,defaultText){
	if($('#' + id).val() === defaultText){
		$('#' + id).val('');
	}
}

function resetDefault(id,defaultText){
	if($('#' + id).val() === '' || null){
		$('#' + id).val(defaultText);
	}
}

function checkZip(){
	var checkedVal = $('#zip').val();

	if ( !isNaN(checkedVal) && checkedVal.length === 5){
		window.location="checkout.php?zip=" + checkedVal;
	} else{
		$('#ZipError').css('display','block');
		$('#zip').css({
			'border':'2px solid #EF2B00',
			'color':'#EF2B00'
		});
	}
}

function setTotals(shipping){
	var subTotal = shipping;
	$('.item-total').each( function(){
		individualPrice = $( this ).text();

		if (individualPrice != 'Price'){
			individualPrice = parseFloat(individualPrice.replace("$", ""));

			subTotal += individualPrice;
		}
	});
		$('#total').html('$' + subTotal.toFixed(2));
}

function toggle(){
	if (toggleVal == false){
		$('nav').css('max-height','500px');
		$('.ham:first-of-type, .ham:last-of-type').css('fill','#71B8E5');
		toggleVal = true;
	} else{
		$('nav').css('max-height','60px');
		$('.ham:first-of-type, .ham:last-of-type').css('fill','#000');
		toggleVal = false;
	}
}

/**************************************************************************************
	Simple Cart
**************************************************************************************/

	simpleCart({
	    checkout: {
		    type: "PayPal",
		    email: "paul.hebert@paulhebertdesigns.com"
		}
	});
		   
	simpleCart.bind( 'beforeAdd' , function( item ){
		// return false if the item is in the cart, 
		// so it won't be added again
		if ( simpleCart.has( item ) ){
			$('#mainAddedError').css('display','inline-block');
			$('.item_price, .item_add, .withGear').remove();
			return false;
		}
	});