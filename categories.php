<?php 
	include('frontend_header.php');

	$category_sql="SELECT * from categories";
  	$category_stmt=$pdo->prepare($category_sql);
  	$category_stmt->execute();
  	$categories= $category_stmt->fetchAll();
?>

	<div class="container">

	    <!-- Page Heading/Breadcrumbs -->
	    <h1 class="mt-4 mb-3"> All Categories
	    </h1>

	    <ol class="breadcrumb">
	      	<li class="breadcrumb-item">
	        	<a href="index">Home</a>
	      	</li>
	      	<li class="breadcrumb-item active"> View More Categories </li>
	    </ol>

	    <div class="row">

	    	<?php 
	    		foreach($categories as $category):

	    		$id = $category['id'];
	    		$name = $category['name'];
	    		$photo = $category['photo'];
	    	?>
		    <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item text-center">
		        <div class="card h-100 pt-3">
		          	<a href="category?id=<?= $id ?>">
		          		<img class="card-img-top mx-auto d-block" src="<?= $photo; ?>" alt="" style="width: 70px; height: 70px;">
		          	</a>
		          
		          	<div class="card-body">
		            	<h5 class="card-title">
		              		<a href="category?id=<?= $id ?>" class="secondary"> <?= $name; ?> </a>
		            	</h5>
		          	</div>
		        </div>
		    </div>

			<?php endforeach; ?>
		</div>

	</div>

<?php 
	include('frontend_footer.php');
?>