<?php

session_start();
include '../../db_connection.php';

$sql = "DELETE FROM `book-request_tbl` WHERE Request_Id = $_GET[requestID]";
$query = mysqli_query($connection, $sql);

if($query){
	$_SESSION['bookReqDeleteAlert'] = 'Deleted Successfully!';
	header("location: ../../view_book_request.php");
	exit;
}else{
	echo 'Something went wrong!';
}

?>