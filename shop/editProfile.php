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

		$id = Session::get('customer_id');
     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {

        $updateCustomer = $customer->update_customer($_POST,$id);
     }

?>

<div class="main">
   <div class="content">
    	<div class="section group">
    		<div class="content_top">
    			<div class="heading">
    				<h3>Update profile</h3>
    			</div>
    		<div class="clear"></div>
    		</div>
    		<form action="" method="post">
    			<table class="tblone">

    				<tr>
    					<td>
    						<?php 
    						if (isset($updateCustome)) {
    							echo $updateCustomer;
    						}
    						?>
    					</td>
    					
    				</tr>
    			<?php
    				$id = Session::get('customer_id'); 
    				$get_customer = $customer->show_customer($id);
    				if ($get_customer) {
    					while($res = $get_customer->fetch_assoc()){
    			?>
    			<tr>
    				<td>Name</td>
    				<td>:</td>
    				<td><input type="text" name="name" value="<?php echo $res['name']; ?>"></td>
    			
    			</tr>	
    			<!-- <tr>
    				<td>City</td>
    				<td>:</td>
    				<td><input type="text" name="city" value="<?php echo $res['city']; ?>"></td>
    			</tr>	 -->
    			<tr>
    				<td>Phone</td>
    				<td>:</td>
    				<td><input type="text" name="phone" value="<?php echo $res['phone']; ?>"></td>
    			</tr>	
    			<!-- <tr>
    				<td>Country</td>
    				<td>:</td>
    				<td><?php echo $res['country']; ?></td>
    			</tr> -->	
    			<tr>
    				<td>Zipcode</td>
    				<td>:</td>
    				<td><input type="text" name="zipcode" value="<?php echo $res['zipcode']; ?>"></td>
    			</tr>	
    			<tr>
    				<td>Email</td>
    				<td>:</td>
    				<td><input type="text" name="email" value="<?php echo $res['email']; ?>"></td>
    			</tr>	
    			<tr>
    				<td>Address</td>
    				<td>:</td>
    				<td><input type="text" name="address" value="<?php echo $res['address']; ?>"></td>
    			</tr>	
    			<tr>
    				<td colspan="3"><input type="submit" value="Save" name="save"></td>

    			</tr>		
    			<?php 
    					}
    				}
    			?>
    		</table>
    		</form>
    		
 		</div>
	</div>
</div>

 	
<?php
	include 'inc/footer.php'; 
?>
