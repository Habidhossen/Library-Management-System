<?php

include 'db_connection.php';
session_start();

// send book requests
if (isset($_POST['send_book_request'])) {

    $bookName = $_POST['bookName'];
    $authorName = $_POST['authorName'];
    $userId = $_POST['userId'];
    $userEmail = $_POST['userEmail'];

    $sql = "INSERT INTO `book-request_tbl`(`Book_Name`, `Author_Name`, `User_Id`, `User_Email`) VALUES ('$bookName','$authorName','$userId','$userEmail')";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $_SESSION['bookRequestAlert'] = 'Send Successfully!';
        header("location: book_request.php");
        exit;
    } else {
        echo 'Something went wrong!';
    }
}


// when User press backbutton after logout then he/she cannot access again this page without Login and this condition also use for security purpose.
if (!isset($_SESSION['userEmail'])) {
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- add custom font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- add bootstrap style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- add css file -->
    <link rel="stylesheet" href="css/style.css">
    <!-- add favicon file -->
    <link rel="shortcut icon" href="images/logo.svg" type="image/x-icon">
</head>

<body class="user-dashboard-body">

    <!-- ======= Header starts here ======= -->
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-0 border-bottom header-design">
        <a href="user_dashboard.php" class="d-flex align-items-center mb-3 mb-lg-0 text-dark text-decoration-none">
            <img class="bi me-2" width="40" height="32" src="images/logo.svg">
            <use xlink:href="#bootstrap"></use></img>
            <span class="navbar-brand mb-0 h1 text-primary"><b>Library Management System</b></span>
        </a>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

            <li><a class="nav-link px-2 link-primary"><strong><?php /*set default timezone as Asia/Dhaka -->*/ date_default_timezone_set("Asia/Dhaka"); /*now print current day & date -->*/
                                                                echo "Today is " . date("l, F j, Y"); ?></strong></a></li>

        </ul>
        <div class="col-md-3 text-end">

            <button class="btn btn-outline-primary btn-sm shadow dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                My Profile</button>
            <ul class="dropdown-menu dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item small" href="view_profile.php">View Profile</a></li>
                <li><a class="dropdown-item small" href="edit_profile.php">Edit Profile</a></li>
                <li><a class="dropdown-item small" href="change_password.php">Change Password</a></li>
            </ul>

            <a href="logout.php" class="btn btn-primary btn-sm shadow">Log out</a>
        </div>
    </header>
    <!-- ======= Header ends here======= -->




    <!-- ======= Edit-Profile starts here======= -->
    <div class="container col-lg-6 col-md-8 col-sm-8 book-request-card">

        <h5 class="mb-3 fw-bold text-light">Book Request</h5>
        <hr class="my-3 bg-light">


        <!-- PHP Coding for showing alert -->
        <?php
        if (isset($_SESSION['bookRequestAlert'])) {
        ?>
            <div class="alert alert-light alert-dismissible fade show small" role="alert">
                <strong>Book Request</strong>
                <?php echo $_SESSION['bookRequestAlert'];
                unset($_SESSION['bookRequestAlert']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>


        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

            <div class="form-group row align-items-center text-light">
                <label class="col-4">ID:</label>
                <div class="col-8">
                    <input name="userId" class="form-control alert-light" placeholder="Enter Your ID" required>
                </div>
            </div>

            <div class="form-group row align-items-center text-light mt-2">
                <label class="col-4">Email:</label>
                <div class="col-8">
                    <input name="userEmail" class="form-control alert-light" placeholder="Enter Your Email" required>
                </div>
            </div>

            <div class="form-group row align-items-center text-light mt-2">
                <label class="col-4">Book Name:</label>
                <div class="col-8">
                    <input name="bookName" class="form-control alert-light" placeholder="Enter Book Name" required>
                </div>
            </div>

            <div class="form-group row align-items-center text-light mt-2">
                <label class="col-4">Author Name:</label>
                <div class="col-8">
                    <input name="authorName" class="form-control alert-light" placeholder="Enter Author Name" required>
                </div>
            </div>

            <div class="mt-4">
                <button name="send_book_request" type="submit" class="w-100 btn btn-outline-light">SEND BOOK REQUEST</button>
            </div>
        </form>

    </div>
    <!-- ======= Edit-Profile ends here======= -->




    <!-- ======= Footer starts here ======= -->
    <footer>
        <p class="text-center small fixed-bottom">Copyright © 2021 Team <strong>Free Thinkers</strong>, All right reserved</p>
    </footer>
    <!-- ======= Footer ends here ======= -->




    <!-- ======= Bootstrap, JavaScript CDN add ======= -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>

</html>