<?php 
	
	require 'db_connect.php';

	$name=$_POST['name'];
	$category=$_POST['category'];


	$sql="INSERT into subcategories (name, category_id) VALUES(:name, :category)";
	$stmt= $pdo->prepare($sql);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':category',$category);
	$stmt->execute();

	if($stmt->rowCount()){
		header("location:subcategory_list");
	}
	else{
		echo " Error !";
	}



?>