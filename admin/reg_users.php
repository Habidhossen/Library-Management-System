<?php

include '../db_connection.php';
session_start();

// update User profile
if (isset($_POST['update_user_profile'])) {

    $userId = $_POST['userId'];
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPhone = $_POST['userPhone'];
    $userAddress = $_POST['userAddress'];

    $sql = "UPDATE `user_tbl` SET `Name`='$userName',`Email`='$userEmail',`Mobile`='$userPhone',`Address`='$userAddress' WHERE Id = '$userId'";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $_SESSION['userUpdateAlert'] = 'Updated Successfully!';
        header("location: reg_users.php");
        exit;
    } else {
        echo 'Something went wrong!';
    }
}


// add book
if (isset($_POST['add-book'])) {

    $bookName = $_POST['bookName'];
    $bookAuthor = $_POST['bookAuthor'];
    $bookCategory = $_POST['bookCategory'];
    $bookLanguage = $_POST['bookLanguage'];
    $bookPublisher = $_POST['bookPublisher'];
    $bookPrice = $_POST['bookPrice'];

    $sql = "INSERT INTO `book_tbl`(`Book_Name`, `Book_Author`, `Book_Category`, `Language`, `Publisher`, `Book_Price`) VALUES ('$bookName','$bookAuthor','$bookCategory','$bookLanguage','$bookPublisher','$bookPrice')";
    $query = mysqli_query($connection, $sql);
    if ($query) {
        $_SESSION['addBookAlert'] = 'Added Successfully!';
        header("location: admin_dashboard.php");
        exit;
    } else {
        echo 'Something went wrong!';
    }
}
// add author
if (isset($_POST['add-author'])) {
    $authorName = $_POST['author-name'];
    $sql = "INSERT INTO `author_tbl`(`Author_Name`) VALUES ('$authorName')";
    $query = mysqli_query($connection, $sql);
    if ($query) {
        $_SESSION['addAuthorAlert'] = 'Added Successfully!';
        header("location: admin_dashboard.php");
        exit;
    } else {
        echo 'Something went wrong!';
    }
}
// add category
if (isset($_POST['add-category'])) {
    $categoryName = $_POST['category-name'];
    $sql = "INSERT INTO `category_tbl`(`Category_Name`) VALUES ('$categoryName')";
    $query = mysqli_query($connection, $sql);
    if ($query) {
        $_SESSION['addCategoryAlert'] = 'Added Successfully!';
        header("location: admin_dashboard.php");
        exit;
    } else {
        echo 'Something went wrong!';
    }
}
// book issue
if (isset($_POST['book-issue'])) {
    $categoryName = $_POST['category-name'];

    $memberId = $_POST['memberId'];
    $bookId = $_POST['bookId'];
    $bookName = $_POST['bookName'];
    $bookAuthor = $_POST['bookAuthor'];
    $category = $_POST['category'];
    $issuedDate = $_POST['issuedDate'];

    $sql = "INSERT INTO `issued-book_tbl`(`Member_Id`, `Book_Id`, `Book_Name`, `Book_Author`, `Category`, `Issued_Date`) VALUES ('$memberId','$bookId','$bookName','$bookAuthor','$category',' $issuedDate')";
    $query = mysqli_query($connection, $sql);
    if ($query) {
        $_SESSION['issueBookAlert'] = 'Successfully!';
        header("location: admin_dashboard.php");
        exit;
    } else {
        echo 'Something went wrong!';
    }
}


