itemName = '';

toggleVal = false;

weight = 0;

/**************************************************************************************
	General
**************************************************************************************/

$( function(){
	$('.L_Box').click( function(){
		if ( ! $(this).hasClass('L_Box_Clicked') ){
			$(this).addClass('L_Box_Clicked');
		} else{
			$(this).removeClass('L_Box_Clicked');			
		}
	});
});

function error(name, target){
		$("#" + name + "Error").css("display","block");
			$("#" + target).addClass('errorTag');
}

function hideErrors(){
	$('.error').css('display','none');
	$('.errorTag').removeClass('errorTag');
}

/**************************************************************************************
	Contact
**************************************************************************************/

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

$(function(){
	$('#attachment').bind('change', function() {
			hideErrors();
	        if (this.files[0].size > 1048576){
	        	error("size","attachment");
	        }
	    });	
});

/**************************************************************************************
	View Product
**************************************************************************************/

function showGear(){
	$('.simpleCart_shelfItem').css('display','none');
	$('.gear').css('display','block');
}

function hideGear(){
	$('.gear').css('display','none');
	$('.thanks').css('display','block');
}


/**************************************************************************************
	Mobile
**************************************************************************************/

function toggle(){
	if (toggleVal == false){
		$('nav').css('max-height','333px');
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

	simpleCart.bind( 'afterAdd' , function( item ){
		item.set( 'name' , itemName );
		if ( $('.gear').css('display') == 'block' ){
			hideGear();
		} else{
			showGear();
		}
	});

	simpleCart.ready(function(){
		simpleCart.each( function ( item ){
			currentItem = item.get('name').replace(/\s+/g, '');
			if ( itemName == currentItem ){
				showGear();
			}
			if ( itemName + 'Gear:' == currentItem){
				hideGear();
			}
		});
	});

/**************************************************************************************
	Custom Cart Functions
**************************************************************************************/

function checkZip(){
	hideErrors();
	var checkedVal = $('#zip').val();

	if ( !isNaN(checkedVal) && checkedVal.length === 5){
		$('.itemRow').each( function(){
			if ( $( this ).children( ".item-name" ).text().indexOf("Gear") > -1 ){
				weight += 1;
			} else{
				weight += .5;
			}
		});
		window.location="checkout.php?zip=" + checkedVal + '&weight=' + weight;
	} else{
		error('Zip','zip');
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
