<?php
session_start();
if($_SESSION['level']=="admin"){
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

     <!-- Section: Design Block -->
<section class="text-center">
  <!-- Background image -->
  <div class="p-5 bg-image"></div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
</head>
<body class="text-center justify-content-center align-center display-flex" style="background-image: url('../foto/background/background.jpeg');">

    <div class="card-body py-5 px-md-3">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-5 ">
          <h2 class="fw-bold mb-5">Sign up</h2>
          <form action="proses_signup_admin.php" method ="post">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row">
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1">Nama Lengkap</label>
                  <input type="text" name="nama_petugas" class="form-control" required/>
              </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3">Username</label>
              <input type="username" name="username" class="form-control" required/>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form3Example4">Password</label>
              <input type="password" name="password" class="form-control" required/>
            </div>

            <div class="row">
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1">Telepon</label>
                  <input type="text" name="telepon" class="form-control" required/>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-3">
              Sign up
            </button>
            <div>
              <p class="mb-0">Already have account? <a href="login.php" class="text-black-50 fw-bold">Login</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>