<?php

include 'db_connection.php';
session_start();
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




    <!-- ======= Body Header starts here ======= -->
    <header class="d-flex align-items-center justify-content-center border-bottom header-design" style="background-color: darkslateblue;">

        <div class="col-lg-7 col-md-8 col-sm-12 justify-content-center m-3">

            <h3 class="m-3 text-center text-white">Welcome! <strong><?php echo $_SESSION['userName']; ?></strong></h3>
            <p class="mb-4 text-center text-white">This is your dashboard. Now you can access all the features of our library from here.</p>

            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Type a book name" required>
                <button type="submit" name="button" class="btn btn-outline-light mx-1">Search Book</button>
            </div>
        </div>

    </header>
    <!-- ======= Body Header ends here ======= -->




    <!-- ======= User-Dashboard starts here======= -->
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 mt-2 g-4 justify-content-center">
            <div class="col">
                <div class="card-body custom-user-card p-4">
                    <h5 class="card-title text-success"><strong>Issued Book</strong></h5>
                    <p class="card-text small">See your issued book here!<br><br></p>
                    <a href="#" class="btn btn-success btn-sm d-flex justify-content-center">See more</a>
                </div>
            </div>
            <div class="col">
                <div class="card-body custom-user-card p-4">
                    <h5 class="card-title text-primary"><strong>Book Request</strong></h5>
                    <p class="card-text small">If you need any kind of book, Please send request!</p>
                    <a href="book_request.php" class="btn btn-primary btn-sm d-flex justify-content-center">See more</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ======= User-Dashboard ends here======= -->




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