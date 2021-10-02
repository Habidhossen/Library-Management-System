<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create new account</title>
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




  <!-- ======= Body-Cover starts here ======= -->
  <section class="site-hero" style="background-image:url(images/cover_03.jpg)" id="section-home" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row intro-text align-items-center justify-content-center">
        <div class="col-md-10 text-center pt-5">
          <h1 class="text-white">Welcome To The <strong class="d-block">Library</strong></h1>
          <p class="d-block text-white mt-3">Libraries are cornerstones of our communities as hubs for knowledge,
            research,
            history, and so much more. They are places where people can connect with others and invest in their own
            future. We
            know that libraries are a huge resource to every community.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- ======= Body-Cover ends here ======= -->




  <!-- ======= Registration-Form-Parts starts here ======= -->
  <section class="testimonial py-5" id="register">
    <div class="container shadow">
      <div class="row ">
        <div class="col-md-4 py-5 text-white text-center" style="background-image:url(images/cover_05.jpg)">
          <div class=" ">
            <div class="card-body">
              <img src="images/logo.svg" style="width:30%">
              <h2 class="py-3">Registration</h2>
              <p>Become a library member!<br>It's easy to join our libraries. Just simply complete the registration form.</p>
            </div>
          </div>
        </div>

        <!-- signup form part-->
        <div class="col-md-8 py-5 border">
          <h5 class="pb-4 fw-bold">Please fill with your details</h5>

          <form action="register.php" method="post">

            <div class="row py-2">
              <div class="form-group col-md-6">
                <input name="name" placeholder="Full Name" class="form-control" type="text" required="required">
              </div>

              <div class="form-group col-md-6">
                <input name="email" placeholder="Email" class="form-control" type="email" required="required">
              </div>
            </div>

            <div class="row py-2">
              <div class="form-group col-md-6">
                <input name="password" placeholder="Password" class="form-control" type="password" required="required">
              </div>

              <div class="form-group col-md-6">
                <input name="mobile" placeholder="Mobile No." class="form-control" type="text" required="required">
              </div>
            </div>

            <div class="row py-2">
              <div class="form-group col-md-12">
                <textarea name="address" placeholder="Address" cols="40" rows="5" class="form-control" required='required'></textarea>
              </div>
            </div>

            <div class="form-row py-2">
              <button type="submit" class="btn btn-primary shadow">Submit</button>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- ======= Registration-Form-Parts ends here ======= -->




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