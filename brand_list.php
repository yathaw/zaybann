<?php 
	include 'backend_header.php';
	include 'db_connect.php';
?>
<!-- Begin Page Content -->
	<div class="container-fluid">
	  <!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800">
	  		<i class="fas fa-medal pr-3"></i> 
	  		Brand 
	  	</h1>

		<div class="card shadow mb-4">
			<div class="card-header py-3">
	            <div class="row">
					<div class="col-10">
						<h4 class="m-0 font-weight-bold text-primary"> 
			            	List 
			            </h4>
					</div>

					<div class="col-2">
						<a href="brand_new" class="btn btn-outline-primary btn-block float-right"> 
		            		<i class="fa fa-plus pr-2"></i>	Add New 
		            	</a>
					</div>
				</div>
	        </div>
	        <div class="card-body">
				
				

	            <div class="table-responsive">
	            	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th> No </th>
								<th > Name </th>

								<th> Action </th>
							</tr>
						</thead>

						<tbody>

							<?php 
								$sql="SELECT * from brands ORDER BY name ASC";
					        	$stmt=$pdo->prepare($sql);
					        	$stmt->execute();
					        	$rows= $stmt->fetchAll();

					        	$i=1;
        						foreach ($rows as $brand):

        						$id = $brand['id'];
        						$name = $brand['name'];

							?>

							<tr>
								<td> <?= $i; ?> </td>
								<td> <?= $name ?> </td>
								
								<td>
									<a href="brand_detail?id=<?= $id ?>" class="btn btn-outline-info btnedit">
										<i class="fas fa-info"></i>
									</a>

									<a href="brand_edit?id=<?= $id ?>" class="btn btn-outline-warning btnedit">
										<i class="fas fa-edit"></i>
									</a>

									<a href="brand_delete?id=<?= $id ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete?')" >
										<i class="fas fa-trash"></i>
									</a>
								</td>
							</tr>

							<?php 
								$i++;
								endforeach; 
							?>

						</tbody>

						

	            	</table>
	            </div>
	        </div>
		</div>

	</div>
<!-- /.container-fluid -->

<?php 
	include 'backend_footer.php'; 
?>

