<?php

session_start();
include 'db_connection.php';

if (isset($_POST['login'])) {

  $email = $_POST['email']; //input-email stored in variable
  $password = $_POST['password']; ////input-password stored in variable

  $sql = "SELECT * FROM `user_tbl` WHERE Email = '$email'";
  $result = mysqli_query($connection, $sql);

  $num = mysqli_num_rows($result);
  if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
      if ($_POST['password'] === $row['Password']) {

        $_SESSION['userId'] = $row['Id'];
        $_SESSION['userName'] = $row['Name'];
        $_SESSION['userEmail'] = $row['Email'];

        header("location: user_dashboard.php");
        exit;
      } else {
        // echo 'Wrong password';
        // $wrongPassword = '';
        $_SESSION['wrongPasswordAlert'] = 'Wrong Password!';
        header("location: index.php");
        exit;
      }
    }
  } else {
    // echo 'Invalid email';
    // $wrongEmail = '';
    $_SESSION['invalidEmailAlert'] = 'Invalid Email!';
    header("location: index.php");
    exit;
  }

  // login system with hashing password...
  // if (mysqli_num_rows($result) == 1) {
  //   $row = mysqli_fetch_assoc($result);

  //   if (password_verify($password, $row['Password'])) {
  //     $_SESSION['userId'] = $row['Id'];
  //     $_SESSION['userName'] = $row['Name'];
  //     $_SESSION['userEmail'] = $row['Email'];
  //     header('Location: user_dashboard.php');
  //     exit;

  //   } else {
  //     $wrongPassword = '';
  //   }
  // } else {
  //   $wrongEmail = '';
  // }
}

// if User already logged in, then there in no need to login again. He/she will be able to access direct userDashboard file.
if (isset($_SESSION['userEmail'])) {
  header("location: user_dashboard.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library Management System</title>
  <!-- add custom font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <!-- add bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <!-- add css file -->
  <link rel="stylesheet" href="css/style.css">
  <!-- add favicon file -->
  <link rel="shortcut icon" href="images/logo.svg" type="image/x-icon">
</head>

<body>

  <!-- ======= Header starts here ======= -->
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-0 border-bottom header-design">
    <a href="index.php" class="d-flex align-items-center mb-3 mb-lg-0 text-dark text-decoration-none">
      <img class="bi me-2" width="40" height="32" src="images/logo.svg">
      <use xlink:href="#bootstrap"></use></img>
      <span class="navbar-brand mb-0 h1 text-primary"><b>Library Management System</b></span>
    </a>
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="index.php" class="nav-link px-2 link-secondary">Home</a></li>
      <li><a href="admin/index.php" class="nav-link px-2 link-dark">Admin login</a></li>
      <li><a href="contact.php" class="nav-link px-2 link-dark">Contact us</a></li>
      <li><a href="about.php" class="nav-link px-2 link-dark">About</a></li>
    </ul>
    <div class="col-md-3 text-end">
      <a href="#user-login" class="btn btn-outline-primary btn-sm">Member login</a>
      <a href="signup.php" class="btn btn-primary btn-sm">Sign up</a>
    </div>
  </header>
  <!-- ======= Header ends here======= -->




  <!-- ======= Body-Cover starts here ======= -->
  <section class="site-hero" style="background-image:url(images/cover_01.jpg)" id="section-home" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row intro-text align-items-center justify-content-center">
        <div class="col-md-10 text-center pt-5">
          <h1 class="text-white">Welcome to the <strong class="d-block">Library</strong></h1>
          <p class="d-block text-white mt-3">Libraries are cornerstones of our communities as hubs for knowledge,
            research, history, and so much more. They are places where people can connect with others and invest in
            their own future. We know that libraries are a huge resource to every community.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- ======= Body-Cover ends here ======= -->




  <!-- ======= User-Login-Parts starts here ======= -->
  <div class="container" id="user-login">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-8 fw-bold lh-1 mb-3">BECOME A MEMBER?</h1>
        <p class="col-lg-10 fs-6">Become a library member! It's easy to join our libraries.
          <br>Click registration button and simply complete the registration form on this page.
          <br>After you have successfully registered account then you can renew books, check library status and enjoy
          all the facilities of our online library from anywhere using your online account!
          <br><br> Once you’re a member, you can log in with your email address and password.
        </p>
        <a href="signup.php" class="btn btn-primary btn-md shadow">Registration</a>
      </div>

      <div class="col-md-10 mx-auto col-lg-5">
        <div class="p-4 p-md-5 border rounded-3 bg-light text-center shadow">

          <!-- User-login option -->
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

            <img class="mb-4" src="images/logo.svg" alt="" width="72" height="57">
            <h1 class="h5 mb-3 fw-bold">User login!</h1>
            <hr class="my-4">

            <div class="form-floating mb-3">
              <input name="email" type="email" class="form-control" placeholder="name@example.com" required>
              <label for="email">Email address</label>
            </div>
            <div class="form-floating mb-3">
              <input name="password" type="password" class="form-control" placeholder="Password" required>
              <label for="password">Password</label>
            </div>
            <button name="login" class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>

            <!-- PHP Coding for showing alert -->
            <?php
            if (isset($_SESSION['wrongPasswordAlert'])) {
            ?>
              <br><br>
              <div class="alert alert-danger alert-dismissible fade show small" role="alert">
                <?php echo $_SESSION['wrongPasswordAlert'];
                unset($_SESSION['wrongPasswordAlert']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            }
            if (isset($_SESSION['invalidEmailAlert'])) {
            ?>
              <br><br>
              <div class="alert alert-warning alert-dismissible fade show small" role="alert">
                <?php echo $_SESSION['invalidEmailAlert'];
                unset($_SESSION['invalidEmailAlert']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            }
            ?>
          </form>
        </div>
      </div>
    </div>
    <!-- ======= User-Login-Parts ends here ======= -->




    <!-- ======= Footer starts here ======= -->
    <footer>
      <p class="text-center small">Copyright © 2021 Team <strong>Free Thinkers</strong>, All right reserved</p>
    </footer>
    <!-- ======= Footer ends here ======= -->




    <!-- ======= Bootstrap, JavaScript CDN add ======= -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>

</html>