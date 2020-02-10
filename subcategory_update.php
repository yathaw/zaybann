<?php  
	require 'db_connect.php';

	$id=$_POST['id'];
	$name=$_POST['name'];
	$category=$_POST['category'];


	$sql="UPDATE subcategories SET name=:name, category_id=:category  WHERE id=:id ";
	
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':category',$category);

	$stmt->execute();

	if($stmt->rowCount())
	{
		header("location:subcategory_list");
	}
	else
	{
		echo "Error!";
	}
 ?>