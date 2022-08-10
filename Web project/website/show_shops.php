<?php
     include_once '../web/Db.php';
    $category_id=$_GET['category_id'];
	$query1="SELECT*FROM shops where Categories	=$category_id";
	$qqq=mysqli_query($c,$query1);
     
	$Search = $_POST['Search'];
	if($_SERVER['REQUEST_METHOD']== "POST"){
		
		
	}
	
?>
<!DOCTYPE html>
<html lang="en">
    <?php
        include_once "partial2/heade.php";
	?>
	<body>
		<!-- HEADER -->
		<?php
        include_once "partial2/header.php";
	    ?>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<?php
        include_once "partial2/nav.php";
	    ?>
		<!-- /NAVIGATION -->

		

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Related Products</h3>
						</div>
					</div>
					<?php
					if($Search != 0){
						$query2="SELECT*FROM shops where name ='$Search'";
	                    $sss=mysqli_query($c,$query2);
						$shop2=mysqli_fetch_assoc($sss);

						echo '<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="http://localhost/php/project2/upload/images/'.$shop2["image"].'" alt="" width="10px" height="110px">
								<div class="product-label">
									<span class="new">NEW</span>
								</div>
							</div>
							<div class="product-body">
								<p class="product-category">'.$shop2["name"].'</p>
								<h3 class="prodect_name" ><a href="#">'.$shop2["name"].'</a></h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
									<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
								</div>
							</div>
							<div class="add-to-cart">
								<a herf="show_shop.php" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> show shop</a>
							</div>
						</div>
					</div>';

					}else{
					  while($shop=mysqli_fetch_assoc($qqq)){
						  						
						echo '<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="http://localhost/php/project2/upload/images/'.$shop["image"].'" alt="" width="10px" height="110px">
								<div class="product-label">
									<span class="new">NEW</span>
								</div>
							</div>
							<div class="product-body">
								<p class="product-category">'.$shop["name"].'</p>
								<h3 class="prodect_name" ><a href="#">'.$shop["name"].'</a></h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
									<a herf="show_shop.php" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"></span></a>
								</div>
							</div>
							<div class="add-to-cart">
							<form class ="c_form" action="show_shop.php" method="POST">
								<input type="hidden"  value="'.$shop["id"].'" name="id">
							</form>
							<a href="show_shop.php"class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>show shop</a>
							
							</div>
						</div>
					</div>';
						}
					}  
					?>

					<!-- product -->
					
					<!-- /product -->

					<div class="clearfix visible-sm visible-xs"></div>

				

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<?php
			include_once "partial2/footer.php";
		?>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
