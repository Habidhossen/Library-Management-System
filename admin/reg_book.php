<?php

include '../db_connection.php';
session_start();

// update Book Info
if (isset($_POST['update_book_info'])) {

    $bookId = $_POST['bookId'];
    $bookName = $_POST['bookName'];
    $bookAuthor = $_POST['bookAuthor'];
    $bookCategory = $_POST['bookCategory'];
    $language = $_POST['language'];
    $publisher = $_POST['publisher'];
    $bookPrice = $_POST['bookPrice'];

    $sql = "UPDATE `book_tbl` SET `Book_Name`='$bookName',`Book_Author`='$bookAuthor',`Book_Category`='$bookCategory',`Language`='$language',`Publisher`='$publisher',`Book_Price`='$bookPrice' WHERE Book_Id = '$bookId'";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $_SESSION['bookUpdateAlert'] = 'Updated Successfully!';
        header("location: reg_book.php");
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
                                <li><a class="dropdown-item text-white" href="#">Manage Book</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Author
                            </a>
                            <ul class="dropdown-menu" style="background-color: darkcyan;" aria-labelledby="navbarDropdownMenuLink">
                                <li><a href="" class="dropdown-item text-white" data-bs-toggle="modal" data-bs-target="#addAuthor">Add Author</a></li>
                                <li><a class="dropdown-item text-white" href="#">Manage Author</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Category
                            </a>
                            <ul class="dropdown-menu" style="background-color: darkcyan;" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item text-white" data-bs-toggle="modal" data-bs-target="#addCategory">Add Category</a></li>
                                <li><a class="dropdown-item text-white" href="#">Manage Category</a></li>
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
                <div class="modal-body">
                    <form>
                        <div class="form-group small">
                            <label class="col-form-label">Book ID:</label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Book Name:</label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Book Author:</label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Book Category:</label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Book Number:</label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Book Price:</label>
                            <input type="text" name="" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">CLOSE</button>
                    <a href="" class="btn btn-success btn-sm">SAVE</a>
                </div>
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
                <div class="modal-body">
                    <form>
                        <div class="form-group small">
                            <label class="col-form-label">Author ID:</label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Author Name:</label>
                            <input type="text" name="" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">CLOSE</button>
                    <a href="" class="btn btn-success btn-sm">SAVE</a>
                </div>
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
                <div class="modal-body">
                    <form>
                        <div class="form-group small">
                            <label class="col-form-label">Category Name:</label>
                            <input type="text" name="" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">CLOSE</button>
                    <a href="" class="btn btn-success btn-sm">SAVE</a>
                </div>
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
                <div class="modal-body">
                    <form>
                        <div class="form-group small">
                            <label class="col-form-label">Book Name:</label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Book Number:</label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Author ID:</label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Category ID:</label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Student ID:</label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Issue Date:</label>
                            <input type="date" name="" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">CLOSE</button>
                    <a href="" class="btn btn-success btn-sm">SAVE</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ======= Admin-Nav all modal(add book, add Category, add author) ends here======= -->


    <div class="container custom-datatable-card mb-4">

        <!-- showing action alert! PHP -->
        <?php
        if (isset($_SESSION['bookDeleteAlert'])) {
        ?>
            <div class="alert alert-warning alert-dismissible fade show small" role="alert">
                <strong>Book</strong>
                <?php echo $_SESSION['bookDeleteAlert'];
                unset($_SESSION['bookDeleteAlert']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        if (isset($_SESSION['bookUpdateAlert'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show small" role="alert">
                <strong>Book</strong>
                <?php echo $_SESSION['bookUpdateAlert'];
                unset($_SESSION['bookUpdateAlert']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>

        <h5 class="text-center fw-bold mb-4">Registered Book</h5>
        <table id="manageUserTable" class="table table-hover table-bordered small">
            <thead>
                <tr>
                    <th scope="col">Book Id</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    <th scope="col">Language</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Book Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <!-- Showing book all information from database(book_tbl) -->
                <?php
                // declare empty variable for storing users data
                $bookId = "";
                $bookName = "";
                $author = "";
                $category = "";
                $language = "";
                $publisher = "";
                $bookPrice = "";

                $sql = "SELECT * FROM `book_tbl`";
                $query = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($query)) {
                    $bookId = $row['Book_Id'];
                    $bookName = $row['Book_Name'];
                    $author = $row['Book_Author'];
                    $category = $row['Book_Category'];
                    $language = $row['Language'];
                    $publisher = $row['Publisher'];
                    $bookPrice = $row['Book_Price'];

                ?>
                    <tr>
                        <td><?php echo $bookId; ?></td>
                        <td><?php echo $bookName; ?></td>
                        <td><?php echo $author; ?></td>
                        <td><?php echo $category; ?></td>
                        <td><?php echo $language; ?></td>
                        <td><?php echo $publisher; ?></td>
                        <td><?php echo $bookPrice; ?></td>
                        <td class="text-center">
                            <a data-bs-toggle="modal" data-bs-target="#editUser" class="btn btn-secondary btn-sm editBTN">Edit</a>
                            <a href="action/delete_book.php/?bookID=<?php echo $row['Book_Id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>

        </table>
    </div>



    <!-- Edit User Modal -->
    <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h6 class="modal-title fw-bold" id="exampleModalLabel">Edit Book</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <!-- add new author form -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group small">
                            <input type="hidden" name="bookId" id="bookId">
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Book Name:</label>
                            <input type="text" name="bookName" class="form-control" id="bookName" required>
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Author:</label>
                            <input type="text" name="bookAuthor" class="form-control" id="bookAuthor" required>
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Category:</label>
                            <input type="text" name="bookCategory" class="form-control" id="bookCategory" required>
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Language:</label>
                            <input type="text" name="language" class="form-control" id="language" required>
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Publisher:</label>
                            <input type="text" name="publisher" class="form-control" id="publisher" required>
                        </div>
                        <div class="form-group small">
                            <label class="col-form-label">Book Price:</label>
                            <input type="text" name="bookPrice" class="form-control" id="bookPrice" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update_book_info" class="btn btn-success btn-sm">Update</button>
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

                $('#bookId').val(data[0]);
                $('#bookName').val(data[1]);
                $('#bookAuthor').val(data[2]);
                $('#bookCategory').val(data[3]);
                $('#language').val(data[4]);
                $('#publisher').val(data[5]);
                $('#bookPrice').val(data[6]);

            });
        });
    </script>
    <!-- ======= **Edit-Users JavaScript functionality ends here**  ======= -->

</body>

</html>