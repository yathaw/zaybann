<?php 
	
	require 'db_connect.php';

	$name=$_POST['name'];
	$image=$_FILES['image'];


	$source_dir="image/brand/";
	$file_path=$source_dir.$image['name'];
	move_uploaded_file($image['tmp_name'],$file_path);


	$sql="INSERT into brands (logo, name) VALUES(:logo, :name)";
	$stmt= $pdo->prepare($sql);
	$stmt->bindParam(':logo',$file_path);
	$stmt->bindParam(':name',$name);
	$stmt->execute();

    // $last_id = $pdo->lastInsertId();

	if($stmt->rowCount()){
		header("location:brand_list");
	}
	else{
		echo " Error !";
	}



?>