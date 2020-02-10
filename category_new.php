<?php 
	include 'backend_header.php';
	include 'db_connect.php';
?>

<!-- Begin Page Content -->
	<div class="container-fluid">
	  <!-- Page Heading -->
	  	<h1 class="h3 mb-4 text-gray-800">
	  		<i class="fas fa-tag pr-3"></i> 
	  		Category 
	  	</h1>

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<div class="row">
					<div class="col-10">
						<h4 class="m-0 font-weight-bold text-primary"> 
			            	Create New Category 
			            </h4>
					</div>

					<div class="col-2">
						<a href="category_list" class="btn btn-outline-primary btn-block float-right"> 
		            		<i class="fa fa-backward pr-2"></i>	Go Back 
		            	</a>
					</div>
				</div>

	        </div>
	        <div class="card-body">
	            <form action="category_add" method="POST" enctype="multipart/form-data">

	            	<div class="form-group row">
						<label for="categoryName" class="col-sm-2 col-form-label"> Photo  </label>
				    	
				    	<div class="col-sm-10">
				      		<input type="file" name="image">
				    	</div>
					</div>

					<div class="form-group row">
						<label for="categoryName" class="col-sm-2 col-form-label"> Name </label>
				    	
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control" id="categoryName" placeholder="Enter Category Name" name="name">
				    	</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-2"></div>
					    <div class="col-sm-10">
					      <button type="submit" class="btn btn-primary">
					      	<i class="fa fa-save"></i> Save
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