<!-- PHP Coding... -->
<?php

include 'db_connection.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];


    $emailQuery = "SELECT * FROM `user_tbl` WHERE Email = '$email'";
    $query = mysqli_query($connection, $emailQuery);
    $emailCount = mysqli_num_rows($query);
    if ($emailCount > 0) {
        echo 'email already exists';
?>
        <!-- JavaScript Coding... -->
        <script type="text/javascript">
            alert("Email already exists! Please enter a  valid email.")
            window.location.href = "signup.php";
        </script>
    <?php
    } 
    
    else {
        // $hash_password = password_hash($password, PASSWORD_BCRYPT); //encrypt password using CRYPT_BLOWFISH algorithm

        $query = "INSERT INTO `user_tbl`(`Name`, `Email`, `Password`, `Mobile`, `Address`) VALUES ('$name','$email','$password','$mobile','$address')";
        $query_run = mysqli_query($connection, $query);
    ?>
        <!-- JavaScript Coding... -->
        <script type="text/javascript">
            alert("Registration successfully. You may login now")
            window.location.href = "index.php";
        </script>
<?php
    }
}

?>