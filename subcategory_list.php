<?php 
	include 'backend_header.php';
	include 'db_connect.php';
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
			            	List 
			            </h4>
					</div>

					<div class="col-2">
						<a href="subcategory_new" class="btn btn-outline-primary btn-block float-right"> 
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
								<th> Name </th>
								<th> Category </th>
								<th> Action </th>
							</tr>
						</thead>

						<tbody>

							<?php 
								$sql="SELECT subcategories.*, categories.name as cname from subcategories
									LEFT JOIN categories
									ON subcategories.category_id = categories.id 
									ORDER BY subcategories.name ASC";
					        	$stmt=$pdo->prepare($sql);
					        	$stmt->execute();
					        	$rows= $stmt->fetchAll();

					        	$i=1;
        						foreach ($rows as $subcategory):

        						$id = $subcategory['id'];
        						$name = $subcategory['name'];
        						$cname = $subcategory['cname'];


							?>

							<tr>
								<td> <?= $i; ?> </td>
								<td> <?= $name; ?> </td>
								<td> <?= $cname; ?> </td>
								<td>
									<a href="subcategory_edit?id=<?= $id ?>" class="btn btn-outline-warning btnedit">
										<i class="fas fa-edit"></i>
									</a>

									<a href="subcategory_delete?id=<?= $id ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete?')" >
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

