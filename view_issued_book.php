<?php

include 'db_connection.php';
session_start();


// count total user issued-book from database
function userIssuedBookCountFunction()
{

    include 'db_connection.php';
    $userIssuedBookCount = '';
    $sql = "SELECT COUNT(*) AS userIssuedBook FROM `issued-book_tbl` WHERE Member_Id = $_SESSION[userId]";
    $query = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $userIssuedBookCount = $row['userIssuedBook'];
    }
    return ($userIssuedBookCount);
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



    <div class="container custom-datatable-card mb-4">

        <!-- showing action alert! PHP -->
        <?php
        if (isset($_SESSION['bookReqDeleteAlert'])) {
        ?>
            <div class="alert alert-danger alert-dismissible fade show small" role="alert">
                <strong>Book Request</strong>
                <?php echo $_SESSION['bookReqDeleteAlert'];
                unset($_SESSION['bookReqDeleteAlert']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>


        <div class="d-flex justify-content-between mb-3">

            <h5 class="justify-content-start fw-bold mb-4 text-success">Issued Book</h5>
            <h5 class="justify-content-right fw-bold mb-4 text-success">Total Book: <?php echo userIssuedBookCountFunction(); ?></h5>

        </div>

        <table class="table table-hover table-bordered small border-success">
            <thead class="table-success">
                <tr>
                    <th scope="col">Serial No</th>
                    <th scope="col">Book Id</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Book Author</th>
                    <th scope="col">Category</th>
                    <th scope="col">Issued Date</th>
                </tr>
            </thead>
            <tbody>

                <?php
                // declare empty variable for storing users data
                $serialNo = "";
                $bookId = "";
                $bookName = "";
                $bookAuthor = "";
                $category = "";
                $issuedDate = "";

                $sql = "SELECT * FROM `issued-book_tbl` WHERE Member_Id = $_SESSION[userId]";
                $query = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($query)) {
                    $serialNo = $row['Serial_No'];
                    $bookId = $row['Book_Id'];
                    $bookName = $row['Book_Name'];
                    $bookAuthor = $row['Book_Author'];
                    $category = $row['Category'];
                    $issuedDate = $row['Issued_Date'];

                ?>
                    <tr>
                        <td><?php echo $serialNo; ?></td>
                        <td><?php echo $bookId; ?></td>
                        <td><?php echo $bookName; ?></td>
                        <td><?php echo $bookAuthor; ?></td>
                        <td><?php echo $category; ?></td>
                        <td><?php echo $issuedDate; ?></td>
                    </tr>
                <?php
                }
                ?>

        </table>
    </div>











    <!-- ======= Footer starts here ======= -->
    <footer>
        <p class="text-center small fixed-bottom">Copyright ?? 2021 Team <strong>Free Thinkers</strong>, All right reserved</p>
    </footer>
    <!-- ======= Footer ends here ======= -->




    <!-- ======= Bootstrap, JavaScript CDN add ======= -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>

</html>