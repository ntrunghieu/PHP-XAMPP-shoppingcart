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
	.box-left{
		width: 55%;
		border: 1px solid #666;
		float: left;
		padding: 4px;
	}
	.box-right{
		width: 40%;
		border: 1px solid #666;
		float: right;
		padding: 4px;
	}
	.submit_order{
		padding: 10px 70px;
		border: none;
		background: red;
		font-size: 25px;
		color: #fff;
		margin: 10px;
		cursor: pointer;
		width: 130px;
		margin-left: 20%;
	}
	.submit_order a{
		color: #fff;
	}
	
</style>
<div class="main">
   <div class="content">
    	<div class="section group">

    		<div class="heading">
    				<h3>Offline payment</h3>
    		</div>
    		<div class="clear">

    		<div class="box-left">
    				<div class="cartpage">
			    
			    	<?php 
			    		if (isset($updateCart)) {
			    			echo $updateCart;
			    		}
			    	?>
			    	<?php 
			    		if (isset($del_cart)) {
			    			echo $del_cart;
			    		}
			    	?>
						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th hidden width="10%">Action</th>
							</tr>
							<?php 
								
								$get_product_cart = $cart->get_product_cart();
								if ($get_product_cart) {
               			$i = 0;
               			$subtotal = 0;
								$quantity = 0;
                  			while ($result = $get_product_cart->fetch_assoc()) {
                  			$i++;
                  			
							?>

							<tr>
								<td><?php echo $result['product_name'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['img'] ?>" alt=""/></td>
								<td><?php echo $result['price'].' '.' VNĐ' ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cart_id" value="<?php echo $result['cart_id'] ?>"/>
										<input readonly type="number" name="quantity" min="1" value="<?php echo $result['quantity'] ?>"/>
										<input hidden type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>

									<?php
										$total = $result['price']*$result['quantity'];
									 echo $total.' '.' VNĐ' ?>
									
								</td>
								
							</tr>
							<?php
								$subtotal += $total;
								$quantity = $quantity + $result['quantity'];
	      						}
	   						}  
							?>												
						</table>

						<?php
							$check_cart = $cart->check_cart();
								if ($check_cart) {
											
						?>


						<table style="float:right;text-align:left;" width="60%">
							<tr>
								<th>Sub Total : </th>
								<td>
									<?php 
										echo $subtotal.' '.' VNĐ'; 
										Session::set('sum',$subtotal);
										Session::set('qty',$quantity);
									?>
								</td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%
									(
										<?php 
											$_vat = $subtotal * 0.01;
											echo $_vat.' '.' VNĐ'; 
										?>
									)
								</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>
									<?php 
										$vat = $subtotal * 0.01;
										$gtotal = $subtotal - $vat;
										echo $gtotal.' '.' VNĐ'; 
									?>
								</td>
							</tr>
							<!-- <tr>
								<th>Quantity :</th>
								<td>
									<?php 
										$vat = $subtotal * 0.01;
										$gtotal = $subtotal - $vat;
										echo $gtotal.' '.' VNĐ'; 
									?>
								</td>
							</tr> -->
					   </table>

					   <?php  
					   	} else {
					   		echo 'Your cart is empty';
					   	}
					   ?>
					</div> 
    		</div>	

    		<div class="box-right">
    			<table class="tblone">
    			<?php
    				$id = Session::get('customer_id'); 
    				$get_customer = $customer->show_customer($id);
    				if ($get_customer) {
    					while($res = $get_customer->fetch_assoc()){
    			?>
    			<tr>
    				<td>Name</td>
    				<td>:</td>
    				<td><?php echo $res['name']; ?></td>
    			</tr>	
    			<tr>
    				<td>City</td>
    				<td>:</td>
    				<td><?php echo $res['city']; ?></td>
    			</tr>	
    			<tr>
    				<td>Phone</td>
    				<td>:</td>
    				<td><?php echo $res['phone']; ?></td>
    			</tr>	
    			<!-- <tr>
    				<td>Country</td>
    				<td>:</td>
    				<td><?php echo $res['country']; ?></td>
    			</tr> -->	
    			<tr>
    				<td>Zipcode</td>
    				<td>:</td>
    				<td><?php echo $res['zipcode']; ?></td>
    			</tr>	
    			<tr>
    				<td>Email</td>
    				<td>:</td>
    				<td><?php echo $res['email']; ?></td>
    			</tr>	
    			<tr>
    				<td>Address</td>
    				<td>:</td>
    				<td><?php echo $res['address']; ?></td>
    			</tr>	
    			<tr >
    				<!-- <td colspan="3"><a href="editProfile.php?customerId=<?php echo $res['id'] ?>">Update profile</a></td> -->
    				<td colspan="3"><a href="editProfile.php">Update profile</a></td>

    			</tr>		
    			<?php 
    					}
    				}
    			?>
    		</table>
    		</div>	
    		
    		</div>

 		</div>
 		<input hidden style="width: 100px; height: 30px; margin-left: 20%;  border: none; font-size: 15px; font-weight: 600; background: red; color: white;cursor: pointer;" type="submit" value="Order" name="order">
 		<center  class="submit_order"><a href="?orderid=order">Order now</a></center>
 	</div>
</div>

 	
<?php
	include 'inc/footer.php'; 
?>
