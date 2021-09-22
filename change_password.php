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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- add css file -->
    <link rel="stylesheet" href="css/style.css">
    <!-- add favicon file -->
    <link rel="shortcut icon" href="images/logo.svg" type="image/x-icon">
</head>

<body class="user-dashboard-body">

    <!-- ======= Header starts here ======= -->
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-0 border-bottom header-design">
        <a href="user_dashboard.php" class="d-flex align-items-center mb-3 mb-lg-0 text-dark text-decoration-none">
            <img class="bi me-2" width="40" height="32" src="images/logo.svg">
            <use xlink:href="#bootstrap"></use></img>
            <span class="navbar-brand mb-0 h1 text-primary"><b>Library Management System</b></span>
        </a>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

            <li><a href="#" class="nav-link px-2 link-primary"><strong>Welcome User</strong></a></li>
            <li><a href="#" class="nav-link px-2 link-primary"><strong>Email: user@gmail.com</strong></a></li>

        </ul>
        <div class="col-md-3 text-end">

            <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                My Profile</button>
            <ul class="dropdown-menu dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item small" href="view_profile.php">View Profile</a></li>
                <li><a class="dropdown-item small" href="edit_profile.php">Edit Profile</a></li>
                <li><a class="dropdown-item small" href="change_password.php">Change Password</a></li>
            </ul>

            <a href="logout.php" class="btn btn-primary btn-sm">Log out</a>
        </div>
    </header>
    <!-- ======= Header ends here======= -->




    <!-- ======= Change-Password starts here======= -->
    <div class="row m-5">
        <div class="col-lg-3 col-md-3 col-sm-2"></div>
        <div class="col-lg-6 col-md-6 col-sm-8">
            <h6 class="mb-3 fw-bold">Change Password</h6>
            <hr class="my-3">
            <form>
                <div class="form-group row align-items-center">
                    <label class="col-4">Current Password:</label>
                    <div class="col-8">
                      <input name="current_password" type="password" class="form-control alert-primary" value="1234">
                    </div>
                </div>

                <div class="form-group row align-items-center mt-2">
                    <label class="col-4">New Password:</label>
                    <div class="col-8">
                      <input name="new_password" type="password" class="form-control alert-primary" value="123456">
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="w-100 btn btn-primary btn-sm">Change Password</button>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-2">
        </div>
    </div>
    <!-- ======= Change-Password ends here======= -->





    <!-- ======= Bootstrap, JavaScript CDN add ======= -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>

</body>

</html>