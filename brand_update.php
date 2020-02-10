<?php  
	require 'db_connect.php';

	$id=$_POST['id'];
	$name=$_POST['name'];
	$image=$_FILES['image'];

	$oldphoto = $_POST['oldphoto'];

	$file_path = $oldphoto;

	if ($image['size'] > 0) 
	{
		unlink($oldphoto);

		$source_dir="image/brand/";
		$file_path=$source_dir.$image['name'];
		move_uploaded_file($image['tmp_name'],$file_path);
	}


	$sql="UPDATE brands SET logo=:logo, name=:name  WHERE id=:id ";
	
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':logo',$file_path);
	$stmt->bindParam(':name',$name);
	$stmt->execute();

	if($stmt->rowCount())
	{
		header("location:brand_list");
	}
	else
	{
		echo "Error!";
	}
 ?>