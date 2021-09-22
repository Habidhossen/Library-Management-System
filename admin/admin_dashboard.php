<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- add custom font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- add bootstrap style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- add css file -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- add favicon file -->
    <link rel="shortcut icon" href="../images/logo.svg" type="image/x-icon">
</head>

<body class="admin-dashboard-body">

    <!-- ======= Header starts here ======= -->
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-0 border-bottom header-design">
        <a href="admin_dashboard.php" class="d-flex align-items-center mb-3 mb-lg-0 text-dark text-decoration-none">
            <img class="bi me-2" width="40" height="32" src="../images/logo.svg">
            <use xlink:href="#bootstrap"></use></img>
            <span class="navbar-brand mb-0 h1 text-success"><b>Library Management System</b></span>
        </a>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

            <li><a href="#" class="nav-link px-2 link-success"><strong>Welcome Admin!</strong></a></li>
            <li><a class="nav-link px-2 link-success"><strong><?php /*set default timezone as Asia/Dhaka -->*/date_default_timezone_set("Asia/Dhaka"); /*now print current day & date -->*/echo "Today is " . date("l, F j, Y");?></strong></a></li>

        </ul>
        <div class="col-md-3 text-end">

            <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                My Profile</button>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item small" href="view_profile.php">View Profile</a></li>
                <li><a class="dropdown-item small" href="edit_profile.php">Edit Profile</a></li>
                <li><a class="dropdown-item small" href="change_password.php">Change Password</a></li>
            </ul>

            <a href="" class="btn btn-outline-danger btn-sm">Log out</a>
        </div>
    </header>
    <!-- ======= Header ends here======= -->




    <!-- ======= Admin-Nav starts here======= -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-success mt-3">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="#">Dashboard</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="#">Issue Book</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Book
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Add Book</a></li>
                                <li><a class="dropdown-item" href="#">Manage Book</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Author
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Add Author</a></li>
                                <li><a class="dropdown-item" href="#">Manage Author</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Category
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Add Category</a></li>
                                <li><a class="dropdown-item" href="#">Manage Category</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- ======= Admin-Nav ends here======= -->




    <!-- ======= Admin-Dashboard starts here======= -->
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 mt-2 g-4">

            <!-- <div class="col">
                <div class="card bg-light shadow">
                    <div class="card-body my-3">
                        <h3 class="text-primary">100</h3>
                        <span>Total Users</span>
                    </div>
                    <a href="#" class="btn bg-primary text-white">View</a>
                </div>
            </div>
            <div class="col">
                <div class="card bg-light shadow">
                    <div class="card-body my-3">
                        <h3 class="text-success">156</h3>
                        <span>Total Books</span>
                    </div>
                    <a href="#" class="btn bg-success text-white">View</a>
                </div>
            </div>
            <div class="col">
                <div class="card bg-light shadow">
                    <div class="card-body my-3">
                        <h3 class="text-danger">85</h3>
                        <span>Issued Book</span>
                    </div>
                    <a href="#" class="btn bg-danger text-white">View</a>
                </div>
            </div>
            <div class="col">
                <div class="card bg-light shadow">
                    <div class="card-body my-3">
                        <h3 class="text-danger">56</h3>
                        <span>Total Authors</span>
                    </div>
                    <a href="#" class="btn bg-danger text-white">View</a>
                </div>
            </div>
            <div class="col">
                <div class="card bg-light shadow">
                    <div class="card-body my-3">
                        <h3 class="text-primary">27</h3>
                        <span>Total Category</span>
                    </div>
                    <a href="#" class="btn bg-primary text-white">View</a>
                </div>
            </div>
            <div class="col">
                <div class="card bg-light shadow">
                    <div class="card-body my-3">
                        <h3 class="text-success">18</h3>
                        <span>Book Request</span>
                    </div>
                    <a href="#" class="btn bg-success text-white">View</a>
                </div>
            </div> -->



            <div class="col">
                <div class="card-body custom-admin-card p-4">
                    <h4 class="card-title text-primary"><strong>0</strong></h4>
                    <p class="card-text">Total Users</p>
                    <a href="#" class="btn btn-outline-primary d-flex justify-content-center">View</a>
                </div>
            </div>
            <div class="col">
                <div class="card-body custom-admin-card p-4">
                    <h4 class="card-title text-success"><strong>0</strong></h4>
                    <p class="card-text">Total Books</p>
                    <a href="#" class="btn btn-outline-success d-flex justify-content-center">View</a>
                </div>
            </div>
            <div class="col">
                <div class="card-body custom-admin-card p-4">
                    <h4 class="card-title text-danger"><strong>0</strong></h4>
                    <p class="card-text"> Total Issued Book</p>
                    <a href="#" class="btn btn-outline-danger d-flex justify-content-center">View</a>
                </div>
            </div>
            <div class="col">
                <div class="card-body custom-admin-card p-4">
                    <h4 class="card-title text-danger"><strong>0</strong></h4>
                    <p class="card-text">Total Authors</p>
                    <a href="#" class="btn btn-outline-danger d-flex justify-content-center">View</a>
                </div>
            </div>
            <div class="col">
                <div class="card-body custom-admin-card p-4">
                    <h4 class="card-title text-primary"><strong>0</strong></h4>
                    <p class="card-text">Total Category</p>
                    <a href="#" class="btn btn-outline-primary d-flex justify-content-center">View</a>
                </div>
            </div>
            <div class="col">
                <div class="card-body custom-admin-card p-4">
                    <h4 class="card-title text-success"><strong>0</strong></h4>
                    <p class="card-text">Total Book Request</p>
                    <a href="#" class="btn btn-outline-success d-flex justify-content-center">View</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ======= Admin-Dashboard ends here======= -->


    

    <!-- ======= Footer starts here ======= -->
    <footer>
        <p class="text-center small fixed-bottom">Copyright © 2021 Team <strong>Free Thinkers</strong>, All right reserved</p>
    </footer>
    <!-- ======= Footer ends here ======= -->




    <!-- ======= Bootstrap, JavaScript CDN add ======= -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>

</body>

</html>