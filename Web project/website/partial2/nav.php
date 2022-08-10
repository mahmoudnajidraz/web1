<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
            <?php
              include_once '../web/Db.php';
              $query="SELECT*FROM categories ";
              $result=mysqli_query($c,$query);
              while($row=mysqli_fetch_assoc($result)){
                
                echo '<li><a href="show_shops.php?category_id='.$row['id'].'">'.$row["name"].'</a></li>';

              }
              
              ?>
						<li><a href="#">Hot Deals</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>