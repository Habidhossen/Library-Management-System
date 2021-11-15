<?php

session_start();
include '../../db_connection.php';

$sql = "DELETE FROM `issued-book_tbl` WHERE Serial_No = $_GET[serialNo]";
$query = mysqli_query($connection, $sql);

if($query){
	$_SESSION['issuedBookDeleteAlert'] = 'Deleted Successfully!';
	header("location: ../../issued_book.php");
	exit;
}else{
	echo 'Something went wrong!';
}

?>