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

		$source_dir="image/category/";
		$file_name = mt_rand(100000, 999999);
  		$file_exe_array = explode('.', $image['name']);
  		$file_exe = $file_exe_array[1];


		$file_path=$source_dir.$file_name.'.'.$file_exe;
		
		move_uploaded_file($image['tmp_name'],$file_path);
	}


	$sql="UPDATE categories SET photo=:photo, name=:name  WHERE id=:id ";
	
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':photo',$file_path);
	$stmt->bindParam(':name',$name);
	$stmt->execute();

	if($stmt->rowCount())
	{
		header("location:category_list");
	}
	else
	{
		echo "Error!";
	}
 ?>