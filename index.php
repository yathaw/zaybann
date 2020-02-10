<?php 
	include('frontend_header.php');
	include('db_connect.php');

	$item_sql="SELECT * from items ORDER BY id DESC LIMIT 3";
  	$item_stmt=$pdo->prepare($item_sql);
  	$item_stmt->execute();
  	$items= $item_stmt->fetchAll();
?>	
	<!-- Page Content -->
  	<div class="container my-5">

	    <h1 class="mt-4 mb-3 primary position-relative"> 
	    	Flash Sale
	    </h1>
	    <hr style="background-color: #673AB7; height: 2px; max-width: 200px; margin: 0px;">

	    <div class="row my-5">
			
			<?php 
				foreach($items as $item):

				$id = $item['id'];
				$name = $item['name'];
				$photo = $item['photo'];
				$price = $item['price'];
				$discount = $item['discount'];


			?>

		    <div class="col-lg-4 col-sm-6 portfolio-item">
		        <div class="card h-100 ">
		          	<a href="#">
		          		<img class="card-img-top" src="<?= $photo; ?>" alt="" style="height: 350px;object-fit:cover;">
		          	</a>
		          	
		          	<div class="card-body p-3">
		            	<h6 class="card-title text-center mb-4">
		              		<a href="#" class="secondary"> <?= $name; ?> </a>
		            	</h6>

		            	<?php if($discount):?>
							<p class="font-weight-lighter d-inline"> <del>  <?=  $price; ?> Ks </del>  </p>
		            		
		            		<h4 class="text-danger d-inline">  <?= $discount; ?> Ks </h4>

		            	<?php else: ?>

		            		<h4 class="text-danger"> <?= $price; ?> Ks </h4>

		            	<?php endif; ?>

			        </div>

			        <div class="card-footer bg-transparent">
						<a href="" class="btn btn-secondary btn-block" style="background-color: #673AB7; border-color: #673AB7"> 
							<i class="fas fa-shopping-cart pr-3"></i> Add To Cart 
						</a>
					</div>

		        </div>
		    </div>

			<?php endforeach; ?>
		    
	    </div>
    <!-- /.row -->

    <!-- Our Customers -->
    <h2 class="mt-5 primary mb-3"> Categories </h2>
    <hr style="background-color: #673AB7; height: 2px; max-width: 170px; margin: 0px;">

    <div class="row mt-5">

    	<?php 
    		foreach($categories as $category):
    		$id = $category['id'];
    		$name = $category['name'];
    		$photo = $category['photo'];

    	?>

      	<div class="col-lg-2 col-sm-4 mb-4 text-center">
      		<a href="category?id=<?= $id ?>" class="secondary">
	        	<img class="img-fluid mx-auto d-block" src="<?= $photo; ?>" alt="" style="width: 70px; height: 70px;">
	        	<p class="mt-2"> <?= $name; ?> </p>
	        </a>
      	</div>

      	<?php endforeach; ?>
      
    </div>

  </div>
  <!-- /.container -->

	<div class="container-fluid bg-light p-5 mt-5">
		
		<div class="row">
	  		<div class="col-3">
				<div class="row">
				    <div class="col-md-4">
				    	<i class="fas fa-shipping-fast fa-3x primary"></i>
				    </div>
			    
			    	<div class="col-md-8">
		        		<h6>Door to Door Delivery</h6>
		        		<p class="text-muted" style="font-size: 12px">On-time Delivery</p>
			    	</div>
			  	</div>
	  		</div>

	  		<div class="col-3">
				<div class="row">
				    <div class="col-md-4">
				    	<i class="fas fa-phone fa-3x primary"></i>
				    </div>
			    
			    	<div class="col-md-8">
		        		<h6> Customer Service </h6>
		        		<p class="text-muted" style="font-size: 12px">  09-779-999-915 ၊ <br> 09-779-999-913 </p>
			    	</div>
			  	</div>
	  		</div>

	  		<div class="col-3">
				<div class="row">
				    <div class="col-md-4">
				    	<i class="fas fa-undo-alt fa-3x primary"></i>
				    </div>
			    
			    	<div class="col-md-8">
		        		<h6 > 100% satisfaction </h6>
		        		<p class="text-muted" style="font-size: 12px"> 3 days return </p>
			    	</div>
			  	</div>
	  		</div>

	  		<div class="col-3">
				<div class="row">
				    <div class="col-md-4">
				    	<i class="far fa-credit-card fa-3x primary"></i>
				    </div>
			    
			    	<div class="col-md-8">
		        		<h6> Cash on Delivery </h6>
		        		<p class="text-muted" style="font-size: 12px"> Door to Door Service </p>
			    	</div>
			  	</div>
	  		</div>
	  	</div>
	</div>
	
	<div class="container p-5">
		<div class="row text-center">
			<div class="col-12">
				<h1> News Letter </h1>
				<p>
					Subscribe to our newsletter and get 10% off your first purchase
				</p>

			</div>
			
			<div class="offset-2 col-8 offset-2 mt-5">
				<form>
					<div class="input-group mb-3">
						<input type="text" class="form-control form-control-lg px-5 py-3" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" style="border-top-left-radius: 15rem; border-bottom-left-radius: 15rem">
					  	
					  	<div class="input-group-append">
					    	<button class="btn btn-secondary" type="button" id="button-addon2" style="border-top-right-radius:15rem; border-bottom-right-radius: 15rem; background-color: #673AB7; border-color: #673AB7"> Subscribe </button>
					  	</div>


					</div>
				</form>
			</div>

		</div>
	</div>
	
<?php 
	include('frontend_footer.php');
?>