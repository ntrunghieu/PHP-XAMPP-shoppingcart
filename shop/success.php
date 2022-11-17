<?php
	include 'inc/header.php';
	// include 'inc/slider.php'
?>
<?php 

	  // $product = new product();
     if (isset($_GET['orderid']) && $_GET['orderid']=='order') {
       $customer_id = Session::get('customer_id');
       $insertOrder = $cart->insertOrrder($customer_id);
       $del_cart = $cart->del_all_data_cart();
       header('Location:success.php');
    }

   //   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

   //      $quantity = $_POST['quantity'];
   //      $addToCart = $cart->add_to_cart($quantity,$id);
   //   }

?>
<style type="text/css">
		.success_order{
			text-align: center;
			color: red;
		}
		p.success_note{
			text-align: center;
			padding: 8px;
			font-size: 17px;
		}
	
</style>
<div class="main">
   <div class="content">
    	<div class="section group">
    		
    		<h2 class="success_order">Success order</h2>

						    	
    	
    		<p class="success_note">We will contact as soon as posible. Please see your order details here!! 
    			<a href="orderdetails.php">Click here</a>
    		</p>
 		</div>
 	</div>
</div>

 	
<?php
	include 'inc/footer.php'; 
?>
