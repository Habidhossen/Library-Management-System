<?php

session_start();
include '../../db_connection.php';

$sql = "DELETE FROM `book_tbl` WHERE Book_Id = $_GET[bookID]";
$query = mysqli_query($connection, $sql);

if($query){
	$_SESSION['bookDeleteAlert'] = 'Deleted Successfully!';
	header("location: ../../reg_book.php");
	exit;
}else{
	echo 'Something went wrong!';
}

?>