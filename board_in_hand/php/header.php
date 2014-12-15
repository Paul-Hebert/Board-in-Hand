	<div id="header">
		<a href="index.php">
			<img src="imgs/logo.png" id="logo"/>
			<span id="headerText">
				<span class="boardText">
					Board
				</span> 
				<br />
				in Hand
			</span>
		</a>

		<a href="viewCart.php" id="cartDisplay" class="laptop">
			<span class="simpleCart_quantity"></span> items - <span class="simpleCart_total"></span>
			<img src="imgs/cart.png" id="cartIMG"/>
    	</div>
	</div>

	<nav class="row">
		<a class="col-4 mobile" href="javascript:toggle();">
			<div class="svgHolder">
	            <svg>
			        <rect class="ham" y="22" width="30" height="6"></rect>
			        <rect class="ham" y="11" width="30" height="6"></rect>
			        <rect class="ham" y="0" width="30" height="6"></rect>
				</svg>
			</div>
		</a>		
		<a class="col-4" href="index.php">Boards</a>
		<a class="col-4" href="custom.php">Custom</a>
		<a class="col-4" href="contact.php">Contact</a>
		<a class="col-4 mobile" href="viewCart.php">Cart</a>
	</nav>