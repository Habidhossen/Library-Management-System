<?php

session_start();
include '../../db_connection.php';

$sql = "DELETE FROM `category_tbl` WHERE Category_Id = $_GET[categoryID]";
$query = mysqli_query($connection, $sql);

if($query){
	$_SESSION['categoryDeleteAlert'] = 'Deleted Successfully!';
	header("location: ../../reg_category.php");
	exit;
}else{
	echo 'Something went wrong!';
}

?>