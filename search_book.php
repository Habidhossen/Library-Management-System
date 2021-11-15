<?php

include 'db_connection.php';
session_start();

// get user search input by SESSION
$_SESSION['inputValue'] = $_POST['inputValue'];

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




    <div class="container search-result-card">

        <h5 class="mb-5">Search by <strong>'<?php echo $_SESSION['inputValue']; ?>'</strong></h5>

        <table class="table table-hover table-borderless small">

            <!-- search book funtionality-->
            <?php
            if (isset($_POST['search-btn'])) {

                $bookName = "";
                $author = "";
                $category = "";
                $language = "";
                $publisher = "";
                $bookPrice = "";
                $inputValue = $_POST['inputValue'];

                $sql = "SELECT * FROM `book_tbl` WHERE `Book_Name` LIKE '%$inputValue%' OR `Book_Author` LIKE '%$inputValue%'";
                $result = mysqli_query($connection, $sql);

                // if only one or more row execute then show search result otherwise print 'Book not found' message.
                if (mysqli_num_rows($result) > 0) {
            ?>
                    <thead>
                        <tr>
                            <th scope="col">Book Name</th>
                            <th scope="col">Author Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Language</th>
                            <th scope="col">Publisher</th>
                            <th scope="col">Book Price</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            $bookName = $row['Book_Name'];
                            $author = $row['Book_Author'];
                            $category = $row['Book_Category'];
                            $language = $row['Language'];
                            $publisher = $row['Publisher'];
                            $bookPrice = $row['Book_Price'];

                        ?>
                            <tr>
                                <td><?php echo $bookName; ?></td>
                                <td><?php echo $author; ?></td>
                                <td><?php echo $category; ?></td>
                                <td><?php echo $language; ?></td>
                                <td><?php echo $publisher; ?></td>
                                <td><?php echo $bookPrice; ?></td>
                                <td>Available</td>
                            </tr>
                        <?php
                        }
                    } else {
                        // echo 'Sorry! Book not found'; 
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Sorry! Book not found.
                        </div>
                <?php
                    }
                }
                ?>
                    </tbody>
        </table>
    </div>




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