// when User press backbutton after logout then he/she cannot access again this page without Login and this condition also use for security purpose.
if (!isset($_SESSION['adminEmail'])) {
    header("location: admin/index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Datatable CSS CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <!-- add custom font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- add bootstrap style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- add css file -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- add favicon file -->
    <link rel="shortcut icon" href="../images/logo.svg" type="image/x-icon">
</head>

<body class="admin-dashboard-body">

    <!-- ======= Header starts here ======= -->
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-0 border-bottom header-design">
        <a href="admin_dashboard.php" class="d-flex align-items-center mb-3 mb-lg-0 text-dark text-decoration-none">
            <img class="bi me-2" width="40" height="32" src="../images/logo.svg">
            <use xlink:href="#bootstrap"></use></img>
            <span class="navbar-brand mb-0 h1 text-success"><b>Library Management System</b></span>
        </a>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

            <li><a class="nav-link px-2 link-success"><strong>Welcome Admin!</strong></a></li>
            <li><a class="nav-link px-2 link-success"><strong><?php /*set default timezone as Asia/Dhaka -->*/ date_default_timezone_set("Asia/Dhaka"); /*now print current day & date -->*/
                                                                echo "Today is " . date("l, F j, Y"); ?></strong></a></li>

        </ul>
        <div class="col-md-3 text-end">

            <button class="btn btn-success btn-sm shadow dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Admin</button>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item small" href="view_profile.php">View Profile</a></li>
                <li><a class="dropdown-item small" href="edit_profile.php">Edit Profile</a></li>
                <li><a class="dropdown-item small" href="change_password.php">Change Password</a></li>
            </ul>

            <a href="logout.php" class="btn btn-danger btn-sm shadow">Log out</a>
        </div>
    </header>
    <!-- ======= Header ends here======= -->




  <!-- ======= Admin-Nav starts here======= -->
  <div class="admin-navbar">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: darkcyan;">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link text-white" href="admin_dashboard.php">Dashboard</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Book
                            </a>
                            <ul class="dropdown-menu" style="background-color: darkcyan;" aria-labelledby="navbarDropdownMenuLink">
                                <li><a href="" class="dropdown-item text-white" data-bs-toggle="modal" data-bs-target="#addBook">Add Book</a></li>
                                <li><a class="dropdown-item text-white" href="reg_book.php">Manage Book</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Author
                            </a>
                            <ul class="dropdown-menu" style="background-color: darkcyan;" aria-labelledby="navbarDropdownMenuLink">
                                <li><a href="" class="dropdown-item text-white" data-bs-toggle="modal" data-bs-target="#addAuthor">Add Author</a></li>
                                <li><a class="dropdown-item text-white" href="reg_author.php">Manage Author</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Category
                            </a>
                            <ul class="dropdown-menu" style="background-color: darkcyan;" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item text-white" data-bs-toggle="modal" data-bs-target="#addCategory">Add Category</a></li>
                                <li><a class="dropdown-item text-white" href="reg_category.php">Manage Category</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#issueBook">Issue Book</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- ======= Admin-Nav ends here======= -->




    <!-- ======= Admin-Nav all modal(add book, add Category, add author) starts here======= -->

    <!-- Add-Book Modal -->
    <div class="modal fade" id="addBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h6 class="modal-title fw-bold" id="exampleModalLabel">Add Book</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group small">
                            <label class="col-form-label">Book Name:</label>
                            <input type="text" name="bookName" id="" class="form-control" required>
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Author:</label>
                            <select class="form-select" name="bookAuthor" id="bookAuthor" required>
                                <!-- <option selected>Select Author</option> -->
                                <option selected="true" disabled="disabled">Select Author</option>

                                <?php
                                include '../db_connection.php';
                                $sql = "SELECT Author_Name from author_tbl";
                                $result = mysqli_query($connection, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option><?php echo $row['Author_Name']; ?></option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Category:</label>
                            <select class="form-select" name="bookCategory" id="bookCategory" required>
                                <!-- <option>Select Category</option> -->
                                <option selected="true" disabled="disabled">Select Category</option>


                                <?php
                                include '../db_connection.php';
                                $sql = "SELECT Category_Name from category_tbl";
                                $result = mysqli_query($connection, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option><?php echo $row['Category_Name']; ?></option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Language:</label>
                            <input type="text" name="bookLanguage" id="" class="form-control" required>
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Publisher:</label>
                            <input type="text" name="bookPublisher" id="" class="form-control" required>
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Price:</label>
                            <input type="text" name="bookPrice" id="" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">CLOSE</button>
                        <button type="submit" name="add-book" class="btn btn-success btn-sm">SAVE</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Add-Author Modal -->
    <div class="modal fade" id="addAuthor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h6 class="modal-title fw-bold" id="exampleModalLabel">Add Author</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <!-- add new author form -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group small">
                            <label class="col-form-label">Author Name:</label>
                            <input type="text" name="author-name" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">CLOSE</button>
                        <button type="submit" name="add-author" class="btn btn-success btn-sm">SAVE</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Add-Category Modal -->
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h6 class="modal-title fw-bold" id="exampleModalLabel">Add Category</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <!-- add new category form -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group small">
                            <label class="col-form-label">Category Name:</label>
                            <input type="text" name="category-name" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">CLOSE</button>
                        <button type="submit" name="add-category" class="btn btn-success btn-sm">SAVE</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Issue-Book Modal -->
    <div class="modal fade" id="issueBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h6 class="modal-title fw-bold" id="exampleModalLabel">Issue Book</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group small">
                            <label class="col-form-label">Member ID:</label>
                            <input type="text" name="memberId" class="form-control" required>
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Book ID:</label>
                            <input type="text" name="bookId" class="form-control" required>
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Book Name:</label>
                            <input type="text" name="bookName" class="form-control" required>
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Book Author:</label>
                            <select class="form-select" name="bookAuthor" id="bookAuthor" required>
                                <!-- <option selected>Select Author</option> -->
                                <option selected="true" disabled="disabled">Select Author</option>

                                <?php
                                include '../db_connection.php';
                                $sql = "SELECT Author_Name from author_tbl";
                                $result = mysqli_query($connection, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option><?php echo $row['Author_Name']; ?></option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Category:</label>
                            <select class="form-select" name="category" id="category" required>
                                <!-- <option>Select Category</option> -->
                                <option selected="true" disabled="disabled">Select Category</option>


                                <?php
                                include '../db_connection.php';
                                $sql = "SELECT Category_Name from category_tbl";
                                $result = mysqli_query($connection, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option><?php echo $row['Category_Name']; ?></option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Issue Date:</label>
                            <input type="date" name="issuedDate" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">CLOSE</button>
                        <button type="submit" name="book-issue" class="btn btn-success btn-sm">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ======= Admin-Nav all modal(add book, add Category, add author) ends here======= -->


    <!-- ======= DataTable and all action starts here======= -->
    <div class="container custom-datatable-card mb-4">

        <!-- showing action alert! PHP -->
        <?php
        if (isset($_SESSION['userDeleteAlert'])) {
        ?>
            <div class="alert alert-warning alert-dismissible fade show small" role="alert">
                <strong>Member</strong>
                <?php echo $_SESSION['userDeleteAlert'];
                unset($_SESSION['userDeleteAlert']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        if (isset($_SESSION['userUpdateAlert'])) {
            ?>
                <div class="alert alert-success alert-dismissible fade show small" role="alert">
                    <strong>Member</strong>
                    <?php echo $_SESSION['userUpdateAlert'];
                    unset($_SESSION['userUpdateAlert']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
        ?>

        <h5 class="text-center fw-bold mb-4">Registered Member</h5>
        <table id="manageUserTable" class="table table-hover table-bordered small">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile no.</th>
                    <th scope="col">Address</th>
                    <th scope="col">Reg. Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <!-- Showing users all information from database(users_tbl) -->
                <?php
                // declare empty variable for storing users data
                $id = "";
                $name = "";
                $email = "";
                $mobile = "";
                $address = "";
                $regDate = "";

                $sql = "SELECT * FROM user_tbl";
                $query = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($query)) {
                    $id = $row['Id'];
                    $name = $row['Name'];
                    $email = $row['Email'];
                    $mobile = $row['Mobile'];
                    $address = $row['Address'];
                    $regDate = $row['Reg_Date'];

                ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $mobile; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $regDate; ?></td>
                        <td class="text-center">
                            <a data-bs-toggle="modal" data-bs-target="#editUser" class="btn btn-secondary btn-sm editBTN">Edit</a>
                            <a href="action/delete_users.php/?userID=<?php echo $row['Id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>

        </table>
    </div>
    <!-- ======= DataTable and all action ends here======= -->




    <!-- Edit User Modal -->
    <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h6 class="modal-title fw-bold" id="exampleModalLabel">Edit Member</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <!-- add new author form -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group small">
                            <input type="hidden" name="userId" id="userId">
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Full Name:</label>
                            <input type="text" name="userName" class="form-control" id="userName" required>
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Email:</label>
                            <input type="text" name="userEmail" class="form-control" id="userEmail" required>
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Mobile no:</label>
                            <input type="text" name="userPhone" class="form-control" id="userPhone" required>
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Address:</label>
                            <input type="text" name="userAddress" class="form-control" id="userAddress" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update_user_profile" class="btn btn-success btn-sm">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>



    <!-- ======= Bootstrap, JavaScript CDN add ======= -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


    
    <!-- ======= **DATATABLE CDN START** ======= -->

    <!-- Datatable Javascript CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <!-- Datatable Javascript -->
    <script>
        $(document).ready(function() {
            $('#manageUserTable').DataTable();
        });
    </script>
    <!-- ======= **DATATABLE CDN END*  ======= -->




    <!-- ======= **Edit-Users JavaScript functionality starts here**  ======= -->
    <script>
        $(document).ready(function() {

            $('.editBTN').on('click', function() {
                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#userId').val(data[0]);
                $('#userName').val(data[1]);
                $('#userEmail').val(data[2]);
                $('#userPhone').val(data[3]);
                $('#userAddress').val(data[4]);

            });
        });
    </script>
    <!-- ======= **Edit-Users JavaScript functionality ends here**  ======= -->

</body>

</html>