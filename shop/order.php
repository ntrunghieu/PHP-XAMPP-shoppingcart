
<?php
	include 'inc/header.php';
	include 'inc/slider.php'
?>
<?php 
	$login_check = Session::get('customer_login');
	if ($login_check == false) {
		header('Location:login.php');
	} 
?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<div class="order_page">
			    		<h3>Order page</h3>
			    	</div>


						
			</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>


<?php

	include 'inc/footer.php';
?>

