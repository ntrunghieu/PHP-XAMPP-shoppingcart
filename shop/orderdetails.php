<?php
	include 'inc/header.php';
	// include 'inc/slider.php'
?>
<?php 

	  // $product = new product();
     // if (isset($_GET['orderid']) && $_GET['orderid']=='order') {
     //   $customer_id = Session::get('customer_id');
     //   $insertOrder = $cart->insertOrrder($customer_id);
     //   $del_cart = $cart->del_all_data_cart();
     //   header('Location:success.php');
    // }

   //   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

   //      $quantity = $_POST['quantity'];
   //      $addToCart = $cart->add_to_cart($quantity,$id);
   //   }

?>
<style type="text/css">
	.box-left{
		width: 100%;
		border: 1px solid #666;
		padding: 4px;
	}
	
	
	
</style>
<div class="main">
   <div class="content">
    	<div class="section group">

    		<div class="heading">
    				<h3>Your details ordered</h3>
    		</div>
    		<div class="clear">

    		<div class="box-left">
    				<div class="cartpage">
			    
			 
						<table class="tblone">
							<tr>
								<th width="10%">Product Name</th>
								<th width="20%">Image</th>
								<th width="10%">Price</th>
								<th width="15%">Quantity</th>
								<th width="15%">Total Price</th>
								<th width="15%">Data</th>
								<th width="10%">Status</th>
								<th  width="10%">Action</th>
							</tr>
							<?php 
							 	$customer_id = Session::get('customer_id');
								$get_cart_ordered = $cart->get_cart_ordered($customer_id);
								if ($get_cart_ordered) {
               			$i = 0;               	
                  	while ($result = $get_cart_ordered->fetch_assoc()) {
                  		$i++;
                  			
							?>

							<tr>
								<td><?php echo $result['product_name'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price'].' '.' VNĐ' ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cart_id" value="<?php echo $result['cart_id'] ?>"/>
										<input readonly type="number" name="quantity" min="1" value="<?php echo $result['quantity'] ?>"/>
									
									</form>
								</td>
								<td>

							total price
									
								</td>
								<td><?php echo $fm->formatDate($result['quantity'])  ?></td>
								<td>
									<?php 
										if ($result['status'] == 0) {
											echo "<p style='color:red; font-weight:600;'>Pending... </p>";
										} else {
											echo "<p style='color:green; font-weight:600;'>Processed !! </p>";
										}
									?>
								</td>
								<?php 
									if ($result['status'] == 0) {
									
								?>
								<td><?php echo "N/A"; ?></td>
								<?php 
									}else{
								?>

								<td>
									<a onclick="return confirm('Bạn có muốn xóa');" href="?cart_id=<?php echo $result['cart_id'] ?>">Xóa</a>
								</td>

								<?php 
									}
								?>
								
							</tr>
							<?php
								// $subtotal += $total;
								// $quantity = $quantity + $result['quantity'];
	      						}
	   						}  
							?>												
						</table>

				
					</div> 
    		</div>	

  	
    		
    		</div>

 		</div>
 		<!-- <input hidden style="width: 100px; height: 30px; margin-left: 20%;  border: none; font-size: 15px; font-weight: 600; background: red; color: white;cursor: pointer;" type="submit" value="Order" name="order">
 		<center  class="submit_order"><a href="?orderid=order">Order now</a></center> -->
 	</div>
</div>

 	
<?php
	include 'inc/footer.php'; 
?>
