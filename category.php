<?php 
	include('frontend_header.php');

	$directoryURI = $_SERVER['REQUEST_URI'];
	$path = parse_url($directoryURI, PHP_URL_PATH);
	$components = explode('=', $directoryURI);
	$sub_route = $components[1];

	if(isset($_GET['id']))
	{
	 $id = $_GET['id'];
	}

	$subcategories_sql="SELECT subcategories.*, categories.id as cid, 					categories.name as cname 
						from subcategories
						INNER JOIN categories ON 
						subcategories.category_id = categories.id
						WHERE subcategories.category_id = :id 
						ORDER BY subcategories.name ASC";
  $subcategories_stmt=$pdo->prepare($subcategories_sql);
	$subcategories_stmt->bindParam(':id', $id);
  $subcategories_stmt->execute();
  $subcategories= $subcategories_stmt->fetchAll();

  // $row_first = $subcategories_stmt->get_result();
  $subcategory_sql="SELECT subcategories.*, categories.id as cid,           categories.name as cname 
            from subcategories
            INNER JOIN categories ON 
            subcategories.category_id = categories.id
            WHERE subcategories.category_id = :id 
            ORDER BY subcategories.name ASC";
  $subcategory_stmt=$pdo->prepare($subcategory_sql);
  $subcategory_stmt->bindParam(':id', $id);
  $subcategory_stmt->execute();
  $subcategory= $subcategory_stmt->fetch((PDO::FETCH_ASSOC));



  $category_sql="SELECT * from categories WHERE id=:id";
  $category_stmt=$pdo->prepare($category_sql);
	$category_stmt->bindParam(':id', $id);
  $category_stmt->execute();
  $category= $category_stmt->fetch((PDO::FETCH_ASSOC));
?>
	
	  <!-- Page Content -->
  	<div class="container mt-5">

    	<!-- Page Heading/Breadcrumbs -->
    	<h1 class="mt-4 mb-3 subcategoryTitle"> <?= $subcategory['name']; ?>
    	</h1>
      <input type="hidden" id="subcategoryid" value="<?= $subcategory['id']; ?>">

    	<ol class="breadcrumb">
      		<li class="breadcrumb-item">
        		<a href="index">Home</a>
      		</li>

          <li class="breadcrumb-item">
            <a href="categories"> Category </a>
          </li>

      		<li class="breadcrumb-item active"> <?= $category['name']; ?> </li>
    	</ol>

    
    	<!-- Content Row -->
    	<div class="row">
      		<!-- Sidebar Column -->
      		<div class="col-lg-3 mb-4">
        		
        		<div class="list-group">

        			<?php 
        				foreach($subcategories as $subcategory):
        				$sid = $subcategory['id'];
        				$name = $subcategory['name'];
        			?>

          			<a href="javascript:void(0)" class="listgroup_<?= $sid ?> list-group-item " data-id="<?= $sid ?>" id="subcategoryList"> <?= $name; ?> </a>
          			<?php endforeach; ?>
        		</div>
      		</div>
      		<!-- Content Column -->
      
      	<div class="col-lg-9 mb-4">

          <div class="row" id="itemDiv"></div>

      	</div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->


<?php 

	include('frontend_footer.php');
?>