<?php
	include 'inc/header.php';
	// include 'inc/slider.php'
?>
<?php 
	$login_check = Session::get('customer_login');
		if ($login_check == false) {
		   header('Location:login.php');
		} 
?>
<?php 

	  // $product = new product();
   //   if (isset($_GET['product_detail_id']) && $_GET['product_detail_id']!=NULL) {
   //      $id = $_GET['product_detail_id'];
   //  }else{
   //      echo "<script> window.location = '404.php'  </script>";
   //  }

   //   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

   //      $quantity = $_POST['quantity'];
   //      $addToCart = $cart->add_to_cart($quantity,$id);
   //   }

?>
<style type="text/css">
	h3.payment{
		text-align: center;
		font-size: 20px;
		font-weight: bold;
		text-decoration: underline;
	}
	.wrap_method{
		width: 550px;
		margin: 0 auto;
		border: 1px solid #666;
		padding: 25px ;
		background: cornsilk;
		text-align: center;
		
	}
	.wrap_method a {
		padding: 5px ;
		background: red;
		color: #fff;
	}
	.wrap_method h3 {
		margin-bottom: 20px;
	}
		
</style>
<div class="main">
   <div class="content">
    	<div class="section group">
    		<div class="content_top">
    			<div class="heading">
    				<h3>Payment method</h3>
    			</div>

    			<div class="clear">

    			<div class="wrap_method">
    				<h3 class="payment">Choose your method payment</h3>

    				<a class="payment_href" href="offlinepayment.php">Offline payment</a>
					<a class="payment_href" href="onlinepayment.php">Online payment</a>
					<a style="background: gray; display: inline-block;" href="cart.php"><< Previous</a>
    			</div>
    			
    				
    			</div>
    		</div>
    		
 		</div>
	</div>
</div>

 	
<?php
	include 'inc/footer.php'; 
?>
