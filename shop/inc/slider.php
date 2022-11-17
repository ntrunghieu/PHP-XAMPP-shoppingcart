<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php 
					$getLatestSony = $product->getLatestSony();
					if ($getLatestSony) {
						while($resSony = $getLatestSony->fetch_assoc()){


				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php"> <img src="admin/uploads/<?php echo $resSony['product_img']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>SONY</h2>
						<p><?php echo $resSony['product_name']?></p>
						<div class="button"><span><a href="details.php?product_detail_id=<?php echo $resSony['product_id'] ?>">Add to cart</a></span></div>
				   </div>
			   </div>
			   <?php 
			   	}
					}
			   ?>	


			   	<?php 
					$getLatestNikon = $product->getLatestNikon();
					if ($getLatestNikon) {
						while($resNikon = $getLatestNikon->fetch_assoc()){


				?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php"><img src="admin/uploads/<?php echo $resNikon['product_img']?>" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>NIKON</h2>
						  <p><?php echo $resNikon['product_name']?></p>
						  <div class="button"><span><a href="details.php?product_detail_id=<?php echo $resNikon['product_id'] ?>">Add to cart</a></span></div>
					</div>
				</div>
				  <?php 
			   	}
					}
			   ?>	
			</div>
			<div class="section group">
				<?php 
					$getLatestKodak = $product->getLatestKodak();
					if ($getLatestKodak) {
						while($resKodak = $getLatestKodak->fetch_assoc()){


				?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php"> <img src="admin/uploads/<?php echo $resKodak['product_img']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>KODAK</h2>
						<p><?php echo $resKodak['product_name']?></p>
						<div class="button"><span><a href="details.php?product_detail_id=<?php echo $resKodak['product_id'] ?>">Add to cart</a></span></div>
				   </div>
			   </div>
			     <?php 
			   	}
					}
			   ?>


			   	<?php 
					$getLatestCanon = $product->getLatestCanon();
					if ($getLatestCanon) {
						while($resCanon = $getLatestCanon->fetch_assoc()){


				?>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php"><img src="admin/uploads/<?php echo $resCanon['product_img']?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>CANON</h2>
						  <p><?php echo $resCanon['product_name']?></p>
						  <div class="button"><span><a href="details.php?product_detail_id=<?php echo $resCanon['product_id'] ?>">Add to cart</a></span></div>
					</div>
				</div>
				   <?php 
			   	}
					}
			   ?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>