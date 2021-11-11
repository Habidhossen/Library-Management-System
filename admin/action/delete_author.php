<?php

session_start();
include '../../db_connection.php';

$sql = "DELETE FROM `author_tbl` WHERE Author_Id = $_GET[authorID]";
$query = mysqli_query($connection, $sql);

if($query){
	$_SESSION['authorDeleteAlert'] = 'Deleted Successfully!';
	header("location: ../../reg_author.php");
	exit;
}else{
	echo 'Something went wrong!';
}

?>