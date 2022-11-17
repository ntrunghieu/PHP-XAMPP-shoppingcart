<?php
	include 'inc/header.php';
	// include 'inc/slider.php'	
?>
<?php
    if (!isset($_GET['cat_id']) || $_GET['cat_id'] == NULL) {

 		echo "<script> window.location = '404.php'  </script>";
        
    } else{

       $id = $_GET['cat_id'];
    }
    $cat = new category();
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $cat_name = $_POST['cat_name'];
        $update_cate = $cat->update_category($cat_name, $id);
     }
 
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    			<?php 
							$name_cat = $category->get_name_product_by_cat($id);
							if ($name_cat) {
								while($res = $name_cat->fetch_assoc()){														
				?>
    		<div class="heading">
    		<h3> Category : <?php echo $res['cat_name']; ?> </h3>
    		</div>
    		<?php 
							}
						}
			?>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
							$productByCat = $category->get_product_by_cat($id);
							if ($productByCat) {
								while($res = $productByCat->fetch_assoc()){														
				?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.html"><img width="200px" src="admin/uploads/<?php echo $res['product_img']?>" alt="" /></a>
					 <h2><?php echo $res['product_name']?> </h2>
					 <p><?php echo $fm->textShorten($res['product_desc'],200)?></p>
					 <p><span class="price"><?php echo $res['product_price']." "." VNĐ"?></span></p>
				     <div class="button"><span><a href="details.php?product_detail_id=<?php echo $res['product_id'] ?>" class="details">Details</a></span></div>
				</div>

				   <?php 
							}
						} else{
							echo 'Category not available';
						}
				   ?>
				
			</div>

	
	
    </div>
 </div>

 
<?php
	include 'inc/footer.php'; 
?>