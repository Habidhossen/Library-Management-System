<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up | Library Management System</title>
  <!-- add custom font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <!-- add bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <!-- add css file -->
  <link rel="stylesheet" href="css/style.css">
  <!-- add favicon file -->
  <link rel="shortcut icon" href="images/logo.svg" type="image/x-icon">
</head>

<body>

  <!-- ======= Header starts here ======= -->
  <header
    class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-0 border-bottom header-design">
    <a href="index.php" class="d-flex align-items-center mb-3 mb-lg-0 text-dark text-decoration-none">
      <img class="bi me-2" width="40" height="32" src="images/logo.svg">
      <use xlink:href="#bootstrap"></use></img>
      <span class="navbar-brand mb-0 h1 text-primary"><b>Library Management System</b></span>
    </a>
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="index.php" class="nav-link px-2 link-dark">Home</a></li>
      <li><a href="admin/index.php" class="nav-link px-2 link-dark">Admin login</a></li>
      <li><a href="contact.php" class="nav-link px-2 link-dark">Contact us</a></li>
      <li><a href="about.php" class="nav-link px-2 link-dark">About</a></li>
    </ul>
    <div class="col-md-3 text-end">
      <a href="index.php" class="btn btn-outline-primary btn-sm">Member login</a>
      <a href="#register" class="btn btn-primary btn-sm">Sign up</a>
    </div>
  </header>
  <!-- ======= Header ends here======= -->




  <!-- ======= Registration-Success starts here======= -->
  <div class="text-center container col-lg-6 col-md-8 col-sm-8 custom-profile-card">

    <img src="images/success.png" width="100" height="100">
    <h3 class="fw-bold mt-3">Success</h3>
    <h6 class="mt-3">Congratulations, your account has been successfully created.
      <br>You may login now.
    </h6>
    <a href="index.php" class="btn btn-success continue-btn mt-3">Continue</a>

  </div>
  <!-- ======= Registration-Success ends here======= -->




  <!-- ======= Bootstrap, JavaScript CDN add ======= -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
    integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
    integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/"
    crossorigin="anonymous"></script>
</body>

</html>