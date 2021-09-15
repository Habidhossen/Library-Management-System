<?php

// declare variable
$server = "localhost";
$username = "root";
$password = "";

// create connection
$connection = mysqli_connect($server, $username, $password);
$database = mysqli_select_db($connection, "lms_db");
$query = "INSERT INTO users values(null,'$_POST[name]','$_POST[email]','$_POST[password]','$_POST[mobile]','$_POST[address]',current_timestamp())";
$query_run = mysqli_query($connection, $query);

?>


<script type="text/javascript">
    alert("Registration successfully, You may login now!")
    window.location.href = "index.php";
</script>