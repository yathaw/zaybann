<?php 
	include 'db_connect.php';

	$id = $_GET['id'];
	
	// var_dump($id);die();
  	$items_sql = "SELECT items.*, subcategories.name as scname FROM items
                INNER JOIN subcategories 
                ON items.subcategory_id = subcategories.id 
                WHERE subcategories.id = :id
                ORDER BY subcategories.name ASC";
  	$items_stmt = $pdo->prepare($items_sql);
  	$items_stmt->bindParam(':id', $id);
  	$items_stmt->execute();

  	$items = $items_stmt->fetchAll();

  	echo json_encode($items); 

?>