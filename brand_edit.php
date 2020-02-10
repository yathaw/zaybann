<?php 
	include 'backend_header.php';
	include 'db_connect.php';

	// get the id from address bar;
	$id = $_GET['id'];

	// draw out the query from the db
	$sql = "SELECT * FROM brands 
			WHERE id = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!-- Begin Page Content -->
	<div class="container-fluid">
	  <!-- Page Heading -->
	  <h1 class="h3 mb-4 text-gray-800">
	  	<i class="fas fa-medal pr-3"></i> 
	  	Category 
	  </h1>

	  <div class="card shadow mb-4">
		<div class="card-header py-3">
			<div class="row">
					<div class="col-10">
						<h4 class="m-0 font-weight-bold text-primary"> 
			            	Edit Existing Brand 
			            </h4>
					</div>

					<div class="col-2">
						<a href="brand_list" class="btn btn-outline-primary btn-block float-right"> 
		            		<i class="fa fa-backward pr-2"></i>	Go Back 
		            	</a>
					</div>
				</div>

        </div>
        <div class="card-body">
            <form action="brand_update" method="POST" enctype="multipart/form-data">
				
				<input type="hidden" name="id" value="<?= $row['id'] ?>">
				<input type="hidden" name="oldphoto" value="<?= $row['logo'] ?>">


            	<div class="form-group row">
					<label for="categoryName" class="col-sm-2 col-form-label"> Photo  </label>
			    	
			    	<div class="col-sm-10">
			      		<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
						    	<a class="nav-link active" id="oldprofile-tab" data-toggle="tab" href="#oldprofile" role="tab" aria-controls="oldprofile" aria-selected="true"> Old Profile </a>
						  	</li>
						 	<li class="nav-item">
						    	<a class="nav-link" id="newprofile-tab" data-toggle="tab" href="#newprofile" role="tab" aria-controls="newprofile" aria-selected="false"> New Profile</a>
						  	</li>
						</ul>

						<div class="tab-content" id="myTabContent">
						  	<div class="tab-pane fade show active" id="oldprofile" role="tabpanel" aria-labelledby="oldprofile-tab">
						  		<img src="<?= $row['logo']; ?>" class="img-fluid" style="width: 150px; height: 120px;">
						  	</div>

						  	<div class="tab-pane fade" id="newprofile" role="tabpanel" aria-labelledby="newprofile-tab">
						  		<input type="file" name="image">
						  	</div>
						</div>
			    	</div>
				</div>

				<div class="form-group row">
					<label for="categoryName" class="col-sm-2 col-form-label"> Name </label>
			    	
			    	<div class="col-sm-10">
			      		<input type="text" class="form-control" id="categoryName" placeholder="Enter Brand Name" name="name" value="<?= $row['name'] ?>">
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