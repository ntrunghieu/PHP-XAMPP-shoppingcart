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

<div class="main">
   <div class="content">
    	<div class="section group">
    		<div class="content_top">
    			<div class="heading">
    				<h3>Profile customer</h3>
    			</div>
    		<div class="clear"></div>
    		</div>
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
    			<tr>
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

 	
<?php
	include 'inc/footer.php'; 
?>
