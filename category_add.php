<?php 
	
	require 'db_connect.php';

	$name=$_POST['name'];
	// $subcategory = $_POST['subcategory'];
	$image=$_FILES['image'];


	// $subcategory_count = count($subcategory);

	$source_dir="image/category/";
	$file_name = mt_rand(100000, 999999);
  	$file_exe_array = explode('.', $image['name']);
  	$file_exe = $file_exe_array[1];


	$file_path=$source_dir.$file_name.'.'.$file_exe;
	move_uploaded_file($image['tmp_name'],$file_path);


	$sql="INSERT into categories (photo, name) VALUES(:photo, :name)";
	$stmt= $pdo->prepare($sql);
	$stmt->bindParam(':photo',$file_path);
	$stmt->bindParam(':name',$name);
	$stmt->execute();

    // $last_id = $pdo->lastInsertId();

	if($stmt->rowCount()){
		header("location:category_list");
	}
	else{
		echo " Error !";
	}



?>