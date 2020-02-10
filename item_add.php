<?php 
	
	require 'db_connect.php';

	$name=$_POST['name'];
	$image=$_FILES['image'];

	$unitprice=$_POST['unitprice'];
	$discount=$_POST['discount'];
	$description=$_POST['description'];
	$brand=$_POST['brand'];
	$subcategory=$_POST['category'];

	$codeno = "ZB_".mt_rand(100000, 999999);

	$source_dir="image/item/";
	$file_name = mt_rand(100000, 999999);
  	$file_exe_array = explode('.', $image['name']);
  	$file_exe = $file_exe_array[1];


	$file_path=$source_dir.$file_name.'.'.$file_exe;
	
	move_uploaded_file($image['tmp_name'],$file_path);


	$sql="INSERT into items (codeno, name, photo, price, discount, description, brand_id, subcategory_id) VALUES(:codeno, :name, :photo, :price, :discount, :description, :brandid, :subcategoryid)";
	$stmt= $pdo->prepare($sql);
	$stmt->bindParam(':codeno',$codeno);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':photo',$file_path);
	$stmt->bindParam(':price',$unitprice);
	$stmt->bindParam(':discount',$discount);
	$stmt->bindParam(':description',$description);
	$stmt->bindParam(':brandid',$brand);
	$stmt->bindParam(':subcategoryid',$subcategory);

	$stmt->execute();

    // $last_id = $pdo->lastInsertId();

	if($stmt->rowCount()){
		header("location:item_list");
	}
	else{
		echo " Error !";
	}



?>