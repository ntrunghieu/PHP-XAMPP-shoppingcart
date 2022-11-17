<?php
	include 'inc/header.php';
	// include 'inc/slider.php'
?>
<?php 
	$login_check = Session::get('customer_login');
	if ($login_check) {
		header('Location:order.php');
	} 
?>
<?php 
// dang ky
	$customer = new customer();
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {       
      $insertCustomer = $customer->insert_customer($_POST);
   }
?>
<?php 
// dang nhap
	$customer = new customer();
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {       
      $loginCustomer = $customer->login_customer($_POST);
	}
?>
<style type="text/css">
	.error {
		color: red;
		font-weight: 600;
	}
	.success {
		color: green;
		font-weight: 600;
	}
</style>
 <div class="main">
    <div class="content" style="display: flex;">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<?php 
    			if (isset($loginCustomer)) {
    				echo $loginCustomer;
    			} 
    		?>
    		<!-- form dang nhap -->
        	<form action="" method="post" >
            <input name="email" type="text" placeholder="Enter email">
            <input name="password" type="password" placeholder="Enter password">
            <p class="note">If you forgot your passoword just enter your email and click 
               <a href="#">here</a>
            </p>
            <div class="buttons">
               <div>
                 	<button type="submit" name="login" class="grey">Sign In</button>
               </div>
            </div>
         </form>
      </div>


<!-- form dang ky -->
    	<div class="register_account" >
    		<h3>Register New Account</h3>
    		<?php 
    			if (isset($insertCustomer)) {
    				echo $insertCustomer;
    			} 
    		?>
    		<form method="post" action="">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Enter Name" >
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Enter City">
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="Enter Zip-code">
							</div>
							<div>
								<input type="text" name="email" placeholder="Enter Email">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Enter Address">
						</div>
		    		<div>
						<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Select a Country</option>         
					
							<option value="hcm">Hồ Chí Minh</option>
							<option value="na">Nghệ An</option>
							<option value="hn">Hà Nội</option>
							<option value="dn">Đà Nẵng</option>
							<option value="hu">Huế</option>
							
		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Enter phone" >
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="Enter passoword">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button type="submit" name="submit" class="grey">Create Account</button></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 
<?php
	include 'inc/footer.php'; 
?>


