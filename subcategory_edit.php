<?php 
	include 'backend_header.php';
	include 'db_connect.php';

	// get the id from address bar;
	$id = $_GET['id'];

	// draw out the query from the db
	$sql = "SELECT * FROM subcategories WHERE id = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!-- Begin Page Content -->
	<div class="container-fluid">
	  <!-- Page Heading -->
	  <h1 class="h3 mb-4 text-gray-800">
	  	<i class="fas fa-tags pr-3"></i> 
	  	Sub-category 
	  </h1>

	  <div class="card shadow mb-4">
		<div class="card-header py-3">
			<div class="row">
					<div class="col-10">
						<h4 class="m-0 font-weight-bold text-primary"> 
			            	Edit Existing Sub-category 
			            </h4>
					</div>

					<div class="col-2">
						<a href="subcategory_list" class="btn btn-outline-primary btn-block float-right"> 
		            		<i class="fa fa-backward pr-2"></i>	Go Back 
		            	</a>
					</div>
				</div>

        </div>
        <div class="card-body">
            <form action="subcategory_update" method="POST">
				
				<input type="hidden" name="id" value="<?php echo $row['id'] ?>">


				<div class="form-group row">
					<label for="categoryName" class="col-sm-2 col-form-label"> Category </label>
			    	
			    	<div class="col-sm-10">
			      		<select class="form-control" name="category">
			      			<option> Choose Category </option>
							
							<?php 
								$sql="SELECT * from categories ORDER BY name ASC";
					        	$stmt=$pdo->prepare($sql);
					        	$stmt->execute();
					        	$rows= $stmt->fetchAll();

					        	$i=1;
        						foreach ($rows as $category):

        						$id = $category['id'];
        						$name = $category['name']; 

							?>

								<option value="<?= $id; ?>" <?php if($row['category_id'] == $id) echo "selected" ?> > 
									<?= $name; ?> 
								</option>

							<?php endforeach; ?>

			      		</select>
			    	</div>
				</div>


				<div class="form-group row">
					<label for="categoryName" class="col-sm-2 col-form-label"> Name </label>
			    	
			    	<div class="col-sm-10">
			      		<input type="text" class="form-control" id="categoryName" placeholder="Enter Sub-category Name" name="name" value="<?php echo $row['name'] ?>">
			    	</div>
				</div>

				<div class="form-group row">
					<div class="col-sm-2"></div>
				    <div class="col-sm-10">
				      <button type="submit" class="btn btn-primary">
				      	<i class="fa fa-upload"></i> Update
				      </button>
				    </div>
				</div>

			</form>

        </div>
	  </div>

	</div>
<!-- /.container-fluid -->

<?php 
	include 'backend_footer.php'; 
?>