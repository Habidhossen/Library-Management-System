<?php

//declare variable
$serverName = "localhost";
$userName = "root";
$password = "";
$databaseName = "";
 
//create connection with databse
$connection = mysqli_connect($serverName, $userName, $password, $databaseName);

//connection check
if(!$connection) {
    die("Connection failed! Due to" . mysqli_connect_error());
}
echo "Connected successfully";

?>