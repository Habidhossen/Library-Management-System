<?php

session_start();
include '../../db_connection.php';

$sql = "DELETE FROM `user_tbl` WHERE Id = $_GET[userID]";
$query = mysqli_query($connection, $sql);

if($query){
	$_SESSION['userDeleteAlert'] = 'Deleted Successfully!';
	header("location: ../../reg_users.php");
	exit;
}else{
	echo 'Something went wrong!';
}

?>